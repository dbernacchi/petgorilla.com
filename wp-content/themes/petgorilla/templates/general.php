<?php
/**
 * Template Name: General Text
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
	
		the_content( sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
				get_the_title()
			) );
	
		get_template_part( 'template-parts/page/content', 'page' );		

	endwhile; // End of the loop.
	?>

</main><!-- #main -->


<?php get_footer();