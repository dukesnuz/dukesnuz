<!DOCTYPE html>
<html>
	<head>
		<title>Extra Credit Assignment Two</title>
		<meta charset="UTF-8">

		<link rel="stylesheet" href="css/bookmarks.css" />
		<script type = "text/javascript" src = "js/bookmarks_search.js?='+Math.random();+'"></script>
	</head>
	<body>
		<header>
			<h1>A Bookmarklet For Bookmarks</h1>
			<h2><a href="http://www.dukesnuz.com/bookmarklets/bookmarks.php">Live Version</a></h2>
		</header>
		<ul>
			<li>
				Drag this link to your browser.
			</li>
			<li>
				<a href="javascript:(function(){
				if(window.location.href.slice(0,5) === 'http:'){
				var _s = document.createElement('script');
				_s.src = 'http://www.dukesnuz.com/bookmarklets/js/bookmarks_save.js?=bKey=3cc4dee283a41f00326065dd5c3a83f4';
				var pos = document.getElementsByTagName('head')[0];
				pos.appendChild(_s);
				_s.setAttribute('id', 'bKey');
				}else{
				alert('Https sites cannot be bookmarked.');
				}
				})()">BookMark It</a>
			</li>

			<li>
				I am fascinated with AJAX and Bookmarklets. So I figured I would use the two together.
			</li>
			<li>
				The main goal is to demonstrate bookmarklets and AJAX.
			</li>
			<li>
				Bookmarklets are simply javascript placed into a url to do something.
				Bookmarklets do someting only in the webpage in which the javascript is added into the url.
				The javascript in the url is prefaced with <strong>javascript:</strong>.
			</li>
			<li>
				This exercise uses javascript and bookmarklets technique to store bookmarks in a MySQL table.
			</li>
			<li>
				Just for fun I also coded the PHP script and created a MySQL table.
			</li>
			<li>
				After a bookmark is stored click DISPLAY and the new bookmark will appear.
			</li>
			<li>
				I was thinking of adding catagories, and a log in for security in the future.
			</li>
			<li>
				The bookmarklet works on Chrome and Opera when on any site that is not https hosted(shows alert error when on https site and trying to us this bookmarlet.).
			</li>
			<li>
				Some drawbacks. This bookmarklet does not work in firefox and Internet explorer(unless your on this domain) as I was not able to get around CORS.
			</li>
			<li>
				Cross-origin resource sharing (Cors) is when one site makes a request from another site. Most browsers restrict cors when requests
				are  made from scripts such as AJAX.
			</li>
			<li>
				For a list of files, kndly click DISPLAY.
			</li>

			<li>
				<button type = "submit" id = "bookmarks" value = "submit">
					Display
				</button>
			</li>
		</ul>

		<div id = "output"></div>

		<footer>
			<p>
				HES Graduate Credit Assignment 2 | Fall 2016
			</p>
			<p>
				Student: David Petringa
			</p>
		</footer>

		<?php
		$title = "Extra Credit Assignment Two";
		include ('../includes/config.inc.php');
		include ('../site_utilities/footer_hidden.inc.php');
		?>
	</body>
</html>