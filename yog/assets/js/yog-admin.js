( function ($) {

   var yogAdmin = {

      init: function() {
         this.initTabs();
      },

      initTabs: function() {

         var navItem = $('.yog-nav-tabs').children('li'),
            tabPane = $('.yog-tab-pane').hide(),
            currentHashURL = document.location.hash;

         $('.yog-tab-pane.yog-tab-is-active').show();

         navItem.on('click', 'a[href^="#"]:not([href="#"])', function(e) {
            var $this = $(this),
               targetPane = $this.attr('href');

            if ( ! $(targetPane).length ) {
               return;
            }

            e.preventDefault();

            $(targetPane).show()
                         .siblings().hide();

            $this.parent().addClass('is-active')
                          .siblings().removeClass('is-active');
         });

         if ( currentHashURL === "" || ! navItem.children('a').filter("[href*='" + currentHashURL + "']").length ) return;

         $(currentHashURL).show().siblings().hide();

         navItem.children('a').filter("[href*='" + currentHashURL + "']").trigger("click");

         $('body, html').stop().animate({
            scrollTop: navItem.parents('.yog-nav-tabs').offset().top
         });

      }

   };

   jQuery(document).ready(function() {
      yogAdmin.init();
      
      //Color generator
       $( '#btn-skin-generator-buttonset1' ).on('click', function(event) {
    
            event.preventDefault();
            
    		// ajax reset request goes from here
    		var d = {
    			action: 'yog_skin_generator',
    			skin_name: $('#color-name' ).val(),
    			skin_color: $('#color-color' ).val(),
                skin_sec_color: $('#skin-sec-color-color' ).val()
    		};
    		$.post(ajaxurl, d, function(r) {
    			if (r != -1) {
                    location.reload();  
    			}
    		});
    
    		return false;
    	});
    
        $( '.skin-remove-item' ).on('click', function(event) {
    
            event.preventDefault();
    
    		// ajax reset request goes from here
    		var d = {
    			action: 'yog_skin_remove',
    			skin_name: $(this).data('name')
    		};
    		$.post(ajaxurl, d, function(r) {
    			if (r != -1) {
                    location.reload();
    			}
    		});
    
    		return false;
    	});
   });
   
   $( '.importer-btn' ).on( 'click', function(e){
      // Confirm message
      var message = 'Import Demo Content?';
      var r = confirm(message);
      if (r == false){
        e.preventDefault();     
        return; 
      } 
     
      var $this = $(this);
      $this.parents('.yog-card-inner').find( '.demo-loader' ).css('display', 'inline-block');
   });
   
}) (jQuery);
