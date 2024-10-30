var qcld_cross_sell_custom_js;

(function($) {
    "use strict";

    qcld_cross_sell_custom_js = {
        init: function() {

            this.cross_sellFastClicker();

            this.cross_sellAddToCart();

            this.cross_sellAddToCartVariablePro();

            this.cross_sellModalCall();

            this.cross_sellTooltipCall();
            
            this.cross_sellNotification();

        },

        cross_sellFastClicker: function() {
            FastClick.attach(document.body);
        },

        cross_sellAddToCart: function() {

            $(document).on( "click", ".qcld_cross_sell_s_p_add_to_cart", function (e) {
                e.preventDefault();
                var currentDom  = $(this);
                currentDom.addClass('qcld-loading');
                var pId         = currentDom.attr('p-id');
                var quantity    = currentDom.parent().find('.qcld_cross_sell_qty').val();

                var data = {
                    'action': 'qcld_woo_cross_sell_sp_add_to_cart',
                    'p_id': pId,
                    'quantity': quantity,
                    'security': qcld_cross_sell_ajax_nonce
                };
                    

                jQuery.post(qcld_ajaxurl, data, function (response) {

                    if (response == "simple") {
                        $(document.body).trigger('added_to_cart');
                        $.magnificPopup.close();
                    }

                });

            });


        },

        cross_sellAddToCartVariablePro: function() {

            // Single Product Ajax Cart
            $(document).on('click', '.single_add_to_cart_button:not(.disabled)', function (e) {
                e.preventDefault();
                var $thisbutton = $(this),
                    $form = $thisbutton.closest('form.cart'),
                    id = $thisbutton.val(),
                    product_qty = $form.find('input[name=quantity]').val() || 1,
                    product_id = $form.find('input[name=product_id]').val() || id,
                    variation_id = $form.find('input[name=variation_id]').val() || 0;

                    $thisbutton.addClass('qcld-loading');

                var data = {
                    action: 'qcld_cross_sell_single_ajax_add_to_cart',
                    product_id: product_id,
                    product_sku: '',
                    quantity: product_qty,
                    variation_id: variation_id,
                };

                $(document.body).trigger('adding_to_cart', [$thisbutton, data]);

                $.ajax({
                    type: 'post',
                    url: qcld_ajaxurl,
                    data: data,
                    beforeSend: function (response) {
                        $thisbutton.removeClass('added').addClass('loading');
                    },
                    complete: function (response) {
                        $thisbutton.addClass('added').removeClass('loading');
                    },
                    success: function (response) {
                       
                       // $("[name='update_cart']").removeAttr("disabled").trigger("click");
                       $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $thisbutton]);
                       $.magnificPopup.close();
                            
                        
                    },
                });

                return false;
            });


        },

        cross_sellModalCall: function() {

            $(document).on( "click", ".qcld_cross_sell_product_modal", function (e) {
                e.preventDefault();
                $("#qcld_cross_sell-product").html('');
                //Change button text
                var currentDom = $(this);
                var product_id = $(this).attr('data-p-id');

                $.magnificPopup.open({items: {src: '#qcld_cross_sell-product-modal'},type: 'inline'}, 0);


                var data = {
                    'action':'qcld_cross_sell_product_details',
                    'product_id':product_id,
                    'security': qcld_cross_sell_ajax_nonce
                };

                jQuery.post(qcld_ajaxurl, data, function (response) {

                    $("#qcld_cross_sell-product-modal").css({'width':'100vw','height':'100vh'});
                    $("#qcld_cross_sell-product").html(response);
                    $('.wc-variation-selection-needed').attr('disabled', 'disabled');
                    $('.qcld-express-quick-right [rel="tag"]').attr("href", "#");


                });


            });


        },

        cross_sellTooltipCall: function() {

            $(document).on('click', '.qcld-cross-sell-qty-increase', function (e) {
                e.preventDefault();
                var $input = $(this).parent().find('.qcld_cross_sell_qty');
                var val = parseInt($input.val());
                $input.val(val + 1).change();
            });

            $(document).on('click', '.qcld-cross-sell-qty-decrease', function (e) {
                e.preventDefault();
                var  $input = $(this).parent().find('.qcld_cross_sell_qty');
                var val = parseInt($input.val());
                if (val > 0) {
                    $input.val(val - 1).change();
                }
            });


        },

        cross_sellNotification: function() {

           



        },



    };

    $(document).ready(function() {
        qcld_cross_sell_custom_js.init();
    });





})(jQuery);