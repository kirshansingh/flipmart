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
<div class="product">
    <div class="product-micro">
        <div class="row product-micro-row">
            <div class="col col-xs-5">
                <div class="product-image">
                    <?php
                    	$yog_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full');
                        echo '<div class="image"><a href="'. get_permalink() .'"><img src="'. esc_url( $yog_thumb[0] ) .'" alt="" class="img-responsive"></a></div>';
                    ?>
                </div>
            </div>
            <div class="col2 col-xs-7">
                <div class="product-info">
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
            </div>
        </div>
    </div>
</div>

