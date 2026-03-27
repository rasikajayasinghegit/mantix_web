<?php
/**
 * Mantix Customizer settings.
 *
 * @package Mantix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Sanitize checkbox values.
 *
 * @param mixed $checked Checked value.
 * @return bool
 */
function mantix_sanitize_checkbox( $checked ) {
	return ( isset( $checked ) && true === (bool) $checked );
}

/**
 * Sanitize textarea.
 *
 * @param string $text Text value.
 * @return string
 */
function mantix_sanitize_textarea( $text ) {
	return wp_kses_post( $text );
}

/**
 * Sanitize JSON-like textarea.
 *
 * @param string $value JSON string.
 * @return string
 */
function mantix_sanitize_json( $value ) {
	$decoded = json_decode( $value, true );
	return is_array( $decoded ) ? wp_json_encode( $decoded ) : '';
}

/**
 * Register customizer controls.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 */
function mantix_customize_register( $wp_customize ) {
	$defaults = mantix_get_defaults();

	$wp_customize->add_panel(
		'mantix_panel',
		array(
			'title'       => __( 'Mantix Landing Settings', 'mantix' ),
			'description' => __( 'Edit brand, hero, section headings, CTA, contact labels, and footer settings. For section content cards/items use Mantix Content menu in wp-admin.', 'mantix' ),
			'priority'    => 40,
		)
	);

	$wp_customize->add_section(
		'mantix_brand_section',
		array(
			'title'    => __( 'Brand & Header', 'mantix' ),
			'panel'    => 'mantix_panel',
			'priority' => 10,
		)
	);

	$wp_customize->add_section(
		'mantix_hero_section',
		array(
			'title'    => __( 'Hero', 'mantix' ),
			'panel'    => 'mantix_panel',
			'priority' => 20,
		)
	);

	$wp_customize->add_section(
		'mantix_content_section',
		array(
			'title'       => __( 'Advanced Fallback Data', 'mantix' ),
			'description' => __( 'Use JSON only as fallback. Section cards/items are managed in Mantix Content menus (Features, Showcase, Benefits, Use Cases, Stats, Testimonials, Pricing, FAQ, Footer Social).', 'mantix' ),
			'panel'       => 'mantix_panel',
			'priority'    => 30,
		)
	);

	$wp_customize->add_section(
		'mantix_labels_section',
		array(
			'title'    => __( 'Section Headings & Labels', 'mantix' ),
			'panel'    => 'mantix_panel',
			'priority' => 35,
		)
	);

	$wp_customize->add_section(
		'mantix_conversion_section',
		array(
			'title'    => __( 'Conversion & Contact', 'mantix' ),
			'panel'    => 'mantix_panel',
			'priority' => 40,
		)
	);

	$wp_customize->add_section(
		'mantix_footer_section',
		array(
			'title'    => __( 'Footer & SEO', 'mantix' ),
			'panel'    => 'mantix_panel',
			'priority' => 50,
		)
	);

	$wp_customize->add_setting(
		'mantix_announcement_enabled',
		array(
			'default'           => $defaults['mantix_announcement_enabled'],
			'sanitize_callback' => 'mantix_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'mantix_announcement_enabled',
		array(
			'label'   => __( 'Enable announcement bar', 'mantix' ),
			'section' => 'mantix_brand_section',
			'type'    => 'checkbox',
		)
	);

	$brand_fields = array(
		'mantix_announcement_text'          => __( 'Announcement text', 'mantix' ),
		'mantix_announcement_link_label'    => __( 'Announcement link label', 'mantix' ),
		'mantix_announcement_link_url'      => __( 'Announcement link URL', 'mantix' ),
		'mantix_header_primary_cta_label'   => __( 'Header primary CTA label', 'mantix' ),
		'mantix_header_primary_cta_url'     => __( 'Header primary CTA URL', 'mantix' ),
		'mantix_header_secondary_cta_label' => __( 'Header secondary CTA label', 'mantix' ),
		'mantix_header_secondary_cta_url'   => __( 'Header secondary CTA URL', 'mantix' ),
	);

	foreach ( $brand_fields as $key => $label ) {
		$is_url = str_ends_with( $key, '_url' );

		$wp_customize->add_setting(
			$key,
			array(
				'default'           => $defaults[ $key ],
				'sanitize_callback' => $is_url ? 'esc_url_raw' : 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			$key,
			array(
				'label'   => $label,
				'section' => 'mantix_brand_section',
				'type'    => 'text',
			)
		);
	}

	$color_fields = array(
		'mantix_color_primary'    => __( 'Primary color', 'mantix' ),
		'mantix_color_accent'     => __( 'Accent color', 'mantix' ),
		'mantix_color_accent_alt' => __( 'Accent gradient end', 'mantix' ),
		'mantix_color_surface'    => __( 'Surface background', 'mantix' ),
	);

	foreach ( $color_fields as $key => $label ) {
		$wp_customize->add_setting(
			$key,
			array(
				'default'           => $defaults[ $key ],
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$key,
				array(
					'label'   => $label,
					'section' => 'mantix_brand_section',
				)
			)
		);
	}

	$hero_fields = array(
		'mantix_hero_eyebrow'         => __( 'Hero eyebrow', 'mantix' ),
		'mantix_hero_heading'         => __( 'Hero heading', 'mantix' ),
		'mantix_hero_text'            => __( 'Hero paragraph', 'mantix' ),
		'mantix_hero_primary_label'   => __( 'Hero primary CTA label', 'mantix' ),
		'mantix_hero_primary_url'     => __( 'Hero primary CTA URL', 'mantix' ),
		'mantix_hero_secondary_label' => __( 'Hero secondary CTA label', 'mantix' ),
		'mantix_hero_secondary_url'   => __( 'Hero secondary CTA URL', 'mantix' ),
		'mantix_hero_badges'          => __( 'Hero trust badges (one per line)', 'mantix' ),
		'mantix_hero_badges_aria_label'  => __( 'Hero badges aria label', 'mantix' ),
		'mantix_hero_mockup_aria_label'  => __( 'Hero mockup aria label', 'mantix' ),
		'mantix_hero_mockup_one_label'   => __( 'Hero mockup card 1 label', 'mantix' ),
		'mantix_hero_mockup_one_value'   => __( 'Hero mockup card 1 value', 'mantix' ),
		'mantix_hero_mockup_two_label'   => __( 'Hero mockup card 2 label', 'mantix' ),
		'mantix_hero_mockup_two_value'   => __( 'Hero mockup card 2 value', 'mantix' ),
		'mantix_hero_mockup_three_label' => __( 'Hero mockup card 3 label', 'mantix' ),
		'mantix_hero_mockup_three_value' => __( 'Hero mockup card 3 value', 'mantix' ),
		'mantix_trusted_title'        => __( 'Trusted section headline', 'mantix' ),
		'mantix_trusted_logos'        => __( 'Trusted logos (one per line)', 'mantix' ),
	);

	foreach ( $hero_fields as $key => $label ) {
		$is_url      = str_ends_with( $key, '_url' );
		$is_textarea = in_array( $key, array( 'mantix_hero_text', 'mantix_hero_badges', 'mantix_trusted_logos' ), true );

		$wp_customize->add_setting(
			$key,
			array(
				'default'           => $defaults[ $key ],
				'sanitize_callback' => $is_url ? 'esc_url_raw' : ( $is_textarea ? 'mantix_sanitize_textarea' : 'sanitize_text_field' ),
			)
		);

		$wp_customize->add_control(
			$key,
			array(
				'label'   => $label,
				'section' => 'mantix_hero_section',
				'type'    => $is_textarea ? 'textarea' : 'text',
			)
		);
	}

	$labels_fields = array(
		'mantix_features_eyebrow'          => __( 'Features eyebrow', 'mantix' ),
		'mantix_features_title'            => __( 'Features heading', 'mantix' ),
		'mantix_features_text'             => __( 'Features intro paragraph', 'mantix' ),
		'mantix_showcase_eyebrow'          => __( 'Showcase eyebrow', 'mantix' ),
		'mantix_showcase_title'            => __( 'Showcase heading', 'mantix' ),
		'mantix_benefits_eyebrow'          => __( 'Benefits eyebrow', 'mantix' ),
		'mantix_benefits_title'            => __( 'Benefits heading', 'mantix' ),
		'mantix_use_cases_eyebrow'         => __( 'Use cases eyebrow', 'mantix' ),
		'mantix_use_cases_title'           => __( 'Use cases heading', 'mantix' ),
		'mantix_stats_eyebrow'             => __( 'Stats eyebrow', 'mantix' ),
		'mantix_stats_title'               => __( 'Stats heading', 'mantix' ),
		'mantix_testimonials_eyebrow'      => __( 'Testimonials eyebrow', 'mantix' ),
		'mantix_testimonials_title'        => __( 'Testimonials heading', 'mantix' ),
		'mantix_testimonials_rating_label' => __( 'Testimonials rating aria label', 'mantix' ),
		'mantix_pricing_eyebrow'           => __( 'Pricing eyebrow', 'mantix' ),
		'mantix_pricing_title'             => __( 'Pricing heading', 'mantix' ),
		'mantix_pricing_popular_label'     => __( 'Popular plan badge label', 'mantix' ),
		'mantix_faq_eyebrow'               => __( 'FAQ eyebrow', 'mantix' ),
		'mantix_faq_title'                 => __( 'FAQ heading', 'mantix' ),
	);

	foreach ( $labels_fields as $key => $label ) {
		$is_textarea = 'mantix_features_text' === $key;

		$wp_customize->add_setting(
			$key,
			array(
				'default'           => $defaults[ $key ],
				'sanitize_callback' => $is_textarea ? 'mantix_sanitize_textarea' : 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			$key,
			array(
				'label'   => $label,
				'section' => 'mantix_labels_section',
				'type'    => $is_textarea ? 'textarea' : 'text',
			)
		);
	}

	$json_fields = array(
		'mantix_showcase_json'  => __( 'Showcase JSON', 'mantix' ),
		'mantix_benefits_json'  => __( 'Benefits JSON', 'mantix' ),
		'mantix_use_cases_json' => __( 'Use cases JSON', 'mantix' ),
		'mantix_stats_json'     => __( 'Stats JSON', 'mantix' ),
		'mantix_social_json'    => __( 'Footer social links JSON', 'mantix' ),
	);

	foreach ( $json_fields as $key => $label ) {
		$wp_customize->add_setting(
			$key,
			array(
				'default'           => $defaults[ $key ],
				'sanitize_callback' => 'mantix_sanitize_json',
			)
		);

		$wp_customize->add_control(
			$key,
			array(
				'label'       => $label,
				'description' => __( 'Use valid JSON. Invalid JSON falls back to defaults.', 'mantix' ),
				'section'     => 'mantix_content_section',
				'type'        => 'textarea',
			)
		);
	}

	$conversion_fields = array(
		'mantix_final_cta_heading'         => __( 'Final CTA heading', 'mantix' ),
		'mantix_final_cta_text'            => __( 'Final CTA text', 'mantix' ),
		'mantix_final_cta_primary_label'   => __( 'Final CTA primary button label', 'mantix' ),
		'mantix_final_cta_primary_url'     => __( 'Final CTA primary button URL', 'mantix' ),
		'mantix_final_cta_secondary_label' => __( 'Final CTA secondary button label', 'mantix' ),
		'mantix_final_cta_secondary_url'   => __( 'Final CTA secondary button URL', 'mantix' ),
		'mantix_contact_eyebrow'           => __( 'Contact section eyebrow', 'mantix' ),
		'mantix_contact_heading'           => __( 'Contact heading', 'mantix' ),
		'mantix_contact_text'              => __( 'Contact text', 'mantix' ),
		'mantix_contact_shortcode'         => __( 'Contact Form 7 shortcode (optional)', 'mantix' ),
		'mantix_request_types'             => __( 'Request types (one per line)', 'mantix' ),
		'mantix_form_success_message'      => __( 'Form success message', 'mantix' ),
		'mantix_form_error_message'        => __( 'Form error message', 'mantix' ),
		'mantix_form_name_label'           => __( 'Form: name label', 'mantix' ),
		'mantix_form_company_label'        => __( 'Form: company label', 'mantix' ),
		'mantix_form_email_label'          => __( 'Form: email label', 'mantix' ),
		'mantix_form_phone_label'          => __( 'Form: phone label', 'mantix' ),
		'mantix_form_request_type_label'   => __( 'Form: request type label', 'mantix' ),
		'mantix_form_message_label'        => __( 'Form: message label', 'mantix' ),
		'mantix_form_submit_label'         => __( 'Form: submit button label', 'mantix' ),
	);

	foreach ( $conversion_fields as $key => $label ) {
		$is_url      = str_ends_with( $key, '_url' );
		$is_textarea = in_array( $key, array( 'mantix_final_cta_text', 'mantix_contact_text', 'mantix_request_types' ), true );

		$wp_customize->add_setting(
			$key,
			array(
				'default'           => $defaults[ $key ],
				'sanitize_callback' => $is_url ? 'esc_url_raw' : ( $is_textarea ? 'mantix_sanitize_textarea' : 'sanitize_text_field' ),
			)
		);

		$wp_customize->add_control(
			$key,
			array(
				'label'   => $label,
				'section' => 'mantix_conversion_section',
				'type'    => $is_textarea ? 'textarea' : 'text',
			)
		);
	}

	$footer_fields = array(
		'mantix_footer_summary'             => __( 'Footer summary', 'mantix' ),
		'mantix_footer_copyright'           => __( 'Footer copyright suffix', 'mantix' ),
		'mantix_footer_quick_links_title'   => __( 'Footer quick links heading', 'mantix' ),
		'mantix_footer_legal_title'         => __( 'Footer legal heading', 'mantix' ),
		'mantix_footer_social_title'        => __( 'Footer social heading', 'mantix' ),
		'mantix_footer_legal_privacy_label' => __( 'Legal link: privacy label', 'mantix' ),
		'mantix_footer_legal_privacy_url'   => __( 'Legal link: privacy URL', 'mantix' ),
		'mantix_footer_legal_terms_label'   => __( 'Legal link: terms label', 'mantix' ),
		'mantix_footer_legal_terms_url'     => __( 'Legal link: terms URL', 'mantix' ),
		'mantix_footer_legal_cookie_label'  => __( 'Legal link: cookie label', 'mantix' ),
		'mantix_footer_legal_cookie_url'    => __( 'Legal link: cookie URL', 'mantix' ),
		'mantix_meta_description'           => __( 'Meta description', 'mantix' ),
	);

	foreach ( $footer_fields as $key => $label ) {
		$is_textarea = 'mantix_footer_summary' === $key;
		$is_url      = str_ends_with( $key, '_url' );

		$wp_customize->add_setting(
			$key,
			array(
				'default'           => $defaults[ $key ],
				'sanitize_callback' => $is_url ? 'esc_url_raw' : ( $is_textarea ? 'mantix_sanitize_textarea' : 'sanitize_text_field' ),
			)
		);

		$wp_customize->add_control(
			$key,
			array(
				'label'   => $label,
				'section' => 'mantix_footer_section',
				'type'    => $is_textarea ? 'textarea' : 'text',
			)
		);
	}
}
add_action( 'customize_register', 'mantix_customize_register' );
