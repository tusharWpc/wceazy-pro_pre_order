<?php

$wceazy_cancel_order_settings = get_option('wceazy_cancel_order_settings', False);
$wceazy_ca_settings = $wceazy_cancel_order_settings ? json_decode($wceazy_cancel_order_settings, true) : array();

$wceazy_ca_auto_open_cart = isset($wceazy_ca_settings["auto_open_cart"]) ? $wceazy_ca_settings["auto_open_cart"] : "no";
$wceazy_ca_bascket_count = isset($wceazy_ca_settings["bascket_count"]) ? $wceazy_ca_settings["bascket_count"] : "number_of_items";
$wceazy_ca_dont_show_cart_pages = isset($wceazy_ca_settings["dont_show_cart_pages"]) ? explode(",",$wceazy_ca_settings["dont_show_cart_pages"]) : array();

$wceazy_ca_show_header_basket_icon = isset($wceazy_ca_settings["show_header_basket_icon"]) ? $wceazy_ca_settings["show_header_basket_icon"] : "yes";
$wceazy_ca_show_header_close_icon = isset($wceazy_ca_settings["show_header_close_icon"]) ? $wceazy_ca_settings["show_header_close_icon"] : "yes";

$wceazy_ca_show_product_image = isset($wceazy_ca_settings["show_product_image"]) ? $wceazy_ca_settings["show_product_image"] : "yes";
$wceazy_ca_show_product_name = isset($wceazy_ca_settings["show_product_name"]) ? $wceazy_ca_settings["show_product_name"] : "yes";
$wceazy_ca_show_product_price = isset($wceazy_ca_settings["show_product_price"]) ? $wceazy_ca_settings["show_product_price"] : "yes";
$wceazy_ca_show_product_price_total = isset($wceazy_ca_settings["show_product_price_total"]) ? $wceazy_ca_settings["show_product_price_total"] : "yes";
$wceazy_ca_link_to_single_product = isset($wceazy_ca_settings["link_to_single_product"]) ? $wceazy_ca_settings["link_to_single_product"] : "yes";
$wceazy_ca_delete_item_form_cart = isset($wceazy_ca_settings["delete_item_form_cart"]) ? $wceazy_ca_settings["delete_item_form_cart"] : "yes";
$wceazy_ca_allowed_quantity_update = isset($wceazy_ca_settings["allowed_quantity_update"]) ? $wceazy_ca_settings["allowed_quantity_update"] : "yes";

$wceazy_ca_footer_position_fixed = isset($wceazy_ca_settings["footer_position_fixed"]) ? $wceazy_ca_settings["footer_position_fixed"] : "yes";
$wceazy_ca_show_subtotal = isset($wceazy_ca_settings["show_subtotal"]) ? $wceazy_ca_settings["show_subtotal"] : "yes";
$wceazy_ca_show_discount = isset($wceazy_ca_settings["show_discount"]) ? $wceazy_ca_settings["show_discount"] : "yes";
$wceazy_ca_show_shipping_amount = isset($wceazy_ca_settings["show_shipping_amount"]) ? $wceazy_ca_settings["show_shipping_amount"] : "yes";
$wceazy_ca_show_cart_total = isset($wceazy_ca_settings["show_cart_total"]) ? $wceazy_ca_settings["show_cart_total"] : "yes";
$wceazy_ca_show_coupon = isset($wceazy_ca_settings["show_coupon"]) ? $wceazy_ca_settings["show_coupon"] : "yes";

$wceazy_ca_heading_title = isset($wceazy_ca_settings["heading_title"]) ? $wceazy_ca_settings["heading_title"] : "Your Shopping Cart";
$wceazy_ca_continue_btn_text = isset($wceazy_ca_settings["continue_btn_text"]) ? $wceazy_ca_settings["continue_btn_text"] : "Continue Shopping";
$wceazy_ca_view_cart_text = isset($wceazy_ca_settings["view_cart_text"]) ? $wceazy_ca_settings["view_cart_text"] : "View Cart";
$wceazy_ca_checkout_btn_text = isset($wceazy_ca_settings["checkout_btn_text"]) ? $wceazy_ca_settings["checkout_btn_text"] : "Checkout";
$wceazy_ca_empty_cart_message = isset($wceazy_ca_settings["empty_cart_message"]) ? $wceazy_ca_settings["empty_cart_message"] : "No items in cart";
$wceazy_ca_subtotal_text = isset($wceazy_ca_settings["subtotal_text"]) ? $wceazy_ca_settings["subtotal_text"] : "Subtotal";
$wceazy_ca_total_amount_text = isset($wceazy_ca_settings["total_amount_text"]) ? $wceazy_ca_settings["total_amount_text"] : "Total Amount";

