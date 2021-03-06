<?php 
 global $post;    
 $classes = ( isset( $classes ) && !empty( $classes ) )? $classes : '';   
?>
<div <?php post_class( $classes ); ?>>
    <div class="products">
        <div class="product-list product">
            <div class="row product-list-row">
                <div class="col col-sm-4 col-lg-4">
                    <div class="product-image">
                        <?php
                    	/**
                    	 * woocommerce_before_shop_loop_item_title hook.
                    	 *
                    	 * @hooked woocommerce_show_product_loop_sale_flash - 10
                    	 * @hooked woocommerce_template_loop_product_thumbnail - 10
                    	 */
                    	do_action( 'woocommerce_before_shop_loop_item_title' ); 
                        ?>
                    </div>
                </div>
                <div class="col col-sm-8 col-lg-8">
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
                        <div class="description m-t-10"><?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ); ?></div>
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <?php 
                                    global $product;
                                    echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                                    	sprintf( '<button class="btn btn-primary icon"><a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s"><i class="fa fa-shopping-cart"></i></a></button>',
                                    		esc_url( $product->add_to_cart_url() ),
                                    		esc_attr( isset( $quantity ) ? $quantity : 1 ),
                                    		esc_attr( $product->get_id() ),
                                    		esc_attr( $product->get_sku() ),
                                    		esc_attr( isset( $class ) ? $class : 'button' )
                                    	),  
                                    $product );
                                    echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                                    	sprintf( '<button class="btn btn-primary cart-btn"><a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s">%s</a></button>',
                                    		esc_url( $product->add_to_cart_url() ),
                                    		esc_attr( isset( $quantity ) ? $quantity : 1 ),
                                    		esc_attr( $product->get_id() ),
                                    		esc_attr( $product->get_sku() ),
                                    		esc_attr( isset( $class ) ? $class : 'button' ),
                                            esc_html__( 'Add to cart', 'flipmart' )
                                    	),  
                                    $product );
                                ?> 
                              </li>
                              <?php 
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
            <?php woocommerce_show_product_loop_sale_flash(); ?>
        </div>
    </div>
</div>