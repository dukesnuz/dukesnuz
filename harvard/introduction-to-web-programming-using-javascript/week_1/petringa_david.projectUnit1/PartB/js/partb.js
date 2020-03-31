/**partb.js**/

document.getElementById("myBtn").onclick = function() {

	var myNewTitle = document.getElementById('myTextField').value;
	if (myNewTitle.length == 0) {
		alert('Write Some Real Text Please');
		return;
	}

	var title = document.getElementById('title');
	title.innerHTML = myNewTitle;
}
