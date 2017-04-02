<?php
/*
Plugin Name: WP Kit
Plugin URI: https://wordpress.org/plugins/wp-kit
Description: Tool for WordPress developers.
Author: Kolya Korobochkin
Author URI: https://korobochkin.com/
Version: 0.1.0-alpha-2
Text Domain: wp-kit
Domain Path: /languages/
Requires at least: 4.0.0
Tested up to: 4.7.1
License: GPLv2 or later
*/

if(!interface_exists('Korobochkin\WPKit\Plugins\PluginInterface')) {
	require_once 'vendor/autoload.php';
}
