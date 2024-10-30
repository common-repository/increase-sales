 'use strict';
jQuery(document).ready(function () {

    if(jQuery('#qcld-cross-sell-message-purchased').length > 0) {
        var data = jQuery('#qcld-cross-sell-message-purchased').data();
        var notify = woo_notification;
        notify.loop = data.loop;
        notify.init_delay = data.initial_delay;
        notify.total = data.notification_per_page;
        notify.display_time = data.display_time;
        notify.next_time = data.next_time;
        notify.next_item = data.next_item;
        notify.init();

    }

    jQuery('#notify-close').on('click', function () {
        woo_notification.message_hide();
    });



});


var woo_notification = {
    loop: 0,
    init_delay: 5,
    total: 30,
    display_time: 5,
    next_time: 60,
    count: 0,
    intel: 0,
    next_item: 1,
    init: function () {
        setTimeout(function () {
            woo_notification.get_product();
        }, this.init_delay * 1000);
        if (this.loop) {
            this.intel = setInterval(function () {
                woo_notification.get_product();
            }, this.next_time * 1000);
        }
    },
    message_show: function () {
        var count = this.count++;
        if (this.total <= count) {
            window.clearInterval(this.intel);
            return;
        }
        var message_id = jQuery('#qcld-cross-sell-message-purchased');
        if (message_id.hasClass('fade-out')) {
            jQuery(message_id).removeClass('fade-out');
        }
        jQuery(message_id).addClass('fade-in').show();
        this.audio();
        setTimeout(function () {
            woo_notification.message_hide();
        }, this.display_time * 1000);
    },

    message_hide: function () {
        var message_id = jQuery('#qcld-cross-sell-message-purchased');
        if (message_id.hasClass('fade-in')) {
            jQuery(message_id).removeClass('fade-in');
        }
        jQuery('#qcld-cross-sell-message-purchased').addClass('fade-out');
    },
    get_product: function () {

        jQuery.ajax({
            type: 'POST',
            data: 'action=qcld_cross_sell_get_sold_products',
            url: qcldnotification_ajax_url,
            success: function (html) {
                var content = jQuery(html).children();
                jQuery("#qcld-cross-sell-message-purchased").html(content);
                woo_notification.message_show();
                jQuery('#notify-close').on('click', function () {
                    woo_notification.message_hide();
                });
            },
            error: function (html) {
            }
        })
    },
    close_notify: function () {
        jQuery('#notify-close').on('click', function () {
            woo_notification.message_hide();
        });
    },
    audio: function () {
        if (jQuery('#qcld-woocommerce-notification-audio').length > 0) {

            // qcld_audio.play();

            var promise = document.querySelector('#qcld-woocommerce-notification-audio').play();
            //console.log(promise)
            if (promise !== undefined) {
                promise.then(function (success) {
                    //success to play
                }).catch(function (error) {
                    //some error
                    
                });
            }

        }
    }
}