<?php
/**
 * Template Name: Digital
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
	while ( have_posts() ) : the_post();
	
		get_template_part( 'template-parts/page/content', 'digital' );

		//get_template_part( 'template-parts/page/content', 'page' );

	endwhile; // End of the loop.
	?>

</main><!-- #main -->


<?php get_footer();