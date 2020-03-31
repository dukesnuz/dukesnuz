<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package VW Restaurant Lite
 */
?>
<div id="footer" class="copyright-wrapper">
	<div class="inner">
        <div class="copyright">
        <p><?php echo esc_attr(get_theme_mod('vw_restaurant_lite_footer_copy',__('VW Restaurant Theme','vw-restaurant-lite'))); ?> <?php echo vw_restaurant_lite_credit(); ?></p>
        </div><!-- copyright -->
        <div class="clear"></div>
    </div><!-- inner -->
</div>
    <?php wp_footer(); ?>

    </body>
</html>