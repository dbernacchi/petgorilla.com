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
	<link href="/wp-content/themes/petgorilla/assets/img/petgfavicon.ico" rel="icon" type="image/x-icon" />

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<div id="site" class="site">
		<div class="watermark">
			<a href="/" alt="PET GØRILLA" title="PET GØRILLA"><?php petg_print_custom_logo(); ?></a>
		</div>
		<div id="scroll-to-top" class="scroll-to-top"><span class="fa fa-arrow-circle-o-up"></span></div>
		<div id="site-slider-contain" class="site-slider-contain">
			<!-- Receives slider info dynamically -->
<!--
			<span id="slider-move-left" class="slider-move-left"><span class="fa fa-angle-left"></span></span>
			<span id="slider-move-right" class="slider-move-right"><span class="fa fa-angle-right"></span></span>
-->
			<?php

				$id = get_the_ID();
				$template = basename(str_replace('.php', '', get_page_template($id)));

				if(has_post_thumbnail($id) && $template != 'directors' && $template != 'digital' && get_post_format() != 'post' && !is_archive()){

					get_template_part( 'template-parts/page/element', 'background' );
				}
			?>
		</div>

		<span class="site-band">

			<span id="site-slider-arrow-left" class="site-slider-arrow-left"><span class="fa fa-angle-left"></span></span>
			<span id="site-slider-arrow-right" class="site-slider-arrow-right"><span class="fa fa-angle-right"></span></span>

		</span>
		<div class="mobile-brand">
			<a href="/" alt="PET GØRILLA" title="PET GØRILLA"><?php petg_print_custom_logo(); ?></a>
		</div>

		<header id="site-header" class="site-header" role="banner">
			<span id="desktop-nav" class="desktop-nav fa fa-times"></span>
			<span id="mobile-nav" class="mobile-nav fa fa-bars"></span>
			<div class="header-nav">

				<div class="header-brand">
					<a href="/" alt="PET GØRILLA" title="PET GØRILLA"><?php petg_print_custom_logo(); ?></a>
				</div>

				<?php if(has_nav_menu('primary')){ ?>

						<?php get_template_part( 'template-parts/nav/nav', 'header' ); ?>

				<?php } ?>

			</div>

		</header><!-- #site-header -->

		<div id="site-content-contain" class="site-content-contain">

			<div id="site-content" class="site-content">
