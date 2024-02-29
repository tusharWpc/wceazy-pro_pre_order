
function wceazy_show_order_cancel_form() {

    jQuery(document).ready(function () {

        let popup_container = jQuery('.wceazy-order-cancellation-popup');

        let wceazy_cancellation_close_popup = jQuery('.wceazy_cancellation_close_popup');

        let wceazy_cancel_button = jQuery('.wceazy_cancel__order');
        
        
        wceazy_order_cancellation_form = jQuery('.wceazy_order_cancellation_form');
        wceazy_order_cancellation_form.on('submit', function(e){
            e.preventDefault();
            // var number = parseInt(str.slice(1));
            let form = jQuery(this),
                message = form.find('#wceazy_cancellation_details').val(),
                nonce = form.find('#order_cancellation_nonce').val(),
                id = form.find('#order_cancellation_post_id').val();
            id = parseInt(id.slice(1));
            
            // wceazy_order_cancellation_form_submit
            
            let cancellation_data = {
                message: message,
                id: id,
                nonce: nonce,
                action: 'wceazy_order_cancellation_form_submit',
            };
            
            if ( message === '' || message.length < 10 ) {
                jQuery('#wceazy_cancellation_details').addClass('is-invalid').focus();
                jQuery('.cancellation_details_warning').addClass('show_cancellation_details_warning');
                return;
            }else{
                jQuery('.cancellation_details_warning').removeClass('show_cancellation_details_warning');
            }
            
            jQuery.ajax({
                url: wceazy_client_order_cancel_object .ajaxurl,
                type: 'post',
                data: cancellation_data,
                error: function(response) {
                    formSubmission.removeClass('d-block');
                    formError.addClass('d-block');
                    form.find(inputTypes).removeAttr('disabled');
                },
                success: function(response) {
                    if(response == 'success'){
                        let successEl = wceazy_order_cancellation_form.find('.cancellation_request_success').show();
                        setTimeout(function() {
                            popup_container.removeClass('wceazy_ca_popup_open');
                            location.reload();
                        }, 1000);
                    }

                    return;
                }
            });
            
        });
        
        wceazy_cancel_button.click(open_cancellation_form);
        
        
        popup_container.on('click', function(e){
            if (!jQuery(e.target).closest('.wceazy-order-cancellation-popup-inner').length) {
                popup_container.removeClass('wceazy_ca_popup_open');
            }
        });
        wceazy_cancellation_close_popup.click(handle_form_popup_close);

        function open_cancellation_form(e) {
            e.preventDefault();
            let getOrderId = jQuery(this).attr("href");
            // console.log(getOrderId);
            popup_container.addClass('wceazy_ca_popup_open');
            
            let setOrderId = popup_container.find('#order_cancellation_post_id').val(getOrderId);
            let setOrderTitle = popup_container.find('.order__title').text(`Order ${getOrderId}`);

        }
        
        function handle_form_popup_close(e) {
            e.preventDefault();
            popup_container.removeClass('wceazy_ca_popup_open');
        }

    });

}

wceazy_show_order_cancel_form();

