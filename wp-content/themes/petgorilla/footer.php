<?php
/**
 * The Pet Gorilla Theme Footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PetGorilla
 * @subpackage New2017
 * @since 2.0
 * @version 2.0
 */

?>

				</div><!-- #site-content -->
				<?php

				$id = get_the_ID();
				$template = trim(basename(str_replace('.php', '', get_page_template($id))));

				if($template === 'directors' || $template === 'digital'){ ?>

				<div id="site-footer" class="site-footer" role="contentinfo">
					<?php get_template_part( 'template-parts/footers/footer', $template ); ?>
				</div><!-- #site-footer -->

				<?php
				}
				?>

			</div><!-- #site-content-contain -->

		</div><!-- #site -->
		<?php get_template_part( 'template-parts/footers/script', 'templates' ); ?>

	<?php wp_footer(); ?>

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-100420469-1', 'auto');
	  ga('send', 'pageview');

	</script>
	
</body>
</html>
