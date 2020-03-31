<?php
/**
 * VW Restaurant Lite Theme Customizer
 *
 * @package VW Restaurant Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_restaurant_lite_customize_register( $wp_customize ) {	

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_restaurant_lite_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-restaurant-lite' ),
	    'description' => __( 'Description of what this panel does.', 'vw-restaurant-lite' ),
	) );



	//home page slider
	$wp_customize->add_section('vw_restaurant_lite_slidersettings',array(
		'title'	=> __('Slider Settings','vw-restaurant-lite'),
		'description'	=> __('Add slider images here.','vw-restaurant-lite'),
		'priority'	=> null,
		'panel' => 'vw_restaurant_lite_panel_id',
	));

	$wp_customize->add_setting('vw_restaurant_lite_slide_number',array(
		'default'	=> __('3','vw-restaurant-lite'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));

	$wp_customize->add_control('vw_restaurant_lite_slide_number',array(
		'label'	=> __('Number of slides to show','vw-restaurant-lite'),
		'section'	=> 'vw_restaurant_lite_slidersettings',
		'type'		=> 'number'
	));

	$count =  get_theme_mod('vw_restaurant_lite_slide_number', 3);

	for($i=1;$i<=$count;$i++) {

		$wp_customize->add_setting('vw_restaurant_lite_slide_image'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
		));
		
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'vw_restaurant_lite_slide_image'.$i,array(
            'label' => __('Slide Image ','vw-restaurant-lite').$i.__('(1440x700)','vw-restaurant-lite'),
            'section' => 'vw_restaurant_lite_slidersettings',
            'settings' => 'vw_restaurant_lite_slide_image'.$i
		)));

		$wp_customize->add_setting('vw_restaurant_lite_slide_title'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field',
		));
		
		$wp_customize->add_control('vw_restaurant_lite_slide_title'.$i,array(
			'label'	=> __('Slide Title ','vw-restaurant-lite').$i,
			'section'	=> 'vw_restaurant_lite_slidersettings',
			'type'	=> 'text'
		));
		
		$wp_customize->add_setting('vw_restaurant_lite_slide_desc'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field',
		));
		
		$wp_customize->add_control('vw_restaurant_lite_slide_desc'.$i,array(
			'label' => __('Slide Description','vw-restaurant-lite').$i,
			'section' => 'vw_restaurant_lite_slidersettings',
			'setting'	=> 'vw_restaurant_lite_slide_desc'.$i,
			'type'	=> 'textarea'
		));
		
	}

	//Social Icons(topbar)
	$wp_customize->add_section('vw_restaurant_lite_topbar_header',array(
		'title'	=> __('Social Icon Section','vw-restaurant-lite'),
		'description'	=> __('Add Header Content here','vw-restaurant-lite'),
		'priority'	=> null,
		'panel' => 'vw_restaurant_lite_panel_id',
	));

	$wp_customize->add_setting('vw_restaurant_lite_headertwitter',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('vw_restaurant_lite_headertwitter',array(
		'label'	=> __('Add twitter link','vw-restaurant-lite'),
		'section'	=> 'vw_restaurant_lite_topbar_header',
		'setting'	=> 'vw_restaurant_lite_headertwitter',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_restaurant_lite_headerpinterest',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('vw_restaurant_lite_headerpinterest',array(
		'label'	=> __('Add pinterest link','vw-restaurant-lite'),
		'section'	=> 'vw_restaurant_lite_topbar_header',
		'setting'	=> 'vw_restaurant_lite_headerpinterest',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('vw_restaurant_lite_headerfacebook',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('vw_restaurant_lite_headerfacebook',array(
		'label'	=> __('Add facebook link','vw-restaurant-lite'),
		'section'	=> 'vw_restaurant_lite_topbar_header',
		'setting'	=> 'vw_restaurant_lite_headerfacebook',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('vw_restaurant_lite_headeryoutube',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('vw_restaurant_lite_headeryoutube',array(
		'label'	=> __('Add Youtube link','vw-restaurant-lite'),
		'section'	=> 'vw_restaurant_lite_topbar_header',
		'setting'	=> 'vw_restaurant_lite_headeryoutube',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('vw_restaurant_lite_headerinstagram',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('vw_restaurant_lite_headerinstagram',array(
		'label'	=> __('Add Instagram link','vw-restaurant-lite'),
		'section'	=> 'vw_restaurant_lite_topbar_header',
		'setting'	=> 'vw_restaurant_lite_headerinstagram',
		'type'	=> 'text'
	));

	/* We Believe Section */
	$wp_customize->add_section('vw_restaurant_lite_homepage_sec',array(
		'title'	=> __('Services','vw-restaurant-lite'),
		'description'	=> __('Add We Believe sections content here.','vw-restaurant-lite'),
		'panel' => 'vw_restaurant_lite_panel_id',
	));

	$wp_customize->add_setting('vw_restaurant_lite_service_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));

	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_restaurant_lite_service_image',array(
        'label' => __('service side image','vw-restaurant-lite'),
        'section' => 'vw_restaurant_lite_homepage_sec',
        'settings' => 'vw_restaurant_lite_service_image'
	)));
		
	$wp_customize->add_setting('vw_restaurant_lite_section1_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_restaurant_lite_section1_title',array(
		'label'	=> __('Title','vw-restaurant-lite'),
		'section'	=> 'vw_restaurant_lite_homepage_sec',
		'setting'	=> 'vw_restaurant_lite_section1_title',
		'type'		=> 'text'
	));
	
	$wp_customize->add_setting('vw_restaurant_lite_section1_subtitle',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_restaurant_lite_section1_subtitle',array(
		'label'	=> __('Sub title','vw-restaurant-lite'),
		'section'	=> 'vw_restaurant_lite_homepage_sec',
		'setting'	=> 'vw_restaurant_lite_section1_subtitle',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_restaurant_lite_section1_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'wp_kses_post'
	));
	
	$wp_customize->add_control('vw_restaurant_lite_section1_text',array(
		'label'	=> __('Text','vw-restaurant-lite'),
		'section'	=> 'vw_restaurant_lite_homepage_sec',
		'setting'	=> 'vw_restaurant_lite_section1_text',
		'type'		=> 'textarea'
	));

	$wp_customize->add_setting('vw_restaurant_lite_section1_button',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_restaurant_lite_section1_button',array(
		'label'	=> __('Button Label','vw-restaurant-lite'),
		'section'	=> 'vw_restaurant_lite_homepage_sec',
		'setting'	=> 'vw_restaurant_lite_section1_button',
		'type'		=> 'text'
	));
	
	$wp_customize->add_setting('vw_restaurant_lite_section1_link',array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
	));
		
	$wp_customize->add_control('vw_restaurant_lite_section1_link',array(
		'label'	=> __('Section Link ','vw-restaurant-lite'),
		'section'	=> 'vw_restaurant_lite_homepage_sec',
		'type'		=> 'text'
	));

	/*Contact Us*/
	$wp_customize->add_section('vw_restaurant_lite_contact_us',array(
		'title'	=> __('Contact Us','vw-restaurant-lite'),
		'description'	=> __('Add contact page sections content here.','vw-restaurant-lite'),
		'panel' => 'vw_restaurant_lite_panel_id'
	));
	
	$wp_customize->add_setting('vw_restaurant_lite_our_address',array(
		'default'	=> '',
		'sanitize_callback'	=> 'wp_kses_post'
	));
	
	$wp_customize->add_control('vw_restaurant_lite_our_address',array(
		'label'	=> __('Add Address here.','vw-restaurant-lite'),
		'section'	=> 'vw_restaurant_lite_contact_us',
		'setting'	=> 'vw_restaurant_lite_our_address',
		'type'		=> 'textarea'
	));
	$wp_customize->add_setting('vw_restaurant_lite_contact',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_restaurant_lite_contact',array(
		'label'	=> __('Add Number here.','vw-restaurant-lite'),
		'section'	=> 'vw_restaurant_lite_contact_us',
		'setting'	=> 'vw_restaurant_lite_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_restaurant_lite_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_restaurant_lite_email',array(
		'label'	=> __('Add Email address here.','vw-restaurant-lite'),
		'section'	=> 'vw_restaurant_lite_contact_us',
		'setting'	=> 'vw_restaurant_lite_email',
		'type'		=> 'text'
	));
	
	$wp_customize->add_section('vw_restaurant_lite_footer_section',array(
		'title'	=> __('Footer Text','vw-restaurant-lite'),
		'description'	=> __('Add some text for footer like copyright etc.','vw-restaurant-lite'),
		'panel' => 'vw_restaurant_lite_panel_id'
	));
	
	$wp_customize->add_setting('vw_restaurant_lite_footer_copy',array(
		'default'	=> 'VW Restaurant Theme',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_restaurant_lite_footer_copy',array(
		'label'	=> __('Copyright Text','vw-restaurant-lite'),
		'section'	=> 'vw_restaurant_lite_footer_section',
		'type'		=> 'text'
	));
	
}
add_action( 'customize_register', 'vw_restaurant_lite_customize_register' );	

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function vw_restaurant_lite_customize_preview_js() {
	wp_enqueue_script( 'vw_restaurant_lite_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'vw_restaurant_lite_customize_preview_js' );


/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class vw_restaurant_lite_customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'vw_restaurant_lite_customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new vw_restaurant_lite_customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'title'    => esc_html__( 'VW Restaurant Pro', 'vw-restaurant-lite' ),
					'pro_text' => esc_html__( 'Go Pro',         'vw-restaurant-lite' ),
					'pro_url'  => 'https://www.vwthemes.com/premium/food-restaurant-wordpress-theme/'
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-restaurant-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-restaurant-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
vw_restaurant_lite_customize::get_instance();