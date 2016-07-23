/*!
 * Custom JS
 * @package AcmeThemes
 * @subpackage SuperNews
 */
jQuery(document).ready(function($) {
    $('.header-wrapper .menu').slicknav({
        allowParentLinks :true,
        duration: 500,
        prependTo: '.header-wrapper .responsive-slick-menu',
        easingOpen: "swing",
        'closedSymbol': '+',
        'openedSymbol': '-'
    });
    // ticker
    $('.bn').show().bxSlider({
        speed: 1000,
        auto: true,
        controls: false,
        pager: false,
        autoHover : true,
        mode:'fade'
    });

    //for menu
    $('.header-wrapper #site-navigation .menu-main-menu-container').addClass('clearfix');
    jQuery('.menu-item-has-children > a').click(function(){
        var at_this = jQuery(this);
        if( at_this.hasClass('at-clicked')){
            return true;
        };
        var at_width = jQuery(window).width();
        if( at_width > 992 && at_width <= 1230 ){
            at_this.addClass('at-clicked');
            return false;
        }
    });
});