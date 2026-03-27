<?php
/**
 * Theme footer.
 *
 * @package Mantix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$summary    = (string) mantix_get_mod( 'mantix_footer_summary' );
$copyright  = (string) mantix_get_mod( 'mantix_footer_copyright' );
$social_set = mantix_get_json_mod( 'mantix_social_json' );
$year       = gmdate( 'Y' );
?>
<footer class="site-footer">
	<div class="site-container footer-grid">
		<div class="footer-brand">
			<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
			<p><?php echo wp_kses_post( $summary ); ?></p>
		</div>

		<div class="footer-links-wrap">
			<h3><?php esc_html_e( 'Quick Links', 'mantix' ); ?></h3>
			<nav aria-label="<?php esc_attr_e( 'Footer links', 'mantix' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'container'      => false,
						'fallback_cb'    => 'mantix_footer_menu_fallback',
					)
				);
				?>
			</nav>
		</div>

		<div class="footer-links-wrap">
			<h3><?php esc_html_e( 'Legal', 'mantix' ); ?></h3>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'mantix' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/terms-and-conditions/' ) ); ?>"><?php esc_html_e( 'Terms of Service', 'mantix' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/cookie-policy/' ) ); ?>"><?php esc_html_e( 'Cookie Policy', 'mantix' ); ?></a></li>
			</ul>
		</div>

		<div class="footer-links-wrap">
			<h3><?php esc_html_e( 'Social', 'mantix' ); ?></h3>
			<ul>
				<?php foreach ( $social_set as $item ) : ?>
					<?php
					$label = isset( $item['label'] ) ? (string) $item['label'] : '';
					$url   = isset( $item['url'] ) ? (string) $item['url'] : '#';
					if ( '' === trim( $label ) ) {
						continue;
					}
					?>
					<li><a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>

	<div class="site-container footer-bottom">
		<p>&copy; <?php echo esc_html( $year ); ?> <?php bloginfo( 'name' ); ?>. <?php echo esc_html( $copyright ); ?></p>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>