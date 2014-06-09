<?php
/**
 * Plugin Name: Hide WP Admin
 * Plugin URI: http://themes.fastlinemedia.com
 * Description: Hide WP admin, login and signup from all users except those you allow.
 * Version: 1.0
 * Author: FastLine Themes
 * Author URI: http://themes.fastlinemedia.com
 * License: GPL2+
 * Text Domain: fl-hidden-admin
 */

/* Constants */
define( 'FL_HIDDEN_ADMIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'FL_HIDDEN_ADMIN_URL', plugins_url( '/', __FILE__ ) );

/* Classes */
require_once FL_HIDDEN_ADMIN_DIR . 'classes/FLHiddenAdmin.php';
require_once FL_HIDDEN_ADMIN_DIR . 'classes/FLHiddenAdminSettings.php';

/* Actions */
add_action( 'init', 'FLHiddenAdmin::init' );
add_action( 'admin_init', 'FLHiddenAdminSettings::save' );
add_action( 'admin_menu', 'FLHiddenAdminSettings::menu' );
add_action( 'network_admin_menu', 'FLHiddenAdminSettings::menu' );
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'FLHiddenAdminSettings::action_link' );