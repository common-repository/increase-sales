<?php

defined('ABSPATH') or die("No direct script access!");

/********************************************************
 * Loading the plugin specific style and js files.
 *******************************************************/
if (!function_exists('qcld_cross_sell_frontend_plugin_styles_scripts')) {
	function qcld_cross_sell_frontend_plugin_styles_scripts(){
		//if (is_cart() || is_checkout()) { 

		    //Styles
		    wp_enqueue_style('qcld-cross-sell-font-awesome', 		QCLD_cross_sell_PLUGIN_URL . 'assets/css/font-awesome.css');
		    wp_enqueue_style('qcld-cross-sell-animate-css', 		QCLD_cross_sell_PLUGIN_URL . 'assets/css/qcld-cross-sell-animate.css');
		    wp_enqueue_style('qcld-cross-sell-magnific-popup-css', 	QCLD_cross_sell_PLUGIN_URL . 'assets/css/qcld-cross-sell-magnific-popup.css');
		    wp_enqueue_style('qcld-cross-sell-lightslider-css', 	QCLD_cross_sell_PLUGIN_URL . 'assets/css/qcld-cross-sell-lightslider.css');
		    wp_enqueue_style('qcld-cross-sell-frontend-style',		QCLD_cross_sell_PLUGIN_URL . 'assets/css/qcld-cross-sell-frontend-style.css');

		    // add inline css form custom css ....
		    $add_inline_styles = get_option('qcld_cross_sell_custom_global_css');
	   		wp_add_inline_style( 'qcld-cross-sell-frontend-style', $add_inline_styles );


	   		// display settings css here...
	   		$add_inline_display_styles = '';

	   		if(!empty(get_option('qcld_cross_sell_color_title_font'))){
	   			$add_inline_display_styles .= '.qcld_cross_sell_wrap_text{color:'.esc_attr(get_option('qcld_cross_sell_color_title_font')).'}';
	   		}
	   		if(!empty(get_option('qcld_cross_sell_color_border'))){
	   			$add_inline_display_styles .= '.qcld_cross_sell_warpper a.qcld_cross_sell_product img{border: 1px solid'.esc_attr(get_option('qcld_cross_sell_color_border')).'}';
	   		}
	   		if(!empty(get_option('qcld_cross_sell_color_border_hover'))){
	   			$add_inline_display_styles .= '.qcld_cross_sell_warpper a.qcld_cross_sell_product:hover img{border: 1px solid'.esc_attr(get_option('qcld_cross_sell_color_border_hover')).'}';
	   		}

	   		$qcld_theme_name = wp_get_theme() ? wp_get_theme() : '';
	   		if($qcld_theme_name->get('Name') == 'Divi'){
	   			$add_inline_display_styles .= '.woocommerce-message .button.qcld_continue_shopping { background: #eee !important; }';
	   		}
	   		

	   		wp_add_inline_style( 'qcld-cross-sell-frontend-style', $add_inline_display_styles );

	   		
	    	//Scripts
	   		wp_enqueue_script('jquery');
		    wp_enqueue_script( 'wc-add-to-cart-variation' );
		    wp_enqueue_script('qcld-cross-sell-magnific-popup-js', 	QCLD_cross_sell_PLUGIN_URL .'assets/js/qcld-cross-sell-jquery.magnific-popup.min.js', array('jquery'));
		    wp_enqueue_script('qcld-cross-sell-firstclick-js', 		QCLD_cross_sell_PLUGIN_URL .'assets/js/qcld-cross-sell-firstclick.js', array('jquery'));
		    wp_enqueue_script('qcld-cross-sell-lightslider-js', 	QCLD_cross_sell_PLUGIN_URL .'assets/js/qcld-cross-sell-lightslider.js', array('jquery'));
		    wp_enqueue_script('qcld-cross-sell-slimscroll-js', 		QCLD_cross_sell_PLUGIN_URL .'assets/js/jquery.slimscroll.min.js', array('jquery'));
		    wp_enqueue_script('qcld-cross-sell-notification-js', 	QCLD_cross_sell_PLUGIN_URL .'assets/js/qcld-cross-sell-notification.js', array('jquery'));
		    wp_enqueue_script('qcld-cross-sell-custom-js', 			QCLD_cross_sell_PLUGIN_URL .'assets/js/qcld-cross-sell-custom.js', array('jquery','wc-add-to-cart-variation'));

		    wp_add_inline_script( 'qcld-cross-sell-custom-js', 'var qcld_ajaxurl = "' . admin_url('admin-ajax.php') . '";var qcld_cross_sell_ajax_nonce = "'.wp_create_nonce( 'qcld-increase-sales' ).'";' );

		//}

	}
}
add_action('wp_enqueue_scripts', 'qcld_cross_sell_frontend_plugin_styles_scripts');




/**********************************************************
 * Loading admin panel's requried Style & scripts
 **********************************************************/
if (!function_exists('qcld_cross_sell_load_admin_scripts')) {
	function qcld_cross_sell_load_admin_scripts(){

		if ((!empty($_GET["page"])) && ($_GET["page"] == "qcld-increase-sales")) {
			
		    //Styles
		    wp_enqueue_style( 'qcld_cross_sell_admin_light_css', 	QCLD_cross_sell_PLUGIN_URL . "assets/css/cross_sell-tabs.css");
		    wp_enqueue_style( 'qcld_cross_sell_bootstrap_css', 		QCLD_cross_sell_PLUGIN_URL . "assets/css/bootstrap.min.css");
		    wp_enqueue_style( 'qcld_cross_sell_admin_style_css', 	QCLD_cross_sell_PLUGIN_URL . "assets/css/admin-style.css");

		    wp_enqueue_style( 'qcld_cross_sell_support_fontawesome_css',   	QCLD_cross_sell_PLUGIN_URL . "qc-support-promo-page/css/font-awesome.min.css");
            wp_enqueue_style( 'qcld_cross_sell_support_style_css',      	QCLD_cross_sell_PLUGIN_URL . "qc-support-promo-page/css/style.css");
            wp_enqueue_style( 'qcld_cross_sell_support_responsive_css',    	QCLD_cross_sell_PLUGIN_URL . "qc-support-promo-page/css/responsive.css");      
		    
		    wp_enqueue_style( 'wp-color-picker' );

		    //Scripts
		    wp_enqueue_script( 'qcld_cross_sell_wp_color_picker', 	QCLD_cross_sell_PLUGIN_URL . 'assets/js/qcld-cross-sell-wp-color_picker.js', array( 'wp-color-picker' ), false, true );
		    wp_enqueue_script( 'qcld_cross_sell_admin_js', 			QCLD_cross_sell_PLUGIN_URL . "assets/js/qcld-cross-sell-admin.js", array('jquery'));

		    wp_add_inline_script( 'qcld_cross_sell_admin_js', 'var qcld_ajaxurl = "' . admin_url('admin-ajax.php') . '";var qcld_cross_sell_ajax_nonce = "'.wp_create_nonce( 'qcld-increase-sales' ).'";' );


		}
	}
}
add_action( 'admin_enqueue_scripts', 'qcld_cross_sell_load_admin_scripts');