<?php 

defined('ABSPATH') or die("No direct script access!");


/*************************************************************************
 * cross sell admin function
 ************************************************************************/
if (!function_exists('qcld_cross_sell_admin_setting_functions')) {
function qcld_cross_sell_admin_setting_functions(){


        $action = 'admin.php?page=qcld-increase-sales'; ?>
        <br>
        <form action="<?php echo esc_attr($action); ?>" method="POST" enctype="multipart/form-data">
            <div class="cross_sell-form-container">
                <h2><?php esc_html_e('Increase Sales', 'qcld-increase-sales'); ?></h2>
     
                <section class="cross_sell-tab-container-inner">
                    <div class="tabs-cross_sell tabs-cross_sell-style-flip">
                        <nav>
                            <ul class="cross_sell-tabs-nav">
                                <li class="cross_sell-tab-active"><a href="#cross_sell-section-flip-10"><i class="fa fa-briefcase"></i> <span> <?php  esc_html_e( 'Buy for Me', 'qcld-increase-sales' ); ?> </span></a></li>
                                <li><a href="#cross_sell-section-flip-9"><i class="fa fa-plus-square-o"></i> <span> <?php  esc_html_e( 'Add to Cart Text', 'qcld-increase-sales' ); ?> </span></a></li>
                                <li><a href="#cross_sell-section-flip-1"><i class="fa fa-cogs"></i> <span> <?php  esc_html_e( 'Cross-sells Settings', 'qcld-increase-sales' ); ?></span></a>
                                </li>
                                <li><a href="#cross_sell-section-flip-7"><i class="fa fa-shopping-cart"></i> <span> <?php  esc_html_e( 'Continue Shopping', 'qcld-increase-sales' ); ?> </span></a></li>
                                
                                <li><a href="#cross_sell-section-flip-4"><i class="fa fa-cog"></i> <span> <?php  esc_html_e( 'Display Settings', 'qcld-increase-sales' ); ?> </span></a></li>
                                <li><a href="#cross_sell-section-flip-2"><i class="fa fa-language"></i> <span> <?php  esc_html_e( 'LANGUAGE CENTER', 'qcld-increase-sales' ); ?> </span></a></li>
                                <li><a href="#cross_sell-section-flip-3"><i class="fa fa-code"></i> <span> <?php  esc_html_e( 'Custom CSS', 'qcld-increase-sales' ); ?> </span></a></li>
                                <li><a href="#cross_sell-section-flip-5"><i class="fa fa-question-circle" aria-hidden="true"></i> <span> <?php  esc_html_e( 'Help', 'qcld-increase-sales' ); ?> </span></a></li>
                                <li><a href="#cross_sell-section-flip-6"><i class="fa fa-ambulance" aria-hidden="true"></i> <span> <?php  esc_html_e( 'Support', 'qcld-increase-sales' ); ?> </span></a></li>
                            </ul>
                        </nav>

                        <!-- General Section Start -->
                        <div class="cross_sell-content-wrap">


                            <!-- Display Buy for Me Start -->
                            <div id="cross_sell-section-flip-10" class="cross_sell-contents">
                                 <h2>  <?php  esc_html_e( 'General Settings', 'qcld-increase-sales' ); ?></h2>
                                <table class="table table-bordered striped">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p class="qc-opt-title-font"><?php  esc_html_e( 'Buy for Me', 'qcld-increase-sales' ); ?></p>
                                                <div class="cross_sell-cxsc-settings-blocks">
                                                    <input id="qcld_cross_sell_buy_for_me_enable" type="checkbox" name="qcld_cross_sell_buy_for_me_enable" value="<?php echo esc_attr('1'); ?>" <?php echo esc_attr(get_option('qcld_cross_sell_buy_for_me_enable') == '1' ? 'checked' : ''); ?>>
                                                    <label for="qcld_cross_sell_buy_for_me_enable"> <?php  esc_html_e( 'Enable Buy for Me Button', 'qcld-increase-sales' ); ?></label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="qc-opt-title-font"><?php  esc_html_e( 'Disable Site Head Section', 'qcld-increase-sales' ); ?></p>
                                                <div class="cross_sell-cxsc-settings-blocks">
                                                    <input id="qcld_cross_sell_buy_for_me_show_site_head" type="checkbox" name="qcld_cross_sell_buy_for_me_show_site_head" value="<?php echo esc_attr('1'); ?>" <?php echo esc_attr(get_option('qcld_cross_sell_buy_for_me_show_site_head') == '1' ? 'checked' : ''); ?>>
                                                    <label for="qcld_cross_sell_buy_for_me_show_site_head"> <?php  esc_html_e( 'Disable Site Head Section from Product View', 'qcld-increase-sales' ); ?></label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="qc-opt-title-font"><?php  esc_html_e( 'Show Buy For Me button', 'qcld-increase-sales' ); ?></p>
                                                <div class="cross_sell-cxsc-settings-blocks">
                                                    <input id="qcld_cross_sell_buy_for_me_shop_page" type="checkbox" name="qcld_cross_sell_buy_for_me_shop_page" value="<?php echo esc_attr('1'); ?>" <?php echo esc_attr(get_option('qcld_cross_sell_buy_for_me_shop_page') == '1' ? 'checked' : ''); ?> disabled>
                                                    <label for="qcld_cross_sell_buy_for_me_shop_page"> <?php  esc_html_e( 'Show Buy For Me button on Shop/Category pages.', 'qcld-increase-sales' ); ?> <span class="qcld_cross_sell_pro_feature">  <?php  esc_html_e( 'Pro Feature', 'qcld-increase-sales' ); ?></span> </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="qc-opt-title-font"><?php  esc_html_e( "Show Buy For Me button", 'qcld-increase-sales' ); ?></p>
                                                <div class="cross_sell-cxsc-settings-blocks">
                                                    <input id="qcld_cross_sell_buy_for_me_product_page" type="checkbox" name="qcld_cross_sell_buy_for_me_product_page" value="<?php echo esc_attr('1'); ?>" <?php echo esc_attr(get_option('qcld_cross_sell_buy_for_me_product_page') == '1' ? 'checked' : ''); ?>>
                                                    <label for="qcld_cross_sell_buy_for_me_product_page"> <?php  esc_html_e( "Show 'Buy For Me' button for new products by default.", 'qcld-increase-sales' ); ?></label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="admin_display_list_3">
                                                    <p><?php  esc_html_e( 'Window Background Color', 'qcld-increase-sales' ); ?></p>
                                                    <input type="text" name="qcld_cross_sell_buy_for_me_modal_window"
                                                           value="<?php echo get_option('qcld_cross_sell_buy_for_me_modal_window') ? get_option('qcld_cross_sell_buy_for_me_modal_window') : '#edeae3'; ?>"
                                                           class="cross-sell-bg-color">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="cross_sell-cxsc-settings-blocks">
                                                    <p><?php  esc_html_e( 'Override theme colors', 'qcld-increase-sales' ); ?></p>
                                                    <input id="qcld_cross_sell_buy_for_me_color_enable" type="checkbox" name="qcld_cross_sell_buy_for_me_color_enable" value="<?php echo esc_attr('1'); ?>" <?php echo esc_attr(get_option('qcld_cross_sell_buy_for_me_color_enable') == '1' ? 'checked' : ''); ?>>
                                                    <label for="qcld_cross_sell_buy_for_me_color_enable"> <?php  esc_html_e( 'Override theme colors with the ones below', 'qcld-increase-sales' ); ?></label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="admin_display_list_3">
                                                    <p><?php  esc_html_e( 'Text Color', 'qcld-increase-sales' ); ?></p>
                                                    <input type="text" name="qcld_cross_sell_buy_for_me_text_color"
                                                           value="<?php echo get_option('qcld_cross_sell_buy_for_me_text_color') ? get_option('qcld_cross_sell_buy_for_me_text_color') : '#666666'; ?>"
                                                           class="cross-sell-bg-color">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="admin_display_list_3">
                                                    <p><?php  esc_html_e( 'Heading (H2) Color', 'qcld-increase-sales' ); ?></p>
                                                    <input type="text" name="qcld_cross_sell_buy_for_me_head_color"
                                                           value="<?php echo get_option('qcld_cross_sell_buy_for_me_head_color') ? get_option('qcld_cross_sell_buy_for_me_head_color') : '#3c2313'; ?>"
                                                           class="cross-sell-bg-color">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="admin_display_list_3">
                                                    <p><?php  esc_html_e( 'Input Background Color', 'qcld-increase-sales' ); ?></p>
                                                    <input type="text" name="qcld_cross_sell_buy_for_me_input_bg_color"
                                                           value="<?php echo get_option('qcld_cross_sell_buy_for_me_input_bg_color') ? get_option('qcld_cross_sell_buy_for_me_input_bg_color') : '#ffffff'; ?>"
                                                           class="cross-sell-bg-color">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="admin_display_list_3">
                                                    <p><?php  esc_html_e( 'Input Text Color', 'qcld-increase-sales' ); ?></p>
                                                    <input type="text" name="qcld_cross_sell_buy_for_me_input_text_color"
                                                           value="<?php echo get_option('qcld_cross_sell_buy_for_me_input_text_color') ? get_option('qcld_cross_sell_buy_for_me_input_text_color') : '#666666'; ?>"
                                                           class="cross-sell-bg-color">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="admin_display_list_3">
                                                    <p><?php  esc_html_e( 'Buy For Me', 'qcld-increase-sales' ); ?></p>
                                                    <input type="text" name="qcld_cross_sell_buy_for_me_text"
                                                           value="<?php echo get_option('qcld_cross_sell_buy_for_me_text') ? get_option('qcld_cross_sell_buy_for_me_text') : 'Buy For Me'; ?>"
                                                           class="form-control">
                                                    <p><i> <?php  esc_html_e( 'Default ( Buy For Me ) Button Text', 'qcld-increase-sales' ); ?></i></p>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="admin_display_list_3">
                                                    <p><?php  esc_html_e( 'SHOP NOW', 'qcld-increase-sales' ); ?></p>
                                                    <input type="text" name="qcld_cross_sell_lan_text_for_shop_now"
                                                           value="<?php echo get_option('qcld_cross_sell_lan_text_for_shop_now') ? get_option('qcld_cross_sell_lan_text_for_shop_now') : 'SHOP NOW'; ?>"
                                                           class="form-control">
                                                    <p><i> <?php  esc_html_e( 'Default ( SHOP NOW ) Button Text', 'qcld-increase-sales' ); ?></i></p>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="admin_display_list_3">
                                                    <p><?php  esc_html_e( 'Your Message', 'qcld-increase-sales' ); ?></p>
                                                    <input type="text" name="qcld_cross_sell_lan_text_for_message"
                                                           value="<?php echo get_option('qcld_cross_sell_lan_text_for_message') ? get_option('qcld_cross_sell_lan_text_for_message') : 'Would you please buy this awesome piece for me dear? :) '; ?>"
                                                           class="form-control">
                                                    <p><i> <?php  esc_html_e( 'Default Message Text', 'qcld-increase-sales' ); ?></i></p>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="admin_display_list_3">
                                                    <p><?php  esc_html_e( 'E-mail Subject', 'qcld-increase-sales' ); ?></p>
                                                    <input type="text" name="qcld_cross_sell_lan_text_for_email_subject"
                                                           value="<?php echo get_option('qcld_cross_sell_lan_text_for_email_subject') ? get_option('qcld_cross_sell_lan_text_for_email_subject') : 'I can forgive you if you buy this :)'; ?>"
                                                           class="form-control">
                                                    <p><i> <?php  esc_html_e( 'Default E-mail Subject Text', 'qcld-increase-sales' ); ?></i></p>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="admin_display_list_3">
                                                    <p><?php  esc_html_e( 'Send E-mail', 'qcld-increase-sales' ); ?></p>
                                                    <input type="text" name="qcld_cross_sell_lan_text_for_send_email"
                                                           value="<?php echo get_option('qcld_cross_sell_lan_text_for_send_email') ? get_option('qcld_cross_sell_lan_text_for_send_email') : 'Send E-mail'; ?>"
                                                           class="form-control">
                                                    <p><i> <?php  esc_html_e( 'Default ( Send E-mail ) Button Text', 'qcld-increase-sales' ); ?></i></p>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="admin_display_list_3">
                                                    <p><?php  esc_html_e( 'E-mail Success Message', 'qcld-increase-sales' ); ?></p>
                                                    <input type="text" name="qcld_cross_sell_lan_text_for_send_success"
                                                           value="<?php echo get_option('qcld_cross_sell_lan_text_for_send_success') ? get_option('qcld_cross_sell_lan_text_for_send_success') : 'Your e-mail has been sent! You will also get a copy of it to your own e-mail address.'; ?>"
                                                           class="form-control">
                                                    <p><i> <?php  esc_html_e( 'Default E-mail Success Message', 'qcld-increase-sales' ); ?></i></p>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- Display Buy for Me End -->
                            <!-- General Section start -->
                            <div id="cross_sell-section-flip-1" class="cross_sell-contents">
                                <h2> <?php  esc_html_e( 'Cross-sells Settings', 'qcld-increase-sales' ); ?></h2>
                                <table class="table table-bordered striped">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <p class="qc-opt-title-font"><?php  esc_html_e( 'Disable Cross-sells', 'qcld-increase-sales' ); ?></p>
                                            <div class="cross_sell-cxsc-settings-blocks">
                                                <input id="qcld_cross_sell_disable" type="checkbox" name="qcld_cross_sell_disable" value="<?php echo esc_attr('1'); ?>" <?php echo esc_attr(get_option('qcld_cross_sell_disable') == '1' ? 'checked' : ''); ?>>
                                                <label for="qcld_cross_sell_disable"> <?php  esc_html_e( 'Enable Cross-sells', 'qcld-increase-sales' ); ?></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="qc-opt-title-font"><?php  esc_html_e( 'Cross-sells display', 'qcld-increase-sales' ); ?></p>
                                            <div class="cross_sell-cxsc-settings-blocks">
                                                <input id="qcld_cross_sell_show_cart_page" type="checkbox" name="qcld_cross_sell_show_cart_page" value="<?php echo esc_attr('1'); ?>" <?php echo esc_attr(get_option('qcld_cross_sell_show_cart_page') == '1' ? 'checked' : ''); ?>>
                                                <label for="qcld_cross_sell_show_cart_page"> <?php  esc_html_e( 'Cart Page', 'qcld-increase-sales' ); ?></label>
                                            </div>
                                            <div class="cross_sell-cxsc-settings-blocks">
                                                <input id="qcld_cross_sell_show_checkout_page" type="checkbox" name="qcld_cross_sell_show_checkout_page" value="<?php echo esc_attr('1'); ?>" disabled="disabled">
                                                <label for="qcld_cross_sell_show_checkout_page"> <?php  esc_html_e( 'Checkout Page', 'qcld-increase-sales' ); ?> <span class="qcld_cross_sell_pro">  <?php  esc_html_e( 'Comming Soon', 'qcld-increase-sales' ); ?></span></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="qc-opt-title-font"><?php  esc_html_e( 'Cross-sells Product Display Mode', 'qcld-increase-sales' ); ?></p>
    
                                             <div class="cross_sell-cxsc-settings-blocks">
                                                <label class="radio-inline">
                                                    <input id="qcld_cross_sell_display_mode" type="radio"
                                                           name="qcld_cross_sell_display_mode"
                                                           value="<?php echo esc_attr('qcld_cart_item'); ?>" <?php echo esc_attr(get_option('qcld_cross_sell_display_mode') == 'qcld_cart_item' ? 'checked' : ''); ?>>
                                                    <?php  esc_html_e( 'Cart Inline with specific products', 'qcld-increase-sales' ); ?>
                                                </label>
                                            </div>
                                            <div class="cross_sell-cxsc-settings-blocks">
                                                <label class="radio-inline">
                                                    <input id="qcld_cross_sell_display_mode" type="radio"
                                                           name="qcld_cross_sell_display_mode"
                                                           value="<?php echo esc_attr('qcld_before_cart_table'); ?>" <?php echo esc_attr(get_option('qcld_cross_sell_display_mode') == 'qcld_before_cart_table' ? 'checked' : ''); ?>>
                                                    <?php  esc_html_e( 'Before Woocommerce Cart table', 'qcld-increase-sales' ); ?>
                                                </label>
                                            </div>
                                            <div class="cross_sell-cxsc-settings-blocks">
                                                <label class="radio-inline">
                                                    <input id="qcld_cross_sell_display_mode" type="radio"
                                                           name="qcld_cross_sell_display_mode"
                                                           value="<?php echo esc_attr('qcld_after_cart_table'); ?>" <?php echo esc_attr(get_option('qcld_cross_sell_display_mode') == 'qcld_after_cart_table' ? 'checked' : ''); ?>>
                                                    <?php  esc_html_e( 'After Woocommerce Cart table', 'qcld-increase-sales' ); ?>
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="qc-opt-title-font"><?php  esc_html_e( 'Product Details Display Mode', 'qcld-increase-sales' ); ?></p>

                                            <div class="cross_sell-cxsc-settings-blocks">
                                                <label class="radio-inline">
                                                    <input id="qcld_cross_sell_product_details_display_mode" type="radio"
                                                           name="qcld_cross_sell_product_details_display_mode"
                                                           value="<?php echo esc_attr('tooltip'); ?>"  disabled="disabled">
                                                    <?php  esc_html_e( 'Tooltip', 'qcld-increase-sales' ); ?> <span class="qcld_cross_sell_pro">  <?php  esc_html_e( 'Comming Soon', 'qcld-increase-sales' ); ?></span>
                                                </label>
                                            </div>
                                            <div class="cross_sell-cxsc-settings-blocks">
                                                <label class="radio-inline">
                                                    <input id="qcld_cross_sell_product_details_display_mode" type="radio"
                                                           name="qcld_cross_sell_product_details_display_mode"
                                                           value="<?php echo esc_attr('modal'); ?>" <?php echo esc_attr(get_option('qcld_cross_sell_product_details_display_mode') == 'modal' ? 'checked' : ''); ?>>
                                                    <?php  esc_html_e( 'Modal', 'qcld-increase-sales' ); ?>
                                                </label>
                                            </div>


                                        </td>
                                    </tr>

                                     <tr>
                                        <td>
                                            <p class="qc-opt-title-font"><?php  esc_html_e( 'Automatically show other products from category when no cross-sell products assigned', 'qcld-increase-sales' ); ?></p>

                                            <div class="cross_sell-cxsc-settings-blocks">
                                                <label class="radio-inline">
                                                    <input id="qcld_cross_sell_product_show_when_no_cross_sell" type="radio"
                                                           name="qcld_cross_sell_product_show_when_no_cross_sell"
                                                           value="<?php echo esc_attr('enable'); ?>" <?php echo esc_attr(get_option('qcld_cross_sell_product_show_when_no_cross_sell') == 'enable' ? 'checked' : ''); ?>  disabled="disabled">
                                                    <?php  esc_html_e( 'Enable', 'qcld-increase-sales' ); ?> <span class="qcld_cross_sell_pro">  <?php  esc_html_e( 'Comming Soon', 'qcld-increase-sales' ); ?></span>
                                                </label>
                                            </div>
                                            <div class="cross_sell-cxsc-settings-blocks">
                                                <label class="radio-inline">
                                                    <input id="qcld_cross_sell_product_show_when_no_cross_sell" type="radio"
                                                           name="qcld_cross_sell_product_show_when_no_cross_sell"
                                                           value="<?php echo esc_attr('disable'); ?>" <?php echo esc_attr(get_option('qcld_cross_sell_product_show_when_no_cross_sell') == 'disable' ? 'checked' : ''); ?>  disabled="disabled">
                                                    <?php  esc_html_e( 'Disable', 'qcld-increase-sales' ); ?>
                                                </label>
                                            </div>


                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="qc-opt-title-font"><?php  esc_html_e( 'Product Limit', 'qcld-increase-sales' ); ?></p>

                                            <div class="cross_sell-cxsc-settings-blocks">
                                                
                                                <input id="qcld_cross_sell_product_limit_number" type="text"
                                                    name="qcld_cross_sell_product_limit_number"
                                                    value="<?php echo esc_attr(get_option('qcld_cross_sell_product_limit_number')); ?>" placeholder="Limit Number" disabled="disabled">
                                                     <span class="qcld_cross_sell_pro">  <?php  esc_html_e( 'Comming Soon', 'qcld-increase-sales' ); ?></span>
                                               
                                            </div>


                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="qc-opt-title-font"><?php  esc_html_e( 'Product Order By', 'qcld-increase-sales' ); ?></p>

                                            <div class="cross_sell-cxsc-settings-block">
                                                <label class="radio-inline">
                                                    <input id="qcld_cross_sell_product_order_by" type="radio"
                                                           name="qcld_cross_sell_product_order_by"
                                                           value="<?php echo esc_attr('title'); ?>" <?php echo esc_attr(get_option('qcld_cross_sell_product_order_by') == 'title' ? 'checked' : ''); ?> disabled="disabled">
                                                    <?php  esc_html_e( 'Title', 'qcld-increase-sales' ); ?>
                                                </label>
                                            </div>
                                            <div class="cross_sell-cxsc-settings-block">
                                                <label class="radio-inline">
                                                    <input id="qcld_cross_sell_product_order_by" type="radio"
                                                           name="qcld_cross_sell_product_order_by"
                                                           value="<?php echo esc_attr('popularity'); ?>" <?php echo esc_attr(get_option('qcld_cross_sell_product_order_by') == 'popularity' ? 'checked' : ''); ?> disabled="disabled">
                                                    <?php  esc_html_e( 'Popularity', 'qcld-increase-sales' ); ?>
                                                </label>
                                            </div>
                                            <div class="cross_sell-cxsc-settings-block">
                                                <label class="radio-inline">
                                                    <input id="qcld_cross_sell_product_order_by" type="radio"
                                                           name="qcld_cross_sell_product_order_by"
                                                           value="<?php echo esc_attr('rating'); ?>" <?php echo esc_attr(get_option('qcld_cross_sell_product_order_by') == 'rating' ? 'checked' : ''); ?> disabled="disabled">
                                                    <?php  esc_html_e( 'Rating', 'qcld-increase-sales' ); ?>
                                                </label>
                                            </div>
                                            <div class="cross_sell-cxsc-settings-block">
                                                <label class="radio-inline">
                                                    <input id="qcld_cross_sell_product_order_by" type="radio"
                                                           name="qcld_cross_sell_product_order_by"
                                                           value="<?php echo esc_attr('rand'); ?>" <?php echo esc_attr(get_option('qcld_cross_sell_product_order_by') == 'rand' ? 'checked' : ''); ?> disabled="disabled">
                                                    <?php  esc_html_e( 'Random', 'qcld-increase-sales' ); ?>
                                                </label>
                                            </div>
                                            <div class="cross_sell-cxsc-settings-block">
                                                <label class="radio-inline">
                                                    <input id="qcld_cross_sell_product_order_by" type="radio"
                                                           name="qcld_cross_sell_product_order_by"
                                                           value="<?php echo esc_attr('menu_order'); ?>" <?php echo esc_attr(get_option('qcld_cross_sell_product_order_by') == 'menu_order' ? 'checked' : ''); ?> disabled="disabled">
                                                    <?php  esc_html_e( 'Menu Order', 'qcld-increase-sales' ); ?>
                                                </label>
                                            </div>
                                            <div class="cross_sell-cxsc-settings-block">
                                                <label class="radio-inline">
                                                    <input id="qcld_cross_sell_product_order_by" type="radio"
                                                           name="qcld_cross_sell_product_order_by"
                                                           value="<?php echo esc_attr('date'); ?>" <?php echo esc_attr(get_option('qcld_cross_sell_product_order_by') == 'date' ? 'checked' : ''); ?> disabled="disabled">
                                                    <?php  esc_html_e( 'Date', 'qcld-increase-sales' ); ?>
                                                </label>
                                            </div>
                                            <div class="cross_sell-cxsc-settings-block">
                                                <label class="radio-inline">
                                                    <input id="qcld_cross_sell_product_order_by" type="radio"
                                                           name="qcld_cross_sell_product_order_by"
                                                           value="<?php echo esc_attr('id'); ?>" <?php echo esc_attr(get_option('qcld_cross_sell_product_order_by') == 'id' ? 'checked' : ''); ?> disabled="disabled">
                                                    <?php  esc_html_e( 'ID', 'qcld-increase-sales' ); ?>
                                                </label>
                                                 <span class="qcld_cross_sell_pro">  <?php  esc_html_e( 'Comming Soon', 'qcld-increase-sales' ); ?></span>
                                            </div>


                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>
                                            <p class="qc-opt-title-font"><?php  esc_html_e( 'Product Order', 'qcld-increase-sales' ); ?></p>

                                            <div class="cross_sell-cxsc-settings-block">
                                                <label class="radio-inline">
                                                    <input id="qcld_cross_sell_product_order" type="radio"
                                                           name="qcld_cross_sell_product_order"
                                                           value="<?php echo esc_attr('ASC'); ?>" <?php echo esc_attr(get_option('qcld_cross_sell_product_order') == 'ASC' ? 'checked' : ''); ?> disabled="disabled">
                                                    <?php  esc_html_e( 'ASC', 'qcld-increase-sales' ); ?>
                                                </label>
                                            </div>
                                            <div class="cross_sell-cxsc-settings-block">
                                                <label class="radio-inline">
                                                    <input id="qcld_cross_sell_product_order" type="radio"
                                                           name="qcld_cross_sell_product_order"
                                                           value="<?php echo esc_attr('desc'); ?>" <?php echo esc_attr(get_option('qcld_cross_sell_product_order') == 'desc' ? 'checked' : ''); ?> disabled="disabled">
                                                    <?php  esc_html_e( 'DESC', 'qcld-increase-sales' ); ?>  <span class="qcld_cross_sell_pro">  <?php  esc_html_e( 'Comming Soon', 'qcld-increase-sales' ); ?></span>
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                
                                </tbody>
                            </table>
                            </div>
                            <!-- General Section End -->

                            <!-- Continue Shopping Section Start -->
                            <div id="cross_sell-section-flip-7" class="cross_sell-contents">
                                <h2>  <?php  esc_html_e( 'Continue Shopping Option', 'qcld-increase-sales' ); ?></h2>
                                <table class="table table-bordered striped">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p class="qc-opt-title-font"><?php  esc_html_e( 'Enable Continue Shopping', 'qcld-increase-sales' ); ?></p>
                                                <div class="cross_sell-cxsc-settings-blocks">
                                                    <input id="qcld_cross_sell_continue_shopping" type="checkbox" name="qcld_cross_sell_continue_shopping" value="<?php echo esc_attr('1'); ?>" <?php echo esc_attr(get_option('qcld_cross_sell_continue_shopping') == '1' ? 'checked' : ''); ?>>
                                                    <label for="qcld_cross_sell_continue_shopping"> <?php  esc_html_e( 'Enable Continue Shopping', 'qcld-increase-sales' ); ?></label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="qc-opt-title-font"><?php  esc_html_e( 'Continue Shopping URL', 'qcld-increase-sales' ); ?></p>
                                                <div class="cross_sell-cxsc-settings-blocks">
                                                    <select id="qcld_cross_sell_continue_shopping_section_url" name="qcld_cross_sell_continue_shopping_section_url">
                                                        <option value="<?php echo esc_attr('shop_page'); ?>" <?php echo esc_attr(get_option('qcld_cross_sell_continue_shopping_section_url') == 'shop_page' ? 'selected' : ''); ?>><?php  esc_html_e( 'Go to the Shop Page', 'qcld-increase-sales' ); ?></option>
                                                        <option value="<?php echo esc_attr('home_page'); ?>" <?php echo esc_attr(get_option('qcld_cross_sell_continue_shopping_section_url') == 'home_page' ? 'selected' : ''); ?>><?php  esc_html_e( 'Go to the Home Page', 'qcld-increase-sales' ); ?></option>
                                                        <option value="<?php echo esc_attr('custom_link'); ?>" <?php echo esc_attr(get_option('qcld_cross_sell_continue_shopping_section_url') == 'custom_link' ? 'selected' : ''); ?>><?php  esc_html_e( 'Insert Custom Link', 'qcld-increase-sales' ); ?></option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <p class="qc-opt-title-font"><?php  esc_html_e( 'Insert Custom Link', 'qcld-increase-sales' ); ?></p>

                                                <div class="cross_sell-cxsc-settings-blocks">
                                                    
                                                    <input id="qcld_cross_sell_product_custom_link" type="text" class="form-control qc-opt-dcs-font"
                                                        name="qcld_cross_sell_product_custom_link"
                                                        value="<?php echo esc_attr(get_option('qcld_cross_sell_product_custom_link')); ?>" placeholder="<?php  esc_html_e( 'Insert Custom Link', 'qcld-increase-sales' ); ?>">
                                                </div>
                                            </td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                            <!-- Continue Shopping Section End -->

                      

                            <!-- Display Add to Cart Text Start -->
                            <div id="cross_sell-section-flip-9" class="cross_sell-contents">
                                 <h2>  <?php  esc_html_e( 'Settings', 'qcld-increase-sales' ); ?></h2>
                                <table class="table table-bordered striped">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p class="qc-opt-title-font"><?php  esc_html_e( 'Enable Add to Cart Custom Text options', 'qcld-increase-sales' ); ?></p>
                                                <div class="cross_sell-cxsc-settings-blocks">
                                                    <input id="qcld_cross_sell_add_to_cart_enable" type="checkbox" name="qcld_cross_sell_add_to_cart_enable" value="<?php echo esc_attr('1'); ?>" <?php echo esc_attr(get_option('qcld_cross_sell_add_to_cart_enable') == '1' ? 'checked' : ''); ?>>
                                                    <label for="qcld_cross_sell_add_to_cart_enable"> <?php  esc_html_e( 'Enable Add to Cart Custom Text options', 'qcld-increase-sales' ); ?></label>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                                <h2> <?php  esc_html_e( 'Add to Cart Custom Text', 'qcld-increase-sales' ); ?></h2>
                                <table class="table table-bordered striped">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="admin_display_list_3">
                                                    <p><?php  esc_html_e( 'Simple product', 'qcld-increase-sales' ); ?></p>
                                                    <input type="text" name="qcld_cross_sell_add_to_cart_simple"
                                                           value="<?php echo get_option('qcld_cross_sell_add_to_cart_simple') ? get_option('qcld_cross_sell_add_to_cart_simple') : 'Add to cart'; ?>"
                                                           class="form-control">
                                                </div>


                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="admin_display_list_3">
                                                    <p><?php  esc_html_e( 'External/Affiliate product', 'qcld-increase-sales' ); ?></p>
                                                    <input type="text" name="qcld_cross_sell_add_to_cart_external"
                                                           value="<?php echo get_option('qcld_cross_sell_add_to_cart_external') ? get_option('qcld_cross_sell_add_to_cart_external') : 'Buy product'; ?>"
                                                           class="form-control">
                                                </div>


                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="admin_display_list_3">
                                                    <p><?php  esc_html_e( 'Variable product', 'qcld-increase-sales' ); ?></p>
                                                    <input type="text" name="qcld_cross_sell_add_to_cart_variable"
                                                           value="<?php echo get_option('qcld_cross_sell_add_to_cart_variable') ? get_option('qcld_cross_sell_add_to_cart_variable') : 'Add to cart'; ?>"
                                                           class="form-control">
                                                </div>


                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="admin_display_list_3">
                                                    <p><?php  esc_html_e( 'Grouped product', 'qcld-increase-sales' ); ?></p>
                                                    <input type="text" name="qcld_cross_sell_add_to_cart_grouped"
                                                           value="<?php echo get_option('qcld_cross_sell_add_to_cart_grouped') ? get_option('qcld_cross_sell_add_to_cart_grouped') : 'Add to cart'; ?>"
                                                           class="form-control">
                                                </div>


                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="admin_display_list_3">
                                                    <p><?php  esc_html_e( 'Book Now product', 'qcld-increase-sales' ); ?></p>
                                                    <input type="text" name="qcld_cross_sell_add_to_cart_bookable"
                                                           value="<?php echo get_option('qcld_cross_sell_add_to_cart_bookable') ? get_option('qcld_cross_sell_add_to_cart_bookable') : 'Book Now'; ?>"
                                                           class="form-control">
                                                </div>


                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                                <h2> <?php  esc_html_e( 'Button text in archive pages', 'qcld-increase-sales' ); ?></h2>
                                <p> <?php  esc_html_e( 'Custom text for the Add to cart button in archive pages (shop, category, tags...) by product type', 'qcld-increase-sales' ); ?></p>
                                <table class="table table-bordered striped">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="admin_display_list_3">
                                                    <p><?php  esc_html_e( 'Simple product', 'qcld-increase-sales' ); ?></p>
                                                    <input type="text" name="qcld_cross_sell_add_to_cart_simple_single"
                                                           value="<?php echo get_option('qcld_cross_sell_add_to_cart_simple_single') ? get_option('qcld_cross_sell_add_to_cart_simple_single') : 'Add to cart'; ?>"
                                                           class="form-control">
                                                </div>


                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="admin_display_list_3">
                                                    <p><?php  esc_html_e( 'External/Affiliate product', 'qcld-increase-sales' ); ?></p>
                                                    <input type="text" name="qcld_cross_sell_add_to_cart_external_single"
                                                           value="<?php echo get_option('qcld_cross_sell_add_to_cart_external_single') ? get_option('qcld_cross_sell_add_to_cart_external_single') : 'Buy product'; ?>"
                                                           class="form-control">
                                                </div>


                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="admin_display_list_3">
                                                    <p><?php  esc_html_e( 'Variable product', 'qcld-increase-sales' ); ?></p>
                                                    <input type="text" name="qcld_cross_sell_add_to_cart_variable_single"
                                                           value="<?php echo get_option('qcld_cross_sell_add_to_cart_variable_single') ? get_option('qcld_cross_sell_add_to_cart_variable_single') : 'Select options'; ?>"
                                                           class="form-control">
                                                </div>


                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="admin_display_list_3">
                                                    <p><?php  esc_html_e( 'Grouped product', 'qcld-increase-sales' ); ?></p>
                                                    <input type="text" name="qcld_cross_sell_add_to_cart_grouped_single"
                                                           value="<?php echo get_option('qcld_cross_sell_add_to_cart_grouped_single') ? get_option('qcld_cross_sell_add_to_cart_grouped_single') : 'View products'; ?>"
                                                           class="form-control">
                                                </div>


                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Display Add to Cart Text End -->

                            <!-- Display Settings Section Start -->
                            <div id="cross_sell-section-flip-4" class="cross_sell-contents">
                                <h2>  <?php  esc_html_e( 'Display Settings', 'qcld-increase-sales' ); ?></h2>
                                <table class="table table-bordered striped">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="admin_display_list_3">
                                                    <p><?php  esc_html_e( 'Increase sales Title font color:', 'qcld-increase-sales' ); ?></p>
                                                    <input type="text" name="qcld_cross_sell_color_title_font"
                                                           value="<?php echo get_option('qcld_cross_sell_color_title_font'); ?>"
                                                           class="cross-sell-bg-color">
                                                </div>


                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="admin_display_list_3">
                                                    <p><?php  esc_html_e( 'Increase sales border Color:', 'qcld-increase-sales' ); ?></p>
                                                    <input type="text" name="qcld_cross_sell_color_border"
                                                           value="<?php echo get_option('qcld_cross_sell_color_border'); ?>"
                                                           class="cross-sell-bg-color">
                                                </div>


                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="admin_display_list_3">
                                                    <p><?php  esc_html_e( 'Increase sales border Hover Color:', 'qcld-increase-sales' ); ?></p>
                                                    <input type="text" name="qcld_cross_sell_color_border_hover"
                                                           value="<?php echo get_option('qcld_cross_sell_color_border_hover'); ?>"
                                                           class="cross-sell-bg-color">
                                                </div>


                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Display Settings Section End -->

                            <!-- Language Section Start -->
                            <div id="cross_sell-section-flip-2" class="cross_sell-contents">
                                <h2>  <?php  esc_html_e( 'LANGUAGE CENTER', 'qcld-increase-sales' ); ?></h2>
                                <table class="table table-bordered striped">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div id="jarvis-ajax-search-message">
                                                    <div class="form-group">
                                                        <p class="qc-opt-dcs-font"><?php  esc_html_e( 'You may also like:', 'qcld-increase-sales' ); ?></p>
                                                        <input type="text" class="form-control qc-opt-dcs-font"
                                                               name="qcld_cross_sell_lang_wrap_title"
                                                               value="<?php echo esc_attr(get_option('qcld_cross_sell_lang_wrap_title')); ?>">
                                                    </div>
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div id="jarvis-ajax-search-message">
                                                    <div class="form-group">
                                                        <p class="qc-opt-dcs-font"> <?php  esc_html_e( 'Add to cart', 'qcld-increase-sales' ); ?></p>
                                                        <input type="text" class="form-control qc-opt-dcs-font"
                                                               name="qcld_cross_sell_lang_add_to_cart"
                                                               value="<?php echo esc_attr(get_option('qcld_cross_sell_lang_add_to_cart')); ?>">
                                                    </div>
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div id="jarvis-ajax-search-message">
                                                    <div class="form-group">
                                                        <p class="qc-opt-dcs-font"> <?php esc_html_e( 'Out of Stock', 'qcld-increase-sales' ); ?></p>
                                                        <input type="text" class="form-control qc-opt-dcs-font"
                                                               name="qcld_cross_sell_lang_out_of_stock"
                                                               value="<?php echo esc_attr(get_option('qcld_cross_sell_lang_out_of_stock')); ?>">
                                                    </div>
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div id="jarvis-ajax-search-message">
                                                    <div class="form-group">
                                                        <p class="qc-opt-dcs-font"> <?php esc_html_e( 'Continue Shopping', 'qcld-increase-sales' ); ?></p>
                                                        <input type="text" class="form-control qc-opt-dcs-font"
                                                               name="qcld_cross_sell_lang_continue_shopping"
                                                               value="<?php echo esc_attr(get_option('qcld_cross_sell_lang_continue_shopping')); ?>">
                                                    </div>
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div id="jarvis-ajax-search-message">
                                                    <div class="form-group">
                                                        <p class="qc-opt-dcs-font"> <?php esc_html_e( 'Would you like some more goods?', 'qcld-increase-sales' ); ?></p>
                                                        <input type="text" class="form-control qc-opt-dcs-font"
                                                               name="qcld_cross_sell_lang_continue_shopping_text"
                                                               value="<?php echo esc_attr(get_option('qcld_cross_sell_lang_continue_shopping_text')); ?>">
                                                    </div>
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div id="jarvis-ajax-search-message">
                                                    <div class="form-group">
                                                        <p class="qc-opt-dcs-font"> <?php  esc_html_e( 'min ago', 'qcld-increase-sales' ); ?></p>
                                                        <input type="text" class="form-control qc-opt-dcs-font"
                                                               name="qcld_cross_sell_order_notification_min_ago"
                                                               value="<?php echo esc_attr(get_option('qcld_cross_sell_order_notification_min_ago')); ?>">
                                                    </div>
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Language Section End -->

                            <!-- Custom CSS Section Start -->
                            <div id="cross_sell-section-flip-3" class="cross_sell-contents">
                              <h2><?php  esc_html_e( 'Custom CSS', 'qcld-increase-sales' ); ?></h2>
                               <div class="top-section">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <p class="qc-opt-dcs-font"><?php  esc_html_e( 'You can paste or write your custom css
                                                here.', 'qcld-increase-sales' ); ?></p>
                                            <textarea name="qcld_cross_sell_custom_global_css"
                                                      class="form-control cross_sell-custom-global-css"
                                                      cols="10"
                                                      rows="4"><?php echo esc_textarea(get_option('qcld_cross_sell_custom_global_css')); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Custom CSS Section End -->

                            <!-- Help Section Start -->
                            <div id="cross_sell-section-flip-5" class="cross_sell-contents">
                              <h2><?php  esc_html_e( 'Help', 'qcld-increase-sales' ); ?></h2>
                               <div class="top-section qcld-cross-sell-help">
                                   <h4><?php  esc_html_e( 'This plugin uses the Cross Sell Products you added for each product under Related Products->Cross-sells', 'qcld-increase-sales' ); ?></h4>

                                   <img src="<?php echo esc_url(QCLD_cross_sell_IMAGE_URL); ?>/increase-sell-admin-product.png">
                               
                                </div>
                            </div>
                            <!-- Help Section End -->

                            <!-- Supports Section Start -->
                            <div id="cross_sell-section-flip-6" class="cross_sell-contents">
                               <div class="top-section">
                                   <?php echo qcld_cross_sell_promo_support_page_callback_func(); ?>
                                </div>
                            </div>
                            <!-- Supports Section End -->

                        </div><!-- /content -->
                    </div><!-- /tabs-cross_sell -->
                    <hr>
                    <div class="row">
                        <div class="text-left col-sm-3 col-sm-offset-2">
                            <input type="button" class="btn btn-warning submit-button cross_sell-reset-options-default"
                                   id="cross_sell-reset-options-default"
                                   value="<?php esc_html_e('Reset all options to default', 'qcld-increase-sales'); ?>" />
                        </div>
                        <div class="text-right col-sm-6">
                            <input type="hidden" name="action" value="cross_sell-submitted" />
                            <input type="submit" class="btn btn-primary submit-button" name="qcld_cross_sell_submit"
                                   id="submit" value="<?php esc_html_e('Save Settings', 'qcld-increase-sales'); ?>" />
                        </div>
                    </div>

                </section>
            </div>


            <?php wp_nonce_field('qcld-increase-sales'); ?>
        </form>



<?php

}
}