<?php
/**
 * The template for displaying search results pages.
 *
 * @package b4store
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
						/* translators: %s: search term */
						printf( esc_attr__( 'Search Results for: %s', 'b4store' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
			get_template_part( 'loop' );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
do_action( 'b4store_sidebar' );
get_footer();