$wceazy_ca_continue_btn_url = isset($wceazy_ca_settings["continue_btn_url"]) ? $wceazy_ca_settings["continue_btn_url"] : home_url()."/shop";
$wceazy_ca_view_cart_btn_url = isset($wceazy_ca_settings["view_cart_btn_url"]) ? $wceazy_ca_settings["view_cart_btn_url"] : home_url()."/cart";
$wceazy_ca_checkout_btn_url = isset($wceazy_ca_settings["checkout_btn_url"]) ? $wceazy_ca_settings["checkout_btn_url"] : home_url()."/checkout";

$wceazy_ca_width = isset($wceazy_ca_settings["width"]) ? $wceazy_ca_settings["width"] : "460";
$wceazy_ca_open_from = isset($wceazy_ca_settings["open_from"]) ? $wceazy_ca_settings["open_from"] : "right";
$wceazy_ca_btn_font_size = isset($wceazy_ca_settings["btn_font_size"]) ? $wceazy_ca_settings["btn_font_size"] : "16";
$wceazy_ca_btn_font_color = isset($wceazy_ca_settings["btn_font_color"]) ? $wceazy_ca_settings["btn_font_color"] : "#ffffff";
$wceazy_ca_btn_bg_color = isset($wceazy_ca_settings["btn_bg_color"]) ? $wceazy_ca_settings["btn_bg_color"] : "#6E32C9";
$wceazy_ca_btn_hover_font_color = isset($wceazy_ca_settings["btn_hover_font_color"]) ? $wceazy_ca_settings["btn_hover_font_color"] : "#ffffff";
$wceazy_ca_btn_hover_bg_color = isset($wceazy_ca_settings["btn_hover_bg_color"]) ? $wceazy_ca_settings["btn_hover_bg_color"] : "#510bbb";
$wceazy_ca_btn_border_color = isset($wceazy_ca_settings["btn_border_color"]) ? $wceazy_ca_settings["btn_border_color"] : "#6E32C9";
$wceazy_ca_btn_border_hover_color = isset($wceazy_ca_settings["btn_border_hover_color"]) ? $wceazy_ca_settings["btn_border_hover_color"] : "#510bbb";
$wceazy_ca_btn_border_radius = isset($wceazy_ca_settings["btn_border_radius"]) ? $wceazy_ca_settings["btn_border_radius"] : "4";

$wceazy_ca_cross_icon_size = isset($wceazy_ca_settings["cross_icon_size"]) ? $wceazy_ca_settings["cross_icon_size"] : "30";
$wceazy_ca_header_basket_icon_size = isset($wceazy_ca_settings["header_basket_icon_size"]) ? $wceazy_ca_settings["header_basket_icon_size"] : "30";
$wceazy_ca_heading_font_size = isset($wceazy_ca_settings["heading_font_size"]) ? $wceazy_ca_settings["heading_font_size"] : "24";
$wceazy_ca_heading_font_color = isset($wceazy_ca_settings["heading_font_color"]) ? $wceazy_ca_settings["heading_font_color"] : "#3a3a3a";
$wceazy_ca_heading_border_bottom_color = isset($wceazy_ca_settings["heading_border_bottom_color"]) ? $wceazy_ca_settings["heading_border_bottom_color"] : "#cccccc";

