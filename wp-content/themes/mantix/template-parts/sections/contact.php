<?php
/**
 * Contact section.
 *
 * @package Mantix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$heading       = (string) mantix_get_mod( 'mantix_contact_heading' );
$text          = (string) mantix_get_mod( 'mantix_contact_text' );
$shortcode     = trim( (string) mantix_get_mod( 'mantix_contact_shortcode' ) );
$request_types = mantix_get_lines_mod( 'mantix_request_types' );
$status        = isset( $_GET['mantix_form'] ) ? sanitize_key( wp_unslash( $_GET['mantix_form'] ) ) : '';
$success_msg   = (string) mantix_get_mod( 'mantix_form_success_message' );
$error_msg     = (string) mantix_get_mod( 'mantix_form_error_message' );
?>
<section id="contact" class="section section-soft" aria-labelledby="contact-title">
	<div class="site-container contact-grid">
		<div class="contact-copy" data-animate="fade-up">
			<p class="section-eyebrow"><?php esc_html_e( 'Contact', 'mantix' ); ?></p>
			<h2 id="contact-title"><?php echo esc_html( $heading ); ?></h2>
			<p><?php echo esc_html( $text ); ?></p>
		</div>
		<div class="contact-form-wrap" data-animate="fade-up">
			<?php if ( 'success' === $status ) : ?>
				<p class="form-message form-success"><?php echo esc_html( $success_msg ); ?></p>
			<?php elseif ( 'error' === $status ) : ?>
				<p class="form-message form-error"><?php echo esc_html( $error_msg ); ?></p>
			<?php endif; ?>

			<?php if ( '' !== $shortcode ) : ?>
				<?php echo do_shortcode( wp_kses_post( $shortcode ) ); ?>
			<?php else : ?>
				<form class="mantix-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
					<input type="hidden" name="action" value="mantix_submit_lead" />
					<?php wp_nonce_field( 'mantix_submit_lead', 'mantix_nonce' ); ?>

					<div class="form-row">
						<label for="mantix-name"><?php esc_html_e( 'Name', 'mantix' ); ?> *</label>
						<input id="mantix-name" name="name" type="text" required />
					</div>
					<div class="form-row">
						<label for="mantix-company"><?php esc_html_e( 'Company', 'mantix' ); ?></label>
						<input id="mantix-company" name="company" type="text" />
					</div>
					<div class="form-row form-grid-two">
						<div>
							<label for="mantix-email"><?php esc_html_e( 'Email', 'mantix' ); ?> *</label>
							<input id="mantix-email" name="email" type="email" required />
						</div>
						<div>
							<label for="mantix-phone"><?php esc_html_e( 'Phone', 'mantix' ); ?></label>
							<input id="mantix-phone" name="phone" type="tel" />
						</div>
					</div>
					<div class="form-row">
						<label for="mantix-request-type"><?php esc_html_e( 'Request Type', 'mantix' ); ?></label>
						<select id="mantix-request-type" name="request_type">
							<?php foreach ( $request_types as $type ) : ?>
								<option value="<?php echo esc_attr( $type ); ?>"><?php echo esc_html( $type ); ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-row">
						<label for="mantix-message"><?php esc_html_e( 'Message', 'mantix' ); ?> *</label>
						<textarea id="mantix-message" name="message" rows="5" required></textarea>
					</div>
					<button class="button button-primary" type="submit"><?php esc_html_e( 'Submit Request', 'mantix' ); ?></button>
				</form>
			<?php endif; ?>
		</div>
	</div>
</section>