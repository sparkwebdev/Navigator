<?php
/**
 * Custom post types for this theme.
 *
 * Register e.g. 'Product'
 *
 * @package Mezzanine
 */

/**
 * Register Custom Post Type - Product
 */
function product_post_type() {

	$labels = array(
		'name'                => _x( 'Products', 'Post Type General Name', 'mezzanine' ),
		'singular_name'       => _x( 'Product', 'Post Type Singular Name', 'mezzanine' ),
		'menu_name'           => __( 'Products', 'mezzanine' ),
		'parent_item_colon'   => __( 'Parent Product:', 'mezzanine' ),
		'all_items'           => __( 'All Products', 'mezzanine' ),
		'view_item'           => __( 'View Product', 'mezzanine' ),
		'add_new_item'        => __( 'Add New Product', 'mezzanine' ),
		'add_new'             => __( 'New Product', 'mezzanine' ),
		'edit_item'           => __( 'Edit Product', 'mezzanine' ),
		'update_item'         => __( 'Update Product', 'mezzanine' ),
		'search_items'        => __( 'Search products', 'mezzanine' ),
		'not_found'           => __( 'No products found', 'mezzanine' ),
		'not_found_in_trash'  => __( 'No products found in Trash', 'mezzanine' ),
	);
	$args = array(
		'label'               => __( 'product', 'mezzanine' ),
		'description'         => __( 'New Products', 'mezzanine' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_product'       => 2,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-grid-view',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'product', $args );
}
// Hook into the 'init' action
add_action( 'init', 'product_post_type', 0 );