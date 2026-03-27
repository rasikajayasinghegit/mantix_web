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
$eyebrow  = (string) mantix_get_mod( 'mantix_features_eyebrow' );
$title    = (string) mantix_get_mod( 'mantix_features_title' );
$text     = (string) mantix_get_mod( 'mantix_features_text' );
?>
<section id="features" class="section section-soft" aria-labelledby="features-title">
	<div class="site-container">
		<div class="section-heading" data-animate="fade-up">
			<p class="section-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2 id="features-title"><?php echo esc_html( $title ); ?></h2>
			<p><?php echo esc_html( $text ); ?></p>
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
