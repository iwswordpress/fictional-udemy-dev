const { useState } = wp.element;

const Votes = () => {
	const [votes, setVotes] = useState(0);
	const addVote = () => {
		setVotes(votes + 1);
	};
	return (
		<div>
			<h2>{votes} Votes</h2>
			<p>
				<button style={{ background: '#2196f3', color: '#fff', padding: '5px 10px' }} onClick={addVote}>
					Vote!
				</button>
			</p>
		</div>
	);
};

export default Votes;
