/* global supermarket_ecommerceScreenReaderText */
/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */

jQuery(function($){
 "use strict";
   jQuery('.main-menu-navigation > ul').superfish({
     delay:       500,
     animation:   {opacity:'show',height:'show'},
     speed:       'fast'
   });
   jQuery('.lines-button').click(function(){
       jQuery('#topmenu').toggleClass('opened')
   })
   jQuery('#danh-muc-link').click(function(){
       jQuery('.sub-menu').toggleClass('opened')
   })
});

function resMenu_open() {
	document.getElementById("sidelong-menu").style.width = "250px";
}
function resMenu_close() {
	document.getElementById("sidelong-menu").style.width = "0";
}

(function( $ ) {

	$(document).ready(function(){
		$(".product-cat").hide();
	    $("button.product-btn").click(function(){
	        $(".product-cat").toggle();
	    });
	});

})( jQuery );
