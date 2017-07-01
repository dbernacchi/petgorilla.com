<?php
/**
 * Contains Custom Post-Types for the Pet Gorilla Theme
 *
 * @package PetGorilla
 * @subpackage New2017
 * @since 2.0
 * @version 2.0
 */
 
if ( ! function_exists( 'digital_projects_post_type' ) ) :

	function digital_projects_post_type() {
	
		$labels = array(
			'name'                  => _x( 'Digital Projects', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Digital Project', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Digital Projects', 'text_domain' ),
			'name_admin_bar'        => __( 'Project Post Type', 'text_domain' ),
			'archives'              => __( 'Project Archives', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Project:', 'text_domain' ),
			'all_items'             => __( 'All Projects', 'text_domain' ),
			'add_new_item'          => __( 'Add New Project', 'text_domain' ),
			'add_new'               => __( 'New Project', 'text_domain' ),
			'new_item'              => __( 'New Project', 'text_domain' ),
			'edit_item'             => __( 'Edit Project', 'text_domain' ),
			'update_item'           => __( 'Update Project', 'text_domain' ),
			'view_item'             => __( 'View Project', 'text_domain' ),
			'search_items'          => __( 'Search Projects', 'text_domain' ),
			'not_found'             => __( 'No project found', 'text_domain' ),
			'not_found_in_trash'    => __( 'No project found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Project Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set front facing image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove front facing image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as front facing image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into project', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this project', 'text_domain' ),
			'items_list'            => __( 'Projects list', 'text_domain' ),
			'items_list_navigation' => __( 'Projects list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter projects list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Digital Projects', 'text_domain' ),
			'description'           => __( 'Project information page', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'excerpt', 'thumbnail', 'page-attributes'),
			'taxonomies'            => array( 'digital_portfolio'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon' 		=> 'dashicons-layout',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'digital_project', $args );
	
	}
	add_action( 'init', 'digital_projects_post_type', 0 );

endif;
 
if ( ! function_exists( 'slides_post_type' ) ) :

	function slides_post_type() {
	
		$labels = array(
			'name'                  => _x( 'Project Slides', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Slide', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Slides', 'text_domain' ),
			'name_admin_bar'        => __( 'Slide Post Type', 'text_domain' ),
			'archives'              => __( 'Slide Archives', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Slide:', 'text_domain' ),
			'all_items'             => __( 'All Slides', 'text_domain' ),
			'add_new_item'          => __( 'Add New Slide', 'text_domain' ),
			'add_new'               => __( 'New Slide', 'text_domain' ),
			'new_item'              => __( 'New Slide', 'text_domain' ),
			'edit_item'             => __( 'Edit Slide', 'text_domain' ),
			'update_item'           => __( 'Update Slide', 'text_domain' ),
			'view_item'             => __( 'View Slide', 'text_domain' ),
			'search_items'          => __( 'Search Slides', 'text_domain' ),
			'not_found'             => __( 'No slide found', 'text_domain' ),
			'not_found_in_trash'    => __( 'No slide found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Slide Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set front facing image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove front facing image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as front facing image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into slide', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this slide', 'text_domain' ),
			'items_list'            => __( 'Slides list', 'text_domain' ),
			'items_list_navigation' => __( 'Slides list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter slides list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Slides', 'text_domain' ),
			'description'           => __( 'Slide information page', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'excerpt', 'thumbnail', 'page-attributes'),
			'taxonomies'            => array( 'slider'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon' 		=> 'dashicons-id',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'slide', $args );
	
	}
	add_action( 'init', 'slides_post_type', 0 );

endif;
 
 // ----------------------
//** CUSTOM META BOXES **//

if ( ! function_exists( 'petg_custom_meta_boxes' ) ) :

	function petg_custom_meta_boxes() {
	
		//$screens = array('page' );
	
		//foreach ( $screens as $screen ) {
			
			add_meta_box(
				'vimeo-id',
				__( 'Director Vimeo ID', 'petg' ),
				'vimeo_id_meta_callback',
				'page'
			);
		//}
		
		add_meta_box('slide-subtitle', __( 'Slide Sub-Title', 'petg' ), 'slide_subtitle_meta_callback','slide');
		add_meta_box('slide-type', __( 'Video Type', 'petg' ), 'slide_type_meta_callback','slide');
		add_meta_box('slide-link', __( 'Video Link', 'petg' ), 'slide_link_meta_callback','slide');
		
		add_meta_box('project-left-content', __( 'Left Content Box', 'petg' ), 'project_left_content_meta_callback','digital_project');
		//add_meta_box('project-right-content', __( 'Right Content Box', 'petg' ), 'project_right_content_meta_callback','digital_project');
		//add_meta_box('project-subtitle', __( 'Project Sub-Title', 'petg' ), 'project_subtitle_meta_callback','digital_project');
		add_meta_box('project-video-link', __( 'Video Link', 'petg' ), 'project_video_link_meta_callback','digital_project');
		
	}
endif;

add_action( 'add_meta_boxes', 'petg_custom_meta_boxes' );

// ----------------------
//** CALLBACKS **//

function vimeo_id_meta_callback($post){
	
	wp_nonce_field( 'vimeo_id_nonce', 'vimeo_id_nonce' );
	$value = get_post_meta( $post->ID, '_vimeo_id', true );
	echo '<input type="text" style="width:100%" id="vimeo_id" name="vimeo_id" value="' . esc_attr( $value ) . '" />';

}

function slide_subtitle_meta_callback($post){
	
	wp_nonce_field( 'slide_subtitle_nonce', 'slide_subtitle_nonce' );
	$value = get_post_meta( $post->ID, '_slide_subtitle', true );
	echo '<input type="text" style="width:100%" id="slide_subtitle" name="slide_subtitle" value="' . esc_attr( $value ) . '" />';

}

function slide_type_meta_callback($post){
	
	wp_nonce_field( 'slide_type_nonce', 'slide_type_nonce' );
	$value = get_post_meta( $post->ID, '_slide_type', true );
	$value = esc_attr($value);
	$select = '<select id="slide_type" name="slide_type">';
	$select .= '<option value="" '.($value != 'vimeo' && $value != 'youtube' ? 'selected' : '').'>Choose A Type</option>';
	$select .= '<option value="vimeo" '.($value == 'vimeo' ? 'selected' : '').'>Vimeo</option>';
	$select .= '<option value="youtube" '.($value == 'youtube' ? 'selected' : '').'>You Tube</option>';
	$select .= '</select>';
	
	echo $select;
}

function slide_link_meta_callback($post){
	
	wp_nonce_field( 'slide_link_nonce', 'slide_link_nonce' );
	$value = get_post_meta( $post->ID, '_slide_link', true );
	echo '<input type="text" style="width:100%" id="slide_link" name="slide_link" value="' . esc_attr( $value ) . '" />';

}

function project_left_content_meta_callback($post){
	
	wp_nonce_field( 'project_left_content_nonce', 'project_left_content_nonce' );
	wp_editor( htmlspecialchars_decode( get_post_meta($post->ID, '_project_left_content' , true ) ), 'project_left_content', $settings = array('textarea_name'=>'project_left_content') );

}

/*
function project_right_content_meta_callback($post){
	
	wp_nonce_field( 'project_right_content_nonce', 'project_right_content_nonce' );
	wp_editor( htmlspecialchars_decode( get_post_meta($post->ID, '_project_right_content' , true ) ), 'project_right_content', $settings = array('textarea_name'=>'project_right_content') );
	
}
*/

/*
function project_subtitle_meta_callback($post){
	
	wp_nonce_field( 'project_subtitle_nonce', 'project_subtitle_nonce' );
	$value = get_post_meta( $post->ID, '_project_subtitle', true );
	echo '<input type="text" style="width:100%;" id="project_subtitle" name="project_subtitle" value="' . esc_attr( $value ) . '" />';
}
*/

function project_video_link_meta_callback($post){
	
	wp_nonce_field( 'project_video_link_nonce', 'project_video_link_nonce' );
	$value = get_post_meta( $post->ID, '_project_video_link', true );
	echo '<input type="text" style="width:100%;" id="project_video_link" name="project_video_link" value="' . esc_attr( $value ) . '" />';
}


// ----------------------
//** SAVE META BOX **//

function save_custom_meta_boxes( $post_id ) {
	
	$metaboxes = array('vimeo_id','slide_subtitle','slide_type','slide_link','project_left_content','project_video_link');
	
	foreach($metaboxes as $val){
		
		if(!isset($_POST[$val.'_nonce'])){
			continue;
		}
		
		if(!wp_verify_nonce($_POST[$val.'_nonce'], $val.'_nonce' )){
			continue;
		}
		
		if(!isset($_POST[$val])){
        	continue;
    	}
    	
    	if($val === 'project_left_content' || $val === 'project_right_content'){
	    	
	    	$data = htmlspecialchars($_POST[$val]);
    	}else{
	    	
	    	$data = sanitize_text_field($_POST[$val]);
    	}
    	
    	

		update_post_meta( $post_id, '_'.$val, $data );
	}

	// Skips if Auto Save
    if(defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE){
        return;
    }

    // Check the user's permissions.
/*
    if(isset( $_POST['post_type'] ) && 'page' == $_POST['post_type']){

        if( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }

    }else {

        if( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }
*/


/*
    $data = sanitize_text_field( $_POST['vimeo_id'] );

    update_post_meta( $post_id, '_vimeo_id', $data );
*/
}

add_action( 'save_post', 'save_custom_meta_boxes' );


 