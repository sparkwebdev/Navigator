<?php
/**
 * Custom taxonomies for this theme.
 *
 * Register e.g. 'Product Types'
 *
 * @package Navigator
 */
 
/**
 * Register Custom Taxonomy - Product Types
 */
function product_types() {

	$labels = array(
		'name'                       => _x( 'Types', 'Taxonomy General Name', 'navigator' ),
		'singular_name'              => _x( 'Type', 'Taxonomy Singular Name', 'navigator' ),
		'menu_name'                  => __( 'Product Types', 'navigator' ),
		'all_items'                  => __( 'All Types', 'navigator' ),
		'parent_item'                => __( 'Parent Type', 'navigator' ),
		'parent_item_colon'          => __( 'Parent Type:', 'navigator' ),
		'new_item_name'              => __( 'New Type Name', 'navigator' ),
		'add_new_item'               => __( 'Add New Type', 'navigator' ),
		'edit_item'                  => __( 'Edit Type', 'navigator' ),
		'update_item'                => __( 'Update Type', 'navigator' ),
		'view_item'                  => __( 'View Type', 'navigator' ),
		'separate_items_with_commas' => __( 'Separate types with commas', 'navigator' ),
		'add_or_remove_items'        => __( 'Add or remove types', 'navigator' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'navigator' ),
		'popular_items'              => __( 'Popular Types', 'navigator' ),
		'search_items'               => __( 'Search Types', 'navigator' ),
		'not_found'                  => __( 'Not Found', 'navigator' ),
		'items_list'                 => __( 'Types list', 'navigator' ),
		'items_list_navigation'      => __( 'Types list navigation', 'navigator' ),
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