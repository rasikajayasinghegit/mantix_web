<?php
/**
 * Platform showcase section.
 *
 * @package Mantix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$showcase_items = mantix_get_showcase_items();
$eyebrow        = (string) mantix_get_mod( 'mantix_showcase_eyebrow' );
$title          = (string) mantix_get_mod( 'mantix_showcase_title' );
?>
<section id="solutions" class="section" aria-labelledby="showcase-title">
	<div class="site-container">
		<div class="section-heading" data-animate="fade-up">
			<p class="section-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2 id="showcase-title"><?php echo esc_html( $title ); ?></h2>
		</div>

		<div class="showcase-list">
			<?php foreach ( $showcase_items as $index => $item ) : ?>
				<?php
				$tag         = isset( $item['tag'] ) ? (string) $item['tag'] : '';
				$title       = isset( $item['title'] ) ? (string) $item['title'] : '';
				$description = isset( $item['description'] ) ? (string) $item['description'] : '';
				$bullets     = isset( $item['bullets'] ) && is_array( $item['bullets'] ) ? $item['bullets'] : array();
				?>
				<article class="showcase-row <?php echo ( 0 === $index % 2 ) ? 'showcase-left' : 'showcase-right'; ?>" data-animate="fade-up">
					<div class="showcase-content">
						<p class="showcase-tag"><?php echo esc_html( $tag ); ?></p>
						<h3><?php echo esc_html( $title ); ?></h3>
						<p><?php echo esc_html( $description ); ?></p>
						<?php if ( ! empty( $bullets ) ) : ?>
							<ul>
								<?php foreach ( $bullets as $bullet ) : ?>
									<li><?php echo esc_html( (string) $bullet ); ?></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>
					<div class="showcase-visual" aria-hidden="true">
						<div class="visual-shell">
							<div class="visual-header"></div>
							<div class="visual-body">
								<div class="visual-col"></div>
								<div class="visual-col large"></div>
							</div>
						</div>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
