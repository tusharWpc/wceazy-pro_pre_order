<?php

$wceazy_order_cancel_settings = get_option('wceazy_order_cancel_settings', False);
$wceazy_oc_settings = $wceazy_order_cancel_settings ? json_decode($wceazy_order_cancel_settings, true) : array();


    $order_statuses = [
        'processing' => 'Processing',
        'on-hold' => 'On Hold',
        'pending' => 'Pending',
        'completed' => 'Completed',
        'failed' => 'Failed',
        'checkout-draft' => 'Draft',
        'refunded'=> 'Refunded'
    ];
    
    $pocicy_text = 'Please, be sure to checkout our refund policy.';
    $default_statuses = array('processing', 'on-hold');
    
    $wceazy_oc_allowed_status = isset($wceazy_oc_settings["wceazy_oc_allowed_status"]) ? explode(",",$wceazy_oc_settings["wceazy_oc_allowed_status"]) : $default_statuses;
    
    $wceazy_oc_cancellation_policy_url = isset($wceazy_oc_settings["add_to_cart_btn_text"]) ? $wceazy_oc_settings["add_to_cart_btn_text"] : "";
    $wceazy_oc_request_btn_color = isset($wceazy_oc_settings["search_filter_label_color"]) ? $wceazy_oc_settings["search_filter_label_color"] : "#6E32C9";
    $wceazy_oc_request_btn_bg = isset($wceazy_oc_settings["search_filter_label_bg"]) ? $wceazy_oc_settings["search_filter_label_bg"] : "#fff";
    $wceazy_oc_policy_text = isset($wceazy_oc_settings["wceazy_oc_policy_text"]) ? $wceazy_oc_settings["wceazy_oc_policy_text"] : $pocicy_text;

?>


