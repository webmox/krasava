
import './mobmenu.scss';

var nav_menu_mob = $('.nav_menu_mob');

$('.menu_btn').on('click', function(e){
    e.preventDefault();
    var $this = $(this),
        hamburger = $this.find('.hamburger');

        hamburger.toggleClass('active');

    if(hamburger.hasClass('active')){
        nav_menu_mob.stop(true, false).slideDown(400);
    }else{
        nav_menu_mob.stop(true, false).slideUp(400);
    }
});

if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) && $(window).width() <= 992 ) {

    var mobile_section = $('.wrap_mobile_section');
    var height_mob = mobile_section.outerHeight();

    $(window).on('scroll', function(){
        var $this = $(this),
            w_scroll = $this.scrollTop();

        if(w_scroll >= height_mob){
            mobile_section.addClass('prev_fix');
            $('body').css({'margin-top':height_mob+'px'});
        }else{
            mobile_section.removeClass('prev_fix');
            $('body').css({'margin-top':0});
        }

        if(w_scroll >= height_mob+30){
            mobile_section.addClass('menu_fix');
        }else{
            mobile_section.removeClass('menu_fix');
        }
    });

}


