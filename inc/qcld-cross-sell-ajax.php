<?php 

defined('ABSPATH') or die("No direct script access!");



/*****************************************************
 * Single Product Add To Cart
 ****************************************************/
add_action('wp_ajax_qcld_woo_cross_sell_sp_add_to_cart', 'qcld_woo_cross_sell_sp_add_to_cart');
add_action('wp_ajax_nopriv_qcld_woo_cross_sell_sp_add_to_cart', 'qcld_woo_cross_sell_sp_add_to_cart');
if (!function_exists('qcld_woo_cross_sell_sp_add_to_cart')) {
    function qcld_woo_cross_sell_sp_add_to_cart(){

        check_ajax_referer( 'qcld-increase-sales', 'security');

        $product_id = apply_filters( 'woocommerce_add_to_cart_product_id', absint( sanitize_text_field($_POST['p_id'] )) );

        $product_quantity = empty( sanitize_text_field($_POST['quantity']) ) ? 1 : apply_filters( 'woocommerce_stock_amount', sanitize_text_field($_POST['quantity']) );

        global $woocommerce;
        $result = $woocommerce->cart->add_to_cart($product_id,$product_quantity);
        if ($result != false) {
            echo wp_send_json('simple');
        } else {
            echo wp_send_json('error');
        }
        wp_die();

    }
}

add_action( 'qcld_cross_sell_product_variations', 'woocommerce_template_single_add_to_cart');




/*****************************************************
 * Product details
 ****************************************************/
