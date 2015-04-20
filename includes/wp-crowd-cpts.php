<?php


class wp_crowd_cpts {
	
	function __construct() {
		$this->__init();
	}
	
	function __init() {
		
		add_action( 'init', array( $this, '_wp_portfolio_cpt' ) );
		
	}
	
	function _wp_portfolio_cpt() {
		
		$labels = array(
			'name'               => _x( 'Portfolio', 'post type general name', 'thewpcrowd' ),
			'singular_name'      => _x( 'Portfolio Item', 'post type singular name', 'thewpcrowd' ),
			'menu_name'          => _x( 'Portfolio', 'admin menu', 'thewpcrowd' ),
			'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'thewpcrowd' ),
			'add_new'            => _x( 'New Portfolio', 'portfolio', 'thewpcrowd' ),
			'add_new_item'       => __( 'New Portfolio Item', 'thewpcrowd' ),
			'new_item'           => __( 'New Item', 'thewpcrowd' ),
			'edit_item'          => __( 'Edit Item', 'thewpcrowd' ),
			'view_item'          => __( 'View Portfolio Item', 'thewpcrowd' ),
			'all_items'          => __( 'Whole Portfolio', 'thewpcrowd' ),
			'search_items'       => __( 'Search Portfolio', 'thewpcrowd' ),
			'parent_item_colon'  => __( 'Parent Items:', 'thewpcrowd' ),
			'not_found'          => __( 'No portfolio items found.', 'thewpcrowd' ),
			'not_found_in_trash' => __( 'No portfolio items found in Trash.', 'thewpcrowd' )
		);
	
		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'portfolio' ),
			'capability_type'    => 'page',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		);
	
		register_post_type( 'portfolio', $args );
		
	}
}	
	
?>