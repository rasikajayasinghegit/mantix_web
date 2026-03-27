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
$eyebrow       = (string) mantix_get_mod( 'mantix_contact_eyebrow' );
$shortcode     = trim( (string) mantix_get_mod( 'mantix_contact_shortcode' ) );
$request_types = mantix_get_lines_mod( 'mantix_request_types' );
$status        = isset( $_GET['mantix_form'] ) ? sanitize_key( wp_unslash( $_GET['mantix_form'] ) ) : '';
$success_msg   = (string) mantix_get_mod( 'mantix_form_success_message' );
$error_msg     = (string) mantix_get_mod( 'mantix_form_error_message' );
$name_label    = (string) mantix_get_mod( 'mantix_form_name_label' );
$company_label = (string) mantix_get_mod( 'mantix_form_company_label' );
$email_label   = (string) mantix_get_mod( 'mantix_form_email_label' );
$phone_label   = (string) mantix_get_mod( 'mantix_form_phone_label' );
$request_label = (string) mantix_get_mod( 'mantix_form_request_type_label' );
$message_label = (string) mantix_get_mod( 'mantix_form_message_label' );
$submit_label  = (string) mantix_get_mod( 'mantix_form_submit_label' );
?>
<section id="contact" class="section section-soft" aria-labelledby="contact-title">
	<div class="site-container contact-grid">
		<div class="contact-copy" data-animate="fade-up">
			<p class="section-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
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
						<label for="mantix-name"><?php echo esc_html( $name_label ); ?> *</label>
						<input id="mantix-name" name="name" type="text" required />
					</div>
					<div class="form-row">
						<label for="mantix-company"><?php echo esc_html( $company_label ); ?></label>
						<input id="mantix-company" name="company" type="text" />
					</div>
					<div class="form-row form-grid-two">
						<div>
							<label for="mantix-email"><?php echo esc_html( $email_label ); ?> *</label>
							<input id="mantix-email" name="email" type="email" required />
						</div>
						<div>
							<label for="mantix-phone"><?php echo esc_html( $phone_label ); ?></label>
							<input id="mantix-phone" name="phone" type="tel" />
						</div>
					</div>
					<div class="form-row">
						<label for="mantix-request-type"><?php echo esc_html( $request_label ); ?></label>
						<select id="mantix-request-type" name="request_type">
							<?php foreach ( $request_types as $type ) : ?>
								<option value="<?php echo esc_attr( $type ); ?>"><?php echo esc_html( $type ); ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-row">
						<label for="mantix-message"><?php echo esc_html( $message_label ); ?> *</label>
						<textarea id="mantix-message" name="message" rows="5" required></textarea>
					</div>
					<button class="button button-primary" type="submit"><?php echo esc_html( $submit_label ); ?></button>
				</form>
			<?php endif; ?>
		</div>
	</div>
</section>
