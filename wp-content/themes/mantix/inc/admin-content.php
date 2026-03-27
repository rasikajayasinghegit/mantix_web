<?php
/**
 * Mantix admin content management and structured section data.
 *
 * @package Mantix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register custom post types for editable landing content.
 */
function mantix_register_content_types() {
	register_post_type(
		'mantix_feature',
		array(
			'labels' => array(
				'name'               => __( 'Features', 'mantix' ),
				'singular_name'      => __( 'Feature', 'mantix' ),
				'add_new_item'       => __( 'Add New Feature', 'mantix' ),
				'edit_item'          => __( 'Edit Feature', 'mantix' ),
				'all_items'          => __( 'All Features', 'mantix' ),
				'menu_name'          => __( 'Features', 'mantix' ),
			),
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_rest'        => true,
			'menu_icon'           => 'dashicons-screenoptions',
			'supports'            => array( 'title', 'editor', 'excerpt', 'page-attributes' ),
			'exclude_from_search' => true,
		)
	);

	register_post_type(
		'mantix_testimonial',
		array(
			'labels' => array(
				'name'               => __( 'Testimonials', 'mantix' ),
				'singular_name'      => __( 'Testimonial', 'mantix' ),
				'add_new_item'       => __( 'Add New Testimonial', 'mantix' ),
				'edit_item'          => __( 'Edit Testimonial', 'mantix' ),
				'all_items'          => __( 'All Testimonials', 'mantix' ),
				'menu_name'          => __( 'Testimonials', 'mantix' ),
			),
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_rest'        => true,
			'menu_icon'           => 'dashicons-format-quote',
			'supports'            => array( 'title', 'editor', 'page-attributes' ),
			'exclude_from_search' => true,
		)
	);

	register_post_type(
		'mantix_pricing',
		array(
			'labels' => array(
				'name'               => __( 'Pricing Plans', 'mantix' ),
				'singular_name'      => __( 'Pricing Plan', 'mantix' ),
				'add_new_item'       => __( 'Add New Pricing Plan', 'mantix' ),
				'edit_item'          => __( 'Edit Pricing Plan', 'mantix' ),
				'all_items'          => __( 'All Pricing Plans', 'mantix' ),
				'menu_name'          => __( 'Pricing Plans', 'mantix' ),
			),
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_rest'        => true,
			'menu_icon'           => 'dashicons-tag',
			'supports'            => array( 'title', 'editor', 'excerpt', 'page-attributes' ),
			'exclude_from_search' => true,
		)
	);

	register_post_type(
		'mantix_faq',
		array(
			'labels' => array(
				'name'               => __( 'FAQs', 'mantix' ),
				'singular_name'      => __( 'FAQ', 'mantix' ),
				'add_new_item'       => __( 'Add New FAQ', 'mantix' ),
				'edit_item'          => __( 'Edit FAQ', 'mantix' ),
				'all_items'          => __( 'All FAQs', 'mantix' ),
				'menu_name'          => __( 'FAQs', 'mantix' ),
			),
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_rest'        => true,
			'menu_icon'           => 'dashicons-editor-help',
			'supports'            => array( 'title', 'editor', 'page-attributes' ),
			'exclude_from_search' => true,
		)
	);

	register_post_type(
		'mantix_showcase',
		array(
			'labels' => array(
				'name'               => __( 'Showcase Items', 'mantix' ),
				'singular_name'      => __( 'Showcase Item', 'mantix' ),
				'add_new_item'       => __( 'Add New Showcase Item', 'mantix' ),
				'edit_item'          => __( 'Edit Showcase Item', 'mantix' ),
				'all_items'          => __( 'All Showcase Items', 'mantix' ),
				'menu_name'          => __( 'Showcase', 'mantix' ),
			),
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_rest'        => true,
			'menu_icon'           => 'dashicons-images-alt2',
			'supports'            => array( 'title', 'editor', 'page-attributes' ),
			'exclude_from_search' => true,
		)
	);

	register_post_type(
		'mantix_benefit',
		array(
			'labels' => array(
				'name'               => __( 'Benefits', 'mantix' ),
				'singular_name'      => __( 'Benefit', 'mantix' ),
				'add_new_item'       => __( 'Add New Benefit', 'mantix' ),
				'edit_item'          => __( 'Edit Benefit', 'mantix' ),
				'all_items'          => __( 'All Benefits', 'mantix' ),
				'menu_name'          => __( 'Benefits', 'mantix' ),
			),
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_rest'        => true,
			'menu_icon'           => 'dashicons-thumbs-up',
			'supports'            => array( 'title', 'editor', 'excerpt', 'page-attributes' ),
			'exclude_from_search' => true,
		)
	);

	register_post_type(
		'mantix_use_case',
		array(
			'labels' => array(
				'name'               => __( 'Use Cases', 'mantix' ),
				'singular_name'      => __( 'Use Case', 'mantix' ),
				'add_new_item'       => __( 'Add New Use Case', 'mantix' ),
				'edit_item'          => __( 'Edit Use Case', 'mantix' ),
				'all_items'          => __( 'All Use Cases', 'mantix' ),
				'menu_name'          => __( 'Use Cases', 'mantix' ),
			),
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_rest'        => true,
			'menu_icon'           => 'dashicons-analytics',
			'supports'            => array( 'title', 'editor', 'excerpt', 'page-attributes' ),
			'exclude_from_search' => true,
		)
	);

	register_post_type(
		'mantix_stat',
		array(
			'labels' => array(
				'name'               => __( 'Stats', 'mantix' ),
				'singular_name'      => __( 'Stat', 'mantix' ),
				'add_new_item'       => __( 'Add New Stat', 'mantix' ),
				'edit_item'          => __( 'Edit Stat', 'mantix' ),
				'all_items'          => __( 'All Stats', 'mantix' ),
				'menu_name'          => __( 'Stats', 'mantix' ),
			),
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_rest'        => true,
			'menu_icon'           => 'dashicons-chart-area',
			'supports'            => array( 'title', 'page-attributes' ),
			'exclude_from_search' => true,
		)
	);

	register_post_type(
		'mantix_social_link',
		array(
			'labels' => array(
				'name'               => __( 'Social Links', 'mantix' ),
				'singular_name'      => __( 'Social Link', 'mantix' ),
				'add_new_item'       => __( 'Add New Social Link', 'mantix' ),
				'edit_item'          => __( 'Edit Social Link', 'mantix' ),
				'all_items'          => __( 'All Social Links', 'mantix' ),
				'menu_name'          => __( 'Footer Social', 'mantix' ),
			),
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_rest'        => true,
			'menu_icon'           => 'dashicons-share',
			'supports'            => array( 'title', 'page-attributes' ),
			'exclude_from_search' => true,
		)
	);
}
add_action( 'init', 'mantix_register_content_types' );

