<?php
/**
 * Adds Foo_Widget widget.
 */
class Projects_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'projects_widget', // Base ID
			esc_html__( 'Projects', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'Latest Projects', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

    if ( ! empty( $instance['amount'] ) ) {
        $amount_posts = $instance['amount'];
    }

    $widget_args = array(
      'post_type' => 'featured_projects',
      'posts_per_page' => $amount_posts
    );

    $projects = new WP_Query($widget_args);
    while($projects->have_posts()) : $projects->the_post();
    $tech = get_post_meta( get_the_ID(),'ap_project_tech', true );
    ?>

		<div class="card mb-4">
      <?php the_post_thumbnail( $size = 'medium', $attr = 'class=img-fluid' ); ?>
      <div class="card-body">
        <h3 class="card-title"><?php the_title(); ?></h3>
        <p class="card-subtitle m-0"><?php echo $tech; ?></p>
      </div>
      <div class="card-footer">
        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Project post</a>
      </div>
    </div>

  <?php
endwhile; wp_reset_postdata();
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
    $amount = ! empty( $instance['amount'] ) ? $instance['amount'] : esc_html__( 'Amount of posts', 'text_domain' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
      <?php esc_attr_e( 'Title:', 'text_domain' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

    <p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'amount' ) ); ?>">
      <?php esc_attr_e( 'Amount:', 'text_domain' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'amount' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'amount' ) ); ?>" type="number" value="<?php echo esc_attr( $amount ); ?>">
		</p>

		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
    $instance['amount'] = ( ! empty( $new_instance['amount'] ) ) ? sanitize_text_field( $new_instance['amount'] ) : '';

		return $instance;
	}

} // class Foo_Widget

// register Foo_Widget widget
function register_projects_widget() {
    register_widget( 'Projects_Widget' );
}
add_action( 'widgets_init', 'register_projects_widget' );
