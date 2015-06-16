<?php

namespace Roots\Sage\Init;

use Roots\Sage\Assets;

/**
 * Theme setup
 */
function setup() {
  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/sage-translations
  load_theme_textdomain('sage', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus([
    'primary_navigation' => __('Primary Navigation', 'sage')
  ]);

  // Add post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');
  add_image_size( 'blog-circle-thumb', 400, 400, true ); // blog-circle thumbnail
  add_image_size( 'homepage-thumb', 600, 476, true ); // post thumbnail
  add_image_size( 'next-post-thumb', 290, 250, true ); // next post thumbnail

  // Add post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

  // Add HTML5 markup for captions
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list']);

  // Tell the TinyMCE editor to use a custom stylesheet
  add_editor_style(Assets\asset_path('styles/editor-style.css'));

  // Allow shortcode execution in widgets
  add_filter('widget_text', 'do_shortcode');

}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');

/**
 * Register sidebars
 */
function widgets_init() {
  register_sidebar([
    'name'          => __('Primary', 'sage'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);

  register_sidebar([
    'name'          => __('Footer', 'sage'),
    'id'            => 'sidebar-footer',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);
}
add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');

/**
 * Work Post Type
 */
function roots_post_type_works() {
  $labels = array(
    'name' => __( 'Works'),
    'singular_name' => __( 'Work' ),
    'add_new' => _x('Add New', 'rubyfish'),
    'add_new_item' => __('Add New Work'),
    'edit_item' => __('Edit Work'),
    'new_item' => __('New Work'),
    'view_item' => __('View Work'),
    'search_items' => __('Search Work'),
    'not_found' =>  __('No works found'),
    'not_found_in_trash' => __('No works found in Trash'),
    'parent_item_colon' => ''
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'exclude_from_search' => true,
    'publicly_queryable' => true,
    'rewrite' => array('slug' => __( 'work' )),
    'show_ui' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', 'excerpt', 'comments'),
    'taxonomies' => array('category', 'post_tag')
  );

  register_post_type(__( 'work' ), $args);
}

add_action( 'init', __NAMESPACE__ . '\\roots_post_type_works' );

function roots_work_context_fixr() {
  global $wp_query;

  if ( get_query_var( 'post_type' ) == 'work' || $wp_query->get('post_type') == 'work' ) {
    $wp_query->is_home = false;
    $wp_query->is_404 = false;
  }
  if ( get_query_var( 'taxonomy' ) == 'work_category' ) {
    $wp_query->is_404 = true;
    $wp_query->is_tax = false;
    $wp_query->is_archive = false;
  }
}
add_action( 'template_redirect', __NAMESPACE__ . '\\roots_work_context_fixr' );
