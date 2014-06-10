<div class="wrap">
    
    <h2>
        <?php _e( 'Hidden WP Admin', 'hidden-wp-admin' ); ?>
        <span style="font-size: 14px; color: #999;"><?php _e( 'By', 'hidden-wp-admin' ); ?> <a href="http://themes.fastlinemedia.com/?utm_source=hidden-admin&utm_medium=header&utm_campaign=hidden-admin" target="_blank">FastLine Themes</a></span>
    </h2>
    
    <form method="post" action=""> 
        
        <table class="form-table">
            <tr valign="top">
                <th scope="row"><?php _e( 'Enabled', 'hidden-wp-admin' ); ?></th>
                <td>
                    <input type="checkbox" name="settings[enabled]" value="1" <?php checked( $settings['enabled'], '1' ); ?> />
                    <span class="description"><?php _e( 'The WordPress admin will be hidden if this option is checked.', 'hidden-wp-admin' ); ?></span>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><?php _e( 'Capability', 'hidden-wp-admin' ); ?></th>
                <td>
                    <input type="text" name="settings[capability]" value="<?php echo $settings['capability']; ?>" class="regular-text" placeholder="activate_plugins" />
                    <p class="description"><?php _e( 'The <a href="http://codex.wordpress.org/Roles_and_Capabilities" target="_blank">WordPress capability</a> a user must have to access the admin area. If the capability doesn\'t exist, activate_plugins will be used.', 'hidden-wp-admin' ); ?></p>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><?php _e( 'Redirect URL', 'hidden-wp-admin' ); ?></th>
                <td>
                    <input type="text" name="settings[redirect_url]" value="<?php echo $settings['redirect_url']; ?>" class="regular-text" placeholder="http://www.mysite.com/some-page" />
                    <p class="description"><?php _e( 'The URL to redirect users to. Leave blank to use your homepage.', 'hidden-wp-admin' ); ?></p>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><?php _e( 'Redirect Login Page?', 'hidden-wp-admin' ); ?></th>
                <td>
                    <input type="checkbox" class="fl-checkbox-toggle" data-toggle="#fl-login-url" name="settings[redirect_login_page]" value="1" <?php checked( $settings['redirect_login_page'], '1' ); ?> />
                    <span class="description"><?php _e( 'Redirect users trying to access the login page to a custom URL?', 'hidden-wp-admin' ); ?></span>
                </td>
            </tr>
            <tr valign="top" id="fl-login-url"<?php if( empty( $settings['redirect_login_page'] ) ) echo ' style="display:none;"'; ?>>
                <th scope="row"><?php _e( 'Login Page URL', 'hidden-wp-admin' ); ?></th>
                <td>
                    <input type="text" name="settings[login_url]" value="<?php echo $settings['login_url']; ?>" class="regular-text" placeholder="http://www.mysite.com/some-page" />
                    <p class="description"><?php _e( 'The URL for your custom login page. The default WordPress login page will be used if this is left blank.', 'hidden-wp-admin' ); ?></p>
                </td>
            </tr>
            <?php if( is_multisite() ) : ?>
            <tr valign="top">
                <th scope="row"><?php _e( 'Redirect Signup Page?', 'hidden-wp-admin' ); ?></th>
                <td>
                    <input type="checkbox" class="fl-checkbox-toggle" data-toggle="#fl-signup-url" name="settings[redirect_signup_page]" value="1" <?php checked( $settings['redirect_signup_page'], '1' ); ?> />
                    <span class="description"><?php _e( 'Redirect users trying to access the signup page to a custom URL?', 'hidden-wp-admin' ); ?></span>
                </td>
            </tr>
            <tr valign="top" id="fl-signup-url"<?php if( empty( $settings['redirect_signup_page'] ) ) echo ' style="display:none;"'; ?>>
                <th scope="row"><?php _e( 'Signup Page URL', 'hidden-wp-admin' ); ?></th>
                <td>
                    <input type="text" name="settings[signup_url]" value="<?php echo $settings['signup_url']; ?>" class="regular-text" placeholder="http://www.mysite.com/some-page" />
                    <p class="description"><?php _e( 'The URL for your custom signup page. The default WordPress signup page will be used if this is left blank.', 'hidden-wp-admin' ); ?></p>
                </td>
            </tr>
            <?php endif; ?>
        </table>
        
        <p>
            <input type="submit" name="submit" class="button button-primary" value="<?php _e( 'Save', 'hidden-wp-admin' ); ?>">
            <?php wp_nonce_field( 'save', 'hidden-wp-admin-nonce' ); ?>
        </p>
        
    </form>
</div>
<script type="text/javascript">
    
(function($) {
    
    $(function() {
        
        $('.fl-checkbox-toggle').on('click', function() {
            
            var cb      = $(this),
                field   = $(cb.data('toggle'));
            
            if(cb.is(':checked')) {
                field.show();
            }
            else {
                field.hide();
            }
        });
    });
    
})(jQuery);
    
</script>