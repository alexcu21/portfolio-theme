<?php
add_action( 'cmb2_admin_init', 'ap_options_theme' );
/**
 * Hook in and register a metabox to handle a theme options page and adds a menu item.
 */
function ap_options_theme() {

	/**
	 * Registers options page menu item and form.
	 */
	$cmb_options = new_cmb2_box( array(
		'id'           => 'ap_options_theme',
		'title'        => esc_html__( 'Alex Theme Options', 'cmb2' ),
		'object_types' => array( 'options-page' ),

		/*
		 * The following parameters are specific to the options-page box
		 * Several of these parameters are passed along to add_menu_page()/add_submenu_page().
		 */

		'option_key'      => 'ap_theme_options', // The option key and admin menu page slug.
		'icon_url'        => 'dashicons-hammer', // Menu icon. Only applicable if 'parent_slug' is left empty.
		// 'menu_title'      => esc_html__( 'Options', 'cmb2' ), // Falls back to 'title' (above).
		// 'parent_slug'     => 'themes.php', // Make options page a submenu item of the themes menu.
		// 'capability'      => 'manage_options', // Cap required to view options-page.
		// 'position'        => 1, // Menu position. Only applicable if 'parent_slug' is left empty.
		// 'admin_menu_hook' => 'network_admin_menu', // 'network_admin_menu' to add network-level options page.
		// 'display_cb'      => false, // Override the options-page form output (CMB2_Hookup::options_page_output()).
		// 'save_button'     => esc_html__( 'Save Theme Options', 'cmb2' ), // The text for the options-page save button. Defaults to 'Save'.
		// 'disable_settings_errors' => true, // On settings pages (not options-general.php sub-pages), allows disabling.
		// 'message_cb'      => 'yourprefix_options_page_message_callback',
		// 'tab_group'       => '', // Tab-group identifier, enables options page tab navigation.
		// 'tab_title'       => null, // Falls back to 'title' (above).
		// 'autoload'        => false, // Defaults to true, the options-page option will be autloaded.
	) );

	/**
	 * Options fields ids only need
	 * to be unique within this box.
	 * Prefix is not needed.
	 */
	$cmb_options->add_field( array(
		'name'    => esc_html__( 'Site Primary Color', 'cmb2' ),
		'desc'    => esc_html__( 'set primary color (optional)', 'cmb2' ),
		'id'      => 'primary_color',
		'type'    => 'colorpicker',
		'default' => '#00BC62',
	) );

	$cmb_options->add_field( array(
		'name'    => esc_html__( 'Site secondary Color', 'cmb2' ),
		'desc'    => esc_html__( 'set secondary color (optional)', 'cmb2' ),
		'id'      => 'secondary_color',
		'type'    => 'colorpicker',
		'default' => '#6c757d',
	) );

	$cmb_options->add_field( array(
 		'name'    => esc_html__( 'Logo', 'cmb2' ),
 		'desc'    => esc_html__( 'load your logo', 'cmb2' ),
 		'id'      => 'logo',
 		'type'    => 'file',
      ) );

		$cmb_options->add_field( array(
						'name'    => esc_html__( 'latest posts in front page ', 'cmb2' ),
						'desc'    => esc_html__( 'add amount of latest posts in front page', 'cmb2' ),
						'id'      => 'number_post',
						'type'    => 'text',
					) );

	$cmb_options->add_field( array(
				'name'    => esc_html__( 'featured projects in front page ', 'cmb2' ),
				'desc'    => esc_html__( 'add amount of featured projects in front page', 'cmb2' ),
				'id'      => 'number_projects',
				'type'    => 'text',
			) );

	$cmb_options->add_field( array(
			'name'    => esc_html__( 'featured events in front page ', 'cmb2' ),
			'desc'    => esc_html__( 'add amount of featured events in front page', 'cmb2' ),
			'id'      => 'number_events',
			'type'    => 'text',
		) );

		// options for social networks

		$cmb_options->add_field( array(
				'name'    => esc_html__( 'Github profile', 'cmb2' ),
				'desc'    => esc_html__( 'add your github profile (full link)', 'cmb2' ),
				'id'      => 'link_github',
				'type'    => 'text',
			) );

			$cmb_options->add_field( array(
					'name'    => esc_html__( 'Gitlab profile', 'cmb2' ),
					'desc'    => esc_html__( 'add your gitlab profile (full link)', 'cmb2' ),
					'id'      => 'link_gitlab',
					'type'    => 'text',
				) );
		  $cmb_options->add_field( array(
						'name'    => esc_html__( 'codepen profile', 'cmb2' ),
						'desc'    => esc_html__( 'add your codepen profile (full link)', 'cmb2' ),
						'id'      => 'link_codepen',
						'type'    => 'text',
					) );
			$cmb_options->add_field( array(
					'name'    => esc_html__( 'WordPress profile', 'cmb2' ),
			 		'desc'    => esc_html__( 'add your WordPress profile (full link)', 'cmb2' ),
					'id'      => 'link_wordpress',
					'type'    => 'text',
					) );
			$cmb_options->add_field( array(
				'name'    => esc_html__( 'Linkedin profile', 'cmb2' ),
				'desc'    => esc_html__( 'add your Linkedin profile (full link)', 'cmb2' ),
				'id'      => 'link_linkedin',
				'type'    => 'text',
				) );
			$cmb_options->add_field( array(
				'name'    => esc_html__( 'Twitter profile', 'cmb2' ),
				'desc'    => esc_html__( 'add your twitter profile (full link)', 'cmb2' ),
				'id'      => 'link_twitter',
				'type'    => 'text',
				) );

//options for contact information
				$cmb_options->add_field( array(
					'name'    => esc_html__( 'Country and city', 'cmb2' ),
					'desc'    => esc_html__( 'add your country and city', 'cmb2' ),
					'id'      => 'country_city',
					'type'    => 'text',
					) );
				$cmb_options->add_field( array(
					'name'    => esc_html__( 'Phone number', 'cmb2' ),
					'desc'    => esc_html__( 'add your phone number', 'cmb2' ),
					'id'      => 'phone',
					'type'    => 'text',
					) );
				$cmb_options->add_field( array(
					'name'    => esc_html__( 'email address', 'cmb2' ),
					'desc'    => esc_html__( 'add your email address', 'cmb2' ),
					'id'      => 'email',
					'type'    => 'text',
					) );
}

