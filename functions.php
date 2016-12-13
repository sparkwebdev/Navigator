<?php
/**
 * Navigator functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Navigator
 */

if ( ! function_exists( 'navigator_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function navigator_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// Add custom image size
	// add_image_size( 'feature', 1600, 450, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'navigator' ),
	) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'footer' => esc_html__( 'Footer Menu', 'navigator' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
}
endif; // navigator_setup
add_action( 'after_setup_theme', 'navigator_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function navigator_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'navigator_content_width', 768 );
}
add_action( 'after_setup_theme', 'navigator_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function navigator_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'navigator' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'navigator_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function navigator_scripts() {
	wp_enqueue_style( 'navigator-style', get_stylesheet_uri(), array(), '1.0.2' );

	wp_enqueue_script( 'navigator-tools', get_template_directory_uri() . '/js/min/tools-min.js', array(), '', true );

	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js", false, null);
		wp_enqueue_script('jquery');
	}

	wp_enqueue_script( 'navigator-plugins', get_template_directory_uri() . '/js/min/plugins-min.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'navigator_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom Wordpress Shortcodes
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Custom functions for the admin back-end */
if (is_admin()) {
	require get_template_directory() . '/inc/admin.php';
}


/**
 * Advanced Custom Fields Plugin
 * Register options page */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page('Galleries');
}


// Disable Autocomplete for Gravity Forms
// https://gravitywiz.com/disable-autocomplete-gravity-forms/
add_filter( 'gform_form_tag', 'gform_form_tag_autocomplete', 11, 2 );
function gform_form_tag_autocomplete( $form_tag, $form ) {
	if ( is_admin() ) return $form_tag;
	if ( GFFormsModel::is_html5_enabled() ) {
		$form_tag = str_replace( '>', ' autocomplete="off">', $form_tag );
	}
	return $form_tag;
}
add_filter( 'gform_field_content', 'gform_form_input_autocomplete', 11, 5 ); 
function gform_form_input_autocomplete( $input, $field, $value, $lead_id, $form_id ) {
	if ( is_admin() ) return $input;
	if ( GFFormsModel::is_html5_enabled() ) {
		$input = preg_replace( '/<(textarea)/', '<${1} autocomplete="off" ', $input ); 
	}
	return $input;
}


// Changes the default Gravity Forms AJAX spinner.
// https://thomasgriffin.io/change-default-gravity-forms-ajax-spinner/ */
add_filter( 'gform_ajax_spinner_url', 'tgm_io_custom_gforms_spinner' );
function tgm_io_custom_gforms_spinner( $src ) {
    return get_stylesheet_directory_uri() . '/img/ajax-loader.gif';
}


/* 
 * Change WordPress default gallery output
 * http://stackoverflow.com/questions/14585538/customise-the-wordpress-gallery-html-layout
function customGalleryOutput($string, $attr){
	
    $output = "<div class=\"owl-carousel\">";
    $posts = get_posts(array('include' => $attr['ids'],'post_type' => 'attachment'));
    foreach($posts as $imagePost){
	    $alt = get_post_meta($imagePost->ID, '_wp_attachment_image_alt', true);
		$image_attributes = wp_get_attachment_image_src( $imagePost->ID, 'thumbnail' );
	    if (!$alt) {
		    $alt = "Gallery image";
	    }
		$image_title = $imagePost->post_title;
        $output .= '<div class="item" style="width:'.$image_attributes[1].'px;"><img src="'.wp_get_attachment_image_src($imagePost->ID, 'large')[0].'" alt="'.$alt.'" width="'.$image_attributes[1].'" height="'.$image_attributes[2].'" title="'.$image_title.'" /></div>';
    }
    $output .= "</div>";
    
    return $output;
    
}
add_filter('post_gallery', 'customGalleryOutput', 10, 2); */