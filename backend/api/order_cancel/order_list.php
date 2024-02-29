<?php

$result = array();

/* Check if user has manage option capabilities */
if (current_user_can ('manage_options')) {

    $tableData = array();

    // Start query here
    
    $has_cancellation_key = 'has_cancellation_request';
    $args = array(
        'numberposts'      => -1,
        // 'post_status'      => ['wc-completed', 'wc-processing'],           
        'post_status'      => 'any',           
        'post_type'        => 'shop_order',
        'suppress_filters' => true,
        'meta_query' => array(
            array(
                'key' => $has_cancellation_key,
                'value' => 'yes',
                'compare' => '==',
                ),
            ),
    );
    $orders = get_posts( $args );
    
    $view_image_url = WCEAZY_PRO_URL. 'assets/img/modules/order_cancel/eye.svg';
    $view_image_url = WCEAZY_PRO_URL. 'assets/img/modules/order_cancel/check_icon.svg';
    
    // generate new auto apply coupon data for
    if (!empty($orders)) {

        foreach ($orders as $key => $order) {

            // $order_string =  json_encode ($order, JSON_UNESCAPED_UNICODE);
            
                        // $customer_user = get_post_meta( $order->ID, 'customer_user', true );
            // $my_order = wc_get_order($order->ID);
            // $customer_id = $order->get_customer_id();
            // $post_status = get_post_status($post);
            
            $the_order = wc_get_order($order->ID);
            $status = $the_order->get_status();
            $order_status = wc_get_order_status_name($status);
            $total_amount = $the_order->get_total();
            
            $cancellation_details_key = 'wceazy_cancellation_details';
            
            $cancellation_details_value = get_post_meta( $order->ID, $cancellation_details_key , true );
            
            $submission_time = '';
            $submission_message = '';
            if($cancellation_details_value){
                if(isset($cancellation_details_value['time'])){
                    $submission_time = $cancellation_details_value['time'];
                }
                if(isset($cancellation_details_value['details'])){
                    $submission_message = $cancellation_details_value['details'];
                }
            }
            
            $is_approved = false;
            $is_declined = false;
            // $inputCheckBoxVal = json_encode (array('ID' => $order->ID, 'coupon_code' => $order->post_name ),JSON_UNESCAPED_UNICODE );
            $inputCheckBoxVal = json_encode (array('ID' => $order->ID, 'details' => $submission_message ),JSON_UNESCAPED_UNICODE );
            
            $inputCheckBox = "<input type='checkbox' onchange='wceazy_order_cancel_bulk_edit_check_ability()' name='wceazy_order_cancel_table_row_checkboxes[]' value='".$inputCheckBoxVal."'>";
            
            
            $request_time = 'Request time';
            
            $request_time = $submission_time;
            $request_status = 'Pending';
            if($status == 'cancelled'){
                $request_status = 'Approved';
                $is_approved = true;
            }
            
            if($status != 'cancelled' AND $status != 'cancel-request'){
                $request_status = 'Declined';
                $is_declined = true;
            }
            // $customer_name = $the_order->get_billing_first_name(); 
            $customer_name = $order->ID . ' ' .$the_order->get_billing_first_name().' '.$the_order->get_billing_last_name(); 
            
            $code = "<strong>#". $customer_name ."</strong>";
            
            $is_approved_class = ($status == 'cancelled') ? 'text-success' : 'text-warning';
            if($status == 'cancel-request') $is_approved_class = 'text-eazy-orange';
            
            $approve_disable = '';
            if($is_approved){
                $approve_disable = 'disabled';
            }
            $declined_disable = '';
            if($is_declined){
                $declined_disable = 'disabled';
            }
            
            
            $orderEdit = "<a class='wceazy_order_cancel_edit_apply_btn' title='Edit Order' target='_blank' href='".site_url('wp-admin/post.php?post='.$order->ID.'&action=edit')."'></a>";
            
            $declineBtn = "<button class='wceazy_order_cancel_remove_from_auto_apply_btn wceazy_decline_btn' onclick='wceazy_remove_from_order_cancel($inputCheckBoxVal);' $declined_disable>Decline</button>";
            
            $approveBtn = "<button class='wceazy_order_cancel_add_to_auto_apply_btn order_cancel_view_btn wceazy_approve_btn' onclick='wceazy_add_to_order_cancel($inputCheckBoxVal);' $approve_disable>
                Approve
            </button>";
            
            // $iconAction2 = "<button class='wceazy_order_cancel_add_to_auto_apply_btn' onclick='wceazy_add_to_order_cancel($inputCheckBoxVal);'></button>";
            
            $actions = "<div class='wceazy_order_cancel_table_row_action'>
                                ".$orderEdit. $approveBtn.$declineBtn."
                        </div>";


            // generate data table here
            $tableData[] = array(
                // columns dynamic valus
                $inputCheckBox,
                $code,
                $request_time,
                $total_amount,
                $order_status,
                '<span class="'. $is_approved_class.'">'.$request_status.'</span>',
                $actions,
            );
        }

        $result['draw'] = 1;
        $result['recordsTotal'] = 1;
        $result['recordsFiltered'] = 1;
        $result['data'] = $tableData;
    }else{
        $result['draw'] = 0;
        $result['recordsTotal'] = 0;
        $result['recordsFiltered'] = 0;
        $result['data'] = [];
    }

}


echo json_encode ($result, JSON_UNESCAPED_UNICODE);
