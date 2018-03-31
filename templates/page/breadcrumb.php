<?php
    //Get Post Meta Value.
    $yog_breadcrumb_enable_page   = yog_helper()->get_option( 'page-breadcrumb-enable', 'raw', false, 'post' );
    $yog_breadcrumb_enable_option = yog_helper()->get_option( 'breadcrumb-enable' ); 
    if( 1 != $yog_breadcrumb_enable_page && is_page() ){ 
        echo '<div class="outer-top-xs"></div><div class="clearfix"></div>';
        return;
    }elseif( 1 != $yog_breadcrumb_enable_option && 1 != $yog_breadcrumb_enable_page ){
        echo '<div class="outer-top-xs"></div><div class="clearfix"></div>';
        return;
    }
?>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<?php                    
                    if(function_exists('bcn_display')) {
                        bcn_display_list();
                    }  
                ?>
			</ul>
		</div>
	</div>
</div>