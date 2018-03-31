<?php
/**
 * Product loop sale flash
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/sale-flash.php.
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
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

if ( $product->is_on_sale() ) : 
     //Site Version 
     if( 'v7' == yog_helper()->get_option( 'site-version' ) ): 
         echo apply_filters( 'woocommerce_sale_flash', '<div class="sale">' . esc_html__( 'Sale', 'flipmart' ) . '</div>', $post, $product ); 
     else:
         echo apply_filters( 'woocommerce_sale_flash', '<div class="tag sale"><span>' . esc_html__( 'Sale', 'flipmart' ) . '</span></div>', $post, $product ); 
     endif;
     
endif;

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */

//New Product Tag
$postdate 		= get_the_time( 'Y-m-d' );			// Post date
$postdatestamp 	= strtotime( $postdate );			// Timestamped post date
$newness 		= get_option( 'wc_nb_newness' ); 	// Newness in days as defined by option
if ( ( time() - ( 60 * 60 * 24 * $newness ) ) < $postdatestamp ) { // If the product was published within the newness time frame display the new badge
	
     //Site Version 
     if( 'v7' == yog_helper()->get_option( 'site-version' ) ): 
         echo '<div class="new">' . esc_html__( 'New', 'flipmart' ) . '</div>'; 
     else:
         echo '<div class="tag new"><span>' . esc_html__( 'New', 'flipmart' ) . '</span></div>'; 
     endif;
    
}

if( yog_helper()->get_option( 'product-hot-flash', 'raw', false, 'post' ) ):
   
     //Site Version 
     if( 'v7' == yog_helper()->get_option( 'site-version' ) ): 
         echo '<div class="hot">' . esc_html__( 'Hot', 'flipmart' ) . '</div>'; 
     else:
         echo '<div class="tag hot"><span>' . esc_html__( 'Hot', 'flipmart' ) . '</span></div>'; 
     endif;
   

endif;
