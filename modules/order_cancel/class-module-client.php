<?php


// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('WcEazyOrderCancelClient')) {
    class WcEazyOrderCancelClient
    {

        public $utils;
        public $base_admin;
        public $module_admin;
        public $module_slug = "order_cancel";
        public $current_time;

        public function __construct ($base_admin)
        {
            $this->module_admin = $this;
            $this->base_admin = $base_admin;
            $this->utils = new WcEazyOrderCancelUtils($this->base_admin, $this->module_admin);
            
            add_action('init', [$this, 'register_order_cancel_request_status']);

            add_filter('wc_order_statuses', [$this, 'add_order_cancellation_request_status_to_dropdown']);

            add_filter('woocommerce_my_account_my_orders_actions', [$this, 'add_cancel_button_to_my_account_orders'], 10, 2);

            add_action('wp_footer', [$this, 'add_order_cancel_popup_container_in_order_page']);
            
            add_action('wp_ajax_nopriv_wceazy_order_cancellation_form_submit', [$this, 'handle_wceazy_order_cancellation_form_submit']);
            add_action('wp_ajax_wceazy_order_cancellation_form_submit', [$this, 'handle_wceazy_order_cancellation_form_submit']);
            
            
        }

    

        public function handle_wceazy_order_cancellation_form_submit() {
            // Post ID
            // $post_id = 598;
            
            $nonce 	= sanitize_text_field( $_POST['nonce'] );
            if ( ! wp_verify_nonce( $nonce, 'order_cancellation_nonce' ) ) {
                echo 0;
                die();
            }
            $post_id 	= sanitize_text_field( $_POST['id'] );
            $details 	= sanitize_text_field( $_POST['message'] );
            
            
            $has_request_key = 'has_cancellation_request';
            $details_key = 'wceazy_cancellation_details';
            
            // $details = 'This product have some visible issue. Please cancel my order.';
            // $time = wceazy_current_time();
            
            $time = $this->utils->getCurrentTime();
            $cancellation_details = [
                'details' => $details,
                'time' => $time,
            ];
            
            // Update post metas
            if ( ! add_post_meta( $post_id, $has_request_key, 'yes', true ) ) { 
                update_post_meta ( $post_id, $has_request_key, 'yes' );
            }
            if ( ! add_post_meta( $post_id, $details_key, $cancellation_details, true ) ) { 
                update_post_meta ( $post_id, $details_key, $cancellation_details );
            }
            
            // Update post status
            if (isset($post_id) && is_numeric($post_id) && get_post($post_id)) {
                // Update the post status
                $updated = wp_update_post(array(
                    'ID'            => $post_id,
                    'post_status'   => 'wc-cancel-request',
                ));
                
                if($updated) echo 'success';
            
            } else {
                // Log an error or display a message to help diagnose the issue.
                error_log("Invalid post ID or post does not exist.");
            }
            
            // echo 'Request successfully send.';
            
            exit();
        }
        public function register_order_cancel_request_status() {
            register_post_status('wc-cancel-request', array(
            'label'                     => 'Cancel Request',
            'public'                    => true,
            'exclude_from_search'       => false,
            'show_in_admin_all_list'    => true,
            'show_in_admin_status_list' => true,
            'label_count'               => _n_noop('Cancel Request <span class="count">(%s)</span>', 'Cancel Request <span class="count">(%s)</span>')
            ));
        }
        
        
        public function add_order_cancellation_request_status_to_dropdown($order_statuses) {
            $order_statuses['wc-cancel-request'] = 'Cancel Request';
            return $order_statuses;
        }
        
        // Add 'Cancel' button in the My Account -> Orders action column for orders with 'Processing' or 'On Hold' status
        public function add_cancel_button_to_my_account_orders($actions, $order) {
            // Check if the order status is 'Processing' or 'On Hold'

            $allowed_status = array('processing', 'on-hold');

            $wceazy_order_cancel_settings = get_option('wceazy_order_cancel_settings', False);
            $wceazy_oc_settings = $wceazy_order_cancel_settings ? json_decode($wceazy_order_cancel_settings, true) : array();

            $wceazy_oc_allowed_status = isset($wceazy_oc_settings["wceazy_oc_allowed_status"]) ? explode(",",$wceazy_oc_settings["wceazy_oc_allowed_status"]) : array();
            
            if(count($wceazy_oc_allowed_status) > 0){
                $allowed_status = $wceazy_oc_allowed_status;
            } 
            
            if (in_array($order->get_status(), $allowed_status )) {
            // Add a 'View' button
            $actions['view'] = array(
                'url'  => $order->get_view_order_url(),
                'name' => __('View', 'woocommerce'),
            );

            // Add a 'Cancel' button with specified classes
            $actions['wceazy_cancel__order'] = array(
                // 'url'  => wc_get_endpoint_url('cancel-order', $order->get_id()),
                'url'  => '#'.$order->get_id(),
                'name' => __('Cancel Order', 'woocommerce'),
                'class' => 'woocommerce-button button cancel wceazy-cancel',
            );
            }

            return $actions;
        }
        public function order_cancel_popup_markup() {
            
        }
        
        public function add_order_cancel_popup_container_in_order_page() {
            // if(is_page('orders')){
            if (is_wc_endpoint_url('orders')) {
                $popupMarkup = $this->wceazy_order_cancel_view_maker();

                echo $popupMarkup;
                // echo wp_kses_post($popupMarkup);
            }
        }
        
        public function wceazy_order_cancel_view_maker() {
            ob_start();

            include 'template.php';

            return ob_get_clean();
        }

    }
}