<?php
/**
 * Template part for embedding Facebook Feed
 *
 * @package Mezzanine
 */
 
$facebookURL = "https://www.facebook.com/company";
$facebookTitle = "Company Name";
$facebookHeight = "450";
?>
<aside class="widget widget_faceebook_feed">
	<h3>Latest on Facebook</h3>
	<div class="fb-page" data-href="<?php echo $facebookURL; ?>" data-height="<?php echo $facebookHeight; ?>" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="false" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="<?php echo $facebookURL; ?>"><a href="<?php echo $facebookURL; ?>" class="fb-page-fallback-link"><?php echo $facebookTitle; ?></a></blockquote></div></div>
	</div>
</aside>