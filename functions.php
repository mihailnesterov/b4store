<?php
/**
 * B4store functions
 *
 * @package b4store
 */

 /**
  * error output off
  */
//ini_set( 'display_errors', '0' );

/**
 * Assign the theme version to a var
 */

 $theme = wp_get_theme( 'b4store' );
 $theme_version = $theme['Version'];

/**
 * see: Declaring WooCommerce support in themes
 * https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 */

if ( ! function_exists( 'b4store_setup' ) ) :
	function b4store_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on b4store.shop, use a find and replace
		 * to change 'b4store' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'b4store', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Главное меню', 'b4store' ),
			'catalog-menu' => esc_html__( 'Меню каталога', 'b4store' ),
			'footer-menu' => esc_html__( 'Меню в подвале', 'b4store' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'b4store_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		//dd_theme_support( 'menus' );
	}
endif;
add_action( 'after_setup_theme', 'b4store_setup' );

/**
* Add Woocommerce theme support
*/
if ( ! function_exists( 'b4store_add_woocommerce_support' ) ) :
    function b4store_add_woocommerce_support() {
        //add_theme_support( 'woocommerce' );
        add_theme_support( 'woocommerce', array(
			'thumbnail_image_width' => 200,
			//'gallery_thumbnail_image_width' => 100,
			'single_image_width' => 400,

            'product_grid'          => array(
                'default_rows'    => 3,
                'min_rows'        => 2,
                'max_rows'        => 8,
                'default_columns' => 4,
                'min_columns'     => 2,
                'max_columns'     => 5,
            ),
        ) );
    }
endif;
add_action( 'after_setup_theme', 'b4store_add_woocommerce_support' );

/**
 * Enqueue scripts and styles.
 */
 if ( ! function_exists( 'b4store_scripts' ) ) :
	function b4store_scripts() {
		wp_enqueue_style( 'b4store-theme-style', get_stylesheet_uri(), array('bootstrap-style') );
		wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.3.1' );
		wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() . '/assets/css/fontawesome.min.css', array(), '5.9.0' );
		wp_enqueue_style( 'lightbox-style', get_template_directory_uri() . '/assets/css/lightbox.css', array(), '2.11.1' );
		wp_enqueue_style( 'animate-style', get_template_directory_uri() . '/assets/css/animate.css', array(), '3.5.1' );

		/* 
			Jquery - change default in frontend
			Source: https://wpkot.ru/kak-udalit-standartnyj-jquery-v-wordpress/ 
		*/
		if ( !is_admin() ) {
			wp_deregister_script('jquery');
			wp_register_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '3.4.1', true );
			wp_enqueue_script( 'jquery');
		} 
		
		wp_enqueue_script( 'bootstrap-bundle', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), '4.3.1', true );
		wp_enqueue_script( 'jquery-mask', get_template_directory_uri() . '/assets/js/jquery.mask.min.js', array(), '1.14.16', true );
		wp_enqueue_script( 'fontawesome', get_template_directory_uri() . '/assets/js/fontawesome.min.js', array(), '2.11.1', true );
		wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/assets/js/lightbox.js', array(), '2.11.1', true );
		wp_enqueue_script( 'b4store-theme-scripts', get_template_directory_uri() . '/assets/js/b4store.js', array(), '1.0.1', true );
	}
endif;
add_action( 'wp_enqueue_scripts', 'b4store_scripts' );

/**
 * Enqueue template functions and hooks:
 */

// WC functions
require 'inc/b4store-functions.php';
// Template functions (action's html)
require 'inc/b4store-template-functions.php';
// Template hooks:
require 'inc/b4store-hooks.php';

/**
 * Custom WP actions, filters, hooks:
 */

// Hide WordPress version
add_filter('the_generator', '__return_empty_string');

// Hide ver param from css and js
function rem_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'rem_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'rem_wp_ver_css_js', 9999 );

// Hook add status "под заказ"
function add_custom_stock_type() {
    ?>
    <script type="text/javascript">
    $(function(){
        $('._stock_status_field').not('.custom-stock-status').remove();
    });
    </script>
    <?php  

    woocommerce_wp_select( array( 'id' => '_stock_status', 'wrapper_class' => 'hide_if_variable custom-stock-status', 'label' => __( 'Stock status', 'woocommerce' ), 'options' => array(
        'instock' => __( 'In stock', 'woocommerce' ),
        'outofstock' => __( 'Out of stock', 'woocommerce' ),
        'onrequest' => __( 'Под заказ', 'woocommerce' ), // The new option !!!
    ), 'desc_tip' => true, 'description' => __( 'Controls whether or not the product is listed as "in stock" or "out of stock" on the frontend.', 'woocommerce' ) ) );
}
add_action('woocommerce_product_options_stock_status', 'add_custom_stock_type');
function save_custom_stock_status( $product_id ) {
    update_post_meta( $product_id, '_stock_status', wc_clean( $_POST['_stock_status'] ) );
}
add_action('woocommerce_process_product_meta', 'save_custom_stock_status',99,1);

function woocommerce_get_custom_availability( $data, $product ) {
    switch( $product->stock_status ) {
        case 'instock':
            $data = array( 'availability' => __( 'In stock', 'woocommerce' ), 'class' => 'in-stock' );
        break;
        case 'outofstock':
            $data = array( 'availability' => __( 'Out of stock', 'woocommerce' ), 'class' => 'out-of-stock' );
        break;
        case 'onrequest':
            $data = array( 'availability' => __( 'Под заказ', 'woocommerce' ), 'class' => 'on-request' );
        break;
    }
    return $data;
}
add_action('woocommerce_get_availability', 'woocommerce_get_custom_availability', 10, 2);

// modal send email

// получатели
$mail_to = 'info@komplekt-premier.ru,reshetov@komplekt-premier.ru,mhause@mail.ru';

// заголовки писем
$headers = array(
	'From: komplekt-premier.ru <info@komplekt-premier.ru>',
	'Content-type: text/html; charset=utf-8',
	//'Cc: Copy <one@list.ru>',	// можно так отправлять копию
	//'Cc: any@mail.ru', // можно подключить другие копии, но использовать только простой email адрес
);

// получаем url
global $post;
$url = $_SERVER['REQUEST_URI'];

// 1 click
if (isset($_POST['btn-one-click-order-submit'])) {

	$phone=$_POST['input-one-click-order'];
	$item=$_POST['input-item-name'];
	$price=$_POST['input-item-price'];
	
	$theme_1 = 'Купить в 1 клик - сайт komplekt-premier.ru';
	$message_1='
		<h3>Получена заявка Купить в 1 клик:</h3>
		<h4>Телефон: '.$phone.'</h4>
		<br>
		<h4>'.$item.'</h4>
		<h4>Цена: '.$price.' руб.</h4>
		<br>
		<p>URL, с которого была отправлена заявка: <b>'.$url.'</b></p>';
	
	wp_mail($mail_to, $theme_1, $message_1, $headers);
	
	
	echo '<script>location.replace("'."/thankyou".'");</script>';
}

// feedback
if (isset($_POST['btn-feedback-submit'])) {
	
	$phone=$_POST['input-feedback-phone'];
	
	$theme_2 = 'Заказ обратного звонка - сайт komplekt-premier.ru';
	$message_2='
		<h3>Получена заявка на обратный звонок:</h3>
		<br>
		<p>телефон: <b>'.$phone.'</b></p>
		<p>URL, с которого была отправлена заявка: <b>'.$url.'</b></p>';
	
	wp_mail($mail_to, $theme_2, $message_2, $headers);
	
	echo '<script>location.replace("'."/thankyou".'");</script>';
}
	