/**
 * Register post meta for REST/editor compatibility.
 */
function mantix_register_content_meta() {
	register_post_meta(
		'mantix_feature',
		'_mantix_feature_icon',
		array(
			'show_in_rest'      => true,
			'single'            => true,
			'type'              => 'string',
			'sanitize_callback' => 'sanitize_key',
			'auth_callback'     => '__return_true',
		)
	);

	register_post_meta(
		'mantix_testimonial',
		'_mantix_testimonial_role',
		array(
			'show_in_rest'      => true,
			'single'            => true,
			'type'              => 'string',
			'sanitize_callback' => 'sanitize_text_field',
			'auth_callback'     => '__return_true',
		)
	);

	register_post_meta(
		'mantix_testimonial',
		'_mantix_testimonial_company',
		array(
			'show_in_rest'      => true,
			'single'            => true,
			'type'              => 'string',
			'sanitize_callback' => 'sanitize_text_field',
			'auth_callback'     => '__return_true',
		)
	);

	register_post_meta(
		'mantix_testimonial',
		'_mantix_testimonial_rating',
		array(
			'show_in_rest'      => true,
			'single'            => true,
			'type'              => 'integer',
			'sanitize_callback' => 'absint',
			'auth_callback'     => '__return_true',
		)
	);

	$pricing_meta = array(
		'_mantix_pricing_price'        => 'string',
		'_mantix_pricing_period'       => 'string',
		'_mantix_pricing_button_label' => 'string',
		'_mantix_pricing_button_url'   => 'string',
		'_mantix_pricing_features'     => 'string',
		'_mantix_pricing_popular'      => 'boolean',
	);

	foreach ( $pricing_meta as $key => $type ) {
		register_post_meta(
			'mantix_pricing',
			$key,
			array(
				'show_in_rest'      => true,
				'single'            => true,
				'type'              => $type,
				'sanitize_callback' => ( 'boolean' === $type ) ? 'rest_sanitize_boolean' : ( '_mantix_pricing_button_url' === $key ? 'esc_url_raw' : 'sanitize_text_field' ),
				'auth_callback'     => '__return_true',
			)
		);
	}

	register_post_meta(
		'mantix_showcase',
		'_mantix_showcase_tag',
		array(
			'show_in_rest'      => true,
			'single'            => true,
			'type'              => 'string',
			'sanitize_callback' => 'sanitize_text_field',
			'auth_callback'     => '__return_true',
		)
	);

	register_post_meta(
		'mantix_showcase',
		'_mantix_showcase_bullets',
		array(
			'show_in_rest'      => true,
			'single'            => true,
			'type'              => 'string',
			'sanitize_callback' => 'sanitize_textarea_field',
			'auth_callback'     => '__return_true',
		)
	);

	register_post_meta(
		'mantix_stat',
		'_mantix_stat_value',
		array(
			'show_in_rest'      => true,
			'single'            => true,
			'type'              => 'integer',
			'sanitize_callback' => 'absint',
			'auth_callback'     => '__return_true',
		)
	);

	register_post_meta(
		'mantix_stat',
		'_mantix_stat_suffix',
		array(
			'show_in_rest'      => true,
			'single'            => true,
			'type'              => 'string',
			'sanitize_callback' => 'sanitize_text_field',
			'auth_callback'     => '__return_true',
		)
	);

	register_post_meta(
		'mantix_social_link',
		'_mantix_social_url',
		array(
			'show_in_rest'      => true,
			'single'            => true,
			'type'              => 'string',
			'sanitize_callback' => 'esc_url_raw',
			'auth_callback'     => '__return_true',
		)
	);
}
add_action( 'init', 'mantix_register_content_meta' );

/**
 * Add meta boxes for structured section fields.
 */
