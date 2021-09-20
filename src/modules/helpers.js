export function btnShow() {
	button.style.display = 'inline';
	console.log('showing button...');
}
export function getUsers(x) {
	const url = 'https://api.github.com/users?per_page=' + x.target.value;
	console.log('URL is  ', url);
	return url;
}
export function getRandomUsers(x) {
	const url = 'https://randomuser.me/api/?results=' + x.target.value;
	console.log('URL is  ', url);
	return url;
}

export function getLocations(x) {
	const url = 'https://reqres.in/api/user';
	console.log('URL is  ', url);
	return url;
}
export function emailAvailable(regEmail) {
	const data = {
		email: regEmail,
	};
	return {
		url: 'http://localhost/finaluniv/wp-json/api/v1/email-available',
		method: 'POST',
		headers: {
			'Content-Type': 'application/json',
		},
		body: JSON.stringify(data),
	};
}

export function emailExists(regEmail) {
	const formData = new FormData();
	formData.append('email', regEmail);

	return {
		url: 'https://reqres.in/api/user',
		method: 'POST',
		body: formData,
	};
}

export function registerEmail(regEmail) {
	// const formData = new FormData();
	// formData.append('data', regEmail);

	// return {
	// 	url: 'https://reqres.in/api/user',
	// 	method: 'POST',
	// 	body: formData,
	// };
	const data = {
		email: regEmail,
	};
	return {
		url: 'http://localhost:3000/register',
		method: 'POST',
		headers: {
			'Content-Type': 'application/json',
		},
		body: JSON.stringify(data),
	};
}

export function validNumberOfusers(val, el) {
	if (val < 3) {
		el.innerHTML = 'INVALID entry';
	} else {
		el.innerHTML = 'Valid entry...thank you.';
	}
}

export function validEmail(val, el) {
	if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(val)) {
		el.innerHTML = '<span class="valid">VALID</span>';
		return true;
	} else {
		el.innerHTML = '<span class="invalid">NOT VALID</span>';
		return false;
	}
}

export function validPassword(val, el) {
	if (val.length < 6) {
		el.innerHTML = '<span class="invalid">6 or more characters required</span>';
		return false;
	} else {
		el.innerHTML = '<span class="valid">VALID LENGTH</span>';
		return true;
	}
}

export function rnd(num) {
	return Math.floor(Math.random() * num);
}
export function inStock(prob) {
	return Math.random() > prob;
}

export function printLatLon(value, id, city, lat, lon) {
	const container = document.getElementById('results-container');
	const item = document.createElement('a');
	item.innerHTML = `${value}<br>`;
	item.setAttribute('id', id);
	item.setAttribute('city', city);
	item.setAttribute('lat', lat);
	item.setAttribute('lon', lon);
	item.setAttribute('href', '#!');
	item.className = '';
	container.appendChild(item);
}
