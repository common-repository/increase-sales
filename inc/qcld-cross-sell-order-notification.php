<?php 

defined('ABSPATH') or die("No direct script access!");


add_action('wp_footer', 'qcld_cross_sell_load_footer_html');
if (!function_exists('qcld_cross_sell_load_footer_html')) {
    function qcld_cross_sell_load_footer_html(){ 

	// if (is_cart() || is_checkout()) { 
    
	    $show_sales_alert = get_option('qcld_cross_sell_order_notification_enable');
	    if (!empty($show_sales_alert )) { ?>
	        <div id="qcld_cross_sell_notification">
	            <?php 
	            $qcld_cross_sell_order_notification_sound = get_option('qcld_cross_sell_order_notification_sound');
	            $qcld_cross_sell_order_notification_global = get_option('qcld_cross_sell_order_notification_global') ? get_option('qcld_cross_sell_order_notification_global') : 5;

	            if (empty($qcld_cross_sell_order_notification_sound )) { ?>
	                <audio id="qcld-woocommerce-notification-audio" src="<?php echo esc_url(QCLD_cross_sell_PLUGIN_URL); ?>assets/images/sell-notification.mp3" preload="none" type="audio">
	                   
	                </audio>
	            <?php } ?>
	            <div id="qcld-cross-sell-message-purchased" class="customized "  style="display: none;"
	                 data-next_item="2"
	                 data-loop="1"
	                 data-initial_delay="5"
	                 data-notification_per_page="30"
	                 data-display_time="<?php echo $qcld_cross_sell_order_notification_global; ?>"
	                 data-next_time="20">
		            <script type='text/javascript'>
		                var qcldnotification_ajax_url = "<?php echo get_site_url(); ?>/wp-admin/admin-ajax.php"
		            </script>
	                 	
	                 </div>

	                  
	          
	        </div>

	        <?php 

	        if (!empty(get_option('qcld_cross_sell_order_notification_disable_mobile'))) {

	            ?>
	            <style>
	                @media screen and (max-width: 640px) {
	                    #qcld_cross_sell_notification {
	                        display: none;
	                    }
	                }
	            </style>
	            <?php

	        } 


	    } 
    
   // } 


    } 
} 


add_action('wp_ajax_qcld_cross_sell_get_sold_products', 'qcld_cross_sell_get_sold_products');
add_action('wp_ajax_nopriv_qcld_cross_sell_get_sold_products', 'qcld_cross_sell_get_sold_products');
if (!function_exists('qcld_cross_sell_get_sold_products')) {
    function qcld_cross_sell_get_sold_products(){
        
        $from 													= get_option('user_from_title') ? get_option('user_from_title') : ' ';
        $from_purchased 										= get_option('user_purchased_a_title') ? get_option('user_purchased_a_title') : ' ';
        $qcld_cross_sell_order_fake_product 					= unserialize(get_option('qcld_cross_sell_order_fake_product'));
        $qcld_cross_sell_order_notification_customer_name 		= unserialize(get_option('qcld_cross_sell_order_notification_customer_name'));
        $qcld_cross_sell_order_notification_customer_address 	= unserialize(get_option('qcld_cross_sell_order_notification_customer_address'));
        $qcld_cross_sell_order_notification_fake_sale_duration  = unserialize( get_option('qcld_cross_sell_order_notification_fake_sale_duration'));

        $min = 10;
        $max = 60;
        $min_ago = get_option('qcld_cross_sell_order_notification_min_ago');

        $i = 0;
        foreach ($qcld_cross_sell_order_fake_product as $index => $artificial_sale) {
            $i++;

            $msgCount = count($qcld_cross_sell_order_fake_product);

            if ($i < $msgCount) {
                $next_item = $i;
            } else {
                $next_item = 1;
            }

            $html[$i] = '<div id="message-purchased" class="customized " style="display: none;"
                 data-next_item="' . ($i + 1) . '"
                 data-loop="1"
                 data-initial_delay="5"
                 data-notification_per_page="30"
                 data-display_time="' . $qcld_cross_sell_order_notification_fake_sale_duration[$index] . '"
                 data-next_time="20">' .  get_the_post_thumbnail($artificial_sale) . '<p><b>' . $qcld_cross_sell_order_notification_customer_name[$index] . '</b> ' . $from . ' ' . $qcld_cross_sell_order_notification_customer_address[$index] . ' ' . $from_purchased . ' ' . '  <a href="' . get_permalink($artificial_sale) . '">' . get_the_title($artificial_sale) . '</a>
                    <small>' . rand($min, $max) . ' '.$min_ago.' </small>
            	</p><span id="notify-close"></span>
                
            </div>';


        }

       	// var_dump($html);

        $itemNumber = rand( 1, $msgCount );
        $attributes = '';
        $real_sold_products = qcld_cross_sell_last_sold_product($attributes);
        if (!empty($real_sold_products)) {
            echo "real sell";
            echo $real_sold_products;
       		wp_die();
        	
        } else {
        	echo $html[$itemNumber];
       		wp_die();
        }

        // echo $msgCount;


    }
}

