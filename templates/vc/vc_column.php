<?php
$output = $el_class = $width = '';
extract(shortcode_atts(array(
    'el_class' => '',
    'width' => '1/1',
    'css' => ''
), $atts));

	switch( $width ) {
		case '1/6':
			$shortcode_column = 'col-md-2'; 		// in bootstrap2 1/6 = span2
			break;
		case '1/4':
			$shortcode_column = 'col-md-3';			// in bootstrap2 1/4 = span3
			break;
		case '1/12':
			$shortcode_column = 'col-md-1';			// in bootstrap2 1/4 = span1
			break;
		case '1/3':
			$shortcode_column = 'col-md-4';			// in bootstrap2 1/3 = span4
			break;
        case '5/12':
			$shortcode_column = 'col-md-5';			// in bootstrap2 5/12 = span5
            break;
		case '1/2':
			$shortcode_column = 'col-md-6';			// in bootstrap2 1/2 = span6
            break;
        case '7/12':
			$shortcode_column = 'col-md-7';			// in bootstrap2 7/12 = span7
			break;
		case '2/3':
			$shortcode_column = 'col-md-8';			// in bootstrap2 2/3 = span8
			break;
		case '3/4':
			$shortcode_column = 'col-md-9';			// in bootstrap2 3/4 = span9
			break;
		case '4/6':
			$shortcode_column = 'col-md-8';			// in bootstrap2 4/6 = span8
			break;
		case '5/6':
			$shortcode_column = 'col-md-10';		// in bootstrap2 5/6 = span10
			break;
		case '1/1':
		default :
			$shortcode_column = 'col-md-12';
			break;
	}

$el_class = $this->getExtraClass($el_class);
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $shortcode_column . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
if( isset( $view ) && $view === 'full_width' || isset( $map ) && $map === 'full' || isset( $slider ) && $slider != NULL ):
$output .= "\n\t\t\t".wpb_js_remove_wpautop( $content );
else:

$output .= "\n\t".'<div class="'.$css_class.'">';
//$output .= "\n\t\t".'<div class="wpb_wrapper">';
$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
//$output .= "\n\t\t".'</div> '.$this->endBlockComment('.wpb_wrapper');
$output .= "\n\t".'</div> '.$this->endBlockComment($el_class) . "\n";
endif;
print( $output );