$wceazy_ca_item_remove_icon = isset($wceazy_ca_settings["item_remove_icon"]) ? $wceazy_ca_settings["item_remove_icon"] : "icon_1";
$wceazy_ca_remove_icon_size = isset($wceazy_ca_settings["remove_icon_size"]) ? $wceazy_ca_settings["remove_icon_size"] : "16";
$wceazy_ca_product_img_width = isset($wceazy_ca_settings["product_img_width"]) ? $wceazy_ca_settings["product_img_width"] : "100";
$wceazy_ca_product_title_color = isset($wceazy_ca_settings["product_title_color"]) ? $wceazy_ca_settings["product_title_color"] : "#6E32C9";
$wceazy_ca_product_title_font_size = isset($wceazy_ca_settings["product_title_font_size"]) ? $wceazy_ca_settings["product_title_font_size"] : "16";
$wceazy_ca_quantity_box_width = isset($wceazy_ca_settings["quantity_box_width"]) ? $wceazy_ca_settings["quantity_box_width"] : "56";
$wceazy_ca_quantity_box_border_color = isset($wceazy_ca_settings["quantity_box_border_color"]) ? $wceazy_ca_settings["quantity_box_border_color"] : "#6E32C9";
$wceazy_ca_quantity_box_bg_color = isset($wceazy_ca_settings["quantity_box_bg_color"]) ? $wceazy_ca_settings["quantity_box_bg_color"] : "#ffffff";
$wceazy_ca_quantity_box_text_color = isset($wceazy_ca_settings["quantity_box_text_color"]) ? $wceazy_ca_settings["quantity_box_text_color"] : "#000000";

$wceazy_ca_basket_enable = isset($wceazy_ca_settings["basket_enable"]) ? $wceazy_ca_settings["basket_enable"] : "show_always";
$wceazy_ca_basket_shape = isset($wceazy_ca_settings["basket_shape"]) ? $wceazy_ca_settings["basket_shape"] : "round";
$wceazy_ca_basket_icon_size = isset($wceazy_ca_settings["basket_icon_size"]) ? $wceazy_ca_settings["basket_icon_size"] : "35";
$wceazy_ca_basket_show_count = isset($wceazy_ca_settings["basket_show_count"]) ? $wceazy_ca_settings["basket_show_count"] : "yes";
$wceazy_ca_basket_icon = isset($wceazy_ca_settings["basket_icon"]) ? $wceazy_ca_settings["basket_icon"] : "icon_1";
$wceazy_ca_basket_position = isset($wceazy_ca_settings["basket_position"]) ? $wceazy_ca_settings["basket_position"] : "bottom_right";
$wceazy_ca_basket_offset_vertical = isset($wceazy_ca_settings["basket_offset_vertical"]) ? $wceazy_ca_settings["basket_offset_vertical"] : "0";
$wceazy_ca_basket_offset_horizontal = isset($wceazy_ca_settings["basket_offset_horizontal"]) ? $wceazy_ca_settings["basket_offset_horizontal"] : "0";
$wceazy_ca_basket_count_position = isset($wceazy_ca_settings["basket_count_position"]) ? $wceazy_ca_settings["basket_count_position"] : "top_left";
$wceazy_ca_basket_icon_color = isset($wceazy_ca_settings["basket_icon_color"]) ? $wceazy_ca_settings["basket_icon_color"] : "#ffffff";
$wceazy_ca_basket_bg_color = isset($wceazy_ca_settings["basket_bg_color"]) ? $wceazy_ca_settings["basket_bg_color"] : "#000000";
$wceazy_ca_basket_count_color = isset($wceazy_ca_settings["basket_count_color"]) ? $wceazy_ca_settings["basket_count_color"] : "#ffffff";
$wceazy_ca_basket_count_bg_color = isset($wceazy_ca_settings["basket_count_bg_color"]) ? $wceazy_ca_settings["basket_count_bg_color"] : "#d00000";

/* Disable on disabled pages */
if(in_array (get_the_ID(), $wceazy_ca_dont_show_cart_pages)){
    return;
}

$unique_id = rand();


/* Show or Hide Bsket */
$show_basket = True;
if($wceazy_ca_basket_enable == "hide_always"){
    $show_basket = False;
}else if($wceazy_ca_basket_enable == "hide_empty_cart"){
    if ( WC()->cart->get_cart_contents_count() == 0 ) {
        $show_basket = False;
    }
}

?>

