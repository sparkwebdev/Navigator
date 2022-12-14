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
	
	<?php if ( shortcode_exists( 'wolf_tweet' ) && is_front_page()) { ?>
	<div class="section twitter-feed">
		<div class="section-inner">
			<?php echo do_shortcode('[wolf_tweet username="Navship" type="single"]'); ?>
		</div>
	</div><!-- .twitter-feed -->
	<?php } ?>
	<?php if ( shortcode_exists( 'gravityform' ) && is_front_page()) { ?>
	<div class="section newsletter-signup">
		<div class="section-inner">
			<?php echo do_shortcode('[gravityform id="3" title="true" description="true" ajax="true"]'); ?>
		</div>
	</div><!-- .newsletter-signup -->
	<?php } ?>

	<footer id="colophon" class="site-footer section" role="contentinfo">
		<div class="section-inner">
			<div class="cols">
				<div class="col col-2-3">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Navigator Partnership Ltd</a>,<br /> registered in Scotland SC513251
				</div><!-- .col -->
				<div class="col col-1-3">
					<?php /* <ul class="social-links">
						<li>Connect with us</li>
						<li class="social-link-twitter"><a href=""><span class="screen-reader-text">Twitter</span></a></li>
						<li class="social-link-linkedin"><a href=""><span class="screen-reader-text">LinkedIn</span></a></li>
					</ul> */ ?>
				</div><!-- .col -->
			</div><!-- .cols -->
		</div><!-- .section-inner -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script>
	$('.owl-carousel-variable').owlCarousel({
	    margin:60,
	    loop:false,
	    autoWidth:true,
		nav:true,
	    navRewind: false,
		dots:false,
		navText : ['<span class="screen-reader-text">Previous</span>','<span class="screen-reader-text">Next</span>'],
	});
	$('.owl-slideshow').owlCarousel({
	    loop:false,
	    items: 1,
		nav:true,
	    navRewind: false,
		dots:false,
		navText : ['<span class="screen-reader-text">Previous</span>','<span class="screen-reader-text">Next</span>'],
	});
	
	<?php if (is_page(9)) { ?>
	function onScrollInit( items, trigger ) {
		items.each( function(index, value) {
			if (index == 0) {
				setOffset = 70;
			} else {
				setOffset = 64 - (index * 4);
			}
	    	var osElement = $(this);
	        var osTrigger = ( trigger ) ? trigger : osElement;
	        osTrigger.waypoint(function() {
				osElement.addClass('animated');
	        },{
				triggerOnce: true,
				offset: setOffset + '%'
	        });
		});
	}
	
	var navigatorTimeline = $('.gallery-timeline');
	if (navigatorTimeline.length > 0) {
		navigatorTimeline.before('<span class="scroll-arrow waypoint-animate"></span>');
		onScrollInit( $('.waypoint-animate') );
	}
	<?php } ?>
	
	//$('.feature-expander > li ul').hide();
	$('.no-touchevents .feature-expander > li h3').click(function() {
		$(this).next().slideToggle().parent().toggleClass('expander-expanded');
	});
	$('.touchevents .feature-expander > li h3').hover(function() {
		$(this).next().slideToggle();
	});
</script>

</body>
</html>