<header class="header-style-1"> 
  
  <?php if( yog_helper()->get_option( 'header-top', 'raw', false, 'options' ) ){  ?>
      <div class="top-bar animate-dropdown">
        <div class="container">
          <div class="header-top-inner">
            
            <?php 
                //Top Bar Menu
                if( yog_helper()->get_option( 'header-top-sec-menu', 'raw', false, 'options' ) ){ 
                    
                    if( has_nav_menu( 'top-bar' ) ){
                        //Menu Arguments    
                        wp_nav_menu( array(
                            'container'       => 'div',
                            'container_class' => 'cnt-account',
                            'menu_class'      => 'list-unstyled',
                            'menu_id'         => '',
                            'theme_location'  => 'top-bar',
                            'walker'          => new Yog_Walker_Nav_Menu
                        ));
                    }    
                }
                
                if ( yog_helper()->get_option( 'header-top-currency', 'raw', false, 'options' ) && shortcode_exists( 'woocs' ) ) {    
            ?>
            
                <div class="cnt-account">
                  <ul class="list-unstyled currency-switcher list-inline">
                    <?php 
                        //Currecy
                        echo '<li>'. do_shortcode("[woocs width='70px' show_flags=0 ]") .'</li>';
                        
                    ?>   
                  </ul>
                </div>
            <?php } ?>
            <div class="clearfix"></div>
            
          </div> 
        </div>
      </div>
  <?php } ?>
  
  <div class="main-header">
    <div class="container">
      <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
            <?php echo yog_get_logo();  //Site Logo ?>
          </div> 
    
          <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                <?php if( yog_helper()->get_option( 'header-search-area', 'raw', false, 'options' ) ){ ?> 
                    <div class="search-area">
                        <form method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                    	    <input name="s" id="yog-search-form" class="search-field" placeholder="<?php echo esc_attr( yog_get_translation( 'tr-blog-search' ) ); ?>" />
                            <button type="submit" class="search-button" ></button>
                        </form>
                    </div>
                <?php } ?>
           </div>   
             
           <?php get_template_part( 'templates/header/shopping-cart', 'v1' ); ?>
             
        </div>
     </div>
  </div>
  
  <div class="header-nav animate-dropdown">
    <div class="container">
      <div class="yamm navbar navbar-default" role="navigation">
             <?php 
                //Define Verables.
                $yog_page_menu = $yog_menu = '';
                
                //Get Post Meta Value.
                $yog_page_menu = yog_helper()->get_option(  'flipmart_page_menu', 'raw', false, 'post' );
    
                //Responsive Menu Icon
                if( !empty( $yog_page_menu ) || has_nav_menu( 'primary' ) ){
             ?>
                <div class="navbar-header">
                   <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
                   <span class="sr-only"><?php echo esc_html__( 'Toggle navigation', 'flipmart' ); ?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="nav-bg-class">
                  <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <?php
                            if( !empty( $yog_page_menu ) ){
                                //Menu Arguments    
                                wp_nav_menu( array(
                                    'container'       => 'div',
                                    'container_class' => 'nav-outer',
                                    'menu_class'      => 'nav navbar-nav',
                                    'menu_id'         => '',
                                    'menu'            => $yog_page_menu,
                                    'walker'          => new Yog_Walker_Nav_Menu
                                ) );   
                            }elseif( has_nav_menu( 'primary' ) ){
                                //Menu Arguments    
                                wp_nav_menu( array(
                                    'container'       => 'div',
                                    'container_class' => 'nav-outer',
                                    'menu_class'      => 'nav navbar-nav',
                                    'menu_id'         => '',
                                    'theme_location'  => 'primary',
                                    'walker'          => new Yog_Walker_Nav_Menu
                                ));
                            }
                        ?>
                  </div>
                </div>
            <?php } ?>
          
        </div>
      </div>
    </div>
</header>