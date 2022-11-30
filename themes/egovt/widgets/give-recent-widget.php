<?php
// Creating the widget 
class ova_list_give_widget extends WP_Widget {

    function __construct() {

        $widget_ops = array(
            'classname'                   => 'widget_list_give',
            'description'                 => __( 'Get list give', 'egovt' ),
            'customize_selective_refresh' => true,
        );
        parent::__construct( 'give_recent', __( 'List Give' ), $widget_ops );
    }

    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $title = ! empty( $title ) ? $title : esc_html__( 'Urgent Causes', 'egovt' );

        $hierarchical = ! empty( $instance['hierarchical'] ) ? '1' : '0';

        echo $args['before_widget'];

        if ( $title ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }


        $args_event = array(
            'post_type' => 'give_forms',
            'posts_per_page' => 3,
            'orderby' => 'ID',
            'order'   => 'DESC'
        );

        $list_event = get_posts( $args_event );

        if ($list_event) {
            ?>
            <div class="list-give">
            <?php
            foreach ( $list_event as $event ) {
                $id = $event->ID;
                $title = get_the_title( $id );
                $url_img = get_the_post_thumbnail_url( $id, 'post-thumbnail' );
                $link = get_the_permalink( $id );
                $show_goal = give_get_meta( $id, '_give_goal_option', true );
                $charihope_progress_stats = apply_filters( 'charihope_progress_stats', $id );

                              

                ?>

                    <div class="item-event">
                    <div class="ova-thumb-nail">
                           <a href="<?php echo $link; ?>" style="background-image:url(<?php echo esc_url( $url_img ); ?>)" title="<?php echo $title; ?>">
                           </a>
                       </div>
                       <div class="ova-content">
                           <h3 class="title">
                               <a class="second_font" href="<?php echo $link; ?>">
                                   <?php echo $title; ?>
                               </a>
                           </h3>
                                <div class="raised">
                                            <div class="income">
                                                <span class=" rain"><?php esc_html_e( 'Raised', 'egovt' ); ?></span>
                                                <span><?php echo esc_html( $charihope_progress_stats['actual'] ); ?></span>
                                            </div>

                                            <span class="ingo"><?php esc_html_e( '/', 'egovt' ); ?></span>

                                            <?php if ($show_goal != 'disabled') { ?>
                                                <div class="goal">
                                                    <span><?php echo esc_html( $charihope_progress_stats['goal'] ); ?></span>
                                                </div>
                                            <?php } ?>
                                        </div>


                                        <div class="donate_remaining">
                                            <a href="<?php the_permalink($id); ?>" class="donate second_font"><?php esc_html_e( 'Donate Now', 'egovt' ); ?></a>

                                        </div>

                       </div>
                    </div>


                <?php                                   
            }
            ?>
            </div>
            <div class="button-all-event">
                <a class="second_font" href="<?php echo esc_url(get_post_type_archive_link( 'give_forms' )); ?>">
                    <?php esc_html_e( 'View All Give', 'egovt' ) ?>
                    <i data-feather="chevron-right"></i>
                </a>
            </div>
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

function ovaev_list_give_load_widget() {
    register_widget( 'ova_list_give_widget' );
}

add_action( 'widgets_init', 'ovaev_list_give_load_widget' );