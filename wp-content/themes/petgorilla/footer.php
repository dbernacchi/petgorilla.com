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
				
				<footer id="site-footer" class="site-footer" role="contentinfo">
					<?php get_template_part( 'template-parts/footers/footer', $template ); ?>
				</footer><!-- #site-footer -->
				
				<?php
				}
				?>
				
			</div><!-- #site-content-contain -->
			
		</div><!-- #site -->
		<?php get_template_part( 'template-parts/footers/script', 'templates' ); ?>
		
	<?php wp_footer(); ?>

</body>
</html>
