<?php
/**
 * The Pet Gorilla Theme Header
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PetGorilla
 * @subpackage New2017
 * @since 2.0
 * @version 2.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
	
	<div id="site" class="site">
		
		<div id="site-slider-contain" class="site-slider-contain">
			<!-- Receives slider info dynamically -->
			
			<?php
				
				$id = get_the_ID();
				$template = basename(str_replace('.php', '', get_page_template($id)));
				
				if(has_post_thumbnail($id) && $template != 'director' && $template != 'digital'){
				
					get_template_part( 'template-parts/page/element', 'background' );
				}
			?>
		</div>
		
		<span class="site-band"></span>

		<div id="site-content-contain" class="site-content-contain">
			
			<div id="site-content" class="site-content">
				
				<header id="site-header" class="site-header" role="banner">
				
					<div class="header-nav">
						
						<div class="header-brand">
							<?php petg_print_custom_logo(); ?>
						</div>
						
						<?php if(has_nav_menu('primary')){ ?>
							
								<?php get_template_part( 'template-parts/nav/nav', 'header' ); ?>
							
						<?php } ?>
						
					</div>
					
				</header><!-- #site-header -->
