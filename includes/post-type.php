<?php

function fsd_geopoint_post_type(){

  $labels = array(
		'name'                  => _x( 'Geopoints', 'Post type general name', 'fsd-gp' ),
		'singular_name'         => _x( 'Geopoint', 'Post type singular name', 'fsd-gp' ),
		'menu_name'             => _x( 'Geopoints', 'Admin Menu text', 'fsd-gp' ),
		'name_admin_bar'        => _x( 'Geopoint', 'Add New on Toolbar', 'fsd-gp' ),
		'add_new'               => __( 'Add New', 'fsd-gp' ),
		'add_new_item'          => __( 'Add New Geopoint', 'fsd-gp' ),
		'new_item'              => __( 'New Geopoint', 'fsd-gp' ),
		'edit_item'             => __( 'Edit Geopoint', 'fsd-gp' ),
		'view_item'             => __( 'View Geopoint', 'fsd-gp' ),
		'all_items'             => __( 'All Geopoints', 'fsd-gp' ),
		'search_items'          => __( 'Search Geopoints', 'fsd-gp' ),
		'parent_item_colon'     => __( 'Parent Geopoints:', 'fsd-gp' ),
		'not_found'             => __( 'No geopoints found.', 'fsd-gp' ),
		'not_found_in_trash'    => __( 'No geopoints found in Trash.', 'fsd-gp' ),
		'featured_image'        => _x( 'Geopoint Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'fsd-gp' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'fsd-gp' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'fsd-gp' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'fsd-gp' ),
		'archives'              => _x( 'Geopoint archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'fsd-gp' ),
		'insert_into_item'      => _x( 'Insert into geopoint', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'fsd-gp' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this geopoint', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'fsd-gp' ),
		'filter_items_list'     => _x( 'Filter geopoints list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'fsd-gp' ),
		'items_list_navigation' => _x( 'Geopoints list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'fsd-gp' ),
		'items_list'            => _x( 'Geopoints list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'fsd-gp' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest'       => true,
		'query_var'          => true, 
		'rewrite'            => array( 'slug' => 'geopoint', 'with_front' => false ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields'),
    'description'        => __('A custom geopoint post type', 'fsd-gp'),
	);

	register_post_type( 'geopoint', $args );




  register_post_meta( 'geopoint', 'fsd_lat', [
		'single' => true,
		'type' => 'string',
		'show_in_rest' => true,
		'sanitize_callback' => 'sanitize_text_field', // we can define a custom endpoint to validate
		'auth_callback' => function(){
			return current_user_can( 'edit_posts' );
		}
	] );
  register_post_meta( 'geopoint', 'fsd_lng', [
		'single' => true,
		'type' => 'string',
		'show_in_rest' => true,
		'sanitize_callback' => 'sanitize_text_field', // we can define a custom endpoint to validate
		'auth_callback' => function(){
			return current_user_can( 'edit_posts' );
		}
	] );
}