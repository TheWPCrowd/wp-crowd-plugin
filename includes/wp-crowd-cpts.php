<?php


class wp_crowd_cpts {
	
	function __init() {
		
		add_action( 'init', array( $this, '__wp_portfolio_cpt' ) );
		add_action( 'init', array( $this, '__wp_portfolio_tax' ) );
				
	}
	
	function __wp_portfolio_cpt() {
		
		$labels = array(
			'name'               => _x( 'Podcast', 'post type general name', 'thewpcrowd' ),
			'singular_name'      => _x( 'Podcast Show', 'post type singular name', 'thewpcrowd' ),
			'menu_name'          => _x( 'Podcast', 'admin menu', 'thewpcrowd' ),
			'name_admin_bar'     => _x( 'Podcast', 'add new on admin bar', 'thewpcrowd' ),
			'add_new'            => _x( 'New Podcast', 'portfolio', 'thewpcrowd' ),
			'add_new_item'       => __( 'New Podcast Show', 'thewpcrowd' ),
			'new_item'           => __( 'New Podcast', 'thewpcrowd' ),
			'edit_item'          => __( 'Edit Podcast', 'thewpcrowd' ),
			'view_item'          => __( 'View Podcast Show', 'thewpcrowd' ),
			'all_items'          => __( 'All Podcasts', 'thewpcrowd' ),
			'search_items'       => __( 'Search Podcast', 'thewpcrowd' ),
			'parent_item_colon'  => __( 'Parent Podcast:', 'thewpcrowd' ),
			'not_found'          => __( 'No shows items found.', 'thewpcrowd' ),
			'not_found_in_trash' => __( 'No shows items found in Trash.', 'thewpcrowd' )
		);
	
		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'podcast' ),
			'capability_type'    => 'page',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'show_in_rest'       => true,
			'supports'           => array( 'title', 'editor', 'author', 'excerpt', 'comments', 'thumbnail', 'publicize' )
		);
	
		register_post_type( 'podcast', $args );
		
		
		$labels = array(
			'name'               => _x( 'wplife', 'post type general name', 'thewpcrowd' ),
			'singular_name'      => _x( 'wplife', 'post type singular name', 'thewpcrowd' ),
			'menu_name'          => _x( 'WPlife', 'admin menu', 'thewpcrowd' ),
			'name_admin_bar'     => _x( 'wplife', 'add new on admin bar', 'thewpcrowd' ),
			'add_new'            => _x( 'New WPlife', 'portfolio', 'thewpcrowd' ),
			'add_new_item'       => __( 'New wplife', 'thewpcrowd' ),
			'new_item'           => __( 'New wplife', 'thewpcrowd' ),
			'edit_item'          => __( 'Edit wplife Member', 'thewpcrowd' ),
			'view_item'          => __( 'View wplife Member', 'thewpcrowd' ),
			'all_items'          => __( 'Whole wplife', 'thewpcrowd' ),
			'search_items'       => __( 'Search wplife', 'thewpcrowd' ),
			'parent_item_colon'  => __( 'Parent wplife:', 'thewpcrowd' ),
			'not_found'          => __( 'No members items found.', 'thewpcrowd' ),
			'not_found_in_trash' => __( 'No members items found in Trash.', 'thewpcrowd' )
		);
	
		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'wplife' ),
			'capability_type'    => 'page',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		);
	
		register_post_type( 'wplife', $args );

        $labels = array(
            'name'               => _x( 'Showcase', 'post type general name', 'thewpcrowd' ),
            'singular_name'      => _x( 'Showcase', 'post type singular name', 'thewpcrowd' ),
            'menu_name'          => _x( 'Showcase', 'admin menu', 'thewpcrowd' ),
            'name_admin_bar'     => _x( 'Showcase', 'add new on admin bar', 'thewpcrowd' ),
            'add_new'            => _x( 'New Showcase', 'showcase', 'thewpcrowd' ),
            'add_new_item'       => __( 'New Showcase', 'thewpcrowd' ),
            'new_item'           => __( 'New Showcase', 'thewpcrowd' ),
            'edit_item'          => __( 'Edit Showcase', 'thewpcrowd' ),
            'view_item'          => __( 'View Showcase', 'thewpcrowd' ),
            'all_items'          => __( 'All Showcase', 'thewpcrowd' ),
            'search_items'       => __( 'Search Showcase', 'thewpcrowd' ),
            'parent_item_colon'  => __( 'Parent Showcase:', 'thewpcrowd' ),
            'not_found'          => __( 'No items items found.', 'thewpcrowd' ),
            'not_found_in_trash' => __( 'No items items found in Trash.', 'thewpcrowd' )
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'showcase' ),
            'capability_type'    => 'page',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'show_in_rest'       => true,
            'supports'           => array( 'title', 'editor', 'author', 'excerpt', 'comments', 'thumbnail', 'publicize' )
        );

        register_post_type( 'showcase', $args );
		
	}
	
	function __wp_portfolio_tax() {
	
		// TOPICS
		
		$labels = array(
			'name'              => _x( 'Topics', 'taxonomy general name' ),
			'singular_name'     => _x( 'Topic', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Topics' ),
			'all_items'         => __( 'All Topics' ),
			'parent_item'       => __( 'Parent Topic' ),
			'parent_item_colon' => __( 'Parent Topic:' ),
			'edit_item'         => __( 'Edit Topic' ),
			'update_item'       => __( 'Update Topic' ),
			'add_new_item'      => __( 'Add New Topic' ),
			'new_item_name'     => __( 'New Topic Name' ),
			'menu_name'         => __( 'Topics' ),
		);
	
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'topics' ),
		);
	
		register_taxonomy( 'topics', array( 'podcast' ), $args );
		
		// PEOPLE
		
		$labels = array(
			'name'              => _x( 'People', 'taxonomy general name' ),
			'singular_name'     => _x( 'Person', 'taxonomy singular name' ),
			'add_new_item'      => __( 'Add New Person' ),
			'new_item_name'     => __( 'New Topic Person' ),
			'menu_name'         => __( 'People' ),
		);
	
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'people' ),
		);

		register_taxonomy( 'people', array( 'podcast', 'wplife', 'showcase' ), $args );
		
		// GUESTS
		
		$labels = array(
			'name'              => _x( 'Guests', 'taxonomy general name' ),
			'singular_name'     => _x( 'Guest', 'taxonomy singular name' ),
			'add_new_item'      => __( 'Add New Guest' ),
			'new_item_name'     => __( 'New Topic Guest' ),
			'menu_name'         => __( 'Guest' ),
		);
	
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'guest' ),
		);
	
		register_taxonomy( 'guest', array( 'podcast', 'wplife' ), $args );
		
	}
}	
	
?>