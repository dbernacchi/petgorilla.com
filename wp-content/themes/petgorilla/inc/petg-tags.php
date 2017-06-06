<?php
/**
 * Contains Custom Helpers for the Pet Gorilla Theme
 *
 * @package PetGorilla
 * @subpackage New2017
 * @since 2.0
 * @version 2.0
 */

//if ( function_exists( 'petg_print_custom_logo' ) ) {
	
	function petg_print_custom_logo() {
				
		$logo_id = get_theme_mod( 'custom_logo' );
		$img = wp_get_attachment_image_src( $logo_id , 'full' );
		echo '<img src="'.$img[0].'" alt="'.get_option('blogname').'" title="'.get_option('blogname').'" />';
	
	}
	
//}