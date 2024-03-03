<?php

$wceazy_shipping_bar_settings = get_option('wceazy_shipping_bar_settings', False);
$wceazy_sb_settings = $wceazy_shipping_bar_settings ? json_decode($wceazy_shipping_bar_settings, true) : array();

$wceazy_sb_enable_shipping_bar = isset($wceazy_sb_settings["enable_shipping_bar"]) ? $wceazy_sb_settings["enable_shipping_bar"] : "yes";
$wceazy_sb_display_desktop = isset($wceazy_sb_settings["display_desktop"]) ? $wceazy_sb_settings["display_desktop"] : "yes";
$wceazy_sb_display_mobile = isset($wceazy_sb_settings["display_mobile"]) ? $wceazy_sb_settings["display_mobile"] : "yes";
$wceazy_sb_shipping_zone = isset($wceazy_sb_settings["shipping_zone"]) ? $wceazy_sb_settings["shipping_zone"] : "";
$wceazy_sb_dont_show_pages = isset($wceazy_sb_settings["dont_show_pages"]) ? explode(",", $wceazy_sb_settings["dont_show_pages"]) : array();
$wceazy_sb_exclude_products = isset($wceazy_sb_settings["exclude_products"]) ? explode(",", $wceazy_sb_settings["exclude_products"]) : array();

$wceazy_sb_show_in_cart = isset($wceazy_sb_settings["show_in_cart"]) ? $wceazy_sb_settings["show_in_cart"] : "yes";
$wceazy_sb_position_cart_subtotal = isset($wceazy_sb_settings["position_cart_subtotal"]) ? $wceazy_sb_settings["position_cart_subtotal"] : "woocommerce_cart_totals_before_shipping";
$wceazy_sb_show_in_checkout = isset($wceazy_sb_settings["show_in_checkout"]) ? $wceazy_sb_settings["show_in_checkout"] : "yes";
$wceazy_sb_position_checkout_subtotal = isset($wceazy_sb_settings["position_checkout_subtotal"]) ? $wceazy_sb_settings["position_checkout_subtotal"] : "woocommerce_review_order_before_shipping";
$wceazy_sb_cart_checkout_headline = isset($wceazy_sb_settings["cart_checkout_headline"]) ? $wceazy_sb_settings["cart_checkout_headline"] : "Free Shipping";
$wceazy_sb_cart_checkout_progress_bar_bg = isset($wceazy_sb_settings["cart_checkout_progress_bar_bg"]) ? $wceazy_sb_settings["cart_checkout_progress_bar_bg"] : "#0A9663";
$wceazy_sb_cart_checkout_progress_color = isset($wceazy_sb_settings["cart_checkout_progress_color"]) ? $wceazy_sb_settings["cart_checkout_progress_color"] : "#000000";
$wceazy_sb_cart_checkout_progress_text_color = isset($wceazy_sb_settings["cart_checkout_progress_text_color"]) ? $wceazy_sb_settings["cart_checkout_progress_text_color"] : "#ffffff";


$wceazy_sb_zero_order_amount_msg = isset($wceazy_sb_settings["zero_order_amount_msg"]) ? $wceazy_sb_settings["zero_order_amount_msg"] : "Start placing order of minimum {minimum_order} to apply free shipping";
$wceazy_sb_partial_order_amount_msg = isset($wceazy_sb_settings["partial_order_amount_msg"]) ? $wceazy_sb_settings["partial_order_amount_msg"] : "You have purchased {cart_total} of {minimum_order} , Buy {missing_amount} worth products more to get the free shipping";
$wceazy_sb_completed_order_amount_msg = isset($wceazy_sb_settings["completed_order_amount_msg"]) ? $wceazy_sb_settings["completed_order_amount_msg"] : "You are now qualified for the Free shipping, go to {checkout_page}";

$wceazy_sb_initial_delay = isset($wceazy_sb_settings["initial_delay"]) ? $wceazy_sb_settings["initial_delay"] : "0";
$wceazy_sb_allow_disappear_time = isset($wceazy_sb_settings["allow_disappear_time"]) ? $wceazy_sb_settings["allow_disappear_time"] : "no";
$wceazy_sb_disappear_time = isset($wceazy_sb_settings["disappear_time"]) ? $wceazy_sb_settings["disappear_time"] : "0";

