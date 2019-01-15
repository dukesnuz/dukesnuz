<!DOCTYPE html>
<html>
	<head>
		<title>Extra Credit Assignment Two</title>
		<meta charset="UTF-8">

		<link rel="stylesheet" href="css/extracreditassignmenttwo.css" />

	</head>
	<body>
		<p>
			Drag this link to your browser.
		</p>
		<p>
			<a href="javascript:(function(){
			var _s = document.createElement('script');
			_s.src = 'http://www.dukesnuz.com/extracreditassignmenttwo/js/extracreditassignmenttwo.js?bKey=3cc4dee283a41f00326065dd5c3a83f4';
			var pos = document.getElementsByTagName('head')[0];
			pos.appendChild(_s);
			_s.setAttribute('id', 'bKey');
			})()">Add Bookmarklet</a>
		</p>

		<p>
			I am fascinated with AJAX and Bookmarklets. So I figured I would use the two together.
		</p>
		<p>
			The main goal is to demonstrate bookmarklets and AJAX.
		</p>
		<p>
			This exercise uses javascript and bookmarklets to store book marks in a mysql database
		</p>
		<p>
			Just for fun I also coded the php script and created a mysql table.
		</p>
		<p>
			Ok mostly works. It does not work on sites that use https
		</p>
		<p>
			After a bookmark is stores come back here, refresh the page and it will appear.
		</p>
		<p>
			I was tinking of adding catagories, just diod not want to spend a lot of time on this.
		</p>

		<p>
			Refresh the page to see the new boookmark
		</p>
		<?php
		include ('../include_2/mysqli_connect.php');
		//ORDER BY DESC
		$q = "SELECT url, title FROM bookmarklets
where key_code ='3cc4dee283a41f00326065dd5c3a83f4'
ORDER BY title ASC";
		$r = @mysqli_query($dbc, $q);
		echo "<ul>";
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
			echo "<li><a href=\"$row[url]\">$row[title]</a></li>";
		}
		echo "</ul>";
		mysqli_close($dbc);
		?>
				<!--stat counter code-->
		<!-- Start of StatCounter Code for Default Guide -->
		<script type="text/javascript">
			var sc_project = 5944140;
			var sc_invisible = 1;
			var sc_security = "0e575229";
			var scJsHost = (("https:" == document.location.protocol) ? "https://secure." : "http://www.");
			document.write("<sc" + "ript type='text/javascript' src='" + scJsHost + "statcounter.com/counter/counter.js'></" + "script>");
		</script>
		<noscript>
			<div class="statcounter">
				<a title="free web stats"
				href="http://statcounter.com/" target="_blank"><img
				class="statcounter"
				src="//c.statcounter.com/5944140/0/0e575229/1/" alt="free
				web stats"></a>
			</div>
		</noscript>
		<!-- End of StatCounter Code for Default Guide -->
	</body>
</html>