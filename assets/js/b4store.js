/* b4store JavaScript */
    
/* toTop Button */
$(function() { 
    $(window).scroll(function() { 
    if($(this).scrollTop() !== 0) { 
        $('#toTop').fadeIn(); 
            } else {	 
                    $('#toTop').fadeOut(); 
            }	 
        }); 
        $('#toTop').click(function() { 
        $('body,html').animate({scrollTop:0},800); 
    });
});


$(function() { 
    $('.card a[data-toggle="modal"]').on('click', (e) => {
        const self = e.target;
        //console.log($(self).closest('.card').find('h5 b').html());
        const modal = $('#oneClickOrder .modal-body');
        $(modal).find('h4').html($(self).closest('.card').find('h4 a').html());
        $(modal).find('img').attr('src',$(self).closest('.card').find('img').attr('src'));
        $(modal).find('h5 span').html($(self).closest('.card').find('h5 b').html());
        $('#input-one-click-order').mask('+7-999-999-99-99');
    });
    
});

/**
 * bootstrap4 multilevel menu script
 * https://forum.tamirov.ru/viewtopic.php?f=37&t=230
 */
$(function() {
    $("ul.dropdown-menu [data-toggle='dropdown']").on("click", function(event) {
      event.preventDefault();
      event.stopPropagation();
      $('.dropdown-submenu .show').removeClass("show");
      $(this).siblings().toggleClass("show");
  
      if (!$(this).next().hasClass('show')) {
        $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
      }
      $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
        $('.dropdown-submenu .show').removeClass("show");
      });
  
    });
});
/**
 * bootstrap4 menu on hover instead on click
 */
$('.nav-link').hover(function() {
    $(this).trigger('click');
}, function() { });

$("ul.dropdown-menu [data-toggle='dropdown']").hover(function() {
    $(this).trigger('click');
}, function() { });

/* one click modal - get product's image, name, price */
$(function() { 
    //$('a[data-toggle="modal"]').on('click', (e) => {
    $('a[data-target="#oneClickOrder"]').on('click', (e) => {
        
        const self = e.target;
        const modal = $('#oneClickOrder .modal-body');
        
        const modalImage = $('#one-click-img');
        const modalName = $('#one-click-name');
        const modalPrice = $('#one-click-price');
        
        // category page - product's list
        let productImage = $(self).closest('.card').find('img').attr('src');
        let productName = $(self).closest('.card').find('h4 a').html();
        let productPrice = $(self).closest('.card').find('h5 b').html();
        
        // single product page
        if( !productImage) { productImage = $('img[role="presentation"]').attr('src'); }
        if( !productName) { productName = $('h1').html(); }
        if( !productPrice) { productPrice = $('#item-price').html(); }
        
        $(modalImage).attr('src',productImage);
        $(modalName).html(productName);
        $(modalPrice).html(productPrice);
        $('#input-one-click-order').mask('+7-999-999-99-99');
        $('#input-item-name').val(productName);
        $('#input-item-price').val(productPrice);
    });
    
});

/* related: show modal on ajax_add_to_cart click */
$('.ajax_add_to_cart').each(function() {
    $(this).on('click', function() {
        $('#added-to-cart').modal();
    });
});

$(function() {
    // shipping: show / hide radio if > 5000
    $(document).ajaxSuccess(function() {
        const $tag = $('td.text-center h5 span.woocommerce-Price-amount');
        const $total = parseFloat($tag.text().replace(',',''));
        if( $total >= 5000) {
            $('#shipping_method li').each(function() {
                const li = $(this);
                if( $(li).find('input[type="radio"]').val() == 'free_shipping:5' ) {
                    $(li).find('input[type="radio"]').click();
                    $(li).find('input[type="radio"]').attr('checked', 'checked');
                    $(li).show();
                } else {
                    $(li).hide();
                }
            });
        }
    });
    
});

/**
 * accordion-catalog-menu collapsing current parent menu item
 */
$(function() {
    $('#accordion-catalog-menu ul li a').each( function() {
        if( $(this).hasClass('kp-active')) {
            $(this).closest('ul').addClass('show');
            //console.log($(this).text());
        }
    });
});

/**
 * single-product-add-to-cart - add input quantity
 */

$('#single-product-add-to-cart .quantity input[type="number"]').on('change', function() {
    $('a.ajax_add_to_cart').data('quantity', $(this).val());
});
$('.variation_quantity_input input[type="number"]').on('change', function() {
    $(this).closest('.row').find('a.ajax_add_to_cart').data('quantity', $(this).val());
});