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
require 'includes/wp-crowd-ppl-widget.php';

require 'includes/wp-crowd-acf.php';
 
class wp_crowd_plugin {
	
	function __construct() {
		$this->__init();
	}
	
	function __init() {
		/** New Classes, misc. action hooks **/
		$wpcrowd_cpts = new wp_crowd_cpts();
		$wpcrowd_cpts->__init();
		
		$wpcrowd_meta = new wp_crowd_meta();
		$wpcrowd_meta->__init();
		
		/** WP Crowd People Widget **/
		$wpcrowd_ppl_widget = new wp_crowd_ppl_widget_register();
		$wpcrowd_ppl_widget->__init();

		add_shortcode( 'ng-chatroom', array( $this, 'ng_chatroom_die' ) );
	}

	function ng_chatroom_die( $atts ) {
		return 'We no longer support live chat, sorry.'
	}
}
 
new wp_crowd_plugin();