<div id="wceazy_order_cancel">

    <div class="wceazy_order_cancel_header">
        <div class="wceazy_header_part_left">
            <p><?php esc_html_e('wcEazy Pro', 'wceazy'); ?><span><?php echo esc_attr(WCEAZY_PRO_VERSION); ?></span></p>
        </div>
        <div class="wceazy_header_part_right">
            <a target="_blank" href="<?php echo WCEAZY_PRO_HELP_PAGE; ?>"><?php esc_html_e('Need help?', 'wceazy'); ?></a>
        </div>
    </div>

    <div class="wceazy_order_cancel_page_title">
        <div class="page_title_part_left">
            <h2><?php esc_html_e('Order Cancel', 'wceazy'); ?></h2>
            <a target="_blank" href="<?php echo WCEAZY_PRO_DOCS_PAGE; ?>"><?php esc_html_e('Documentation', 'wceazy'); ?></a>
        </div>
        <div class="page_title_part_right">
            <!-- <button class="wceazy_order_cancel_copy_shortcode" onclick="wceazy_order_cancel_copy_shortcode()" style="display: inline-block;">[wceazy_order_cancel]</button> -->
            <button class="wceazy_order_cancel_back_to_dashboard_btn" onclick="wceazy_modules_page_init(`<?php echo esc_url(WCEAZY_PRO_URL); ?>`)"><?php esc_html_e('Back to all Modules', 'wceazy'); ?></button>
        </div>
    </div>



    <div class="wceazy_order_cancel_container">

        <div class="wceazy_order_cancel_tab wceazy_horizontal_tab">
            <div class="wceazy_order_cancel_tab_part_left">
                <div class="coupon_data_tabs">
                    <div class="tab_item tab_item_active" data-target="tab_general"><h1><?php esc_html_e('Cancel Requests', 'wceazy'); ?></h1></div>
                    <div class="tab_item" data-target="tab_product"><h1><?php esc_html_e('Settings', 'wceazy'); ?></h1></div>
                    <div class="tab_item" data-target="tab_search_filter"><h1><?php esc_html_e('Styles', 'wceazy'); ?></h1></div>

                </div>
            </div>

            <div class="wceazy_order_cancel_tab_part_right">

                <div class="coupon_tab_body" data-id="tab_general">
                    
                    <div class="wceazy_order_cancel_container">
                        <form action="#" id="posts-filter" method="get">

                            <div class="wceazy_order_cancel_table_top_actions">
                                <div class="wceazy_order_cancel_top_actions_part_left">
                                    <p><?php esc_html_e('Per page view', 'wceazy'); ?></p>
                                    <select class="wceazy_order_cancel_items_per_page">
                                        <option value="10"><?php esc_html_e('10', 'wceazy'); ?></option>
                                        <option value="20"><?php esc_html_e('20', 'wceazy'); ?></option>
                                        <option value="30"><?php esc_html_e('30', 'wceazy'); ?></option>
                                        <option value="40"><?php esc_html_e('40', 'wceazy'); ?></option>
                                        <option value="50"><?php esc_html_e('50', 'wceazy'); ?></option>
                                        <option value="60"><?php esc_html_e('60', 'wceazy'); ?></option>
                                        <option value="70"><?php esc_html_e('70', 'wceazy'); ?></option>
                                        <option value="80"><?php esc_html_e('80', 'wceazy'); ?></option>
                                        <option value="90"><?php esc_html_e('90', 'wceazy'); ?></option>
                                        <option value="100"><?php esc_html_e('100', 'wceazy'); ?></option>
                                    </select>

                                    <!-- <select class="wceazy_order_cancel_bulk_action_type" onchange="wceazy_order_cancel_bulk_edit_check_ability()">
                                        <option value="">Bulk actions</option>
                                        <option value="add">Approve</option>
                                        <option value="remove">Decline</option>
                                    </select> -->
                                    <!-- <input type="button" class="wceazy_order_cancel_bulk_edit_btn" value="Apply" onclick="wceazy_order_cancel_bulk_edit()" disabled> -->
                                    <select class="wceazy_order_cancel_filter_discount_type">
                                        <option value=""><?php esc_html_e('Show all types', 'wceazy'); ?></option>
                                        <option value="approved"><?php esc_html_e('Approved', 'wceazy'); ?></option>
                                        <option value="pending"><?php esc_html_e('Pending', 'wceazy'); ?></option>
                                        <option value="declined"><?php esc_html_e('Declined', 'wceazy'); ?></option>
                                    </select>

                                </div>
                                <div class="wceazy_order_cancel_top_actions_part_right">
                                    <input type="text" placeholder="Search">
                                </div>
                            </div>



                        </form>
                        <table class="wceazy_order_cancel_table">
                        <thead>
                            <tr>
                                <td class="no-sort">
                                    <input type="checkbox" onchange="wceazy_order_cancel_checkbox_select_all(this)">
                                </td>
                                <th><?php esc_html_e('Order', 'wceazy'); ?></th>
                                <th><?php esc_html_e('Date', 'wceazy'); ?></th>
                                <th><?php esc_html_e('Amount', 'wceazy'); ?></th>
                                <th><?php esc_html_e('Status', 'wceazy'); ?></th>
                                <th><?php esc_html_e('Request Status', 'wceazy'); ?></th>
                                <th><?php esc_html_e('Action', 'wceazy'); ?></th>
                            </tr>
                        </thead>

                            <tbody class="wceazy_order_cancel_table_body"></tbody>
                        </table>
                    </div>
                    
                </div>

                <div class="coupon_tab_body" data-id="tab_product">
                    <div class="tab_body_title"><h1><?php esc_html_e('Product Settings', 'wceazy'); ?></h1></div>
                    <div class="tab_body_form">
                    
                        <!-- wceazy_floating_cart_select_field -->
                        <div class="wceazy_order_cancel_field_group wceazy_order_cancel_allowed_status ">
                            <label for="coupon_generator_coupon_amount"><?php esc_html_e('Select allowed status', 'wceazy'); ?></label>
                            <div class="field_with_msg_container">
                                <select class="wceazy_order_cancel_select_field wceazy_floating_cart_select_field" multiple="multiple">
                                    <option value=""> <?php esc_html_e('Please select', 'wceazy'); ?></option>
                                    <?php foreach ($order_statuses as $name => $title) { ?>
                                        <option value="<?php echo esc_attr($name); ?>" <?php echo esc_attr(in_array($name, $wceazy_oc_allowed_status) ? "selected" : ""); ?>> <?php echo esc_attr($title); ?> </option>
                                    <?php } ?>
                                </select>
                                <small><?php esc_html_e('Customers can only cancel orders in certain statuses.', 'wceazy'); ?></small>
                            </div>
                        </div>
                        
                        <!-- wc eazy_pdf_invoice_textarea_field -->
                        <div class="wceazy_oc_invoice_field_group wceazy_order_cancel_field_group wceazy_oc_policy_text wceazy_pdf_invoice_field_group">
                            <label for="coupon_generator_coupon_amount"><?php esc_html_e('Cancellation Policy', 'wceazy'); ?></label>
                            <div class="field_with_msg_container">
                                <textarea class="wceazy_oc_policy_textarea_field wceazy_pdf_invoice_textarea_field" rows="3"><?php echo esc_attr($wceazy_oc_policy_text); ?></textarea>
                                <small><?php esc_html_e('Type rules for canceling in the pop-up box (HTML allowed).', 'wceazy'); ?></small>
                            </div>
                        </div>
                        <div class="wceazy_order_cancel_field_group wceazy_order_cancel_add_to_cart_btn_text">
                            <label for="coupon_generator_coupon_amount"><?php esc_html_e('Cacellation Policy Link', 'wceazy'); ?></label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_order_cancel_text_field" type="text" placeholder="https://mysite.com/cancellation-policy" value="<?php echo esc_attr($wceazy_oc_cancellation_policy_url); ?>">
                                <small><?php esc_html_e('Set the Cacellation Policy Link', 'wceazy'); ?></small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="coupon_tab_body" data-id="tab_search_filter">
                    <div class="tab_body_title"><h1><?php esc_html_e('Search Filter Settings', 'wceazy'); ?></h1></div>
                    <div class="tab_body_form">


                        <div class="wceazy_order_cancel_field_group wceazy_order_cancel_search_filter_label_color">
                            <label for="coupon_generator_coupon_amount"><?php esc_html_e('Change the "Cancel" button color.', 'wceazy'); ?></label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input type="color" id="wceazy_order_cancel_btn_font_color" value="<?php echo esc_attr($wceazy_oc_request_btn_color); ?>">
                                    <label for="wceazy_order_cancel_btn_font_color"><?php esc_html_e('Select Color', 'wceazy'); ?></label>
                                </div>
                                <small><?php esc_html_e('Provide the color for cancellation Reqeust Submit Button for the popup form.', 'wceazy'); ?></small>
                            </div>
                        </div>
                        <div class="wceazy_order_cancel_field_group wceazy_order_cancel_search_filter_label_bg">
                            <label for="coupon_generator_coupon_amount"><?php esc_html_e('Cancel Button Background', 'wceazy'); ?></label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input type="color" id="wceazy_order_cancel_btn_font_color" value="<?php echo esc_attr($wceazy_oc_request_btn_bg); ?>">
                                    <label for="wceazy_order_cancel_btn_font_color"><?php esc_html_e('Select Color', 'wceazy'); ?></label>
                                </div>
                                <small><?php esc_html_e('Provide the color for Cancel Button Background for the popup form.', 'wceazy'); ?></small>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>


        <div class="wceazy_order_cancel_bottom_button_section">
            <button onclick="wceazy_order_cancel_save();"><?php esc_html_e('Save Settings', 'wceazy'); ?></button>
        </div>

    </div>

