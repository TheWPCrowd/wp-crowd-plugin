<?php
	
	class wp_crowd_ppl_widget_register {
		
		function __init() {
			
			add_action( 'widgets_init', array( $this, '__wpcrowd_register_widget' ) );
			
		}
		
		function __wpcrowd_register_widget() {
			register_widget( 'wp_crowd_ppl_widget' );
			register_widget( 'wp_crowd_latest' );
			register_widget( 'wp_crowd_newsletter' );
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

			echo $args['before_widget'];
			$people = get_terms( 'people', array( 'orderby' => 'count', 'order' => 'DESC' ) );

			echo $args['before_title'] . apply_filters( 'widget_title', 'Crowd Members' ). $args['after_title'];

			echo '<ul>';
			foreach( $people as $person ) {
				if( $person->count < 5 ) {
					continue;
				}
				echo '<li><a href="/people/' . $person->slug . '">' . $person->name . '</a></li>';
				
			}
			echo '</ul>';

			echo $args['after_widget'];
			
		}
		
		public function form( $instance ) { }
		
		public function update( $new_instance, $old_instance ) { }
		
	}

	class wp_crowd_latest extends WP_Widget {

		public function __construct() {
			parent::__construct(
				'wp_crowd_latest', // Base ID
				__( 'WP Crowd Latest', 'thewpcrowd' ), // Name
				array( 'description' => __( 'WP Crowd Latest', 'thewpcrowd' ), ) // Args
			);

		}

		public function widget( $args, $instance ) {
			global $post;
			wp_reset_query();

			$podcast = new WP_Query( array( 'post_type' => 'podcast', 'posts_per_page' => 1 ) );
			$blog    = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 1 ) );

			if( $podcast->have_posts() ) : while( $podcast->have_posts() ) : $podcast->the_post();
				if( has_post_thumbnail( $post->ID ) ) {
					echo $args['before_widget'];

					echo $args['before_title'] . apply_filters( 'widget_title', 'Latest Podcast' ) . $args['after_title'];

					echo '<article class="latest-widget podcast">';
					echo '<a href="' . get_the_permalink() . '">';
					echo '<img src="' . get_the_post_thumbnail_url( $post->ID, 'full' ) . '" alt="The WP Crowd Podcast" class="img-responsive" />';
					echo '</a>';
					echo '</article>';

					echo $args['after_widget'];
				}
			endwhile; endif; wp_reset_query();

			if( $blog->have_posts() ) : while( $blog->have_posts() ) : $blog->the_post();
				if( has_post_thumbnail( $post->ID ) ) {
					echo $args['before_widget'];

					echo $args['before_title'] . apply_filters( 'widget_title', 'Latest Blog Post' ) . $args['after_title'];

					echo '<article class="latest-widget podcast">';
					echo '<a href="' . get_the_permalink() . '">';
					echo '<img src="' . get_the_post_thumbnail_url( $post->ID, 'full' ) . '" alt="The WP Crowd Podcast" class="img-responsive" />';
					echo '</a>';
					echo '</article>';

					echo $args['after_widget'];
				}

			endwhile; endif; wp_reset_query();

		}

		public function form( $instance ) { }

		public function update( $new_instance, $old_instance ) { }

	}

	class wp_crowd_newsletter extends WP_Widget {

		public function __construct() {
			parent::__construct(
				'wp_crowd_newsletter', // Base ID
				__( 'WP Crowd Newsletter', 'thewpcrowd' ), // Name
				array( 'description' => __( 'WP Crowd Newsletter', 'thewpcrowd' ), ) // Args
			);

		}

		public function widget( $args, $instance ) {
			global $post;
			wp_reset_query();

			echo $args['before_widget'];

			echo $args['before_title'] . apply_filters( 'widget_title', 'Join Other WordPress Fanatics!' ) . $args['after_title'];
			include( get_template_directory().'/partials/mailchimp-form.php' );
			echo $args['after_widget'];

		}

		public function form( $instance ) { }

		public function update( $new_instance, $old_instance ) { }

	}
		
?>