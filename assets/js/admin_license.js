function wceazy_activate_license() {

    jQuery('.wceazy_license_box_body button').text('Please Wait..');
    jQuery('.wceazy_license_box_body button').addClass("loading");
    jQuery('.wceazy_license_box_body button').prop('disabled', true);

    var post_data = {
        'action': 'wceazy_license_activate',
        'license_code': jQuery('.wceazy_license_box_body input').val()
    };
    jQuery.ajax({
        url: ajaxurl, type: "POST", data: post_data,
        success: function (data) {
            var obj = JSON.parse(data);
            if (obj.status == "true") {
                window.location.href = "admin.php?page=wceazy-dashboard"
            }else{
                alert("Invalid license code.")
                jQuery('.wceazy_license_box_body button').text('Activate License');
                jQuery('.wceazy_license_box_body button').removeClass("loading");
                jQuery('.wceazy_license_box_body button').prop('disabled', false);
            }
        }
    })
}


function wceazy_deactivate_license() {

    jQuery('.wceazy_license_box_body button').text('Please Wait..');
    jQuery('.wceazy_license_box_body button').addClass("loading");
    jQuery('.wceazy_license_box_body button').prop('disabled', true);

    var post_data = {
        'action': 'wceazy_license_deactivate'
    };
    jQuery.ajax({
        url: ajaxurl, type: "POST", data: post_data,
        success: function (data) {
            var obj = JSON.parse(data);
            if (obj.status == "true") {
                window.location.href = "admin.php?page=wceazy-license"
            }else{
                alert("Something went wrong.")
                jQuery('.wceazy_license_box_body button').text('Deactivate License');
                jQuery('.wceazy_license_box_body button').removeClass("loading");
                jQuery('.wceazy_license_box_body button').prop('disabled', false);
            }
        }
    })
}