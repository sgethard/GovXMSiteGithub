<?php
// Creating the widget 
class ova_category_give_widget extends WP_Widget {

    function __construct() {

        $widget_ops = array(
            'classname'                   => 'widget_categories',
            'description'                 => __( 'Get list category give', 'egovt' ),
            'customize_selective_refresh' => true,
        );
        parent::__construct( 'give_category', __( 'Categories Give' ), $widget_ops );
    }

    public function widget( $args, $instance ) {
        
        $title = apply_filters( 'widget_title', $instance['title'] );

        $title = ! empty( $title ) ? $title : esc_html__( 'Cause Categories', 'egovt' );

        echo $args['before_widget'];

        if ( $title ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        $args_cat = array(
           'taxonomy' => 'give_forms_category',
           'orderby' => 'name',
        );


        $categories = get_categories($args_cat);

        if ($categories) {
            ?>
            <ul>
            <?php
            foreach ( $categories as $cate ) {
                ?>
                <li>
                    <a href="<?php echo esc_url( get_term_link( $cate->term_id ) ) ?>">
                        <?php echo esc_html( $cate->cat_name ) ?>
                    </a>
                </li>
                <?php                                   
            }
            ?>
            </ul>
            <?php
        }

        echo $args['after_widget'];

    }

    public function form( $instance ) {
       
        // Defaults.
        $instance     = wp_parse_args( (array) $instance, array( 'title' => '' ) );
        ?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" /></p>

        <?php 
    }

    public function update( $new_instance, $old_instance ) {
        $instance                 = $old_instance;
        $instance['title']        = sanitize_text_field( $new_instance['title'] );

        return $instance;
    }

} 

function egovt_cat_load_widget() {
    register_widget( 'ova_category_give_widget' );
}
add_action( 'widgets_init', 'egovt_cat_load_widget' );