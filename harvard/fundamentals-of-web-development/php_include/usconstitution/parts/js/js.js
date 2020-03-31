/***used for navigation here i am ***/
$(document).ready(function() {
	console.log("go");
	var mybodyid = $('.this_should_be_the_body').attr('id');
	var mynavid = '#nav' + mybodyid;
	console.log("mybodyid is " + mybodyid);
	console.log("mynavid is " + mynavid);
	$(mynavid).attr('id', 'iamhere');
})