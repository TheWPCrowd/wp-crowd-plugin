<?php
/**
 * Plugin Name: The WP Crowd
 * Plugin URI: https://github.com/TheWPCrowd/wp-crowd-plugin
 * Description: Plugin for CPT and other non-view functionlity
 * Version: 1.0.0
 * Author: The WP Crowd
 * Author URI: http://www.thewpcrowd.com
 * Text Domain: thewpcrowd
 * License: GPL3
 */
 
 
require 'includes/wp-crowd-cpts.php';
require 'includes/wp-crowd-metaboxes.php';
 
class wp_crowd_plugin {
	
	function __construct() {
		$this->__init();
	}
	
	function __init() {
		/** New Classes, misc. action hooks **/
		new wp_crowd_cpts();
		new wp_crowd_meta();
	}
}
 
new wp_crowd_plugin();
 ?>