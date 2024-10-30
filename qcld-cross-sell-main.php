<?php
/*      
* Plugin Name: Increase Sales
* Plugin URI: https://wordpress.org/plugins/increase-sales
* Description: Increase Sales addon for WooCommerce
* Version: 1.2.4
* Author: QuantumCloud
* Author URI: https://www.quantumcloud.com/
* Requires at least: 4.6
* Tested up to: 6.4
* Text Domain: qcld-increase-sales
* License: GPL2
*/

defined('ABSPATH') or die("No direct script access!");


if ( ! defined( 'QCLD_cross_sell_PLUGIN_URL' ) ) {
    define('QCLD_cross_sell_PLUGIN_URL', plugin_dir_url(__FILE__));
}

if ( ! defined( 'QCLD_cross_sell_IMAGE_URL' ) ) {
    define('QCLD_cross_sell_IMAGE_URL', QCLD_cross_sell_PLUGIN_URL . "assets/images");
}

if ( ! defined( 'QC_cross_sell_REQUIRED_WOOCOMMERCE_VERSION' ) ) {
    define('QC_cross_sell_REQUIRED_WOOCOMMERCE_VERSION', 2.2);
}


require_once "inc/qcld-cross-sell-assets.php";
require_once "inc/qcld-cross-sell-add-to-cart.php";
require_once "inc/qcld-cross-sell-buy-for-me.php";
require_once "inc/qcld-cross-sell-admin-wrapper.php";
require_once "inc/qcld-cross-sell-ajax.php";
require_once "inc/qcld-cross-sell-admin-data-in.php";
require_once "inc/qcld-cross-sell-continue-shopping.php";
//require_once "inc/qcld-cross-sell-order-notification.php";
require_once("qc-support-promo-page/class-qc-support-promo-page.php");
require_once("conversion-tracker/class-qc-conversion-tracker.php");


//checking the woocommerce Plugin is activated or not then express shop will work.
Class QCLD_Cross_sell{

    private static $instance;

    public static function qcld_cross_sell_get_instance()
    {
        if (!self::$instance) {
            self::$instance = new self();
            self::$instance->qcld_cross_sell_init();
        }

    }


    public function qcld_cross_sell_init(){

        // Check if WooCommerce is active, and is required WooCommerce version.
        if (!class_exists('WooCommerce') || version_compare(get_option('woocommerce_db_version'), QC_cross_sell_REQUIRED_WOOCOMMERCE_VERSION, '<')) {
            add_action('admin_notices', array($this, 'qcld_cross_sell_woocommerce_inactive_notice'));
            return;
        }
    }


    /**
     * Display Notifications on specific criteria.
     *
     * @since    2.14
     */
    public static function qcld_cross_sell_woocommerce_inactive_notice()
    {
        if (current_user_can('activate_plugins')) :
            if (!class_exists('WooCommerce')) :
                deactivate_plugins(plugin_basename(__FILE__));

                ?>
                <div id="message" class="error">
                    <p>
                        <?php
                        printf(
                            __('%sQCLD Increase Sell for WooCommerce REQUIRES WooCommerce%s %sWooCommerce%s must be active for Increase Sell to work. Please install & activate WooCommerce.', 'qcld-increase-sales'),
                            '<strong>',
                            '</strong><br>',
                            '<a href="http://wordpress.org/extend/plugins/woocommerce/" target="_blank" >',
                            '</a>'
                        );
                        ?>
                    </p>
                </div>
                <?php
            elseif (version_compare(get_option('woocommerce_db_version'), QC_cross_sell_REQUIRED_WOOCOMMERCE_VERSION, '<')) :
                ?>
                <div id="message" class="error">
                    <p>
                        <?php
                        printf(
                            __('%sQCLD Increase Sell for WooCommerce is inactive%s This version of Increase Sell requires WooCommerce %s or newer. For more information about our WooCommerce version support %sclick here%s.', 'qcld-increase-sales'),
                            '<strong>',
                            '</strong><br>',
                            QC_cross_sell_REQUIRED_WOOCOMMERCE_VERSION
                        );
                        ?>
                    </p>
                    <div class="clear_both"></div>
                </div>
                <?php
            endif;
        endif;
    }
}


/**
 * Instantiate plugin.
 */

if (!function_exists('qcld_cross_sell_load')) {
    function qcld_cross_sell_load(){

        global $QCLD_Cross_sell;

        $QCLD_Cross_sell = QCLD_Cross_sell::qcld_cross_sell_get_instance();
    }
}
add_action('plugins_loaded', 'qcld_cross_sell_load');




