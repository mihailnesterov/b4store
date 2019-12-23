<?php
/**
 * The template used for displaying home page content
 *
 * @package b4store
 */

?>
<?php
$featured_image = get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' );
?>

<div id="post-<?php the_ID(); ?>" >
	<div class="col-full">
		<?php
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
		?>
	</div>
</div><!-- #post-## -->
