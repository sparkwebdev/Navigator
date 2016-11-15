<?php
// Check for Advanced Custom Fields plugin function
if( function_exists('get_field') ) {
	
	// Get page intro data
	
	// Check for Blog pages to set category title/image
	if (is_single() || is_home() || is_archive()) {
		$categories = get_the_category();
		$catTitle = esc_html( $categories[0]->name);
		if ($catTitle == "Learning") {
			$imgSrc = get_field('page_intro_image', 68);
			if (get_field('page_intro_title', 68)) {
				$theTitle = get_field('page_intro_title', 68);
			} else {
				if ( ! empty( $categories ) ) {
				    $theTitle = $catTitle;   
				}
			}
		} else {
			$page_for_posts_id = get_option('page_for_posts');
			$imgSrc = get_field('page_intro_image', $page_for_posts_id);
			if (get_field('page_intro_title', $page_for_posts_id)) {
				$theTitle = get_field('page_intro_title', $page_for_posts_id);
			} else {
				if ( ! empty( $categories ) ) {
				    $theTitle = esc_html( $categories[0]->name );   
				}
			}
		}
	}
	// Else get title(s) and image
	else {
		$imgSrc = get_field('page_intro_image');
		if (get_field('page_intro_title')) {
			$theTitle = get_field('page_intro_title');
		} else {
			$theTitle = get_the_title();
		}
		if (get_field('page_intro_sub_title')) {
			$theSubTitle = get_field('page_intro_sub_title');
		}
	}
	
	// Output page intro
	
	// If is partner city
	if ($post->post_parent == '7') { ?>
		<div class="section page-intro feature-city-intro tinted-multiply" style="background-image: url(<?php echo $imgSrc; ?>)">
			<div class="section-inner">
				<p class="page-title">Partner City</p>
				<h1 class="page-sub-title"><?php echo $theTitle; ?></h1>
				<h2 class="page-sub-title"><?php echo $theSubTitle; ?></h2>
			</div>
		</div>
	<?php }
	// Else if image is present
	else if ($imgSrc) { ?>
		<div class="section page-intro feature-full-width full-width-narrow tinted-multiply" style="background-image: url(<?php echo $imgSrc; ?>);">
			<div class="section-inner">
				<?php if ($theTitle) {
					echo '<h1 class="page-title">'.$theTitle.'</h1>';
				} ?>
			</div>
		</div>
	<?php }
	// Else show text style intro
	else if ($theTitle && $theSubTitle) { ?>
		<div class="section page-intro page-intro-text with-tint">
			<div class="section-inner">
				<?php if ($theTitle) {
					echo '<h1 class="page-title">'.$theTitle.'</h1>';
				} ?>
				<?php if ($theSubTitle) {
					echo '<h2 class="page-sub-title">'.$theSubTitle.'</h2>';
				} ?>
			</div>
		</div>
	<?php } ?>

<?php } ?>