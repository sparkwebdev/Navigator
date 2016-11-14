<?php
/**
 * Template part for Mailchimp Signup (Yikes plugin)
 *
 * @package Navigator
 */
?>
<aside class="widget widget_newsletter_signup">
	<h2>Signup</h2>
	<p>Signup to receive the latest news:</p>
	<?php if ( shortcode_exists( 'yikes-mailchimp' ) ) {
		echo do_shortcode('[yikes-mailchimp form="1"]');
	} ?>
</aside>