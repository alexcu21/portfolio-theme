<?php

function ap_posttype_projects() {
     $labels = array(
         'name'                  => _x( 'Featured Projects', 'ap' ),
         'singular_name'         => _x( 'Project',  'ap' ),
         'menu_name'             => _x( 'Featured Projects', 'Admin Menu text', 'ap' ),
         'name_admin_bar'        => _x( 'Project', 'Add New on Toolbar', 'ap' ),
         'add_new'               => __( 'Add New', 'ap' ),
         'add_new_item'          => __( 'Add New Project', 'ap' ),
         'new_item'              => __( 'New Project', 'ap' ),
         'edit_item'             => __( 'Edit Project', 'ap' ),
         'view_item'             => __( 'View Project', 'ap' ),
         'all_items'             => __( 'All Projects', 'ap' ),
         'search_items'          => __( 'Search Projects', 'ap' ),
         'parent_item_colon'     => __( 'Parent Project:', 'ap' ),
         'not_found'             => __( 'Projects not found.', 'ap' ),
         'not_found_in_trash'    => __( 'Projects not found in trash', 'ap' ),
         'featured_image'        => _x( 'Featured Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'ap' ),
         'set_featured_image'    => _x( 'add featured image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'ap' ),
         'remove_featured_image' => _x( 'remove featured image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'ap' ),
         'use_featured_image'    => _x( 'Use featured image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'ap' ),
         'archives'              => _x( 'Projects Archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'ap' ),
         'insert_into_item'      => _x( 'Insert into project', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'ap' ),
         'uploaded_to_this_item' => _x( 'Uploaded to this project', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'ap' ),
         'filter_items_list'     => _x( 'Filter Projects list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'ap' ),
         'items_list_navigation' => _x( 'Projects navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'ap' ),
         'items_list'            => _x( 'Projects list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'ap' ),
     );

     $args = array(
         'labels'             => $labels,
         'public'             => true,
         'publicly_queryable' => true,
         'show_ui'            => true,
         'show_in_menu'       => true,
         'query_var'          => true,
         'rewrite'            => array( 'slug' => 'projects' ),
         'capability_type'    => 'post',
         'has_archive'        => true,
         'menu_icon'          => 'dashicons-portfolio',
         // true como paginas (pueden tener hijos), false como posts (no tienen hijos)
         'hierarchical'       => false,
         'menu_position'      => 6,
         'supports'           => array( 'title', 'editor',  'thumbnail' ),
         'show_in_rest'       => true,
         'rest_base'          => 'projects',
         'taxonomies'         => array('projetc_type', 'category')
     );

     register_post_type( 'featured_projects', $args );
 }

 add_action( 'init', 'ap_posttype_projects' );

/*
* post types for events
 */

 function ap_posttype_events() {
      $labels = array(
          'name'                  => _x( 'Featured events', 'ap' ),
          'singular_name'         => _x( 'event',  'ap' ),
          'menu_name'             => _x( 'Featured events', 'Admin Menu text', 'ap' ),
          'name_admin_bar'        => _x( 'event', 'Add New on Toolbar', 'ap' ),
          'add_new'               => __( 'Add New', 'ap' ),
          'add_new_item'          => __( 'Add New event', 'ap' ),
          'new_item'              => __( 'New event', 'ap' ),
          'edit_item'             => __( 'Edit event', 'ap' ),
          'view_item'             => __( 'View event', 'ap' ),
          'all_items'             => __( 'All events', 'ap' ),
          'search_items'          => __( 'Search events', 'ap' ),
          'parent_item_colon'     => __( 'Parent event:', 'ap' ),
          'not_found'             => __( 'events not found.', 'ap' ),
          'not_found_in_trash'    => __( 'events not found in trash', 'ap' ),
          'featured_image'        => _x( 'Featured Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'ap' ),
          'set_featured_image'    => _x( 'add featured image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'ap' ),
          'remove_featured_image' => _x( 'remove featured image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'ap' ),
          'use_featured_image'    => _x( 'Use featured image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'ap' ),
          'archives'              => _x( 'events Archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'ap' ),
          'insert_into_item'      => _x( 'Insert into event', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'ap' ),
          'uploaded_to_this_item' => _x( 'Uploaded to this event', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'ap' ),
          'filter_items_list'     => _x( 'Filter events list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'ap' ),
          'items_list_navigation' => _x( 'events navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'ap' ),
          'items_list'            => _x( 'events list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'ap' ),
      );

      $args = array(
          'labels'             => $labels,
          'public'             => true,
          'publicly_queryable' => true,
          'show_ui'            => true,
          'show_in_menu'       => true,
          'query_var'          => true,
          'rewrite'            => array( 'slug' => 'events' ),
          'capability_type'    => 'post',
          'has_archive'        => true,
          'menu_icon'          => 'dashicons-calendar-alt',
          // true como paginas (pueden tener hijos), false como posts (no tienen hijos)
          'hierarchical'       => false,
          'menu_position'      => 6,
          'supports'           => array( 'title', 'editor',  'thumbnail' ),
          'show_in_rest'       => true,
          'rest_base'          => 'events',
          'taxonomies'         => array('projetc_type', 'category')
      );

      register_post_type( 'featured_events', $args );
  }

  add_action( 'init', 'ap_posttype_events' );

  /*
  * CUSTOM TAXONOMIES
   */

  // Lo enganchamos en la acción init y llamamos a la función create_book_taxonomies() cuando arranque
  add_action( 'init', 'ap_create_projects_taxonomies', 0 );

  // Creamos dos taxonomías, género y autor para el custom post type "libro"
  function ap_create_projects_taxonomies() {
  	// Añadimos nueva taxonomía y la hacemos jerárquica (como las categorías por defecto)
  	$labels = array(
  	'name' => _x( 'Project Types', 'taxonomy general name' ),
  	'singular_name' => _x( 'Type', 'taxonomy singular name' ),
  	'search_items' =>  __( 'Search by types ' ),
  	'all_items' => __( 'All types' ),
  	'parent_item' => __( 'Parent type' ),
  	'parent_item_colon' => __( 'Parent type:' ),
  	'edit_item' => __( 'Edit type' ),
  	'update_item' => __( 'Update type' ),
  	'add_new_item' => __( 'Add new type`' ),
  	'new_item_name' => __( 'new type name' ),
  );
  register_taxonomy( 'project_type', array('featured_projects'), array(
  	'hierarchical' => true,
    'query_var' => 'project_type_name',
    'rewrite' => array( 'slug' => 'project_type' ),
    'public' => true,
    'show_ui' => true,
    'show_admin_column'     => true,
  	'labels' => $labels, /* ADVERTENCIA: Aquí es donde se utiliza la variable $labels */
    'show_in_rest' => true,
		'rest_base' => 'project_types',
		'rest_controller_class' => 'WP_REST_Terms_Controller',

  ));
}

// taxonomies for events
add_action( 'init', 'ap_create_events_taxonomies', 0 );

// Creamos dos taxonomías, género y autor para el custom post type "libro"
function ap_create_events_taxonomies() {
  // Añadimos nueva taxonomía y la hacemos jerárquica (como las categorías por defecto)
  $labels = array(
  'name' => _x( 'Event Types', 'taxonomy general name' ),
  'singular_name' => _x( 'Event Type', 'taxonomy singular name' ),
  'search_items' =>  __( 'Search by event types ' ),
  'all_items' => __( 'All event types' ),
  'parent_item' => __( 'Parent event type' ),
  'parent_item_colon' => __( 'Parent event type:' ),
  'edit_item' => __( 'Edit event type' ),
  'update_item' => __( 'Update event type' ),
  'add_new_item' => __( 'Add new event type`' ),
  'new_item_name' => __( 'new event type name' ),
);
register_taxonomy( 'event_type', array('featured_events'), array(
  'hierarchical' => true,
  'query_var' => 'event_type_name',
  'rewrite' => array( 'slug' => 'event_type' ),
  'public' => true,
  'show_ui' => true,
  'show_admin_column'     => true,
  'labels' => $labels, /* ADVERTENCIA: Aquí es donde se utiliza la variable $labels */
  'show_in_rest' => true,
  'rest_base' => 'event_types',
  'rest_controller_class' => 'WP_REST_Terms_Controller',

));
}
