<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Navigator
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php
	// check if the flexible content field has rows of data
	if( have_rows('page_content') ) {
	     // loop through the rows of data
	    while ( have_rows('page_content') ) {
		    the_row();
			$component = get_row_layout();
			switch ($component) {
			    case 'dual_panel':
					get_template_part( '/template-parts/components/feature', 'dual_panel' );
			        break;
			    case 'general_content':
					get_template_part( '/template-parts/components/feature', 'general_content' );
			        break;
			}
	    }
	}
	?>
	
</article><!-- #post-## -->

