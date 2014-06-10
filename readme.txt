=== Hidden WP Admin ===
Contributors: justinbusa
Tags: lockdown, secure, hide, login, wp-login, admin, wp-admin, multisite, redirect
Requires at least: 3.5
Tested up to: 3.9.1
Stable tag: trunk
License: GPL2+
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Hide the WordPress admin, login and signup pages from all users except those you allow.

== Description ==

This plugin allows you to hide the WordPress admin, login and signup pages from all users except those with a specific capability. Unauthorized users will be redirected via a 301 redirect to your site's homepage or a URL that you specify in the settings.

This plugin is useful if you want to allow signups for your site but only want users with a certain capability (e.g. edit_others_pages for editor and administrator) to be able to access the admin area. This helps to ensure that malicious users can't access something that you didn't intend for them to access.

You are also given the option to redirect the WordPress login and signup pages to your own custom pages. Redirecting those pages in addition to the admin can also help secure your site from someone trying to attack those URLs. 

== Installation ==

1. Install Hide WP Admin either via the WordPress plugin directory, or by uploading the files to your server at wp-content/plugins.

2. After activating Hide WP Admin by [FastLine Themes](http://themes.fastlinemedia.com/), navigate to the settings page at Settings > Hide WP Admin. The settings page will be located in the Network Admin if you have Multisite installed. 

3. Set your desired settings and click the save button to finish. 

== Frequently Asked Questions ==

= Is Multisite supported? =

Yes Multisite is supported. The settings page will be located in the Network Admin if you have Multisite enabled. 

= Do I need a custom login or signup page to hide those? =

Yes, this plugin assumes that you still want users to signup and login at your site, just not access the admin.

= Help! I locked myself out of my site. =

It is possible to lock yourself out of your site if you set the login page to redirect to a custom login page that doesn't have a login form. If that happens, you will need to FTP into your site and manually delete the plugin. 

== Screenshots ==

1. The plugin settings page.

== Changelog ==

= Version 1.0 =

Initial release.

== Upgrade Notice ==

= Version 1.0 =

Initial release.

