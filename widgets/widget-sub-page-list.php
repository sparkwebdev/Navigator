<?php
/**
 * Template part for Sub Pages List Widget
 *
 * @package Mezzanine
 */
?>
<?php
$currentPage = $post->ID;
$childPages = wp_list_pages('echo=0&exclude='.$currentPage.'&title_li=&sort_column=post_date&sort_order=DESC&child_of='.$post->post_parent);
if ($childPages) { ?>
<aside class="widget widget_sub_pages">
	<h3>Browse Others:</h3>
	<ul>
		<?php echo $childPages; ?>
	</ul>
</aside>
<?php } ?>