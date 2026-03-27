<?php
/**
 * FAQ section.
 *
 * @package Mantix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faqs = mantix_get_faq_items();
$eyebrow = (string) mantix_get_mod( 'mantix_faq_eyebrow' );
$title   = (string) mantix_get_mod( 'mantix_faq_title' );
?>
<section id="faq" class="section" aria-labelledby="faq-title">
	<div class="site-container faq-wrap">
		<div class="section-heading" data-animate="fade-up">
			<p class="section-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2 id="faq-title"><?php echo esc_html( $title ); ?></h2>
		</div>

		<div class="faq-list" data-animate="fade-up">
			<?php foreach ( $faqs as $index => $faq ) : ?>
				<?php
				$question = isset( $faq['question'] ) ? (string) $faq['question'] : '';
				$answer   = isset( $faq['answer'] ) ? (string) $faq['answer'] : '';
				$panel_id = 'faq-panel-' . ( $index + 1 );
				?>
				<div class="faq-item">
					<h3>
						<button class="faq-toggle js-faq-toggle" type="button" aria-expanded="false" aria-controls="<?php echo esc_attr( $panel_id ); ?>">
							<span><?php echo esc_html( $question ); ?></span>
							<span class="faq-icon" aria-hidden="true">+</span>
						</button>
					</h3>
					<div id="<?php echo esc_attr( $panel_id ); ?>" class="faq-panel" hidden>
						<p><?php echo esc_html( $answer ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
