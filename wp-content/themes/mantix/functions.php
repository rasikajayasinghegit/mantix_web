<?php
/**
 * Mantix theme bootstrap.
 *
 * @package Mantix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Ensure Mantix language switcher is available even when plugin is not activated.
$mantix_language_plugin_file = WP_PLUGIN_DIR . '/mantix-language-switcher/mantix-language-switcher.php';
if ( file_exists( $mantix_language_plugin_file ) ) {
	require_once $mantix_language_plugin_file;
}

$mantix_includes = array(
	'/inc/defaults.php',
	'/inc/helpers.php',
	'/inc/setup.php',
	'/inc/enqueue.php',
	'/inc/customizer.php',
	'/inc/seo.php',
	'/inc/form-handler.php',
	'/inc/admin-content.php',
);

foreach ( $mantix_includes as $file ) {
	require get_template_directory() . $file;
}
