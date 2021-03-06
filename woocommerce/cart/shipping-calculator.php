<?php
/**
 * Shipping Calculator
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/shipping-calculator.php.
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
 * @version     3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( 'no' === get_option( 'woocommerce_enable_shipping_calc' ) || ! WC()->cart->needs_shipping() ) {
	return;
}

wp_enqueue_script( 'wc-country-select' );
?>
<?php do_action( 'woocommerce_before_shipping_calculator' ); ?>

    <form action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
            
        <table class="table">
    		<thead>
    			<tr>
    				<th>
    					<span class="estimate-title"><?php echo esc_html__( 'Estimate shipping and tax', 'flipmart' ); ?></span>
    					<p><?php echo esc_html__( 'Enter your destination to get shipping and tax.', 'flipmart' ); ?></p>
    				</th>
    			</tr>
    		</thead>
    		<tbody>
                <tr>
					<td>
						<div class="form-group form-row form-row-wide" id="calc_shipping_country_field">
                            <label class="info-title control-label"><?php echo esc_html__( 'Country', 'flipmart' ); ?> <span>*</span></label>
                            <select name="calc_shipping_country" id="calc_shipping_country" class="country_to_state country_select form-control unicase-form-control selectpicker" rel="calc_shipping_state">
                				<option value=""><?php _e( 'Select a country&hellip;', 'flipmart' ); ?></option>
                				<?php
                					foreach ( WC()->countries->get_shipping_countries() as $key => $value ) {
                						echo '<option value="' . esc_attr( $key ) . '"' . selected( WC()->customer->get_shipping_country(), esc_attr( $key ), false ) . '>' . esc_html( $value ) . '</option>';
                					}
                				?>
                			</select>
                        </div>
                        
                        <div class="form-row form-row-wide form-group" id="calc_shipping_state_field">
                            <label class="info-title control-label"><?php echo esc_html__( 'State / County', 'flipmart' ); ?></label>
                			<?php
                				$current_cc = WC()->customer->get_shipping_country();
                				$current_r  = WC()->customer->get_shipping_state();
                				$states     = WC()->countries->get_states( $current_cc );
                
                				// Hidden Input
                				if ( is_array( $states ) && empty( $states ) ) {
                
                					?><input type="hidden" name="calc_shipping_state" id="calc_shipping_state" placeholder="<?php esc_attr_e( 'State / County', 'flipmart' ); ?>" /><?php
                
                				// Dropdown Input
                				} elseif ( is_array( $states ) ) {
                
                					?><span>
                						<select name="calc_shipping_state" class="state_select form-control unicase-form-control" id="calc_shipping_state" placeholder="<?php esc_attr_e( 'State / County', 'flipmart' ); ?>">
                							<option value=""><?php esc_html_e( 'Select a state&hellip;', 'flipmart' ); ?></option>
                							<?php
                								foreach ( $states as $ckey => $cvalue ) {
                									echo '<option value="' . esc_attr( $ckey ) . '" ' . selected( $current_r, $ckey, false ) . '>' . esc_html( $cvalue ) . '</option>';
                								}
                							?>
                						</select>
                					</span><?php
                
                				// Standard Input
                				} else {
                
                					?><input type="text" class="input-text form-control unicase-form-control" value="<?php echo esc_attr( $current_r ); ?>" placeholder="<?php esc_attr_e( 'State / County', 'flipmart' ); ?>" name="calc_shipping_state" id="calc_shipping_state" /><?php
                
                				}
                			?>
                		</div>
                
                		<?php if ( apply_filters( 'woocommerce_shipping_calculator_enable_city', false ) ) : ?>
                
                			<div class="form-row form-row-wide form-group" id="calc_shipping_city_field">
                                <label class="info-title control-label"><?php echo esc_html__( 'City', 'flipmart' ); ?></label>
                				<input type="text" class="form-control unicase-form-control text-input" value="<?php echo esc_attr( WC()->customer->get_shipping_city() ); ?>" placeholder="<?php esc_attr_e( 'City', 'flipmart' ); ?>" name="calc_shipping_city" id="calc_shipping_city" />
                			</div>
                
                		<?php endif; ?>
                
                		<?php if ( apply_filters( 'woocommerce_shipping_calculator_enable_postcode', true ) ) : ?>
                
                			<div class="form-row form-row-wide form-group" id="calc_shipping_postcode_field">
                                <label class="info-title control-label"><?php echo esc_html__( 'Postcode / ZIP', 'flipmart' ); ?></label>
                				<input type="text" class="form-control unicase-form-control text-input" value="<?php echo esc_attr( WC()->customer->get_shipping_postcode() ); ?>" placeholder="<?php esc_attr_e( 'Postcode / ZIP', 'flipmart' ); ?>" name="calc_shipping_postcode" id="calc_shipping_postcode" />
                			</div>
                
                		<?php endif; ?>
                        
                        <div class="pull-right">
                            <button type="submit" name="calc_shipping" value="1" class="btn-upper btn btn-primary"><?php _e( 'Update totals', 'flipmart' ); ?></button>
						</div>
                        
                    </td>
                </tr>
            </tbody>
       </table>
       
	   <?php wp_nonce_field( 'woocommerce-cart' ); ?>
    	
    </form>

<?php do_action( 'woocommerce_after_shipping_calculator' ); ?>
