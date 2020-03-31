<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package VW Restaurant Lite
 */

get_header(); ?>

<div id="content-vw" class="container">
    <div class="middle-align">       
        <div class="col-md-12">
            <?php 
            while ( have_posts() ) : the_post(); ?>
                <h1><?php the_title();?></h1>
                <?php the_content();

                wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'vw-restaurant-lite' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                    'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'vw-restaurant-lite' ) . ' </span>%',
                    'separator'   => '<span class="screen-reader-text">, </span>',
                ) );
                
                ?>               
            <?php endwhile; // end of the loop. ?>            
        </div>        
        <div class="clear"></div>    
    </div>
</div><!-- container -->

<?php get_footer(); ?>