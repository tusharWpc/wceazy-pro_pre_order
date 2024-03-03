<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!isset($_SESSION)) {
    session_start();
}

if (!class_exists('WcEazyOrderCancelUtils')) {
    class WcEazyOrderCancelUtils
    {
        public $base_admin;
        public $module_admin;

        public function __construct($base_admin, $module_admin)
        {
            $this->base_admin = $base_admin;
            $this->module_admin = $module_admin;
        }

        public function saveSettings($post_data)
        {
            if (!empty($post_data)) {
                update_option('wceazy_order_cancel_settings', json_encode($post_data));
            }
        }

        public function getWooProductCategories()
        {
            $categories = array();
            $cat_args = array(
                'orderby' => "name",
                'order' => "asc",
                'hide_empty' => false,
            );
            $product_categories = get_terms('product_cat', $cat_args);
            foreach ($product_categories as $key => $category) {
                $categories[] = array(
                    "title" => $category->name,
                    "slug" => $category->slug,
                );
            }
            return $categories;
        }
        public function getCurrentTime()
        {

            // Get the WordPress timezone setting
            $wordpress_timezone = get_option('timezone_string');

            // Set the default timezone to UTC (you can change it if needed)
            date_default_timezone_set('UTC');

            if (!empty($wordpress_timezone)) {
                // Set the timezone to the one saved in WordPress settings
                date_default_timezone_set($wordpress_timezone);
            }

            // Get the current time in the WordPress timezone
            $current_time = date('Y-m-d h:i a');
            return $current_time;

            // Echo the current time
            echo 'Current time in WordPress timezone (' . $wordpress_timezone . '): ' . $current_time;
        }


        public function approve_cancellation_request($addedItems = [])
        {
            $result = false;
            $post_id = +$addedItems[0]['ID'];

            if (!class_exists('WooCommerce')) {
                return $result;
            }
            $result = $this->change_order_status($post_id);
            return $result;
        }
        public function decline_cancellation_request($addedItems = [])
        {
            $result = false;
            $post_id = +$addedItems[0]['ID'];

            if (!class_exists('WooCommerce')) {
                return $result;
            }
            $result = $this->change_order_status($post_id, 'wc-processing');
            return $result;
        }

        public function change_order_status($post_id, $status = 'wc-cancelled')
        {
            // Update post status
            if (isset($post_id) && is_numeric($post_id) && get_post($post_id)) {
                // Update the post status
                $updated = wp_update_post(
                    array(
                        'ID' => $post_id,
                        'post_status' => $status,
                    )
                );

                if ($updated) {
                    return true;
                } else {
                    return false;
                }

            } else {
                return false;
            }
        }
        public function add_into_auto_apply_coupon_list($addedItems = [])
        {
            $result = false;
            if (!class_exists('WooCommerce')) {
                return $result;
            }
            if (!empty($addedItems) && is_array($addedItems)) {
                $auto_apply_coupons = get_option('wceazy_auto_apply_coupons');
                foreach ($addedItems as $index => $item) {
                    $auto_apply_coupons[$item['ID']] = array('ID' => $item['ID'], 'coupon_code' => $item['coupon_code']);
                }
                if (update_option('wceazy_auto_apply_coupons', $auto_apply_coupons)) {
                    $result = true;
                }
            }
            return $result;
        }


        public function removeElementWithValue($data, $remove_key)
        {
            foreach ($data as $key => $row) {
                unset($data[$remove_key]);
            }
            return $data;
        }


        public function remove_into_auto_apply_coupon_list($deleteItems = [])
        {
            $result = false;
            if (!class_exists('WooCommerce')) {
                return $result;
            }
            if (!empty($deleteItems) && is_array($deleteItems)) {
                $auto_apply_coupons = get_option('wceazy_auto_apply_coupons');
                foreach ($deleteItems as $index => $dlItem) {
                    $auto_apply_coupons = $this->removeElementWithValue($auto_apply_coupons, $dlItem['ID']);
                }
                if (update_option('wceazy_auto_apply_coupons', $auto_apply_coupons)) {
                    $result = true;
                }
            }

            return $result;
        }


        public function coupon_bulk_edit($data = [])
        {
            $result = false;
            if (!class_exists('WooCommerce')) {
                return $result;
            }
            if (!empty($data) && is_array($data)) {

                $toggle_type = !empty($data['toggole_type']) ? $data['toggole_type'] : '';
                $coupon_data = !empty($data['coupon_data']) ? $data['coupon_data'] : [];

                $auto_apply_coupons = get_option('wceazy_auto_apply_coupons');
                $auto_apply_coupons = (!empty($auto_apply_coupons) && is_array($auto_apply_coupons)) ? $auto_apply_coupons : array();

                if (!empty($coupon_data) && !empty($toggle_type)) {

                    if ($toggle_type == 'add') {
                        foreach ($coupon_data as $index => $item) {
                            $auto_apply_coupons[$item['ID']] = array('ID' => $item['ID'], 'coupon_code' => $item['coupon_code']);
                        }
                    } else {
                        foreach ($coupon_data as $index => $dlItem) {
                            $auto_apply_coupons = $this->removeElementWithValue($auto_apply_coupons, $dlItem['ID']);
                        }
                    }
                    if (update_option('wceazy_auto_apply_coupons', $auto_apply_coupons)) {
                        $result = true;
                    }
                }
            }
            return $result;
        }


        public function apply_coupon_automatically()
        {
            if (!class_exists('WooCommerce')) {
                return;
            }
            global $woocommerce;
            // get auto apply coupon list
            $auto_apply_coupons = get_option('wceazy_auto_apply_coupons');

            $url_coupon_id = (isset($_SESSION['url_coupon_id']) && !empty($_SESSION['url_coupon_id'])) ? $_SESSION['url_coupon_id'] : '';
            $url_coupon_force_apply = 'no';

            if (!empty($url_coupon_id)) {
                $url_coupon_force_apply = get_post_meta($url_coupon_id, 'wceazy_force_apply_url_coupon', true) ? get_post_meta($url_coupon_id, 'wceazy_force_apply_url_coupon', true) : 'no';
            }

            // generate new auto apply coupon data for
            if (!empty($auto_apply_coupons) && $url_coupon_force_apply !== 'yes') {
                foreach ($auto_apply_coupons as $key => $coupon) {
                    $coupon_code = $coupon['coupon_code'];
                    $coupon = new \WC_Coupon($coupon_code);
                    $discounts = new \WC_Discounts(WC()->cart);
                    $valid_response = $discounts->is_coupon_valid($coupon);

                    if (!is_wp_error($valid_response)) {
                        // add discount if not exits
                        if (!$woocommerce->cart->has_discount(sanitize_text_field($coupon_code))) {
                            $woocommerce->cart->add_discount(sanitize_text_field($coupon_code));
                        }
                    }
                }
            }

        }


        public function wceazy_session_unset()
        {
            unset($_SESSION['url_coupon_id']);
        }



    }
}