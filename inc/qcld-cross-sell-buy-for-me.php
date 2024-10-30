<?php 

defined('ABSPATH') or die("No direct script access!");

$qcld_cross_sell_buy_for_me_enable = get_option('qcld_cross_sell_buy_for_me_enable');
if( isset( $qcld_cross_sell_buy_for_me_enable ) && ( $qcld_cross_sell_buy_for_me_enable == 1 ) ){

	add_action( 'woocommerce_after_add_to_cart_button', 'qcld_increase_sales_buy_for_me_button' );
	add_action( 'wp_footer', 'qcld_increase_sales_buy_for_me_modal_html' );

}


/*****************************************************
 * Increase sales by for me button
 ****************************************************/
if (!function_exists('qcld_increase_sales_buy_for_me_button')) {
	function qcld_increase_sales_buy_for_me_button () {

		global $product;

		if (!isset ($product) || !is_object ($product))
			return '';

		$product_id     = $product->get_id();

		$product_type 	= $product->get_type();

		$button_text 	= esc_attr (get_option ('qcld_cross_sell_buy_for_me_text', __('Buy product', 'woocommerce')));

		$get_image_url 	= wp_get_attachment_url( $product->get_image_id() );

		$get_pro_url 	= get_permalink( $product_id );

		$html =  '<a href="#" class="button qcld_cross_sell-buy-for-me" data_product_id="'. esc_attr( $product_id ).'"  data_product_url="'. esc_attr( $get_pro_url ).'"  data_product_src="'. esc_attr( $get_image_url ).'" data_product_title="'. esc_attr( $product->get_name() ).'" data_product_price="'. esc_attr( $product->get_price_html() ).'">'.esc_html( $button_text ).'</a>';

		echo  $html;

	}
}


/*****************************************************
 * Increase sales by for me modal
 ****************************************************/
