<?php
/**
 * The template for displaying product content within loops in slider
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div class="item item-carousel">
    <div class="products">
        <div class="product">
            <div class="product-image">
                <?php
                woocommerce_show_product_loop_sale_flash();
            	/**
            	 * woocommerce_before_shop_loop_item_title hook.
            	 *
            	 * @hooked woocommerce_show_product_loop_sale_flash - 10
            	 * @hooked woocommerce_template_loop_product_thumbnail - 10
            	 */
            	do_action( 'woocommerce_before_shop_loop_item_title' ); 
                ?>
            </div>
            <div class="product-info text-left">
                <h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <?php
            	/**
            	 * woocommerce_after_shop_loop_item_title hook.
            	 *
            	 * @hooked woocommerce_template_loop_rating - 5
            	 * @hooked woocommerce_template_loop_price - 10
            	 */
            	do_action( 'woocommerce_after_shop_loop_item_title' );
            	?>
            </div>
            <div class="cart clearfix animate-effect">
                <div class="action">
                  <ul class="list-unstyled">
                     <?php if ( shortcode_exists( 'yith_wcwl_add_to_wishlist' ) || shortcode_exists( 'yith_compare_button' ) ) { ?>
                        <li class="add-cart-button btn-group"><?php woocommerce_template_loop_add_to_cart(); ?></li>
                     <?php }else{ ?>
                        <li class="add-cart-button btn-group cart-extra"><?php woocommerce_template_loop_add_to_cart(); ?></li>
                     <?php
                        }
                        
                        //Wishlist Shortcode
                        if ( shortcode_exists( 'yith_wcwl_add_to_wishlist' ) ) {
                            echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
                        }
                        
                        //Compare Button
                        if ( shortcode_exists( 'yith_compare_button' ) ) {
                            echo '<li class="lnk">'. do_shortcode( '[yith_compare_button container="no"]' ) .'</li> ';
                        } 
                     ?>  
                  </ul>
                </div>
            </div>
        
        </div>
    </div>
</div>
