<?php
/**
 * Contains Custom Functions for the Pet Gorilla Theme
 *
 * @package PetGorilla
 * @subpackage New2017
 * @since 2.0
 * @version 2.0
 */
 
// ----------------------
//** Checks to see if we're on the homepage or not.

function petg_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}

// ----------------------
/** Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
 
function petg_body_classes( $classes ) {

	// Add class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Add class on front page.
/*
	if ( is_front_page() && 'posts' !== get_option( 'show_on_front' ) ) {
		$classes[] = 'is-home-page';
	}
*/

	// Add a class if there is a custom header.
/*
	if ( has_header_image() ) {
		$classes[] = 'has-header-image';
	}
*/

	// Add class if sidebar is used.
	if ( is_active_sidebar( 'sidebar-1' ) && ! is_page() ) {
		$classes[] = 'has-sidebar';
	}

	// Add class for one or two column page layouts.
	if ( is_page() || is_archive() ) {
		if ( 'one-column' === get_theme_mod( 'page_layout' ) ) {
			$classes[] = 'page-one-column';
		} else {
			$classes[] = 'page-two-column';
		}
	}

	// Add class if the site title and tagline is hidden.
	if ( 'blank' === get_header_textcolor() ) {
		$classes[] = 'title-tagline-hidden';
	}

	// Get the colorscheme or the default if there isn't one.
/*
	$colors = twentyseventeen_sanitize_colorscheme( get_theme_mod( 'colorscheme', 'light' ) );
	$classes[] = 'colors-' . $colors;
*/

	return $classes;
}
add_filter( 'body_class', 'petg_body_classes' );