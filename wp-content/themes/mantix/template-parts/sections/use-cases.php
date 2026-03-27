<?php
/**
 * Use cases section.
 *
 * @package Mantix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cases = mantix_get_json_mod( 'mantix_use_cases_json' );
?>
<section id="use-cases" class="section section-soft" aria-labelledby="use-cases-title">
	<div class="site-container">
		<div class="section-heading" data-animate="fade-up">
			<p class="section-eyebrow"><?php esc_html_e( 'Use Cases', 'mantix' ); ?></p>
			<h2 id="use-cases-title"><?php esc_html_e( 'Built for teams of every size and complexity', 'mantix' ); ?></h2>
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