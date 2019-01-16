<?php
/***************************************************************************************************************
 * This page can be included in a footer. It will be hidden and not dispaly on the page.
 * 1 Adds page view to page history db
 * 2 Adds tawk chat to page
 * 3 Adds stat counter to page
 * 4 may need to include this file on the page before including this page
 * 5 may need to add a $title = "some_title"
 * Here is an example of an insert
 * $title = "Extra Credit Assignment Two";
 * include('../includes/config.inc.php');
 * include('../site_utilities/footer_hidden.inc.php');
 *
 */
// page load to db
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

<!--Start of Tawk.to Script-->
<script type="text/javascript">
	var Tawk_API = Tawk_API || {},
	    Tawk_LoadStart = new Date();
	(function() {
		var s1 = document.createElement("script"),
		    s0 = document.getElementsByTagName("script")[0];
		s1.async = true;
		s1.src = 'https://embed.tawk.to/561278e100d3af75029e428b/default';
		s1.charset = 'UTF-8';
		s1.setAttribute('crossorigin', '*');
		s0.parentNode.insertBefore(s1, s0);
	})(); 
</script>
<!--End of Tawk.to Script-->

<!-- Start of StatCounter Code for Default Guide -->
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
<!-- End of StatCounter Code for Default Guide -->
