<?php
$demos = get_theme_support( 'yog-demos' );
print_r( $demos );
?>
<div class="yog-wrap">

	<div class="yog-dashboard">
        
		<?php require_once( get_template_directory().'/yog/admin/views/yog-header.php' ); ?>

		<div class="tab-content">
            <?php yog_action( 'before_admin_panel' ); ?>
			<div id="yog-general" role="tabpanel" class="yog-tab-pane yog-tab-is-active">

				<ul class="yog-cards-container clearfix">
                  
                  <li class="yog-card on-half">
                     <div class="yog-card-inner">
                        <p><?php echo esc_html__( 'We are a creative web design that specialized in WordPress and create awesome WordPress Theme to meet anyone needs. We are smart, intelligent, talented and best of all, we are super passionate about our work.', 'flipmart' )?></p>
                        <p><?php echo esc_html__( 'With our lots of talent and experience, we combine beautiful, modern designs with clean, functional code to produce stunning websites. A product that we offer help and guidance in using to each of our customers.', 'flipmart' ); ?></p>
                        <p><?php echo esc_html__( 'Follow us to stay up to date with our latest and greatest. We are working hard to bring you some perfect themes!', 'flipmart' ); ?></p>
                        <h2><?php echo esc_html__( 'Dedicated Support System', 'flipmart' ); ?></h2>
                        <p><?php echo esc_html__( 'We are always happy to help and we value our customers. All our files come with User Manual prepared specifically for each product, these help files are located inside your download packages.', 'flipmart' )?></p>
                        <div class="yog-card-footer clearfix">
                           <a class="yog-button" href="https://themeforest.net/user/ckthemes" target="_blank"><img src="<?php echo esc_url( yog()->load_assets( 'img/envato.png' ) ); ?>" alt="" /></a> 
                        </div>
                     </div>
                  </li>
                  
                  <li class="yog-card">
                     <div class="yog-card-inner">
                        <div class="yog-icon-container">
                           <i class="text-gradient fa fa-life-ring"></i>
                        </div>
                        <h3><?php echo esc_html__( 'Support Forums', 'flipmart' ) ?></h3>
                        <div class="yog-status yog-status-is-active">
                           <span><?php echo esc_html__( 'Community', 'flipmart' ) ?></span>
                        </div>
                        <div class="yog-card-footer clearfix">
                           <a class="yog-button" href="<?php echo esc_url( yog_helper()->yog_support_fourm_url() ); ?>" target="_blank"><span><?php echo esc_html__( 'Go to forums', 'flipmart' ) ?></span> <i class="fa fa-angle-right"></i></a>
                        </div>
                     </div>
                  </li>

                  <li class="yog-card">
                     <div class="yog-card-inner">
                        <div class="yog-icon-container">
                           <i class="text-gradient fa fa-file-text-o"></i>
                        </div>
                        <h3><?php echo esc_html__( 'Documentation', 'flipmart' ) ?></h3>
                        <div class="yog-status yog-status-is-active">
                           <span><?php echo esc_html__( 'Knowledge Base', 'flipmart' ) ?></span>
                        </div>
                        <div class="yog-card-footer clearfix">
                           <a class="yog-button" href="<?php echo esc_url( yog_helper()->yog_online_documentation_url() ); ?>" target="_blank"><span><?php echo esc_html__( 'Read Documentation', 'flipmart' ) ?></span> <i class="fa fa-angle-right"></i></a>
                        </div>
                     </div>
                  </li>

               </ul>
               <?php yog_action( 'after_admin_panel' ); ?>
			</div>

			<div id="yog-demos" role="tabpanel" class="yog-tab-pane">

				<?php if( !empty( $demos ) && class_exists('Yog_Addons') ) : ?>
					<ul class="yog-cards-container clearfix">
					<?php foreach( $demos as $id => $demo ): ?>
						<li class="yog-card yog-card-demo yog-card-is-active">
							<div class="yog-card-inner">
								<div class="yog-icon-container">
		                           <img src="<?php echo esc_url( $demo['screenshot'] ); ?>" alt="<?php echo esc_html( $demo['title'] ) ?>" />
		                        </div>
		                        <h3><?php echo esc_html( $demo['title'] ) ?></h3>
                                <div class="demo-loader" style="display: none;"></div>
                                <p><?php echo esc_html( $demo['description'] ); ?></p>
		                        <div class="yog-card-footer clearfix">
		                           <a class="yog-button" href="<?php echo esc_url( $demo['preview'] ); ?>" target="_blank"><span><?php echo esc_html__( 'Preview', 'flipmart' ) ?></span> <i class="fa fa-angle-right"></i></a>
		                           <a class="yog-button importer-btn" href="<?php echo admin_url( 'admin.php?page=yog&yog-import-demo='. $id ) ?>"><span><?php echo esc_html__( 'Import Demo', 'flipmart' ) ?></span> <i class="fa fa-angle-right"></i></a>
		                        </div>
		                    </div>
						</li>
					<?php endforeach; ?>
					</ul>
                <?php else: ?>   
                    <div class="notice demo inline notice-warning notice-alt"><p><?php echo esc_html__( 'Please install / activate Flipmart Core Addons plugin after that you can import theme demo contents', 'flipmart' )?></p></div> 
				<?php endif; ?>
			</div>
            
            <div id="yog-changelog" role="tabpanel" class="yog-tab-pane">
                <h3>1.7</h3>
                <p><strong>Released: 2th March 2018</strong></p>
                <p><strong>Update</strong></p>
                <ul>
                    <li>WooCommerce plugin overriding templates are updated in theme</li>
                    <li>Demo files updated</li>
                </ul>
                <p><strong>Bug Fixed</strong></p>
                <ul>
                    <li>Product carousel slider divide by zero error fixed</li>
                    <li>Product visual composer elements category selection issue fixed</li>
                </ul>
                <p><strong>New Features</strong></p>
                <ul>
                    <li>Product New Badge Settings added in WooCommerce Product setting</li>
                    <li>Products Autocomplete Search feature added in search form</li>
                    <li>Number of products display limit field added in theme option for the search result page</li>
                    <li>Visual Composer element ( Product categoy & Product categories ) modify </li>
                    <li>Visual Composer element ( Flipmart Image Banner ) modify make it complately clickable </li>
                </ul>
                <h3>1.6</h3>
                <p><strong>Released: 31th January 2018</strong></p>
                <p><strong>Update</strong></p>
                <ul>
                    <li>WooCommerce plugin overriding templates are updated in theme</li>
                </ul>
                <h3>1.5</h3>
                <p><strong>Released: 24th January 2018</strong></p>
                <p><strong>Bug Fixed</strong></p>
                <ul>
                    <li>Single variation product image selection on variation</li>
                    <li>Feature Product visual composer element display issue</li>
                    <li>Header mini cart ajax update issue fixed</li>
                    <li>Theme responsive issues</li>
                </ul>
                <p><strong>New Features</strong></p>
                <ul>
                    <li>New demo layout ( Fashion ) added</li>
                </ul>
                <p><strong>Update</strong></p>
                <ul>
                    <li>Visual Composer Plugin updated to latest one</li>
                    <li>Demo Data Content XML file updated</li>
                </ul>
                <h3>1.4</h3>
                <p><strong>Released: 18th December 2017</strong></p>
                <p><strong>Bug Fixed</strong></p>
                <ul>
                    <li>Single product thumbnail image zoom out issue</li>
                    <li>Flipmart: Category Accordion widget display issue</li>
                    <li>Flipmart: Product Hot Deals widget product limit field remove</li>
                    <li>Product search result page display issue</li>
                    <li>Multi level menu display issue</li>
                    <li>WooCommerce variation product select box style issue</li>
                </ul>
                <p><strong>Update</strong></p>
                <ul>
                    <li>WooCommerce Currency Switcher pro version is updated to latest one</li>
                    <li>WooCommerce Plugin theme template files updated to latest one</li>
                    <li>Visual Composer Plugin updated to latest one</li>
                    <li>Demo Data Content XML file updated</li>
                </ul>
                <h3>1.3</h3>
                <p><strong>Released: 21nd October 2017</strong></p>
                <p><strong>Bug Fixed</strong></p>
                <ul>
                    <li>Single product thumbnail image size issue</li>
                    <li>Visual composer element ( Flipmart Image Banner ) responsive device font size</li>
                    <li>Hot product date picker rtl issue</li>
                    <li>Top Bar menu login and logout link issue</li>
                    <li>Product Search Widget Style</li>
                    <li>Theme Options custom css addition issue</li>
                    <li>Style Switcher front end js console error</li>
                </ul>
                <p><strong>New Features</strong></p>
                <ul>
                    <li>New demo layout ( Jewellery ) added</li>
                    <li>Envato Toolkit Master plugin is include in recommended plugin for theme update</li>
                    <li>Few new videos added in <a href="https://www.youtube.com/watch?v=uO91k9s6vM0&index=1&list=PLYp76EP6RhnwOkp-TsZD8yFML1O1GPCIn" target="_blank">Youtub video tutorial series</a> </li>
                </ul>
                <p><strong>Update Plugins</strong></p>
                <ul>
                    <li>WooCommerce Currency Switcher pro version is updated to latest one</li>
                    <li>WooCommerce Plugin theme template files updated to latest one</li>
                    <li>Visual Composer Plugin updated to latest one</li>
                </ul>    
                <h3>1.2</h3>
                <p><strong>Released: 26th September 2017</strong></p>
                <p><strong>Bug Fixed</strong></p>
                <ul>
                    <li>Product grid columns extra space</li>
                    <li>Top bar menu login link redirect issue</li>
                    <li>Shop categories display issue</li>
                    <li>Theme options logo display issue</li>
                    <li>editor-style-rtl.css file admin area notification issue</li>
                    <li>Product Hot Deals widget date counter issue</li>
                    <li>One click demo importer improve</li>
                    <li>Unused images remove from demo data</li>
                    <li>Contact Form Seven summation email fields data issue</li>
                </ul>
                <p><strong>New Features</strong></p>
                <ul>
                    <li>Front end color style switcher</li>
                    <li>Theme options multi color skins generator</li>
                    <li>Boxed and Wide layout support</li>
                    <li>New RTL demo added</li>
                    <li>Single product slider images zoom out affect</li>
                    <li>Ajax based dropdown menu mini cart</li>
                    <li>WooCommerce Currency Switcher pro version included</li>
                    <li>Popup Plugin For WordPress - ConvertPlus pro version included</li>
                    <li>Visual Composer latest version included</li>
                    <li>New changelog tab added in theme dashboard</li>
                    <li><a href="https://www.youtube.com/watch?v=uO91k9s6vM0&index=1&list=PLYp76EP6RhnwOkp-TsZD8yFML1O1GPCIn" target="_blank">Youtub video tutorial series</a> released and its link added in theme dashboard</li>
                    <li>All demo content updated</li>
                </ul>
                <h3>1.1</h3>
                <p><strong>Released: 21th September 2017</strong></p>
                <ul>
                    <li>Currency switcher dropdown css issues fixed</li>
                    <li>Demo content updated</li>
                </ul>
                <h3>1.0</h3>
                <p><strong>Released: 12th September 2017</strong></p>
                <ul>
                    <li>Initial Flipmart WordPress Theme release</li>
                </ul>
            </div>

		</div>

	</div>

</div>
