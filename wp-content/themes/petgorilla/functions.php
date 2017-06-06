<?php
/**
 * PetGorilla custom functions and definitions
 *
 * @link http://www.petgorilla.com
 *
 * @package WordPress
 * @subpackage New2017
 * @since 2.0
 * @version 2.0
 */

/* ==== PetGorilla only works in WordPress 4.4 or later.  ==== */

/*
========================================
 Theme Includes
========================================
*/

//** Menu Walker **//
//require get_template_directory().'/inc/petg-walker.php';

//** Custom Taxonomies **//
require get_template_directory().'/inc/petg-taxonomies.php';

//** Custom Post-Types **//
require get_template_directory().'/inc/petg-admin-meta.php';

//** Custom Template Helpers **//
require get_template_directory() . '/inc/petg-tags.php';

//** Custom Template Functions **//
require get_template_directory() . '/inc/petg-functions.php';

//** Custom Walker Functions **//
require get_template_directory() . '/inc/petg-walker.php';

/* 
========================================
 Theme Setup & Support
========================================
*/

// ----------------------
//** SECURITY HEADER CLEANUP **//
// 
// Make function live only when moving from staging to deployment.

/*
if ( ! function_exists( 'security_header_cleanup' ) ) :

	function security_header_cleanup () {
		
	    remove_action('wp_head', 'wp_generator');
	    remove_action('wp_head', 'wlwmanifest_link');
	    remove_action('wp_head', 'rsd_link');
	    remove_action('wp_head', 'wp_shortlink_wp_head');
	
	    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
	
	    add_filter('the_generator', '__return_false');
	    add_filter('show_admin_bar','__return_false');
	
	    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );  
	    remove_action( 'wp_print_styles', 'print_emoji_styles' );
	    
	}
	
endif;

add_action('after_setup_theme', 'security_header_cleanup');

remove_filter( 'pre_term_description', 'wp_filter_kses' );
remove_filter( 'pre_link_description', 'wp_filter_kses' );
remove_filter( 'pre_link_notes', 'wp_filter_kses' );
remove_filter( 'term_description', 'wp_kses_data' );
	
*/

// ----------------------
//** PET GORILLA SETUP **//

if ( ! function_exists( 'petgorilla_setup' ) ) :

	function petgorilla_setup() {
		
		add_theme_support( 'custom-logo', 
			array(
				'height'      => 75,
				'width'       => 376,
				'flex-height' => true,
				'flex-width'  => true,
				'header-text' => array( 'site-title', 'site-description' ),
			) 
		);
		add_theme_support('menus');
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
	
		add_theme_support( 'post-formats', array(
			'video',
			'link',
			'gallery',
		) );
		
		add_theme_support( 'post-thumbnails' );
		//set_post_thumbnail_size( 1920, 315, true );
		
		register_nav_menu('primary', 'Primary Navigation Menu');

		//add_editor_style( array( 'css/editor-style.css', twentysixteen_fonts_url() ) );
	}
	
endif;

add_action( 'after_setup_theme', 'petgorilla_setup' );

/*
========================================
 Scripts Support
========================================
*/

// ---------------------------------------
//** PET GORILLA JAVASCRIPT DETECTION **//
// 
// Handles JavaScript detection. 
// Adds a `js` class to the root `<html>` element when JavaScript is detected.
	 
if ( ! function_exists( 'petgorilla_javascript_detection' ) ) :

	function petgorilla_javascript_detection() {
		echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
	}
	
endif;
	
add_action( 'wp_head', 'petgorilla_javascript_detection', 0 );


// ---------------------------------------
//** PET GORILLA SCRIPT QUE **//

if ( ! function_exists( 'petgorilla_script_que' ) ) :
	function petgorilla_script_que() {
		
		//global $post;
		
		wp_enqueue_style('petg-css-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '3.3.5', 'all' );
		wp_enqueue_style('petg-css-fontawesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.7.0', 'all' );
	 	wp_enqueue_style('style', get_stylesheet_uri() );
	 	wp_enqueue_style('petg-css-mediaqueries', get_template_directory_uri() . '/assets/css/media-queries.css', array(), '1.0', 'all' );
	 	
	 	//wp_enqueue_script("json2");
	 	wp_enqueue_script("jquery"); // jQuery Core
	 	wp_enqueue_script("jquery-effects-core"); // jQuery UI
	 	//wp_enqueue_script('jquery-masonry' ); // jQuery Masonry Library
	 	wp_enqueue_script('petg-js-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '20130605', true ); // Bootstrap/Normalize Library
	 	
	 	
	 	wp_enqueue_script('petg-js-functions', get_template_directory_uri() . '/assets/js/functions.js', array( 'jquery' ), '20170531', true ); // Main Functions
		wp_enqueue_script('petg-js-ganalytics', get_template_directory_uri() . '/assets/js/analytics.js',array('petg-js-functions'), '20170531', true); // Google Analytics
		
	}
endif;

add_action( 'wp_enqueue_scripts', 'petgorilla_script_que' );
	
	
/*
========================================
 Theme Functions
========================================
*/
	
	
	