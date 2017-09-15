import './search.scss';

var hover_block = $('.hover_div');
var form_block =  $('.formasearch-block');
var speed = 400;

$('.btn_search').on('click', function(e){
    e.preventDefault();
    hover_block.fadeIn(speed);
    form_block.css({'top':0});
    $('.serchBox').focus(); 

});
hover_block.on('click', function(){
    if($(this).is(':visible')){
        $(this).fadeOut(speed);
        form_block.css({'top':'-100%'});
    }
});
