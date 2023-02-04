<?php

function geopoint_map_render(){
  ob_start();?>

  <div id="map"></div>

  <?php return ob_get_clean();
}