function mantix_add_content_meta_boxes() {
	add_meta_box( 'mantix_feature_fields', __( 'Feature Settings', 'mantix' ), 'mantix_render_feature_meta_box', 'mantix_feature', 'normal', 'default' );
	add_meta_box( 'mantix_testimonial_fields', __( 'Testimonial Settings', 'mantix' ), 'mantix_render_testimonial_meta_box', 'mantix_testimonial', 'normal', 'default' );
	add_meta_box( 'mantix_pricing_fields', __( 'Pricing Plan Settings', 'mantix' ), 'mantix_render_pricing_meta_box', 'mantix_pricing', 'normal', 'default' );
	add_meta_box( 'mantix_showcase_fields', __( 'Showcase Settings', 'mantix' ), 'mantix_render_showcase_meta_box', 'mantix_showcase', 'normal', 'default' );
	add_meta_box( 'mantix_stat_fields', __( 'Stat Settings', 'mantix' ), 'mantix_render_stat_meta_box', 'mantix_stat', 'normal', 'default' );
	add_meta_box( 'mantix_social_fields', __( 'Social Link Settings', 'mantix' ), 'mantix_render_social_meta_box', 'mantix_social_link', 'normal', 'default' );
}
add_action( 'add_meta_boxes', 'mantix_add_content_meta_boxes' );

/**
 * Render feature meta box.
 *
 * @param WP_Post $post Post object.
 */
function mantix_render_feature_meta_box( $post ) {
	$icon = (string) get_post_meta( $post->ID, '_mantix_feature_icon', true );

	wp_nonce_field( 'mantix_save_meta', 'mantix_meta_nonce' );
	?>
	<p>
		<label for="mantix_feature_icon"><strong><?php esc_html_e( 'Icon slug', 'mantix' ); ?></strong></label>
		<input type="text" id="mantix_feature_icon" name="mantix_feature_icon" value="<?php echo esc_attr( $icon ); ?>" class="widefat" placeholder="automation" />
	</p>
	<p class="description">
		<?php esc_html_e( 'Use one of: automation, collaboration, reporting, insights, security, tracking, scalable, dashboard.', 'mantix' ); ?>
	</p>
	<p class="description">
		<?php esc_html_e( 'Description uses the Excerpt field. If Excerpt is empty, content is used automatically.', 'mantix' ); ?>
	</p>
	<?php
}

/**
 * Render testimonial meta box.
 *
 * @param WP_Post $post Post object.
 */
function mantix_render_testimonial_meta_box( $post ) {
	$role    = (string) get_post_meta( $post->ID, '_mantix_testimonial_role', true );
	$company = (string) get_post_meta( $post->ID, '_mantix_testimonial_company', true );
	$rating  = (int) get_post_meta( $post->ID, '_mantix_testimonial_rating', true );
	$rating  = $rating ? $rating : 5;

	wp_nonce_field( 'mantix_save_meta', 'mantix_meta_nonce' );
	?>
	<p>
		<label for="mantix_testimonial_role"><strong><?php esc_html_e( 'Role', 'mantix' ); ?></strong></label>
		<input type="text" id="mantix_testimonial_role" name="mantix_testimonial_role" value="<?php echo esc_attr( $role ); ?>" class="widefat" />
	</p>
	<p>
		<label for="mantix_testimonial_company"><strong><?php esc_html_e( 'Company', 'mantix' ); ?></strong></label>
		<input type="text" id="mantix_testimonial_company" name="mantix_testimonial_company" value="<?php echo esc_attr( $company ); ?>" class="widefat" />
	</p>
	<p>
		<label for="mantix_testimonial_rating"><strong><?php esc_html_e( 'Rating (1-5)', 'mantix' ); ?></strong></label>
		<input type="number" min="1" max="5" id="mantix_testimonial_rating" name="mantix_testimonial_rating" value="<?php echo esc_attr( (string) $rating ); ?>" class="small-text" />
	</p>
	<p class="description">
		<?php esc_html_e( 'Testimonial quote uses the main content editor.', 'mantix' ); ?>
	</p>
	<?php
}

/**
 * Render pricing meta box.
 *
 * @param WP_Post $post Post object.
 */
