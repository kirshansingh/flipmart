<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
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

global $product;

if ( ! comments_open() ) {
	return;
}

?>
<div id="reviews" class="woocommerce-Reviews">
	<div id="comments" class="row">
		<div class="col-md-12">
            <h3 class="title-review-comments"><?php
    			if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' && ( $count = $product->get_review_count() ) ) {
    				/* translators: 1: reviews count 2: product name */
    				printf( esc_html( _n( '%1$s review for %2$s', '%1$s reviews for %2$s', $count, 'flipmart' ) ), esc_html( $count ), '<span>' . get_the_title() . '</span>' );
    			} else {
    				_e( 'Reviews', 'flipmart' );
    			}
    		?></h3>

    		<?php if ( have_comments() ) : ?>
    
    			<ul class="comment-list">
    				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
    			</ul>
    
    			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
    				echo '<nav class="woocommerce-pagination">';
    				paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
    					'prev_text' => '&larr;',
    					'next_text' => '&rarr;',
    					'type'      => 'list',
    				) ) );
    				echo '</nav>';
    			endif; ?>
    
    		<?php else : ?>
    
    			<p class="woocommerce-noreviews"><?php _e( 'There are no reviews yet.', 'flipmart' ); ?></p>
    
    		<?php endif; ?>
        </div>
	</div>
</div>

<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>

	<div id="review_form_wrapper">
		<div id="review_form" class="register-form">
			<?php
				$commenter = wp_get_current_commenter();

				$comment_form = array(
					'title_reply'          => have_comments() ? __( 'Add a review', 'flipmart' ) : sprintf( __( 'Be the first to review &ldquo;%s&rdquo;', 'flipmart' ), get_the_title() ),
					'title_reply_to'       => __( 'Leave a Reply to %s', 'flipmart' ),
					'title_reply_before'   => '<h3 id="reply-title" class="comment-reply-title title-review-comments">',
					'title_reply_after'    => '</h3>',
					'comment_notes_after'  => '',
					'fields'               => array(
						'author' => '<div class="row"><div class="col-md-6"><div class="form-group"><label class="info-title" for="author">' . esc_html__( 'Name', 'flipmart' ) . ' <span class="required">*</span></label> ' .
									'<input id="author" name="author" class="form-control unicase-form-control" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" required /></div></div>',
						'email'  => '<div class="col-md-6"><div class="form-group"><label class="info-title" for="email">' . esc_html__( 'Email', 'flipmart' ) . ' <span class="required">*</span></label> ' .
									'<input id="email" name="email" class="form-control unicase-form-control" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" aria-required="true" required /></div></div></div>',
					),
					'label_submit'  => __( 'Submit', 'flipmart' ),
					'logged_in_as'  => '',
					'comment_field' => '',
				);

				if ( $account_page_url = wc_get_page_permalink( 'myaccount' ) ) {
					$comment_form['must_log_in'] = '<p class="must-log-in title-review-comments">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a review.', 'flipmart' ), esc_url( $account_page_url ) ) . '</p>';
				}

				if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
					$comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__( 'Your rating', 'flipmart' ) . '</label><select name="rating" id="rating" required>
						<option value="">' . esc_html__( 'Rate&hellip;', 'flipmart' ) . '</option>
						<option value="5">' . esc_html__( 'Perfect', 'flipmart' ) . '</option>
						<option value="4">' . esc_html__( 'Good', 'flipmart' ) . '</option>
						<option value="3">' . esc_html__( 'Average', 'flipmart' ) . '</option>
						<option value="2">' . esc_html__( 'Not that bad', 'flipmart' ) . '</option>
						<option value="1">' . esc_html__( 'Very poor', 'flipmart' ) . '</option>
					</select></div>';
				}

				$comment_form['comment_field'] .= '<div class="row"><div class="col-md-12"><div class="form-group"><label class="info-title" for="comment">' . esc_html__( 'Your review', 'flipmart' ) . ' <span class="required">*</span></label><textarea id="comment" class="form-control unicase-form-control" name="comment" cols="45" rows="8" required></textarea></div></div></div>';
                ob_start();
				comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
                $yog_comment_form = ob_get_clean();
            
                //Form class replacement.
                $yog_comment_form = str_replace( 'class="submit"', 'class="btn-upper btn btn-primary checkout-page-button"', $yog_comment_form );
                
                //Print Form.
                print( $yog_comment_form );
			?>
		</div>
	</div>

<?php else : ?>

	<p class="woocommerce-verification-required"><?php _e( 'Only logged in customers who have purchased this product may leave a review.', 'flipmart' ); ?></p>

<?php endif; ?>