if (!function_exists('qcld_increase_sales_buy_for_me_modal_html')) {
	function qcld_increase_sales_buy_for_me_modal_html ($text) {

		global $product;

		if (!isset ($product) || !is_object ($product))
			return $text;

		$product_type = $product->get_type();



        wp_enqueue_style( 'qcld_cross_sell_buy_for_me_css', QCLD_cross_sell_PLUGIN_URL . 'assets/css/qcld-cross-sell-buy-for-me.css');
        wp_enqueue_script( 'qcld_cross_sell_buy_for_me_js', QCLD_cross_sell_PLUGIN_URL . 'assets/js/qcld-cross-sell-buy-for-me.js', array('jquery'));

        wp_add_inline_script( 'qcld_cross_sell_buy_for_me_js', 'var qcld_buy_for_me_ajaxurl = "' . admin_url('admin-ajax.php') . '";var qcld_buy_for_me_ajax_nonce = "'.wp_create_nonce( 'qcld-increase-sales' ).'";' , 'before' );


        $qcld_cross_sell_buy_for_me_modal_window = get_option('qcld_cross_sell_buy_for_me_modal_window') ? get_option('qcld_cross_sell_buy_for_me_modal_window') : '#edeae3';

        $qcld_cross_sell_buy_for_me_css   = "body .qcld_cross_sell-container, body .qcld_cross_sell-message {
											    background-color: ".$qcld_cross_sell_buy_for_me_modal_window.";
											}";

       	wp_add_inline_style( 'qcld_cross_sell_buy_for_me_css', $qcld_cross_sell_buy_for_me_css );


        $qcld_cross_sell_buy_for_me_color_enable   = get_option('qcld_cross_sell_buy_for_me_color_enable');

        if( isset( $qcld_cross_sell_buy_for_me_color_enable ) && $qcld_cross_sell_buy_for_me_color_enable == 1 ){

        	$qcld_cross_sell_buy_for_me_text_color = get_option('qcld_cross_sell_buy_for_me_text_color') ? get_option('qcld_cross_sell_buy_for_me_text_color') : '#999999';
        	$qcld_cross_sell_buy_for_me_head_color = get_option('qcld_cross_sell_buy_for_me_head_color') ? get_option('qcld_cross_sell_buy_for_me_head_color') : '#3c2313';
        	$qcld_cross_sell_buy_for_me_input_bg_color = get_option('qcld_cross_sell_buy_for_me_input_bg_color') ? get_option('qcld_cross_sell_buy_for_me_input_bg_color') : '#ffffff';
        	$qcld_cross_sell_buy_for_me_input_text_color = get_option('qcld_cross_sell_buy_for_me_input_text_color') ? get_option('qcld_cross_sell_buy_for_me_input_text_color') : '#666666';

        	$qcld_cross_sell_buy_for_me_css    = '';
			$qcld_cross_sell_buy_for_me_css   .="#qcld_cross_sell-buy-for-me { color: ".$qcld_cross_sell_buy_for_me_text_color." !important; }";
			$qcld_cross_sell_buy_for_me_css   .=".qcld_cross_sell-message, #qcld_cross_sell-buy-for-me h2 { color: ".$qcld_cross_sell_buy_for_me_head_color." !important; }";
			$qcld_cross_sell_buy_for_me_css   .="body .qcld_cross_sell-input, body .qcld_cross_sell-select { border: none !important; background-color: ".$qcld_cross_sell_buy_for_me_input_bg_color." !important; color: ".$qcld_cross_sell_buy_for_me_input_text_color." !important; }";

       	 	wp_add_inline_style( 'qcld_cross_sell_buy_for_me_css', $qcld_cross_sell_buy_for_me_css );
        }



		// For the product page
		if (is_product()) { 

		$qcld_cross_sell_lan_text_for_shop_now   = get_option('qcld_cross_sell_lan_text_for_shop_now');
		$qcld_cross_sell_lan_text_for_message   = get_option('qcld_cross_sell_lan_text_for_message');
		$qcld_cross_sell_lan_text_for_email_subject   = get_option('qcld_cross_sell_lan_text_for_email_subject');
		$qcld_cross_sell_lan_text_for_send_email   = get_option('qcld_cross_sell_lan_text_for_send_email');

		$qcld_cross_sell_buy_for_me_show_site_head   = get_option('qcld_cross_sell_buy_for_me_show_site_head');



	?>
		<div id="qcld_cross_sell-buy-for-me">
		    <div class="qcld_cross_sell-qcld_cross_sell-overlay"></div>
		    <div class="qcld_cross_sell-qcld_cross_sell-wrapper">
		        <div class="qcld_cross_sell-qcld_cross_sell-main">
		            <div class="qcld_cross_sell-container qcld_cross_sell-clearfix">
		                <div class="qcld_cross_sell-close">×</div>
		                <div class="qcld_cross_sell-preview">
		                	<h2><?php esc_html_e('E-mail Preview :'); ?></h2>
			                <div class="qcld_cross_sell-bg-front-wrap">
				                <div id="qcld_cross_sell-bg-front" style="background-color: #76b9bb;width: 100%;padding: 20px 0 20px 0;text-align: center;max-width: 340px;display: flex;justify-content: center;align-items: center;">
					                <div id="qcld_cross_sell-fg-front" style="background-color: #FFFFFF;width: 100%;max-width: 300px;display: inline-block;">
						                <div id="qcld_cross_sell-logo" style="text-align: center;padding-bottom: 20px;padding-top: 20px;">
						                <?php 
						                	if( isset( $qcld_cross_sell_buy_for_me_show_site_head ) && $qcld_cross_sell_buy_for_me_show_site_head == '' ){
						                ?>
						                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="qcld_cross_sell-site-wrap" target="_blank">
						                <?php 
						                if( has_custom_logo() ): 

						                	$custom_logo_id = get_theme_mod( 'custom_logo' );
								            $custom_logo_data = wp_get_attachment_image_src( $custom_logo_id , 'full' );
								            $custom_logo_url = $custom_logo_data[0];
										?>
						                	<img  src="<?php echo $custom_logo_url; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" style="max-width: 100%;height: auto;border: none;max-height: 60px;" >
						                <?php else: ?>
									        <div class="qcld_cross_sell-site-name" style="text-decoration: none;font-weight: bold;font-size: 22px;"><?php bloginfo( 'name' ); ?></div>
									    <?php endif; ?>
									    </a>
										<?php } ?>
						                </div>
						                <div id="qcld_cross_sell-your-message-front" style="color: #999999;text-align: center;font-size: 16px;font-weight: bold;line-height: 22px; padding-bottom: 20px;padding-left: 20px; padding-right: 20px;overflow: hidden;word-wrap: break-word;"><?php esc_html_e( $qcld_cross_sell_lan_text_for_message ); ?></div>
						                <div id="qcld_cross_sell-product-url-front" style="text-align: center;padding-bottom: 10px;">
						                	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank"><img src="#" style="width: 180px;border: none; display: inline-block;height: auto;max-width: 100%;"></a>
						                </div>
						                <div id="qcld_cross_sell-product-text-front" style="text-align: center;font-size: 14px;font-weight: bold;line-height: 18px;padding-bottom: 20px;padding-left: 20px;padding-right: 20px;">
						                	<span id="qcld_cross_sell-title-text-front"></span><br>
						                	<span id="qcld_cross_sell-price-text-front"></span>
						            	</div>
						                <div id="qcld_cross_sell-button-text-front" style="text-align: center;padding-bottom: 20px;">
							                <div id="qcld_cross_sell-button-text-front-bg" style="background-color: #dedacc;display: inline-block;height: 50px;width: 180px;">
							                	<a id="qcld_cross_sell-button-text-front-a" href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank" style="color: #3c2313;font-weight: bold;font-size: 14px;text-decoration: none;height: 50px;width: 180px;line-height: 50px;"><?php esc_html_e( $qcld_cross_sell_lan_text_for_shop_now ); ?></a>
							            	</div>
						            	</div>
					            	</div>
				            	</div>
			            	</div>
			            </div>

		                <div class="qcld_cross_sell-form qcld_cross_sell-clearfix">
		                    <form method="post">
		                        <h2><?php esc_html_e('Options & Settings'); ?></h2>
		                        <div class="qcld_cross_sell-col-1 qcld_cross_sell-clearfix">
		                            <label for="qcld_cross_sell-color-scheme"><?php esc_html_e('Color Scheme'); ?></label>
		                            <select class="qcld_cross_sell-select" name="qcld_cross_sell-color-scheme" id="qcld_cross_sell-color-scheme" data-scheme="disabled" data-text-color="#999999">
		                                <option value="default"><?php esc_html_e('Default'); ?></option>
		                                <option value="lollipop"><?php esc_html_e('Lollipop'); ?></option>
		                                <option value="macaron"><?php esc_html_e('Macaron'); ?></option>
		                                <option value="blueberry"><?php esc_html_e('Blueberry'); ?></option>
		                                <option value="forest"><?php esc_html_e('Forest'); ?></option>
		                                <option value="dark"><?php esc_html_e('Dark'); ?></option>
		                                <option value="lemonade"><?php esc_html_e('Lemonade'); ?></option>
		                                <option value="sailor"><?php esc_html_e('Sailor'); ?></option>
		                                <option value="gold"><?php esc_html_e('Gold'); ?></option>
		                            </select>
		                        </div>
		                        <div class="qcld_cross_sell-col-2 col-qcld_cross_sell-button-text">
		                            <label for="qcld_cross_sell-button-text"><?php esc_html_e('Button Text'); ?></label>
		                            <input type="text" class="qcld_cross_sell-input" name="qcld_cross_sell-button-text" id="qcld_cross_sell-button-text" maxlength="16" value="<?php esc_html_e( $qcld_cross_sell_lan_text_for_shop_now ); ?>">
		                        </div>
		                        <div>
		                            <label for="qcld_cross_sell-your-message"><?php esc_html_e('Your Message'); ?></label>
		                            <input type="text" class="qcld_cross_sell-input" name="qcld_cross_sell-your-message" id="qcld_cross_sell-your-message" maxlength="80" value="<?php esc_html_e( $qcld_cross_sell_lan_text_for_message ); ?>">
		                        </div>
		                        <div>
		                            <input type="checkbox" name="qcld_cross_sell-hide-price" id="qcld_cross_sell-hide-price">
		                            <label for="qcld_cross_sell-hide-price"><?php esc_html_e('Hide Price'); ?></label>
		                        </div>
		                        <div class="qcld_cross_sell-col-1 qcld_cross_sell-clearfix">
		                            <label for="qcld_cross_sell-your-name"><?php esc_html_e('Your Name *'); ?></label>
		                            <input type="text" class="qcld_cross_sell-input" name="qcld_cross_sell-your-name" id="qcld_cross_sell-your-name" maxlength="30" required="">
		                        </div>
		                        <div class="qcld_cross_sell-col-2">
		                            <label for="qcld_cross_sell-your-email"><?php esc_html_e('Your E-mail Address *'); ?></label>
		                            <input type="email" class="qcld_cross_sell-input" name="qcld_cross_sell-your-email" id="qcld_cross_sell-your-email" maxlength="63" required="" autocomplete="off">
		                        </div>
		                        <div class="qcld_cross_sell-col-1 qcld_cross_sell-clearfix">
		                            <label for="qcld_cross_sell-receiver-name"><?php esc_html_e('Receiver Name *'); ?></label>
		                            <input type="text" class="qcld_cross_sell-input" name="qcld_cross_sell-receiver-name" id="qcld_cross_sell-receiver-name" maxlength="30" required="">
		                        </div>
		                        <div class="qcld_cross_sell-col-2">
		                            <label for="qcld_cross_sell-receiver-email"><?php esc_html_e('Receiver E-mail Address *'); ?></label>
		                            <input type="email" class="qcld_cross_sell-input" name="qcld_cross_sell-receiver-email" id="qcld_cross_sell-receiver-email" maxlength="63" required="" autocomplete="off">
		                        </div>
								<div>
									<label for="qcld_cross_sell-email-subject"><?php esc_html_e('E-mail Subject *'); ?></label>
									<input type="text" class="qcld_cross_sell-input" name="qcld_cross_sell-email-subject" id="qcld_cross_sell-email-subject" maxlength="80" value="<?php esc_html_e( $qcld_cross_sell_lan_text_for_email_subject ); ?>" required="" autocomplete="off" >
		                        </div>
		                        <input type="hidden" name="qcld_cross_sell-product-id" id="qcld_cross_sell-product-id">
		                        <button type="submit" name="qcld_cross_sell-submit" id="qcld_cross_sell-submit" class="button"><span><?php esc_html_e( $qcld_cross_sell_lan_text_for_send_email ); ?></span></button>
		                    </form>
		                </div>
		            </div>
		            <div class="qcld_cross_sell-message" style="display: none;"></div>
		        </div>
		    </div>
		</div>


	<?php 
		}

	}
}