function mantix_render_pricing_meta_box( $post ) {
	$price        = (string) get_post_meta( $post->ID, '_mantix_pricing_price', true );
	$period       = (string) get_post_meta( $post->ID, '_mantix_pricing_period', true );
	$button_label = (string) get_post_meta( $post->ID, '_mantix_pricing_button_label', true );
	$button_url   = (string) get_post_meta( $post->ID, '_mantix_pricing_button_url', true );
	$features     = (string) get_post_meta( $post->ID, '_mantix_pricing_features', true );
	$popular      = (bool) get_post_meta( $post->ID, '_mantix_pricing_popular', true );

	wp_nonce_field( 'mantix_save_meta', 'mantix_meta_nonce' );
	?>
	<p>
		<label for="mantix_pricing_price"><strong><?php esc_html_e( 'Price', 'mantix' ); ?></strong></label>
		<input type="text" id="mantix_pricing_price" name="mantix_pricing_price" value="<?php echo esc_attr( $price ); ?>" class="widefat" placeholder="$99" />
	</p>
	<p>
		<label for="mantix_pricing_period"><strong><?php esc_html_e( 'Price period', 'mantix' ); ?></strong></label>
		<input type="text" id="mantix_pricing_period" name="mantix_pricing_period" value="<?php echo esc_attr( $period ); ?>" class="widefat" placeholder="/month" />
	</p>
	<p>
		<label for="mantix_pricing_button_label"><strong><?php esc_html_e( 'CTA button label', 'mantix' ); ?></strong></label>
		<input type="text" id="mantix_pricing_button_label" name="mantix_pricing_button_label" value="<?php echo esc_attr( $button_label ); ?>" class="widefat" />
	</p>
	<p>
		<label for="mantix_pricing_button_url"><strong><?php esc_html_e( 'CTA button URL', 'mantix' ); ?></strong></label>
		<input type="url" id="mantix_pricing_button_url" name="mantix_pricing_button_url" value="<?php echo esc_attr( $button_url ); ?>" class="widefat" />
	</p>
	<p>
		<label for="mantix_pricing_features"><strong><?php esc_html_e( 'Plan features (one per line)', 'mantix' ); ?></strong></label>
		<textarea id="mantix_pricing_features" name="mantix_pricing_features" rows="5" class="widefat"><?php echo esc_textarea( $features ); ?></textarea>
	</p>
	<p>
		<label>
			<input type="checkbox" name="mantix_pricing_popular" value="1" <?php checked( $popular ); ?> />
			<?php esc_html_e( 'Mark as Most Popular plan', 'mantix' ); ?>
		</label>
	</p>
	<p class="description">
		<?php esc_html_e( 'Plan description uses Excerpt. If Excerpt is empty, content is used.', 'mantix' ); ?>
	</p>
	<?php
}

/**
 * Render showcase meta box.
 *
 * @param WP_Post $post Post object.
 */
function mantix_render_showcase_meta_box( $post ) {
	$tag     = (string) get_post_meta( $post->ID, '_mantix_showcase_tag', true );
	$bullets = (string) get_post_meta( $post->ID, '_mantix_showcase_bullets', true );

	wp_nonce_field( 'mantix_save_meta', 'mantix_meta_nonce' );
	?>
	<p>
		<label for="mantix_showcase_tag"><strong><?php esc_html_e( 'Tag label', 'mantix' ); ?></strong></label>
		<input type="text" id="mantix_showcase_tag" name="mantix_showcase_tag" value="<?php echo esc_attr( $tag ); ?>" class="widefat" placeholder="<?php esc_attr_e( 'Centralized Operations', 'mantix' ); ?>" />
	</p>
	<p>
		<label for="mantix_showcase_bullets"><strong><?php esc_html_e( 'Bullet points (one per line)', 'mantix' ); ?></strong></label>
		<textarea id="mantix_showcase_bullets" name="mantix_showcase_bullets" rows="5" class="widefat"><?php echo esc_textarea( $bullets ); ?></textarea>
	</p>
	<p class="description">
		<?php esc_html_e( 'Description uses the main content editor.', 'mantix' ); ?>
	</p>
	<?php
}

/**
 * Render stat meta box.
 *
 * @param WP_Post $post Post object.
 */
function mantix_render_stat_meta_box( $post ) {
	$value  = (int) get_post_meta( $post->ID, '_mantix_stat_value', true );
	$suffix = (string) get_post_meta( $post->ID, '_mantix_stat_suffix', true );

	wp_nonce_field( 'mantix_save_meta', 'mantix_meta_nonce' );
	?>
	<p>
		<label for="mantix_stat_value"><strong><?php esc_html_e( 'Numeric value', 'mantix' ); ?></strong></label>
		<input type="number" min="0" id="mantix_stat_value" name="mantix_stat_value" value="<?php echo esc_attr( (string) $value ); ?>" class="small-text" />
	</p>
	<p>
		<label for="mantix_stat_suffix"><strong><?php esc_html_e( 'Suffix', 'mantix' ); ?></strong></label>
		<input type="text" id="mantix_stat_suffix" name="mantix_stat_suffix" value="<?php echo esc_attr( $suffix ); ?>" class="regular-text" placeholder="%" />
	</p>
	<p class="description">
		<?php esc_html_e( 'Stat label uses the title field.', 'mantix' ); ?>
	</p>
	<?php
}

/**
 * Render social link meta box.
 *
 * @param WP_Post $post Post object.
 */
function mantix_render_social_meta_box( $post ) {
	$url = (string) get_post_meta( $post->ID, '_mantix_social_url', true );

	wp_nonce_field( 'mantix_save_meta', 'mantix_meta_nonce' );
	?>
	<p>
		<label for="mantix_social_url"><strong><?php esc_html_e( 'Profile URL', 'mantix' ); ?></strong></label>
		<input type="url" id="mantix_social_url" name="mantix_social_url" value="<?php echo esc_attr( $url ); ?>" class="widefat" placeholder="https://example.com" />
	</p>
	<p class="description">
		<?php esc_html_e( 'Link label uses the title field.', 'mantix' ); ?>
	</p>
	<?php
}

/**
 * Save content meta fields.
 *
 * @param int $post_id Post ID.
 */
