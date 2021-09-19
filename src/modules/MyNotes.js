import axios from 'axios';

class MyNotes {
	constructor() {
		console.log('%cMyNotes.js constructor...', 'color:purple;font-size:18px');
		if (document.querySelector('#my-notes')) {
			axios.defaults.headers.common['X-WP-Nonce'] = universityData.nonce;
			this.myNotes = document.querySelector('#my-notes');
			this.events();
		}
	}

	events() {
		this.myNotes.addEventListener('click', (e) => this.clickHandler(e));
		document.querySelector('.submit-note').addEventListener('click', () => this.createNote());
	}

	clickHandler(e) {
		if (e.target.classList.contains('delete-note') || e.target.classList.contains('fa-trash-o')) this.deleteNote(e);
		if (
			e.target.classList.contains('edit-note') ||
			e.target.classList.contains('fa-pencil') ||
			e.target.classList.contains('fa-times')
		)
			this.editNote(e);
		if (e.target.classList.contains('update-note') || e.target.classList.contains('fa-arrow-right'))
			this.updateNote(e);
	}

	findNearestParentLi(el) {
		let thisNote = el;
		while (thisNote.tagName != 'LI') {
			thisNote = thisNote.parentElement;
		}
		return thisNote;
	}

	// Methods will go here
	editNote(e) {
		const thisNote = this.findNearestParentLi(e.target);

		if (thisNote.getAttribute('data-state') == 'editable') {
			this.makeNoteReadOnly(thisNote);
		} else {
			this.makeNoteEditable(thisNote);
		}
	}

	makeNoteEditable(thisNote) {
		thisNote.querySelector('.edit-note').innerHTML = '<i class="fa fa-times" aria-hidden="true"></i> Cancel';
		thisNote.querySelector('.note-title-field').removeAttribute('readonly');
		thisNote.querySelector('.note-body-field').removeAttribute('readonly');
		thisNote.querySelector('.note-title-field').classList.add('note-active-field');
		thisNote.querySelector('.note-body-field').classList.add('note-active-field');
		thisNote.querySelector('.update-note').classList.add('update-note--visible');
		thisNote.setAttribute('data-state', 'editable');
	}

	makeNoteReadOnly(thisNote) {
		thisNote.querySelector('.edit-note').innerHTML = '<i class="fa fa-pencil" aria-hidden="true"></i> Edit';
		thisNote.querySelector('.note-title-field').setAttribute('readonly', 'true');
		thisNote.querySelector('.note-body-field').setAttribute('readonly', 'true');
		thisNote.querySelector('.note-title-field').classList.remove('note-active-field');
		thisNote.querySelector('.note-body-field').classList.remove('note-active-field');
		thisNote.querySelector('.update-note').classList.remove('update-note--visible');
		thisNote.setAttribute('data-state', 'cancel');
	}

	async deleteNote(e) {
		const thisNote = this.findNearestParentLi(e.target);

		try {
			const response = await axios.delete(
				universityData.root_url + '/wp-json/wp/v2/note/' + thisNote.getAttribute('data-id'),
			);
			console.log('Delete Note', response);
			thisNote.style.height = `${thisNote.offsetHeight}px`;
			setTimeout(function () {
				thisNote.classList.add('fade-out');
			}, 20);
			setTimeout(function () {
				thisNote.remove();
			}, 401);
			if (response.data.userNoteCount < 5) {
				document.querySelector('.note-limit-message').classList.remove('active');
			}
		} catch (e) {
			console.log('Sorry');
		}
	}

	async updateNote(e) {
		const thisNote = this.findNearestParentLi(e.target);

		var ourUpdatedPost = {
			title: thisNote.querySelector('.note-title-field').value,
			content: thisNote.querySelector('.note-body-field').value,
		};

		try {
			const response = await axios.post(
				universityData.root_url + '/wp-json/wp/v2/note/' + thisNote.getAttribute('data-id'),
				ourUpdatedPost,
			);
			console.log('Update Note', response);
			this.makeNoteReadOnly(thisNote);
		} catch (e) {
			console.log('Sorry');
		}
	}

	async createNote() {
		var ourNewPost = {
			title: document.querySelector('.new-note-title').value,
			content: document.querySelector('.new-note-body').value,
			status: 'publish',
		};

		try {
			const response = await axios.post(universityData.root_url + '/wp-json/wp/v2/note/', ourNewPost);
			console.log('Create Note', response);
			if (response.data != 'You have reached your note limit.') {
				document.querySelector('.new-note-title').value = '';
				document.querySelector('.new-note-body').value = '';
				document.querySelector('#my-notes').insertAdjacentHTML(
					'afterbegin',
					` 
					  <li data-id="${response.data.id}">
                  <div class="a-note border-2 border-purple-500 p-2 mb-1 mt-1 max-w-lg">
                    <div class="input-fields ">
                      <div class="mt-2">
                         <input readonly class="note-title-field" value="${response.data.title.raw}">
                      </div>
                      <div class=" mt-2">
                       <textarea readonly class="note-body-field">${response.data.content.raw}</textarea>
                      </div>

                    </div><!-- input-fields --><br>
                    <div class="buttons mb-2 w-auto">
                      <span class="update-note bg-green-500 p-2  text-white cursor-pointer"><i class="fa fa-arrow-right" aria-hidden="true"></i> Save</span>
                        <span class="edit-note bg-pink-500 p-2 text-white cursor-pointer"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</span>
                      <span class="delete-note bg-red-500  p-2 text-white cursor-pointer"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</span>
                    </div><!--  buttons -->
                  </div><!--  notes-list-output -->
                </li>`,
q				);
			} else {
				document.querySelector('.note-limit-message').classList.add('active');
			}
		} catch (e) {
			console.error(e);
		}
	}
}

export default MyNotes;