<style>
    #wceazy_frontend_ca_bubble_<?php echo esc_attr($unique_id);?> {
        --wceazy_ca_basket_icon_size: <?php echo $wceazy_ca_basket_icon_size; ?>px;
        --wceazy_ca_basket_icon: url(<?php echo WCEAZY_PRO_URL; ?>assets/img/modules/cancel_order/basket_<?php echo $wceazy_ca_basket_icon; ?>.svg);
        --wceazy_ca_basket_icon_color: <?php echo $wceazy_ca_basket_icon_color; ?>;
        --wceazy_ca_basket_bg_color: <?php echo $wceazy_ca_basket_bg_color; ?>;
        --wceazy_ca_basket_count_color: <?php echo $wceazy_ca_basket_count_color; ?>;
        --wceazy_ca_basket_count_bg_color: <?php echo $wceazy_ca_basket_count_bg_color; ?>;
    }
    #wceazy_frontend_ca_<?php echo esc_attr($unique_id);?> {
        --wceazy_ca_width: <?php echo $wceazy_ca_width; ?>px;
        --wceazy_ca_btn_font_size: <?php echo $wceazy_ca_btn_font_size; ?>px;
        --wceazy_ca_btn_font_color: <?php echo $wceazy_ca_btn_font_color; ?>;
        --wceazy_ca_btn_bg_color: <?php echo $wceazy_ca_btn_bg_color; ?>;
        --wceazy_ca_btn_hover_font_color: <?php echo $wceazy_ca_btn_hover_font_color; ?>;
        --wceazy_ca_btn_hover_bg_color: <?php echo $wceazy_ca_btn_hover_bg_color; ?>;
        --wceazy_ca_btn_border_color: <?php echo $wceazy_ca_btn_border_color; ?>;
        --wceazy_ca_btn_border_hover_color: <?php echo $wceazy_ca_btn_border_hover_color; ?>;
        --wceazy_ca_btn_border_radius: <?php echo $wceazy_ca_btn_border_radius; ?>px;

        --wceazy_ca_cross_icon_size: <?php echo $wceazy_ca_cross_icon_size; ?>px;
        --wceazy_ca_header_basket_icon_size: <?php echo $wceazy_ca_header_basket_icon_size; ?>px;
        --wceazy_ca_heading_font_size: <?php echo $wceazy_ca_heading_font_size; ?>px;
        --wceazy_ca_heading_font_color: <?php echo $wceazy_ca_heading_font_color; ?>;
        --wceazy_ca_heading_border_bottom_color: <?php echo $wceazy_ca_heading_border_bottom_color; ?>;

        --wceazy_ca_item_remove_icon: url(<?php echo WCEAZY_PRO_URL; ?>assets/img/modules/cancel_order/delete_<?php echo $wceazy_ca_item_remove_icon; ?>.svg);
        --wceazy_ca_remove_icon_size: <?php echo $wceazy_ca_remove_icon_size; ?>px;
        --wceazy_ca_product_img_width: <?php echo $wceazy_ca_product_img_width; ?>px;
        --wceazy_ca_product_title_color: <?php echo $wceazy_ca_product_title_color; ?>;
        --wceazy_ca_product_title_font_size: <?php echo $wceazy_ca_product_title_font_size; ?>px;
        --wceazy_ca_quantity_box_width: <?php echo $wceazy_ca_quantity_box_width; ?>px;
        --wceazy_ca_quantity_box_border_color: <?php echo $wceazy_ca_quantity_box_border_color; ?>;
        --wceazy_ca_quantity_box_bg_color: <?php echo $wceazy_ca_quantity_box_bg_color; ?>;
        --wceazy_ca_quantity_box_text_color: <?php echo $wceazy_ca_quantity_box_text_color; ?>;
    }
    .wceazy_ca_bubble{
        <?php if($wceazy_ca_basket_position == "top_left") { ?> top: 110px; bottom: auto; right: auto; left: 60px; <?php } ?>
        <?php if($wceazy_ca_basket_position == "top_right") { ?> top: 110px; bottom: auto; right: 60px; left: auto; <?php } ?>
        <?php if($wceazy_ca_basket_position == "bottom_left") { ?> top: auto; bottom: 110px; right: auto; left: 60px; <?php } ?>
        <?php if($wceazy_ca_basket_position == "bottom_right") { ?> top: auto; bottom: 110px; right: 60px; left: auto; <?php } ?>

        <?php if($wceazy_ca_basket_position == "top_left") { ?>
        margin-left: <?php echo $wceazy_ca_basket_offset_vertical; ?>px;
        margin-top: <?php echo $wceazy_ca_basket_offset_horizontal; ?>px;
        <?php } ?>
        <?php if($wceazy_ca_basket_position == "top_right") { ?>
            margin-right: <?php echo $wceazy_ca_basket_offset_vertical; ?>px;
            margin-top: <?php echo $wceazy_ca_basket_offset_horizontal; ?>px;
        <?php } ?>
        <?php if($wceazy_ca_basket_position == "bottom_left") { ?>
            margin-left: <?php echo $wceazy_ca_basket_offset_vertical; ?>px;
            margin-bottom: <?php echo $wceazy_ca_basket_offset_horizontal; ?>px;
        <?php } ?>
        <?php if($wceazy_ca_basket_position == "bottom_right") { ?>
            margin-right: <?php echo $wceazy_ca_basket_offset_vertical; ?>px;
            margin-bottom: <?php echo $wceazy_ca_basket_offset_horizontal; ?>px;
        <?php } ?>
    }
    .wceazy_ca_bubble .wceazy_ca_basket_item_count{
        <?php if($wceazy_ca_basket_count_position == "top_left") { ?> top: -5px; bottom: auto; left: -11px; right: auto; <?php } ?>
        <?php if($wceazy_ca_basket_count_position == "top_right") { ?> top: -5px; bottom: auto; left: auto; right: -11px; <?php } ?>
        <?php if($wceazy_ca_basket_count_position == "bottom_left") { ?> top: auto; bottom: -5px; left: -11px; right: auto; <?php } ?>
        <?php if($wceazy_ca_basket_count_position == "bottom_right") { ?> top: auto; bottom: -5px; left: auto; right: -11px; <?php } ?>
    }

    <?php if($wceazy_ca_auto_open_cart == "yes") { ?>  .wceazy_ca_main{ display: flex; }  <?php } ?>

    <?php if($wceazy_ca_show_header_basket_icon == "no") { ?>  .wceazy_ca_header .wceazy_ca_header_title{ background: none; padding: 0; }  <?php } ?>
    <?php if($wceazy_ca_show_header_close_icon == "no") { ?>  .wceazy_ca_header .wceazy_ca_close{ display: none; }  <?php } ?>

    <?php if($wceazy_ca_show_product_image == "no") { ?>  .wceazy_ca_product_part_1{ display: none; }  <?php } ?>
    <?php if($wceazy_ca_show_product_name == "no") { ?>  .wceazy_ca_product_part_2 .wceazy_ca_product_title{ display: none; }  <?php } ?>
    <?php if($wceazy_ca_show_product_price == "no") { ?>  .wceazy_ca_product_part_2 .wceazy_ca_product_unit_price{ display: none; }  <?php } ?>
    <?php if($wceazy_ca_show_product_price_total == "no") { ?>  .wceazy_ca_product_part_3 .wceazy_ca_product_total{ display: none; }  <?php } ?>
    <?php if($wceazy_ca_delete_item_form_cart == "no") { ?>  .wceazy_ca_product_part_3 .wceazy_ca_product_remove{ display: none; }  <?php } ?>
    <?php if($wceazy_ca_allowed_quantity_update == "no") { ?>  .wceazy_ca_product_part_2 .wceazy_ca_product_quantity{ display: none; }  <?php } ?>

    <?php if($wceazy_ca_show_subtotal == "no") { ?>  .wceazy_ca_stats .wceazy_ca_stats_subtotal{ display: none; }  <?php } ?>
    <?php if($wceazy_ca_show_discount == "no") { ?>  .wceazy_ca_stats .wceazy_ca_stats_discount{ display: none; }  <?php } ?>
    <?php if($wceazy_ca_show_shipping_amount == "no") { ?>  .wceazy_ca_stats .wceazy_ca_stats_shipping{ display: none; }  <?php } ?>
    <?php if($wceazy_ca_show_cart_total == "no") { ?>  .wceazy_ca_stats .wceazy_ca_stats_total{ display: none; }  <?php } ?>
    <?php if($wceazy_ca_show_coupon == "no") { ?>  .wceazy_ca_coupon{ display: none; }  <?php } ?>

    <?php if($wceazy_ca_basket_show_count == "no") { ?>  .wceazy_ca_bubble .wceazy_ca_basket_item_count{ display: none; }  <?php } ?>
</style>



<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Open modal for @mdo</button>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat">Open modal for @fat</button>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Open modal for @getbootstrap</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form>
        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
        </div>
        <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
        </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
    </div>
    </div>
</div>
</div>



<script type="text/javascript">

    jQuery(document).ready(function($){
        'use strict';
        wceazy_frontend_ca_init();
    });

</script>