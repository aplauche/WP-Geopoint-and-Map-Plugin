<?php
/**
 * Plugin Name:       FSD Geopoints
 * Plugin URI:        https://fullstackdigital.io
 * Description:       A plugin for a custom geopoint post type.
 * Version:           1.0.0
 * Requires at least: 5.9
 * Requires PHP:      7.2
 * Author:            Full Stack Digital
 * Author URI:        https://fullstackdigital.io
 * Text Domain:       fsd-gp
 */

if(!function_exists('add_action')) {
  echo 'Seems like you stumbled here by accident. 😛';
  exit;
}

// Setup
define('FSDGP_DIR', plugin_dir_path(__FILE__));
define('FSDGP_FILE', __FILE__);

// Includes
$rootFiles = glob(FSDGP_DIR . 'includes/*.php');
$subdirectoryFiles = glob(FSDGP_DIR . 'includes/**/*.php');
$allFiles = array_merge($rootFiles, $subdirectoryFiles);

foreach($allFiles as $filename) {
  include_once($filename);
}

// Hooks
add_action('init', 'fsd_geopoint_post_type');
add_action('init', 'fsd_register_assets');
add_action('init', 'fsd_register_blocks');
add_action( 'enqueue_block_editor_assets', 'fsd_enqueue_block_editor_assets');
add_action( 'wp_enqueue_scripts', 'fsd_enqueue_scripts' );


// Register Blocks
function fsd_register_blocks(){
  register_block_type( FSDGP_DIR . 'build/blocks/geopoint-map', [
    "render_callback" => 'geopoint_map_render'
  ] );
}


// Enqueues
function fsd_enqueue_block_editor_assets() {
  $current_screen = get_current_screen(  );

  // var_dump($current_screen);
  // die();

  if($current_screen->post_type == "geopoint"){
    wp_enqueue_script( 'fsd_editor' );
  }

}

function fsd_enqueue_scripts(){
  wp_enqueue_style('fsd_leaflet_css');
  wp_enqueue_script('fsd_leaflet');
}