<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('WcEazyAdmin')) {
    class WcEazyAdmin
    {

        public $utils;
        public $settings;

        /* ======== Auto Apply Coupon ========== */
        public $auto_apply_coupon;
        /* ======== BOGO Deal ========== */
        public $bogo_deal;
        /* ======== Coupon Generator ========== */
        public $coupon_generator;
        /* ======== URL Coupon ========== */
        public $url_coupon;
        /* ======== Product Sticky Bar ========== */
        public $product_sticky_bar;
        /* ======== One Click Checkout ========== */
        public $one_click_checkout;
        /* ======== Floating Cart ========== */
        public $floating_cart;
        /* ======== PDF Invoice ========== */
        public $pdf_invoice;
        /* ======== Shipping Bar ========== */
        public $shipping_bar;
        /* ======== Address Book ========== */
        public $pre_order;
        /* ======== Pre Order ========== */
        public $address_book;
        /* ======== Product Filter ========== */
        public $product_filter;

        /* ======== Order Cancel ========== */
        public $order_cancel;

        public function __construct()
        {
            $this->utils = new WcEazyUtils($this);
            $this->settings = new WcEazySettings($this);
            new WcEazyAdminAjax($this);

            add_action("admin_menu", array($this, 'wceazy_admin_menu'));
            add_action('admin_enqueue_scripts', array($this, 'wceazy_admin_enqueue'));
            add_action('plugin_action_links_' . WCEAZY_PRO_BASE_PATH, array($this, 'wceazy_action_links'));
            add_filter('plugin_row_meta', array($this, 'plugin_row_meta'), 10, 2);

            /* ======== Auto Apply Coupon ========== */
            if ($this->settings->getModuleStatus("auto_apply_coupon")) {
                include_once WCEAZY_PRO_PATH . "modules/auto_apply_coupon/class-module-admin.php";
                include_once WCEAZY_PRO_PATH . "modules/auto_apply_coupon/ModuleUtils.php";
                $this->auto_apply_coupon = new WcEazyAutoApplyCouponAdmin($this);
            }
            /* ======== BOGO Deal ========== */
            if ($this->settings->getModuleStatus("bogo_deal")) {
                include_once WCEAZY_PRO_PATH . "modules/bogo_deal/class-module-admin.php";
                include_once WCEAZY_PRO_PATH . "modules/bogo_deal/ModuleUtils.php";
                $this->bogo_deal = new WcEazyBogoDealAdmin($this);
            }
            /* ======== Coupon Generator ========== */
            if ($this->settings->getModuleStatus("coupon_generator")) {
                include_once WCEAZY_PRO_PATH . "modules/coupon_generator/class-module-admin.php";
                include_once WCEAZY_PRO_PATH . "modules/coupon_generator/ModuleUtils.php";
                $this->coupon_generator = new WcEazyCouponGeneratorAdmin($this);
            }
            /* ======== URL Coupon ========== */
            if ($this->settings->getModuleStatus("url_coupon")) {
                include_once WCEAZY_PRO_PATH . "modules/url_coupon/class-module-admin.php";
                include_once WCEAZY_PRO_PATH . "modules/url_coupon/ModuleUtils.php";
                $this->url_coupon = new WcEazyUrlCouponAdmin($this);
            }
            /* ======== Product Sticky Bar ========== */
            if ($this->settings->getModuleStatus("product_sticky_bar")) {
                include_once WCEAZY_PRO_PATH . "modules/product_sticky_bar/class-module-admin.php";
                include_once WCEAZY_PRO_PATH . "modules/product_sticky_bar/ModuleUtils.php";
                $this->product_sticky_bar = new WcEazyProductStickyBarAdmin($this);
            }
            /* ======== One Click Checkout ========== */
            if ($this->settings->getModuleStatus("one_click_checkout")) {
                include_once WCEAZY_PRO_PATH . "modules/one_click_checkout/class-module-admin.php";
                include_once WCEAZY_PRO_PATH . "modules/one_click_checkout/ModuleUtils.php";
                $this->one_click_checkout = new WcEazyOneClickCheckoutAdmin($this);
            }
            /* ======== Floating Cart ========== */
            if ($this->settings->getModuleStatus("floating_cart")) {
                include_once WCEAZY_PRO_PATH . "modules/floating_cart/class-module-admin.php";
                include_once WCEAZY_PRO_PATH . "modules/floating_cart/ModuleUtils.php";
                $this->floating_cart = new WcEazyFloatingCartAdmin($this);
            }
            /* ======== PDF Invoice ========== */
            if ($this->settings->getModuleStatus("pdf_invoice")) {
                include_once WCEAZY_PRO_PATH . "modules/pdf_invoice/class-module-admin.php";
                include_once WCEAZY_PRO_PATH . "modules/pdf_invoice/ModuleUtils.php";
                $this->pdf_invoice = new WcEazyPdfInvoiceAdmin($this);
            }
            /* ======== Shipping Bar ========== */
            if ($this->settings->getModuleStatus("shipping_bar")) {
                include_once WCEAZY_PRO_PATH . "modules/shipping_bar/class-module-admin.php";
                include_once WCEAZY_PRO_PATH . "modules/shipping_bar/ModuleUtils.php";
                $this->shipping_bar = new WcEazyShippingBarAdmin($this);
            }
            /* ======== Pre Order ========== */
            if ($this->settings->getModuleStatus("pre_order")) {
                include_once WCEAZY_PRO_PATH . "modules/pre_order/class-module-admin.php";
                include_once WCEAZY_PRO_PATH . "modules/pre_order/ModuleUtils.php";
                $this->pre_order = new WcEazyPreOrderAdmin($this);
            }
            /* ======== Address Book ========== */
            if ($this->settings->getModuleStatus("address_book")) {
                include_once WCEAZY_PRO_PATH . "modules/address_book/class-module-admin.php";
                include_once WCEAZY_PRO_PATH . "modules/address_book/ModuleUtils.php";
                $this->address_book = new WcEazyAddressBookAdmin($this);
            }
            /* ======== Product Filter ========== */
            if ($this->settings->getModuleStatus("product_filter")) {
                include_once WCEAZY_PRO_PATH . "modules/product_filter/class-module-admin.php";
                include_once WCEAZY_PRO_PATH . "modules/product_filter/ModuleUtils.php";
                $this->product_filter = new WcEazyProductFilterAdmin($this);
            }

            /* ======== Order Cancel ========== */
            if ($this->settings->getModuleStatus("order_cancel")) {
                include_once WCEAZY_PRO_PATH . "modules/order_cancel/class-module-admin.php";
                include_once WCEAZY_PRO_PATH . "modules/order_cancel/ModuleUtils.php";
                $this->order_cancel = new WcEazyOrderCancelAdmin($this);
            }


        }


        function wceazy_action_links($links)
        {
            $settings_url = add_query_arg('page', 'wceazy-dashboard', get_admin_url() . 'admin.php');
            $setting_arr = array('<a href="' . esc_url($settings_url) . '">Dashboard</a>');
            $links = array_merge($setting_arr, $links);
            return $links;
        }
        public function plugin_row_meta($links, $file)
        {

            $docs_url = WCEAZY_PRO_DOCS_PAGE;
            $support_url = 'https://wceazy.com/support/';

            $row_meta = array(
                'docs' => '<a href="' . esc_url($docs_url) . '" target="_blank" aria-label="' . esc_attr__('View wcEazy documentation', 'wceazy') . '">' . esc_html__('Docs', 'wceazy') . '</a>',
                'support' => '<a href="' . esc_url($support_url) . '" target="_blank" aria-label="' . esc_attr__('Get Support', 'wceazy') . '">' . esc_html__('Get support', 'wceazy') . '</a>',
            );

            return array_merge($links, $row_meta);
        }
        function wceazy_admin_menu()
        {
            $icon_url = WCEAZY_PRO_IMG_DIR . "wceazy_icon.svg";
            add_menu_page("wcEazy", "wcEazy", 'manage_options', "wceazy-dashboard", array($this, 'wceazy_admin_dashboard'), $icon_url, 6);
            add_submenu_page("wceazy-dashboard", "wcEazy", 'Dashboard', "manage_options", 'wceazy-dashboard', array($this, 'wceazy_admin_dashboard'));
            add_submenu_page("wceazy-dashboard", "License", 'License', "manage_options", 'wceazy-license', array($this, 'wceazy_admin_license'));
        }



        function wceazy_admin_enqueue($page)
        {
            if ($page == "toplevel_page_wceazy-dashboard") {
                wp_enqueue_style('wceazy-admin-main', WCEAZY_PRO_CSS_DIR . 'admin_main.css', array(), WCEAZY_PRO_VERSION);
                wp_enqueue_style('wceazy-admin-license', WCEAZY_PRO_CSS_DIR . 'admin_license.css', array(), WCEAZY_PRO_VERSION);
                wp_enqueue_style('wceazy-admin-modules', WCEAZY_PRO_CSS_DIR . 'admin_modules.css', array(), WCEAZY_PRO_VERSION);
                wp_enqueue_style('wceazy-admin-toastr', WCEAZY_PRO_CSS_DIR . 'toastr.min.css', array(), WCEAZY_PRO_VERSION);
                wp_enqueue_style('wceazy-admin-datatable', WCEAZY_PRO_CSS_DIR . 'dataTables.min.css', array(), WCEAZY_PRO_VERSION);
                wp_enqueue_style('wceazy-admin-select2', WCEAZY_PRO_CSS_DIR . 'select2.min.css', array(), WCEAZY_PRO_VERSION);

                wp_enqueue_script('wceazy-admin-main', WCEAZY_PRO_JS_DIR . 'admin_main.js', array('jquery'), WCEAZY_PRO_VERSION);
                wp_enqueue_script('wceazy-admin-license', WCEAZY_PRO_JS_DIR . 'admin_license.js', array('jquery'), WCEAZY_PRO_VERSION);
                wp_enqueue_script('wceazy-admin-toastr', WCEAZY_PRO_JS_DIR . 'toastr.min.js', array('jquery'), WCEAZY_PRO_VERSION);
                wp_enqueue_script('wceazy-admin-datatable', WCEAZY_PRO_JS_DIR . 'dataTables.min.js', array('jquery'), WCEAZY_PRO_VERSION);
                wp_enqueue_script('wceazy-admin-select2', WCEAZY_PRO_JS_DIR . 'select2.min.js', array('jquery'), WCEAZY_PRO_VERSION);

                wp_enqueue_media();

                /* ======== Auto Apply Coupon ========== */
                if ($this->settings->getModuleStatus("auto_apply_coupon")) {
                    wp_enqueue_style('wceazy-admin-module-auto-apply-coupon', WCEAZY_PRO_CSS_DIR . 'auto_apply_coupon/admin_main.css', array(), WCEAZY_PRO_VERSION);
                    wp_enqueue_script('wceazy-admin-module-auto-apply-coupon', WCEAZY_PRO_JS_DIR . 'auto_apply_coupon/admin_main.js', array('jquery'), WCEAZY_PRO_VERSION);
                }
                /* ======== BOGO Deal ========== */
                if ($this->settings->getModuleStatus("bogo_deal")) {
                    wp_enqueue_style('wceazy-admin-module-bogo-deal', WCEAZY_PRO_CSS_DIR . 'bogo_deal/admin_main.css', array(), WCEAZY_PRO_VERSION);
                    wp_enqueue_script('wceazy-admin-module-bogo-deal', WCEAZY_PRO_JS_DIR . 'bogo_deal/admin_main.js', array('jquery'), WCEAZY_PRO_VERSION);
                }
                /* ======== Coupon Generator ========== */
                if ($this->settings->getModuleStatus("coupon_generator")) {
                    wp_enqueue_style('wceazy-admin-module-coupon-generator', WCEAZY_PRO_CSS_DIR . 'coupon_generator/admin_main.css', array(), WCEAZY_PRO_VERSION);
                    wp_enqueue_script('wceazy-admin-module-coupon-generator', WCEAZY_PRO_JS_DIR . 'coupon_generator/admin_main.js', array('jquery'), WCEAZY_PRO_VERSION);
                }
                /* ======== URL Coupon ========== */
                if ($this->settings->getModuleStatus("url_coupon")) {
                    wp_enqueue_style('wceazy-admin-module-url-coupon', WCEAZY_PRO_CSS_DIR . 'url_coupon/admin_main.css', array(), WCEAZY_PRO_VERSION);
                    wp_enqueue_script('wceazy-admin-module-url-coupon', WCEAZY_PRO_JS_DIR . 'url_coupon/admin_main.js', array('jquery'), WCEAZY_PRO_VERSION);
                }
                /* ======== Product Sticky Bar ========== */
                if ($this->settings->getModuleStatus("product_sticky_bar")) {
                    wp_enqueue_style('wceazy-admin-module-product-sticky-bar', WCEAZY_PRO_CSS_DIR . 'product_sticky_bar/admin_main.css', array(), WCEAZY_PRO_VERSION);
                    wp_enqueue_script('wceazy-admin-module-product-sticky-bar', WCEAZY_PRO_JS_DIR . 'product_sticky_bar/admin_main.js', array('jquery'), WCEAZY_PRO_VERSION);
                }
                /* ======== One Click Checkout ========== */
                if ($this->settings->getModuleStatus("one_click_checkout")) {
                    wp_enqueue_style('wceazy-admin-module-one-click-checkout', WCEAZY_PRO_CSS_DIR . 'one_click_checkout/admin_main.css', array(), WCEAZY_PRO_VERSION);
                    wp_enqueue_script('wceazy-admin-module-one-click-checkout', WCEAZY_PRO_JS_DIR . 'one_click_checkout/admin_main.js', array('jquery'), WCEAZY_PRO_VERSION);
                }
                /* ======== Floating Cart ========== */
                if ($this->settings->getModuleStatus("floating_cart")) {
                    wp_enqueue_style('wceazy-admin-module-floating-cart', WCEAZY_PRO_CSS_DIR . 'floating_cart/admin_main.css', array(), WCEAZY_PRO_VERSION);
                    wp_enqueue_script('wceazy-admin-module-floating-cart', WCEAZY_PRO_JS_DIR . 'floating_cart/admin_main.js', array('jquery'), WCEAZY_PRO_VERSION);
                }
                /* ======== PDF Invoice ========== */
                if ($this->settings->getModuleStatus("pdf_invoice")) {
                    wp_enqueue_style('wceazy-admin-module-pdf-invoice', WCEAZY_PRO_CSS_DIR . 'pdf_invoice/admin_main.css', array(), WCEAZY_PRO_VERSION);
                    wp_enqueue_script('wceazy-admin-module-pdf-invoice', WCEAZY_PRO_JS_DIR . 'pdf_invoice/admin_main.js', array('jquery'), WCEAZY_PRO_VERSION);
                }
                /* ======== Shipping Bar ========== */
                if ($this->settings->getModuleStatus("shipping_bar")) {
                    wp_enqueue_style('wceazy-admin-module-shipping-bar', WCEAZY_PRO_CSS_DIR . 'shipping_bar/admin_main.css', array(), WCEAZY_PRO_VERSION);
                    wp_enqueue_script('wceazy-admin-module-shipping-bar', WCEAZY_PRO_JS_DIR . 'shipping_bar/admin_main.js', array('jquery'), WCEAZY_PRO_VERSION);
                }
                /* ======== pre order ========== */
                if ($this->settings->getModuleStatus("pre_order")) {
                    wp_enqueue_style('wceazy-admin-module-pre-order', WCEAZY_CSS_DIR . 'pre_order/admin_main.css', array(), WCEAZY_VERSION);
                    wp_enqueue_script('wceazy-admin-module-pre-order', WCEAZY_JS_DIR . 'pre_order/admin_main.js', array('jquery'), WCEAZY_VERSION);
                }
                /* ======== Address Book ========== */
                if ($this->settings->getModuleStatus("address_book")) {
                    wp_enqueue_style('wceazy-admin-module-address-book', WCEAZY_PRO_CSS_DIR . 'address_book/admin_main.css', array(), WCEAZY_PRO_VERSION);
                    wp_enqueue_script('wceazy-admin-module-address-book', WCEAZY_PRO_JS_DIR . 'address_book/admin_main.js', array('jquery'), WCEAZY_PRO_VERSION);
                }
                /* ======== Product Filter ========== */
                if ($this->settings->getModuleStatus("product_filter")) {
                    wp_enqueue_style('wceazy-admin-module-product-filter', WCEAZY_PRO_CSS_DIR . 'product_filter/admin_main.css', array(), WCEAZY_PRO_VERSION);
                    wp_enqueue_script('wceazy-admin-module-product-filter', WCEAZY_PRO_JS_DIR . 'product_filter/admin_main.js', array('jquery'), WCEAZY_PRO_VERSION);
                }
                /* ======== Order Cancel ========== */
                if ($this->settings->getModuleStatus("order_cancel")) {
                    wp_enqueue_style('wceazy-admin-module-order-cancel', WCEAZY_PRO_CSS_DIR . 'order_cancel/admin_main.css', array(), WCEAZY_PRO_VERSION);
                    wp_enqueue_script('wceazy-admin-module-order-cancel', WCEAZY_PRO_JS_DIR . 'order_cancel/admin_main.js', array('jquery'), WCEAZY_PRO_VERSION);
                }
            }
            if ($page == "wceazy_page_wceazy-license") {
                wp_enqueue_style('wceazy-admin-main', WCEAZY_PRO_CSS_DIR . 'admin_main.css', array(), WCEAZY_PRO_VERSION);
                wp_enqueue_style('wceazy-admin-license', WCEAZY_PRO_CSS_DIR . 'admin_license.css', array(), WCEAZY_PRO_VERSION);

                wp_enqueue_script('wceazy-admin-license', WCEAZY_PRO_JS_DIR . 'admin_license.js', array('jquery'), WCEAZY_PRO_VERSION);

            }
        }

        function wceazy_admin_dashboard()
        {

            $key = get_option("wceazy_license_key", Null);
            $last_checked = get_option("wceazy_license_last_checked_time", 0);

            if ($key == Null || $last_checked == 0) {
                include_once WCEAZY_PRO_PATH . "backend/templates/license.php";
            } else if (time() - $last_checked > 259200) {
                if ($this->utils->checkWcFusionPro($key) == False) {
                    update_option('wceazy_license_key', "");
                    update_option('wceazy_license_last_checked_time', 0);
                    update_option('wceazy_license_expires', "");
                    include_once WCEAZY_PRO_PATH . "backend/templates/license.php";
                } else {
                    include_once WCEAZY_PRO_PATH . "backend/templates/dashboard.php";
                }
            } else {
                include_once WCEAZY_PRO_PATH . "backend/templates/dashboard.php";
            }
        }

        function wceazy_admin_license()
        {
            include_once WCEAZY_PRO_PATH . "backend/templates/license.php";
        }

    }
}




if (is_admin()) {
    new WcEazyAdmin();
}