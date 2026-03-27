<?php
/**
 * Social proof strip.
 *
 * @package Mantix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title = (string) mantix_get_mod( 'mantix_trusted_title' );
$logos = mantix_get_lines_mod( 'mantix_trusted_logos' );
?>
<section class="section section-tight trusted-section" aria-labelledby="trusted-title">
	<div class="site-container" data-animate="fade-up">
		<p id="trusted-title" class="trusted-title"><?php echo esc_html( $title ); ?></p>
		<?php if ( ! empty( $logos ) ) : ?>
			<ul class="trusted-logos" aria-label="<?php esc_attr_e( 'Trusted by', 'mantix' ); ?>">
				<?php foreach ( $logos as $logo ) : ?>
					<li><span><?php echo esc_html( $logo ); ?></span></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>