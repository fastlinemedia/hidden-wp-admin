<?php

/**
 * @class HiddenWPAdmin
 */
class HiddenWPAdmin {

	/**
     * @method init
     */
    static public function init()
    {
        global $pagenow;
        
        $settings = HiddenWPAdminSettings::get_all();
    	$login 	  = in_array( $pagenow, array( 'wp-login.php', 'wp-register.php' ) );
    	$signup   = $pagenow == 'wp-signup.php';
    	
    	// Not enabled.
    	if( empty( $settings['enabled'] ) ) {
        	return;
    	}
    	
    	// Are we logging out?
    	else if( isset( $_REQUEST['action'] ) && $_REQUEST['action'] == 'logout' ) {
    		return;
    	}
    	
    	// Redirect admin request.
    	else if( is_admin() ) {
    		self::redirect_admin();
    	}
    	
    	// Redirect login requests.
    	else if( $login && !empty($settings['redirect_login_page']) ) {
    		self::redirect_login();
    	}
    	
    	// Redirect signup requests.
    	else if( $signup && !empty($settings['redirect_signup_page']) ) {
    		self::redirect_signup();
    	}
    	
    	// Hide the frontend admin bar.
    	else if( !current_user_can( $settings['capability'] ) ) {
    		show_admin_bar( false );
    	}
    }

	/**
     * @method redirect_admin
     */
    static public function redirect_admin()
    {
        $settings = HiddenWPAdminSettings::get_all();
        
        // Don't redirect AJAX requests.
    	if( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
    		return;
    	}
    	
    	// Don't redirect WP_CLI requests.
    	else if( defined( 'WP_CLI' ) && WP_CLI ) {
        	return;
    	}
    	
    	// Don't redirect users with this capability.
    	else if( current_user_can( $settings['capability'] ) ) {
    		return;
    	}
    	
    	// Redirect to the home url. 
        else if( empty( $settings['redirect_url'] ) ) {
            wp_redirect( home_url(), 301 );
            exit;
        }
        
        // Redirect to custom url.
        else {
            wp_redirect( $settings['redirect_url'], 301 );
            exit;
        }
    }

	/**
     * @method redirect_login
     */
    static public function redirect_login()
    {
        $settings = HiddenWPAdminSettings::get_all();
        
        if( !empty( $settings['login_url'] ) ) {
            wp_redirect( $settings['login_url'], 301 );
            exit;
        }
    }

	/**
     * @method redirect_signup
     */
    static public function redirect_signup()
    {
        $settings = HiddenWPAdminSettings::get_all();
        
        if( !empty( $settings['signup_url'] ) ) {
            wp_redirect( $settings['signup_url'], 301 );
            exit;
        }
    }
}