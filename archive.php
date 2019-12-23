<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package b4store
 */

get_header(); ?>

	<div id="primary" class="row">
		<main id="main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php 
			/**
			 * Functions hooked in to b4store_breadcrumbs_top add_action
			 *
			 * @hooked b4store_breadcrumbs          	- 5
			 */
				do_action( 'b4store_breadcrumbs_top' );	// show on single list pages 
			?>

			<header class="col-12 my-4">
				<?php
					single_cat_title( '<h1 class="page-title text-kp-green text-center">', '</h1>' );
				?>
				<p class="wist-sep-white mt-2 mb-5"></p>
			</header><!-- .page-header -->

			<?php 

			/**
			 * loop for dealers
			 */
			$categories = get_the_category();
			if(isset($categories) && $categories[0]->slug === 'dealers'): ?>
				<div class="col-12">
					<div class="row">
			<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'dealers' );

				endwhile; ?>
					</div> <!-- ./ row -->
				</div> <!-- ./ col-12 -->
			<?php
			else:
				get_template_part( 'loop' );
			endif;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
