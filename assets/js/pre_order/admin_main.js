function wceazy_pre_order_init(host) {
    wceazy_hide_all()
    jQuery("#wceazy_pre_order").show();

    wceazy_pre_order_init_select2();
    wceazy_pre_order_init_icon_field(host);
    wceazy_pre_order_tab_init();
    wceazy_pre_order_selection_changed();
}


jQuery(document).ready(function ($) {
    var checkbox = $('#_is_pre_order');
    var preorderFields = $('.pre-order-fields');

    // Show/hide fields on checkbox change
    checkbox.change(function () {
        if (checkbox.is(':checked')) {
            preorderFields.slideDown();
        } else {
            preorderFields.slideUp();
        }
    });

    // Trigger change event on page load if checkbox is checked
    if (checkbox.is(':checked')) {
        preorderFields.show();
    }
});





function wceazy_pre_order_init_select2() {
    var wceazy_pre_order_shipping_zone = jQuery('.wceazy_pre_order_shipping_zone select')
    var wceazy_pre_order_dont_show_pages = jQuery('.wceazy_pre_order_dont_show_pages select')
    var wceazy_pre_order_exclude_products = jQuery('.wceazy_pre_order_exclude_products select')
    var wceazy_pre_order_position_cart_subtotal = jQuery('.wceazy_pre_order_position_cart_subtotal select')
    var wceazy_pre_order_position_checkout_subtotal = jQuery('.wceazy_pre_order_position_checkout_subtotal select')
    var wceazy_pre_order_position = jQuery('.wceazy_pre_order_position select')
    var wceazy_pre_order_msg_text_align = jQuery('.wceazy_pre_order_msg_text_align select')

    if (wceazy_pre_order_shipping_zone.data('select2')) { wceazy_pre_order_shipping_zone.select2('destroy'); }
    if (wceazy_pre_order_dont_show_pages.data('select2')) { wceazy_pre_order_dont_show_pages.select2('destroy'); }
    if (wceazy_pre_order_exclude_products.data('select2')) { wceazy_pre_order_exclude_products.select2('destroy'); }
    if (wceazy_pre_order_position_cart_subtotal.data('select2')) { wceazy_pre_order_position_cart_subtotal.select2('destroy'); }
    if (wceazy_pre_order_position_checkout_subtotal.data('select2')) { wceazy_pre_order_position_checkout_subtotal.select2('destroy'); }
    if (wceazy_pre_order_position.data('select2')) { wceazy_pre_order_position.select2('destroy'); }
    if (wceazy_pre_order_msg_text_align.data('select2')) { wceazy_pre_order_msg_text_align.select2('destroy'); }

    wceazy_pre_order_shipping_zone.select2();
    wceazy_pre_order_dont_show_pages.select2();
    wceazy_pre_order_exclude_products.select2();
    wceazy_pre_order_position_cart_subtotal.select2();
    wceazy_pre_order_position_checkout_subtotal.select2();
    wceazy_pre_order_position.select2();
    wceazy_pre_order_msg_text_align.select2();
}


function wceazy_pre_order_selection_changed() {
    if (jQuery(".wceazy_pre_order_allow_disappear_time input[type='checkbox']:checked").length > 0) {
        jQuery(".wceazy_pre_order_disappear_time").show()
    } else {
        jQuery(".wceazy_pre_order_disappear_time").hide()
    }
}

function wceazy_pre_order_layout_auto_fill() {
    var layout_value = jQuery(".wceazy_pre_order_layout select").val()
    if (layout_value == "1") {
        jQuery(".wceazy_pre_order_bg input").val("#0A9663")
        jQuery(".wceazy_pre_order_padding_top input").val("10")
        jQuery(".wceazy_pre_order_padding_bottom input").val("10")
        jQuery(".wceazy_pre_order_padding_left_right input").val("120")
        jQuery(".wceazy_pre_order_msg_text_color input").val("#ffffff")
        jQuery(".wceazy_pre_order_msg_link_text_color input").val("#ffffff")
        jQuery(".wceazy_pre_order_msg_font_size input").val("16")
        jQuery(".wceazy_pre_order_msg_text_align select").val("center")
        jQuery(".wceazy_pre_order_remove_icon_color input").val("#ffffff")
        jQuery(".wceazy_pre_order_remove_icon_size input").val("16")
        jQuery(".wceazy_pre_order_progress_margin_top input").val("5")
        jQuery(".wceazy_pre_order_progress_bar_bg input").val("#ffffff")
        jQuery(".wceazy_pre_order_progress_color input").val("#000000")
        jQuery(".wceazy_pre_order_progress_text_color input").val("#ffffff")
        jQuery(".wceazy_pre_order_progress_font_size input").val("15")
        jQuery(".wceazy_pre_order_progress_border_radius input").val("20")
    } else if (layout_value == "2") {
        jQuery(".wceazy_pre_order_bg input").val("#580A96")
        jQuery(".wceazy_pre_order_padding_top input").val("10")
        jQuery(".wceazy_pre_order_padding_bottom input").val("0")
        jQuery(".wceazy_pre_order_padding_left_right input").val("0")
        jQuery(".wceazy_pre_order_msg_text_color input").val("#ffffff")
        jQuery(".wceazy_pre_order_msg_link_text_color input").val("#ffffff")
        jQuery(".wceazy_pre_order_msg_font_size input").val("16")
        jQuery(".wceazy_pre_order_msg_text_align select").val("center")
        jQuery(".wceazy_pre_order_remove_icon_color input").val("#ffffff")
        jQuery(".wceazy_pre_order_remove_icon_size input").val("16")
        jQuery(".wceazy_pre_order_progress_margin_top input").val("10")
        jQuery(".wceazy_pre_order_progress_bar_bg input").val("#ffffff")
        jQuery(".wceazy_pre_order_progress_color input").val("#000000")
        jQuery(".wceazy_pre_order_progress_text_color input").val("#ffffff")
        jQuery(".wceazy_pre_order_progress_font_size input").val("15")
        jQuery(".wceazy_pre_order_progress_border_radius input").val("0")
    }

}


