<?php
/**
 * b4store template hooks
 *
 * @package b4store
 */

/**
 * General
 *
 * @see  b4store_header_widget_region()
 * @see  b4store_get_sidebar()
 */
/*add_action( 'b4store_before_content', 'b4store_header_widget_region', 10 );
add_action( 'b4store_sidebar', 'b4store_get_sidebar', 10 );*/

/**
 * Header
 *
 * @see  b4store_header_navbar_open()
 * @see  b4store_header_site_branding()
 * @see  b4store_header_product_search()
 * @see  b4store_header_contacts()
 * @see  b4store_header_navbar_toggler()
 * @see  b4store_header_navbar_collapse()
 * @see  b4store_header_navbar_close()
 */
add_action( 'b4store_header', 'b4store_header_navbar_open', 0 );
add_action( 'b4store_header', 'b4store_header_site_branding', 5 );
add_action( 'b4store_header', 'b4store_header_product_search', 10 );
add_action( 'b4store_header', 'b4store_header_contacts', 20 );
add_action( 'b4store_header', 'b4store_header_navbar_toggler', 30 );
add_action( 'b4store_header', 'b4store_header_navbar_collapse', 40 );
add_action( 'b4store_header', 'b4store_header_navbar_close', 50 );

/**
 * Main menu
 *
 * @see  b4store_main_menu_open()
 * @see  b4store_main_menu_items()
 * @see  b4store_shopping_cart()
 * @see  b4store_main_menu_close()
 */
add_action( 'b4store_main_menu', 'b4store_main_menu_open', 0 );
add_action( 'b4store_main_menu', 'b4store_main_menu_items', 10 );
add_action( 'b4store_main_menu', 'b4store_shopping_cart', 20 );
add_action( 'b4store_main_menu', 'b4store_main_menu_close', 30 );

/**
 * Footer
 *
 * @see  b4store_footer_blocks()
 * @see  b4store_footer_copyright()
 */
 add_action( 'b4store_footer', 'b4store_footer_blocks', 10 );
 add_action( 'b4store_footer', 'b4store_footer_copyright', 20 );

/**
 * Homepage
 *
 * @see  b4store_homepage_banner()
 */
add_action( 'b4store_homepage', 'b4store_homepage_banner', 10 );
//add_action( 'b4store_homepage', 'b4store_homepage_content', 20 );
add_action( 'b4store_homepage', 'b4store_homepage_categories', 30 );
add_action( 'b4store_homepage', 'b4store_homepage_advantages', 40 );
add_action( 'b4store_homepage', 'b4store_homepage_feedback', 50 );


/**
 * Loop Posts
 *
 * @see  b4store_post_header()
 * @see  b4store_post_content()
 */
add_action( 'b4store_loop_post', 'b4store_post_header', 10 );
add_action( 'b4store_loop_post', 'b4store_post_content', 20 );
/**
 * Single Post
 *
 * @see  b4store_single_post_header()
 * @see  b4store_single_post_content()
 */
add_action( 'b4store_single_post', 'b4store_single_post_header', 10 );
add_action( 'b4store_single_post', 'b4store_single_post_content', 20 );

/**
 * Dealers Single Page
 *
 * @see  b4store_dealer_single_open()
 * @see  b4store_dealer_single_header()
 * @see  b4store_dealer_single_content()
 * @see  b4store_dealer_single_footer()
 * @see  b4store_dealer_single_close()
 */
add_action( 'b4store_dealer_single', 'b4store_dealer_single_open', 10 );
//add_action( 'b4store_dealer_single', 'b4store_dealer_single_header', 20 );
add_action( 'b4store_dealer_single', 'b4store_dealer_single_content', 30 );
add_action( 'b4store_dealer_single', 'b4store_dealer_single_footer', 40 );
add_action( 'b4store_dealer_single', 'b4store_dealer_single_close', 50 );

/**
 * Page
 *
 * @see  b4store_breadcrumbs()
 * @see  b4store_page_header()
 * @see  b4store_page_content()
 */
add_action( 'b4store_page', 'b4store_breadcrumbs', 5 );
add_action( 'b4store_page', 'b4store_page_header', 10 );
add_action( 'b4store_page', 'b4store_page_content', 20 );

