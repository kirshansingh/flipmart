<?php
/**
 * Theme Framework
 * The Yog_Theme initiate the theme engine
 */

if( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//Theme support
function yog_theme_support() {
    
    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );
    
    //Theme Support
    add_theme_support( 'custom-header', array() );
    add_theme_support( 'custom-background', array() );
    
    // Custom Post Type Supports
    add_theme_support( 'team' );
    add_theme_support( 'testimonial' );
    
    // Custom Extensions
    add_theme_support( 'yog-extension', array(
    	'mega-menu',
        'pagination'
    ) );

    //Woocommerce
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );  
}
add_action( 'after_setup_theme', 'yog_theme_support' );

// Set theme options
yog()->set_option_name( 'flipmart' );

//Set Theme Options
add_theme_support( 'yog-theme-options', array(
	'general',
	'header',
	'logo',
	'footer',
	'sidebars',
	'typography',
	'blog',
    'woocommerce',
    'extras',
	'advanced',
	'custom-code',
	'export'
));

//Set available metaboxes
add_theme_support( 'yog-metaboxes', array(
	'page',
	'testimonial',
    'woocommerce',
));

// Sets up theme navigation locations.
add_theme_support( 'yog-menu', array(
   'primary' =>   esc_html__( 'Primary Menu', 'flipmart' ),
   'top-bar'  =>   esc_html__( 'Top Bar Menu', 'flipmart' )
) );

register_nav_menus( array(
   'primary' =>   esc_html__( 'Primary Menu', 'flipmart' ),
   'top-bar'  =>   esc_html__( 'Top Bar Menu', 'flipmart' )
));

// Tell the TinyMCE editor to use a custom stylesheet
add_editor_style( get_template_directory_uri().'/assets/css/editor-style.css' );

// Register Widgets Area.
function yog_widgets_init() {
    
	//Primary Sidebar
    register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar Widget Area', 'flipmart' ),
		'id'            => 'primary',
		'description'   => esc_html__( 'Appears in primary sidebar area.', 'flipmart' ),
		'before_widget' => '<div id="%1$s" class="sidebar-widget outer-bottom-small clearfix %2$s">',
		'after_widget'  => '</div><div class="clearfix"></div>',
		'before_title'  => '<h3 class="section-title">',
		'after_title'   => '</h3>',
	) );
    
    //Woocommerce Sidebar
    register_sidebar( array(
		'name'          => esc_html__( 'Woocommerce Widget Area', 'flipmart' ),
		'id'            => 'woocommerce',
		'description'   => esc_html__( 'Appears in woocommerce sidebar area.', 'flipmart' ),
		'before_widget' => '<div id="%1$s" class="sidebar-widget outer-bottom-small clearfix %2$s">',
		'after_widget'  => '</div><div class="clearfix"></div>',
		'before_title'  => '<h3 class="section-title">',
		'after_title'   => '</h3>',
	) );
    
    $yog_sidebars = $yog_args = array();
    $yog_footer_sidebars = 4;
   
    //Get Site Version
    $yog_site_version = yog_helper()->get_option( 'site-version', 'raw', 'v1', 'options' );
    
    //Footer Sidebar
    if( $yog_site_version == 'v7' ){
         for ( $i = 0; $i < $yog_footer_sidebars; $i++ ){
            $yog_sidebars['footer-' . ( $i + 1 )] = array(
                'name'          => esc_html__( 'Footer ', 'flipmart' ) . ( $i + 1 ),
                'description'   => esc_html__( 'A widget area loaded in the footer of the site.', 'flipmart' ),
                'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
        		'after_widget'  => '</div>',
        		'before_title'  => '<h4>',
        		'after_title'   => '</h4>',
            );
        }    
    }else{
         for ( $i = 0; $i < $yog_footer_sidebars; $i++ ){
            $yog_sidebars['footer-' . ( $i + 1 )] = array(
                'name'          => esc_html__( 'Footer ', 'flipmart' ) . ( $i + 1 ),
                'description'   => esc_html__( 'A widget area loaded in the footer of the site.', 'flipmart' ),
                'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
        		'after_widget'  => '</div></div>',
        		'before_title'  => '<div class="module-heading"><h4 class="module-title">',
        		'after_title'   => '</h4></div><div class="module-body">',
            );
        }
    }
    
    
    //Footer Sidebar.
    foreach( $yog_sidebars as $yog_id => $yog_arg ){
        $yog_args = $yog_arg;
        $yog_args['id'] = ( isset( $yog_arg[$yog_id] ) ? sanitize_key( $yog_arg[$yog_id] ) : sanitize_key( $yog_id ) );
        
        // Register the sidebar.
        register_sidebar( $yog_args );
    }    
        
}
add_action( 'widgets_init', 'yog_widgets_init' );

