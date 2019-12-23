<?php
/**
* Post Template - Name: Categories
* 
* @package b4store
*/

get_header(); ?>
555
	<div id="primary" class="content-area no-sidebar">
		<main id="main" class="site-main dealers" role="main">

		<?php while ( have_posts() ) : the_post();

			//do_action( 'storefront_single_post_before' );

			get_template_part( 'content', 'dealers' );

			//do_action( 'storefront_single_post_after' );

		endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
