<?php
/**
 * Mantix helper functions.
 *
 * @package Mantix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get default value by key.
 *
 * @param string $key Theme mod key.
 * @return mixed
 */
function mantix_get_default( $key ) {
	$defaults = mantix_get_defaults();
	return $defaults[ $key ] ?? '';
}

/**
 * Get theme mod with fallback.
 *
 * @param string $key Theme mod key.
 * @return mixed
 */
function mantix_get_mod( $key ) {
	$default = mantix_get_default( $key );
	$value   = get_theme_mod( $key, $default );

	return apply_filters( 'mantix_translate_theme_mod', $value, $key, $default );
}

/**
 * Convert text area value into trimmed line list.
 *
 * @param string $key Theme mod key.
 * @return array<int,string>
 */
function mantix_get_lines_mod( $key ) {
	$raw   = (string) mantix_get_mod( $key );
	$lines = preg_split( '/\r\n|\r|\n/', $raw );

	if ( ! is_array( $lines ) ) {
		return array();
	}

	$output = array();

	foreach ( $lines as $line ) {
		$line = trim( (string) $line );
		if ( '' !== $line ) {
			$output[] = $line;
		}
	}

	return $output;
}

/**
 * Parse JSON repeater data with fallback.
 *
 * @param string $key Theme mod key.
 * @return array<int,array<string,mixed>>
 */
function mantix_get_json_mod( $key ) {
	$raw = (string) mantix_get_mod( $key );

	if ( '' === trim( $raw ) ) {
		$raw = (string) mantix_get_default( $key );
	}

	$data = json_decode( $raw, true );

	if ( ! is_array( $data ) ) {
		$default = json_decode( (string) mantix_get_default( $key ), true );
		return is_array( $default ) ? $default : array();
	}

	$output = array();

	foreach ( $data as $item ) {
		if ( is_array( $item ) ) {
			$output[] = $item;
		}
	}

	return $output;
}

/**
 * Fallback anchor menu.
 */
function mantix_primary_menu_fallback() {
	$items = array(
		'home'         => __( 'Home', 'mantix' ),
		'features'     => __( 'Features', 'mantix' ),
		'solutions'    => __( 'Solutions', 'mantix' ),
		'pricing'      => __( 'Pricing', 'mantix' ),
		'testimonials' => __( 'Testimonials', 'mantix' ),
		'faq'          => __( 'FAQ', 'mantix' ),
		'contact'      => __( 'Contact', 'mantix' ),
	);

	echo '<ul class="menu">';
	foreach ( $items as $id => $label ) {
		echo '<li class="menu-item"><a href="#' . esc_attr( $id ) . '">' . esc_html( $label ) . '</a></li>';
	}
	echo '</ul>';
}

/**
 * Fallback footer menu.
 */
function mantix_footer_menu_fallback() {
	echo '<ul class="menu">';
	echo '<li class="menu-item"><a href="#features">' . esc_html__( 'Features', 'mantix' ) . '</a></li>';
	echo '<li class="menu-item"><a href="#pricing">' . esc_html__( 'Pricing', 'mantix' ) . '</a></li>';
	echo '<li class="menu-item"><a href="#faq">' . esc_html__( 'FAQ', 'mantix' ) . '</a></li>';
	echo '<li class="menu-item"><a href="#contact">' . esc_html__( 'Contact', 'mantix' ) . '</a></li>';
	echo '</ul>';
}

/**
 * Returns sanitized star rating list.
 *
 * @param int $count Number of stars.
 * @return string
 */
function mantix_render_stars( $count ) {
	$stars = max( 1, min( 5, absint( $count ) ) );
	return str_repeat( '<span aria-hidden="true">★</span>', $stars );
}

/**
 * Returns an icon slug-safe value.
 *
 * @param string $icon Icon name.
 * @return string
 */
function mantix_icon_slug( $icon ) {
	return sanitize_key( (string) $icon );
}

/**
 * Render a lightweight icon.
 *
 * @param string $icon Icon slug.
 * @return string
 */
function mantix_get_icon_svg( $icon ) {
	$slug = mantix_icon_slug( $icon );

	$icons = array(
		'automation'    => 'M6 9h12M6 15h8M4 4h16v16H4z',
		'collaboration' => 'M8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm8 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM4 20v-1a4 4 0 0 1 4-4h1M20 20v-1a4 4 0 0 0-4-4h-1',
		'reporting'     => 'M5 19V9m7 10V5m7 14v-7M3 21h18',
		'insights'      => 'm4 16 4-4 3 3 5-6M4 20h16',
		'security'      => 'M12 3 5 6v5c0 5 3.5 8.5 7 10 3.5-1.5 7-5 7-10V6l-7-3Z',
		'tracking'      => 'M12 8v5l3 3M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20Z',
		'scalable'      => 'M4 18h4V8H4v10Zm6 0h4V4h-4v14Zm6 0h4v-6h-4v6Z',
		'dashboard'     => 'M4 4h7v7H4V4Zm9 0h7v5h-7V4ZM4 13h5v7H4v-7Zm7 0h9v7h-9v-7Z',
	);

	$path = $icons[ $slug ] ?? $icons['dashboard'];

	return '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="' . esc_attr( $path ) . '"/></svg>';
}
