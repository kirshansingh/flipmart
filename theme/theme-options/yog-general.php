<?php
/*
 * General Section
*/

$this->sections[] = array(
	'title'  =>   esc_html__('General', 'flipmart'),
	'icon'   => 'el-icon-adjust-alt',
);

// General Setting
$this->sections[] = array(
	'title'      =>   esc_html__('General Settings', 'flipmart'),
	'subsection' => true,
	'fields'     => array(

		array(
			'id'       => 'custom-sidebars',
			'type'     => 'multi_text',
			'title'    => esc_html__( 'Custom Sidebars', 'flipmart' ),
			'subtitle' => esc_html__( 'Custom sidebars can be assigned to any page or post.', 'flipmart' ),
			'desc'     => esc_html__( 'You can add as many custom sidebars as you need.', 'flipmart' )
		),

		array(
			'id'       => 'google-api-key',
			'type'     => 'text',
			'title'    => esc_html__( 'Google map API key', 'flipmart' ),
			'subtitle' => '',
			'desc'     => esc_html__( 'Add your Google map API key here. You can get Google API key from https://developers.google.com/maps/documentation/javascript/get-api-key', 'flipmart' )
		),
        
        array(
            'id'       => 'opt-social-info',
            'type'     => 'info',
            'style'    => 'info',
            'title'    =>  esc_html__( 'Social Networks Icons Setting', 'flipmart' ),
            'desc'     =>  esc_html__( 'Please insert your social icons for your site.', 'flipmart' ),
        ), 
        
        array(
            'id'       => 'social-icon-enable',
            'type'     => 'switch',
            'title'    => esc_html__('Show Social Icon', 'flipmart'),
            'default'  => true,
            'on'       => esc_html__('Yes', 'flipmart'),
            'off'      => esc_html__('No', 'flipmart'),
        ), 
               
        array(
			'id'           => 'social-identities',
			'type'         => 'repeater',
            'required'     => array('social-icon-enable','equals',true),
			'group_values' => true,
			'title'        => esc_html__('Social identities', 'flipmart'),
			'fields'       => array(
                
                array(
					'id'       => 'title',
					'type'     => 'text',
					'title'    => esc_html__( 'Title', 'flipmart' )
				),
                
				array(
					'id'       => 'network',
					'type'     => 'select',
					'title'    => esc_html__( 'Icon', 'flipmart' ),
                    'options'  => array(
                        'fa-dribbble'    => esc_html__( 'Dribbble', 'flipmart' ),
                        'fa-dropbox'     => esc_html__( 'Dropbox', 'flipmart' ),
                        'fa-envelope'    => esc_html__( 'Envelope', 'flipmart' ),
                        'fa-facebook'    => esc_html__( 'FaceBook', 'flipmart' ),
                        'fa-foursquare'  => esc_html__( 'Foursquare', 'flipmart' ),
                        'fa-github'      => esc_html__( 'Github ', 'flipmart' ),
                        'fa-google-plus' => esc_html__( 'Google+', 'flipmart' ),
                        'fa-instagram'   => esc_html__( 'Instagram', 'flipmart' ),
                        'fa-linkedin'    => esc_html__( 'Linkedin', 'flipmart' ),
                        'fa-maxcdn'      => esc_html__( 'Maxcdn', 'flipmart' ),
                        'fa-pinterest'   => esc_html__( 'Pinterest', 'flipmart' ),
                        'fa-rss'         => esc_html__( 'Rss', 'flipmart' ),
                        'fa-skype'       => esc_html__( 'Skype', 'flipmart' ),
                        'fa-tumblr'      => esc_html__( 'Tumblr', 'flipmart' ),
                        'fa-twitter'     => esc_html__( 'Twitter', 'flipmart' ),
                        'fa-vk'          => esc_html__( 'Vk', 'flipmart' ),
                        'fa-youtube'     => esc_html__( 'Youtube', 'flipmart' ), 
                    )
				),

				array(
					'id'     => 'url',
					'type'   => 'text',
					'title'  => esc_html__( 'Url', 'flipmart' )
				)
			)
		)
	)
);

