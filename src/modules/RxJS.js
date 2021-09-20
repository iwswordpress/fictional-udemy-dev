import { fromEvent, combineLatest } from 'rxjs';
import { map, tap, filter, debounceTime, switchMap } from 'rxjs/operators';
import { ajax } from 'rxjs/ajax';
import { validEmail, validPassword, emailAvailable, registerEmail } from './helpers.js';

class RxJS {
	constructor() {
		console.log('%cRxjs...', 'color:red;font-size:18px');
		this.events();
	}

	events() {
		if (document.querySelector('#rxjs')) {
			// check in site - can be id or class
			// Store form data
			const formData = {
				email: '',
				password: '',
				agree: false,
				emailAvailable: false,
				id: 1,
			};
			// var regEmail = new FormData();
			// DOM elements
			const button = document.getElementById('btnSubmit');
			const output = document.getElementById('output');
			const email = document.getElementById('email');
			const password = document.getElementById('password');
			const cbo = document.getElementById('cbo');

			const validationEmail = document.getElementById('validation-email');
			const validationPassword = document.getElementById('validation-password');

			const email$ = fromEvent(email, 'input').pipe(
				debounceTime(750),
				filter((e) => e.target.value.length > 3),
				map((e) => e.target.value),
				map(function checkEmailIsValid(email) {
					formData.validEmail = validEmail(email, validationEmail);
					formData.email = email;
					return validEmail(email, validationEmail);
				}),
				filter((x) => x), // if it is not a valid email no need to run ajax check
				switchMap(() => ajax(emailAvailable(formData.email))),
				tap((data) => {
					console.log(data.response);
					let result = data.response;
					console.log('EMAIL AVAILABLE', result.available);
					if (result.available) {
						formData.emailAvailable = true;
						validationEmail.innerHTML += `<span class="email-avail"> ${formData.email} available</span>`;
					} else {
						validationEmail.innerHTML += `<span class="invalid"> ${formData.email} NOT available</span>`;
					}
				}),
			);

			const password$ = fromEvent(password, 'input').pipe(
				debounceTime(750),
				map((x) => x.target.value),
				map(function checkPassword(password) {
					formData.validPassword = validPassword(password, validationPassword);
					formData.password = password;
					return validPassword(password, validationPassword);
				}),
				tap((password) => (formData.password = password)),
			);

			const cbo$ = fromEvent(cbo, 'click').pipe(tap(() => (formData.agree = cbo.checked)));

			combineLatest([email$, password$, cbo$]).subscribe(() => {
				// formData.emailAvailable = true;
				console.log(`Form Data: `, formData);
				console.log(
					'combineLatest',
					formData.validEmail,
					formData.validPassword,
					formData.agree,
					formData.emailAvailable,
				);
				if (formData.validEmail && formData.emailAvailable && formData.validPassword && formData.agree) {
					// console.log('VALID FORM');
					button.removeAttribute('disabled');

					button.textContent = 'SUBMIT';
					output.innerHTML = '';
				} else {
					// console.log('INVALID FORM');
					let errMsg = '';
					button.setAttribute('disabled', true);
					button.textContent = 'DISABLED';
					if (!formData.emailAvailable) {
						errMsg += `<li>${formData.email} is already registered.</li>`;
					}
					if (!formData.agree) {
						errMsg += '<li>You cannot register unless you agree to the site rules.</li>';
					}
					output.innerHTML = errMsg;
				}
			});

			const button$ = fromEvent(button, 'click').pipe(
				switchMap(() => ajax(registerEmail(formData.email))),
				tap((data) => {
					console.log(data.response);
					output.innerHTML = `Form data sent to server:<br>
						email: ${formData.email}<br>
						password: ${formData.password}<br>
						cbo:  ${formData.agree}<br>
						<hr>
						<h2>Registered with ID: <b>${data.response.id}</b> </h2>
						`;
				}),
			);

			button$.subscribe({
				next(x) {
					console.log(`[BUTTON SUBSCRIBE] BUTTON was clicked`);
				},
				error(err) {
					console.log(err.message);
				},
				complete() {
					console.log('BUTTON Completed');
				},
			});
		}
	}
}

export default RxJS;
