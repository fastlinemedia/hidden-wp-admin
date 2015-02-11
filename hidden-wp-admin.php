<?php
/**
 * Plugin Name: Hidden WP Admin
 * Plugin URI: http://wordpress.org/plugins/hidden-wp-admin/
 * Description: Hide WP admin, login and signup from all users except those you allow.
 * Version: 1.2
 * Author: The Beaver Builder Team
 * Author URI: https://www.wpbeaverbuilder.com/?utm_source=external&utm_medium=hidden-wp-admin&utm_campaign=plugins-page
 * License: GPL2+
 * Text Domain: hidden-wp-admin
 */

/* Constants */
define( 'HIDDEN_WP_ADMIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'HIDDEN_WP_ADMIN_URL', plugins_url( '/', __FILE__ ) );

/* Classes */
require_once HIDDEN_WP_ADMIN_DIR . 'classes/HiddenWPAdmin.php';
require_once HIDDEN_WP_ADMIN_DIR . 'classes/HiddenWPAdminSettings.php';

/* Actions */
add_action( 'init', 'HiddenWPAdmin::init' );
add_action( 'admin_init', 'HiddenWPAdminSettings::save' );
add_action( 'admin_menu', 'HiddenWPAdminSettings::menu' );
add_action( 'network_admin_menu', 'HiddenWPAdminSettings::menu' );
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'HiddenWPAdminSettings::action_link' );