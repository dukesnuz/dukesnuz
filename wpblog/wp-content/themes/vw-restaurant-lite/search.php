<?php
/**
 * The template for displaying Search Results pages.
 * @package VW Restaurant
 * @subpackage vw-restaurant-lite
 * @since vw-restaurant-lite 1.0
 */

get_header(); ?>

<div class="title-box"  <?php var_dump(has_post_thumbnail()); 
    if( has_post_thumbnail() ){ ?> style="background-image:url('<?php the_post_thumbnail_url('full'); ?>') " 
    <?php }        
        else{  echo 'style="background-image:url('.esc_url(get_template_directory_uri()).'/images/defaultbanner.jpg)"';  
        }?>>
    <div class="container"> 
        <h1 class="entry-title"><?php printf( 'Results For: %s', '<span>' . get_search_query() . '</span>' ); ?></h1>   
    </div>
</div>

<div class="container">   
    <div class="middle-align" id="blog-right-sidebar">      
        <div class="col-md-9" id="content-vw">
            <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="postbox smallpostimage">                
                    <div class="col-md-5 wow bounceInUp"><?php if(has_post_thumbnail()) { the_post_thumbnail(); }     
                            else { ?><a href="<?php the_permalink(); ?>">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/default_thumb.jpg" title="<?php the_title();?>" alt="<?php the_title();?>"></a><?php } ?>   
                    </div>                  
                    <div class="col-md-7 wow bounceInUp">   
                        <h4 class="text-left"><?php the_title();?></h4>
                        <p><?php the_excerpt(); ?></p>              
                        <div class="metabox" style="padding:11px 0 0 0">                  
                            <span class="entry-date"><?php the_date(); ?></span>
                            <span class="entry-author"> <?php the_author(); ?> </span>
                            <span class="entry-comments"> <?php comments_number( '0 Comments', '0 Comments', '% Comments' ); ?>
                            </span>         
                        </div> 
                        <a href="<?php the_permalink();?>" class="blogbutton-small hvr-sweep-to-right">Read Full</a>   
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php endwhile; ?>
                <?php else : ?>
                <?php get_template_part( 'no-results', 'search' ); ?>
            <?php endif; ?>     
            <div class="navigation">
                <?php
                    // Previous/next page navigation.
                    the_posts_pagination( array(
                        'prev_text'          => __( 'Previous page', 'vw-restaurant-lite' ),
                        'next_text'          => __( 'Next page', 'vw-restaurant-lite' ),
                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-restaurant-lite' ) . ' </span>',
                    ) );
                ?>
            </div>
        </div>  
        <div class="col-md-3">      
            <?php get_sidebar('page'); ?>       
        </div>      
        <div class="clearfix"></div> 
    </div>
</div>

<?php get_footer(); ?>