<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Navigator
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/min/modernizr.custom-min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Merriweather:400,400i|Poppins:400,700" rel="stylesheet">
<?php wp_head(); ?>
<!--[if (gte IE 7)&(lte IE 8)]>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/min/respond-min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/min/selectivizr-min.js"></script>
<![endif]-->
<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_home_url(); ?>/favicon.ico">
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'navigator' ); ?></a>

	<header id="masthead" class="section site-header" role="banner">
		<div class="section-inner">
			<a class="site-branding" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><span class="screen-reader-text"><?php bloginfo( 'name' ); ?></span></h1>
				<?php else : ?>
					<p class="site-title"><span class="screen-reader-text"><?php bloginfo( 'name' ); ?></span></p>
				<?php endif; ?>
				<p class="site-description"><span class="screen-reader-text"><?php bloginfo( 'description' ); ?></span></p>
			</a><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'navigator' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'depth' => '1' ) ); ?>
			</nav><!-- #site-navigation -->
			<ul class="social-links">
				<li><span class="screen-reader-text">Connect with us</span></li>
				<li class="social-link-linkedin"><a href="https://www.linkedin.com/company-beta/6651038/" target="_blank"><span class="screen-reader-text">LinkedIn</span></a></li>
				<li class="social-link-twitter"><a href="https://twitter.com/Navship" target="_blank"><span class="screen-reader-text">Twitter</span></a></li>
			</ul>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
