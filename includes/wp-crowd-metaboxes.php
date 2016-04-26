<?php

require_once __DIR__ .'/metabox_lib/init.php';

class wp_crowd_meta {
	
	function __init() {
		
		if( class_exists('new_cmb2_box') && class_exists( 'Taxonomy_MetaData_CMB2' ) ) {
		
			//add_action('cmb2_init', array( $this,'__wp_crowd_metaboxes' ) );
			add_action('cmb2_init', array( $this,'__wpcrowd_people_meta' ) );
			add_action('cmb2_init', array( $this, '__wpcrowd_guest_meta') );
		}
		
	}
	
	function __wp_crowd_metaboxes() {
		
		$prefix ='_wpcrowd_';
		
		$cmb = new_cmb2_box( array(
			'id' 			 =>'crowd_portfolio',
			'title' 	   => __('Portfolio Details','thewpcrowd' ),
			'object_types' => array('podcast' ),
			'context'		=>'normal',
			'priority'		 =>'high',
			'show_names'	  => true
		));
		
		$cmb->add_field( array(
			'name'		=> __('Project Gallery','thewpcrowd' ),
			'id' 		=> $prefix .'title',
			'type' 		=>'file'
		));
		
		$cmb->add_field( array(
			'name'		=> __('Gallery Images','thewpcrowd' ),
			'desc'		=> __('images of project','thewpcrowd' ),
			'id' 		=> $prefix .'gallery',
			'type' 		=>'file_list'
		));
	}
	
	function __wpcrowd_people_meta() {
		
		$metabox_id ='wpcrowd_people';

		 $cmb = new_cmb2_box( array(
			'id'			=> $metabox_id,
			'object_types' => array('key' =>'options-page','value' => array('unknown', ), ),
		 ) );
	
		$cmb->add_field( array(
			'name' => __('Email','thewpcrowd' ),
			'desc' => __('email address','thewpcrowd' ),
			'id'	=>'person_email', // no prefix needed since the options are one option array.
			'type' =>'text_email',
		 ) );
		
		 $cmb->add_field( array(
			'name' => __('Twitter Handle','thewpcrowd' ),
			'desc' => __('start with @','thewpcrowd' ),
			'id'	=>'person_twitter', // no prefix needed since the options are one option array.
			'type' =>'text',
		 ) );
		
		 $cmb->add_field( array(
			'name' => __('Twitter Handle','thewpcrowd' ),
			'desc' => __('start with @','thewpcrowd' ),
			'id'	=>'person_twitter', // no prefix needed since the options are one option array.
			'type' =>'text',
		 ) );
		
		 $cmb->add_field( array(
			'name' => __('Profile Pic','thewpcrowd' ),
			'desc' => __('Image URL','thewpcrowd' ),
			'id'	=>'person_profile', // no prefix needed since the options are one option array.
			'type' =>'text_url',
		 ) );
		 
		 $cmb->add_field( array(
			'name' => __('Bio','thewpcrowd' ),
			'desc' => __('Who are you?','thewpcrowd' ),
			'id'	=>'person_bio', // no prefix needed since the options are one option array.
			'type' =>'wysiwyg',
		 ) );
		 
		 if ( ! defined('wlo_update_option' ) ) {
			 require_once('wp-large-options.php' );
		 }
		 
		 // wp-large-options overrides
		 $wlo_overrides = array(
			'get_option'	 =>'wlo_get_option',
			'update_option' =>'wlo_update_option',
			'delete_option' =>'wlo_delete_option',
		 );
	
		$cats = new Taxonomy_MetaData_CMB2('people', $metabox_id, __('Person Details','thewpcrowd' ), $wlo_overrides );
		
	}
	
	function __wpcrowd_guest_meta() {
		
		$metabox_id ='wpcrowd_guest';

		 $cmb = new_cmb2_box( array(
			'id'			=> $metabox_id,
			'object_types' => array('key' =>'options-page','value' => array('unknown', ), ),
		 ) );
		
		 $cmb->add_field( array(
			'name' => __('Twitter Handle','thewpcrowd' ),
			'desc' => __('start with @','thewpcrowd' ),
			'id'	=>'person_twitter', // no prefix needed since the options are one option array.
			'type' =>'text',
		 ) );
		 
		 if ( ! defined('wlo_update_option' ) ) {
			 require_once('wp-large-options.php' );
		 }
		 
		 // wp-large-options overrides
		 $wlo_overrides = array(
			'get_option'	 =>'wlo_get_option',
			'update_option' =>'wlo_update_option',
			'delete_option' =>'wlo_delete_option',
		 );
	
		$cats = new Taxonomy_MetaData_CMB2('guest', $metabox_id, __('Guest Details','thewpcrowd' ), $wlo_overrides );
		
	}
	
}
?>
