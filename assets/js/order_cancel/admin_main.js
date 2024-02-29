
function wceazy_order_cancel_init(host){
    wceazy_hide_all()
    jQuery("#wceazy_order_cancel").show();

    wceazy_order_cancel_tab_init();
    
    wceazy_order_cancel_init_table_header_actions();
    wceazy_order_cancel_load_coupons();
    
    wceazy_order_cancel_init_select2();
}
function wceazy_order_cancel_init_select2(){
    
    var wceazy_order_cancel_allowed_status = jQuery('.wceazy_order_cancel_allowed_status select')
    wceazy_order_cancel_allowed_status.select2();
}

function wceazy_order_cancel_copy_shortcode(){
    'use strict';

    var temp = jQuery("<input>");
    jQuery("body").append(temp);
    temp.val(jQuery(".wceazy_order_cancel_copy_shortcode").text()).select();
    document.execCommand("copy");
    temp.remove();
    alert("Shortcode Copied to Clipboard")
}


function wceazy_order_cancel_tab_init(){
    jQuery(".wceazy_order_cancel_container .coupon_tab_body").hide();
    jQuery(".wceazy_order_cancel_container .coupon_tab_body[data-id='tab_general']").show();
    jQuery(".wceazy_order_cancel_container .coupon_data_tabs .tab_item").unbind("click");
    jQuery(".wceazy_order_cancel_container .coupon_data_tabs .tab_item").bind("click", function () {
        jQuery(".wceazy_order_cancel_container .coupon_data_tabs .tab_item").removeClass('tab_item_active');
        jQuery(this).addClass('tab_item_active');
        jQuery(".wceazy_order_cancel_container .coupon_tab_body").hide();
        jQuery(".wceazy_order_cancel_container .coupon_tab_body[data-id='" + jQuery(this).data('target') + "']").show();
    });
}


function wceazy_order_cancel_save() {
    jQuery('.wceazy_order_cancel_bottom_button_section button').text('Please Wait..');
    jQuery('.wceazy_order_cancel_bottom_button_section button').prop('disabled', true);
    let jQuerypostData = {
        'add_to_cart_btn_text': jQuery(".wceazy_order_cancel_add_to_cart_btn_text input").val(),
        'search_filter_label_color': jQuery(".wceazy_order_cancel_search_filter_label_color input").val(),
        'search_filter_label_bg': jQuery(".wceazy_order_cancel_search_filter_label_bg input").val(),
        'wceazy_oc_policy_text': jQuery(".wceazy_oc_policy_text textarea").val(),
        'wceazy_oc_allowed_status': jQuery(".wceazy_order_cancel_allowed_status select").val().join(","),
    };

    let jQuerypost_data = {'action': 'wceazy_order_cancel_save', 'data': jQuerypostData};

    jQuery.ajax({
        url: ajaxurl, type: "POST", data: jQuerypost_data,
        success: function (data) {
            var obj = JSON.parse(data);
            if (obj.status == 'true') {
                Command: toastr["success"]("Settings Saved Successfully!");
                jQuery('.wceazy_order_cancel_bottom_button_section button').text('Save Settings');
                jQuery('.wceazy_order_cancel_bottom_button_section button').prop('disabled', false);
            } else {
                Command: toastr["error"]("Failed, Please try again!");
                jQuery('.wceazy_order_cancel_bottom_button_section button').text('Save Settings');
                jQuery('.wceazy_order_cancel_bottom_button_section button').prop('disabled', false);
            }
        }
    });
}


// Invoked
function wceazy_order_cancel_init_table_header_actions(){

    jQuery( ".wceazy_order_cancel_table_top_actions .wceazy_order_cancel_items_per_page").unbind( "change" );
    jQuery( ".wceazy_order_cancel_table_top_actions .wceazy_order_cancel_items_per_page" ).bind( "change", function() {
        var pageLength = jQuery('.wceazy_order_cancel_table_top_actions .wceazy_order_cancel_items_per_page').val();
        
        wceazy_order_cancel_load_coupons(pageLength);
    });

    jQuery( ".wceazy_order_cancel_top_actions_part_right input").unbind( "keyup" );
    jQuery( ".wceazy_order_cancel_top_actions_part_right input" ).bind( "keyup", function() {
        jQuery( ".wceazy_order_cancel_filter_discount_type").val("")
        jQuery('.wceazy_order_cancel_table').DataTable().search(jQuery(this).val()).draw() ;
    });

    jQuery( ".wceazy_order_cancel_filter_discount_type").unbind( "change" );
    jQuery( ".wceazy_order_cancel_filter_discount_type" ).bind( "change", function() {
        
        jQuery( ".wceazy_order_cancel_top_actions_part_right input").val("")
        jQuery('.wceazy_order_cancel_table').DataTable().search(jQuery(this).val()).draw() ;
    });

}




function wceazy_order_cancel_bulk_edit_check_ability() {
    let wfaac_action_type = jQuery('.wceazy_order_cancel_bulk_action_type').val();
    var singleChecklen = jQuery("input[name='wceazy_order_cancel_table_row_checkboxes[]']:checked").length;
    if (singleChecklen > 0 && wfaac_action_type !== '') {
        jQuery(".wceazy_order_cancel_bulk_edit_btn").prop('disabled', false);
    }else{
        jQuery(".wceazy_order_cancel_bulk_edit_btn").prop('disabled', true);
    }
}

