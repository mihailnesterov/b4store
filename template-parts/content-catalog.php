<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package b4store
 */

	if( is_shop() || is_product_category() ): ?>
		
		<div class="row">
		
		<?php

			/**
			 * Functions hooked in to b4store_breadcrumbs_top add_action
			 *
			 * @hooked b4store_breadcrumbs          	- 5
			 */
			do_action( 'b4store_breadcrumbs_top' );
			/**
			 * Functions hooked in to b4store_sidebar add_action
			 *
			 * @hooked b4store_sidebar_open				- 10
			 * @hooked b4store_sidebar_catalog_menu		- 20
			 * @hooked b4store_sidebar_ads				- 30
			 * @hooked b4store_sidebar_close			- 40
			 */
			do_action( 'b4store_sidebar' );
			/**
			 * Functions hooked in to b4store_catalog add_action
			 *
			 * @hooked b4store_breadcrumbs          	- 5
			 * @hooked b4store_catalog_header      		- 10
			 * @hooked b4store_catalog_content         	- 20
			 * @hooked b4store_child_categories_list	- 30
			 * @hooked b4store_products_list         	- 40
			 * @hooked b4store_pagination	         	- 50
			 */
			do_action( 'b4store_catalog' ); ?>
		
		</div> <!-- ./row -->
		
		<?php
	else:
		/**
		 * Functions hooked in to b4store_breadcrumbs_top add_action
		 *
		 * @hooked b4store_breadcrumbs          	- 5
		 */
		do_action( 'b4store_breadcrumbs_top' );
		/**
		 * Functions hooked in to b4store_product add_action
		 *
		 * @hooked b4store_breadcrumbs          		- 0
		 * @hooked b4store_product_open					- 5
		 * @hooked b4store_product_header          		- 10
		 * @hooked b4store_product_left_column_open		- 15
		 * @hooked b4store_product_images         		- 20
		 * @hooked b4store_product_social         		- 25
		 * @hooked b4store_product_left_column_close	- 30
		 * @hooked b4store_product_right_column_close	- 35	
		 * @hooked b4store_product_buy         			- 40
		 * @hooked b4store_product_categories       	- 45
		 * @hooked b4store_product_content         		- 50
		 * @hooked b4store_products_related		     	- 55
		 * @hooked b4store_product_right_column_close	- 60
		 * @hooked b4store_product_close				- 65
		 */
			do_action( 'b4store_product' );
		/**
		 * Functions hooked in to b4store_after_product_bottom add_action
		 *
		 * @hooked b4store_products_related_open		- 10
		 * @hooked b4store_products_related_header		- 20
		 * @hooked b4store_products_related				- 30
		 * @hooked b4store_products_related_close		- 40
		 */
		do_action( 'b4store_after_product_bottom' );

	endif;