$wceazy_sb_position = isset($wceazy_sb_settings["position"]) ? $wceazy_sb_settings["position"] : "top";
$wceazy_sb_layout = isset($wceazy_sb_settings["layout"]) ? $wceazy_sb_settings["layout"] : "1";
$wceazy_sb_bg = isset($wceazy_sb_settings["bg"]) ? $wceazy_sb_settings["bg"] : "#0A9663";
$wceazy_sb_padding_top = isset($wceazy_sb_settings["padding_top"]) ? $wceazy_sb_settings["padding_top"] : "10";
$wceazy_sb_padding_bottom = isset($wceazy_sb_settings["padding_bottom"]) ? $wceazy_sb_settings["padding_bottom"] : "10";
$wceazy_sb_padding_left_right = isset($wceazy_sb_settings["padding_left_right"]) ? $wceazy_sb_settings["padding_left_right"] : "120";
$wceazy_sb_msg_text_color = isset($wceazy_sb_settings["msg_text_color"]) ? $wceazy_sb_settings["msg_text_color"] : "#ffffff";
$wceazy_sb_msg_link_text_color = isset($wceazy_sb_settings["msg_link_text_color"]) ? $wceazy_sb_settings["msg_link_text_color"] : "#ffffff";
$wceazy_sb_msg_font_size = isset($wceazy_sb_settings["msg_font_size"]) ? $wceazy_sb_settings["msg_font_size"] : "16";
$wceazy_sb_msg_text_align = isset($wceazy_sb_settings["msg_text_align"]) ? $wceazy_sb_settings["msg_text_align"] : "center";
$wceazy_sb_remove_icon = isset($wceazy_sb_settings["remove_icon"]) ? $wceazy_sb_settings["remove_icon"] : "icon_1";
$wceazy_sb_remove_icon_color = isset($wceazy_sb_settings["remove_icon_color"]) ? $wceazy_sb_settings["remove_icon_color"] : "#ffffff";
$wceazy_sb_remove_icon_size = isset($wceazy_sb_settings["remove_icon_size"]) ? $wceazy_sb_settings["remove_icon_size"] : "16";
$wceazy_sb_enable_progress_bar = isset($wceazy_sb_settings["enable_progress_bar"]) ? $wceazy_sb_settings["enable_progress_bar"] : "yes";
$wceazy_sb_progress_margin_top = isset($wceazy_sb_settings["progress_margin_top"]) ? $wceazy_sb_settings["progress_margin_top"] : "5";
$wceazy_sb_progress_bar_bg = isset($wceazy_sb_settings["progress_bar_bg"]) ? $wceazy_sb_settings["progress_bar_bg"] : "#ffffff";
$wceazy_sb_progress_color = isset($wceazy_sb_settings["progress_color"]) ? $wceazy_sb_settings["progress_color"] : "#000000";
$wceazy_sb_progress_text_color = isset($wceazy_sb_settings["progress_text_color"]) ? $wceazy_sb_settings["progress_text_color"] : "#ffffff";
$wceazy_sb_progress_font_size = isset($wceazy_sb_settings["progress_font_size"]) ? $wceazy_sb_settings["progress_font_size"] : "15";
$wceazy_sb_progress_border_radius = isset($wceazy_sb_settings["progress_border_radius"]) ? $wceazy_sb_settings["progress_border_radius"] : "20";


?>


