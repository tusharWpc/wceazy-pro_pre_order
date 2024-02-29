<?php

$result = array();

/* Check if user has admin capabilities */
if(current_user_can('manage_options')){

    if(isset($_REQUEST['license_code']) ){

        $license_code = sanitize_text_field($_REQUEST['license_code']);

        if($this->base_admin->utils->activeLicenseCode($license_code)){
            $result = array("status" => 'true');
        }else{
            $result = array("status" => 'false');
        }

    }else{
        $result = array("status" => 'false');
    }
}else{
    $result = array("status" => 'false');
}


echo json_encode($result,  JSON_UNESCAPED_UNICODE);