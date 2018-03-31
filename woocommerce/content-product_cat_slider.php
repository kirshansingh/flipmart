<?php if( isset( $style ) && $style == 'full' ): ?>

    <div class="item item-carousel">
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
    
<?php else: ?>

    <div class="product">
        <div class="product-micro">
            <div class="row product-micro-row">
                <div class="col col-xs-5">
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
                </div>
                <div class="col2 col-xs-7">
                    <div class="product-info">
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
<?php endif; ?>