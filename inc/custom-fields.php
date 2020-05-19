<?php
/*
* Metaboxes for Homepage
*/

add_action( 'cmb2_admin_init', 'ap_homepage_fields' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function ap_homepage_fields() {
	$prefix = 'ap_homepage_';
  $id_home = get_option('page_on_front');

	/**
	 * Metabox to be displayed on a single page ID
	 */
	$ap_homepage_fields = new_cmb2_box( array(
		'id'           => $prefix . 'homepage',
		'title'        => esc_html__( 'Home Page Fields', 'cmb2' ),
		'object_types' => array( 'page' ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		'show_on'      => array(
			'id' => array( $id_home ),
		), // Specific post IDs to display this metabox
	) );

  $ap_homepage_fields->add_field( array(
    'name'    => esc_html__( 'Hero Text', 'cmb2' ),
    'desc'    => esc_html__( 'write the text for hero (optional)', 'cmb2' ),
    'id'      => $prefix . 'hero_text',
    'type'    => 'wysiwyg',
    'options' => array(
      'textarea_rows' => 5,
    ),
  ) );

  $ap_homepage_fields->add_field( array(
		'name' => esc_html__( 'Hero Image', 'cmb2' ),
		'desc' => esc_html__( 'Upload an image or enter a URL.', 'cmb2' ),
		'id'   => $prefix . 'hero_image',
		'type' => 'file',
	) );

  

  // About info

  $ap_homepage_fields_about = new_cmb2_box( array(
		'id'           => $prefix . 'homepage_about',
		'title'        => esc_html__( 'About Fields', 'cmb2' ),
		'object_types' => array( 'page' ), // Post type
		'context'      => 'normal',
		'priority'     => 'default',
		'show_names'   => true, // Show field names on the left
		'show_on'      => array(
			'id' => array( $id_home ),
		), // Specific post IDs to display this metabox
	) );

  $ap_homepage_fields_about->add_field( array(
		'name' => esc_html__( 'About Image', 'cmb2' ),
		'desc' => esc_html__( 'Upload an image or enter a URL.', 'cmb2' ),
		'id'   => $prefix . 'about_image',
		'type' => 'file',
	) );

  $ap_homepage_fields_about->add_field( array(
    'name' => esc_html__( 'skills list', 'cmb2' ),
    'desc' => esc_html__( 'skills list (optional)', 'cmb2' ),
    'id'   => $prefix . 'skills',
    'type' => 'text',
    'repeatable' => true
  ) );

  $ap_homepage_fields_about->add_field( array(
    'name' => esc_html__( 'services list', 'cmb2' ),
    'desc' => esc_html__( 'services list (optional)', 'cmb2' ),
    'id'   => $prefix . 'services',
    'type' => 'text',
    'repeatable' => true
  ) );
}

/**
 * REPETABLE GROUP FOR ICONS PAGE
 */

add_action( 'cmb2_admin_init', 'ap_register_repeatable_group_field_metabox' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function ap_register_repeatable_group_field_metabox() {
	$prefix = 'ap_group_';

	/**
	 * Repeatable Field Groups
	 */
	$ap_icons = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => esc_html__( 'Icons with description', 'cmb2' ),
		'object_types' => array( 'page' ),
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => 'true',
    'show_on' => array(
      'key' => 'page-template',
      'value' => 'page-icons.php'
    )
	) );

	// SERVICE GROUP FIELD $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$group_field_id = $ap_icons->add_field( array(
		'id'          => $prefix . 'me_services',
		'type'        => 'group',
		'description' => esc_html__( 'add services icons and descriptions', 'cmb2' ),
		'options'     => array(
			'group_title'    => esc_html__( 'Service {#}', 'cmb2' ), // {#} gets replaced by row number
			'add_button'     => esc_html__( 'Add Another service', 'cmb2' ),
			'remove_button'  => esc_html__( 'Remove service', 'cmb2' ),
			'sortable'       => true,
			'closed'      => true, // true to have the groups closed by default
			'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
		),
	) );

	/**
	 * Group fields works the same, except ids only need
	 * to be unique to the group. Prefix is not needed.
	 *
	 * The parent field's id needs to be passed as the first argument.
	 */
	$ap_icons->add_group_field( $group_field_id, array(
		'name'       => esc_html__( 'Service Title', 'cmb2' ),
		'id'         => 'title_service',
		'type'       => 'text',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	$ap_icons->add_group_field( $group_field_id, array(
		'name'        => esc_html__( 'Description', 'cmb2' ),
		'description' => esc_html__( 'Write a short description for this service', 'cmb2' ),
		'id'          => 'description_service',
		'type'        => 'textarea_small',
	) );

	$ap_icons->add_group_field( $group_field_id, array(
		'name' => esc_html__( 'Service Icon', 'cmb2' ),
		'id'   => 'image_service',
		'type' => 'file',
	) );

  // SKILLS GROUP FIELD $group_field_id is the field id string, so in this case: $prefix . 'demo'
  $group_field_id = $ap_icons->add_field( array(
    'id'          => $prefix . 'me_skills',
    'type'        => 'group',
    'description' => esc_html__( 'add skills icons and descriptions', 'cmb2' ),
    'options'     => array(
      'group_title'    => esc_html__( 'Skill {#}', 'cmb2' ), // {#} gets replaced by row number
      'add_button'     => esc_html__( 'Add Another skill', 'cmb2' ),
      'remove_button'  => esc_html__( 'Remove skill', 'cmb2' ),
      'sortable'       => true,
      'closed'      => true, // true to have the groups closed by default
      'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
    ),
  ) );

  /**
   * Group fields works the same, except ids only need
   * to be unique to the group. Prefix is not needed.
   *
   * The parent field's id needs to be passed as the first argument.
   */
  $ap_icons->add_group_field( $group_field_id, array(
    'name'       => esc_html__( 'Skill Title', 'cmb2' ),
    'id'         => 'title_skill',
    'type'       => 'text',
    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
  ) );

  $ap_icons->add_group_field( $group_field_id, array(
    'name'        => esc_html__( 'Description', 'cmb2' ),
    'description' => esc_html__( 'Write a short description for this skill', 'cmb2' ),
    'id'          => 'description_skill',
    'type'        => 'textarea_small',
  ) );

  $ap_icons->add_group_field( $group_field_id, array(
    'name' => esc_html__( 'Skill Icon', 'cmb2' ),
    'id'   => 'image_skill',
    'type' => 'file',
  ) );


}

/**
 * FIELDS FOR PROJECTS
 */

 add_action( 'cmb2_admin_init', 'ap_projects_fields' );
 /**
  * Hook in and add a metabox that only appears on the 'About' page
  */
 function ap_projects_fields() {
 	$prefix = 'ap_project_';
   $id_home = get_option('page_on_front');

	 /**
		* Metabox to be displayed on a single page ID
		*/
	 $ap_projects_fields = new_cmb2_box( array(
		 'id'           => $prefix . 'project',
		 'title'        => esc_html__( 'Projects fields', 'cmb2' ),
		 'object_types' => array( 'featured_projects' ), // Post type
		 'context'      => 'normal',
		 'priority'     => 'high',
		 'show_names'   => true, // Show field names on the left
		 /*'show_on'      => array(
			 'id' => array( $id_home ),
		 ),*/ // Specific post IDs to display this metabox
	 ) );

		$ap_projects_fields->add_field( array(
			'name'    => esc_html__( 'Techonology', 'cmb2' ),
			'desc'    => esc_html__( 'input the technologies used on this project separated by a slash', 'cmb2' ),
			'id'      => $prefix . 'tech',
			'type'    => 'text',
			'column' => true,

		) );

		$ap_projects_fields->add_field( array(
			'name' => esc_html__('From'),
			'desc' => esc_html__('Input when the project starts'),
			'id'   => 'start_date',
			'type' => 'text_date',
			// 'timezone_meta_key' => 'wiki_test_timezone',
			// 'date_format' => 'l jS \of F Y',
		) );

		$ap_projects_fields->add_field( array(
			'name' => esc_html__('End'),
			'desc' => esc_html__('Input when the project ends'),
			'id'   => 'end_date',
			'type' => 'text_date',
			// 'timezone_meta_key' => 'wiki_test_timezone',
			// 'date_format' => 'l jS \of F Y',
		) );

		$ap_projects_fields->add_field( array(
			'name' => __( 'Respository URL', 'cmb2' ),
			'desc' => esc_html__('Input the Respository URL'),
			'id'   => 'url',
			'type' => 'text_url',
			// 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
		) );
}
 /**
  * FIELDS FOR EVENTS
  */

	add_action( 'cmb2_admin_init', 'ap_events_fields' );
	/**
	 * Hook in and add a metabox that only appears on the 'About' page
	 */
	function ap_events_fields() {
	 $prefix = 'ap_project_';
		$id_home = get_option('page_on_front');

		/**
		 * Metabox to be displayed on a single page ID
		 */
		$ap_events_fields = new_cmb2_box( array(
			'id'           => $prefix . 'event',
			'title'        => esc_html__( 'Events fields', 'cmb2' ),
			'object_types' => array( 'featured_events' ), // Post type
			'context'      => 'normal',
			'priority'     => 'high',
			'show_names'   => true, // Show field names on the left
			/*'show_on'      => array(
				'id' => array( $id_home ),
			),*/ // Specific post IDs to display this metabox
		) );

		$ap_events_fields->add_field( array(
			'name' => esc_html__('Date'),
			'desc' => esc_html__('Input date of event'),
			'id'   => 'event_date',
			'type' => 'text_date',
			'column' => true,
			// 'timezone_meta_key' => 'wiki_test_timezone',
			// 'date_format' => 'l jS \of F Y',
		) );

		$ap_events_fields->add_field( array(
			'name'    => esc_html__( 'place', 'cmb2' ),
			'desc'    => esc_html__( 'place', 'cmb2' ),
			'id'      => $prefix . 'place',
			'type'    => 'text',

		) );

		 $ap_events_fields->add_field( array(
			 'name'    => esc_html__( 'Resource URL', 'cmb2' ),
			 'desc'    => esc_html__( 'input the resource URL', 'cmb2' ),
			 'id'      => $prefix . 'url_resource',
			 'type'    => 'text',

		 ) );



	}
