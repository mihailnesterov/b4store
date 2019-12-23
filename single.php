<?php
/**
 * The template for displaying all single posts.
 *
 * @package b4store
 */

get_header(); 
//do_action( 'b4store_sidebar' );
?>

	<main id="main" role="main">
		<?php
		while ( have_posts() ) :
			the_post();

			//do_action( 'b4store_single_post_before' );
			
			get_template_part( 'template-parts/content', 'single' );

			//do_action( 'b4store_single_post_after' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
