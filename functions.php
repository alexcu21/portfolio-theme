<?php

/**
 * plugin update checker
 * 
 */

require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/alexcu21/portfolio-theme/',
	__FILE__,
	'portfolio-theme'
);

//Optional: Set the branch that contains the stable release.
// $myUpdateChecker->setBranch('master');
// $myUpdateChecker->getVcsApi()->enableReleaseAssets();
/*
* Post Types for projects and events
*/
require_once dirname(__FILE__) . '/inc/posttypes.php';

/*
* custom widgets
*/
require_once dirname(__FILE__) . '/inc/widgets.php';

/*
* CMB2
*/
require_once dirname(__FILE__) . '/cmb2/init.php';

/*
* Load custom fields
*/
require_once dirname(__FILE__) . '/inc/custom-fields.php';

/*
* Load queries
*/
require_once dirname(__FILE__) . '/inc/queries.php';

/*
* Opciones del Theme
*/
require_once dirname(__FILE__) . '/inc/options.php';

/*
*
* featured images for pages
*
 */
add_action('init', 'ap_featured_image');
function ap_featured_image($id){
  $image = get_the_post_thumbnail_url($id, 'full');

  $html = '';
  $class = false;
  if($image){
    $class = true;
    $html .= '<div class="container">';
    $html .= '<div class="row featured-image"></div>';
    $html .= '</div>';

    // add inline Styles
    wp_register_style('custom', false);
    wp_enqueue_style('custom');
    //css for custom
    $featured_image_css = "
      .featured-image{
        background-image: url({$image});
      }
     ";
     wp_add_inline_style('custom', $featured_image_css);
  }
  return array($html, $class);
}

/*
* After setup theme
*/

function ap_setup(){
  //size of thumbnails
  add_image_size('medium', 510, 340, true);
  add_image_size('square_medium', 350, 350, true);
  //featured image
  add_theme_support('post-thumbnails');
  add_theme_support('custom-logo');
  add_theme_support('title-tag');
  //nav menu
  register_nav_menus(
    array(
      'main_menu' => esc_html__('Main Menu', 'alexportfolio')

    ));
}

add_action('after_setup_theme','ap_setup');

/*
* adding bootstrap class link
*/

function ap_link_class($atts, $item, $args){
     if($args->theme_location == 'main_menu') {
          $atts['class'] = 'nav-link';

     }
     return $atts;
}
add_filter('nav_menu_link_attributes', 'ap_link_class', 10, 3 );

/*
* adding bootstrap class ul > li
*/

function ap_li_class($classes, $item, $args){
     if($args->add_li_class) {
          $classes[] = $args->add_li_class;

     }
     return $classes;
}
add_filter('nav_menu_css_class', 'ap_li_class', 10, 3 );


/*
* styles and script functions
*/
function ap_scripts() {
     /** Styles */
     wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css' , false, '4.2.1');
     wp_enqueue_style('fontawesome-css', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css' , false, '4.1.3');
     wp_enqueue_style('style', get_stylesheet_uri(), array('bootstrap-css') );
     /** Scripts */
     wp_enqueue_script('jquery');
     wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array('jquery'), '1.0', true );
     wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array('popper'), '1.0', true );
}
add_action('wp_enqueue_scripts', 'ap_scripts' );

// add custom page state
 add_filter('display_post_states', 'ap_change_state', 10, 2);
function ap_change_state($states, $post){

  if ( ('page' === get_post_type($post->ID) ) && ('page-projects.php' === get_page_template_slug($post->ID) ) ){
      $states[] = __('Projects page');

  }

  if ( ('page' === get_post_type($post->ID) ) && ('page-events.php' === get_page_template_slug($post->ID) ) ){
      $states[] = __('Events page');

  }
    return $states;
}

/** support for widgets **/

add_action( 'widgets_init', 'ap_widgets_sidebar' );
function ap_widgets_sidebar(){
  register_sidebar(array(
    'name' => 'Widget Sidebar',
    'id' => 'sidebar_widget',
    'before_widget' => '<div class="widget">',
    'after_widget' =>'</div>',
    'before_title' => '<h2 class="text-center">',
    'after_title' => '</h2>'
  ));
}
