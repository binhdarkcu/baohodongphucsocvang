//Menu Init
ddsmoothmenu.init({
    mainmenuid: "menu", //menu DIV id
    orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
    classname: 'ddsmoothmenu', //class added to menu's outer DIV
    //customtheme: ["#1c5a80", "#18374a"],
    contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
});
//Flexslider
//<![CDATA[
jQuery.noConflict();
jQuery("document").ready(function () {
    jQuery('.flexslider').flexslider({
        animation: "fade", //String: Select your animation type, "fade" or "slide"
        slideDirection: "horizontal", //String: Select the sliding direction, "horizontal" or "vertical"
        slideshow: true, //Boolean: Animate slider automatically
        slideshowSpeed: jQuery("#txt_slidespeed").val(), //Integer: Set the speed of the slideshow cycling, in milliseconds
        animationDuration: 600, //Integer: Set the speed of animations, in milliseconds
        directionNav: true, //Boolean: Create navigation for previous/next navigation? (true/false)
        controlNav: false, //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
        keyboardNav: true, //Boolean: Allow slider navigating via keyboard left/right keys
        mousewheel: false, //Boolean: Allow slider navigating via mousewheel
        prevText: "Previous", //String: Set the text for the "previous" directionNav item
        nextText: "Next", //String: Set the text for the "next" directionNav item
        pausePlay: false, //Boolean: Create pause/play dynamic element
        pauseText: 'Pause', //String: Set the text for the "pause" pausePlay item
        playText: 'Play', //String: Set the text for the "play" pausePlay item
        randomize: false, //Boolean: Randomize slide order
        slideToStart: 0, //Integer: The slide that the slider should start on. Array notation (0 = first slide)
        animationLoop: true, //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
        pauseOnAction: true, //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
        pauseOnHover: true
    });
});
//]]>  
//Tab Slider
jQuery.noConflict();
jQuery(document).ready(function () {
    // Smart Tab
    jQuery('#tabs').smartTab({autoProgress: false, stopOnFocus: true, transitionEffect: 'vSlide'});
});
jQuery(document).ready(function () {
    var uform = jQuery('.feature_home_widget');
    if (uform.length) {
        jQuery('iframe[src^="http://www.formget.com/app/embed/"]').addClass('form_iframe');
    }
});
/**
 * Adjust height of featurebox container
 * @param {type} param
 */
jQuery(window).resize(function () {
    var tab1_height = jQuery('.tabAnchor').height();
    jQuery('div.stContainer').css({'min-height': tab1_height});
});
jQuery(window).load(function () {
    var tab1_height = jQuery('.tabAnchor').height();
    jQuery('div.stContainer').css({'min-height': tab1_height});
});
jQuery(document).ready(function () {
    jQuery('div.ddsmoothmenu').meanmenu({
        'meanScreenWidth': '991'
    });
});
jQuery(document).ready(function () {
    if (jQuery(window).width() > 767) {
        jQuery('div.blog').masonry({
            "itemSelector": "div.post",
        });
    }
});
jQuery(window).load(function () {
    if (jQuery(window).width() > 767) {
        jQuery('div.blog').masonry({
            "itemSelector": "div.post",
        });
    }
});
jQuery(window).resize(function () {
    if (jQuery(window).width() > 767) {
        jQuery('div.blog').masonry({
            "itemSelector": "div.post",
        });
    }
});
// Destroy effect of masonry in large screen
jQuery(window).resize(function () {
    if (jQuery(window).width() < 768) {
        jQuery('div.blog').masonry().masonry('destroy');
    }
});
// Gallery template
jQuery(window).load(function () {
    jQuery('#container').masonry({
        "itemSelector": ".item",
        "columnWidth": ".grid-sizer",
    });
});
// Gallery shortcode
jQuery(window).load(function () {
    if (jQuery(window).width() < 992) {
        jQuery('div.gallery').masonry({
            "itemSelector": ".gall-img-section",
            "columnWidth": ".grid-sizer-gal",
        });
    }
});
jQuery(window).resize(function () {
    if (jQuery(window).width() < 992) {
        jQuery('div.gallery').masonry({
            "itemSelector": ".gall-img-section",
            "columnWidth": ".grid-sizer-gal",
        });
    }
});
// Destroy effect of masonry in large screen
jQuery(window).resize(function () {
    if (jQuery(window).width() > 992) {
        jQuery('div.gallery').masonry().masonry('destroy');
    }
});
//Zoombox
jQuery(function () {
    jQuery('dt.gallery-icon a').zoombox();
});
jQuery(function () {
    jQuery('a.zoombox').zoombox();
});
