<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product_cat.php.
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
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Store column count for displaying the grid
if ( isset( $column ) && !empty( $column ) ) {
  $woocommerce_loop = $column;
}else{
  $woocommerce_loop = yog_helper()->get_option( 'shop-column', 'raw', '4', 'options' );  
}

?>
<div class="col-sm-6 <?php echo yog_get_column( $woocommerce_loop); ?>">
    <div <?php wc_product_cat_class( '', $category ); ?>>
        <div class="products">
            <div class="product">
                <div class="product-image">
                    <?php
                	/**
                	 * woocommerce_before_subcategory hook.
                	 *
                	 * @hooked woocommerce_template_loop_category_link_open - 10
                	 */
                	do_action( 'woocommerce_before_subcategory', $category );
                
                	/**
                	 * woocommerce_before_subcategory_title hook.
                	 *
                	 * @hooked woocommerce_subcategory_thumbnail - 10
                	 */
                	do_action( 'woocommerce_before_subcategory_title', $category );
                    ?>
                </div>
                <div class="product-info text-left">
                    <h3 class="name"><a href="<?php the_permalink( $category->term_id ); ?>"><?php printf( '%s ( %s )', $category->name, $category->count ); ?></a></h3>
                    <?php
                	/**
                	 * woocommerce_after_subcategory_title hook.
                	 */
                	do_action( 'woocommerce_after_subcategory_title', $category );
                
                	/**
                	 * woocommerce_after_subcategory hook.
                	 *
                	 * @hooked woocommerce_template_loop_category_link_close - 10
                	 */
                	do_action( 'woocommerce_after_subcategory', $category ); ?>
                </div>
            </div>
        </div>
    </div>
</div>
