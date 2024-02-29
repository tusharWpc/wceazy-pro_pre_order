<?php

/**
 * Plugin Name:       wcEazy Pro
 * Plugin URI:        https://wceazy.com
 * Description:       wcEazy provides multiple WooCommerce extensions in a single package you'll ever require.
 * Version:           1.1.4
 * Author:            wcEazy
 * Author URI:        https://wceazy.com
 * License:           GPL-2.0+
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wceazy
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

define('WCEAZY_PRO_VERSION', '1.1.4');
define('WCEAZY_PRO_PATH', plugin_dir_path(__FILE__));
define('WCEAZY_PRO_URL', plugin_dir_url(__FILE__));
define('WCEAZY_PRO_BASE_FILE', __FILE__);
define('WCEAZY_PRO_BASE_PATH', plugin_basename(__FILE__));
define('WCEAZY_PRO_IMG_DIR', WCEAZY_PRO_URL . 'assets/img/');
define('WCEAZY_PRO_CSS_DIR', WCEAZY_PRO_URL . 'assets/css/');
define('WCEAZY_PRO_JS_DIR', WCEAZY_PRO_URL . 'assets/js/');
define('WCEAZY_PRO_HELP_PAGE', 'https://wceazy.com/contact');
define('WCEAZY_PRO_DOCS_PAGE', 'https://wceazy.com/documentation/');
define('WCEAZY_PRO_EDD_ITEM_ID', 2555);

if (!class_exists('EDD_SL_Plugin_Updater')) {
    include WCEAZY_PRO_PATH . 'EDD_SL_Plugin_Updater.php';
    $license_key = trim(get_option('wceazy_license_key'));
    $edd_updater = new EDD_SL_Plugin_Updater("https://wceazy.com", __FILE__, array(
        'version'     => WCEAZY_PRO_VERSION,
        'license'     => $license_key,
        'item_id'   => WCEAZY_PRO_EDD_ITEM_ID,
        'author'     => 'wcEazy',
        'beta'      => false
    ));
}

require_once WCEAZY_PRO_PATH . 'includes/WcEazyUtils.php';
require_once WCEAZY_PRO_PATH . 'includes/WcEazySettings.php';

require_once WCEAZY_PRO_PATH . 'backend/class-wceazy-ajax.php';
require_once WCEAZY_PRO_PATH . 'backend/class-wceazy-admin.php';

require_once WCEAZY_PRO_PATH . 'frontend/class-wceazy-ajax.php';
require_once WCEAZY_PRO_PATH . 'frontend/class-wceazy-client.php';

function wceazy_pro_load_textdomain()
{
    load_plugin_textdomain('wceazy', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}

add_action('plugins_loaded', 'wceazy_pro_load_textdomain');