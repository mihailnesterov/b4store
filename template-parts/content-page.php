<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package b4store
 */

?>

	<?php
	if( is_front_page()):
		/**
		 * Functions hooked in to b4store_homepage add_action
		 *
		 * @hooked b4store_homepage_banner      	- 10
		 * @hooked b4store_homepage_content         - 20
		 * @hooked b4store_homepage_categories      - 30
		 * @hooked b4store_homepage_advantages      - 40
		 * @hooked b4store_homepage_feedback        - 50
		 */
		do_action( 'b4store_homepage' );
	else: ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php
			/**
			 * Functions hooked in to b4store_page add_action
			 *
			 * @hooked b4store_breadcrumbs          - 5
			 * @hooked b4store_page_header          - 10
			 * @hooked b4store_page_content         - 20
			 */
				do_action( 'b4store_page' );
			?>
		</article><!-- #post-## -->
	<?php endif;?>
