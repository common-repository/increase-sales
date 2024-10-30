<?php 

defined('ABSPATH') or die("No direct script access!");

/************************************************
 * Save Options
 ************************************************/
if (!function_exists('qcld_cross_sell_save_options')) {
    function qcld_cross_sell_save_options(){

        global $woocommerce;

        if ( current_user_can('manage_options') ) {


            if (isset($_POST['_wpnonce']) && $_POST['_wpnonce']) {


                wp_verify_nonce($_POST['_wpnonce'], 'qcld-increase-sales');


                /**************************************
                 * Check if the form is submitted or not
                 **************************************/
                if (isset($_POST['qcld_cross_sell_submit'])) {


                    /**************************************
                     * Custom requirement
                     **************************************/
                    if (isset($_POST["qcld_cross_sell_disable"]) && !empty($_POST["qcld_cross_sell_disable"])) {
                        $qcld_cross_sell_disable = $_POST["qcld_cross_sell_disable"];
                        update_option('qcld_cross_sell_disable', sanitize_text_field($qcld_cross_sell_disable));
                    }else{
                        update_option('qcld_cross_sell_disable', '');            	
                    }
                    
                    if (isset($_POST["qcld_cross_sell_show_cart_page"]) && !empty($_POST["qcld_cross_sell_show_cart_page"])) {
                        $qcld_cross_sell_show_cart_page = $_POST["qcld_cross_sell_show_cart_page"];
                        update_option('qcld_cross_sell_show_cart_page', sanitize_text_field($qcld_cross_sell_show_cart_page));
                    }else{
                        update_option('qcld_cross_sell_show_cart_page', '');            	
                    }

                    
                    if (isset($_POST["qcld_cross_sell_display_mode"]) && !empty($_POST["qcld_cross_sell_display_mode"])) {
                        $qcld_cross_sell_display_mode = $_POST["qcld_cross_sell_display_mode"];
                        update_option('qcld_cross_sell_display_mode', sanitize_text_field($qcld_cross_sell_display_mode));
                    }else{
                        update_option('qcld_cross_sell_display_mode', 'qcld_cart_item');                
                    }
                    
                    if (isset($_POST["qcld_cross_sell_product_details_display_mode"]) && !empty($_POST["qcld_cross_sell_product_details_display_mode"])) {
                        $qcld_cross_sell_product_details_display_mode = $_POST["qcld_cross_sell_product_details_display_mode"];
                        update_option('qcld_cross_sell_product_details_display_mode', sanitize_text_field($qcld_cross_sell_product_details_display_mode));
                    }else{
                        update_option('qcld_cross_sell_product_details_display_mode', 'modal');                
                    }


                    /**************************************
                     * Continue Shopping
                     **************************************/
                    if (isset($_POST["qcld_cross_sell_continue_shopping"]) && !empty($_POST["qcld_cross_sell_continue_shopping"])) {
                        $qcld_cross_sell_continue_shopping = $_POST["qcld_cross_sell_continue_shopping"];
                        update_option('qcld_cross_sell_continue_shopping', sanitize_text_field($qcld_cross_sell_continue_shopping));
                    }else{
                        update_option('qcld_cross_sell_continue_shopping', '');                
                    }

                    if (isset($_POST["qcld_cross_sell_continue_shopping_section_url"]) && !empty($_POST["qcld_cross_sell_continue_shopping_section_url"])) {
                        $qcld_cross_sell_continue_shopping_section_url = $_POST["qcld_cross_sell_continue_shopping_section_url"];
                        update_option('qcld_cross_sell_continue_shopping_section_url', sanitize_text_field($qcld_cross_sell_continue_shopping_section_url));
                    }else{
                        update_option('qcld_cross_sell_continue_shopping_section_url', '');                
                    }

                    if (isset($_POST["qcld_cross_sell_product_custom_link"]) && !empty($_POST["qcld_cross_sell_product_custom_link"])) {
                        $qcld_cross_sell_product_custom_link = $_POST["qcld_cross_sell_product_custom_link"];
                        update_option('qcld_cross_sell_product_custom_link', sanitize_text_field($qcld_cross_sell_product_custom_link));
                    }else{
                        update_option('qcld_cross_sell_product_custom_link', '');                
                    }


                    /**************************************
                     * Order Notification
                     **************************************/

                    if (isset($_POST["qcld_cross_sell_order_notification_enable"]) && !empty($_POST["qcld_cross_sell_order_notification_enable"])) {
                        $qcld_cross_sell_order_notification_enable = $_POST["qcld_cross_sell_order_notification_enable"];
                        update_option('qcld_cross_sell_order_notification_enable', sanitize_text_field($qcld_cross_sell_order_notification_enable));
                    }else{
                        update_option('qcld_cross_sell_order_notification_enable', '');                
                    }

                    if (isset($_POST["qcld_cross_sell_order_notification_disable_mobile"]) && !empty($_POST["qcld_cross_sell_order_notification_disable_mobile"])) {
                        $qcld_cross_sell_order_notification_disable_mobile = $_POST["qcld_cross_sell_order_notification_disable_mobile"];
                        update_option('qcld_cross_sell_order_notification_disable_mobile', sanitize_text_field($qcld_cross_sell_order_notification_disable_mobile));
                    }else{
                        update_option('qcld_cross_sell_order_notification_disable_mobile', '');                
                    }

                    if (isset($_POST["qcld_cross_sell_order_notification_sound"]) && !empty($_POST["qcld_cross_sell_order_notification_sound"])) {
                        $qcld_cross_sell_order_notification_sound = $_POST["qcld_cross_sell_order_notification_sound"];
                        update_option('qcld_cross_sell_order_notification_sound', sanitize_text_field($qcld_cross_sell_order_notification_sound));
                    }else{
                        update_option('qcld_cross_sell_order_notification_sound', '');                
                    }

                    if (isset($_POST["qcld_cross_sell_order_notification_global"]) && !empty($_POST["qcld_cross_sell_order_notification_global"])) {
                        $qcld_cross_sell_order_notification_global = $_POST["qcld_cross_sell_order_notification_global"];
                        update_option('qcld_cross_sell_order_notification_global', sanitize_text_field($qcld_cross_sell_order_notification_global));
                    }else{
                        update_option('qcld_cross_sell_order_notification_global', '');                
                    }

                    // artificial products

                    if (isset($_POST["qcld_cross_sell_order_fake_product"])) {
                        $qcld_cross_sell_order_fake_product = $_POST['qcld_cross_sell_order_fake_product'] ? $_POST['qcld_cross_sell_order_fake_product'] : '';
                        update_option('qcld_cross_sell_order_fake_product', serialize($qcld_cross_sell_order_fake_product));
                    }

                    if (isset($_POST["qcld_cross_sell_order_notification_customer_name"])) {
                        $qcld_cross_sell_order_notification_customer_name = $_POST['qcld_cross_sell_order_notification_customer_name'] ? $_POST['qcld_cross_sell_order_notification_customer_name'] : '';
                        update_option('qcld_cross_sell_order_notification_customer_name', serialize($qcld_cross_sell_order_notification_customer_name));
                    }

                    if (isset($_POST["qcld_cross_sell_order_notification_customer_address"])) {
                        $qcld_cross_sell_order_notification_customer_address = $_POST['qcld_cross_sell_order_notification_customer_address'] ? $_POST['qcld_cross_sell_order_notification_customer_address'] : '';
                        update_option('qcld_cross_sell_order_notification_customer_address', serialize($qcld_cross_sell_order_notification_customer_address));
                    }

                    if (isset($_POST["qcld_cross_sell_order_notification_fake_sale_duration"])) {
                        $qcld_cross_sell_order_notification_fake_sale_duration = $_POST['qcld_cross_sell_order_notification_fake_sale_duration'] ? $_POST['qcld_cross_sell_order_notification_fake_sale_duration'] : '';
                        update_option('qcld_cross_sell_order_notification_fake_sale_duration', serialize($qcld_cross_sell_order_notification_fake_sale_duration));
                    }


                    /**************************************
                     * Display Settings
                     **************************************/
                    if (isset($_POST["qcld_cross_sell_color_title_font"]) && !empty($_POST["qcld_cross_sell_color_title_font"])) {
                        $qcld_cross_sell_color_title_font = $_POST["qcld_cross_sell_color_title_font"];
                        update_option('qcld_cross_sell_color_title_font', sanitize_text_field($qcld_cross_sell_color_title_font));
                    }else{
                        update_option('qcld_cross_sell_color_title_font', '');                
                    }

                    if (isset($_POST["qcld_cross_sell_color_border"]) && !empty($_POST["qcld_cross_sell_color_border"])) {
                        $qcld_cross_sell_color_border = $_POST["qcld_cross_sell_color_border"];
                        update_option('qcld_cross_sell_color_border', sanitize_text_field($qcld_cross_sell_color_border));
                    }else{
                        update_option('qcld_cross_sell_color_border', '');                
                    }

                    if (isset($_POST["qcld_cross_sell_color_border_hover"]) && !empty($_POST["qcld_cross_sell_color_border_hover"])) {
                        $qcld_cross_sell_color_border_hover = $_POST["qcld_cross_sell_color_border_hover"];
                        update_option('qcld_cross_sell_color_border_hover', sanitize_text_field($qcld_cross_sell_color_border_hover));
                    }else{
                        update_option('qcld_cross_sell_color_border_hover', '');                
                    }



                    /**************************************
                     * Language center
                     **************************************/
                    if (isset($_POST["qcld_cross_sell_lang_wrap_title"])) {
                        $qcld_cross_sell_lang_wrap_title = $_POST["qcld_cross_sell_lang_wrap_title"];
                        update_option('qcld_cross_sell_lang_wrap_title', sanitize_text_field($qcld_cross_sell_lang_wrap_title));
                    }

                    if (isset($_POST["qcld_cross_sell_lang_add_to_cart"])) {
                        $qcld_cross_sell_lang_add_to_cart = $_POST["qcld_cross_sell_lang_add_to_cart"];
                        update_option('qcld_cross_sell_lang_add_to_cart', sanitize_text_field($qcld_cross_sell_lang_add_to_cart));
                    }

                    if (isset($_POST["qcld_cross_sell_lang_out_of_stock"])) {
                        $qcld_cross_sell_lang_out_of_stock = $_POST["qcld_cross_sell_lang_out_of_stock"];
                        update_option('qcld_cross_sell_lang_out_of_stock', sanitize_text_field($qcld_cross_sell_lang_out_of_stock));
                    }

                    if (isset($_POST["qcld_cross_sell_lang_continue_shopping"])) {
                        $qcld_cross_sell_lang_continue_shopping = $_POST["qcld_cross_sell_lang_continue_shopping"];
                        update_option('qcld_cross_sell_lang_continue_shopping', sanitize_text_field($qcld_cross_sell_lang_continue_shopping));
                    }

                    if (isset($_POST["qcld_cross_sell_lang_continue_shopping_text"])) {
                        $qcld_cross_sell_lang_continue_shopping_text = $_POST["qcld_cross_sell_lang_continue_shopping_text"];
                        update_option('qcld_cross_sell_lang_continue_shopping_text', sanitize_text_field($qcld_cross_sell_lang_continue_shopping_text));
                    }

                    if (isset($_POST["qcld_cross_sell_order_notification_min_ago"])) {
                        $qcld_cross_sell_order_notification_min_ago = $_POST["qcld_cross_sell_order_notification_min_ago"];
                        update_option('qcld_cross_sell_order_notification_min_ago', sanitize_text_field($qcld_cross_sell_order_notification_min_ago));
                    }


                    /**************************************
                     * Custom css to over write style
                     **************************************/
                    if (isset($_POST["qcld_cross_sell_custom_global_css"])) {
                        $qcld_cross_sell_custom_global_css = $_POST["qcld_cross_sell_custom_global_css"];
                        update_option('qcld_cross_sell_custom_global_css', sanitize_textarea_field($qcld_cross_sell_custom_global_css));
                    }



                }

            }

        }


    }
}
add_action('admin_init', 'qcld_cross_sell_save_options');


