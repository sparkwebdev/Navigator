<?php
/**
 * Template part for Recent Posts Widget
 *
 * @package Mezzanine
 */
?>
<aside class="widget widget_recent_posts">
	<?php // WP_Query arguments
	$args = array (
		'post_type' => 'post',
		'posts_per_page' => '3',
	);
	// The Query
	$queryRecent = new WP_Query( $args );
	// The Loop
	if ( $queryRecent->have_posts() ) {
		echo '<h2 class="widget-title">Recent Posts</h2>';
		echo '<ul>';
		while ( $queryRecent->have_posts() ) {
			$queryRecent->the_post();
			echo '<li class="latest-news-item">';
			echo '<h3><a href="'.get_permalink().'">'.get_the_title().'</a></h3>';
			echo '<div class="entry-meta">';
			mezzanine_posted_on();
			echo '</div><!-- .entry-meta -->';
			$the_excerpt = get_the_excerpt();
			if ($the_excerpt) {
				echo '<p>'.substr(get_the_excerpt(),0,100);
				if (strlen($the_excerpt) > 100) {
					echo '&hellip;';
				}
				echo '</p>';
			}
			echo '</li>';
		}
		echo '</ul>';
	}
	// Restore original Post Data
	wp_reset_postdata();
	?>
</aside>