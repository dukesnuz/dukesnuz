 <?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package VW Restaurant Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','vw-restaurant-lite'); ?></a></div>

<div class="header">
  <div class="container">
    <div class="logo col-md-2 col-sm-2 wow bounceInDown">                        
      <?php if( has_custom_logo() ){ vw_restaurant_the_custom_logo();
       }else{ ?>                        
      <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_attr(bloginfo( 'name' )); ?></a></h1>
      <?php $description = get_bloginfo( 'description', 'display' );
      if ( $description || is_customize_preview() ) : ?> 
        <p class="site-description"><?php echo esc_html($description); ?></p>       
      <?php endif; }?>
    </div>    

    <div class="menubox col-md-8 col-sm-8 ">                       
      <div class="nav">
          <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
      </div>
    </div>

    <div class="social-media col-md-2 col-sm-2 wow bounceInDown">
      <?php if( get_theme_mod('vw_restaurant_lite_headertwitter') != '' ){ ?>
        <a href="<?php echo esc_url( get_theme_mod( 'vw_restaurant_lite_headertwitter','https://twitter.com/' ) ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
      <?php } ?>
      <?php if( get_theme_mod('vw_restaurant_lite_headerpinterest') != '' ){ ?>
        <a href="<?php echo esc_url( get_theme_mod( 'vw_restaurant_lite_headerpinterest','https://pinterest.com/' ) ); ?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
      <?php } ?>
      <?php if( get_theme_mod('vw_restaurant_lite_headerfacebook') != '' ){ ?>
        <a href="<?php echo esc_url( get_theme_mod( 'vw_restaurant_lite_headerfacebook','https://www.facebook.com/' ) ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
      <?php } ?>
      <?php if( get_theme_mod('vw_restaurant_lite_headeryoutube') != '' ){ ?>
        <a href="<?php echo esc_url( get_theme_mod( 'vw_restaurant_lite_headeryoutube','' ) ); ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a>
      <?php } ?>
      <?php if( get_theme_mod('vw_restaurant_lite_headerinstagram') != '' ){ ?>
        <a href="<?php echo esc_url( get_theme_mod( 'vw_restaurant_lite_headerinstagram','' ) ); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
      <?php } ?>
    </div> 

  </div>

</div>
  </div><!-- header -->