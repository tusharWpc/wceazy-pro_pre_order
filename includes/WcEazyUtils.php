<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

if ( ! class_exists( 'WcEazyUtils' ) ) {
    class WcEazyUtils
    {

        public $base_admin;
        public function __construct($base_admin)
        {
            $this->base_admin = $base_admin;
        }

        public function checkWcFusionPro($key){
            $parmas = array();
            $parmas['edd_action'] = 'check_license';
            $parmas['item_id'] = WCEAZY_PRO_EDD_ITEM_ID;
            $parmas['license'] = $key;
            $parmas['url'] = get_site_url();
            $url    = $this->wceazy_get_edd_api().'?' . http_build_query($parmas,'&');
            $output = $this->wceazy_build_connection($url);

            if( isset($output->success) && $output->success == 'true' ){
                return True;
            }
            return False;
        }

        public function wceazy_get_edd_api(){
            return 'https://wceazy.com/';
        }

        private function wceazy_build_connection($url){
            $args = array('timeout'=>60, 'redirection'=>3, 'httpversion'=>'1.0', 'blocking'=>true, 'sslverify'=>true,);
            $res = wp_remote_get($url, $args);
            if( isset( $res->errors ) && !empty( $res->errors ) ){
                return;
            }else{
                return ( isset($res) && !empty($res) ) ? (object) json_decode((string) $res['body']) : (object) json_decode([]);
            }

        }


        public function activeLicenseCode($key){
            $parmas['edd_action'] = 'activate_license';
            $parmas['item_id'] = WCEAZY_PRO_EDD_ITEM_ID;
            $parmas['license'] = $key;
            $parmas['url'] = get_site_url();
            $url    = $this->wceazy_get_edd_api().'?' . http_build_query($parmas,'&');
            $output = $this->wceazy_build_connection($url);

            if( isset($output->success) && $output->success == 'true' ){
                update_option('wceazy_license_key', $key);
                update_option('wceazy_license_last_checked_time', time());
                update_option('wceazy_license_expires', isset($output->expires) ? $output->expires : "");
                return True;
            }
            return False;
        }

        public function deActiveLicenseCode(){
            $parmas = array();
            $parmas['edd_action'] = 'deactivate_license';
            $parmas['item_id'] = WCEAZY_PRO_EDD_ITEM_ID;
            $parmas['license'] = get_option("wceazy_license_key", "");
            $parmas['url'] = get_site_url();
            $url = $this->wceazy_get_edd_api().'?' . http_build_query($parmas,'&');
            $output = $this->wceazy_build_connection($url);
            if( isset($output->success) && $output->success == 'true' ){
                update_option('wceazy_license_key', "");
                update_option('wceazy_license_last_checked_time', 0);
                update_option('wceazy_license_expires', "");
                return True;
            }
            return False;
        }



    }
}