add_filter('wp_mail_content_type', function( $content_type ) {
            return 'text/html';
});

/*****************************************************
 * increase sales send mail
 ****************************************************/
add_action('wp_ajax_qcld_increase_sales_buy_for_me_send_message', 'qcld_increase_sales_buy_for_me_send_message');
add_action('wp_ajax_nopriv_qcld_increase_sales_buy_for_me_send_message', 'qcld_increase_sales_buy_for_me_send_message');
if (!function_exists('qcld_increase_sales_buy_for_me_send_message')) {
    function qcld_increase_sales_buy_for_me_send_message(){

        check_ajax_referer( 'qcld-increase-sales', 'security');

        $response['status'] = 'error';
        $response['message'] = esc_html( 'Please check details again.' );

        $your_name 			= isset( $_POST['your_name'] ) 		? sanitize_text_field($_POST['your_name'] ) 		: '';
        $your_email 		= isset( $_POST['your_email'] ) 	? sanitize_text_field($_POST['your_email'] ) 		: '';
        $receiver_name 		= isset( $_POST['receiver_name'] ) 	? sanitize_text_field($_POST['receiver_name'] ) 	: '';
        $receiver_email 	= isset( $_POST['receiver_email'] ) ? sanitize_text_field($_POST['receiver_email'] ) 	: '';
        $email_subject 		= isset( $_POST['email_subject'] ) 	? sanitize_text_field($_POST['email_subject'] ) 	: '';
        $product_html 		= isset( $_POST['product_html'] ) 	? $_POST['product_html'] 							: '';

        $product_id 		= isset( $_POST['product_id'] ) 	? sanitize_text_field($_POST['product_id'] ) 		: '';
    
	    $to 		= $receiver_email;
	    $body 		= str_replace('\\', '', $product_html );


	    $headers 	= array();
	    $headers[] 	= 'Content-Type: text/html; charset=UTF-8';
	    $headers[] 	= 'From: ' . esc_html($your_name) . ' <' . esc_html($your_email) . '>';
	    $headers[] 	= 'Reply-To: <' . esc_html($your_email) . '>';

	    $headers[] 	= 'Bcc:'.$your_email;

	    $result 	= wp_mail( $to, $email_subject, $body, $headers );

	    if ($result) {

			$qcld_cross_sell_lan_text_for_send_success   = get_option('qcld_cross_sell_lan_text_for_send_success');
	        $response['status'] = 'success';
	        $response['message'] = esc_html( str_replace('\\', '', $qcld_cross_sell_lan_text_for_send_success ) );
	        
	        echo wp_send_json( $response );
       		wp_die();

	    }

        echo wp_send_json( $response );
        wp_die();

    }
}

add_action( 'qcld_cross_sell_product_variations', 'woocommerce_template_single_add_to_cart');