/*****************************************************
 * Add  menu 
 ****************************************************/
if (!function_exists('qcld_cross_sell_add_sublavel_menu')) {
    function qcld_cross_sell_add_sublavel_menu(){


        add_menu_page(
            __('Increase Sales', 'qcld-increase-sales'),
            __('Increase Sales', 'qcld-increase-sales'),
            'manage_options',
            'qcld-increase-sales',
            'qcld_cross_sell_admin_setting_functions',
            'dashicons-cart',
            20
        );

    }
}
add_action('admin_menu', 'qcld_cross_sell_add_sublavel_menu');




/*************************************************************************
 * All Condition form here..
 ************************************************************************/
if (!function_exists('qcld_cross_sell_woocommerce_init')) {

    function qcld_cross_sell_woocommerce_init(){


        remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );

        // check Disable Cross Sell to load
        if(!empty(get_option('qcld_cross_sell_disable'))):

            if ( ((get_option('qcld_cross_sell_show_cart_page') == 1) && is_cart()) ):

                // disply product cart item loop
                if ( get_option('qcld_cross_sell_display_mode') == 'qcld_cart_item'):

                    add_filter( 'woocommerce_cart_item_name', 'filter_woocommerce_cart_item_name', 10, 3 );

                endif;

                // disply product before cart table
                if ( get_option('qcld_cross_sell_display_mode') == 'qcld_before_cart_table'):

                    add_action( 'woocommerce_before_cart_table', 'qcld_cross_sell_woocommerce_display_product');

                endif;

                // disply product after cart table
                if ( get_option('qcld_cross_sell_display_mode') == 'qcld_after_cart_table'):

                    add_action( 'woocommerce_after_cart_table', 'qcld_cross_sell_woocommerce_display_product');

                endif;

            endif;

        endif;


    }


}
add_action('template_redirect','qcld_cross_sell_woocommerce_init');




/*****************************************************
 * define the woocommerce_cart_item_name callback 
 ****************************************************/
function filter_woocommerce_cart_item_name( $product_get_name, $cart_item, $cart_item_key ) { 
    ob_start();
    $qcld_cart_item = $product_get_name;

    if ( ((get_option('qcld_cross_sell_show_cart_page') == 1) && is_cart()))  { 

                
        add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function( $size ) {
            return array(
                'width'     => 150,
                'height'    => 150,
                'crop'      => 0,
            );
        } );

        $thepostid = $cart_item['product_id'];
        $product_object = $thepostid ? wc_get_product( $thepostid ) : new WC_Product();
        $product_ids = $product_object->get_cross_sell_ids( 'edit' );
        // $product_ids = $product_object->get_cross_sell_ids( 'edit' );

        if(!empty($product_ids)):
            $qcld_cart_item .= '<div class="qcld_cross_sell_warpper">';

            if(!empty($product_ids)){
            $qcld_cart_item .= '<div class="qcld_cross_sell_wrap_text">'.esc_html(get_option('qcld_cross_sell_lang_wrap_title')).':</div>';            
            }

            if(get_option('qcld_cross_sell_product_details_display_mode') == 'modal'){
                $qcld_cart_item .= '<div id="qcld_cross_sell-product-modal" class="mfp-hide white-popup-block animated flipInX">
                    <div id="qcld_cross_sell-product">
                    </div>
                </div>';
            }


            foreach ( $product_ids as $product_id ) {
                $product = wc_get_product( $product_id );
                if ( is_object( $product ) ) {
               
                    $qcld_cart_item .= '<a href="#" class="qcld_cross_sell_product qcld_cross_sell_product_modal" data-p-id="'.esc_attr( $product->get_id() ).'"> '.$product->get_image('woocommerce_gallery_thumbnail');
                    $qcld_cart_item .='</a>';
                    
                }
            }

            $qcld_cart_item .= '</div>';
        endif;
    }

    return $qcld_cart_item;
    wp_die();

}
         



/*************************************************************************
 * Woocommerce display product before and after cart table
 ************************************************************************/