function mantix_save_content_meta( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! isset( $_POST['mantix_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['mantix_meta_nonce'] ) ), 'mantix_save_meta' ) ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$post_type = get_post_type( $post_id );

	if ( 'mantix_feature' === $post_type ) {
		$icon = isset( $_POST['mantix_feature_icon'] ) ? sanitize_key( wp_unslash( $_POST['mantix_feature_icon'] ) ) : 'dashboard';
		update_post_meta( $post_id, '_mantix_feature_icon', $icon );
	}

	if ( 'mantix_testimonial' === $post_type ) {
		$role    = isset( $_POST['mantix_testimonial_role'] ) ? sanitize_text_field( wp_unslash( $_POST['mantix_testimonial_role'] ) ) : '';
		$company = isset( $_POST['mantix_testimonial_company'] ) ? sanitize_text_field( wp_unslash( $_POST['mantix_testimonial_company'] ) ) : '';
		$rating  = isset( $_POST['mantix_testimonial_rating'] ) ? absint( wp_unslash( $_POST['mantix_testimonial_rating'] ) ) : 5;
		$rating  = max( 1, min( 5, $rating ) );

		update_post_meta( $post_id, '_mantix_testimonial_role', $role );
		update_post_meta( $post_id, '_mantix_testimonial_company', $company );
		update_post_meta( $post_id, '_mantix_testimonial_rating', $rating );
	}

	if ( 'mantix_pricing' === $post_type ) {
		$price        = isset( $_POST['mantix_pricing_price'] ) ? sanitize_text_field( wp_unslash( $_POST['mantix_pricing_price'] ) ) : '';
		$period       = isset( $_POST['mantix_pricing_period'] ) ? sanitize_text_field( wp_unslash( $_POST['mantix_pricing_period'] ) ) : '';
		$button_label = isset( $_POST['mantix_pricing_button_label'] ) ? sanitize_text_field( wp_unslash( $_POST['mantix_pricing_button_label'] ) ) : '';
		$button_url   = isset( $_POST['mantix_pricing_button_url'] ) ? esc_url_raw( wp_unslash( $_POST['mantix_pricing_button_url'] ) ) : '';
		$features     = isset( $_POST['mantix_pricing_features'] ) ? sanitize_textarea_field( wp_unslash( $_POST['mantix_pricing_features'] ) ) : '';
		$popular      = isset( $_POST['mantix_pricing_popular'] ) ? '1' : '0';

		update_post_meta( $post_id, '_mantix_pricing_price', $price );
		update_post_meta( $post_id, '_mantix_pricing_period', $period );
		update_post_meta( $post_id, '_mantix_pricing_button_label', $button_label );
		update_post_meta( $post_id, '_mantix_pricing_button_url', $button_url );
		update_post_meta( $post_id, '_mantix_pricing_features', $features );
		update_post_meta( $post_id, '_mantix_pricing_popular', $popular );
	}

	if ( 'mantix_showcase' === $post_type ) {
		$tag     = isset( $_POST['mantix_showcase_tag'] ) ? sanitize_text_field( wp_unslash( $_POST['mantix_showcase_tag'] ) ) : '';
		$bullets = isset( $_POST['mantix_showcase_bullets'] ) ? sanitize_textarea_field( wp_unslash( $_POST['mantix_showcase_bullets'] ) ) : '';

		update_post_meta( $post_id, '_mantix_showcase_tag', $tag );
		update_post_meta( $post_id, '_mantix_showcase_bullets', $bullets );
	}

	if ( 'mantix_stat' === $post_type ) {
		$value  = isset( $_POST['mantix_stat_value'] ) ? absint( wp_unslash( $_POST['mantix_stat_value'] ) ) : 0;
		$suffix = isset( $_POST['mantix_stat_suffix'] ) ? sanitize_text_field( wp_unslash( $_POST['mantix_stat_suffix'] ) ) : '';

		update_post_meta( $post_id, '_mantix_stat_value', $value );
		update_post_meta( $post_id, '_mantix_stat_suffix', $suffix );
	}

	if ( 'mantix_social_link' === $post_type ) {
		$url = isset( $_POST['mantix_social_url'] ) ? esc_url_raw( wp_unslash( $_POST['mantix_social_url'] ) ) : '';
		update_post_meta( $post_id, '_mantix_social_url', $url );
	}
}
add_action( 'save_post', 'mantix_save_content_meta' );

/**
 * Register backend menus for homepage section editing.
 */
function mantix_register_homepage_hub() {
	add_menu_page(
		__( 'Mantix Content', 'mantix' ),
		__( 'Mantix Content', 'mantix' ),
		'edit_theme_options',
		'mantix-homepage-content',
		'mantix_render_homepage_hub',
		'dashicons-welcome-widgets-menus',
		26
	);

	add_submenu_page(
		'mantix-homepage-content',
		__( 'Overview', 'mantix' ),
		__( 'Overview', 'mantix' ),
		'edit_theme_options',
		'mantix-homepage-content',
		'mantix_render_homepage_hub'
	);

	add_submenu_page(
		'mantix-homepage-content',
		__( 'Brand, Hero & CTA', 'mantix' ),
		__( 'Brand, Hero & CTA', 'mantix' ),
		'edit_theme_options',
		'mantix-content-customizer',
		'mantix_redirect_to_customizer'
	);

	add_submenu_page(
		'mantix-homepage-content',
		__( 'Features', 'mantix' ),
		__( 'Features', 'mantix' ),
		'edit_theme_options',
		'mantix-content-features',
		'mantix_redirect_to_features'
	);

	add_submenu_page(
		'mantix-homepage-content',
		__( 'Showcase', 'mantix' ),
		__( 'Showcase', 'mantix' ),
		'edit_theme_options',
		'mantix-content-showcase',
		'mantix_redirect_to_showcase'
	);

	add_submenu_page(
		'mantix-homepage-content',
		__( 'Benefits', 'mantix' ),
		__( 'Benefits', 'mantix' ),
		'edit_theme_options',
		'mantix-content-benefits',
		'mantix_redirect_to_benefits'
	);

	add_submenu_page(
		'mantix-homepage-content',
		__( 'Use Cases', 'mantix' ),
		__( 'Use Cases', 'mantix' ),
		'edit_theme_options',
		'mantix-content-use-cases',
		'mantix_redirect_to_use_cases'
	);

	add_submenu_page(
		'mantix-homepage-content',
		__( 'Stats', 'mantix' ),
		__( 'Stats', 'mantix' ),
		'edit_theme_options',
		'mantix-content-stats',
		'mantix_redirect_to_stats'
	);

	add_submenu_page(
		'mantix-homepage-content',
		__( 'Testimonials', 'mantix' ),
		__( 'Testimonials', 'mantix' ),
		'edit_theme_options',
		'mantix-content-testimonials',
		'mantix_redirect_to_testimonials'
	);

	add_submenu_page(
		'mantix-homepage-content',
		__( 'Pricing Plans', 'mantix' ),
		__( 'Pricing Plans', 'mantix' ),
		'edit_theme_options',
		'mantix-content-pricing',
		'mantix_redirect_to_pricing'
	);

	add_submenu_page(
		'mantix-homepage-content',
		__( 'FAQ', 'mantix' ),
		__( 'FAQ', 'mantix' ),
		'edit_theme_options',
		'mantix-content-faq',
		'mantix_redirect_to_faq'
	);

	add_submenu_page(
		'mantix-homepage-content',
		__( 'Footer Social', 'mantix' ),
		__( 'Footer Social', 'mantix' ),
		'edit_theme_options',
		'mantix-content-social',
		'mantix_redirect_to_social_links'
	);
}
add_action( 'admin_menu', 'mantix_register_homepage_hub' );

/**
 * Redirect content submenu to customizer panel.
 */
function mantix_redirect_to_customizer() {
	wp_safe_redirect( admin_url( 'customize.php?autofocus[panel]=mantix_panel' ) );
	exit;
}

/**
 * Redirect content submenu to features list.
 */
function mantix_redirect_to_features() {
	wp_safe_redirect( admin_url( 'edit.php?post_type=mantix_feature' ) );
	exit;
}

/**
 * Redirect content submenu to showcase list.
 */
function mantix_redirect_to_showcase() {
	wp_safe_redirect( admin_url( 'edit.php?post_type=mantix_showcase' ) );
	exit;
}

/**
 * Redirect content submenu to benefits list.
 */
function mantix_redirect_to_benefits() {
	wp_safe_redirect( admin_url( 'edit.php?post_type=mantix_benefit' ) );
	exit;
}

/**
 * Redirect content submenu to use cases list.
 */
function mantix_redirect_to_use_cases() {
	wp_safe_redirect( admin_url( 'edit.php?post_type=mantix_use_case' ) );
	exit;
}

/**
 * Redirect content submenu to stats list.
 */
function mantix_redirect_to_stats() {
	wp_safe_redirect( admin_url( 'edit.php?post_type=mantix_stat' ) );
	exit;
}

/**
 * Redirect content submenu to testimonials list.
 */
function mantix_redirect_to_testimonials() {
	wp_safe_redirect( admin_url( 'edit.php?post_type=mantix_testimonial' ) );
	exit;
}

/**
 * Redirect content submenu to pricing list.
 */
function mantix_redirect_to_pricing() {
	wp_safe_redirect( admin_url( 'edit.php?post_type=mantix_pricing' ) );
	exit;
}

/**
 * Redirect content submenu to FAQ list.
 */
function mantix_redirect_to_faq() {
	wp_safe_redirect( admin_url( 'edit.php?post_type=mantix_faq' ) );
	exit;
}

/**
 * Redirect content submenu to footer social links.
 */
function mantix_redirect_to_social_links() {
	wp_safe_redirect( admin_url( 'edit.php?post_type=mantix_social_link' ) );
	exit;
}

/**
 * Render homepage hub page.
 */
function mantix_render_homepage_hub() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return;
	}

	$customizer_url = admin_url( 'customize.php?autofocus[panel]=mantix_panel' );
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Mantix Homepage Content Manager', 'mantix' ); ?></h1>
		<p><?php esc_html_e( 'Use the links below to edit each landing page section with clean, structured fields.', 'mantix' ); ?></p>
		<hr />
		<h2><?php esc_html_e( 'Section Editors', 'mantix' ); ?></h2>
		<ul style="list-style:disc; padding-left:20px;">
			<li><strong><?php esc_html_e( 'Brand/Header, Hero, section headings, CTA, contact form labels, footer labels:', 'mantix' ); ?></strong> <a href="<?php echo esc_url( $customizer_url ); ?>"><?php esc_html_e( 'Open Mantix Customizer Settings', 'mantix' ); ?></a></li>
			<li><strong><?php esc_html_e( 'Features:', 'mantix' ); ?></strong> <a href="<?php echo esc_url( admin_url( 'edit.php?post_type=mantix_feature' ) ); ?>"><?php esc_html_e( 'Manage Features', 'mantix' ); ?></a></li>
			<li><strong><?php esc_html_e( 'Showcase:', 'mantix' ); ?></strong> <a href="<?php echo esc_url( admin_url( 'edit.php?post_type=mantix_showcase' ) ); ?>"><?php esc_html_e( 'Manage Showcase Items', 'mantix' ); ?></a></li>
			<li><strong><?php esc_html_e( 'Benefits:', 'mantix' ); ?></strong> <a href="<?php echo esc_url( admin_url( 'edit.php?post_type=mantix_benefit' ) ); ?>"><?php esc_html_e( 'Manage Benefits', 'mantix' ); ?></a></li>
			<li><strong><?php esc_html_e( 'Use Cases:', 'mantix' ); ?></strong> <a href="<?php echo esc_url( admin_url( 'edit.php?post_type=mantix_use_case' ) ); ?>"><?php esc_html_e( 'Manage Use Cases', 'mantix' ); ?></a></li>
			<li><strong><?php esc_html_e( 'Stats:', 'mantix' ); ?></strong> <a href="<?php echo esc_url( admin_url( 'edit.php?post_type=mantix_stat' ) ); ?>"><?php esc_html_e( 'Manage Stats', 'mantix' ); ?></a></li>
			<li><strong><?php esc_html_e( 'Testimonials:', 'mantix' ); ?></strong> <a href="<?php echo esc_url( admin_url( 'edit.php?post_type=mantix_testimonial' ) ); ?>"><?php esc_html_e( 'Manage Testimonials', 'mantix' ); ?></a></li>
			<li><strong><?php esc_html_e( 'Pricing:', 'mantix' ); ?></strong> <a href="<?php echo esc_url( admin_url( 'edit.php?post_type=mantix_pricing' ) ); ?>"><?php esc_html_e( 'Manage Pricing Plans', 'mantix' ); ?></a></li>
			<li><strong><?php esc_html_e( 'FAQ:', 'mantix' ); ?></strong> <a href="<?php echo esc_url( admin_url( 'edit.php?post_type=mantix_faq' ) ); ?>"><?php esc_html_e( 'Manage FAQs', 'mantix' ); ?></a></li>
			<li><strong><?php esc_html_e( 'Footer Social Links:', 'mantix' ); ?></strong> <a href="<?php echo esc_url( admin_url( 'edit.php?post_type=mantix_social_link' ) ); ?>"><?php esc_html_e( 'Manage Footer Social Links', 'mantix' ); ?></a></li>
		</ul>
		<p><?php esc_html_e( 'Tip: use the "Order" field in each item to control display sequence on the homepage.', 'mantix' ); ?></p>
	</div>
	<?php
}

