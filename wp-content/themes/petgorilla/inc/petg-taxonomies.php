<?php
/**
 * Contains Custom Taxonomies for the Pet Gorilla Theme
 *
 * @package PetGorilla
 * @subpackage New2017
 * @since 2.0
 * @version 2.0
 */
 
if ( ! function_exists( 'speciality_taxonomy' ) ) :

	// Register Custom Taxonomy
	function speciality_taxonomy() {
	
		$labels = array(
			'name'                       => _x( 'Specialities', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Speciality', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Speciality', 'text_domain' ),
			'all_items'                  => __( 'All Specialities', 'text_domain' ),
			'parent_item'                => __( 'Parent Speciality', 'text_domain' ),
			'parent_item_colon'          => __( 'Parent Speciality:', 'text_domain' ),
			'new_item_name'              => __( 'New Speciality Name', 'text_domain' ),
			'add_new_item'               => __( 'Add New Speciality', 'text_domain' ),
			'edit_item'                  => __( 'Edit Speciality', 'text_domain' ),
			'update_item'                => __( 'Update Speciality', 'text_domain' ),
			'view_item'                  => __( 'View Item', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separate speciality with commas', 'text_domain' ),
			'add_or_remove_items'        => __( 'Add or remove speciality', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used specialities', 'text_domain' ),
			'popular_items'              => __( 'Popular Specialities', 'text_domain' ),
			'search_items'               => __( 'Search specialities', 'text_domain' ),
			'not_found'                  => __( 'Not Found', 'text_domain' ),
			'no_terms'                   => __( 'No items', 'text_domain' ),
			'items_list'                 => __( 'Specialities list', 'text_domain' ),
			'items_list_navigation'      => __( 'Specialities list navigation', 'text_domain' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'speciality', array( 'page' ), $args );
	
	}
	add_action( 'init', 'speciality_taxonomy', 0 );
	
endif;

if ( ! function_exists( 'slider_taxonomy' ) ) :

	function slider_taxonomy() {
	
		$labels = array(
			'name'                       => _x( 'Sliders', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Slider', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Sliders', 'text_domain' ),
			'all_items'                  => __( 'All Sliders', 'text_domain' ),
			'parent_item'                => __( 'Parent Slider', 'text_domain' ),
			'parent_item_colon'          => __( 'Parent Slider:', 'text_domain' ),
			'new_item_name'              => __( 'New Slider Name', 'text_domain' ),
			'add_new_item'               => __( 'Add New Slider', 'text_domain' ),
			'edit_item'                  => __( 'Edit Slider', 'text_domain' ),
			'update_item'                => __( 'Update Slider', 'text_domain' ),
			'view_item'                  => __( 'View Slider', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separate slider with commas', 'text_domain' ),
			'add_or_remove_items'        => __( 'Add or remove slider', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used slider', 'text_domain' ),
			'popular_items'              => __( 'Popular Sliders', 'text_domain' ),
			'search_items'               => __( 'Search sliders', 'text_domain' ),
			'not_found'                  => __( 'Not Found', 'text_domain' ),
			'no_terms'                   => __( 'No sliders', 'text_domain' ),
			'items_list'                 => __( 'Sliders list', 'text_domain' ),
			'items_list_navigation'      => __( 'Sliders list navigation', 'text_domain' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'slider', array( 'slide', 'page' ), $args );
	
	}
	add_action( 'init', 'slider_taxonomy', 0 );
	
endif;