<?php
/*
  Plugin Name: Types - Complete Solution for Custom Fields and Types 
  Plugin URI: http://wordpress.org/extend/plugins/types/
  Description: Define custom post types, custom taxonomy and custom fields.
  Author: ICanLocalize
  Author URI: http://wp-types.com
  Version: 0.9.1
 */
define('WPCF_VERSION', '0.9.1');
define('WPCF_ABSPATH', dirname(__FILE__));
define('WPCF_RELPATH', plugins_url() . '/' . basename(WPCF_ABSPATH));
define('WPCF_INC_ABSPATH', WPCF_ABSPATH . '/includes');
define('WPCF_INC_RELPATH', WPCF_RELPATH . '/includes');
define('WPCF_RES_ABSPATH', WPCF_ABSPATH . '/resources');
define('WPCF_RES_RELPATH', WPCF_RELPATH . '/resources');
require_once WPCF_INC_ABSPATH . '/constants.inc';

add_action('plugins_loaded', 'wpcf_init');
add_action('init', 'wpcf_init_embedded_code', 999);
register_activation_hook(__FILE__, 'wpcf_upgrade_init');

/**
 * Main init hook.
 */
function wpcf_init() {
    if (is_admin()) {
        require_once WPCF_ABSPATH . '/admin.php';
    }
}

/**
 * Include embedded code if not used in theme.
 */
function wpcf_init_embedded_code() {
    if (!defined('WPCF_EMBEDDED_ABSPATH')) {
        require_once WPCF_ABSPATH . '/embedded/types.php';
        wpcf_embedded_init();
    }
}

/**
 * Upgrade hook.
 */
function wpcf_upgrade_init() {
    require_once WPCF_ABSPATH . '/upgrade.php';
    wpcf_upgrade();
}
