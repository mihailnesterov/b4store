<?php
/**
 * Template used to display post content on single pages.
 *
 * @package b4store
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	
	/**
	 * Functions hooked in to b4store_breadcrumbs_top add_action
	 *
	 * @hooked b4store_breadcrumbs          	- 5
	 */
	do_action( 'b4store_breadcrumbs_top' );

	//do_action( 'b4store_single_post_top' );

	/**
	 * Functions hooked into b4store_single_post add_action
	 *
	 * @hooked b4store_single_post_header          - 10
	 * @hooked b4store_single_post_content         - 30
	 */
	do_action( 'b4store_single_post' );

	/**
	 * Functions hooked in to b4store_single_post_bottom action
	 *
	 * @hooked b4store_post_nav         - 10
	 * @hooked b4store_display_comments - 20
	 */
	//do_action( 'b4store_single_post_bottom' );
	?>

</article><!-- #post-## -->