/*************************************************************************
 * Reset all option
 ************************************************************************/
add_action('wp_ajax_qcld_cross_sell_reset_all_options', 'qcld_cross_sell_reset_all_options');
add_action('wp_ajax_nopriv_qcld_cross_sell_reset_all_options', 'qcld_cross_sell_reset_all_options');
if (!function_exists('qcld_cross_sell_reset_all_options')) {
    function qcld_cross_sell_reset_all_options(){

        
        if ( current_user_can('manage_options') ) {

            check_ajax_referer( 'qcld-increase-sales', 'security');

            // Cross-sells Settings
            delete_option('qcld_cross_sell_disable');
            delete_option('qcld_cross_sell_show_cart_page');
            delete_option('qcld_cross_sell_display_mode');
            delete_option('qcld_cross_sell_product_details_display_mode');

            update_option('qcld_cross_sell_disable', 1);
            update_option('qcld_cross_sell_show_cart_page', 1);
            update_option('qcld_cross_sell_display_mode', 'qcld_cart_item');
            update_option('qcld_cross_sell_product_details_display_mode', 'modal');

            // Continue Shopping
            delete_option('qcld_cross_sell_continue_shopping');
            delete_option('qcld_cross_sell_continue_shopping_section_url');
            update_option('qcld_cross_sell_continue_shopping_section_url', 'shop_page');
            delete_option('qcld_cross_sell_product_custom_link');


            // Order Notification
            delete_option('qcld_cross_sell_order_notification_enable');
            delete_option('qcld_cross_sell_order_notification_disable_mobile');
            delete_option('qcld_cross_sell_order_notification_sound');
            delete_option('qcld_cross_sell_order_notification_global');
            update_option('qcld_cross_sell_order_notification_enable', '1');
            update_option('qcld_cross_sell_order_notification_disable_mobile', '1');
            update_option('qcld_cross_sell_order_notification_sound', '1');
            update_option('qcld_cross_sell_order_notification_global', '5');


            update_option('qcld_cross_sell_order_fake_product', '');
            update_option('qcld_cross_sell_order_notification_customer_name', '');
            update_option('qcld_cross_sell_order_notification_customer_address', '');
            update_option('qcld_cross_sell_order_notification_fake_sale_duration', '');


            // Display Settings
            delete_option('qcld_cross_sell_color_title_font');
            delete_option('qcld_cross_sell_color_border');
            delete_option('qcld_cross_sell_color_border_hover');

            // LANGUAGE CENTER
            delete_option('qcld_cross_sell_lang_wrap_title');
            delete_option('qcld_cross_sell_lang_add_to_cart');
            delete_option('qcld_cross_sell_lang_out_of_stock');
            delete_option('qcld_cross_sell_lang_continue_shopping');
            delete_option('qcld_cross_sell_lang_continue_shopping_text');
            delete_option('qcld_cross_sell_order_notification_min_ago');
            
            update_option('qcld_cross_sell_lang_wrap_title', 'You may also like' );
            update_option('qcld_cross_sell_lang_add_to_cart', 'Add to cart' );
            update_option('qcld_cross_sell_lang_out_of_stock', 'Out of Stock' );
            update_option('qcld_cross_sell_lang_continue_shopping', 'Continue Shopping' );
            update_option('qcld_cross_sell_lang_continue_shopping_text', 'Would you like some more goods?' );
            update_option('qcld_cross_sell_order_notification_min_ago', 'min ago' );

            // Custom Css
            delete_option('qcld_cross_sell_custom_global_css');

        }

       // wp_die();
    }
}