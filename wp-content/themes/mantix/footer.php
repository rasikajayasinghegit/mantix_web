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
$social_set = mantix_get_social_items();
$quick_links_title = (string) mantix_get_mod( 'mantix_footer_quick_links_title' );
$legal_title       = (string) mantix_get_mod( 'mantix_footer_legal_title' );
$social_title      = (string) mantix_get_mod( 'mantix_footer_social_title' );
$privacy_label     = (string) mantix_get_mod( 'mantix_footer_legal_privacy_label' );
$privacy_url       = (string) mantix_get_mod( 'mantix_footer_legal_privacy_url' );
$terms_label       = (string) mantix_get_mod( 'mantix_footer_legal_terms_label' );
$terms_url         = (string) mantix_get_mod( 'mantix_footer_legal_terms_url' );
$cookie_label      = (string) mantix_get_mod( 'mantix_footer_legal_cookie_label' );
$cookie_url        = (string) mantix_get_mod( 'mantix_footer_legal_cookie_url' );
$year       = gmdate( 'Y' );
?>
<footer class="site-footer">
	<div class="site-container footer-grid">
		<div class="footer-brand">
			<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
			<p><?php echo wp_kses_post( $summary ); ?></p>
		</div>

		<div class="footer-links-wrap">
			<h3><?php echo esc_html( $quick_links_title ); ?></h3>
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
			<h3><?php echo esc_html( $legal_title ); ?></h3>
			<ul>
				<li><a href="<?php echo esc_url( $privacy_url ); ?>"><?php echo esc_html( $privacy_label ); ?></a></li>
				<li><a href="<?php echo esc_url( $terms_url ); ?>"><?php echo esc_html( $terms_label ); ?></a></li>
				<li><a href="<?php echo esc_url( $cookie_url ); ?>"><?php echo esc_html( $cookie_label ); ?></a></li>
			</ul>
		</div>

		<div class="footer-links-wrap">
			<h3><?php echo esc_html( $social_title ); ?></h3>
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
