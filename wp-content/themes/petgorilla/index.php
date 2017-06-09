<?php
/**
 * The main template file
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package PetGorilla
 * @subpackage New2017
 * @since 2.0
 * @version 2.0
 */
 
 get_header(); ?>

	
<main id="main" class="site-main" role="main">

	<?php
	if ( have_posts() ) :
	
		while ( have_posts() ) : the_post();
	
			get_template_part( 'template-parts/post/content', get_post_format() );
	
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
	
		endwhile; // End of the loop.
		
		// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentysixteen' ),
				'next_text'          => __( 'Next page', 'twentysixteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
			) );

	// If no content, include the "No posts found" template.
	else :
	
		get_template_part( 'template-parts/content', 'none' );
		
	endif;
	?>

</main><!-- #main -->
<?php get_sidebar(); ?>


<?php get_footer();