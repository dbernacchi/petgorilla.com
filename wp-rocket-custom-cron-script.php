<?php
/**
 * Clears the global cache and calls WP Rocket’s preload bot.
 * Place this file in your WordPress root directory (where wp-config.php and wp-load.php are located).
 */
require( 'wp-load.php' );
if( ! function_exists( 'rocket_clean_home' ) || ! function_exists( 'run_rocket_bot' ) || ! function_exists( 'get_rocket_option' ) )
	return;
// Clear global cache.
rocket_clean_domain();
// Run preload bot.
run_rocket_bot( 'cache-preload' );
// Run sitemap preload. (Sitemap preload option needs to be defined!)
if ( get_rocket_option( 'sitemap_preload', false ) )
	run_rocket_sitemap_preload();
