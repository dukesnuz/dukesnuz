<?php
//check if config file exists
if (file_exists("./includes/config.inc.php")) {
	require ('./includes/config.inc.php');
	$folder_level = FOLDER_LEVEL_1;
} elseif (file_exists("../includes/config.inc.php")) {
	require ('../includes/config.inc.php');
	$folder_level = FOLDER_LEVEL_2;
} else {
	$body = "Page:header.inc.html\rline10-config.inc.php file not found\rEND email";
	mail("hello@dukesnuz.com", "ERROR DukesNuz", $body, "hello@dukesnuz.com");
	die("OOppss! System error. We apologize for in inconvenience. Error has been reported to Dukesnez");
}
// add page title for tracking history
$title = "Portfolio | David Petringa";
?>
<!--
* David'd online portfolio
-->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="description" content="David Petringa Online Portfolio as a Front | Back end web developer. Skills coding with HTML, CSS, JavaScript, jQuery, PHP, MySQL, Filemaker.">
		<meta name="keywords" content="David Petringa, HTML, CSS, JavaScript, jQuery, PHP, MySQL, Filemaker, Logistics, Transportation, Freight Rates, Trucking, Freight Broker">
		<meta name="author" content="David Petringa February 2017">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<title>Portfolio | David Petringa</title>

		<link rel = "stylesheet" href = "../css_libs/dukes_normalize.css"/>
		<link rel="stylesheet" href="../styles/portfolio_mobile.css"/>
		<link rel="stylesheet" href="../styles/portfolio_desktop.css"/>

		<link rel = "shortcut icon" type="image/x-icon" href="../d/images/favicon.ico">

		<!-- using my library file -->
		<script type="text/javascript" src = "../js_libs/dukes.javascript.js"></script>

		<script type="text/javascript" src = "../js/portfolio_data.js?x=99"></script>
		<script type="text/javascript" src = "../js/portfolio.js"></script>
		<script type="text/javascript" src = "../js/submit_contact_form.js"></script>
	</head>

	<body>
		<main>
			<header class = "banner">
				<!--NOTE: I am leaving the headings empty. If I add &nbsp; the left margin is pushed right
				and does not line up with other headings below it. I could have dynamically created
				the h1 and h2 tags and then added the id. I am leaving as is since it validates with
				only a warning.-->
				<h1 id = "name"></h1>
				<div id = "slogan">
					<h2></h2>
				</div>
			</header>

			<section>
				<header>
					<h3>About Me</h3>
				</header>
				<div class = "flex-container aboutMe">
					<div>
						<p>
							Boston, Ma
						</p>
						<p>
							Skills include &#126; HTML, CSS, JavaScript, jQuery, Ajax, Api Integration, PHP, MySQL, Filemaker, Angular 2, Laravel
						</p>
						<p>
							<!--I am using CSS set to diplay none. Reason for this line. I want see if when posting to social media,
							this image will display instead of my wonderful portrait img.-->
							<img src = "https://cdn.instructables.com/ORIG/FNY/QE4E/I5J55BV3/FNYQE4EI5J55BV3.png" alt="Keep Calm and Try Coding" class = "hide"/>

						</p>
						<p>
							Education: Harvard Extension School
							<br>
							Dynamic Web Applications - Learned The Laravel Framework
						</p>
						<p>
							Education: Harvard Extension School
							<br>
							Web Programing Using JavaScript - Learned JavaScript
						</p>
						<p>
							Education: Harvard Extension School
							<br>
							Website Developemnt - Learned HTML and CSS
						</p>
						<p>
							Self-taught &#126; Bootstrap, Filemaker, PHP, MySQL, Github, Angular, Vuejs
						</p>
						<p>
							A complete list of <a href="http://dukesnuz.com/self-study-courses/courses-menu/dukesnuz-david-petringa/" style="display: inline;">Courses</a>
						</p>
						<p>
							Northeatern University &#126; BS Economics
						</p>
						<p>
							<a href="#contactForm">Details available upon request.</a>
						</p>
					</div>
					<div>

						<img src = '../images/harvard_id_picture_5.jpg' alt = 'me' width= "150" height = "150">

					</div>

				</div>
			</section >

			<section>
				<header>
					<h3>&nbsp;Objective</h3>
				</header>
				<div  class = "flex-container objective">

					<div>
						<p>
							Front End Web Developer
						</p>
					</div>

					<div>
						<p>
							Back End Web Developer
						</p>
					</div>

				</div>
			</section >

			<section>
				<header>
					<h3>&nbsp;My Works of Art</h3>
				</header>
				<div  class = "flex-container work">
					<div class = "imageMenu">
						<ul>
							<li>
								<a href="" target="blank"><img src = "../images/p4.png" id = "p4" alt="Project 4 HES Class Dynamic Web Application"></a>
							</li>
							<li>
								<a href="" target="blank"><img src = "../images/davidpetringa_net.png" id = "davidPetringa_net" alt="David Petringa's Angular web App"></a>
							</li>
							<li>
								<a href="" target="blank"><img src = "http://www.ajaxtransport.com/images/ajaxdrones_screen_shot_300x132.png" id = "ajaxDrones" alt="Ajax Drones - A blog about drones"></a>
							</li>
							<li>
								<a href="" target="blank"><img src = "http://www.ajaxtransport.com/images/popsfoodcreations_screen_300x132.png" id = "popsFoodCreations" alt="Pops Food Creation - A food truck in Meridith, NH"></a>
							</li>
							<li>
								<a href="" target="blank"><img src = "../images/capemediation.png" id = "capeMediation" alt = "Cape Mediation"></a>
							</li>
							<li>
								<a href="" target="blank"><img src = "../images/thebfund.png" id = "theBFund" alt = "The B Fund"></a>
							</li>
							<li>
								<a href="" target="blank"><img src = "../images/the_dom_page_image.png" id = "theDom" alt = "The Dom Document Object Model"></a>
							</li>
							<li>
								<a href="" target="blank"><img src = "../images/ajaxtransport.png" id = "ajaxTransport" alt = "Ajax Transport Home Page"></a>
							</li>
							<li>
								<a href="" target="blank"><img src = "../images/thecentraldispatch.png" id = "theCentralDispatch" alt = "Transportation Links at The Central Dispatch"></a>
							</li>
							<li>
								<a href="" target="blank"><img src = "../images/loadedandrolling.png" id = "loadedAndRolling" alt = "Loaded and Rolling"></a>
							</li>
							<li>
								<a href="" target="blank"><img src = "../images/mortgage_calculator.png" id = "mortgageCalculator" alt = "Mortgage Calculator Using JavaScript"></a>
							</li>
							<li>
								<a href="" target="blank"><img src = "../images/get_the_blob.png" id = "getTheBlob" alt = "Get The Blob Game Using JavaScript and api"></a>
							</li>
							<li>
								<a href="" target="blank"><img src = "../images/bookmarklets.png" id = "bookmarklets" alt = "Bookmarklets Created with JavaScript, PHP and MySQL"></a>
							</li>
							<li>
								<a href="" target="blank"><img src = "../images/web_develop_home.png" id = "webDevHome" alt = "Home Page for Fundamentals of Web Developement Using JavaScript at Harvard Extension School"></a>
							</li>
							<li>
								<a href="" target="blank"><img src = "../images/davidpetringa_dot_com.png" id = "davidPetringa" alt = "Blog Using PHP and MySQL"></a>
							</li>
							<li>
								<a href="" target="blank"><img src = "../images/intro_using%20javascript_home.png" id = "introWebProgHome" alt = "Home Page For Introduction to Web Programming at Harvard Extension School"></a>
							</li>
							<li>
								<a href="" target="blank"><img src = "../images/html_brunch_5.png" id = "htmlBrunch5Home" alt = "Home Page For HTML5 Brunch Season 5"></a>
							</li>
							<li>
								<a href="" target="blank"><img src = "../d/artgallery/images/filemaker_using_mysql.jpg" id = "filemakermysqlpictures" alt = "Filemaker using Execute SQL Script"></a>
							</li>
						</ul>

					</div>
					<div class = "imageDescription">
						<ul>
							<li>
								My Portfolio of my current work.
							</li>
							<li>
								As my knowledge and experience has increased, I feel my work has tremendously improved. Scroll through my
								projects.
							</li>
							<li>
								I hope you enjoy viewing them as much as I have enjoyed coding them.
							</li>
							<li  id = 'descLink'>
								<a href = "http://www.dukesnuz.com">Home</a>
							</li>
						</ul>
					</div>
				</div>
			</section >

			<section>
				<header>
					<h3>&nbsp;Contact</h3>
				</header>
				<div id = "contactForm">
					<form action = "../ajax/ajax_contact.php" method = "POST" id  = "contact">
						<fieldset>
							<legend>
								Let's be friends
							</legend>
							<p>
								<label for = "firstName">First Name</label>
								<input type = "text" name = "firstName" id = "firstName" placeholder = "Your First Name">
							</p>
							<div id = "fnError" class = "error">
								&nbsp;
							</div>

							<p>
								<label for = "lastName">Last Name</label>
								<input type = "text" name = "lastName" id = "lastName" placeholder = "Your Last Name">
							</p>
							<div id = "lnError" class = "error">
								&nbsp;
							</div>

							<p>
								<label for = "email">Email</label>
								<input type = "email" name = "email" id = "email" placeholder="Your Email">
							</p>
							<div id = "eError" class = "error">
								&nbsp;
							</div>

							<p>
								<label for = "message">Message </label>
								<textarea name = "message" id = "message" cols = "3" rows = "10" placeholder="Your Wonderful Message"></textarea>
							</p>
							<div id = "mError" class = "error">
								&nbsp;
							</div>

							<p>
								<button type="submit" name = "button" id = "button" value = "message">
									Submit
								</button>
							</p>
						</fieldset>
					</form>
				</div>
				<div id = "formResponse">
					<p>
						Form includes my coded CAPTCHA.
					</p>
				</div>
			</section>
			<footer>

				<div  class = "flex-container">
					<div>
						<ul>
							<li>
								Coded February 2017
							</li>
							<li>
								<a href = "http://dukesnuz.com/">Home</a>
							</li>
							<li>
								<a href = "http://dukesnuz.com/about/dukesnuz/david/petringa/">About</a>
							</li>
							<li>
								<a href = "http://dukesnuz.com/blog/">Blog</a>
							</li>
						</ul>
					</div>

					<div>
						<ul>
							<li>
								Let' s Be Social
							</li>
							<li>
								<a href = "https://www.linkedin.com/in/davidpetringa/">Let's Connect on Linkedin</a>
							</li>
							<li>
								<a href = "https://twitter.com/Dukesnuz/">Let's Connect on twitter</a>
							</li>
							<li>
								<a href = "https://github.com/dukesnuz/">Let's Connect on GitHub</a>
							</li>
						</ul>
					</div>

					<div>
						<ul>
							<li>
								Coded Files Used
							</li>
							<li  id = "codedPages1"></li>
							<li  id = "codedPages2"></li>
							<li  id = "codedPages3"></li>
							<li  id = "codedPages4"></li>
							<li  id = "codedPages5"></li>
							<li  id = "codedPages6"></li>
						</ul>
					</div>
				</div>
			</footer>
		</main>

		<!-- Start of StatCounter Code for Default Guide-->
		<script type="text/javascript">
			var sc_project = 6080262;
			var sc_invisible = 1;
			var sc_security = "ed805b7b";
			var scJsHost = (("https:" == document.location.protocol) ? "https://secure." : "http://www.");
			document.write("<sc" + "ript type='text/javascript' src='" + scJsHost + "statcounter.com/counter/counter.js'></" + "script>");
		</script>
		<noscript>
			<div class="statcounter">
				<a title="shopify site
				analytics" href="http://statcounter.com/shopify/"
				target="_blank"><img class="statcounter"
				src="http://c.statcounter.com/6080262/0/ed805b7b/1/"
				alt="shopify site analytics"></a>
			</div>
		</noscript>
		<!--End of StatCounter Code for Default Guide -->
		<?php
		if (file_exists('./site_utilities/page_history.inc.php')) {
			include ('./site_utilities/page_history.inc.php');
		} elseif (file_exists('../site_utilities/page_history.inc.php')) {
			include ('../site_utilities/page_history.inc.php');
		} else {
			$body = "Page: site_utilities/footer.inc.php\rline 15 history.inc.php could not found\rEND email";
			mail(CONTACT_EMAIL, "ERROR DukesNuz", $body, CONTACT_EMAIL);
			//echo $body;
			exit();
		}
		?>
	</body>

</html>
