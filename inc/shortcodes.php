<?php
/**
 * Custom shortcodes for this theme.
 *
 * @package Navigator
 */
 
function outputCarousel($images) {
	
	$output = '';
	if ($images) {
	    $output = '<div class="owl-carousel owl-carousel-variable">';
	    foreach($images as $image){
		    $alt = $image['alt'];
		    if (!$alt) {
			    $alt = "Gallery image";
		    }
	        $output .= '<div class="item" style="width:'.$image['sizes']['medium-width'].'px;"><img src="'.$image['sizes']['medium'].'" alt="'.$alt.'" width="'.$image['sizes']['medium-width'].'" height="'.$image['sizes']['medium-height'].'" /></div>';
	    }
	    $output .= '</div>';
    }
	return $output;
}
 
function outputGallery($images) {
	$output = '';
	if ($images) {
		$output .= '<div class="cols feature-image-grid">';
		foreach ($images as $image) {
			$output .= '<div class="col col-1-4">';
			$output .= '<div class="col-content">';
			$output .= '<img src="'.$image['sizes']['medium'].'" />';
			$output .= '</div>';
			$output .= '</div>';
		}
		$output .= '</div>';
	}
	return $output;
}

function outputSlideshow($items, $title, $background) {
	$output = '';
	if ($items) {
		$itemImage = $background['url'];
		if ($itemImage) {
			$output .= '<span class="slideshow-background" style="background: url('.$itemImage.');"></span>';
		}
		$output .= '<div class="slideshow-container">';
		if ($title) {
			$output .= '<h3 class="section-title">'.$title.'</h3>';
		}
		$output .= '<ul class="owl-carousel owl-slideshow">';
		$i = 1;
		foreach ($items as $item) {
			if ($item['slideshow_item_content']) {
				$output .= '<li>';
				$output .= '<span class="slide-count">'.str_pad($i, 2, '0', STR_PAD_LEFT).'</span>';
				$output .= $item['slideshow_item_content'];
				$output .= '</li>';
			}
			$i++;
		}
		$output .= '</ul>';
		$output .= '</div>';
	}
	return $output;
}

function outputCircles($items) {
	$output = '';
	if ($items) {
		$output .= '<ul class="circles-list clear">';
		foreach ($items as $item) {
			if ($item['circles_item_title']) {
				$itemImage = $item['circles_item_image']['sizes']['medium'];
				if ($itemImage) {
					$output .= '<li style="background-image: url('.$itemImage.')">';
				} else {
					$output .= '<li>';
				}
				$output .= '<p>';
				$output .= $item['circles_item_title'];
				$output .= '</p>';
				$output .= '</li>';
			}
		}
		$output .= '</ul>';
	}
	return $output;
}

/**
 * Register Shortcode - Carousel
 */
function navigator_gallery($atts, $content = null) {
	
    $a = shortcode_atts( array(
        'name' => '',
    ), $atts );
	
	$output = '';
	
	// Check for Advanced Custom Fields plugin function, get data from Site Content
	if( function_exists('get_field') ) {
		if( have_rows('Galleries', 'option') ) {
		    while ( have_rows('Galleries', 'option') ) {
			    the_row();
			    $name = get_sub_field('gallery_name');
			    if ($name == $atts['name']) {
			    	$type = get_sub_field('gallery_type');
					switch ($type) {
					    case 'Carousel':
						    if (get_sub_field('gallery_images')) {
					    		$output .= outputCarousel(get_sub_field('gallery_images'));
					    	}
					        break;
					    case 'Image Grid':
						    if (get_sub_field('gallery_images')) {
					    		$output .= outputGallery(get_sub_field('gallery_images'));
					    	}
					        break;
					    case 'Slideshow':
						    if (get_sub_field('slideshow_items')) {
					    		$output .= outputSlideshow(get_sub_field('slideshow_items'), get_sub_field('slideshow_title'), get_sub_field('slideshow_image'));
					    	}
					        break;
					    case 'Circles Grid':
						    if (get_sub_field('gallery_circles_items')) {
						    	$output .= outputCircles(get_sub_field('gallery_circles_items'));
						    }
					        break;
					    case 'Timeline':
					        break;
					}
			    }
			    
				/*
				if( have_rows('images') ) {
					$output .= '<ul>';
					while( have_rows('images') ) {
						the_row();
						$image = get_sub_field('image');
						$output .= '<li><img src="'.$image['sizes']['large'].'" /></li>';
					}
					$output .= '</ul>';
				}
				*/
			}
		}
	}
	
	return $output;
	
}
add_shortcode('galleries', 'navigator_gallery');