if (!function_exists('qcld_cross_sell_last_sold_product')) {
    function qcld_cross_sell_last_sold_product($attributes=null){

        global $wpdb, $woocommerce;
        $last_sold_product_title 	= get_option('last_sold_product_title') ? get_option('last_sold_product_title') : 'Recently Sold Products';
        $no_last_sold_product 		= get_option('no_last_sold_product') ? get_option('no_last_sold_product') : 'No recently sold products found.';
        $last_sold_from 			= get_option('last_sold_from') ? get_option('last_sold_from') : 'from';
        $last_sold_guest_from 		= get_option('last_sold_guest_from') ? get_option('last_sold_guest_from') : 'Guest from';
        $last_sold_just_purchased 	= get_option('last_sold_just_purchased') ? get_option('last_sold_just_purchased') : 'just purchased';
        $last_sold_purchased_a 		= get_option('last_sold_purchased_a') ? get_option('last_sold_purchased_a') : 'purchased a';
        $last_sold_time 			= get_option('last_sold_time') ? get_option('last_sold_time') : 'About 20 minutes  ago';


        $defaults = array('max_products' => 1, 'title' => esc_html($last_sold_product_title, 'qcld-increase-sales'));
        $parameters = shortcode_atts($defaults, $attributes);
        $max = absint(30);  // number of products to show
        $title = sanitize_text_field($parameters['title']);
        $html = '<div class="last_sold_product">' . PHP_EOL;

        $table = $wpdb->prefix . 'woocommerce_order_items';
        $my_query = $wpdb->prepare("SELECT * FROM $table WHERE `order_item_type`='line_item' ORDER BY `order_id` DESC LIMIT %d", $max);

        $nr_rows = $wpdb->query($my_query);
       
        
        if (!$nr_rows) {
            $html .= '<p>' . _e($no_last_sold_product, 'qcld-increase-sales') . '</p>';
        } else {
            $html .= PHP_EOL;
            for ($offset = 0; $offset < $nr_rows; $offset++) {
                if (is_user_logged_in()) {
                    $user_info = wp_get_current_user();
                }
                $row = $wpdb->get_row($my_query, OBJECT, $offset);
                $product_name = $row->order_item_name;

                $product = get_page_by_title($product_name, OBJECT, 'product');
               
                $product_id = isset( $product->ID ) ? $product->ID :'';
                $url = get_permalink( $product_id );
                $order_id = $row->order_id;
                $_SESSION['qcld_cross_sell_last_order_id'] = $order_id;
                $order = new WC_Order($order_id);
                $user = $order->get_user();
                $user_city = $order->shipping_city;

               

                if ($user) {
                    $user_id = $user->ID;
                } else {
                    $user_id = 'Guest';
                }

                if ($user_info->ID == $user_id) {
                    $unix_date = strtotime($order->order_date);
                    $date = date('d/m/y', $unix_date);

                    $html .= '<strong>' . $user->data->display_name . '</strong>' . ' ' . $last_sold_from . ' ' . $user_city . ' ' . $last_sold_just_purchased . '  ' . '<a href="' . $url . '">' . $product_name . '</a> ' . PHP_EOL;

                }else{

                    $unix_date = strtotime($order->order_date);
                    $date = date('d/m/y', $unix_date);
                    $html .= '<strong>' . $order->get_billing_first_name() . ' ' . $order->get_billing_last_name() . '</strong>' . ' ' . $last_sold_from . ' ' . $user_city . ' ' . $last_sold_just_purchased . '  ' . '<a href="' . $url . '">' . $product_name . '</a> ' . PHP_EOL;


                    $html .= '<div id="message-purchased" class="customized " style="display: none;"
    						data-next_item="1"
    						data-loop="1"
    						data-initial_delay="5"
    						data-notification_per_page="30"
    						data-display_time="10"
    						data-next_time="25"
    						>' . get_the_post_thumbnail($product->ID) . '<p>' . $last_sold_guest_from . ' ' . $user_city . ' ' . $last_sold_purchased_a . ' <a href="' . get_permalink($product->ID) . '">' . $product_name . '</a>
    		 				<small>' . $last_sold_time . '</small>
    						</p><span id="notify-close"></span>
    			
    						</div>';

                }
            }
            
        }
       

        if ($_SESSION['qcld_cross_sell_last_order_id'] == $order_id) {
            return false;
        } else {
            return $html;
        }


    }
}