</div>

<div class="wceazy_order_cancel_popup request-accept">
    <div class="wceazy_popup_inar">
        <div class="successes_message">
            <h6 class="wceazy-popup-content-title"><?php esc_html_e('Cancellation Details', 'wceazy'); ?></h6>
            <p class="wceazy-popup-content"><?php esc_html_e('Are you sure? ', 'wceazy'); ?></p>
            <div class="wceazy-btn-wrapper">
                <button type="button" class="wceazy-btn-success"><?php esc_html_e('Approve Request', 'wceazy'); ?></button>
            </div>
            <button class="wceazy_close_popup" onclick="wceazy_order_cancel_close_popup();"></button>
        </div>
    </div>
</div>

<div class="wceazy_order_cancel_popup request-decline">
    <div class="wceazy_popup_inar">
        <div class="successes_message">
            <h6 class="wceazy-popup-content-title"><?php esc_html_e('Cancellation Details', 'wceazy'); ?></h6>
            <p class="wceazy-popup-content"><?php esc_html_e('Are you sure? ', 'wceazy'); ?></p>
            <div class="wceazy-btn-wrapper">
                <button type="button" class="wceazy-btn-success"><?php esc_html_e('Decline Request', 'wceazy'); ?></button>
            </div>
            <button class="wceazy_close_popup" onclick="wceazy_order_cancel_close_popup();"></button>
        </div>
    </div>
</div>

