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
	// Output Pages (Temp)
	if (is_page(2)) {
		get_template_part( '/template-parts/components/component', 'page_home' );
	}
	if (is_page(5)) {
		get_template_part( '/template-parts/components/component', 'page_services' );
	}
	if (is_page(7)) {
		get_template_part( '/template-parts/components/component', 'page_network' );
	}
	if (is_page(9)) {
		get_template_part( '/template-parts/components/component', 'page_how' );
	}
	if (is_page(11)) {
		get_template_part( '/template-parts/components/component', 'page_clients' );
	}
	if (is_page(13)) {
		get_template_part( '/template-parts/components/component', 'page_about' );
	}
	if (is_page(15)) {
		get_template_part( '/template-parts/components/component', 'page_contact' );
	}
	// Output Page Intro
	//get_template_part( '/template-parts/components/component', 'page_intro' );
	?>
	<?php
	if (function_exists('get_field')) {
		// check if the flexible content field has rows of data
		if( have_rows('page_content') ) {
		     // loop through the rows of data
		    while ( have_rows('page_content') ) {
			    the_row();
				$component = get_row_layout();
				switch ($component) {
				    case 'general_content':
						get_template_part( '/template-parts/components/component', 'general_content' );
				        break;
				    case 'general_content_two_column':
						get_template_part( '/template-parts/components/component', 'general_content_two_column' );
				        break;
				    case 'tabs':
						get_template_part( '/template-parts/components/component', 'tabs' );
				        break;
				}
		    }
		}
	}
	?>
	<?php /*
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'navigator' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	*/ ?>
</article><!-- #post-## -->