<div id="wceazy_shipping_bar">
    <div class="wceazy_shipping_bar_header">
        <div class="wceazy_header_part_left">
            <p>
                <?php esc_html_e('wcEazy Pro', 'wceazy'); ?> <span>
                    <?php echo esc_attr(WCEAZY_PRO_VERSION); ?>
                </span>
            </p>
        </div>
        <div class="wceazy_header_part_right">
            <a target="_blank" href="<?php echo WCEAZY_PRO_HELP_PAGE; ?>">
                <?php esc_html_e('Need help?', 'wceazy'); ?>
            </a>
        </div>
    </div>

    <div class="wceazy_shipping_bar_page_title">
        <div class="page_title_part_left">
            <h2>
                <?php esc_html_e('Free Shipping Bar', 'wceazy'); ?>
            </h2>
            <a target="_blank" href="<?php echo WCEAZY_PRO_DOCS_PAGE; ?>">
                <?php esc_html_e('Documentation', 'wceazy'); ?>
            </a>
        </div>
        <div class="page_title_part_right">
            <button class="wceazy_shipping_bar_back_to_dashboard_btn"
                onclick="wceazy_modules_page_init(`<?php echo esc_url(WCEAZY_PRO_URL); ?>`)">
                <?php esc_html_e('Back to all Modules', 'wceazy'); ?>
            </button>
        </div>
    </div>

    <div class="wceazy_shipping_bar_container">
        <div class="wceazy_shipping_bar_tab">
            <div class="wceazy_shipping_bar_tab_part_left">
                <div class="coupon_data_tabs">
                    <div class="tab_item tab_item_active" data-target="tab_general">
                        <h1>General</h1>
                    </div>
                    <div class="tab_item" data-target="tab_cart_and_checkout">
                        <h1>
                            <?php esc_html_e('Cart & Checkout', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_item" data-target="tab_messages">
                        <h1>
                            <?php esc_html_e('Messages', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_item" data-target="tab_effect">
                        <h1>
                            <?php esc_html_e('Effect', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_item" data-target="tab_style">
                        <h1>
                            <?php esc_html_e('Style', 'wceazy'); ?>
                        </h1>
                    </div>
                </div>
            </div>

            <div class="wceazy_shipping_bar_tab_part_right">
                <div class="coupon_tab_body" data-id="tab_general">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('General Settings', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_body_form">
                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_enable_shipping_bar">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Enable Shipping Bar', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_sb_enable_shipping_bar == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Turn ON the switch to enable the Shipping Bar.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_display_desktop">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Display in Desktop', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_sb_display_desktop == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Turn ON the switch to show the Shipping Bar on the Desktop Screen.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_display_mobile">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Display in Mobile', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_sb_display_mobile == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Turn ON the switch to show the Shipping Bar on the Mobile Screen.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_shipping_zone">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Select Shipping Zone', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <select class="wceazy_shipping_bar_select_field">
                                    <option value="">
                                        <?php esc_html_e('Please select', 'wceazy'); ?>
                                    </option>
                                    <?php foreach ($this->shipping_bar->utils->wceazy_get_all_free_shipping_zone() as $id => $zone) { ?>
                                        <option value="<?php echo esc_attr($id); ?>" <?php echo esc_attr($id == $wceazy_sb_shipping_zone ? "selected" : ""); ?>>
                                            <?php echo esc_attr($zone); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <small style="color:#e91717">
                                    <?php esc_html_e('You must select your shipping zone, if not created please create', 'wceazy'); ?>
                                    <a target="_blank" style="color:#f109aa; margin-left:3px"
                                        href="<?php echo esc_url(admin_url('admin.php?page=wc-settings&tab=shipping')); ?>">
                                        <?php esc_html_e('Here', 'wceazy'); ?>
                                    </a>.
                                </small>
                            </div>
                        </div>



                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_dont_show_pages">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Exclude Pages', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <select class="wceazy_shipping_bar_select_field" multiple="multiple">
                                    <option value="">
                                        <?php esc_html_e('Please select', 'wceazy'); ?>
                                    </option>
                                    <?php foreach (get_pages() as $page) { ?>
                                        <option value="<?php echo esc_attr($page->ID); ?>" <?php echo esc_attr(in_array($page->ID, $wceazy_sb_dont_show_pages) ? "selected" : ""); ?>>
                                            <?php echo esc_html($page->post_title); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <small>
                                    <?php esc_html_e('Select the pages where you don\'t want to show the Free Shipping Bar.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_exclude_products">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Exclude Products', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <select class="wceazy_shipping_bar_select_field" multiple="multiple">
                                    <option value="">
                                        <?php esc_html_e('Please select', 'wceazy'); ?>
                                    </option>
                                    <?php foreach ($this->shipping_bar->utils->getWooProducts() as $key => $product) { ?>
                                        <option value="<?php echo esc_attr($product["id"]); ?>" <?php echo esc_attr(in_array($product["id"], $wceazy_sb_exclude_products) ? "selected" : ""); ?>>
                                            <?php echo esc_html($product["text"]); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <small>
                                    <?php esc_html_e('Select the products for which you don\'t want to allow Free Shipping Bar.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="coupon_tab_body" data-id="tab_cart_and_checkout">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('Cart & Checkout Page Settings', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_body_form">
                        <h4>
                            <?php esc_html_e('Cart Page', 'wceazy'); ?>
                        </h4>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_show_in_cart">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Show in Cart Subtotal Area', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_sb_show_in_cart == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Turn ON the switch to show the free shipping notification in cart page subtotal area.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>


                        <h4>
                            <?php esc_html_e('Checkout Page', 'wceazy'); ?>
                        </h4>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_show_in_checkout">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Show in Checkout Subtotal Area', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_sb_show_in_checkout == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Turn ON the switch to show the free shipping notification in checkout subtotal area.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <h4>
                            <?php esc_html_e('Style', 'wceazy'); ?>
                        </h4>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_cart_checkout_headline">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Headline Text', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_shipping_bar_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_sb_cart_checkout_headline); ?>">
                                <small>
                                    <?php esc_html_e('Enter cart & checkout page free shipping progress bar headline text.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="coupon_tab_body" data-id="tab_messages">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('Customize Messages', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_body_form">

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_zero_order_amount_msg">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Message on Zero Order Amount', 'wceazy'); ?>

                            </label>
                            <div class="field_with_msg_container">
                                <textarea disabled class="wceazy_shipping_bar_textarea_field" rows="3"><?php echo esc_attr($wceazy_sb_zero_order_amount_msg); ?></textarea>
                                <small>
                                    <?php esc_html_e('"Empty Cart in Shipping Zone: Add items to qualify for Free Shipping ({minimum_order})."', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_partial_order_amount_msg">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Message on Partially Completed Order Amount', 'wceazy'); ?> <span
                                    style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <textarea disabled class="wceazy_shipping_bar_textarea_field"
                                    rows="3"><?php echo esc_attr($wceazy_sb_partial_order_amount_msg); ?></textarea>
                                <small>
                                    <?php esc_html_e('Shipping Alert: Add {missing_amount} for Free Shipping (Min. order: {minimum_order}, Current total: {cart_total}).', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_completed_order_amount_msg">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Message on Completed Order Amount', 'wceazy'); ?> <span
                                    style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <textarea disabled class="wceazy_shipping_bar_textarea_field"
                                    rows="3"><?php echo esc_attr($wceazy_sb_completed_order_amount_msg); ?></textarea>
                                <small>
                                    <?php esc_html_e('Free Shipping Alert: Your order qualifies! Click {checkout_page} to proceed.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="coupon_tab_body" data-id="tab_effect">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('Effect Settings', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_body_form">
                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_initial_delay">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Initial Delay Time', 'wceazy'); ?> <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <input disabled class="wceazy_shipping_bar_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_sb_initial_delay); ?>">
                                <small>
                                    <?php esc_html_e('Set the time delay for Free Shipping Bar to decide when it appears in milliseconds.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_allow_disappear_time">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Allow Disappear Time', 'wceazy'); ?> <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input disabled type="checkbox" <?php echo esc_attr($wceazy_sb_allow_disappear_time == "yes" ? "checked" : ""); ?>
                                        onchange="wceazy_shipping_bar_selection_changed()"><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Turn ON the switch to allow disappear time.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_disappear_time">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Set Disappear Time', 'wceazy'); ?> <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <input disabled class="wceazy_shipping_bar_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_sb_disappear_time); ?>">
                                <small>
                                    <?php esc_html_e('Set disappear time in milliseconds. The Free Shipping Bar will disappear according to your setting time.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="coupon_tab_body" data-id="tab_style">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('Customize Styles', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_body_form">

                        <h4>
                            <?php esc_html_e('Progress Bar Style', 'wceazy'); ?>
                        </h4>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_enable_progress_bar">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Enable Progress Bar', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_sb_enable_progress_bar == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Show progress bar with free shipping bar.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="wceazy_shipping_bar_bottom_button_section">
            <button onclick="wceazy_shipping_bar_save();">
                <?php esc_html_e('Save Settings', 'wceazy'); ?>
            </button>
        </div>



    </div>

</div>