<?php

/*
 * Instantiate the widget
 */
class Ansh_Adopted_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'ansh_adopted_widget', // Base ID
            __('Last adopted animals', ANSH_TEXT_DOMAIN), // Name
            array( 'description' => __( 'Show the last archived and adopted animals. As many as you want.', ANSH_TEXT_DOMAIN ), )
        );
    }

    /**
     * Front-end display of widget.
     */
    public function widget( $args, $instance ) {
        // outputs the content of the widget
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );
        echo $before_widget;
        if ( ! empty( $title ) ) {
            echo $before_title . $title . $after_title;
        }
        require_once('widget/ansh-last-adopted-widget-frontend.php');
        echo $after_widget;
    }

    /**
     * Back-end widget form.
     */
    public function form( $instance ) {
        // outputs the options form in the admin
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'New title', 'text_domain' );
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

        return $instance;
    }

}


/*
 * Register the widget
 */
function ansh_register_last_adopted_widget() {
    register_widget( 'Ansh_Adopted_Widget' );
}
add_action( 'widgets_init', 'ansh_register_last_adopted_widget' );


/*
 * Frontend Styles and Scripts
 */
function ansh_last_adopted_widget_frontend_style() {
    wp_enqueue_style( 'ansh-last-adopted-widget', plugins_url('../css/ansh-adopted-widget.css', __FILE__));
}
add_action( 'wp_enqueue_scripts', 'ansh_last_adopted_widget_frontend_style', 9 );

function ansh_last_adopted_widget_frontend_script() {
    wp_enqueue_script( 'ansh-paginate-adopted-widget', plugins_url ( '../js/ansh-paginate-adopted-widget.js', __FILE__ ), array( 'jquery'), '20160808', true);
}
add_action( 'wp_enqueue_scripts', 'ansh_last_adopted_widget_frontend_script', 10 );

/*
 * Pass adopted animals data to the script. Parameter coming from Ansh_Adopted_Widget->widget
 */
function ansh_adopted_data_to_script($data) {
    wp_localize_script( 'ansh-paginate-adopted-widget', 'anshAdopted', $data );
}
add_action( 'wp_enqueue_scripts', 'ansh_adopted_data_to_script', 11 );
