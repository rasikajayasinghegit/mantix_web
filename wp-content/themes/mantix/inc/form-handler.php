<?php
/**
 * Mantix lead form handler.
 *
 * @package Mantix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Handle lead form submissions.
 */
function mantix_handle_lead_form() {
	if ( ! isset( $_POST['mantix_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['mantix_nonce'] ) ), 'mantix_submit_lead' ) ) {
		mantix_redirect_with_form_status( 'error' );
	}

	$name         = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$company      = isset( $_POST['company'] ) ? sanitize_text_field( wp_unslash( $_POST['company'] ) ) : '';
	$email        = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$phone        = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
	$message      = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';
	$request_type = isset( $_POST['request_type'] ) ? sanitize_text_field( wp_unslash( $_POST['request_type'] ) ) : '';

	if ( '' === $name || '' === $email || ! is_email( $email ) || '' === $message ) {
		mantix_redirect_with_form_status( 'error' );
	}

	$admin_email = get_option( 'admin_email' );
	$subject     = sprintf( __( 'New Mantix Lead: %s', 'mantix' ), $name );
	$body        = "Name: {$name}\n";
	$body       .= "Company: {$company}\n";
	$body       .= "Email: {$email}\n";
	$body       .= "Phone: {$phone}\n";
	$body       .= "Request Type: {$request_type}\n\n";
	$body       .= "Message:\n{$message}\n";

	$headers = array( 'Reply-To: ' . $name . ' <' . $email . '>' );
	$sent    = wp_mail( $admin_email, $subject, $body, $headers );

	mantix_redirect_with_form_status( $sent ? 'success' : 'error' );
}
add_action( 'admin_post_nopriv_mantix_submit_lead', 'mantix_handle_lead_form' );
add_action( 'admin_post_mantix_submit_lead', 'mantix_handle_lead_form' );

/**
 * Redirect with success/error flag.
 *
 * @param string $status Status key.
 */
function mantix_redirect_with_form_status( $status ) {
	$referrer = wp_get_referer();
	$target   = $referrer ? $referrer : home_url( '/#contact' );
	$target   = add_query_arg( 'mantix_form', sanitize_key( $status ), $target );
	$target   = esc_url_raw( $target . '#contact' );

	wp_safe_redirect( $target );
	exit;
}