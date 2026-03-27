<?php
/**
 * Use cases section.
 *
 * @package Mantix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cases   = mantix_get_use_case_items();
$eyebrow = (string) mantix_get_mod( 'mantix_use_cases_eyebrow' );
$title   = (string) mantix_get_mod( 'mantix_use_cases_title' );
?>
<section id="use-cases" class="section section-soft" aria-labelledby="use-cases-title">
	<div class="site-container">
		<div class="section-heading" data-animate="fade-up">
			<p class="section-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2 id="use-cases-title"><?php echo esc_html( $title ); ?></h2>
		</div>
		<div class="use-case-grid">
			<?php foreach ( $cases as $case ) : ?>
				<?php
				$title       = isset( $case['title'] ) ? (string) $case['title'] : '';
				$description = isset( $case['description'] ) ? (string) $case['description'] : '';
				?>
				<article class="use-case-card" data-animate="fade-up">
					<h3><?php echo esc_html( $title ); ?></h3>
					<p><?php echo esc_html( $description ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
