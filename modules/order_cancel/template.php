<?php
$order_cancellation_nonce = wp_create_nonce('order_cancellation_nonce');


$wceazy_order_cancel_settings = get_option('wceazy_order_cancel_settings', False);
$wceazy_oc_settings = $wceazy_order_cancel_settings ? json_decode($wceazy_order_cancel_settings, true) : array();
$wceazy_oc_policy_text = isset($wceazy_oc_settings["wceazy_oc_policy_text"]) ? $wceazy_oc_settings["wceazy_oc_policy_text"] : "";

$wceazy_oc_cancellation_policy_url = isset($wceazy_oc_settings["add_to_cart_btn_text"]) ? $wceazy_oc_settings["add_to_cart_btn_text"] : "";
$policyMarkup = '';

if ($wceazy_oc_policy_text and $wceazy_oc_cancellation_policy_url) {
    $policyMarkup = '<p class="cancellation_policy"><a target="_blank" href="' . $wceazy_oc_cancellation_policy_url . '">' . $wceazy_oc_policy_text . '</a></p>';
} else if ($wceazy_oc_policy_text) {

    $policyMarkup = '<p class="cancellation_policy">' . $wceazy_oc_policy_text . '</a>';
}

$wceazy_oc_request_btn_color = isset($wceazy_oc_settings["search_filter_label_color"]) ? $wceazy_oc_settings["search_filter_label_color"] : "#6E32C9";
$wceazy_oc_request_btn_bg = isset($wceazy_oc_settings["search_filter_label_bg"]) ? $wceazy_oc_settings["search_filter_label_bg"] : "#fff";

$wceazy_oc_request_btn_bg = '#6E32C9';
$wceazy_oc_request_btn_color = '#fff';
$unique_id = rand();
?>



<style>
    :root {
        --wceazy_cancellation_submit_color: <?php echo $wceazy_oc_request_btn_color; ?>;
        --wceazy_cancellation_submit_bg_color: <?php echo $wceazy_oc_request_btn_bg; ?>;
    }
</style>

<div class="wceazy-order-cancellation-popup">
    <div class="wceazy-order-cancellation-popup-inner">
        <div class="wceazy-order-cancellation-popup-inner-box">
            <h4 class="wceazy-order-cancellation-title"><?php esc_html_e('Request to cancel the order.'); ?></h4>
            <div class="order__title" order-id="0">Order #666</div>
            <form class="wceazy_order_cancellation_form">
                <div class="wceazy-fileld-wrapper">
                    <input type="hidden" class="wceazy-form-control" id="wceazy_empty_feld">
                    <input type="hidden" class="wceazy-form-control" id="order_cancellation_nonce" value="<?php echo $order_cancellation_nonce; ?>">
                    <input type="hidden" class="wceazy-form-control" id="order_cancellation_post_id">
                </div>
                <div class="wceazy-fileld-wrapper">
                    <?php echo wp_kses_post($policyMarkup); ?>
                    <label for="message-text" class="col-form-label wceazy_cancellation_reason_label"><?php esc_html_e('Cancellation Reason:'); ?></label>
                    <textarea class="wceazy-form-control" id="wceazy_cancellation_details"></textarea>
                    <p class="cancellation_details_warning" style="display:blockX"><?php esc_html_e('Please, Write the Reason for canceling (At least 10 Characters).'); ?></p>
                    <h6 class="cancellation_request_success" style="display:blockX"><?php esc_html_e('Request Successful. Reloading ...'); ?></h6>
                </div>
                <div class="wceazy-fileld-wrapper wceazy-cancellation-actions">
                    <button class="btn btn-secondary wceazy_cancellation_close_popup">X</button>
                    <button class="btn btn-primary wceazy_cancellation_submit" type="submit"><?php esc_html_e( 'Confirm Cancel Order', 'wceazy');?></button>
                </div>
            </form>
        </div>

    </div>
</div>