/**
 * WooCommerse Catalog / Shop / Category
 *
 * @see  b4store_catalog_open()
 * @see  b4store_breadcrumbs()
 * @see  b4store_catalog_header()
 * @see  b4store_catalog_content()
 * @see  b4store_child_categories_list()
 * @see  b4store_products_list()
 * @see  b4store_pagination()
 * @see  b4store_catalog_close()
 */
add_action( 'b4store_catalog', 'b4store_catalog_open', 5 );
add_action( 'b4store_breadcrumbs_top', 'b4store_breadcrumbs', 10 );
add_action( 'b4store_catalog', 'b4store_catalog_header', 20 );
add_action( 'b4store_catalog', 'b4store_catalog_content', 30 );
add_action( 'b4store_catalog', 'b4store_child_categories_list', 40 );
add_action( 'b4store_catalog', 'b4store_products_list', 50 );
add_action( 'b4store_catalog', 'b4store_pagination', 60 );
add_action( 'b4store_catalog', 'b4store_catalog_close', 70 );

/**
 * WooCommerse Product Page
 *
 * @see  b4store_breadcrumbs()
 * @see  b4store_product_open()
 * @see  b4store_product_header()
 * @see  b4store_product_left_column_open()
 * @see  b4store_product_images()
 * @see  b4store_product_social()
 * @see  b4store_product_left_column_close()
 * @see  b4store_product_right_column_open()
 * @see  b4store_product_buy()
 * @see  b4store_product_categories()
 * @see  b4store_product_content()
 * @see  b4store_products_related()
 * @see  b4store_product_right_column_close()
 * @see  b4store_product_close()
 */
//add_action( 'b4store_product', 'b4store_breadcrumbs', 0 );
add_action( 'b4store_product', 'b4store_product_open', 5 );
add_action( 'b4store_product', 'b4store_product_header', 10 );
add_action( 'b4store_product', 'b4store_product_left_column_open', 15 );
add_action( 'b4store_product', 'b4store_product_images', 20 );
add_action( 'b4store_product', 'b4store_product_social', 25 );
add_action( 'b4store_product', 'b4store_product_left_column_close', 30 );
add_action( 'b4store_product', 'b4store_product_right_column_open', 35 );
add_action( 'b4store_product', 'b4store_product_buy', 40 );
add_action( 'b4store_product', 'b4store_product_categories', 45 );
add_action( 'b4store_product', 'b4store_product_content', 50 );
add_action( 'b4store_product', 'b4store_product_right_column_close', 60 );
add_action( 'b4store_product', 'b4store_product_close', 65 );

/**
 * WooCommerse Related Products List
 *
 * @see  b4store_products_related_open()
 * @see  b4store_products_related_header()
 * @see  b4store_products_related()
 * @see  b4store_products_related_close()
 */

add_action( 'b4store_after_product_bottom', 'b4store_products_related_open', 10 );
add_action( 'b4store_after_product_bottom', 'b4store_products_related_header', 20 );
add_action( 'b4store_after_product_bottom', 'b4store_products_related', 30 );
add_action( 'b4store_after_product_bottom', 'b4store_products_related_close', 40 );

/**
 * WC Pagination
 *
 * @see  b4store_pagination()
 */
add_action( 'b4store_loop_after', 'b4store_pagination', 10 );

/**
 * Sidebar (catalog menu)
 *
 * @see  b4store_sidebar_open()
 * @see  b4store_sidebar_catalog_menu()
 * @see  b4store_sidebar_ads()
 * @see  b4store_sidebar_close()
 */
add_action( 'b4store_sidebar', 'b4store_sidebar_open', 10 );
add_action( 'b4store_sidebar', 'b4store_sidebar_catalog_menu', 20 );
add_action( 'b4store_sidebar', 'b4store_sidebar_ads', 30 );
add_action( 'b4store_sidebar', 'b4store_sidebar_close', 40 );

/**
 * Modals (modal forms)
 *
 * @see  b4store_feedback_modal()
 * @see  b4store_one_click_order_modal()
 * @see  b4store_add_to_cart_message()
 */
add_action( 'b4store_modals', 'b4store_feedback_modal', 10 );
add_action( 'b4store_modals', 'b4store_one_click_order_modal', 20 );
add_action( 'b4store_modals', 'b4store_add_to_cart_message', 30 );
