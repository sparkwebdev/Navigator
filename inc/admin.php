<?php

/**
* Add Admin stylessheet for presentation purposes
*/
add_action( 'admin_enqueue_scripts', 'load_admin_style' );
function load_admin_style() {
	wp_register_style( 'admin_css', get_template_directory_uri() . '/style-admin.css', false, '1.0.0' );
	wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/style-admin.css', false, '1.0.0' );
}
?>