if ( ! function_exists( 'qcld_cross_sell_woocommerce_display_product' ) ) {


    function qcld_cross_sell_woocommerce_display_product() {

        // Get visible cross sells then sort them at random.
        $cross_sells = array_filter( array_map( 'wc_get_product', WC()->cart->get_cross_sells() ), 'wc_products_array_filter_visible' );

        

                
        add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function( $size ) {
            return array(
                'width'     => 150,
                'height'    => 150,
                'crop'      => 0,
            );
        } );


        $qcld_cart_item = '';


        if ( ((get_option('qcld_cross_sell_show_cart_page') == 1) && is_cart()) )  { 

        if(!empty($cross_sells)):
             $qcld_cart_item = '<div class="qcld_cross_sell_container">';
            $qcld_cart_item .= '<div class="qcld_cross_sell_warpper">';

            if(!empty($cross_sells)){
            $qcld_cart_item .= '<div class="qcld_cross_sell_wrap_text">'.esc_html(get_option('qcld_cross_sell_lang_wrap_title')).':</div>';            
            }

            if(get_option('qcld_cross_sell_product_details_display_mode') == 'modal'){
                $qcld_cart_item .= '<div id="qcld_cross_sell-product-modal" class="mfp-hide white-popup-block animated flipInX ">
                    <div id="qcld_cross_sell-product">
                    </div>
                </div>';
            }

            

            foreach ( $cross_sells as $product_id ) {
                $product = wc_get_product( $product_id );
                if ( is_object( $product ) ) {
                 
                    $qcld_cart_item .= '<a href="#" class="qcld_cross_sell_product qcld_cross_sell_product_modal" data-p-id="'.esc_attr( $product->get_id() ).'"> '.$product->get_image('woocommerce_gallery_thumbnail');
                    $qcld_cart_item .='</a>';
                 
                }
            }

            $qcld_cart_item .= '</div>';
            $qcld_cart_item .= '</div>';
        endif;
    }

    echo $qcld_cart_item; 
      
    }
}


/*************************************************************************
 * Active default option when plugin Active
 ************************************************************************/
register_activation_hook(__FILE__, 'qcld_cross_sell_insert_active_content');
if ( ! function_exists( 'qcld_cross_sell_insert_active_content' ) ) {
    function qcld_cross_sell_insert_active_content()
    {

        if ( current_user_can('manage_options') ) {


            if (get_option('qcld_cross_sell_disable') == '') {
                update_option('qcld_cross_sell_disable', 1);
            }
            if (get_option('qcld_cross_sell_show_cart_page') == '') {
                update_option('qcld_cross_sell_show_cart_page', 1);
            }

            if (get_option('qcld_cross_sell_display_mode') == '') {
                update_option('qcld_cross_sell_display_mode', 'qcld_cart_item');
            }
            if (get_option('qcld_cross_sell_product_details_display_mode') == '') {
                update_option('qcld_cross_sell_product_details_display_mode', 'modal');
            }
            if (get_option('qcld_cross_sell_lang_wrap_title') == '') {
                update_option('qcld_cross_sell_lang_wrap_title', 'You may also like');
            }
            if (get_option('qcld_cross_sell_lang_add_to_cart') == '') {
                update_option('qcld_cross_sell_lang_add_to_cart', 'Add to cart');
            }
            if (get_option('qcld_cross_sell_lang_out_of_stock') == '') {
                update_option('qcld_cross_sell_lang_out_of_stock', 'Out of Stock');
            }
            if (get_option('qcld_cross_sell_lang_continue_shopping') == '') {
                update_option('qcld_cross_sell_lang_continue_shopping', 'Continue Shopping');
            }
            if (get_option('qcld_cross_sell_lang_continue_shopping_text') == '') {
                update_option('qcld_cross_sell_lang_continue_shopping_text', 'Would you like some more goods?');
            }
            if (get_option('qcld_cross_sell_order_notification_min_ago') == '') {
                update_option('qcld_cross_sell_order_notification_min_ago', 'min ago');
            }

            add_option('qcld_cross_sell_plugin_do_activation_redirect', true);
            
        }


    }
}


// redirect when activation plugin...
add_action('admin_init', 'qcld_cross_sell_plugin_redirect');
if ( ! function_exists( 'qcld_cross_sell_plugin_redirect' ) ) {
    function qcld_cross_sell_plugin_redirect(){
        if(get_option('qcld_cross_sell_plugin_do_activation_redirect', false)){
            delete_option('qcld_cross_sell_plugin_do_activation_redirect');
            if(!isset($_GET['activate-multi'])){
                wp_redirect("admin.php?page=qcld-increase-sales");
            }
        }
    }
}