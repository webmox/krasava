import './header.scss';


// var  bg_body = $('.bg_body');
//
// $(window).on('scroll', function(){
//     var scroll_top = $(this).scrollTop();
//     var move_top = -scroll_top/3;
//
//     bg_body.css({top:move_top+'px'});
//
// // });
//
// var content_block = $('.main-container');
// var posContainer = content_block.offset().top;
// var nav_block = $('.nav_menu');
// var nav_block_h = nav_block.outerHeight();
// var startFix = posContainer - 30;
// var body = $('body');
//
//
//
// $(window).on('scroll', function(e){
//     e.preventDefault();
//     /*--------получаем текущее значение скролла*/
//     var $this = $(this),
//         scrollTop = $this.scrollTop();
//
//     /*---------Если проехали меню задвигаем меню за верхнюю область экрана--------*/
//     if(scrollTop >= startFix && startFix <= posContainer){
//         nav_block.addClass('transform_menu');
//         body.css({'padding-top':nav_block_h+'px'});
//     }else{
//         nav_block.removeClass('transform_menu');
//         body.css({'padding-top':0});
//     }
//
//     /*-------------------Доехали до контентной области показываем меню-----------------*/
//     if(scrollTop >= posContainer){
//         nav_block.addClass('fixed');
//     }else{
//         nav_block.removeClass('fixed');
//     }
// });