<?php
/**
 * Stats section.
 *
 * @package Mantix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$stats = mantix_get_json_mod( 'mantix_stats_json' );
?>
<section class="section stats-section" aria-labelledby="impact-title">
	<div class="site-container">
		<div class="section-heading" data-animate="fade-up">
			<p class="section-eyebrow"><?php esc_html_e( 'Impact', 'mantix' ); ?></p>
			<h2 id="impact-title"><?php esc_html_e( 'Measured improvements after adopting Mantix', 'mantix' ); ?></h2>
		</div>
		<div class="stats-grid">
			<?php foreach ( $stats as $stat ) : ?>
				<?php
				$label  = isset( $stat['label'] ) ? (string) $stat['label'] : '';
				$value  = isset( $stat['value'] ) ? (int) $stat['value'] : 0;
				$suffix = isset( $stat['suffix'] ) ? (string) $stat['suffix'] : '';
				?>
				<article class="stat-card" data-animate="fade-up">
					<p class="stat-value"><span class="mantix-counter" data-count="<?php echo esc_attr( (string) $value ); ?>">0</span><?php echo esc_html( $suffix ); ?></p>
					<p class="stat-label"><?php echo esc_html( $label ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>