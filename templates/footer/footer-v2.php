<footer id="footer" <?php yog_helper()->attr( 'footer', array( 'class' => 'footer-section outer-top-xs' ) ); ?>>

    <?php if( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' )  || is_active_sidebar( 'footer-4' )  ): ?>
        <div class="footer-top">
            <div class="container">
              <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                	<?php 
                        if( is_active_sidebar( 'footer-1' ) ){
                            dynamic_sidebar( 'footer-1' );
                        }
                    ?>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                	<?php 
                        if( is_active_sidebar( 'footer-2' ) ){
                            dynamic_sidebar( 'footer-2' );
                        }
                    ?>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                	<?php 
                        if( is_active_sidebar( 'footer-3' ) ){
                            dynamic_sidebar( 'footer-3' );
                        }
                    ?>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                	<?php 
                        if( is_active_sidebar( 'footer-4' ) ){
                            dynamic_sidebar( 'footer-4' );
                        }
                    ?>
                </div>
              </div>
            </div>
        </div>
    <?php endif; ?>
    
    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-padding social">
                <?php echo yog_helper()->get_option( 'footer-copyright', 'raw', false, 'options' ); ?>
            </div>
            <div class="col-xs-12 col-sm-6 no-padding">
                <?php 
                    //Get Payment Mathod
                    $yog_payments_methods = yog_helper()->get_option( 'payments-method', 'raw', false, 'options' );
                    
                    //Check & Print
                    if( isset( $yog_payments_methods ) && !empty( $yog_payments_methods ) ):
                       
                        echo '<div class="clearfix payment-methods"><ul>';
                        
                            foreach( $yog_payments_methods['payment-method-logo'] as $yog_payments_logo ){
                                
                                if( isset( $yog_payments_logo['url'] ) && !empty( $yog_payments_logo['url'] ) ){
                                    echo '<li><img src="'. esc_url( $yog_payments_logo['url'] ) .'" alt="'. esc_attr( get_post_meta( $yog_payments_logo['id'], '_wp_attachment_image_alt', true) ) .'"></li> ';    
                                }
                                
                            }
                        
                        echo '</ul></div>';
                        
                    endif; 
                ?> 
            </div>
        </div>
    </div>
</footer>