const { render } = wp.element;

import '../css/style.scss';

// Our modules / classes
import MyNotes from './modules/MyNotes';
import Job from './modules/Job';
import RxJS from './modules/RxJS';
import Votes from './modules/App';

console.log('%cIndex.js firing...', 'color:blue;font-size:18px');
// Instantiate a new object using our modules/classes

const myNotes = new MyNotes();
const job = new Job();
const rxjs = new RxJS();

if (document.getElementById('react-app')) {
	render(<Votes />, document.getElementById('react-app'));
}
