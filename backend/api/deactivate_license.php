<?php

$result = array();

/* Check if user has admin capabilities */
if(current_user_can('manage_options')){

    if($this->base_admin->utils->deActiveLicenseCode()){
        $result = array("status" => 'true');
    }else{
        $result = array("status" => 'false');
    }
}else{
    $result = array("status" => 'false');
}


echo json_encode($result,  JSON_UNESCAPED_UNICODE);