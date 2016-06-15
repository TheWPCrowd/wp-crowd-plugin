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
			global $wpdb;
			echo $args['before_widget'];
			$min_posts = 1;
			$author_ids = $wpdb->get_col("SELECT `post_author` FROM
	    (SELECT `post_author`, COUNT(*) AS `count` FROM {$wpdb->posts}
	        WHERE `post_status`='publish' GROUP BY `post_author`) AS `stats`
	    WHERE `count` >= {$min_posts} ORDER BY `count` DESC;");

			$people_terms = get_terms( 'people' );
			$podcasters = array();
			if( !empty( $people_terms ) ) {
				foreach( $people_terms as $person ) {
					$associated_user = get_field( 'associated_user', $person->taxonomy . '_' . $person->term_id );
					if( $associated_user ) {
						$podcasters[] = $associated_user['ID'];
					}
				}
			}
			$author_ids = array_merge( $author_ids, $podcasters );
			$author_ids = array_unique( $author_ids );

			echo $args['before_title'] . apply_filters( 'widget_title', 'Crowd Members' ). $args['after_title'];

			echo '<ul class="crowd-members-widget">';
			foreach( $author_ids as $author ) {
				if( $author == 1 ) { continue; }
				$user = get_user_by( 'id', $author );
				$usermeta = get_user_meta( $user->ID );
				$author_name = $user->user_nicename;
				if( $usermeta['first_name'][0] && $usermeta['last_name'][0] ) {
					$author_name = $usermeta['first_name'][0] . ' ' . $usermeta['last_name'][0];
				}
				echo '<li><a href="' . get_author_posts_url( $user->ID ) . '">' . get_avatar( $user->ID, 300, '', 'The WP Crowd', array( 'class' => 'img-responsive' ) ) . ' ' . $author_name . '</a></li>';
				
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

			echo $args['before_title'] . apply_filters( 'widget_title', 'Join Other WordPress Fanatics' ) . $args['after_title'];
			include( get_template_directory().'/partials/mailchimp-form.php' );
			echo $args['after_widget'];

		}

		public function form( $instance ) { }

		public function update( $new_instance, $old_instance ) { }

	}
		
?>