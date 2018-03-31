<?php 
global $product;
if( 'v7' == yog_helper()->get_option( 'site-version' ) ): ?>
    <div <?php post_class( $classes ); ?>>
        <div class="item-product">
            <div class="product-img">
                <?php 
                    woocommerce_show_product_loop_sale_flash();
                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full');
                    echo '<img src="'. esc_url( $thumb[0] ) .'" alt="" class="img-responsive">'; 
                ?>
            </div>
            <div class="Product-Info">
                <h4><?php the_title(); ?></h4>
                <?php
                    //Price
                    woocommerce_template_loop_price(); 
                    
                    //Cart
                    echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                    	sprintf( '<div class="cart-btn"><a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s">'. esc_html__( 'Add to cart', 'flipmart' ) .'</a></div>',
                    		esc_url( $product->add_to_cart_url() ),
                    		esc_attr( isset( $quantity ) ? $quantity : 1 ),
                    		esc_attr( $product->get_id() ),
                    		esc_attr( $product->get_sku() ),
                    		esc_attr( isset( $class ) ? $class : 'button' )
                    	),
                    $product );
                ?>
            </div>
        </div>
    </div>
<?php else: ?>
    <div <?php post_class( $classes ); ?>>
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
                <?php /**
            	 * woocommerce_after_shop_loop_item hook.
            	 *
            	 * @hooked woocommerce_template_loop_product_link_close - 5
            	 * @hooked woocommerce_template_loop_add_to_cart - 10
            	 */
                ?>
            </div>
        </div>
    </div>
<?php endif;