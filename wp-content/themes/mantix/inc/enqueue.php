<?php
/**
 * Enqueue theme assets.
 *
 * @package Mantix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue frontend assets.
 */
function mantix_enqueue_assets() {
	$theme   = wp_get_theme();
	$version = $theme->get( 'Version' );
	$css_path = get_template_directory() . '/assets/css/main.css';
	$js_path  = get_template_directory() . '/assets/js/main.js';
	$css_ver  = file_exists( $css_path ) ? (string) filemtime( $css_path ) : $version;
	$js_ver   = file_exists( $js_path ) ? (string) filemtime( $js_path ) : $version;
	$font_url = 'https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap';

	wp_enqueue_style( 'mantix-fonts', $font_url, array(), null );
	wp_enqueue_style( 'mantix-main-style', get_template_directory_uri() . '/assets/css/main.css', array(), $css_ver );

	wp_enqueue_script( 'mantix-main-script', get_template_directory_uri() . '/assets/js/main.js', array(), $js_ver, true );
	wp_localize_script(
		'mantix-main-script',
		'mantixTheme',
		array(
			'headerOffset' => 90,
		)
	);
}
add_action( 'wp_enqueue_scripts', 'mantix_enqueue_assets' );