/*
function wceazy_frontend_pf_rating_changed(view) {
    if (jQuery(view).hasClass("active")) {
        jQuery(view).parent().find(".wceazy_pf_rating_filter_item").removeClass("active")
    } else {
        jQuery(view).parent().find(".wceazy_pf_rating_filter_item").removeClass("active")
        jQuery(view).addClass("active")
    }
    wceazy_frontend_pf_search()
}




function wceazy_pf_add_to_cart(view, product_id) {

    jQuery(view).prop('disabled', true);

    var post_data = {
        'action': 'wceazy_order_cancel_add_to_cart',
        'product_id': product_id
    };

    jQuery.ajax({
        url: wceazy_client_order_cancel_object.ajaxurl,
        type: "POST",
        data: post_data,
        success: function (data) {
            jQuery(document.body).trigger('wc_fragment_refresh');
            jQuery(view).prop('disabled', false);
        }
    })

}




function wceazy_frontend_pf_search(page = "0") {


    if (jQuery('.wceazy_pf_product').length == 0) {
        if (jQuery('.wceazy_pf_product_loader').length == 0) {
            jQuery(".wceazy_pf_product_container").append("<div class=\"wceazy_pf_product_loader\">\n" +
                "                                               <div class=\"wceazy_pf_loader\"></div>\n" +
                "                                           </div>")
        }
    }


    jQuery(".wceazy_pf_product_container").addClass("shimmer")
    var search_query = "";
    var price_start = "0";
    var price_end = "999999999999";
    var rating = "0";
    var category_query = "";
    var stock_query = "";

    if (jQuery(".wceazy_pf_search_filter input").length > 0) {
        search_query = jQuery(".wceazy_pf_search_filter input").val();
    }

    if (jQuery(".wceazy_pf_price_filter_1 input").length > 0) {
        price_start = jQuery.isNumeric(jQuery(".wceazy_pf_price_filter_1 input").eq(0).val()) ? jQuery(".wceazy_pf_price_filter_1 input").eq(0).val() : price_start;
        price_end = jQuery.isNumeric(jQuery(".wceazy_pf_price_filter_1 input").eq(1).val()) ? jQuery(".wceazy_pf_price_filter_1 input").eq(1).val() : price_end;
    }

    if (jQuery(".wceazy_pf_rating_filter").length > 0) {
        rating = jQuery.isNumeric(jQuery(".wceazy_pf_rating_filter .wceazy_pf_rating_filter_item.active").attr("data-rating")) ? jQuery(".wceazy_pf_rating_filter .wceazy_pf_rating_filter_item.active").attr("data-rating") : rating;
    }

    if (jQuery(".wceazy_pf_category_filter").length > 0) {
        var categories = []
        jQuery(".wceazy_pf_category_filter_checkbox_item").each(function (i, object) {
            if (jQuery(object).find("input[type='checkbox']:checked").length > 0) {
                categories.push(jQuery(object).attr("data-slug"))
            }
        })
        category_query = categories.join(",")
    }


    if (jQuery(".wceazy_pf_stock_filter").length > 0) {
        var stocks = []
        jQuery(".wceazy_pf_stock_filter_checkbox_item").each(function (i, object) {
            if (jQuery(object).find("input[type='checkbox']:checked").length > 0) {
                stocks.push(jQuery(object).attr("data-slug"))
            }
        })
        stock_query = stocks.join(",")
    }

    let post_data = {
        'action': 'wceazy_order_cancel_search',
        'page': page,
        'query': search_query,
        'price_start': price_start,
        'price_end': price_end,
        'rating': rating,
        'category_query': category_query,
        'stock_query': stock_query,
    };
    jQuery.ajax({
        type: 'post',
        url: wceazy_client_order_cancel_object.ajaxurl,
        data: post_data,
        success: function (data) {
            jQuery(".wceazy_pf_product_container .wceazy_pf_product_loader").remove()
            jQuery(".wceazy_pf_product_container").removeClass("shimmer")
            jQuery(".wceazy_pf_product_container").empty()
            var obj = JSON.parse(data);
            if (obj.status === "true") {
                var products = obj.products;
                for (var i = 0; i < products.length; i++) {

                    var action_btn = "<button class=\"wceazy_pf_product_add_to_cart\" onclick=\"wceazy_pf_add_to_cart(this, `" + products[i].product_id + "`)\">" + products[i].add_to_cart_btn_text + "</button>"
                    if (products[i].product_is_in_stock === "0") {
                        action_btn = "<button class=\"wceazy_pf_product_out_of_stock\">" + products[i].out_of_stock_btn_text + "</button>"
                    }
                    if (products[i].product_is_variable === "1") {
                        action_btn = "<a class=\"wceazy_pf_product_manage_variation\" href=\"" + products[i].product_url + "\">" + products[i].select_options_btn_text + "</a>"
                    }

                    var itemHTML = "<div class=\"wceazy_pf_product\">\n" +
                        "               <img src=\"" + products[i].product_image + "\">\n" +
                        "               <a class=\"wceazy_pf_product_title\" href=\"" + products[i].product_url + "\">" + products[i].product_title + "</a>\n" +
                        "               <span class=\"wceazy_pf_product_price\">" + products[i].product_price + "</span>\n" +
                        "               " + action_btn + "\n" +
                        "           </div>";


                    jQuery(".wceazy_pf_product_container").append(itemHTML)
                }

                // Pagination
                jQuery(".wceazy_pf_product_pagination").empty()
                var pagination = ""
                if (obj.previous_page_number > -1) {
                    pagination += "<button class=\"wceazy_pf_product_pagination_prev\" onclick=\"wceazy_frontend_pf_search(`" + obj.previous_page_number + "`)\">" + obj.prev_btn_text + "</button>"
                }
                if (obj.next_page_number > 0) {
                    pagination += "<button class=\"wceazy_pf_product_pagination_next\" onclick=\"wceazy_frontend_pf_search(`" + obj.next_page_number + "`)\">" + obj.next_btn_text + "</button>"
                }

                jQuery(".wceazy_pf_product_container").append("<div class=\"wceazy_pf_product_pagination\">\n" +
                    "                                               " + pagination + "\n" +
                    "                                           </div>")
                // Pagination
            }
        },
    });
}

*/