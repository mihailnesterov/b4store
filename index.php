<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package b4store
 */

get_header();
?>

	<main id="main" role="main">

		<?php

		if ( have_posts() ) :
		/**
		 * Functions hooked in to b4store_breadcrumbs_top add_action
		 *
		 * @hooked b4store_breadcrumbs          	- 5
		 */
			do_action( 'b4store_breadcrumbs_top' );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- ./ main -->

<?php

get_footer();
