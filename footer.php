<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #page-content-container div and all content after
 *
 * @package b4store
 */

?>

                </div> <!-- ./ col-12 -->
            </div> <!-- ./ row -->
        </div> <!-- ./ page-content-container && container -->
        <!-- ./ Page Content -->
	</div>  <!-- #content -->

	<?php //do_action( 'b4store_before_footer' ); ?>

	<!-- Footer -->
    <footer class="py-5 bg-dark" role="contentinfo">
        <div class="container">
            <div class="row">

			<?php
			/**
			 * Functions hooked in to b4store_footer action
			 *
			 * @hooked b4store_footer_blocks              - 10
			 * @hooked b4store_footer_copyright           - 20
			 */
			do_action( 'b4store_footer' );
			?>

            </div>  <!-- ./ row -->
        </div>  <!-- ./ container -->
    </footer>
    <!-- ./ Footer -->

	<?php //do_action( 'b4store_after_footer' ); ?>

</div><!-- #page -->

<?php 
	/**
	 * Functions hooked in to b4store_modals add_action
	 *
	 * @hooked b4store_feedback_modal				- 10
	 * @hooked b4store_one_click_order_modal		- 20
	 * @hooked b4store_add_to_cart_message			- 30
	 */
	do_action( 'b4store_modals' );
?>

<!-- toTop button -->
<div id="toTop"><i class="fa fa-chevron-up"></i></div>

<?php wp_footer(); ?>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
    m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
        ym(43788099, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/43788099" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>
