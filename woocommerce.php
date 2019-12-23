<?php
/**
 * The template for displaying the default layout.
 * 
 * By creating a woocommerce.php file in your theme, you can easily set the default layout of your store.
 * 
 * @package b4store
 */

get_header();

    get_template_part( 'template-parts/content', 'catalog' );
    //woocommerce_content(); 

get_footer();