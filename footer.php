<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Navigator
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<nav id="site-navigation-footer" class="main-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'primary-menu-footer' ) ); ?>
		</nav><!-- #site-navigation -->
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'navigator' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'navigator' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'navigator' ), 'navigator', '<a href="http://stevenpark.co.uk" rel="designer">Steven Park</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script>
	jQuery(document).ready( function() {
		
		function is_touch_device() {
			return !!('ontouchstart' in window);
		}
		if(is_touch_device()) {
			jQuery('body').addClass('touch-device');
		};
		
		/* If mobile browser, prevent click on parent nav item from redirecting to URL */
		jQuery('#primary-menu li').has('.sub-menu').each(function (index, elem) {
			var subNav = jQuery(this).find('.sub-menu');
			var subLink = jQuery(this).find('> a');
			subLink.addClass('sub-menu-dropdown');
		
			if(is_touch_device()) {
			/*	var subLinkTitle = subLink.text();
				var subLinkUrl = subLink.attr('href');
				subNav.prepend('<li class="menu-item menu-item-parent"><a href="'+subLinkUrl+'">View '+subLinkTitle+'</a></li>');
				subLink.on('click, touchstart', function(event){
			        event.preventDefault();
				});
				subLink.on('touchstart', function(event){
			        //jQuery(this).next('.sub-menu').toggle();
				});
			*/
			}
		});
		
	});
	</script>

</body>
</html>
