<?php
/*
 * Footer Section
*/

$this->sections[] = array(
	'title'  =>   esc_html__('Footer', 'flipmart'),
	'icon'   => 'el-icon-photo'
);

$this->sections[] = array(
	'title'      =>   esc_html__('Footer', 'flipmart'),
	'subsection' => true,
	'fields'     => array(
    
        array(
			'id'           => 'payments-method',
			'type'         => 'repeater',
            'group_values' => true,
			'title'        => esc_html__('Payment Method Logos', 'flipmart'),
			'fields'       => array(

				array(
        			'id'       => 'payment-method-logo',
        			'type'     => 'media',
        			'url'      => true,
        			'title'    => esc_html__('Payment Method Logo', 'flipmart'),
        			'subtitle' => esc_html__('Select an image file for your payment method logo.', 'flipmart'),
        		)
			)
		)
	)
);
