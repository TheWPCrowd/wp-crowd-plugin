<?php

require_once __DIR__ .'/metabox_lib/init.php';

class wp_crowd_meta {
	
	function __init() {
		add_action( 'cmb2_init', array( $this, '__wp_crowd_metaboxes' ) );
		
	}
	
	function __wp_crowd_metaboxes() {
		
		$prefix = '_wpcrowd_';
		
		$cmb = new_cmb2_box( array(
			'id' 		   => 'crowd_portfolio',
			'title' 	   => __( 'Portfolio Details', 'thewpcrowd' ),
			'object_types' => array( 'portfolio' ),
			'context'	   => 'normal',
			'priority'	   => 'high',
			'show_names'   => true
		));
		
		$cmb->add_field( array(
			'name'		=> __( 'Project Gallery', 'thewpcrowd' ),
			'id' 		=> $prefix . 'title',
			'type' 		=> 'title'
		));
		
		$cmb->add_field( array(
			'name'		=> __( 'Gallery Images', 'thewpcrowd' ),
			'desc'		=> __( 'images of project', 'thewpcrowd' ),
			'id' 		=> $prefix . 'gallery',
			'type' 		=> 'file_list'
		));
	}
}	
	
?>