<?php 
/**
 * Plugin Name: Ionicons Official
 * Plugin URI: https://github.com/driftyco/ionicons-wp
 * Description: Official Ionicons plugin - Add over 900 open source icons to your wordpress site with a simple shortcode
 * Version: 1.0.0
 * Author: Ionic
 * Author URI: http://ionic.io/
 * License: MIT
 */

/*
add_filter('plugin_action_links', 'wp_ionicons_cheatsheet_action_link', 10, 2);
function wp_ionicons_cheatsheet_action_link($links, $file) {
  $settings_link = '<a href="http://ionicons.com/cheatsheet.html" target="_blank">Cheat Sheet</a>';
  array_unshift($links, $settings_link);
  return $links;
}
 */

function wp_ionicons_css() {
  wp_register_style('ionicons_css', 'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css', array(), '1.0');
  wp_enqueue_style('ionicons_css');
}
add_action('wp_enqueue_scripts', 'wp_ionicons_css');

function wp_ionicons_shortcode( $atts ) {
  extract( shortcode_atts( array( 'icon' => 'home', ), $atts ) );
  return '<i class="icon ion-'.str_replace('ion-', '', $icon).'"></i>';
}

add_shortcode('icon', 'wp_ionicons_shortcode');
add_filter('wp_nav_menu_items', 'do_shortcode');
add_filter('widget_text', 'do_shortcode');
add_filter('widget_title', 'do_shortcode');

?>
