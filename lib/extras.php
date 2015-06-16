<?php

namespace Roots\Sage\Extras;
use Roots\Sage\Config;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Config\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  //return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
    return '';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

/**
 * Filtering the Wrapper: Custom Post Types
 */
function sage_wrap_base_cpts($templates) {
    $cpt = get_post_type();
    if ($cpt) {
       array_unshift($templates, __NAMESPACE__ . 'base-' . $cpt . '.php');
    }
    return $templates;
}
add_filter('sage/wrap_base', __NAMESPACE__ . '\\sage_wrap_base_cpts');

/**
 * Search Filter
 */
function search_filter($query) {
  if ( !is_admin() && $query->is_main_query() ) {
    if ($query->is_search) {
      $query->set('post_type', array('post'));
    }
  }
}
add_action('pre_get_posts', __NAMESPACE__ . '\\search_filter');

/**
 * Login Screen
 */
function custom_login_css() {
  echo '<link rel="stylesheet" type="text/css" media="all" href="' . get_stylesheet_directory_uri() . '/login/css/login-styles.css" />';
}
add_action('login_head', __NAMESPACE__ . '\\custom_login_css');

/**
 * Custom post query
 */
function my_get_posts( $query ) {

    if ( $query->is_main_query() && (is_home() || is_category() || is_404() || is_tag()))
    {
        $query->set( 'post_type', array( 'post', 'work', ) );
    }

    if( $query->is_404())
    {
        $query->set( 'posts_per_page', 1 );
        $query->set('orderby','rand');
    }

    return $query;
}
add_filter( 'pre_get_posts', __NAMESPACE__ . '\\my_get_posts' );

