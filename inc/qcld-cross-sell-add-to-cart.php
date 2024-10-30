<?php 

defined('ABSPATH') or die("No direct script access!");

$qcld_cross_sell_add_to_cart_enable = get_option('qcld_cross_sell_add_to_cart_enable');
if( isset( $qcld_cross_sell_add_to_cart_enable ) && ( $qcld_cross_sell_add_to_cart_enable == 1 ) ){

	add_filter ('add_to_cart_text', 'qcld_increase_sales_text_to_button', 100, 1);
	add_filter ('woocommerce_product_add_to_cart_text', 'qcld_increase_sales_text_to_button', 100, 1);
	add_filter ('woocommerce_product_single_add_to_cart_text', 'qcld_increase_sales_text_to_button', 100, 1);
	add_filter ('woocommerce_booking_single_add_to_cart_text', 'qcld_increase_sales_text_to_button', 100, 1);

}

if (!function_exists('qcld_increase_sales_text_to_button')) {
	function qcld_increase_sales_text_to_button ($text) {

		global $product;

		if (!isset ($product) || !is_object ($product))
			return $text;

		$product_type = $product->get_type();

		$qcld_cross_sell_add_to_cart_external 			= esc_attr (get_option ('qcld_cross_sell_add_to_cart_external', __('Buy product', 'woocommerce')));
		$qcld_cross_sell_add_to_cart_grouped 			= esc_attr (get_option ('qcld_cross_sell_add_to_cart_grouped', __('View products', 'woocommerce')));
		$qcld_cross_sell_add_to_cart_simple 			= esc_attr (get_option ('qcld_cross_sell_add_to_cart_simple', __('Add to cart', 'woocommerce')));
		$qcld_cross_sell_add_to_cart_variable 			= esc_attr (get_option ('qcld_cross_sell_add_to_cart_variable', __('Select options', 'woocommerce')));
		$qcld_text_to_button_bookable 					= esc_attr (get_option ('add_to_cart_bookable', __('Book now', 'woocommerce')));
		$qcld_cross_sell_add_to_cart_external_single 	= esc_attr (get_option ('qcld_cross_sell_add_to_cart_external_single', 	$qcld_cross_sell_add_to_cart_external ) );
		$qcld_cross_sell_add_to_cart_grouped_single 	= esc_attr (get_option ('qcld_cross_sell_add_to_cart_grouped_single', 	$qcld_cross_sell_add_to_cart_simple ) );
		$qcld_cross_sell_add_to_cart_simple_single 		= esc_attr (get_option ('qcld_cross_sell_add_to_cart_simple_single', 	$qcld_cross_sell_add_to_cart_simple ) );
		$qcld_cross_sell_add_to_cart_variable_single 	= esc_attr (get_option ('qcld_cross_sell_add_to_cart_variable_single', 	$qcld_cross_sell_add_to_cart_simple ) );
		$qcld_text_to_button_bookable_single 			= esc_attr (get_option ('qcld_cross_sell_add_to_cart_bookable', 		$qcld_text_to_button_bookable ) );



		// For the product page
		if (is_product()) { 

			switch ($product_type) {

				case 'external':
					return $qcld_cross_sell_add_to_cart_external_single;
					break;

				case 'grouped':
					return $qcld_cross_sell_add_to_cart_grouped_single;
					break;

				case 'simple':
					return $qcld_cross_sell_add_to_cart_simple_single;
					break;

				case 'variable':
					return $qcld_cross_sell_add_to_cart_variable_single;
					break;

				case 'booking':
					return $qcld_text_to_button_bookable_single;
					break;

				default:
					return $qcld_cross_sell_add_to_cart_simple;

			}

		}else {

			switch ($product_type) {

				case 'external':
					return $qcld_cross_sell_add_to_cart_external;
					break;

				case 'grouped':
					return $qcld_cross_sell_add_to_cart_grouped;
					break;

				case 'simple':
					return $qcld_cross_sell_add_to_cart_simple;
					break;

				case 'variable':
					return $qcld_cross_sell_add_to_cart_variable;
					break;

				case 'booking':
					return $add_to_cart_bookable;
					break;

				default:
					return $qcld_cross_sell_add_to_cart_simple;

			}
		}

	}
}
