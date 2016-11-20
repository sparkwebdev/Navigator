<?php
// Check for Advanced Custom Fields plugin function
if( function_exists('get_field') ) {
	$title = get_sub_field('dual_panel_title');
	$content = get_sub_field('dual_panel_content');
	$pageLink = get_sub_field('link_type');
	$pageLinkText = "Read More";
	if ($pageLink) {
		if ($pageLink = 'Select existing page') {
			$pageLinkItem = get_sub_field('link_url');
			$pageLinkURL = get_permalink($pageLinkItem);
			$pageLinkText = get_the_title($pageLinkItem);
		} else if (get_sub_field('link_text')) {
			$pageLinkURL = get_sub_field('link_text');
		}
		$pageLinkText = get_sub_field('link_text');
		$content .= '<p><a href="'.$pageLinkURL.'" class="btn">'.$pageLinkText.'</a></p>';
	}
	
	$containerClass = "section feature-dual-panel with-tint";
	$contentClass = "section-content";
	$titleClass = "section-title";
	$image = get_sub_field('dual_panel_image');
	$optionHalfWidthTitle = get_sub_field('dual_panel_option_title_half_width');
	$optionTint = get_sub_field('dual_panel_option_tint_dark');
	$optionFullWidth = get_sub_field('dual_panel_option_full_width');
	$optionImageLeft = get_sub_field('dual_panel_option_image_left');
	$optionEdge = get_sub_field('dual_panel_option_image_edge');
	
	if ($optionHalfWidthTitle) {
		$titleClass .= " section-title-half";
	}
	if (!$optionFullWidth) {
		if ($optionImageLeft) {
			$containerClass .= " with-tint-right";
		} else {
			$containerClass .= " with-tint-left";
		}
	}
	if ($optionTint) {
		$containerClass .= " with-tint-dark";
	}
	if ($optionImageLeft) {
		$contentClass .= " section-content-right";
	}
	if ($image) {
		$imageClass = "section-image";
		if ($image['height'] > $image['width'] ) {
			$imageClass .= " section-image-portrait";
		}
		if ($optionEdge) {
			$imageClass .= " section-image-edge";
			$imageURL = $image['sizes']['large'];
		} else {
			$imageURL = $image['sizes']['medium'];
		}
	}
?>
<div class="<?php echo $containerClass; ?>">
	<div class="section-inner">
		<h2 class="<?php echo $titleClass; ?>"><?php echo $title; ?></h2>
		<div class="<?php echo $contentClass; ?>">
			<?php if (isset($imageURL)) { ?>
			<span class="<?php echo $imageClass; ?>" style="background-image: url(<?php echo $imageURL; ?>);"></span>
			<?php } ?>
			<?php echo $content; ?>
		</div>
	</div>
</div>
<?php } ?>