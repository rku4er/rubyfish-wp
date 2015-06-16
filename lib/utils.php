<?php

namespace Roots\Sage\Utils;

/**
 * Tell WordPress to use searchform.php from the templates/ directory
 */
function get_search_form() {
  $form = '';
  locate_template('/templates/searchform.php', true, false);
  return $form;
}
add_filter('get_search_form', __NAMESPACE__ . '\\get_search_form');

/**
 * Check if element is empty
 */
function is_element_empty($element) {
  $element = trim($element);
  return !empty($element);
}

/**
 * Make a URL relative
 */
function root_relative_url($input) {
  $url = parse_url($input);
  if (!isset($url['host']) || !isset($url['path'])) {
    return $input;
  }
  $site_url = parse_url(network_site_url());  // falls back to site_url

  if (!isset($url['scheme'])) {
    $url['scheme'] = $site_url['scheme'];
  }
  $hosts_match = $site_url['host'] === $url['host'];
  $schemes_match = $site_url['scheme'] === $url['scheme'];
  $ports_exist = isset($site_url['port']) && isset($url['port']);
  $ports_match = ($ports_exist) ? $site_url['port'] === $url['port'] : true;

  if ($hosts_match && $schemes_match && $ports_match) {
    return wp_make_link_relative($input);
  }
  return $input;
}

/**
 * Compare URL against relative URL
 */
function url_compare($url, $rel) {
  $url = trailingslashit($url);
  $rel = trailingslashit($rel);
  return ((strcasecmp($url, $rel) === 0) || root_relative_url($url) == $rel);
}

/**
 * Hooks a single callback to multiple tags
 */
function add_filters($tags, $function, $priority = 10, $accepted_args = 1) {
  foreach ((array) $tags as $tag) {
    add_filter($tag, $function, $priority, $accepted_args);
  }
}

/**
 * Display error alerts in admin panel
 */
function alerts($errors, $capability = 'activate_plugins') {
  if (!did_action('init')) {
    return add_action('init', function () use ($errors, $capability) {
      alerts($errors, $capability);
    });
  }
  $alert = function ($message) {
    echo '<div class="error"><p>' . $message . '</p></div>';
  };
  if (call_user_func_array('current_user_can', (array) $capability)) {
    add_action('admin_notices', function () use ($alert, $errors) {
      array_map($alert, (array) $errors);
    });
  }
}

/**
 * Replacement for get_adjacent_post()
 *
 * This supports only the custom post types you identify and does not
 * look at categories anymore. This allows you to go from one custom post type
 * to another which was not possible with the default get_adjacent_post().
 * Orig: wp-includes/link-template.php
 *
 * @param string $direction: Can be either 'prev' or 'next'
 * @param multi $post_types: Can be a string or an array of strings
 */
function mod_get_adjacent_post($direction = 'prev', $post_types = 'post') {
    global $post, $wpdb;

    if(empty($post)) return NULL;
    if(!$post_types) return NULL;

    if(is_array($post_types)){
        $txt = '';
        for($i = 0; $i <= count($post_types) - 1; $i++){
            $txt .= "'".$post_types[$i]."'";
            if($i != count($post_types) - 1) $txt .= ', ';
        }
        $post_types = $txt;
    }

    $current_post_date = $post->post_date;

    $join = '';
    $in_same_cat = FALSE;
    $excluded_categories = '';
    $adjacent = $direction == 'prev' ? 'previous' : 'next';
    $op = $direction == 'prev' ? '<' : '>';
    $order = $direction == 'prev' ? 'DESC' : 'ASC';

    $join  = apply_filters( "get_{$adjacent}_post_join", $join, $in_same_cat, $excluded_categories );
    $where = apply_filters( "get_{$adjacent}_post_where", $wpdb->prepare("WHERE p.post_date $op %s AND p.post_type IN({$post_types}) AND p.post_status = 'publish'", $current_post_date), $in_same_cat, $excluded_categories );
    $sort  = apply_filters( "get_{$adjacent}_post_sort", "ORDER BY p.post_date $order LIMIT 1" );

    $query = "SELECT p.* FROM $wpdb->posts AS p $join $where $sort";
    $query_key = 'adjacent_post_' . md5($query);
    $result = wp_cache_get($query_key, 'counts');
    if ( false !== $result )
        return $result;

    $result = $wpdb->get_row("SELECT p.* FROM $wpdb->posts AS p $join $where $sort");
    if ( null === $result )
        $result = '';

    wp_cache_set($query_key, $result, 'counts');
    return $result;
}

