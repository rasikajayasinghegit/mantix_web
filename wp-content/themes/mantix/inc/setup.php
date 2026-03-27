<?php
/**
 * Mantix theme setup.
 *
 * @package Mantix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Setup theme supports and menus.
 */
function mantix_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'custom-logo', array( 'height' => 64, 'width' => 240, 'flex-height' => true, 'flex-width' => true ) );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/editor.css' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'custom-spacing' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'mantix' ),
			'footer'  => __( 'Footer Menu', 'mantix' ),
		)
	);
}
add_action( 'after_setup_theme', 'mantix_setup' );

/**
 * Content width.
 */
function mantix_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mantix_content_width', 920 );
}
add_action( 'after_setup_theme', 'mantix_content_width', 0 );