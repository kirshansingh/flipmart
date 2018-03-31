<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); 
    
    //Breadcrumb
    get_template_part('templates/page/breadcrumb');
    
    //Single Layout.  
    $yog_sidebar = yog_helper()->get_option( 'blog-archive-enable-global', 'raw', false, 'options' ); 
    $yog_layout  = yog_helper()->get_option( 'blog-archive-sidebar-position', 'raw', 'right' );
    $yog_layout  = ( isset( $yog_sidebar ) && !empty( $yog_sidebar ) )? $yog_layout : 'full';
    $yog_class   = array( 'full' => 'col-md-12', 'left' => 'col-md-9', 'right' => 'col-md-9' );

    ?>
    <div class="container">
        <div class="blog-page">
            <div class="row">
         
                <?php if( 'left' == $yog_layout && isset( $yog_sidebar ) && !empty( $yog_sidebar ) ){ ?>
                    <div class="col-md-3 sidebar">
                        <div class="sidebar-module-container">
                            <?php 
                                if( is_active_sidebar( yog_helper()->get_option( 'blog-archive-sidebar', 'raw', 'primary', 'options' ) ) ):
                                    dynamic_sidebar( yog_helper()->get_option( 'blog-archive-sidebar', 'raw', 'primary', 'options' ) ); 
                                endif;
                            ?>
                        </div>
                    </div>
                <?php } ?>
        
                <div class="<?php echo esc_attr( $yog_class[$yog_layout] ); ?>">
                    <?php
                        if ( have_posts() ) :
                        
                            //Counter
                            $yog_counter = 1;
                            
                            // Start the loop.
                    		while ( have_posts() ) : the_post();
                                
                                //Animation
                                $yog_animation = yog_helper()->get_option( 'blog-animation', 'raw', false, 'options' );
                                $yog_delay     = yog_helper()->get_option( 'blog-delay', 'raw', false, 'options' );
                                
                                //Class
                                $yog_extra_class = ( $yog_counter != 1 )? 'blog-post outer-top-bd' : 'blog-post';
                                ?>
                                
                            	<div <?php yog_helper()->attr( 'post', array( 'class' => $yog_extra_class, 'data-animation' => $yog_animation, 'data-animation-delay' => $yog_delay ) ); ?>>
                                
                                    <?php 
                                        //Image
                                        if( has_post_thumbnail() ):
                                            printf( '<a href="%s">%s</a>', get_permalink(), get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'img-responsive' ) ) );
                                        endif;
                                        
                                        //Title
                                        the_title( '<h1 class="post-title"><a href="'. get_permalink() .'">', '</a></h1>' ); 
                                        
                                        //Author
                                        printf( '<span class="author"><a href="%s">%s</a></span>', get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ), get_the_author() );
            
                                        //Comments
                                        $yog_num_comments = get_comments_number(); 
                                        if( $yog_num_comments != 1 ){
                                            printf( '<span class="review"><a href="%s">%s %s</a></span>', get_comments_link(), number_format_i18n( $yog_num_comments ), esc_html( yog_get_translation( 'tr-blog-comments' ) ) );
                                        }else{
                                            printf( '<span class="review"><a href="%s">%s %s</a></span>', get_comments_link(), number_format_i18n( $yog_num_comments ), esc_html( yog_get_translation( 'tr-blog-comment' ) ));
                                        }
                                        
                                        //Date
                                        printf( '<span class="date-time"><a href="%s">%s</a></span>', get_permalink(), get_the_time( get_option( 'date_format' ) ) );
                                    
                                        //Tag 
                                        the_tags( '<span '. yog_helper()->get_attr( 'entry-terms', array( 'taxonomy' => 'post_tag' ) ) .'><i class="fa fa-folder-open-o"></i> ', ', ', '</span>' ); 
                                        
                                        //Category
                                        the_terms( get_the_ID(), 'category', '<span '. yog_helper()->get_attr( 'entry-terms', array( 'taxonomy' => 'post_tag' ) ) .'><i class="fa fa-tags"></i> ', ', ', '</span>' );
                                        
                                        //Excerpt
                                        echo yog_get_excerpt( array( 'yog_before_text' => '<div class="post-content"><p>', 'yog_after_text' => '</p></div>', 'yog_class' => 'btn btn-upper btn-primary read-more' ) );
                                    
                                        //Page Pagination
                                        wp_link_pages( array(
                            				'before'      => '<div class="clearfix blog-pagination filters-container"><div class="text-right"><div class="pagination-container"><ul class="list-inline list-unstyled"><li>',
                            				'after'       => '</li></ul></div></div></div>',
                            				'link_before'      => '',
                                            'link_after'       => '',
                                            'next_or_number'   => 'number',
                                            'separator'        => '</li><li>',
                                            'nextpagelink'     =>   esc_html__( 'Next', 'flipmart' ),
                                            'previouspagelink' =>   esc_html__( 'Previous', 'flipmart' ),
                                            'pagelink'         => '%',
                            			) );
                                    ?>
                                </div>
                                
                                <?php
                                
                                //Counter
                                $yog_counter++;
                    
                    		// End the loop.
                    		endwhile;
                            
                            //Pagination
                            yog_wp_paginate( array( 'before' => '<div class="clearfix blog-pagination filters-container" '. yog_helper()->get_attr( false, array( 'data-animation' => $yog_animation, 'data-animation-daley' => $yog_delay ) ) .'><div class="text-right"><div class="pagination-container">', 'after' => '</div></div></div>', 'class' => 'list-inline list-unstyled', 'title' => false, 'nextpage' => '<i class="fa fa-angle-right"></i>', 'previouspage' => '<i class="fa fa-angle-left"></i>' ) );    
                    
                    	// If no content, include the "No posts found" template.
                    	else :
                    		get_template_part( 'templates/page/content', 'none' );
                    
                    	endif;
                    ?>
                </div>
        
                <?php if( 'right' == $yog_layout && isset( $yog_sidebar ) && !empty( $yog_sidebar ) ){ ?>
                    <div class="col-md-3 sidebar sidebar-left">
                        <div class="sidebar-module-container">
                            <?php 
                                if( is_active_sidebar( yog_helper()->get_option( 'blog-archive-sidebar', 'raw', 'primary', 'options' ) ) ):
                                    dynamic_sidebar( yog_helper()->get_option( 'blog-archive-sidebar', 'raw', 'primary', 'options' ) ); 
                                endif;
                            ?>
                        </div>
                    </div>
                <?php } ?>
                   
            </div>
        </div>
     </div>    
    <?php
 get_footer(); 
