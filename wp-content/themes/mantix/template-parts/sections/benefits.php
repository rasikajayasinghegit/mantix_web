<?php
/**
 * Benefits section.
 *
 * @package Mantix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$benefits = mantix_get_benefit_items();
$eyebrow  = (string) mantix_get_mod( 'mantix_benefits_eyebrow' );
$title    = (string) mantix_get_mod( 'mantix_benefits_title' );
?>
<section class="section section-gradient" aria-labelledby="benefits-title">
	<div class="site-container">
		<div class="section-heading" data-animate="fade-up">
			<p class="section-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2 id="benefits-title"><?php echo esc_html( $title ); ?></h2>
		</div>
		<div class="benefits-grid">
			<?php foreach ( $benefits as $benefit ) : ?>
				<?php
				$title       = isset( $benefit['title'] ) ? (string) $benefit['title'] : '';
				$description = isset( $benefit['description'] ) ? (string) $benefit['description'] : '';
				?>
				<article class="benefit-card" data-animate="fade-up">
					<h3><?php echo esc_html( $title ); ?></h3>
					<p><?php echo esc_html( $description ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