/**
 * Return published posts for a landing content type.
 *
 * @param string $post_type Post type slug.
 * @return array<int,WP_Post>
 */
function mantix_get_content_posts( $post_type ) {
	$query = new WP_Query(
		array(
			'post_type'      => $post_type,
			'post_status'    => 'publish',
			'posts_per_page' => -1,
			'orderby'        => array(
				'menu_order' => 'ASC',
				'date'       => 'ASC',
			),
		)
	);

	return $query->posts;
}

/**
 * Get feature data from admin content types with fallback.
 *
 * @return array<int,array<string,mixed>>
 */
function mantix_get_feature_items() {
	$posts = mantix_get_content_posts( 'mantix_feature' );

	if ( empty( $posts ) ) {
		return mantix_get_json_mod( 'mantix_features_json' );
	}

	$items = array();

	foreach ( $posts as $post ) {
		$description = has_excerpt( $post->ID ) ? get_the_excerpt( $post->ID ) : wp_strip_all_tags( (string) $post->post_content );
		$items[]     = array(
			'icon'        => (string) get_post_meta( $post->ID, '_mantix_feature_icon', true ),
			'title'       => get_the_title( $post->ID ),
			'description' => $description,
		);
	}

	return $items;
}

/**
 * Get showcase data from admin content types with fallback.
 *
 * @return array<int,array<string,mixed>>
 */
