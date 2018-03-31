<?php
//Skin Create
add_action( 'wp_ajax_yog_skin_generator', 'yog_skin_generator' );
add_action('wp_ajax_nopriv_yog_skin_generator', 'yog_skin_generator');

//Skin Remove
add_action( 'wp_ajax_yog_skin_remove', 'yog_skin_remove' );
add_action('wp_ajax_nopriv_yog_skin_remove', 'yog_skin_remove');

function yog_skin_generator() {
    
    $name           = $_POST['skin_name'];
    $color          = $_POST['skin_color'];
    $skin_sec_color = $_POST['skin_sec_color'];

    if( empty( $name ) || empty( $color ) ) die();

    // generate filename
    $filename = yog_helper()->yog_uglify( $name );
    $skin     = get_template_directory() . '/assets/less/skin.less';
    $css      = get_template_directory() . '/assets/css/skins/' . $filename . '.css';

    // Delte previous file
    if( file_exists( $css ) ) unlink( $css );


    // LESS
    require_once( get_template_directory().'/yog/libs/class-lessc.php' );
    
    $less = new lessc;
    $less->setFormatter( 'compressed' );
    $less->setVariables( array(
        'skinColor' => $color,
        'skinSecColor' => $skin_sec_color
    ) );

   $result = $less->compileFile( $skin, $css );

    if( $result ) {
        
        $skins = get_option( '_yog_skins' );
        $skins = $skins ? $skins : array();
        $skins[$filename] = array(
            'name' => $name,
            'color' => $color,
            'skinSecColor' => $skin_sec_color
        );

        update_option( '_yog_skins', $skins );
    }

    // Refresh page
    echo 'window.location = "' . $_SERVER['HTTP_REFERER'] . '";';

    // Exit
    die();
}



function yog_skin_remove( ) {
  
    //File Name
    $filename = $_POST['skin_name'];
    
    //Check
    if( empty( $filename ) ) die();

    // generate filename
    $css = get_template_directory() . '/assets/css/skins/' . $filename . '.css';

    // Delte previous file
    unlink( $css );

    $skins = get_option( '_yog_skins' );
    unset( $skins[$filename] );
    update_option( '_yog_skins', $skins );

    // Refresh page
    echo 'window.location = "' . $_SERVER['HTTP_REFERER'] . '";';

    // Exit
    die();
}