<?php 

defined('ABSPATH') or die("No direct script access!");

// continue shopping section
add_action( 'woocommerce_before_cart_table', 'qcld_cross_sell_add_continue_shopping_button_to_cart' );
if ( ! function_exists( 'qcld_cross_sell_add_continue_shopping_button_to_cart' ) ) {
    function qcld_cross_sell_add_continue_shopping_button_to_cart() {

        if(get_option( 'qcld_cross_sell_continue_shopping' ) == 1){

            $home_url                   = site_url();
            $shop_page_url              = get_permalink( wc_get_page_id( 'shop' ) );
            $category_page_url          = $home_url;   
            $recent_product_url         = $home_url; 
            $continue_shopping_option   = get_option( 'qcld_cross_sell_continue_shopping_section_url' );
            $custom_link                = get_option( 'qcld_cross_sell_product_custom_link' );

            
            switch( $continue_shopping_option ):
            
            case 'home_page': // return home page url
                $redirect__url = $home_url;
            break;
            case 'shop_page': //return shop page url
                $redirect__url = $shop_page_url;
            break;
            case 'custom_link': // return custom url
                $redirect__url = $custom_link;
            break;
            default: // default return home page url
                $redirect__url = $home_url; 
            break;  
            endswitch;
            
         
            echo '<div class="woocommerce-message">';
                echo ' <a href="'.$redirect__url.'" class="button qcld_continue_shopping"> '.get_option( 'qcld_cross_sell_lang_continue_shopping' ).' →</a> '.get_option( 'qcld_cross_sell_lang_continue_shopping_text' );
            echo '</div>';


        }

    }

}