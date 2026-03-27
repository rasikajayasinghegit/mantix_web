<?php
/**
 * Final CTA section.
 *
 * @package Mantix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$heading         = (string) mantix_get_mod( 'mantix_final_cta_heading' );
$text            = (string) mantix_get_mod( 'mantix_final_cta_text' );
$primary_label   = (string) mantix_get_mod( 'mantix_final_cta_primary_label' );
$primary_url     = (string) mantix_get_mod( 'mantix_final_cta_primary_url' );
$secondary_label = (string) mantix_get_mod( 'mantix_final_cta_secondary_label' );
$secondary_url   = (string) mantix_get_mod( 'mantix_final_cta_secondary_url' );
?>
<section class="section final-cta" aria-labelledby="final-cta-title">
	<div class="site-container" data-animate="fade-up">
		<div class="final-cta-shell">
			<h2 id="final-cta-title"><?php echo esc_html( $heading ); ?></h2>
			<p><?php echo esc_html( $text ); ?></p>
			<div class="hero-cta-row">
				<a class="button button-primary" href="<?php echo esc_url( $primary_url ); ?>"><?php echo esc_html( $primary_label ); ?></a>
				<a class="button button-ghost" href="<?php echo esc_url( $secondary_url ); ?>"><?php echo esc_html( $secondary_label ); ?></a>
			</div>
		</div>
	</div>
</section>