<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1 f-header"> 
  
  <?php if( yog_helper()->get_option( 'header-top', 'raw', false, 'options' ) ):  ?>  
      <!-- ============================================== TOP MENU : END ============================================== -->
      <div class="main-header">
          <div class="container">
             <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
                    <?php echo yog_get_logo( array( 'yog_container_class' => 'logo' ) );  //Site Logo ?>  
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 top-search-holder"> 
                    <?php if( yog_helper()->get_option( 'header-search-area', 'raw', false, 'options' ) ): ?> 
                        <div class="search-area">
                            <form method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                                <div class="control-group">
                                    <input name="s" id="yog-search-form" class="search-field" placeholder="<?php echo esc_attr( yog_get_translation( 'tr-blog-search' ) ); ?>" />
                                    <button type="submit" class="search-button"></button> 
                                </div>
                            </form>
                        </div>
                    <?php endif; ?>
                 </div>    
                 <div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row"> 
                
                    <?php get_template_part( 'templates/header/shopping-cart', 'v2' ); ?>
                    <div class="user-login">
                        <?php if (is_user_logged_in()): ?>
                            <a href="<?php echo esc_url( wp_logout_url( home_url( '/' ) ) ); ?>"><i class="fa fa-user" aria-hidden="true"></i> <?php echo esc_html__( 'Logout', 'flipmart' ); ?></a>
                        <?php else: ?>
                            <a href="<?php echo esc_url(  wp_login_url( home_url( '/' ) ) ); ?>"><i class="fa fa-user" aria-hidden="true"></i> <?php echo esc_html__( 'Login', 'flipmart' ); ?></a>
                        <?php endif; ?>
                    </div>          
                </div>
             </div>
          </div>
      </div>
  <?php endif; ?>
      
  <!-- ============================================== NAVBAR ============================================== -->
  <div class="header-nav animate-dropdown">
    <div class="container">
      <div class="yamm navbar navbar-default" role="navigation">
        <div class="navbar-header">
            <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
                <span class="sr-only"><?php echo esc_html__( 'Toggle navigation', 'flipmart' ); ?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> 
            </button>
        </div>
        <div class="nav-bg-class">
          <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
              <?php 
                 //Define Verables.
                 $yog_page_menu = $yog_menu = '';
                
                 //Get Post Meta Value.
                 $yog_page_menu = yog_helper()->get_option(  'flipmart_page_menu', 'raw', false, 'post' );
                 
                 
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
                  
                  //Phone Number
                  if( $yog_phone = yog_helper()->get_option( 'header-phone' ) ):  
              ?>
                <div class="phone-section">
                    <?php printf( '<a href="tel:%s" class="white"><i class="fa fa-phone" aria-hidden="true"></i><span>%s : %s</span></a>', $yog_phone, esc_html__( 'Call us', 'flipmart' ), $yog_phone  ); ?>
                </div>
              <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div> 
  <!-- ============================================== NAVBAR : END ============================================== --> 
  
</header>