function wceazy_order_cancel_checkbox_select_all(field) {
    'use strict';
    jQuery(".wceazy_order_cancel_table_body input[type='checkbox']").each(function (i, object) {
        if(jQuery(field).is(':checked')) {
            jQuery(object).prop('checked', true).change();
        }else{
            jQuery(object).prop('checked', false).change();
        }
    })
}


function wceazy_order_cancel_bulk_edit() {
    var wfaabc_toggole_type = jQuery('.wceazy_order_cancel_bulk_action_type').val();
    var selectedItems = [];
    jQuery('.wceazy_order_cancel_popup').addClass('opened');
    jQuery('.wceazy_order_cancel_popup .wceazy-popup-content').text('Do you want to '+wfaabc_toggole_type+' selected coupons to Auto Apply list ?');

    jQuery('[name="wceazy_order_cancel_table_row_checkboxes[]"]:checked').each(function () {
        let itemVal = JSON.parse(jQuery(this).val());
        selectedItems.push(itemVal);
    });

    if( selectedItems.length > 0 ){
        let couponData = {
            'toggole_type' : wfaabc_toggole_type,
            'coupon_data' : selectedItems,
        };

        jQuery( ".wceazy_order_cancel_popup .wceazy-btn-success").unbind( "click" );
        jQuery( ".wceazy_order_cancel_popup .wceazy-btn-success" ).bind( "click", function() {
            let post_data = {'action': 'wceazy_order_cancel_bulk_edit', 'data': couponData};
            jQuery.ajax({
                url: ajaxurl, type: "POST", data: post_data,
                success: function (data) {
                    var obj = JSON.parse(data);
                    if (obj.status == 'true') {
                        jQuery('.wceazy_order_cancel_popup').removeClass('opened');
                        Command: toastr["success"]("Saved Changed Successfully!");
                        wceazy_order_cancel_load_coupons();
                    } else {
                        jQuery('.wceazy_order_cancel_popup').removeClass('opened');
                        Command: toastr["error"]("Failed, Please try again!");
                    }
                }
            });
            jQuery('.wceazy_order_cancel_bulk_action_type').val("");
            wceazy_order_cancel_bulk_edit_check_ability()
        });

    }
}



// Invoked
function wceazy_order_cancel_load_coupons(pageLength=10) {
    if (jQuery.fn.DataTable.isDataTable('.wceazy_order_cancel_table')) {
        jQuery('.wceazy_order_cancel_table').DataTable().destroy();
    }
    var post_data = {'action': 'wceazy_order_cancel_list_coupons'};
    jQuery('.wceazy_order_cancel_table').DataTable({
        processing: false,
        serverSide: false,
        pageLength: pageLength,
        searching: true,
        paging: true,
        ajax: {
            url: ajaxurl,
            type: "POST",
            data: post_data,
        },
        order: [],
        dom: 'Bfrtip',
        "columnDefs": [ {
            "targets": 'no-sort',
            "orderable": false
        } ]
    });
}



function wceazy_add_to_order_cancel(couponData) {
    let acceptPopup = jQuery('.wceazy_order_cancel_popup.request-accept');
    
    acceptPopup.addClass('opened');
    var couponCode = couponData.details;
    let  acceptContent = acceptPopup.find('.wceazy-popup-content');
    acceptContent.text(couponCode);
    
    
    var post_data = {'action': 'wceazy_order_cancel_add_to_auto_apply', 'data': couponData};
    
    let acceptBtn = acceptPopup.find('.wceazy-btn-success');
    acceptBtn.unbind( "click" );
    acceptBtn.bind( "click", function() {
        jQuery.ajax({
            url: ajaxurl,
            type: "POST",
            data: post_data,
            success: function (data) {
                var obj = JSON.parse(data);
                if (obj.status == 'true') {
                    acceptPopup.removeClass('opened');
                    Command: toastr["success"]("Order Cancellation request successful!");
                    wceazy_order_cancel_load_coupons();
                } else {
                    acceptPopup.removeClass('opened');
                    Command: toastr["error"]("Failed, Please try again!");
                }
            }
        });
    });
}



function wceazy_remove_from_order_cancel(couponData) {
    let declinePopup = jQuery('.wceazy_order_cancel_popup.request-decline');
    
    declinePopup.addClass('opened');
    var couponCode = couponData.details;
    let  declineContent = declinePopup.find('.wceazy-popup-content');
    declineContent.text(couponCode);

    var post_data = {'action': 'wceazy_order_cancel_remove_from_auto_apply', 'data': couponData};

    let declineBtn = declinePopup.find('.wceazy-btn-success');
    declineBtn.unbind( "click" );
    declineBtn.bind( "click", function() {
        jQuery.ajax({
            url: ajaxurl, type: "POST", data: post_data,
            success: function (data) {
                var obj = JSON.parse(data);
                if (obj.status == 'true') {
                    declinePopup.removeClass('opened');
                    wceazy_order_cancel_load_coupons();
                    Command: toastr["success"]("Auto Apply Coupon has been removed successfully!");
                } else {
                    declinePopup.removeClass('opened');
                    Command: toastr["success"]("Failed, Please try again!");
                }
            }
        });
    });

}


function wceazy_order_cancel_close_popup() {
    jQuery('.wceazy_order_cancel_popup').removeClass('opened');
}
