<?php
/**
 * Single Product Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/rating.php.
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
 * @version 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) {
	return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();

if ( $rating_count > 0 ) : ?>
    
    <div class="rating-reviews m-t-20">
		<div class="row">
			<div class="col-sm-3">
				<?php echo '<div class="rating rateit-small" data-rating="'. intval( $average ) .'"></div>'; ?>
			</div>
			<div class="col-sm-8">
				<div class="reviews">
                    <?php if ( comments_open() ) : ?><a href="#reviews-content" class="woocommerce-review-link lnk" rel="nofollow">(<?php printf( _n( '%s customer review', '%s customer reviews', $review_count, 'flipmart' ), '<span class="count">' . esc_html( $review_count ) . '</span>' ); ?>)</a><?php endif ?>
				</div>
			</div>
		</div><!-- /.row -->		
	</div><!-- /.rating-reviews -->

<?php endif; ?>
