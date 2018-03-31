<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the main containers
 *
 * @package base-theme
 */			
		yog_action( 'after_content' );

		yog_action( 'before_footer' );
		yog_action( 'footer' );
		yog_action( 'after_footer' );

		?>
    
    <?php yog_action( 'after' ) ?>
    
	<?php wp_footer(); ?>
    
</body>
</html>
