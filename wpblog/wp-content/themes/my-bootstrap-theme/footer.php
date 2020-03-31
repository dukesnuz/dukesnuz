    <footer class="blog-footer">
      <p>Blog template built for <a href="http://getbootstrap.com">
      Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.
      </p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load
    faster -->
<script
src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/
jquery.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js">
    </script>
    
  <?php 

function bootstrap_jquery_scripts() {
	// Register the script
	wp_register_script( 'my-script', get_template_directory_uri() .
    '/bootstrap/js/bootstrap.js', array( 'jquery' ) );
	// Enqueue the script:
	wp_enqueue_script( 'my-script' );
}
add_action( 'wp_enqueue_scripts', 'bootstrap_jquery_scripts' );

?>
  </body>
</html>