<?php
/**
 * Template used to display post content.
 *
 * @package b4store
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('col-12 shadow-sm m-0 mb-4 p-4 border text-center'); ?>>
	<?php
	/**
	 * Functions hooked in to b4store_loop_post action.
	 *
	 * @hooked b4store_post_header          - 10
	 * @hooked b4store_post_content         - 20
	 */
	do_action( 'b4store_loop_post' );
	?>
</div><!-- #post-## -->
<p class="wist-sep-white my-5"></p>