$skins = get_option( '_yog_skins', array() );
$skin_options = array();
foreach( $skins as $k => $skin ) {
    $skin_options[$k] = '<span class="skin-item" style="background:' . yog_helper()->yog_validate_setting( $skin['color'], 'colorpicker', 'skin_color', array() ) . ';"><span>' . $skin['name'] . '</span></span><a href="#" data-name="' . $k . '" class="skin-remove-item button-red">'. esc_html__( 'Delete Skin', 'flipmart' ) .'</a>';
}

// General Setting
$this->sections[] = array(
	'title'      =>   esc_html__('Color Schemes Settings', 'flipmart'),
	'subsection' => true,
	'fields'     => array(
        
        array(
            'id'    => 'opt-site-info',
            'type'  => 'info',
            'style' => 'info',
            'title' =>  esc_html__( 'Color Switcher', 'flipmart' ),
            'desc'  =>  esc_html__( 'Please choose color switcher hide / display on front.', 'flipmart' ),
        ),
        
        array(
			'id'       => 'color-switcher',
			'type'	   => 'switch',
			'title'    => esc_html__('Color Switcher', 'flipmart'),
			'subtitle' => esc_html__('Controls the color switcher view.', 'flipmart'),
            'on'       => esc_html__('Yes', 'flipmart'),
            'off'      => esc_html__('No', 'flipmart'),
		),
        
        array(
            'id'    => 'opt-site-info',
            'type'  => 'info',
            'style' => 'info',
            'title' =>  esc_html__( 'Color Schemes', 'flipmart' ),
            'desc'  =>  esc_html__( 'Please create your site new color schemes.', 'flipmart' ),
        ),
        
        array(
			'id'       => 'color-view',
			'type'	   => 'switch',
			'title'    => esc_html__('Color Schemes', 'flipmart'),
			'subtitle' => esc_html__('Create and use color schemes.', 'flipmart'),
            'on'       => esc_html__('Yes', 'flipmart'),
            'off'      => esc_html__('No', 'flipmart'),
		),
        
        array(
            'title'    => __( 'Select Primary Color skin', 'flipmart' ),
            'id'       => 'color-skin',
            'required' =>  array('color-view','equals',true),
            'type'     => 'radio',
            'options'  => $skin_options
        ),
    
        array(
			'id'     => 'color-name',
			'type'   => 'text',
            'required' =>  array('color-view','equals',true),
			'title'  => esc_html__( 'Primary Color Name', 'flipmart' )
		),
        
        array(
			'id'     => 'color',
			'type'   => 'color',
            'required' =>  array('color-view','equals',true),
			'title'  => esc_html__( 'Primary Color', 'flipmart' )
		),
        
        array(
			'id'     => 'skin-sec-color',
			'type'   => 'color',
            'required' =>  array('color-view','equals',true),
			'title'  => esc_html__( 'Scondary Color', 'flipmart' )
		),
        
        
        array(
            'id'       => 'btn-skin-generator',
            'type'     => 'button_set',
            'required' =>  array('color-view','equals',true),
            'title'    => __('Create Skin', 'flipmart'),
            'options' => array(
                '1' => 'Create Skin'
             )
        )     
    )
);

