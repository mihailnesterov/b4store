<?php
/**
 * b4store template functions.
 *
 * @package b4store
 */

 /**
 * WC add to cart     
 * https://inprocess.by/blog/kak-vyvesti-korzinu-woocommerce-v-shapke-sajta/
 */
add_filter('woocommerce_add_to_cart_fragments', 'header_add_to_cart_fragment');

function header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
    ob_start();
    ?>
    <span class="basket-btn__counter badge badge-light p-1"><?php echo sprintf($woocommerce->cart->cart_contents_count); ?></span>
    <?php
    $fragments['.basket-btn__counter'] = ob_get_clean();
    return $fragments;
}

/**
* WC update cart quantity AJAX
*/
function enqueue_cart_qty_ajax() {

    wp_register_script( 'cart-qty-ajax-js', get_template_directory_uri() . '/assets/js/cart-qty-ajax.js', array( 'jquery' ), '', true );
    wp_localize_script( 'cart-qty-ajax-js', 'cart_qty_ajax', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    wp_enqueue_script( 'cart-qty-ajax-js' );

}
add_action('wp_enqueue_scripts', 'enqueue_cart_qty_ajax');
function ajax_qty_cart() {
    // Set item key as the hash found in input.qty name
    $cart_item_key = $_POST['hash'];
    // Get the array of values owned by the product we're updating
    $threeball_product_values = WC()->cart->get_cart_item( $cart_item_key );
    // Get the quantity of the item in the cart
    $threeball_product_quantity = apply_filters( 'woocommerce_stock_amount_cart_item', apply_filters( 'woocommerce_stock_amount', preg_replace( "/[^0-9\.]/", '', filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT)) ), $cart_item_key );
    // Update cart validation
    $passed_validation  = apply_filters( 'woocommerce_update_cart_validation', true, $cart_item_key, $threeball_product_values, $threeball_product_quantity );
    // Update the quantity of the item in the cart
    if ( $passed_validation ) {
        WC()->cart->set_quantity( $cart_item_key, $threeball_product_quantity, true );
    }
    // Refresh the page
    echo do_shortcode( '[woocommerce_cart]' );
    die();
}
add_action('wp_ajax_qty_cart', 'ajax_qty_cart');
add_action('wp_ajax_nopriv_qty_cart', 'ajax_qty_cart');



/**
* WC Filter order filds
*/
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
// Все $fields пропущены через фильтр
function custom_override_checkout_fields( $fields ) {
    //unset($fields['billing']['billing_first_name']);
    unset($fields['billing']['billing_last_name']);
    //unset($fields['billing']['billing_email']);
    //unset($fields['billing']['billing_phone']);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_city']);
    //unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    //unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_postcode']);
    
    unset( $fields['billing']['billing_address_1']['validate']);
    
    $fields['billing']['billing_first_name'] = array(
    	//'label'     => __('First name', 'woocommerce'),
        //'label'       => true,
		'placeholder' => $fields['billing']['billing_first_name']['label'],
		'class'       => array('form-group'),
		'input_class' => array('form-control','form-control-lg', 'ym-disable-keys'),
		'required'    => true,
        'clear'     => true,
        'priority'  => 10,
     );
    
     $fields['billing']['billing_phone'] = array(
        //'label'     => __('Phone', 'woocommerce'),
		'placeholder' => $fields['billing']['billing_phone']['label'],
		'class'       => array('form-group'),
		'input_class' => array('form-control','form-control-lg', 'ym-disable-keys'),
		'required'    => true,
        'clear'     => true,
        'priority'  => 20,
     );
     $fields['billing']['billing_email'] = array(
        //'label'     => __('Email', 'woocommerce'),
		'placeholder' => $fields['billing']['billing_email']['label'],
		'class'       => array('form-group'),
		'input_class' => array('form-control','form-control-lg', 'ym-disable-keys'),
		'required'    => true,
        'clear'     => true,
        'priority'  => 30,
     );
     $fields['billing']['billing_address_1'] = array(
        //'label'     => 'Адрес доставки',
		'placeholder' => 'Адрес доставки',
		'class'       => array('form-group'),
		'input_class' => array('form-control','form-control-lg', 'ym-disable-keys'),
		'required'    => true,
        'clear'     => true,
        'priority'  => 40,
     );
     $fields['billing']['billing_country'] = array(
        //'label'       => false,
        'placeholder' => $fields['billing']['billing_country']['label'],
		'class'       => array('form-group','d-none'),
		'input_class' => array('form-control','form-control-lg', 'ym-disable-keys'),
		'required'    => true,
        'priority'  => 50,
     ); 
    
    /*$fields['billing']['billing_first_name'] = array(
        'label'     => __('Phone', 'woocommerce'),
        'label'     => false,
        'placeholder'   => _x('Имя', 'placeholder', 'woocommerce'),
        'required'  => true,
        'class'     => array('form-control','form-control-lg'),
        'style'     => array('border:1px red solid;'),
        'clear'     => true,
        'priority'  => 10,
     );
    */
    
    return $fields;
}