/**
 * Callback to define the optionss-saved message.
 *
 * @param CMB2  $cmb The CMB2 object.
 * @param array $args {
 *     An array of message arguments
 *
 *     @type bool   $is_options_page Whether current page is this options page.
 *     @type bool   $should_notify   Whether options were saved and we should be notified.
 *     @type bool   $is_updated      Whether options were updated with save (or stayed the same).
 *     @type string $setting         For add_settings_error(), Slug title of the setting to which
 *                                   this error applies.
 *     @type string $code            For add_settings_error(), Slug-name to identify the error.
 *                                   Used as part of 'id' attribute in HTML output.
 *     @type string $message         For add_settings_error(), The formatted message text to display
 *                                   to the user (will be shown inside styled `<div>` and `<p>` tags).
 *                                   Will be 'Settings updated.' if $is_updated is true, else 'Nothing to update.'
 *     @type string $type            For add_settings_error(), Message type, controls HTML class.
 *                                   Accepts 'error', 'updated', '', 'notice-warning', etc.
 *                                   Will be 'updated' if $is_updated is true, else 'notice-warning'.
 * }
 */
function ap_options_theme_msg( $cmb, $args ) {
	if ( ! empty( $args['should_notify'] ) ) {

		if ( $args['is_updated'] ) {

			// Modify the updated message.
			$args['message'] = sprintf( esc_html__( '%s &mdash; Updated!', 'cmb2' ), $cmb->prop( 'title' ) );
		}

		add_settings_error( $args['setting'], $args['code'], $args['message'], $args['type'] );
	}
}

add_action( 'wp_footer', 'ap_options_styles' );
function ap_options_styles(){
	$options = get_option( 'ap_theme_options' );
	$primary_color = $options['primary_color'];
	$secondary_color = $options['secondary_color'];

	wp_register_style('custom-options', false);
	wp_enqueue_style( 'custom-options' );

	$custom_css= "

	/** Bg color primario **/
			 .btn-primary,
			 .bg-primary,
			 .alert-primary,
			 .list-group-item-primary,
			 .comment-respond .submit {
						background-color: {$primary_color}!important;
			 }
			 /** Color primario **/
			 .card-subtitle,
			 .nav-link:hover,
			 .current_page_item .nav-link ,
			 .contenido-entrada .meta span,
			 .entrada a ,
			 .instructor,
			 .comment-respond a,
			 .comentarios-cerrados {
						color:  {$primary_color}!important;
			 }
			 /** border   primario **/
			 .current_page_item .nav-link,
			 blockquote.subtitulo,
			 .btn-primary,
			 .footer  {
						border-color:  {$primary_color}!important;
			 }
			 aside .card-meta,
			 .badge-secondary,
			 .bg-secondary,
			 .alert-secondary,
			 .list-group-item-secondary,
			 aside .card-footer,
			 .comment-body,
			 .page-link:hover   {
						background-color: {$secondary_color} !important;
			 }
			 .page-link {
						color: {$secondary_color} !important;
			 }
	";

	wp_add_inline_style('custom-options', $custom_css);
}
