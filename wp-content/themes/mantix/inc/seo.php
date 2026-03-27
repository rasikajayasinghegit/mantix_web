<?php
/**
 * SEO and head additions.
 *
 * @package Mantix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Output custom CSS variables from Customizer colors.
 */
function mantix_output_color_variables() {
	$primary = sanitize_hex_color( (string) mantix_get_mod( 'mantix_color_primary' ) );
	$accent  = sanitize_hex_color( (string) mantix_get_mod( 'mantix_color_accent' ) );
	$alt     = sanitize_hex_color( (string) mantix_get_mod( 'mantix_color_accent_alt' ) );
	$surface = sanitize_hex_color( (string) mantix_get_mod( 'mantix_color_surface' ) );

	if ( ! $primary || ! $accent || ! $alt || ! $surface ) {
		return;
	}

	echo '<style id="mantix-custom-colors">:root{--mantix-primary:' . esc_html( $primary ) . ';--mantix-accent:' . esc_html( $accent ) . ';--mantix-accent-alt:' . esc_html( $alt ) . ';--mantix-surface:' . esc_html( $surface ) . ';}</style>';
}
add_action( 'wp_head', 'mantix_output_color_variables', 30 );

/**
 * Output lightweight front-page meta when SEO plugins are absent.
 */
function mantix_output_meta_tags() {
	if ( ! is_front_page() ) {
		return;
	}

	if ( defined( 'WPSEO_VERSION' ) || class_exists( 'RankMath' ) ) {
		return;
	}

	$description = trim( wp_strip_all_tags( (string) mantix_get_mod( 'mantix_meta_description' ) ) );
	$site_name   = get_bloginfo( 'name' );
	$title       = $site_name ? $site_name : 'Mantix';
	$url         = home_url( '/' );

	if ( '' !== $description ) {
		echo '<meta name="description" content="' . esc_attr( $description ) . '" />';
		echo '<meta property="og:description" content="' . esc_attr( $description ) . '" />';
	}

	echo '<meta property="og:type" content="website" />';
	echo '<meta property="og:title" content="' . esc_attr( $title ) . '" />';
	echo '<meta property="og:url" content="' . esc_url( $url ) . '" />';
	echo '<meta property="og:site_name" content="' . esc_attr( $site_name ) . '" />';
	echo '<meta name="twitter:card" content="summary_large_image" />';
}
add_action( 'wp_head', 'mantix_output_meta_tags', 5 );