<?php
/**
 * Pricing section.
 *
 * @package Mantix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$plans = mantix_get_pricing_items();
$eyebrow       = (string) mantix_get_mod( 'mantix_pricing_eyebrow' );
$title         = (string) mantix_get_mod( 'mantix_pricing_title' );
$popular_label = (string) mantix_get_mod( 'mantix_pricing_popular_label' );
?>
<section id="pricing" class="section section-soft" aria-labelledby="pricing-title">
	<div class="site-container">
		<div class="section-heading" data-animate="fade-up">
			<p class="section-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2 id="pricing-title"><?php echo esc_html( $title ); ?></h2>
		</div>
		<div class="pricing-grid">
			<?php foreach ( $plans as $plan ) : ?>
				<?php
				$name        = isset( $plan['name'] ) ? (string) $plan['name'] : '';
				$price       = isset( $plan['price'] ) ? (string) $plan['price'] : '';
				$period      = isset( $plan['period'] ) ? (string) $plan['period'] : '';
				$description = isset( $plan['description'] ) ? (string) $plan['description'] : '';
				$button      = isset( $plan['button'] ) && '' !== trim( (string) $plan['button'] ) ? (string) $plan['button'] : __( 'Get Started', 'mantix' );
				$url         = isset( $plan['url'] ) && '' !== trim( (string) $plan['url'] ) ? (string) $plan['url'] : '#contact';
				$features    = isset( $plan['features'] ) && is_array( $plan['features'] ) ? $plan['features'] : array();
				$popular     = isset( $plan['popular'] ) ? (bool) $plan['popular'] : false;
				?>
				<article class="pricing-card <?php echo $popular ? 'is-popular' : ''; ?>" data-animate="fade-up">
					<?php if ( $popular ) : ?>
						<p class="popular-badge"><?php echo esc_html( $popular_label ); ?></p>
					<?php endif; ?>
					<h3><?php echo esc_html( $name ); ?></h3>
					<p class="price-line"><span><?php echo esc_html( $price ); ?></span><?php echo esc_html( $period ); ?></p>
					<p><?php echo esc_html( $description ); ?></p>
					<?php if ( ! empty( $features ) ) : ?>
						<ul>
							<?php foreach ( $features as $feature ) : ?>
								<li><?php echo esc_html( (string) $feature ); ?></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
					<a class="button <?php echo $popular ? 'button-primary' : 'button-secondary'; ?>" href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $button ); ?></a>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
