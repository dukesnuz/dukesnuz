/* table sorter script*/
$(document).ready(function() {
	$('#my_table').tablesorter({
		"theme" : "metro-dark",
		"widgets" : ["zebra"],
		sortList : [[0, 0]]
	});
});
