<?php
// part 1
if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}
/**
 * Enqueue scripts and styles.
 */
function theme_scripts() {
	wp_enqueue_style( 'eshopper_owl_carousel_css',get_template_directory_uri() .'/lib/owlcarousel/assets/owl.carousel.min.css', array(), _S_VERSION );
	
	wp_enqueue_style( 'eshopper-theme', get_stylesheet_uri(), array(), _S_VERSION );
	
	
	/*== isotope Js ==*/
	wp_enqueue_script( 'eshopper-easing-js', get_template_directory_uri() . '/lib/easing/easing.min.js', array('jquery'), _S_VERSION, true );
	/*== swiper Js ==*/
	wp_enqueue_script( 'eshopper-owl-carousel-js', get_template_directory_uri() . '/lib/owlcarousel/owl.carousel.min.js', array('jquery'), _S_VERSION, true );
	/*== noframework Js ==*/
	wp_enqueue_script( 'eshopper-jqBootstrapValidation-js', get_template_directory_uri() . '/mail/jqBootstrapValidation.min.js', array('jquery'), _S_VERSION, true );
	/*== validate Js ==*/
	wp_enqueue_script( 'eshopper-contact-js', get_template_directory_uri() . '/mail/contact.js', array('jquery'), _S_VERSION, true );
	/*== main Js ==*/
	wp_enqueue_script( 'eshopper-main-js', get_template_directory_uri() . '/js/main.js',array('jquery'), _S_VERSION, true );	
	
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' ); //wp_enqueue_scripts is a hook /*theme_scripts function name

//part 2
register_nav_menu("topmenu",__("Top Menu"));
register_nav_menu("topmenu_auth",__("Top Menu Auth"));
register_nav_menu("footer-1",__("Footer Menu 1"));
register_nav_menu("footer-2",__("Footer Menu 2"));

function add_menu_link_class( $atts, $item, $args ) {
	if (property_exists($args, 'link_class')) {
	  $atts['class'] = $args->link_class;
	}
	return $atts;
  }
  add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );

// part 3

/* for submenu */
require_once get_template_directory() . '/inc/tgm.php';
if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
    // file does not exist... return an error.
    return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
    // file exists... require it.
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}

// part 4
 // add widget
add_action( 'widgets_init', 'wpdocs_register_widgets' );

function wpdocs_register_widgets() {
	register_sidebar( array(
		'name' => __( 'Footer Text', 'wpmu' ),
		'id' => 'footer_text',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => ''
	));
	register_sidebar( array(
		'name' => __( 'Product Searchar', 'wpmu' ),
		'id' => 'search_bar',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => ''
	));
	register_sidebar( array(
		'name' => __( 'Footer Contact', 'wpmu' ),
		'id' => 'footer_contact',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => ''
	));
}

// part 5

	//add menu in admin
	function setup_theme_admin_menus() {
		add_menu_page('Theme settings', 'My Theme Sailor', 'manage_options', 
			'tut_theme_settings', 'theme_settings_page');
			 
		add_submenu_page('tut_theme_settings', 
			'Front Page Elements', 'Page setting', 'manage_options', 
			'front-page-elements', 'theme_page_settings'); 
	}
	 
	// We also need to add the handler function for the top level menu
	function theme_settings_page() {
		echo "Settings page <input type='text'>";
	}
	

	function theme_page_settings() {
		if (isset($_POST["update_settings"])) {
			echo $_FILES["header_image"]["tmp_name"];
			/* save image */
			if(!empty($_FILES["header_image"]["tmp_name"])){           
				require_once( ABSPATH . 'wp-admin/includes/file.php' );
				$urls = wp_handle_upload($_FILES["header_image"], array('test_form' => false));
				$_POST['header_image']=$urls['url'];
			}else{
				$_POST['header_image']=isset(get_option("theme_footer_settings")['header_image'])?get_option("theme_settings")['header_image']:"";
			}
			/* /save image */

			unset($_POST["update_settings"]);
			update_option("theme_footer_settings", $_POST); /* save data to database */
			
		}

		if (isset($_POST["update_settings"])) {
			echo $_FILES["header_image"]["tmp_name"];
			/* save image */
			if(!empty($_FILES["header_image"]["tmp_name"])){           
				require_once( ABSPATH . 'wp-admin/includes/file.php' );
				$urls = wp_handle_upload($_FILES["header_image"], array('test_form' => false));
				$_POST['header_image']=$urls['url'];
			}else{
				$_POST['header_image']=isset(get_option("theme_footer_settings")['header_image'])?get_option("theme_footer_settings")['header_image']:"";
			}
			/* /save image */

			unset($_POST["update_settings"]);
			update_option("theme_footer_settings", $_POST); /* save data to database */
			
		}
		include('template_part/setting.php');
		
	}
	add_action("admin_menu", "setup_theme_admin_menus");

// part 6
	// custome logo

function themename_custom_logo_setup() {
	$defaults = array(
		'height'               => 100,
		'width'                => 100,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'site-title', 'site-description' ),
		'unlink-homepage-logo' => true, 
	);

	add_theme_support( 'custom-logo', $defaults );
}

add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

//part 7
	// add feature image
	add_theme_support( 'post-thumbnails' );
	the_post_thumbnail( 'thumbnail' ); // Thumbnail (default 150px x 150px max)
	the_post_thumbnail( 'medium' ); // Medium resolution (default 300px x 300px max)
	the_post_thumbnail( 'medium_large' ); // Medium-large resolution (default 768px x no height limit max)
	the_post_thumbnail( 'large' ); // Large resolution (default 1024px x 1024px max)
	the_post_thumbnail( 'full' ); // Original image resolution (unmodified)
	add_image_size( 'post_thumbnail', 616, 462, true ); // Hard Crop Mode

// part 8
	// custome post type
	function create_posttype() {
	
		register_post_type( 'sliders',
			array(
				'labels' => array(
					'name' => __( 'Home Page Slider' )
				),
				'supports' => array( 'title', 'editor', 'excerpt','author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => 'sliders'),
				'show_in_rest' => true,
			)
		);

		register_post_type( 'portfolio',
			array(
				'labels' => array(
					'name' => __( 'Portfolio' )
				),
				'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => 'portfolio'),
				'show_in_rest' => true,
			)
		);
	}
	// Hooking up our function to theme setup
	add_action( 'init', 'create_posttype' );

	