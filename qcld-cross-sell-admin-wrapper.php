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
                <p><?php esc_html_e('Increase sales on your store by strategically placing the cross-sell items during customer checkout.', 'qcld-increase-sales'); ?></p>
     
                <section class="cross_sell-tab-container-inner">
                    <div class="tabs-cross_sell tabs-cross_sell-style-flip">
                        <nav>
                            <ul class="cross_sell-tabs-nav">
                                <li class="cross_sell-tab-active"><a href="#cross_sell-section-flip-1"><i class="fa fa-cogs"></i><span> <?php  esc_html_e( 'Cross-sells Settings', 'qcld-increase-sales' ); ?></span></a>
                                </li>
                                <li><a href="#cross_sell-section-flip-7"><i class="fa fa-shopping-cart"></i><span> <?php  esc_html_e( 'Continue Shopping', 'qcld-increase-sales' ); ?> </span></a></li>
                                <li><a href="#cross_sell-section-flip-8"><i class="fa fa-bell"></i><span> <?php  esc_html_e( 'Order Notification', 'qcld-increase-sales' ); ?> </span></a></li>
                                <li><a href="#cross_sell-section-flip-4"><i class="fa fa-cog"></i><span> <?php  esc_html_e( 'Display Settings', 'qcld-increase-sales' ); ?> </span></a></li>
                                <li><a href="#cross_sell-section-flip-2"><i class="fa fa-language"></i><span> <?php  esc_html_e( 'LANGUAGE CENTER', 'qcld-increase-sales' ); ?> </span></a></li>
                                <li><a href="#cross_sell-section-flip-3"><i class="fa fa-code"></i><span> <?php  esc_html_e( 'Custom CSS', 'qcld-increase-sales' ); ?> </span></a></li>
                                <li><a href="#cross_sell-section-flip-5"><i class="fa fa-question-circle" aria-hidden="true"></i></i><span> <?php  esc_html_e( 'Help', 'qcld-increase-sales' ); ?> </span></a></li>
                                <li><a href="#cross_sell-section-flip-6"><i class="fa fa-ambulance" aria-hidden="true"></i></i><span> <?php  esc_html_e( 'Support', 'qcld-increase-sales' ); ?> </span></a></li>
                            </ul>
                        </nav>

                        <!-- General Section Start -->
                        <div class="cross_sell-content-wrap">
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

                            <!-- Order Notification Section Start -->
                            <div id="cross_sell-section-flip-8" class="cross_sell-contents">
                                <h2>  <?php  esc_html_e( 'Order Notification', 'qcld-increase-sales' ); ?></h2>
                                <table class="table table-bordered striped">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p class="qc-opt-title-font"><?php  esc_html_e( 'Enable Sale Notification', 'qcld-increase-sales' ); ?></p>
                                                <div class="cross_sell-cxsc-settings-blocks">
                                                    <input id="qcld_cross_sell_order_notification_enable" type="checkbox" name="qcld_cross_sell_order_notification_enable" value="<?php echo esc_attr('1'); ?>" <?php echo esc_attr(get_option('qcld_cross_sell_order_notification_enable') == '1' ? 'checked' : ''); ?>>
                                                    <label for="qcld_cross_sell_order_notification_enable"> <?php  esc_html_e( 'Enable Sale Notification', 'qcld-increase-sales' ); ?></label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="qc-opt-title-font"><?php  esc_html_e( 'Disable sale notification in mobile', 'qcld-increase-sales' ); ?></p>
                                                <div class="cross_sell-cxsc-settings-blocks">
                                                    <input id="qcld_cross_sell_order_notification_disable_mobile" type="checkbox" name="qcld_cross_sell_order_notification_disable_mobile" value="<?php echo esc_attr('1'); ?>" <?php echo esc_attr(get_option('qcld_cross_sell_order_notification_disable_mobile') == '1' ? 'checked' : ''); ?>>
                                                    <label for="qcld_cross_sell_order_notification_disable_mobile"> <?php  esc_html_e( 'Disable sale notification in mobile', 'qcld-increase-sales' ); ?></label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="qc-opt-title-font"><?php  esc_html_e( 'Disable Sale Notification Sound', 'qcld-increase-sales' ); ?></p>
                                                <div class="cross_sell-cxsc-settings-blocks">
                                                    <input id="qcld_cross_sell_order_notification_sound" type="checkbox" name="qcld_cross_sell_order_notification_sound" value="<?php echo esc_attr('1'); ?>" <?php echo esc_attr(get_option('qcld_cross_sell_order_notification_sound') == '1' ? 'checked' : ''); ?>>
                                                    <label for="qcld_cross_sell_order_notification_sound"> <?php  esc_html_e( 'Disable Sale Notification Sound', 'qcld-increase-sales' ); ?></label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="qc-opt-title-font"><?php  esc_html_e( 'Global notification delay time for artificial sale in sec', 'qcld-increase-sales' ); ?></p>

                                                <div class="cross_sell-cxsc-settings-blockss">
                                                    <input id="qcld_cross_sell_order_notification_global" type="text" class="qc-opt-dcs-font"
                                                        name="qcld_cross_sell_order_notification_global"
                                                        value="<?php echo esc_attr(get_option('qcld_cross_sell_order_notification_global')); ?>" placeholder="<?php  esc_html_e( '', 'qcld-increase-sales' ); ?>">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="qc-opt-title-font-padding"><b><?php  esc_html_e( 'Generate Artificial Sale', 'qcld-increase-sales' ); ?></b></p>
                                            </td>
                                        </tr>

                                        <?php 

                                        $qcld_cross_sell_order_fake_product                     = unserialize( get_option('qcld_cross_sell_order_fake_product'));
                                        $qcld_cross_sell_order_notification_customer_name       = unserialize( get_option('qcld_cross_sell_order_notification_customer_name'));
                                        $qcld_cross_sell_order_notification_customer_address    = unserialize( get_option('qcld_cross_sell_order_notification_customer_address'));
                                        $qcld_cross_sell_order_notification_fake_sale_duration  = unserialize( get_option('qcld_cross_sell_order_notification_fake_sale_duration'));

                                        if (!empty($qcld_cross_sell_order_fake_product )) {

                                            for($i = 0; $i<count($qcld_cross_sell_order_fake_product); ++$i) {
                                        ?>

                                        <tr class="cross_sell-artificial-sell-pro">
                                            <td>
                                                <div class="cross_sell-artificial-sell-pros">
                                                <p class="qc-opt-title-font"><?php  esc_html_e( 'Select a product', 'qcld-increase-sales' ); ?></p>
                                                <div class="cross_sell-cxsc-settings-blocks">

                                                    <?php $params = array('posts_per_page' => 20, 'post_type' => 'product');
                                                    $wc_query = new WP_Query($params); ?>
                                                    <select name="qcld_cross_sell_order_fake_product[]"
                                                            class="qcld_cross_sell_select_two">
                                                        <?php if ($wc_query->have_posts()) : ?>
                                                            <?php while ($wc_query->have_posts()) :$wc_query->the_post(); ?>
                                                                <option value="<?php the_ID(); ?>" <?php if($qcld_cross_sell_order_fake_product[$i] == get_the_ID()){ echo 'selected'; }; ?>>
                                                                    <?php the_title(); ?>
                                                                </option>
                                                            <?php endwhile; ?>
                                                            <?php wp_reset_postdata(); ?>
                                                        <?php else: ?>
                                                            <li>
                                                                <?php _e('No Products'); ?>
                                                            </li>
                                                        <?php endif; ?>
                                                    </select>


                                                </div>
                                                <p class="qc-opt-title-font"><?php  esc_html_e( 'Customer Name', 'qcld-increase-sales' ); ?></p>

                                                <div class="cross_sell-cxsc-settings-blocks">
                                                    
                                                    <input id="qcld_cross_sell_order_notification_customer_name" type="text" class="form-control qc-opt-dcs-font"
                                                        name="qcld_cross_sell_order_notification_customer_name[]"
                                                        value="<?php echo esc_attr($qcld_cross_sell_order_notification_customer_name[$i]); ?>" placeholder="<?php  esc_html_e( 'Customer Name', 'qcld-increase-sales' ); ?>">
                                                </div>
                                                <p class="qc-opt-title-font"><?php  esc_html_e( 'Customer Address', 'qcld-increase-sales' ); ?></p>

                                                <div class="cross_sell-cxsc-settings-blockss">
                                                    <textarea id="qcld_cross_sell_order_notification_customer_address" type="text" class="form-control qc-opt-dcs-font"
                                                        name="qcld_cross_sell_order_notification_customer_address[]"
                                                         placeholder="<?php  esc_html_e( 'Customer Address', 'qcld-increase-sales' ); ?>"><?php echo esc_attr($qcld_cross_sell_order_notification_customer_address[$i]); ?></textarea>
                                                </div>
                                                <p class="qc-opt-title-font"><?php  esc_html_e( 'Fake Sale Notification Duration Time in second', 'qcld-increase-sales' ); ?></p>

                                                <div class="cross_sell-cxsc-settings-blockss">
                                                    <input id="qcld_cross_sell_order_notification_fake_sale_duration" type="text" class="qc-opt-dcs-font"
                                                        name="qcld_cross_sell_order_notification_fake_sale_duration[]"
                                                        value="<?php echo esc_attr($qcld_cross_sell_order_notification_fake_sale_duration[$i]); ?>" placeholder="<?php  esc_html_e( '', 'qcld-increase-sales' ); ?>">
                                                </div>
                                                <?php if($i > 0){ ?>
                                                <div class="col-xs-12 text-right"><button type="button" class="btn btn-danger btn-xs qcld-remove-item"><i class="fa fa-times" aria-hidden="true"></i> Remove </button></div>
                                                <?php } ?>

                                                </div>
                                            </td>
                                        </tr>
                                        <?php

                                            }
                                        }else{

                                        ?>

                                        <tr class="cross_sell-artificial-sell-pro">
                                            <td>
                                                <div class="cross_sell-artificial-sell-pros">
                                                <p class="qc-opt-title-font"><?php  esc_html_e( 'Select a product', 'qcld-increase-sales' ); ?></p>
                                                <div class="cross_sell-cxsc-settings-blocks">

                                                    <?php $params = array('posts_per_page' => 20, 'post_type' => 'product');
                                                    $wc_query = new WP_Query($params); ?>
                                                    <select name="qcld_cross_sell_order_fake_product[]"
                                                            class="qcld_cross_sell_select_two">
                                                        <?php if ($wc_query->have_posts()) : ?>
                                                            <?php while ($wc_query->have_posts()) :$wc_query->the_post(); ?>
                                                                <option value="<?php the_ID(); ?>">
                                                                    <?php the_title(); ?>
                                                                </option>
                                                            <?php endwhile; ?>
                                                            <?php wp_reset_postdata(); ?>
                                                        <?php else: ?>
                                                            <li>
                                                                <?php _e('No Products'); ?>
                                                            </li>
                                                        <?php endif; ?>
                                                    </select>


                                                </div>
                                                <p class="qc-opt-title-font"><?php  esc_html_e( 'Customer Name', 'qcld-increase-sales' ); ?></p>

                                                <div class="cross_sell-cxsc-settings-blocks">
                                                    
                                                    <input id="qcld_cross_sell_order_notification_customer_name" type="text" class="form-control qc-opt-dcs-font"
                                                        name="qcld_cross_sell_order_notification_customer_name[]"
                                                        value="" placeholder="<?php  esc_html_e( 'Customer Name', 'qcld-increase-sales' ); ?>">
                                                </div>
                                                <p class="qc-opt-title-font"><?php  esc_html_e( 'Customer Address', 'qcld-increase-sales' ); ?></p>

                                                <div class="cross_sell-cxsc-settings-blockss">
                                                    <textarea id="qcld_cross_sell_order_notification_customer_address" type="text" class="form-control qc-opt-dcs-font"
                                                        name="qcld_cross_sell_order_notification_customer_address[]" placeholder="<?php  esc_html_e( 'Customer Address', 'qcld-increase-sales' ); ?>"></textarea>
                                                </div>
                                                <p class="qc-opt-title-font"><?php  esc_html_e( 'Fake Sale Notification Duration Time in second', 'qcld-increase-sales' ); ?></p>

                                                <div class="cross_sell-cxsc-settings-blockss">
                                                    <input id="qcld_cross_sell_order_notification_fake_sale_duration" type="text" class="qc-opt-dcs-font"
                                                        name="qcld_cross_sell_order_notification_fake_sale_duration[]"
                                                        value="3" placeholder="<?php  esc_html_e( '', 'qcld-increase-sales' ); ?>">
                                                </div>

                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                        <tr>
                                            <td>
                                               
                                                <div class="row qcld-cross-sell-padding-top">
                                                    <div class="col-sm-6 text-left">
                                                        <button class="btn btn-warning add-more-block-inner-set" type="button" id="add-more-block-inner-set"><i
                                                                    class="fa fa-plus" aria-hidden="true"></i> <?php  esc_html_e( 'Add More', 'qcld-increase-sales' ); ?>
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                            <!-- Order Notification Section End -->

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