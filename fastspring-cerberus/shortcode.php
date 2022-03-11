<?php
// Register our CSS & JS, but do not enqueue them (yet)
function fs_cerberus_register_assets() {
  global $fs_version;
  $css_url = plugin_dir_url(__FILE__) . "css/fastspring-cerberus.css";
  $js_url  = plugin_dir_url(__FILE__) . "scripts/fastspring-cerberus-bundle.js";
  wp_register_style(  'fs-cerberus-styles', $css_url, array(), $fs_version, 'all' );
  wp_register_script( 'fs-cerberus-js',     $js_url,  array(), $fs_version ); 
}
add_action( 'wp_enqueue_scripts', 'fs_cerberus_register_assets' );

add_shortcode( 'fscerberusassets', 'fs_cerberus_enqueue_assets' );

function fs_cerberus_enqueue_assets( $attributes ) {
  wp_enqueue_style(  'fs-cerberus-styles' );
  wp_enqueue_script( 'fs-cerberus-js' );
}
