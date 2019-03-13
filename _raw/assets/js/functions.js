var menu = false;
function convertToSlug(Text)
{
    return Text
        .toLowerCase()
        .replace(/[^\w ]+/g,'')
        .replace(/ +/g,'-')
        ;
}
function mobileNavigation(e) {
	if(!menu){
		menu = true;
	    $(e).toggleClass('is-active');
	    $('html, body').stop(true, false).animate({
	        scrollTop: ($('.topbar').length) ? $(".topbar").offset().top : $("header").offset().top
	    }, 50),
	    $('html, body').toggleClass('toggle'),
	    $('.menu').toggleClass('toggle'),
	    setTimeout(function(){
	    	$('.menu').children().toggleClass('toggle');
	    }, 1000);
	}
}
function closeMenu() {
	if(menu){
		menu = false;
		$('.menu').children().removeClass('toggle'),
	    $('.is-active').removeClass('is-active'),
	    setTimeout(function(){
		    $('html, body, .menu').removeClass('toggle');
	    }, 500);	    
	}
}
$(window).on("resize",function(o){
	closeMenu();
});
function backToTop(e) {
    $('html, body').stop(true, false).animate({
        scrollTop: ($('.topbar').length) ? $(".topbar").offset().top : $("header").offset().top
    }, 1000);
}
$(document).ready(function () {

	$('.slider').bxSlider({
		nextText: 'Próximo &#9654;',
		prevText: '&#9664; Anterior'
	});

	$('.bx-prev,.bx-next').unwrap(),
	$('.bx-next').appendTo($('.bx-pager')),
	$('.bx-prev').prependTo($('.bx-pager'));
	
	$('.telefone').mask('(00) 0 0000-0000');
});
      
      