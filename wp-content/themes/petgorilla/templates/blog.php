<?php
/**
 * Template Name: Blog
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package PetGorilla
 * @subpackage New2017
 * @since 2.0
 * @version 2.0
 */

 get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php

				global $wp_query;

				$posts_per_page = 10;

        $url = $_SERVER['REQUEST_URI'];

        $paged = end(explode('/', rtrim($url, '/')));

        if(!$paged){
          $paged = 1;
        }
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => $posts_per_page,
          'paged' => $paged
				);

				$wp_query = new WP_Query( $args );

				if ( have_posts() ) :

					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/post/content', get_post_format() );




					endwhile;

					the_posts_pagination( array(
						'prev_text' => '<<' . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . '>>',
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
					) );

				else :

					get_template_part( 'template-parts/post/content', 'none' );

				endif;
			?>


		</main><!-- #main -->


	</div><!-- #primary -->
	<?php get_sidebar(); ?>

<?php get_footer();