function mantix_get_showcase_items() {
	$posts = mantix_get_content_posts( 'mantix_showcase' );

	if ( empty( $posts ) ) {
		return mantix_get_json_mod( 'mantix_showcase_json' );
	}

	$items = array();

	foreach ( $posts as $post ) {
		$bullets_raw = (string) get_post_meta( $post->ID, '_mantix_showcase_bullets', true );
		$bullets     = preg_split( '/\r\n|\r|\n/', $bullets_raw );

		if ( ! is_array( $bullets ) ) {
			$bullets = array();
		}

		$bullets = array_values( array_filter( array_map( 'trim', $bullets ) ) );

		$items[] = array(
			'tag'         => (string) get_post_meta( $post->ID, '_mantix_showcase_tag', true ),
			'title'       => get_the_title( $post->ID ),
			'description' => wp_strip_all_tags( (string) $post->post_content ),
			'bullets'     => $bullets,
		);
	}

	return $items;
}

/**
 * Get benefit data from admin content types with fallback.
 *
 * @return array<int,array<string,mixed>>
 */
function mantix_get_benefit_items() {
	$posts = mantix_get_content_posts( 'mantix_benefit' );

	if ( empty( $posts ) ) {
		return mantix_get_json_mod( 'mantix_benefits_json' );
	}

	$items = array();

	foreach ( $posts as $post ) {
		$description = has_excerpt( $post->ID ) ? get_the_excerpt( $post->ID ) : wp_strip_all_tags( (string) $post->post_content );
		$items[]     = array(
			'title'       => get_the_title( $post->ID ),
			'description' => $description,
		);
	}

	return $items;
}

