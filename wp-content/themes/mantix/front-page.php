<?php
/**
 * Front page template.
 *
 * @package Mantix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<main id="content" class="landing-page">
	<?php get_template_part( 'template-parts/sections/hero' ); ?>
	<?php get_template_part( 'template-parts/sections/social-proof' ); ?>
	<?php get_template_part( 'template-parts/sections/features' ); ?>
	<?php get_template_part( 'template-parts/sections/showcase' ); ?>
	<?php get_template_part( 'template-parts/sections/benefits' ); ?>
	<?php get_template_part( 'template-parts/sections/use-cases' ); ?>
	<?php get_template_part( 'template-parts/sections/stats' ); ?>
	<?php get_template_part( 'template-parts/sections/testimonials' ); ?>
	<?php get_template_part( 'template-parts/sections/pricing' ); ?>
	<?php get_template_part( 'template-parts/sections/faq' ); ?>
	<?php get_template_part( 'template-parts/sections/final-cta' ); ?>
	<?php get_template_part( 'template-parts/sections/contact' ); ?>

	<?php if ( is_page() && have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php if ( '' !== trim( get_the_content() ) ) : ?>
				<section class="section block-content-section">
					<div class="site-container">
						<?php the_content(); ?>
					</div>
				</section>
			<?php endif; ?>
		<?php endwhile; ?>
	<?php endif; ?>
</main>

<?php
$schema = array(
	'@context'    => 'https://schema.org',
	'@type'       => 'SoftwareApplication',
	'name'        => get_bloginfo( 'name' ),
	'applicationCategory' => 'BusinessApplication',
	'operatingSystem' => 'Web',
	'description' => wp_strip_all_tags( (string) mantix_get_mod( 'mantix_meta_description' ) ),
	'url'         => home_url( '/' ),
	'offers'      => array(
		'@type' => 'Offer',
		'price' => '0',
		'priceCurrency' => 'USD',
	),
);
?>
<script type="application/ld+json"><?php echo wp_json_encode( $schema ); ?></script>
<?php
get_footer();
