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

	<footer id="colophon" class="site-footer section" role="contentinfo">
		<div class="section-inner">
			<div class="cols">
				<div class="col col-2-3">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Navigator Partnership Ltd</a>, registered in Scotland SC513251
				</div><!-- .col -->
				<div class="col col-1-3">
					<ul class="social-links">
						<li>Connect with us</li>
						<li class="social-link-twitter"><a href=""><span class="screen-reader-text">Twitter</span></a></li>
						<li class="social-link-linkedin"><a href=""><span class="screen-reader-text">LinkedIn</span></a></li>
					</ul>
				</div><!-- .col -->
			</div><!-- .cols -->
		</div><!-- .section-inner -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script>
	$('.feature-carousel .bx-slider').bxSlider({
		infiniteLoop: false,
		hideControlOnEnd: true,
		controls: true,
		pager: false,
		slideWidth: 654,
		minSlides: 3,
		maxSlides: 5,
		slideMargin: 1
	});
	$('.owl-carousel').owlCarousel({
	    margin:60,
	    loop:false,
	    autoWidth:true,
		nav:true,
	    navRewind: false,
		dots:false,
		navText : ['<span class="screen-reader-text">Previous</span>','<span class="screen-reader-text">Next</span>'],
	});
	
	
	$('.feature-expander > li h3').hover(function() {
		$(this).next().slideToggle();
	});
</script>

</body>
</html>
