<?php
/**
 * Template part for Categories Widget
 *
 * @package Navigator
 */
?>
<aside class="widget widget_categories">
	<?php 
	echo '<h2 class="widget-title">Browse Categories</h2>';
	echo '<ul>';
	wp_list_categories('title_li=');
	echo '</ul>';
	?>
</aside>