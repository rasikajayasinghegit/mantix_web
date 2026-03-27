<?php
/**
 * Testimonials section.
 *
 * @package Mantix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$testimonials = mantix_get_testimonial_items();
$eyebrow      = (string) mantix_get_mod( 'mantix_testimonials_eyebrow' );
$title        = (string) mantix_get_mod( 'mantix_testimonials_title' );
$rating_label = (string) mantix_get_mod( 'mantix_testimonials_rating_label' );
?>
<section id="testimonials" class="section" aria-labelledby="testimonials-title">
	<div class="site-container">
		<div class="section-heading" data-animate="fade-up">
			<p class="section-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2 id="testimonials-title"><?php echo esc_html( $title ); ?></h2>
		</div>
		<div class="testimonials-grid">
			<?php foreach ( $testimonials as $testimonial ) : ?>
				<?php
				$quote   = isset( $testimonial['quote'] ) ? (string) $testimonial['quote'] : '';
				$name    = isset( $testimonial['name'] ) ? (string) $testimonial['name'] : '';
				$role    = isset( $testimonial['role'] ) ? (string) $testimonial['role'] : '';
				$company = isset( $testimonial['company'] ) ? (string) $testimonial['company'] : '';
				$rating  = isset( $testimonial['rating'] ) ? (int) $testimonial['rating'] : 5;
				?>
				<article class="testimonial-card" data-animate="fade-up">
					<div class="stars" aria-label="<?php echo esc_attr( $rating_label ); ?>"><?php echo wp_kses_post( mantix_render_stars( $rating ) ); ?></div>
					<blockquote><?php echo esc_html( $quote ); ?></blockquote>
					<p class="testimonial-author"><?php echo esc_html( $name ); ?></p>
					<p class="testimonial-role"><?php echo esc_html( trim( $role . ', ' . $company, ', ' ) ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
