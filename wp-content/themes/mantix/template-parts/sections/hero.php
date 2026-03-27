<?php
/**
 * Hero section.
 *
 * @package Mantix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow         = (string) mantix_get_mod( 'mantix_hero_eyebrow' );
$heading         = (string) mantix_get_mod( 'mantix_hero_heading' );
$text            = (string) mantix_get_mod( 'mantix_hero_text' );
$primary_label   = (string) mantix_get_mod( 'mantix_hero_primary_label' );
$primary_url     = (string) mantix_get_mod( 'mantix_hero_primary_url' );
$secondary_label = (string) mantix_get_mod( 'mantix_hero_secondary_label' );
$secondary_url   = (string) mantix_get_mod( 'mantix_hero_secondary_url' );
$badges          = mantix_get_lines_mod( 'mantix_hero_badges' );
$badges_aria     = (string) mantix_get_mod( 'mantix_hero_badges_aria_label' );
$mockup_aria     = (string) mantix_get_mod( 'mantix_hero_mockup_aria_label' );
$mockup_one_label = (string) mantix_get_mod( 'mantix_hero_mockup_one_label' );
$mockup_one_value = (string) mantix_get_mod( 'mantix_hero_mockup_one_value' );
$mockup_two_label = (string) mantix_get_mod( 'mantix_hero_mockup_two_label' );
$mockup_two_value = (string) mantix_get_mod( 'mantix_hero_mockup_two_value' );
$mockup_three_label = (string) mantix_get_mod( 'mantix_hero_mockup_three_label' );
$mockup_three_value = (string) mantix_get_mod( 'mantix_hero_mockup_three_value' );
?>
<section class="section hero-section" aria-labelledby="mantix-hero-title">
	<div class="site-container hero-grid">
		<div class="hero-content" data-animate="fade-up">
			<p class="section-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h1 id="mantix-hero-title"><?php echo esc_html( $heading ); ?></h1>
			<p class="hero-text"><?php echo esc_html( $text ); ?></p>
			<div class="hero-cta-row">
				<a class="button button-primary" href="<?php echo esc_url( $primary_url ); ?>"><?php echo esc_html( $primary_label ); ?></a>
				<a class="button button-ghost" href="<?php echo esc_url( $secondary_url ); ?>"><?php echo esc_html( $secondary_label ); ?></a>
			</div>
			<?php if ( ! empty( $badges ) ) : ?>
				<ul class="hero-badges" aria-label="<?php echo esc_attr( $badges_aria ); ?>">
					<?php foreach ( $badges as $badge ) : ?>
						<li><?php echo esc_html( $badge ); ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>

		<div class="hero-visual" data-animate="fade-up">
			<div class="mockup-shell" role="img" aria-label="<?php echo esc_attr( $mockup_aria ); ?>">
				<div class="mockup-topbar">
					<span></span><span></span><span></span>
				</div>
				<div class="mockup-layout">
					<div class="mockup-nav">
						<div class="mockup-pill active"></div>
						<div class="mockup-pill"></div>
						<div class="mockup-pill"></div>
						<div class="mockup-pill"></div>
					</div>
					<div class="mockup-panels">
						<div class="mockup-card mockup-card-kpi">
							<p><?php echo esc_html( $mockup_one_label ); ?></p>
							<strong><?php echo esc_html( $mockup_one_value ); ?></strong>
						</div>
						<div class="mockup-card">
							<p><?php echo esc_html( $mockup_two_label ); ?></p>
							<strong><?php echo esc_html( $mockup_two_value ); ?></strong>
						</div>
						<div class="mockup-card">
							<p><?php echo esc_html( $mockup_three_label ); ?></p>
							<strong><?php echo esc_html( $mockup_three_value ); ?></strong>
						</div>
						<div class="mockup-chart" aria-hidden="true">
							<span style="height:46%"></span>
							<span style="height:64%"></span>
							<span style="height:51%"></span>
							<span style="height:78%"></span>
							<span style="height:90%"></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