// Demos
add_theme_support( 'yog-demos', array(

	'flipmart-v1' => array(
		'title'       => esc_html__( 'Flipmart', 'flipmart' ),
		'description' => esc_html__( 'import complete demo of theme one version', 'flipmart' ),
		'screenshot'  => get_template_directory_uri() . '/theme/demo/flipmart-v1/screenshot.jpg',
		'preview'     => esc_url( 'http://www.ckthemes.com/flipmart/' )
	),
    
    'flipmart-v2' => array(
		'title'       => esc_html__( 'Flipmart', 'flipmart' ),
		'description' => esc_html__( 'import complete demo of theme two version', 'flipmart' ),
		'screenshot'  => get_template_directory_uri() . '/theme/demo/flipmart-v2/screenshot.jpg',
		'preview'     => esc_url( 'http://www.ckthemes.com/flipmart/v2/' )
	),
    
    'flipmart-v3' => array(
		'title'       => esc_html__( 'Flipmart', 'flipmart' ),
		'description' => esc_html__( 'import complete demo of theme three version', 'flipmart' ),
		'screenshot'  => get_template_directory_uri() . '/theme/demo/flipmart-v3/screenshot.jpg',
		'preview'     => esc_url( 'http://www.ckthemes.com/flipmart/v3/' )
	),
    
    'flipmart-v4' => array(
		'title'       => esc_html__( 'Flipmart', 'flipmart' ),
		'description' => esc_html__( 'import complete demo of theme four version', 'flipmart' ),
		'screenshot'  => get_template_directory_uri() . '/theme/demo/flipmart-v4/screenshot.jpg',
		'preview'     => esc_url( 'http://www.ckthemes.com/flipmart/v4/' )
	),
    
    'flipmart-v5' => array(
		'title'       => esc_html__( 'Flipmart', 'flipmart' ),
		'description' => esc_html__( 'import complete demo of theme five version', 'flipmart' ),
		'screenshot'  => get_template_directory_uri() . '/theme/demo/flipmart-v5/screenshot.jpg',
		'preview'     => esc_url( 'http://www.ckthemes.com/flipmart/v5/' )
	),
    
    'flipmart-v6' => array(
		'title'       => esc_html__( 'Flipmart', 'flipmart' ),
		'description' => esc_html__( 'import complete demo of theme six jewellery version', 'flipmart' ),
		'screenshot'  => get_template_directory_uri() . '/theme/demo/flipmart-v6/screenshot.png',
		'preview'     => esc_url( 'http://www.ckthemes.com/flipmart/v6/' )
	),
    
    'flipmart-v7' => array(
		'title'       => esc_html__( 'Flipmart', 'flipmart' ),
		'description' => esc_html__( 'import complete demo of theme seven rtl version', 'flipmart' ),
		'screenshot'  => get_template_directory_uri() . '/theme/demo/flipmart-v7/screenshot.png',
		'preview'     => esc_url( 'http://www.ckthemes.com/flipmart/v7/' )
	),
    
    'flipmart-v8' => array(
		'title'       => esc_html__( 'Flipmart', 'flipmart' ),
		'description' => esc_html__( 'import complete demo of theme fashion version', 'flipmart' ),
		'screenshot'  => get_template_directory_uri() . '/theme/demo/flipmart-v8/screenshot.png',
		'preview'     => esc_url( 'http://www.ckthemes.com/flipmart/v8/' )
	)
    
));

function yog_get_column( $column = '' ) {
    
    //Check
    if( empty( $column ) ){
        return;
    }
    
    //Create Column class array.
    $yog_columns = array(
        '1' => 'col-md-12',
        '2' => 'col-md-6',
        '3' => 'col-md-4',
        '4' => 'col-md-3',
        '6' => 'col-md-2',
    );
    
    return $yog_columns[$column];
}

function yog_column( $columns = ''  ){
    echo yog_get_column( $columns );
}

posts_nav_link();
paginate_links();
the_posts_pagination();
the_posts_navigation();
next_posts_link();
previous_posts_link();