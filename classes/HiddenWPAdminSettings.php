<?php

/**
 * @class HiddenWPAdminSettings
 */
class HiddenWPAdminSettings {
	 
	/**
     * @method get_all
     */	 
	static public function get_all()
	{
	    $defaults = array(
	        'enabled'               => '',
	        'capability'            => 'activate_plugins',
	        'redirect_url'          => '',
	        'login_url'             => '',
	        'signup_url'            => '',
	        'redirect_login_page'   => '',
	        'redirect_signup_page'  => ''
	    );
	    
	    $settings = get_site_option('hidden-wp-admin', array());
	    
	    return array_merge( $defaults, $settings );
	}
	 
	/**
     * @method get_settings_link
     */	 
	static public function get_settings_link()
	{
	    if( is_multisite() ) {
    	    return network_admin_url( '/settings.php?page=hidden-wp-admin' );
	    }
	    else {
            return admin_url( '/options-general.php?page=hidden-wp-admin' );
	    }
	}

	/**
     * @method menu
     */
	static public function menu() 
	{
	    $title = __( 'Hidden WP Admin', 'hidden-wp-admin' );
	    $cap   = 'activate_plugins';
	    $slug  = 'hidden-wp-admin';
	    $func  = 'HiddenWPAdminSettings::render';
	    
	    if( is_multisite() ) {
    	    add_submenu_page( 'settings.php', $title, $title, $cap, $slug, $func );
	    }
	    else {
            add_options_page( $title, $title, $cap, $slug, $func );
	    }
	}
	
	/**
     * @method action_link
     */	 
	static public function action_link( $actions )
	{
        $actions[] = '<a href="' . self::get_settings_link() . '">' . __( 'Settings', 'hidden-wp-admin' ) . '</a>';
        
        return $actions;
	}
	 
	/**
     * @method render
     */	 
	static public function render()
	{
	    $settings = self::get_all();
	    
	    include HIDDEN_WP_ADMIN_DIR . 'includes/settings.php';
	}
	 
	/**
     * @method save
     */	 
	static public function save()
	{
	    if( isset( $_POST['hidden-wp-admin-nonce'] ) ) {
	    
	        if( wp_verify_nonce( $_POST['hidden-wp-admin-nonce'], 'save' ) ) {
	        
	            $_POST['settings']['capability'] = self::get_capability( $_POST['settings']['capability'] );
	        
    	        update_site_option( 'hidden-wp-admin', $_POST['settings'] );
	        }
	    }
	}
	 
	/**
     * @method get_capability
     */	 
	static public function get_capability( $slug = '' )
	{
	    global $wp_roles;
	    
	    $caps = array();
	    
	    foreach( $wp_roles->roles as $role ) {
    	    $caps = array_merge( $caps, $role['capabilities'] );
	    }
	    
	    return isset( $caps[ $slug ] ) ? $slug : 'activate_plugins';
	}
} 