<?php
/**
 * Theme Widget ( Contact Information )
 *
 * @package WordPress
 * @subpackage Flipmart
 * @since Flipmart 1.0
 */
class Yog_Contact_Info_Widget extends WP_Widget {

    function __construct() {

        $yog_widget_ops  = array( 'classname' => 'contact-info', 'description' => esc_html__('Add contact information.', 'flipmart' ) );

        $yog_control_ops = array( 'id_base' => 'contact-info-widget' );

        parent::__construct( 'contact-info-widget', esc_html__( 'Flipmart: Contact Info', 'flipmart' ), $yog_widget_ops, $yog_control_ops );
    }

    function widget( $args, $instance ) {
        extract( $args );
        $yog_title   = apply_filters('widget_title', $instance['yog_title']);
        $yog_address = $instance['yog_address'];
        $yog_phone   = $instance['yog_phone'];
        $yog_email   = $instance['yog_email'];

        echo $before_widget;
            
            //Title
            if ( $yog_title ) {
                echo $before_title . esc_html( $yog_title ) . $after_title;
            }
            
            //Content
            ?>
                <ul class="toggle-footer">
                
                    <?php if ( $yog_address ) : ?>
        			     <li class="media">
                            <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i> </span> </div>
                            <div class="media-body">
                              <p><?php echo esc_html( $yog_address ); ?></p>
                            </div>
                         </li> 
                     <?php endif;  if ( $yog_phone ) : ?>
        			     <li class="media">
                            <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-mobile fa-stack-1x fa-inverse"></i> </span> </div>
                            <div class="media-body">
                              <p><?php echo wp_kses( $yog_phone, array( 'br' => array() ) ); ?></p>
                            </div>
                         </li>  
                      <?php endif;  if ( $yog_email ) : ?>
        			     <li class="media">
                            <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>  </span> </div>
                            <div class="media-body">
                              <a href="mailto:<?php echo $yog_email; ?>"><?php echo esc_html( $yog_email ); ?></a>
                            </div>
                         </li>     
                    <?php  endif; ?> 
                    
                 </ul>
            <?php
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $instance['yog_title']      = strip_tags( $new_instance['yog_title'] );
        $instance['yog_address']    = $new_instance['yog_address'];
        $instance['yog_phone']      = $new_instance['yog_phone'];
        $instance['yog_email']      = $new_instance['yog_email'];

        return $instance;
    }

    function form($instance) {
        $defaults = array( );
        $instance = wp_parse_args((array) $instance, $defaults); ?>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('yog_title') ); ?>">
                <strong><?php echo esc_html__('Title', 'flipmart') ?>:</strong>
                <input type="editor" class="widefat" id="<?php echo esc_attr( $this->get_field_id('yog_title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('yog_title') ); ?>" value="<?php if ( isset( $instance['yog_title'] ) ) echo esc_attr( $instance['yog_title'] ); ?>" />
            </label>
        </p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('yog_address') ); ?>">
                <strong><?php echo esc_html__('Address', 'flipmart') ?>:</strong>
                <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id('yog_address') ); ?>" name="<?php echo esc_attr( $this->get_field_name('yog_address') ); ?>" ><?php if ( isset( $instance['yog_address'] ) ) echo esc_attr( $instance['yog_address'] ); ?></textarea>
            </label>
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('yog_phone') ); ?>">
                <strong><?php echo esc_html__('Phone Number', 'flipmart') ?>:</strong>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('yog_phone') ); ?>" name="<?php echo esc_attr( $this->get_field_name('yog_phone') ); ?>" value="<?php if ( isset( $instance['yog_phone'] ) ) echo esc_attr( $instance['yog_phone'] ); ?>" />
            </label>
        </p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('yog_email') ); ?>">
                <strong><?php echo esc_html__('Email', 'flipmart') ?>:</strong>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('yog_email') ); ?>" name="<?php echo esc_attr( $this->get_field_name('yog_email') ); ?>" value="<?php if ( isset( $instance['yog_email'] ) ) echo esc_attr( $instance['yog_email'] ); ?>" />
            </label>
        </p>
        
    <?php
    }
}

add_action('widgets_init', 'yog_contact_info_load_widget');

function yog_contact_info_load_widget() {
    register_widget('Yog_Contact_Info_Widget');
}
?>