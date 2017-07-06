<?php
/**
 * The single post template file
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
      <a class="entry-header" href="/blog"><< Back to Index</a>

			<?php
				while ( have_posts() ) : the_post();

				// Include the single post content template.
				get_template_part( 'template-parts/post/content', 'single' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

				if ( is_singular( 'attachment' ) ) {
					// Parent post navigation.
					the_post_navigation( array(
						'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'petg' ),
					) );
				} elseif ( is_singular( 'post' ) ) {
					// Previous/next post navigation.
					the_post_navigation( array(
						'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'petg' ) . '</span> ' .
							'<span class="screen-reader-text">' . __( 'Next post:', 'petg' ) . '</span> ' .
							'<span class="post-title">%title</span>',
						'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'petg' ) . '</span> ' .
							'<span class="screen-reader-text">' . __( 'Previous post:', 'petg' ) . '</span> ' .
							'<span class="post-title">%title</span>',
					) );
				}

				// End of the loop.
			endwhile;
		?>


		</main><!-- #main -->


	</div><!-- #primary -->
	<?php get_sidebar(); ?>

<?php get_footer();
