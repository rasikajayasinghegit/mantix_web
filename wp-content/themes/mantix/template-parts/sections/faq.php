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
?>
<section id="faq" class="section" aria-labelledby="faq-title">
	<div class="site-container faq-wrap">
		<div class="section-heading" data-animate="fade-up">
			<p class="section-eyebrow"><?php esc_html_e( 'FAQ', 'mantix' ); ?></p>
			<h2 id="faq-title"><?php esc_html_e( 'Answers to common questions about Mantix', 'mantix' ); ?></h2>
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