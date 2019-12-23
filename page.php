<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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

            //do_action( 'b4store_page_before' );

            get_template_part( 'template-parts/content', 'page' );

            /**
             * Functions hooked in to b4store_page_after action
             *
             * @hooked b4store_display_comments - 10
             */
            //do_action( 'b4store_page_after' );

        endwhile; // End of the loop.
        ?>

	</main><!-- ./ main -->

<?php
get_footer();