function wceazy_pre_order_init_icon_field(host) {
    var wceazy_pre_order_remove_icon = jQuery('.wceazy_pre_order_remove_icon')



    jQuery(wceazy_pre_order_remove_icon).find(".icon_field_item").unbind("click");
    jQuery(wceazy_pre_order_remove_icon).find(".icon_field_item").bind("click", function () {
        jQuery(wceazy_pre_order_remove_icon).find(".icon_field_item").removeClass('active');
        jQuery(this).addClass('active');
    });


    jQuery(wceazy_pre_order_remove_icon).find(".icon_1").css("background", "transparent url(" + host + "assets/img/modules/pre_order/delete_icon_1.svg) no-repeat center center / 16px")
    jQuery(wceazy_pre_order_remove_icon).find(".icon_2").css("background", "transparent url(" + host + "assets/img/modules/pre_order/delete_icon_2.svg) no-repeat center center / 16px")
    jQuery(wceazy_pre_order_remove_icon).find(".icon_3").css("background", "transparent url(" + host + "assets/img/modules/pre_order/delete_icon_3.svg) no-repeat center center / 16px")
    jQuery(wceazy_pre_order_remove_icon).find(".icon_4").css("background", "transparent url(" + host + "assets/img/modules/pre_order/delete_icon_4.svg) no-repeat center center / 16px")
    jQuery(wceazy_pre_order_remove_icon).find(".icon_5").css("background", "transparent url(" + host + "assets/img/modules/pre_order/delete_icon_5.svg) no-repeat center center / 16px")



}

function wceazy_pre_order_tab_init() {
    jQuery(".wceazy_pre_order_container .coupon_tab_body").hide();
    jQuery(".wceazy_pre_order_container .coupon_tab_body[data-id='tab_general']").show();
    jQuery(".wceazy_pre_order_container .coupon_data_tabs .tab_item").unbind("click");
    jQuery(".wceazy_pre_order_container .coupon_data_tabs .tab_item").bind("click", function () {
        jQuery(".wceazy_pre_order_container .coupon_data_tabs .tab_item").removeClass('tab_item_active');
        jQuery(this).addClass('tab_item_active');
        jQuery(".wceazy_pre_order_container .coupon_tab_body").hide();
        jQuery(".wceazy_pre_order_container .coupon_tab_body[data-id='" + jQuery(this).data('target') + "']").show();
    });
}



function wceazy_pre_order_save() {
    printf(hello);
    
    jQuery(".wceazy_pre_order_bottom_button_section button").text(
        "Please Wait.."
    );
    jQuery(".wceazy_pre_order_bottom_button_section button").prop(
        "disabled",
        true
    );
    let postData = {
        enable_pre_order:
            jQuery(
                ".wceazy_pre_order_enable_pre_order input[type='checkbox']:checked"
            ).length > 0
                ? "yes"
                : "no",
        pre_order_btn_text: jQuery(
            ".wceazy_pre_order_btn_text input[type='text']"
        ).val(),
        pre_order_custom_email: jQuery(
            ".wceazy_pre_order_custom_email input[type='text']"
        ).val(),
        pre_order_admin_email: jQuery(
            ".wceazy_pre_order_admin_emaill input[type='text']"
        ).val(), // corrected the class name
        // Add other fields here
    };

    let post_data = {
        action: "wceazy_pre_order_save",
        data: postData,
    };

    jQuery.ajax({
        url: ajaxurl,
        type: "POST",
        data: post_data,
        success: function (data) {
            var obj = JSON.parse(data);
            if (obj.status == "true") {
                Command: toastr["success"]("Settings Saved Successfully Free !");
                jQuery(".wceazy_pre_order_bottom_button_section button").text(
                    "Save Settings"
                );
                jQuery(".wceazy_pre_order_bottom_button_section button").prop(
                    "disabled",
                    false
                );
            } else {
                Command: toastr["error"]("Failed, Please try again!");
                jQuery(".wceazy_pre_order_bottom_button_section button").text(
                    "Save Settings"
                );
                jQuery(".wceazy_pre_order_bottom_button_section button").prop(
                    "disabled",
                    false
                );
            }
        },
    });
}



