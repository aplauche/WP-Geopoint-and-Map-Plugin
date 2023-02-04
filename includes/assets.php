<?php

function fsd_register_assets(){

  $editorAssets = include(FSDGP_DIR . 'build/editor/index.asset.php');

  wp_register_script(
    'fsd_editor',
    plugins_url( '/build/editor/index.js', FSDGP_FILE ),
    $editorAssets['dependencies'],
    $editorAssets['version'],
    true
  );

  wp_register_style( 'fsd_leaflet_css', 'https://unpkg.com/leaflet@1.9.3/dist/leaflet.css', null, '1.9.3' );
  wp_register_script( 'fsd_leaflet', 'https://unpkg.com/leaflet@1.9.3/dist/leaflet.js', [], '1.9.3', true );
}