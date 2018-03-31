<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $yog_skin
 * @var $css
 * @var $el_id
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
 */
$el_class = $full_height = $parallax_speed_bg = $parallax_speed_video = $full_width = $equal_height = $flex_row = $columns_placement = $content_placement = $parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = '';
$disable_element = '';
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass( $el_class );
$yog_skin = $this->getExtraClass( $yog_skin );
$css_classes = array(
	$el_class,
    $yog_skin,
	vc_shortcode_custom_css_class( $css ),
);

if ( 'yes' === $disable_element ) {
	if ( vc_is_page_editable() ) {
		$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
	} else {
		return '';
	}
}

if (vc_shortcode_custom_css_has_property( $css, array('border', 'background') ) || $video_bg || $parallax) {
	$css_classes[]='vc_row-has-fill';
}

if (!empty($atts['gap'])) {
	$css_classes[] = 'vc_column-gap-'.$atts['gap'];
}

$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}

//Background Image
if( !empty( $yog_parallax_image ) ){
    $yog_image_src = wp_get_attachment_image_src( $yog_parallax_image, 'full' );
    $wrapper_attributes[] = 'style="background: url('. $yog_image_src[0] .') no-repeat;"';
}
$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

if( 'v7' == yog_helper()->get_option( 'site-version' ) ){
        
     if ( ! empty( $full_width ) && $full_width == 'stretch_row' ) {
    	$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '><div class="row">';
        $output .= wpb_js_remove_wpautop( $content );
        $output .= '</div></div>';
    }elseif ( ! empty( $full_width ) && $full_width == 'stretch_row_fluid' ) {
    	$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '><div class="container-fluid">';
        $output .= wpb_js_remove_wpautop( $content );
        $output .= '</div></div></div>';
    }elseif ( ! empty( $full_width ) && $full_width == 'stretch_row_sp' ) {
    	$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '><div class="container">';
        $output .= wpb_js_remove_wpautop( $content );
        $output .= '</div></div></div>';
    }else{
        $output .= '<div class="container"><div ' . implode( ' ', $wrapper_attributes ) . '><div class="row">';
        $output .= wpb_js_remove_wpautop( $content );
        $output .= '</div></div></div></div>';
    }
    
}else{
    
    if ( ! empty( $full_width ) && $full_width == 'stretch_row' ) {
    	$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '><div class="row">';
        $output .= wpb_js_remove_wpautop( $content );
        $output .= '</div></div>';
    }elseif ( ! empty( $full_width ) && $full_width == 'stretch_row_fluid' ) {
    	$output .= '<div class="container-fluid"><div ' . implode( ' ', $wrapper_attributes ) . '>';
        $output .= wpb_js_remove_wpautop( $content );
        $output .= '</div></div>';
    }elseif ( ! empty( $full_width ) && $full_width == 'stretch_row_sp' ) {
    	$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '><div class="container">';
        $output .= wpb_js_remove_wpautop( $content );
        $output .= '</div></div></div>';
    }else{
        $output .= '<div class="container"><div ' . implode( ' ', $wrapper_attributes ) . '><div class="row">';
        $output .= wpb_js_remove_wpautop( $content );
        $output .= '</div></div></div>';
    }
    
}

echo $output;