/**
 * Get use case data from admin content types with fallback.
 *
 * @return array<int,array<string,mixed>>
 */
function mantix_get_use_case_items() {
	$posts = mantix_get_content_posts( 'mantix_use_case' );

	if ( empty( $posts ) ) {
		return mantix_get_json_mod( 'mantix_use_cases_json' );
	}

	$items = array();

	foreach ( $posts as $post ) {
		$description = has_excerpt( $post->ID ) ? get_the_excerpt( $post->ID ) : wp_strip_all_tags( (string) $post->post_content );
		$items[]     = array(
			'title'       => get_the_title( $post->ID ),
			'description' => $description,
		);
	}

	return $items;
}

/**
 * Get stats data from admin content types with fallback.
 *
 * @return array<int,array<string,mixed>>
 */
function mantix_get_stat_items() {
	$posts = mantix_get_content_posts( 'mantix_stat' );

	if ( empty( $posts ) ) {
		return mantix_get_json_mod( 'mantix_stats_json' );
	}

	$items = array();

	foreach ( $posts as $post ) {
		$items[] = array(
			'label'  => get_the_title( $post->ID ),
			'value'  => (int) get_post_meta( $post->ID, '_mantix_stat_value', true ),
			'suffix' => (string) get_post_meta( $post->ID, '_mantix_stat_suffix', true ),
		);
	}

	return $items;
}

/**
 * Get testimonial data from admin content types with fallback.
 *
 * @return array<int,array<string,mixed>>
 */
function mantix_get_testimonial_items() {
	$posts = mantix_get_content_posts( 'mantix_testimonial' );

	if ( empty( $posts ) ) {
		return mantix_get_json_mod( 'mantix_testimonials_json' );
	}

	$items = array();

	foreach ( $posts as $post ) {
		$items[] = array(
			'quote'   => wp_strip_all_tags( (string) $post->post_content ),
			'name'    => get_the_title( $post->ID ),
			'role'    => (string) get_post_meta( $post->ID, '_mantix_testimonial_role', true ),
			'company' => (string) get_post_meta( $post->ID, '_mantix_testimonial_company', true ),
			'rating'  => (int) get_post_meta( $post->ID, '_mantix_testimonial_rating', true ),
		);
	}

	return $items;
}

/**
 * Get pricing data from admin content types with fallback.
 *
 * @return array<int,array<string,mixed>>
 */
function mantix_get_pricing_items() {
	$posts = mantix_get_content_posts( 'mantix_pricing' );

	if ( empty( $posts ) ) {
		return mantix_get_json_mod( 'mantix_pricing_json' );
	}

	$items = array();

	foreach ( $posts as $post ) {
		$features_raw = (string) get_post_meta( $post->ID, '_mantix_pricing_features', true );
		$features     = preg_split( '/\r\n|\r|\n/', $features_raw );

		if ( ! is_array( $features ) ) {
			$features = array();
		}

		$features = array_values( array_filter( array_map( 'trim', $features ) ) );

		$description = has_excerpt( $post->ID ) ? get_the_excerpt( $post->ID ) : wp_strip_all_tags( (string) $post->post_content );

		$items[] = array(
			'name'        => get_the_title( $post->ID ),
			'price'       => (string) get_post_meta( $post->ID, '_mantix_pricing_price', true ),
			'period'      => (string) get_post_meta( $post->ID, '_mantix_pricing_period', true ),
			'description' => $description,
			'features'    => $features,
			'button'      => (string) get_post_meta( $post->ID, '_mantix_pricing_button_label', true ),
			'url'         => (string) get_post_meta( $post->ID, '_mantix_pricing_button_url', true ),
			'popular'     => '1' === (string) get_post_meta( $post->ID, '_mantix_pricing_popular', true ),
		);
	}

	return $items;
}

/**
 * Get FAQ data from admin content types with fallback.
 *
 * @return array<int,array<string,mixed>>
 */
function mantix_get_faq_items() {
	$posts = mantix_get_content_posts( 'mantix_faq' );

	if ( empty( $posts ) ) {
		return mantix_get_json_mod( 'mantix_faq_json' );
	}

	$items = array();

	foreach ( $posts as $post ) {
		$items[] = array(
			'question' => get_the_title( $post->ID ),
			'answer'   => wp_strip_all_tags( (string) $post->post_content ),
		);
	}

	return $items;
}

/**
 * Get social links from admin content types with fallback.
 *
 * @return array<int,array<string,mixed>>
 */
function mantix_get_social_items() {
	$posts = mantix_get_content_posts( 'mantix_social_link' );

	if ( empty( $posts ) ) {
		return mantix_get_json_mod( 'mantix_social_json' );
	}

	$items = array();

	foreach ( $posts as $post ) {
		$items[] = array(
			'label' => get_the_title( $post->ID ),
			'url'   => (string) get_post_meta( $post->ID, '_mantix_social_url', true ),
		);
	}

	return $items;
}
