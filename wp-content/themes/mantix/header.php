<?php
/**
 * Theme header.
 *
 * @package Mantix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$announcement_enabled = (bool) mantix_get_mod( 'mantix_announcement_enabled' );
$announcement_text    = (string) mantix_get_mod( 'mantix_announcement_text' );
$announcement_label   = (string) mantix_get_mod( 'mantix_announcement_link_label' );
$announcement_url     = (string) mantix_get_mod( 'mantix_announcement_link_url' );
$primary_label        = (string) mantix_get_mod( 'mantix_header_primary_cta_label' );
$primary_url          = (string) mantix_get_mod( 'mantix_header_primary_cta_url' );
$secondary_label      = (string) mantix_get_mod( 'mantix_header_secondary_cta_label' );
$secondary_url        = (string) mantix_get_mod( 'mantix_header_secondary_cta_url' );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'mantix' ); ?></a>

<?php if ( is_front_page() && $announcement_enabled && '' !== trim( $announcement_text ) ) : ?>
	<div class="announcement-bar" role="region" aria-label="<?php esc_attr_e( 'Announcement', 'mantix' ); ?>">
		<div class="site-container announcement-inner">
			<div class="announcement-main">
				<p><?php echo esc_html( $announcement_text ); ?></p>
				<?php if ( '' !== trim( $announcement_label ) && '' !== trim( $announcement_url ) ) : ?>
					<a href="<?php echo esc_url( $announcement_url ); ?>"><?php echo esc_html( $announcement_label ); ?></a>
				<?php endif; ?>
			</div>
			<?php if ( function_exists( 'mantix_language_switcher' ) ) : ?>
				<div class="announcement-language">
					<?php mantix_language_switcher( array( 'class' => 'mantix-language-switcher-announcement' ) ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>

<header class="site-header js-site-header" id="home">
	<div class="site-container header-inner">
		<div class="brand-wrap">
			<?php if ( has_custom_logo() ) : ?>
				<div class="site-logo"><?php the_custom_logo(); ?></div>
			<?php else : ?>
				<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
			<?php endif; ?>
		</div>

		<button class="menu-toggle js-menu-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation">
			<span class="menu-toggle-bar"></span>
			<span class="menu-toggle-bar"></span>
			<span class="menu-toggle-bar"></span>
			<span class="screen-reader-text"><?php esc_html_e( 'Toggle navigation', 'mantix' ); ?></span>
		</button>

		<nav id="primary-navigation" class="site-nav js-site-nav" aria-label="<?php esc_attr_e( 'Primary Navigation', 'mantix' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'fallback_cb'    => 'mantix_primary_menu_fallback',
				)
			);
			?>
		</nav>

		<div class="header-cta-wrap">
			<a class="button button-secondary" href="<?php echo esc_url( $secondary_url ); ?>"><?php echo esc_html( $secondary_label ); ?></a>
			<a class="button button-primary" href="<?php echo esc_url( $primary_url ); ?>"><?php echo esc_html( $primary_label ); ?></a>
		</div>
	</div>
</header>