add_action('wp_ajax_qcld_cross_sell_product_details', 'qcld_cross_sell_product_details');
add_action('wp_ajax_nopriv_qcld_cross_sell_product_details', 'qcld_cross_sell_product_details');
if (!function_exists('qcld_cross_sell_product_details')) {
    function qcld_cross_sell_product_details(){
       // $product_id=$_POST['product_id'];

        check_ajax_referer( 'qcld-increase-sales', 'security');
       
        $p_id = trim(sanitize_text_field($_POST['product_id']));
        $inStock = "<strong>InStock</strong>";
        //Woocommerce product factory
        $wc_pf = new WC_Product_Factory();
        $product = $wc_pf->get_product($p_id);
        //Getting product variation number based details
        if(is_object($product)):

        $qcld_thumb = wp_get_attachment_image_src(get_post_thumbnail_id($p_id), 'shop_thumbnail');
        $qcld_large = wp_get_attachment_image_src( get_post_thumbnail_id( $p_id ), 'single-post-thumbnail' );

        if (!empty($qcld_thumb)) {
                $image = $qcld_thumb;
                $image_large =$qcld_large;
        } else {
            $image[0] = QCLD_cross_sell_IMAGE_URL . '/placeholder.png';
            $image_large[0]=QCLD_cross_sell_IMAGE_URL.'/placeholder.png';
        }
        
        ob_start();
       ?>

            <div class="qcld_cross_sell-product-details">
                <div class="qcld-cross-sell-quick-left">
                
                    <div class="qcld-cross-sell-product-img">
                        <div class="clearfix" style="max-width:100%">
                            <img  src="<?php echo $image_large[0]; ?>" alt="<?php echo get_the_title($p_id); ?>" />
                        </div>
                    </div>
                 
                </div>
                <div class="qcld-cross-sell-quick-right">

                    <h2 id='qcld_cross_sell_product_title' ><?php echo $product->get_title(); ?></h2>
                    <?php
                    
                    $rating_count = $product->get_rating_count();
      
                    if ($average = $product->get_average_rating()) :
                        ?>
                    <ul class="woocommerce"><li>
                        <div class="star-rating" title="<?php echo sprintf(__( 'Rated %s out of 5', 'woocommerce' ), $average); ?>"><span style="width:<?php echo ( ( $average / 5 ) * 100 ); ?>%"><strong itemprop="ratingValue" class="rating"><?php echo $average; ?></strong><?php echo __( 'out of 5', 'woocommerce' ); ?></span></div>
                </li></ul>
                <?php  endif; ?>
                <p class="qcld-express-popup-price" id="qcld_express_vp_price"><?php echo $product->get_price_html(); ?></p>
                <div class="woocommerce-product-details__short-description">
                    <p><?php echo strip_tags(get_the_excerpt($p_id)); ?></p>
                </div>

                <?php 

                $stock = get_post_meta( $p_id, '_stock', true );
                $stock_status = get_post_meta( $p_id, '_stock_status', true );

                if( ($stock > 0 || $stock == '')  && $stock_status == "instock" ){

            
                    if($product->get_type()=='variable' ){

                       // natsort($values);


                        global $woocommerce;

                        $suffix      = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

                       

                        global $post;
                        if(intval($p_id)) {

                           wp('p=' . $p_id . '&post_type=product');
                           
                            while (have_posts()) : the_post();
                            ?>
                                <script>
                                    var wc_add_to_cart_variation_params = {"ajax_url": "\/wp-admin\/admin-ajax.php"};
                                    jQuery.getScript("<?php echo $woocommerce->plugin_url(); ?>/assets/js/frontend/add-to-cart-variation.min.js");

                                </script>
                                <div class="qcld-cross-sell-product-variation-container">


                                     <div class="product">

                                        <div id="product-<?php the_ID(); ?>" <?php post_class('product'); ?>>
                                            <?php 
                                                do_action('qcld_cross_sell_product_variations'); 
                                            ?>



                                        </div>
                                    </div>
                                </div>

                         <?php

                            endwhile;
                        }

                   
            
                }else{

                    $stock = get_post_meta( get_the_ID(), '_stock', true );
                    $stock_status = get_post_meta( get_the_ID(), '_stock_status', true );

                        ?>
                    <div class="qcld-express-carts-sec">

                        <div class="qcld-cross-sell-quantity">
                            <button class="qcld-cross-sell-qty-decrease" type="button">-</button>
                            <input type="text" value="1" step="1" min="1" max="" id="qcld_quantity_value" name="qcld_quantity" class="qcld_cross_sell_qty" size="4">
                            <button class="qcld-cross-sell-qty-increase" type="button">+</button>
                        </div>
                        <a  class="qcld_cross_sell_s_p_add_to_cart qcld_cross_sell_button"  p-id="<?php echo $p_id; ?>" ><?php echo esc_html(get_option('qcld_cross_sell_lang_add_to_cart') != '' ? get_option('qcld_cross_sell_lang_add_to_cart') : 'Add to cart'); ?></a></div>
                    <?php

                }

            }else{
                ?>
                    <p class="qcld-express-out-of-stock"> <?php echo esc_html(get_option('qcld_cross_sell_lang_out_of_stock') != '' ? get_option('qcld_cross_sell_lang_out_of_stock') : 'Out of Stock'); ?><p>
                <?php
            }

                if($product->get_sku() != ''){
                    ?>
                    <div class="product_meta">
                        <span class="posted_in"><p class="qcld-express-popup-sku"> SKU : <?php echo $product->get_sku(); ?></p></span>
                    </div>

                <?php } ?>
                </div></div>
                <?php

        endif;

        echo  ob_get_clean();
        exit();

    }
}




/*****************************************************
 * single product ajax add to cart actions
 ****************************************************/
add_action('wp_ajax_qcld_cross_sell_single_ajax_add_to_cart', 'qcld_cross_sell_single_ajax_add_to_cart');
add_action('wp_ajax_nopriv_qcld_cross_sell_single_ajax_add_to_cart', 'qcld_cross_sell_single_ajax_add_to_cart');

// single product ajax add to cart actions
if (!function_exists('qcld_cross_sell_single_ajax_add_to_cart')) {
    function qcld_cross_sell_single_ajax_add_to_cart(){

        $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint(sanitize_text_field($_POST['product_id'])));
        $quantity = empty(sanitize_text_field($_POST['quantity'])) ? 1 : wc_stock_amount(sanitize_text_field($_POST['quantity']));
        $variation_id = absint(sanitize_text_field($_POST['variation_id']));
        $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
        $product_status = get_post_status($product_id);

        if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {

            do_action('woocommerce_ajax_added_to_cart', $product_id);

            if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
                wc_add_to_cart_message(array($product_id => $quantity), true);
            }

            WC_AJAX :: get_refreshed_fragments();
        } else {

            $data = array(
                'error' => true,
                'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));

            echo wp_send_json($data);
        }

        wp_die();
        
    }
    
}