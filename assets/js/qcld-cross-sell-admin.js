
(function($) {
    "use strict";

    $(document).ready(function() {

        $('.cross-sell-bg-color').wpColorPicker();

		// Show the first tab by default
		$('.cross_sell-content-wrap div.cross_sell-contents').hide();
		$('.cross_sell-content-wrap div.cross_sell-contents:first').show();
		$('.cross_sell-tabs-nav li:first').addClass('cross_sell-tab-active');

		// Change tab class and display content
		$('.cross_sell-tabs-nav a').on('click', function(event){
		  event.preventDefault();
		  $('.cross_sell-tabs-nav li').removeClass('cross_sell-tab-active');
		  $(this).parent().addClass('cross_sell-tab-active');
		  $('.cross_sell-content-wrap div.cross_sell-contents').hide();
		  $($(this).attr('href')).show();
		});

		// Reset Plugin info....
		$('#cross_sell-reset-options-default').on('click',function () {
            var returnDefualt = confirm("Are you sure you want to reset all options to Default? Resetting Will Delete All Saved Settings, Custom Messages, Languages etc.");
            if (returnDefualt == true) {
                var data = {
                    'action': 'qcld_cross_sell_reset_all_options',
                    'security': qcld_cross_sell_ajax_nonce
                };
                jQuery.post(qcld_ajaxurl, data, function (response) {
                    window.location.reload();
                });
            }
        });


        $(document).on("click", ".add-more-block-inner-set", function() {
		    var single = $(this).parent().parent().parent().parent().parent().find('.cross_sell-artificial-sell-pro')[0];
		    var template = $(this).parent().parent().parent().parent().parent().find('.cross_sell-artificial-sell-pro');
		    
		    var klon = $(single).clone();
		    klon.find('#qcld_cross_sell_order_notification_customer_name').val('');
		    klon.find('textarea').val('');
		    klon.find(".cross_sell-artificial-sell-pros").append('<div class="col-xs-12 text-right"><button type="button" class="btn btn-danger btn-xs qcld-remove-item"><i class="fa fa-times" aria-hidden="true"></i> Remove </button></div>');
		    template.last().after(klon);
		    
		});

		// Remove table row
		$(document).on("click", ".qcld-remove-item", function() {
		    var template = $(this).parent().parent().parent().parent().parent().find('.cross_sell-artificial-sell-pro');

		    if(template.length > 1){
		    	if(confirm('Are you sure to delete order notification block?')){
                   //$(this).parent().parent().remove();
		      		$(this).closest(".cross_sell-artificial-sell-pro").remove();
                }
		    }

		});





	});



})(jQuery);