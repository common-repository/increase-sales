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
                     * Continue add to cart single
                     **************************************/
                    
                    if (isset($_POST["qcld_cross_sell_add_to_cart_enable"]) && !empty($_POST["qcld_cross_sell_add_to_cart_enable"])) {
                        $qcld_cross_sell_add_to_cart_enable = $_POST["qcld_cross_sell_add_to_cart_enable"];
                        update_option('qcld_cross_sell_add_to_cart_enable', sanitize_text_field($qcld_cross_sell_add_to_cart_enable));
                    }else{
                        update_option('qcld_cross_sell_add_to_cart_enable', '');                
                    }

                    $qcld_cross_sell_add_to_cart_simple = isset($_POST["qcld_cross_sell_add_to_cart_simple"]) ? sanitize_text_field( $_POST["qcld_cross_sell_add_to_cart_simple"] ) : '';
                    update_option('qcld_cross_sell_add_to_cart_simple', $qcld_cross_sell_add_to_cart_simple );

                    $qcld_cross_sell_add_to_cart_external = isset($_POST["qcld_cross_sell_add_to_cart_external"]) ? sanitize_text_field( $_POST["qcld_cross_sell_add_to_cart_external"] ) : '';
                    update_option('qcld_cross_sell_add_to_cart_external', $qcld_cross_sell_add_to_cart_external );

                    $qcld_cross_sell_add_to_cart_variable = isset($_POST["qcld_cross_sell_add_to_cart_variable"]) ? sanitize_text_field( $_POST["qcld_cross_sell_add_to_cart_variable"] ) : '';
                    update_option('qcld_cross_sell_add_to_cart_variable', $qcld_cross_sell_add_to_cart_variable );

                    $qcld_cross_sell_add_to_cart_grouped = isset($_POST["qcld_cross_sell_add_to_cart_grouped"]) ? sanitize_text_field( $_POST["qcld_cross_sell_add_to_cart_grouped"] ) : '';
                    update_option('qcld_cross_sell_add_to_cart_grouped', $qcld_cross_sell_add_to_cart_grouped );

                    $qcld_cross_sell_add_to_cart_bookable = isset($_POST["qcld_cross_sell_add_to_cart_bookable"]) ? sanitize_text_field( $_POST["qcld_cross_sell_add_to_cart_bookable"] ) : '';
                    update_option('qcld_cross_sell_add_to_cart_bookable', $qcld_cross_sell_add_to_cart_bookable );

                    $qcld_cross_sell_add_to_cart_simple_single = isset($_POST["qcld_cross_sell_add_to_cart_simple_single"]) ? sanitize_text_field( $_POST["qcld_cross_sell_add_to_cart_simple_single"] ) : '';
                    update_option('qcld_cross_sell_add_to_cart_simple_single', $qcld_cross_sell_add_to_cart_simple_single );

                    $qcld_cross_sell_add_to_cart_external_single = isset($_POST["qcld_cross_sell_add_to_cart_external_single"]) ? sanitize_text_field( $_POST["qcld_cross_sell_add_to_cart_external_single"] ) : '';
                    update_option('qcld_cross_sell_add_to_cart_external_single', $qcld_cross_sell_add_to_cart_external_single );

                    $qcld_cross_sell_add_to_cart_variable_single = isset($_POST["qcld_cross_sell_add_to_cart_variable_single"]) ? sanitize_text_field( $_POST["qcld_cross_sell_add_to_cart_variable_single"] ) : '';
                    update_option('qcld_cross_sell_add_to_cart_variable_single', $qcld_cross_sell_add_to_cart_variable_single );

                    $qcld_cross_sell_add_to_cart_grouped_single = isset($_POST["qcld_cross_sell_add_to_cart_grouped_single"]) ? sanitize_text_field( $_POST["qcld_cross_sell_add_to_cart_grouped_single"] ) : '';
                    update_option('qcld_cross_sell_add_to_cart_grouped_single', $qcld_cross_sell_add_to_cart_grouped_single );




                    /**************************************
                     * Continue Buy For Me
                     **************************************/
                    
                    if (isset($_POST["qcld_cross_sell_buy_for_me_enable"]) && !empty($_POST["qcld_cross_sell_buy_for_me_enable"])) {
                        $qcld_cross_sell_buy_for_me_enable = $_POST["qcld_cross_sell_buy_for_me_enable"];
                        update_option('qcld_cross_sell_buy_for_me_enable', sanitize_text_field($qcld_cross_sell_buy_for_me_enable));
                    }else{
                        update_option('qcld_cross_sell_buy_for_me_enable', '');                
                    }
                    
                    if (isset($_POST["qcld_cross_sell_buy_for_me_show_site_head"]) && !empty($_POST["qcld_cross_sell_buy_for_me_show_site_head"])) {
                        $qcld_cross_sell_buy_for_me_show_site_head = $_POST["qcld_cross_sell_buy_for_me_show_site_head"];
                        update_option('qcld_cross_sell_buy_for_me_show_site_head', sanitize_text_field($qcld_cross_sell_buy_for_me_show_site_head));
                    }else{
                        update_option('qcld_cross_sell_buy_for_me_show_site_head', '');                
                    }
                    
                    if (isset($_POST["qcld_cross_sell_buy_for_me_shop_page"]) && !empty($_POST["qcld_cross_sell_buy_for_me_shop_page"])) {
                        $qcld_cross_sell_buy_for_me_shop_page = $_POST["qcld_cross_sell_buy_for_me_shop_page"];
                        update_option('qcld_cross_sell_buy_for_me_shop_page', sanitize_text_field($qcld_cross_sell_buy_for_me_shop_page));
                    }else{
                        update_option('qcld_cross_sell_buy_for_me_shop_page', '');                
                    }
                    
                    if (isset($_POST["qcld_cross_sell_buy_for_me_product_page"]) && !empty($_POST["qcld_cross_sell_buy_for_me_product_page"])) {
                        $qcld_cross_sell_buy_for_me_product_page = $_POST["qcld_cross_sell_buy_for_me_product_page"];
                        update_option('qcld_cross_sell_buy_for_me_product_page', sanitize_text_field($qcld_cross_sell_buy_for_me_product_page));
                    }else{
                        update_option('qcld_cross_sell_buy_for_me_product_page', '');                
                    }
                    
                    if (isset($_POST["qcld_cross_sell_buy_for_me_modal_window"]) && !empty($_POST["qcld_cross_sell_buy_for_me_modal_window"])) {
                        $qcld_cross_sell_buy_for_me_modal_window = $_POST["qcld_cross_sell_buy_for_me_modal_window"];
                        update_option('qcld_cross_sell_buy_for_me_modal_window', sanitize_text_field($qcld_cross_sell_buy_for_me_modal_window));
                    }else{
                        update_option('qcld_cross_sell_buy_for_me_modal_window', '');                
                    }
                    
                    if (isset($_POST["qcld_cross_sell_buy_for_me_color_enable"]) && !empty($_POST["qcld_cross_sell_buy_for_me_color_enable"])) {
                        $qcld_cross_sell_buy_for_me_color_enable = $_POST["qcld_cross_sell_buy_for_me_color_enable"];
                        update_option('qcld_cross_sell_buy_for_me_color_enable', sanitize_text_field($qcld_cross_sell_buy_for_me_color_enable));
                    }else{
                        update_option('qcld_cross_sell_buy_for_me_color_enable', '');                
                    }
                    
                    if (isset($_POST["qcld_cross_sell_buy_for_me_text_color"]) && !empty($_POST["qcld_cross_sell_buy_for_me_text_color"])) {
                        $qcld_cross_sell_buy_for_me_text_color = $_POST["qcld_cross_sell_buy_for_me_text_color"];
                        update_option('qcld_cross_sell_buy_for_me_text_color', sanitize_text_field($qcld_cross_sell_buy_for_me_text_color));
                    }else{
                        update_option('qcld_cross_sell_buy_for_me_text_color', '');                
                    }
                    
                    if (isset($_POST["qcld_cross_sell_buy_for_me_head_color"]) && !empty($_POST["qcld_cross_sell_buy_for_me_head_color"])) {
                        $qcld_cross_sell_buy_for_me_head_color = $_POST["qcld_cross_sell_buy_for_me_head_color"];
                        update_option('qcld_cross_sell_buy_for_me_head_color', sanitize_text_field($qcld_cross_sell_buy_for_me_head_color));
                    }else{
                        update_option('qcld_cross_sell_buy_for_me_head_color', '');                
                    }

                    
                    if (isset($_POST["qcld_cross_sell_buy_for_me_input_bg_color"]) && !empty($_POST["qcld_cross_sell_buy_for_me_input_bg_color"])) {
                        $qcld_cross_sell_buy_for_me_input_bg_color = $_POST["qcld_cross_sell_buy_for_me_input_bg_color"];
                        update_option('qcld_cross_sell_buy_for_me_input_bg_color', sanitize_text_field($qcld_cross_sell_buy_for_me_input_bg_color));
                    }else{
                        update_option('qcld_cross_sell_buy_for_me_input_bg_color', '');                
                    }

                    
                    if (isset($_POST["qcld_cross_sell_buy_for_me_input_text_color"]) && !empty($_POST["qcld_cross_sell_buy_for_me_input_text_color"])) {
                        $qcld_cross_sell_buy_for_me_input_text_color = $_POST["qcld_cross_sell_buy_for_me_input_text_color"];
                        update_option('qcld_cross_sell_buy_for_me_input_text_color', sanitize_text_field($qcld_cross_sell_buy_for_me_input_text_color));
                    }else{
                        update_option('qcld_cross_sell_buy_for_me_input_text_color', '');                
                    }


                    $qcld_cross_sell_buy_for_me_text = isset($_POST["qcld_cross_sell_buy_for_me_text"]) ? sanitize_text_field( $_POST["qcld_cross_sell_buy_for_me_text"] ) : '';
                    update_option('qcld_cross_sell_buy_for_me_text', $qcld_cross_sell_buy_for_me_text );

                    $qcld_cross_sell_lan_text_for_shop_now = isset($_POST["qcld_cross_sell_lan_text_for_shop_now"]) ? sanitize_text_field( $_POST["qcld_cross_sell_lan_text_for_shop_now"] ) : '';
                    update_option('qcld_cross_sell_lan_text_for_shop_now', $qcld_cross_sell_lan_text_for_shop_now );

                    $qcld_cross_sell_lan_text_for_message = isset($_POST["qcld_cross_sell_lan_text_for_message"]) ? sanitize_text_field( $_POST["qcld_cross_sell_lan_text_for_message"] ) : '';
                    update_option('qcld_cross_sell_lan_text_for_message', $qcld_cross_sell_lan_text_for_message );

                    $qcld_cross_sell_lan_text_for_email_subject = isset($_POST["qcld_cross_sell_lan_text_for_email_subject"]) ? sanitize_text_field( $_POST["qcld_cross_sell_lan_text_for_email_subject"] ) : '';
                    update_option('qcld_cross_sell_lan_text_for_email_subject', $qcld_cross_sell_lan_text_for_email_subject );

                    $qcld_cross_sell_lan_text_for_send_email = isset($_POST["qcld_cross_sell_lan_text_for_send_email"]) ? sanitize_text_field( $_POST["qcld_cross_sell_lan_text_for_send_email"] ) : '';
                    update_option('qcld_cross_sell_lan_text_for_send_email', $qcld_cross_sell_lan_text_for_send_email );

                    $qcld_cross_sell_lan_text_for_send_success = isset($_POST["qcld_cross_sell_lan_text_for_send_success"]) ? sanitize_text_field( $_POST["qcld_cross_sell_lan_text_for_send_success"] ) : '';
                    update_option('qcld_cross_sell_lan_text_for_send_success', $qcld_cross_sell_lan_text_for_send_success );



                    


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