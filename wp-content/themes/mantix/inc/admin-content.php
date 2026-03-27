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
}
add_action( 'init', 'mantix_register_content_meta' );

/**
 * Add meta boxes for structured section fields.
 */
function mantix_add_content_meta_boxes() {
	add_meta_box( 'mantix_feature_fields', __( 'Feature Settings', 'mantix' ), 'mantix_render_feature_meta_box', 'mantix_feature', 'normal', 'default' );
	add_meta_box( 'mantix_testimonial_fields', __( 'Testimonial Settings', 'mantix' ), 'mantix_render_testimonial_meta_box', 'mantix_testimonial', 'normal', 'default' );
	add_meta_box( 'mantix_pricing_fields', __( 'Pricing Plan Settings', 'mantix' ), 'mantix_render_pricing_meta_box', 'mantix_pricing', 'normal', 'default' );
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
			<li><strong><?php esc_html_e( 'Hero, Header CTAs, Final CTA, Contact copy:', 'mantix' ); ?></strong> <a href="<?php echo esc_url( $customizer_url ); ?>"><?php esc_html_e( 'Open Mantix Customizer Settings', 'mantix' ); ?></a></li>
			<li><strong><?php esc_html_e( 'Features:', 'mantix' ); ?></strong> <a href="<?php echo esc_url( admin_url( 'edit.php?post_type=mantix_feature' ) ); ?>"><?php esc_html_e( 'Manage Features', 'mantix' ); ?></a></li>
			<li><strong><?php esc_html_e( 'Testimonials:', 'mantix' ); ?></strong> <a href="<?php echo esc_url( admin_url( 'edit.php?post_type=mantix_testimonial' ) ); ?>"><?php esc_html_e( 'Manage Testimonials', 'mantix' ); ?></a></li>
			<li><strong><?php esc_html_e( 'Pricing:', 'mantix' ); ?></strong> <a href="<?php echo esc_url( admin_url( 'edit.php?post_type=mantix_pricing' ) ); ?>"><?php esc_html_e( 'Manage Pricing Plans', 'mantix' ); ?></a></li>
			<li><strong><?php esc_html_e( 'FAQ:', 'mantix' ); ?></strong> <a href="<?php echo esc_url( admin_url( 'edit.php?post_type=mantix_faq' ) ); ?>"><?php esc_html_e( 'Manage FAQs', 'mantix' ); ?></a></li>
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
		$description = has_excerpt( $post->ID ) ? get_the_excerpt( $post->ID ) : wp_trim_words( wp_strip_all_tags( (string) $post->post_content ), 24 );
		$items[]     = array(
			'icon'        => (string) get_post_meta( $post->ID, '_mantix_feature_icon', true ),
			'title'       => get_the_title( $post->ID ),
			'description' => $description,
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
			'quote'   => wp_trim_words( wp_strip_all_tags( (string) $post->post_content ), 42 ),
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

		$description = has_excerpt( $post->ID ) ? get_the_excerpt( $post->ID ) : wp_trim_words( wp_strip_all_tags( (string) $post->post_content ), 22 );

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
			'answer'   => wp_trim_words( wp_strip_all_tags( (string) $post->post_content ), 45 ),
		);
	}

	return $items;
}
