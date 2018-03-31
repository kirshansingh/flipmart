<?php
/*
 * Header Section
*/
$this->sections[] = array(
	'title'  =>   esc_html__('Header', 'flipmart'),
	'icon'   => 'el-icon-photo'
);

$this->sections[] = array(
	'title'  =>   esc_html__('Header', 'flipmart'),
	'subsection' => true,
	'fields' => array(
            
        array(
            'id'      => 'opt-top-info',
            'type'    => 'info',
            'style'   => 'info',
            'title'   => esc_html__( 'Header Top Bar Setting', 'flipmart' ),
            'desc'    => esc_html__( 'Please choose header top bar settings using options ( Top Bar Enable / Disable etc.. ).', 'flipmart' ),
        ),   
                 
        array(
            'id'      => 'header-top',
            'type'    => 'switch',
            'title'   => esc_html__('Show Top Bar', 'flipmart'),
            'default' => true,
            'on'      => esc_html__('Yes', 'flipmart'),
            'off'     => esc_html__('No', 'flipmart'),
        ),  
        
        array(
            'id'      => 'header-top-currency',
            'type'    => 'switch',
            'title'   => esc_html__('Show Currency Switcher', 'flipmart'),
            'default' => true,
            'on'      => esc_html__('Yes', 'flipmart'),
            'off'     => esc_html__('No', 'flipmart'),
        ),
        
        array(
            'id'       => 'header-top-sec-menu',
            'type'     => 'switch',
            'title'    => esc_html__('Show Menu', 'flipmart'),
            'subtitle' => esc_html__( 'Show or hide top bar menu', 'flipmart' ),
            'default'  => true,
            'on'       => esc_html__('Yes', 'flipmart'),
            'off'      => esc_html__('No', 'flipmart'),
        ),
        
        array(
            'id'       => 'opt-search-info',
            'type'     => 'info',
            'style'    => 'info',
            'title'    => esc_html__( 'Header Search Area Setting', 'flipmart' ),
            'desc'     => esc_html__( 'Please choose header search area settings.', 'flipmart' ),
        ),
        
        array(
            'id'       => 'header-search-area',
            'type'     => 'switch',
            'title'    => esc_html__('Show Search Area', 'flipmart'),
            'subtitle' => esc_html__( 'Show or hide search area which contain search form and category selector', 'flipmart' ),
            'default'  => true,
            'on'       => esc_html__('Yes', 'flipmart'),
            'off'      => esc_html__('No', 'flipmart'),
        ),
        
        array(
            'id'       => 'opt-cart-info',
            'type'     => 'info',
            'style'    => 'info',
            'title'    => esc_html__( 'Header Add to Cart Button Setting', 'flipmart' ),
            'desc'     => esc_html__( 'Please insert header add to cart button settings.', 'flipmart' ),
        ),
        
        array(
            'id'       => 'header-add-cart',
            'type'     => 'switch',
            'title'    => esc_html__('Show Add to Cart Button', 'flipmart'),
            'default'  => true,
            'on'       => esc_html__('Yes', 'flipmart'),
            'off'      => esc_html__('No', 'flipmart'),
        )
              
	)
);