<?php
	
	class wp_crowd_ppl_widget_register {
		
		function __init() {
			
			add_action( 'widgets_init', array( $this, '__wpcrowd_register_widget' ) );
			
		}
		
		function __wpcrowd_register_widget() {
			
			register_widget( 'wp_crowd_ppl_widget' );
			
		}
		
		
	}
	
	class wp_crowd_ppl_widget extends WP_Widget {
		
		public function __construct() {
			parent::__construct(
				'wp_crowd_ppl_widget', // Base ID
				__( 'WP Crowd People', 'thewpcrowd' ), // Name
				array( 'description' => __( 'WP Crowd People Widget', 'thewpcrowd' ), ) // Args
			);
			
		}
		
		public function widget( $args, $instance ) {
			
			$people = get_terms( 'people', array( 'orderby' => 'count', 'order' => 'DESC' ) );
			
			echo '<li><h4 class="widgettitle">The Crowd</h4>';
			echo '<ul>';
			foreach( $people as $person ) {
				
				echo '<li><a href="/people/' . $person->slug . '">' . $person->name . '</a></li>';
				
			}
			echo '</ul></li>';
			
		}
		
		public function form( $instance ) { }
		
		public function update( $new_instance, $old_instance ) { }
		
	}
		
?>