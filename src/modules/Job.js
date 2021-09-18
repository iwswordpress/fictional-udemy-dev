class Job {
	constructor() {
		console.log('%cJob.js constructor...', 'color:green;font-size:18px');
		if (document.querySelector('#job')) {
			this.job = document.querySelector('#job');
			this.jobBtn = document.querySelector('.job-class');
			console.log('Job Btn', this.jobBtn);
			this.events();
		}
	}

	events() {
		console.log('events method this.job', this.job);
		this.job.addEventListener('click', (e) => this.clickHandler(e));
	}

	clickHandler(e) {
		console.log('clickHandler - jobid =', e.target.getAttribute('jobid'));
	}
}

export default Job;
