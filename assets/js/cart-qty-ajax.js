/* WC update cart quantity AJAX */
$( function( $ ) {
    $( document ).on( 'change', 'input.qty', function() {
    
        const item_hash = $( this ).attr( 'name' ).replace(/cart\[([\w]+)\]\[qty\]/g, "$1");
        const item_quantity = Number($( this ).val());
        const currentVal = parseFloat(item_quantity);
        /*const currentPrice = parseFloat($(this).closest('tr').find('.product-price').text());
        const currentQuantity = parseInt($(this).val());
        const totalAmount = $(this).closest('tr').find('.product-subtotal span.woocommerce-Price-amount.amount');
        const cartTotalSumm = $('#cart-total-summ');
        let currentTotalCount = $('#cart-total-count').text();
        let basketNewVal = 0;*/
        
        /*$('input.qty').each(function(){
            basketNewVal += parseInt($(this).val());
        });*/

        function qty_cart() {
            $.ajax({
                type: 'POST',
                url: cart_qty_ajax.ajax_url,
                data: {
                    action: 'qty_cart',
                    hash: item_hash,
                    quantity: currentVal
                },
                success: function(data) {
                    //$( '.view-cart-popup' ).html(data);
                    //currentTotalCount = basketNewVal;
                   // $('#cart-total-count').html(currentTotalCount);
                    //$('.basket-btn__counter').html(currentTotalCount);
                    //$(totalAmount).html( (currentPrice * currentQuantity) );
                    /*let totalSum = 0;
                    $('.product-subtotal span.woocommerce-Price-amount.amount').each(function(){
                        totalSum += parseFloat($(this).text());
                    });
                    $(cartTotalSumm).html(totalSum);*/
                    $('#form-cart').submit();
                }
            });
        }
        qty_cart();
    });
});