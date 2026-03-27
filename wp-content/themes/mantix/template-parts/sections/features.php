<?php
/**
 * Features section.
 *
 * @package Mantix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$features = mantix_get_feature_items();
?>
<section id="features" class="section section-soft" aria-labelledby="features-title">
	<div class="site-container">
		<div class="section-heading" data-animate="fade-up">
			<p class="section-eyebrow"><?php esc_html_e( 'Platform Features', 'mantix' ); ?></p>
			<h2 id="features-title"><?php esc_html_e( 'Everything your team needs to execute with confidence', 'mantix' ); ?></h2>
			<p><?php esc_html_e( 'Mantix combines workflow control, collaboration, reporting, and security into one modern operating platform.', 'mantix' ); ?></p>
		</div>

		<div class="features-grid">
			<?php foreach ( $features as $feature ) : ?>
				<?php
				$icon        = isset( $feature['icon'] ) ? (string) $feature['icon'] : 'dashboard';
				$title       = isset( $feature['title'] ) ? (string) $feature['title'] : '';
				$description = isset( $feature['description'] ) ? (string) $feature['description'] : '';
				?>
				<article class="feature-card" data-animate="fade-up">
					<div class="feature-icon">
						<?php echo wp_kses( mantix_get_icon_svg( $icon ), array( 'svg' => array( 'viewbox' => true, 'aria-hidden' => true, 'focusable' => true ), 'path' => array( 'd' => true ) ) ); ?>
					</div>
					<h3><?php echo esc_html( $title ); ?></h3>
					<p><?php echo esc_html( $description ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>