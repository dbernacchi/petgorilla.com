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

if ( ! function_exists( 'petg_excerpt' ) ) :

	function petg_excerpt( $class = 'entry-summary' ) {
		$class = esc_attr( $class );

		if ( has_excerpt() || is_search() ) : ?>
			<div class="<?php echo $class; ?>">
				<?php the_excerpt(); ?>
			</div><!-- .<?php echo $class; ?> -->
		<?php endif;
	}
endif;

if ( ! function_exists( 'petg_post_thumbnail' ) ) :

function petg_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div><!-- .post-thumbnail -->

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
	</a>

	<?php endif; // End is_singular()
}
endif;

if ( ! function_exists( 'petg_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags.
 *
 * Create your own petg_entry_meta() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function petg_entry_meta() {
	//if ( 'post' === get_post_type() ) {
/*
		$author_avatar_size = apply_filters( 'petg_author_avatar_size', 49 );
		printf( '<span class="byline"><span class="author vcard">%1$s<span class="screen-reader-text">%2$s </span> <a class="url fn n" href="%3$s">%4$s</a></span></span>',
			get_avatar( get_the_author_meta( 'user_email' ), $author_avatar_size ),
			_x( 'Author', 'Used before post author name.', 'petg' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			get_the_author()
		);
*/
	//}

/*
	if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
		petg_entry_date();
	}
*/

	$format = get_post_format();
	if ( current_theme_supports( 'post-formats', $format ) ) {
		printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
			sprintf( '<span class="screen-reader-text">%s </span>', _x( 'Format', 'Used before post format.', 'petg' ) ),
			esc_url( get_post_format_link( $format ) ),
			get_post_format_string( $format )
		);
	}

	if ( 'post' === get_post_type() ) {
		petg_entry_taxonomies();
	}

	if ( ! is_singular() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'petg' ), get_the_title() ) );
		echo '</span>';
	}
}
endif;

if ( ! function_exists( 'petg_entry_taxonomies' ) ) :
/**
 * Prints HTML with category and tags for current post.
 *
 * Create your own petg_entry_taxonomies() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function petg_entry_taxonomies() {
	$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'petg' ) );
	if ( $categories_list && petg_categorized_blog() ) {
		printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
			_x( 'Categories', 'Used before category names.', 'petg' ),
			$categories_list
		);
	}

	$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'petg' ) );
	if ( $tags_list ) {
		printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
			_x( 'Tags', 'Used before tag names.', 'petg' ),
			$tags_list
		);
	}
}
endif;

if ( ! function_exists( 'petg_categorized_blog' ) ) :
/**
 * Determines whether blog/site has more than one category.
 *
 * Create your own petg_categorized_blog() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @return bool True if there is more than one category, false otherwise.
 */
function petg_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'petg_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'petg_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so petg_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so petg_categorized_blog should return false.
		return false;
	}
}
endif;

if ( ! function_exists( 'petg_get_video' ) ) :
/**
 * gets a video
 *
 */
function petg_get_video() {

	$id = get_the_ID();

	$video_format = get_post_meta($id, 'video_format', true);

	$video_id = get_post_meta($id, 'video_id', true);

	if($video_format == 'youtube'){

		return '<iframe src="//www.youtube.com/embed/'.$video_id.'?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen=""  width="500" height="281"></iframe>';

	} elseif($video_format == 'vimeo') {

		return '<iframe src="//player.vimeo.com/video/'.$video_id.'?title=0&amp;byline=0&amp;portrait=0" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" width="500" height="281"></iframe>';

	}

}
endif;

if ( ! function_exists( 'petg_video' ) ) :
/**
 * displays a video
 *
 */
function petg_video() {

	print petg_get_video();

}
endif;

if ( ! function_exists( 'petg_image' ) ) :
/**
 * displays an image
 *
 */
function petg_image() {

	$id = get_the_ID();

	$image = get_post_meta($id, 'image', true);

	if(!$image && has_post_thumbnail( $id )) {

		$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'medium' );
		if(count($thumbnail_src)){

			$image = $thumbnail_src[0];

		}
	}

	if($image){
		print '<img src="'.$image.'" width="500"></img>';
	}

}
endif;
