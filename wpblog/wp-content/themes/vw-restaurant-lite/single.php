<?php
/**
 * The Template for displaying all single posts.
 *
 * @package VW Restaurant Lite
 */

get_header(); ?>

<div class="container">
    <div class="middle-align">
		<div class="col-md-9" id="content-vw">
			<?php while ( have_posts() ) : the_post(); ?>
				<h1><?php the_title();?></h1>
				<div class="metabox">
					<span class="entry-date"><?php echo esc_html( get_the_date() ); ?></span>
					<span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
					<span class="entry-comments"> <?php comments_number( __('0 Comment', 'vw-restaurant-lite'), __('0 Comments', 'vw-restaurant-lite'), __('% Comments', 'vw-restaurant-lite') ); ?> </span>
				</div>
				<?php if(has_post_thumbnail()) { ?>
					<hr>
					<div class="feature-box">	
						<img src="<?php the_post_thumbnail_url('full'); ?>" width="100%">
					</div>
					<hr>					
				<?php } 
				the_content();

				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'vw-restaurant-lite' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'vw-restaurant-lite' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );
					
				if ( is_singular( 'attachment' ) ) {
					// Parent post navigation.
					the_post_navigation( array(
						'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'vw-restaurant-lite' ),
					) );
				} elseif ( is_singular( 'post' ) ) {
					// Previous/next post navigation.
					the_post_navigation( array(
						'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'vw-restaurant-lite' ) . '</span> ' .
							'<span class="screen-reader-text">' . __( 'Next post:', 'vw-restaurant-lite' ) . '</span> ' .
							'<span class="post-title">%title</span>',
						'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'vw-restaurant-lite' ) . '</span> ' .
							'<span class="screen-reader-text">' . __( 'Previous post:', 'vw-restaurant-lite' ) . '</span> ' .
							'<span class="post-title">%title</span>',
					) );
				}
                
                echo '<div class="clearfix"></div>';
                
				the_tags(); 

                // If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
                ?>
            <?php endwhile; // end of the loop. ?>
       	</div>
		<div id="sidebar" class="col-md-3">
			<?php dynamic_sidebar('sidebar-2'); ?>
		</div>
        <div class="clearfix"></div>
    </div>
</div>
<?php get_footer(); ?>