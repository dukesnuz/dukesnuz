<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>
<?php /** slider section **/ ?>
<?php if( get_theme_mod('vw_restaurant_lite_slide_number',true) != '' ){ ?>
  <div class="slider-main">
      <?php 
          $slideimage = '';
          $slideno = array();
          $slideimage = array(
            '1' =>  get_template_directory_uri().'',
            '2' =>  get_template_directory_uri().'',
            '3' =>  get_template_directory_uri().'',
          );
          
          $count =  get_theme_mod('vw_restaurant_lite_slide_number', '3');
      ?>
      <div id="slider" class="nivoSlider">
          <?php 
              $n = 0;
              for($i=1;$i<=$count;$i++) {
              $n++;
              $slideno[] = $n;
          ?>
          <img src="<?php echo esc_url(get_theme_mod('vw_restaurant_lite_slide_image'.$i)); ?>" alt="<?php echo esc_attr(get_theme_mod('vw_restaurant_lite_slide_title'.$i)); ?>" title="#slidecaption<?php echo esc_html($i); ?>" />
            <?php } ?>
      </div> 
      <?php
      foreach( $slideno as $sln ){ ?>
          <div id="slidecaption<?php echo esc_html($sln); ?>" class="nivo-html-caption">
              <div class="slide-cap  ">
                  <div class="container">
                      <?php if( get_theme_mod('vw_restaurant_lite_slide_title'.$sln) != '' ){ ?>
                      <h4><?php esc_html_e('welcome to','vw-restaurant-lite'); ?></h4>
                          <h2><?php echo esc_attr(get_theme_mod('vw_restaurant_lite_slide_title'.$sln, __('VW THEME RESTAURANT','vw-restaurant-lite'))); ?></h2>
                      <?php } ?>
                      <?php if( get_theme_mod('vw_restaurant_lite_slide_desc'.$sln) != '' ){ ?>
                          <p><?php echo esc_attr(get_theme_mod('vw_restaurant_lite_slide_desc'.$sln, __('Modern Restaurant & Fast Food House','vw-restaurant-lite'))); ?></p>
                      <?php } ?>
                  </div>
              </div>
          </div>
          <?php
      } ?>
  </div>
<?php }?>
<?php do_action('vw_restaurant_lite_after_slider'); ?>

<section id="our-services" class="services flipInX">
    <div class="believe-image col-md-5 col-sm-5">
        <?php if( get_theme_mod('vw_restaurant_lite_service_image') != ''){ ?>
          <img src="<?php echo esc_url(get_theme_mod('vw_restaurant_lite_service_image',get_template_directory_uri().'/images/servicefood.jpg')); ?>" alt="">
        <?php } ?>
    </div>
    <div class="container text-center col-md-7 col-sm-7">
        <?php if( get_theme_mod('vw_restaurant_lite_section1_title') != ''){ ?>
        <h3 class="section-title col-sm-12"><?php echo esc_attr(get_theme_mod('vw_restaurant_lite_section1_title','We Believe')); ?></h3>
        <?php } ?>
        <?php if( get_theme_mod('vw_restaurant_lite_section1_subtitle') != ''){ ?>
        <div class="new-line innerlightbox">
            <q><?php echo esc_attr(get_theme_mod('vw_restaurant_lite_section1_subtitle','Bad Food Is Sin')); ?>
            </q>
        </div>
        <?php } ?>
        <div class="new-text col-md-12">
            <div align="center">
              <?php if( get_theme_mod('vw_restaurant_lite_section1_text') != ''){ ?>
               <p><?php echo esc_attr(get_theme_mod('vw_restaurant_lite_section1_text','Doner filet mignon bacon corned beef rump, francfurter sirloin brisket drumstick kielbasa ribeye baudin pancetta prosciutto. Ball tip jowl porchetta tongue strip steak pig. Turkey shankle bacon, swine doner biltong ball tip pork kielbasa tenderloin harm.')); ?>
               </p>
               <?php } ?>
            </div>
        </div> 
        <div class="clear"></div>
        <?php if( get_theme_mod('vw_restaurant_lite_section1_link') != ''){ ?>
          <div class="wow bounceInUp"><a class="button hvr-sweep-to-right"  href="<?php echo esc_url(get_theme_mod('vw_restaurant_lite_section1_link','#')); ?>"><?php echo esc_html(get_theme_mod('vw_restaurant_lite_section1_button','About Us')); ?></a>
          </div>
        <?php } ?>
    </div>
    <div class="clear"></div>
</section>

<?php do_action('vw_restaurant_lite_after_service'); ?>

<?php get_footer(); ?>