// Theme Features
$this->sections[] = array(
	'title'      => esc_html__( 'Theme Features', 'flipmart' ),
	'subsection' => true,
	'fields'     => array(
        
        array(
            'id'    => 'opt-site-info',
            'type'  => 'info',
            'style' => 'info',
            'title' =>  esc_html__( 'Site Version', 'flipmart' ),
            'desc'  =>  esc_html__( 'Please choose site version settings.', 'flipmart' ),
        ),
        
        array(
            'id'      => 'site-version',
            'type'    => 'select',
            'title'   =>  esc_html__('Site Version', 'flipmart'),
            'options' => array(
                'v1'  => esc_html__( 'Default', 'flipmart' ),
                'v2'  => esc_html__( 'Two', 'flipmart' ),
                'v3'  => esc_html__( 'Three', 'flipmart' ),
                'v4'  => esc_html__( 'Four', 'flipmart' ),
                'v5'  => esc_html__( 'Five', 'flipmart' ),
                'v6'  => esc_html__( 'Jewellery', 'flipmart' ),
                'v7'  => esc_html__( 'Fashion', 'flipmart' )
            ),
            'default' => 'v1'
        ),
        
        array(
			'id'     => 'header-phone',
			'type'   => 'text',
            'required' =>  array('site-version','equals','v7'),
			'title'  => esc_html__( 'Header Phone Number', 'flipmart' )
		),
        
        array(
			'id'       => 'footer-copyright',
			'type'     => 'editor',
            'required' =>  array('site-version','equals','v7'),
			'title'    => esc_html__( 'Footer Cpyright', 'flipmart' ),
            'subtitle'     => esc_html__( 'Insert your site Copyright text display in footer of site', 'flipmart' ),
		),
        
        array(
            'id'          => 'opt-layout-info',
            'type'        => 'info',
            'style'       => 'info',
            'title'       => esc_html__( 'Site Layout', 'flipmart' ),
            'desc'        => esc_html__( 'Please choose site layout setting using options ( layout, background ).', 'flipmart' ),
        ),  
        
		array(
			'id'          => 'site-layout',
			'type'        => 'button_set',
			'title'       => esc_html__('Layout', 'flipmart'),
			'subtitle'    => esc_html__('Control the site layout.', 'flipmart'),
			'options'     => array(
				'wide'    => 'Wide',
				'boxed'   => 'Boxed',
			),
			'default'     => 'wide'
		),

		array(
			'id'          => 'site-background-type',
			'type'        => 'select',
			'title'       => esc_html__( 'Background Type', 'flipmart' ),
			'options'     => array(
                'image'    => 'Image',
				'solid'    => 'Solid',
				'gradient' => 'Gradient'
			),
			'required'    => array(
				'site-layout',
				'equals',
				'boxed'
			)
		),

		array(
			'id'          => 'site-bar-bg',
			'type'        => 'media',
			'url'         => true,
			'title'       => esc_html__('Background Image', 'flipmart'),
			'required'    => array(
				'site-background-type',
				'equals',
				'image'
			)
		),

		array(
			'id'          => 'site-bar-solid',
			'type'        => 'color',
			'url'         => true,
			'title'       => esc_html__('Background Color', 'flipmart'),
			'required'    => array(
				'site-background-type',
				'equals',
				'solid'
			),
		),

		array(
			'id'          => 'site-bar-gradient',
			'type'        => 'gradient',
			'url'         => true,
			'title'       => esc_html__('Background Gradient', 'flipmart'),
			'required'    => array(
				'site-background-type',
				'equals',
				'gradient'
			),
		),
        
        array(
            'id'       => 'opt-breadcrumb-info',
            'type'     => 'info',
            'style'    => 'info',
            'title'    => esc_html__( 'Site Breadcrumb', 'flipmart' ),
            'desc'     => esc_html__( 'Please choose site breadcrumb setting.', 'flipmart' ),
        ), 
        
        array(
			'id'       => 'breadcrumb-enable',
			'type'	   => 'switch',
			'title'    => esc_html__('Breadcrumb', 'flipmart'),
			'subtitle' => esc_html__('Choose No if want to hide breadcrumb.', 'flipmart'),
			'on'       => esc_html__('Yes', 'flipmart'),
            'off'      => esc_html__('No', 'flipmart'),
			'default'  => 'on'
		)
    )
);