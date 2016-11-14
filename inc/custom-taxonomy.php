<?php
/**
 * Custom taxonomies for this theme.
 *
 * Register e.g. 'Product Types'
 *
 * @package Mezzanine
 */
 
/**
 * Register Custom Taxonomy - Product Types
 */
function product_types() {

	$labels = array(
		'name'                       => _x( 'Types', 'Taxonomy General Name', 'mezzanine' ),
		'singular_name'              => _x( 'Type', 'Taxonomy Singular Name', 'mezzanine' ),
		'menu_name'                  => __( 'Product Types', 'mezzanine' ),
		'all_items'                  => __( 'All Types', 'mezzanine' ),
		'parent_item'                => __( 'Parent Type', 'mezzanine' ),
		'parent_item_colon'          => __( 'Parent Type:', 'mezzanine' ),
		'new_item_name'              => __( 'New Type Name', 'mezzanine' ),
		'add_new_item'               => __( 'Add New Type', 'mezzanine' ),
		'edit_item'                  => __( 'Edit Type', 'mezzanine' ),
		'update_item'                => __( 'Update Type', 'mezzanine' ),
		'view_item'                  => __( 'View Type', 'mezzanine' ),
		'separate_items_with_commas' => __( 'Separate types with commas', 'mezzanine' ),
		'add_or_remove_items'        => __( 'Add or remove types', 'mezzanine' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'mezzanine' ),
		'popular_items'              => __( 'Popular Types', 'mezzanine' ),
		'search_items'               => __( 'Search Types', 'mezzanine' ),
		'not_found'                  => __( 'Not Found', 'mezzanine' ),
		'items_list'                 => __( 'Types list', 'mezzanine' ),
		'items_list_navigation'      => __( 'Types list navigation', 'mezzanine' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'product-types', array( 'product' ), $args );

}
add_action( 'init', 'product_types', 0 );