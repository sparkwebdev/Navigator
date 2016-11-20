<?php
// Check for Advanced Custom Fields plugin function
if( function_exists('get_field') ) {
	$icon = get_sub_field('general_content_icon');
	$title = get_sub_field('general_content_title');
	$subtitle = get_sub_field('general_content_subtitle');
	$content = get_sub_field('general_content_content');
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
		$pageLinkButton = '<p><a href="'.$pageLinkURL.'" class="btn">'.$pageLinkText.'</a></p>';
	}

	$containerClass = "section feature-general-content";
	$titleClass = "section-title";
	$contentClass = "section-content";
	
	$optionTint = get_sub_field('general_content_option_tint');
	$optionTwoColumn = get_sub_field('general_content_option_two_column');
	
	if ($icon) {
		$titleClass = "icon-title icon-".$icon;
	}
	if ($optionTint) {
		$containerClass .= " with-tint-dark";
	}
	if ($optionTwoColumn) {
		$contentClass .= " with-two-columns";
	}
	
?>

<div class="<?php echo $containerClass; ?>">
	<?php if ($title || $subtitle) { ?>
	<div class="section-inner section-inner-narrow">
		<?php if ($title) { ?>
		<h2 class="<?php echo $titleClass; ?>"><?php echo $title; ?></h2>
		<?php } ?>
		<?php if ($subtitle) { ?>
		<h3 class="section-subtitle"><?php echo $subtitle; ?></h3>
		<?php } ?>
	</div>
	<?php } ?>
	<?php if ($content) { ?>
	<div class="section-inner">
		<div class="<?php echo $contentClass; ?>">
			<?php echo $content; ?>
		</div>
	</div>
	<?php } ?>
	<?php if (isset($pageLinkButton)) { ?>
	<div class="section-inner section-inner-narrow">
		<?php echo $pageLinkButton; ?>
	</div>
	<?php } ?>
</div>

<?php } ?>