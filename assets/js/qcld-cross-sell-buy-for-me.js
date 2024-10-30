jQuery( document ).ready( function( $ ) {
	
	"use strict";
	
	/* Color Schemes */
	var qcld_cross_sell_color_schemes = [
	
		{ name: 'default', bg: '#76b9bb', fg: '#FFFFFF', message: '#999999', text: '#3c2313', button_text: '#3c2313', button_bg: '#dedacc' },
		{ name: 'lollipop', bg: '#dba5c6', fg: '#FFFFFF', message: '#999999', text: '#bd448e', button_text: '#FFFFFF', button_bg: '#c2c2c2' },
		{ name: 'macaron', bg: '#f9b9ad', fg: '#FFFFFF', message: '#a26256', text: '#999999', button_text: '#FFFFFF', button_bg: '#b64646' },
		{ name: 'blueberry', bg: '#8f8ead', fg: '#FFFFFF', message: '#262d70', text: '#6a556d', button_text: '#FFFFFF', button_bg: '#a97baf' },
		{ name: 'forest', bg: '#003333', fg: '#81aaaa', message: '#FFFFFF', text: '#FFFFFF', button_text: '#716f36', button_bg: '#d2d1b9' },
		{ name: 'dark', bg: '#999999', fg: '#333333', message: '#FFFFFF', text: '#c7c7c7', button_text: '#999999', button_bg: '#1c1c1c' },
		{ name: 'lemonade', bg: '#f5e4b2', fg: '#FFFFFF', message: '#b89b45', text: '#b89b45', button_text: '#65924a', button_bg: '#c4eaad' },
		{ name: 'sailor', bg: '#9c0e0e', fg: '#FFFFFF', message: '#555555', text: '#777777', button_text: '#FFFFFF', button_bg: '#212d64' },
		{ name: 'gold', bg: '#ac8051', fg: '#FFFFFF', message: '#caa976', text: '#925e26', button_text: '#FFFFFF', button_bg: '#3c2313' },
	
	];
	/* */
	
	var qcld_cross_sell_boo = false;
	var qcld_cross_sell_scheme_changed = new Boolean( false );
	
	/* Buy For Me Button Actions */
	function qcld_cross_sell_set_button() {
	
		$( '.qcld_cross_sell-buy-for-me' ).unbind().click( function( e ) {
			
			e.preventDefault();
	
			$( '.qcld_cross_sell-message' ).hide();
			$( '.qcld_cross_sell-container' ).show();
			$( '#qcld_cross_sell-buy-for-me' ).addClass( 'open' );		
			$( '#qcld_cross_sell-product-id' ).val( $( this ).attr( 'data_product_id' ) );		
			$( '#qcld_cross_sell-product-url-front a img' ).attr( 'src', $( this ).attr( 'data_product_src' ) );		
			$( '#qcld_cross_sell-product-url-front a' ).attr( 'href', $( this ).attr( 'data_product_url' ) );		
			$( '#qcld_cross_sell-button-text-front-a' ).attr( 'href', $( this ).attr( 'data_product_url' ) );		
			$( '#qcld_cross_sell-title-text-front' ).html( $( this ).attr( 'data_product_title' ) );		
			$( '#qcld_cross_sell-price-text-front' ).html( $( this ).attr( 'data_product_price' ) );

			qcld_cross_sell_opening_price_color();
			qcld_cross_sell_cws();
			
		} );
	
	}
	
	qcld_cross_sell_set_button();
	
	if ( $( '#qcld_cross_sell_button_repeat' ).text() ) {
		
		setInterval( qcld_cross_sell_set_button, 1000 );
		
	}
	/* */

	/* Overlay Actions */
	$( '.qcld_cross_sell-qcld_cross_sell-overlay, .qcld_cross_sell-close' ).click( function() {
	
		$( '#qcld_cross_sell-buy-for-me' ).removeClass( 'open' );
		qcld_cross_sell_boo = false;
		
	} );
	/* */
	
	/* E-mail Preview Actions */
	$( '#qcld_cross_sell-your-message' ).keyup( function( event ) {
		
		if ( event.which == 13 ) {	  
			// Disable ENTER key
			event.preventDefault();
		}
	
		$( '#qcld_cross_sell-your-message-front' ).html( $( this ).val() );
	  
	} );
	
	$( '#qcld_cross_sell-button-text' ).keyup( function( event ) {
		
		if ( event.which == 13 ) {  
			// Disable ENTER key
			event.preventDefault();	 
		}
	
		$( '#qcld_cross_sell-button-text-front-a' ).html( $( this ).val() );
		
		if ( $( this ).val() == '' ){
			
			$( '#qcld_cross_sell-button-text-front' ).hide();
			
		} else {
			
			$( '#qcld_cross_sell-button-text-front' ).show();
			
		}
	  
	} );
	
	$( '#qcld_cross_sell-hide-price' ).click( function() {
		
		$( '#qcld_cross_sell-price-text-front' ).toggle( !this.checked );
		
	} );
				
	$( '#qcld_cross_sell-color-scheme' ).on( 'change', function() {
		
		var currentScheme = $( this ).val();
		
		for ( var i = 0; i < qcld_cross_sell_color_schemes.length; i++ ) {
		
			if ( qcld_cross_sell_color_schemes[i].name == currentScheme  ) {
				
				$( '#qcld_cross_sell-bg-front' ).css( 'background-color', qcld_cross_sell_color_schemes[i].bg );
				$( '#qcld_cross_sell-fg-front' ).css( 'background-color', qcld_cross_sell_color_schemes[i].fg );
				$( '#qcld_cross_sell-your-message-front' ).css( 'color', qcld_cross_sell_color_schemes[i].message );
				$( '#qcld_cross_sell-product-text-front span, #qcld_cross_sell-price-text-front ins, #qcld_cross_sell-price-text-front span.amount, .qcld_cross_sell-site-wrap' ).attr( 'style', 'color: ' + qcld_cross_sell_color_schemes[i].text + '!important' );
				$( '#qcld_cross_sell-button-text-front-a' ).css( 'color', qcld_cross_sell_color_schemes[i].button_text );
				$( '#qcld_cross_sell-button-text-front-bg' ).css( 'background-color', qcld_cross_sell_color_schemes[i].button_bg );				
				break;
				
			}
			
		}
		
		qcld_cross_sell_scheme_changed = true;
	  
	} );
	
	function qcld_cross_sell_opening_price_color() {
		
		if ( $( '#qcld_cross_sell-color-scheme' ).attr( 'data-scheme' ) == 'custom' ) {

			$( '#qcld_cross_sell-product-text-front span, #qcld_cross_sell-price-text-front ins, #qcld_cross_sell-price-text-front span.amount, .qcld_cross_sell-site-wrap' ).attr( 'style', 'color: ' + $( '#qcld_cross_sell-color-scheme' ).attr( 'data-text-color' ) + '!important' );	
			
		} else {
			
			var currentScheme = '';
			
			if ( $( '#qcld_cross_sell-color-scheme' ).attr( 'data-scheme' ) == 'disabled' ) {
				
				currentScheme = $( '#qcld_cross_sell-color-scheme' ).val();
				
			} else {
				
				if ( qcld_cross_sell_scheme_changed == true ) { currentScheme = $( '#qcld_cross_sell-color-scheme' ).val(); } else { currentScheme = $( '#qcld_cross_sell-color-scheme' ).attr( 'data-scheme' ); }
			
			}
								
			for ( var i = 0; i < qcld_cross_sell_color_schemes.length; i++ ) {
			
				if ( qcld_cross_sell_color_schemes[i].name == currentScheme  ) {
				
					$( '#qcld_cross_sell-product-text-front span, #qcld_cross_sell-price-text-front ins, #qcld_cross_sell-price-text-front span.amount, .qcld_cross_sell-site-wrap' ).attr( 'style', 'color: ' + qcld_cross_sell_color_schemes[i].text + '!important' );	
					break;
					
				}
				
			}
		
		}
				
	}
	/* */
		
	/* Return Message */
	$( '.qcld_cross_sell-message' ).hide();
	
	// if ( $( '#qcld_cross_sell_return' ).text() ) {
	
	// 	qcld_cross_sell_prepareMessage();
	// 	$( '.qcld_cross_sell-message' ).text( $( '#qcld_cross_sell_return' ).text() );
	
	// }




    $(document).on("click", "#qcld_cross_sell-submit", function(e) {
    	e.preventDefault();
    	var $this 			= $(this);
    	var your_name 		= $('#qcld_cross_sell-your-name').val();
    	var your_email 		= $('#qcld_cross_sell-your-email').val();
    	var receiver_name 	= $('#qcld_cross_sell-receiver-name').val();
    	var receiver_email 	= $('#qcld_cross_sell-receiver-email').val();
    	var email_subject 	= $('#qcld_cross_sell-email-subject').val();
    	var product_html 	= $('.qcld_cross_sell-bg-front-wrap').html();
    	var product_id 	    = $('.qcld_cross_sell-buy-for-me').html();

    	if( your_name == '' || your_email == ''  || receiver_name == ''  || receiver_email == ''  || email_subject == ''  ){
    		alert('Please Fillup Required Field');
    		return false;
    	}

    	$this.addClass('spinning');
    	$this.prop('disabled', true);

    	var data = {
            'action'		: 'qcld_increase_sales_buy_for_me_send_message',
            'product_id'	: product_id,
            'your_name'		: your_name,
            'your_email'	: your_email,
            'receiver_name'	: receiver_name,
            'receiver_email': receiver_email,
            'email_subject'	: email_subject,
            'product_html'	: product_html,
            'security'		: qcld_buy_for_me_ajax_nonce
        };
        jQuery.post(qcld_buy_for_me_ajaxurl, data, function (response) {

	   		//console.log(response)

    		$this.prop('disabled', false );
	   		$this.removeClass('spinning');
			qcld_cross_sell_prepareMessage();
			$( '.qcld_cross_sell-message' ).text( response.message );

        });
	    
	});
	
	function qcld_cross_sell_prepareMessage() {
		
		$( '.qcld_cross_sell-message' ).show();
		$( '.qcld_cross_sell-container' ).hide();
		$( '#qcld_cross_sell-buy-for-me' ).addClass( 'open' );
		
	}
	/* */
	
	/* Check Window Size */
	function qcld_cross_sell_cws() {
		
		qcld_cross_sell_boo = true;
		
		if ( $( window ).height() < 670 || $( window ).width() < 968 ) {
			
			qcld_cross_sell_sct();
			
		}
		
	}
	/* */
	
	/* Scroll to Top */
	function qcld_cross_sell_sct() {
		
		$( 'html, body' ).animate( { scrollTop: 0 }, 500 );
		return false;
		
	}
	/* */	

} );