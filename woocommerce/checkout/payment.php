<?php
/**
 * Checkout Payment Section
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/payment.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! is_ajax() ) {
	do_action( 'woocommerce_review_order_before_payment' );
}
?>
<div id="payment" class="woocommerce-checkout-payment woocommerce-billing-fields panel panel-default checkout-step-05">
    <div class="panel-heading">
      <h4 class="unicase-checkout-title">
        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseFive">
        	<span>5</span><?php echo esc_html__( 'Payment Information', 'flipmart' )?>
        </a>
      </h4>
    </div>
    
    <div id="collapseFive" class="panel-collapse collapse">
		<div class="shipping_address panel-body">
            <div class="col-md-12"> 
                <?php if ( WC()->cart->needs_payment() ) : ?>
            		<div class="wc_payment_methods payment_methods methods">
            			<?php
            				if ( ! empty( $available_gateways ) ) {
                				foreach ( $available_gateways as $gateway ) {
                					wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );
                				}
                			} else {
                				echo '<li class="woocommerce-notice woocommerce-notice--info woocommerce-info alert alert-info">' . apply_filters( 'woocommerce_no_available_payment_methods_message', WC()->customer->get_billing_country() ? esc_html__( 'Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' ) : esc_html__( 'Please fill in your details above to see available payment methods.', 'woocommerce' ) ) . '</li>'; // @codingStandardsIgnoreLine
                			}
            			?>
            		</div>
            	<?php endif; ?>
            	<div class="form-row place-order">
            		<noscript>
            			<?php _e( 'Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'flipmart' ); ?>
            			<br/><input type="submit" class="btn-upper btn btn-primary checkout-page-button checkout-continue  alt" name="woocommerce_checkout_update_totals" value="<?php esc_attr_e( 'Update totals', 'flipmart' ); ?>" />
            		</noscript>
            
            		<?php wc_get_template( 'checkout/terms.php' ); ?>
            
            		<?php do_action( 'woocommerce_review_order_before_submit' ); ?>
            
            		<?php echo apply_filters( 'woocommerce_order_button_html', '<input type="submit" class="btn-upper btn btn-primary checkout-page-button checkout-continue alt" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '" />' ); ?>
            
            		<?php do_action( 'woocommerce_review_order_after_submit' ); ?>
            
            		<?php wp_nonce_field( 'woocommerce-process_checkout' ); ?>
            	</div>
            </div>
        </div>
    </div>
</div>
<?php
if ( ! is_ajax() ) {
	do_action( 'woocommerce_review_order_after_payment' );
}
