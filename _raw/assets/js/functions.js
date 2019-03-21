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
		var header = ($('.topbar').length) ? $('.topbar').outerHeight() + $('header').outerHeight() : $('header').outerHeight();
	    $(e).toggleClass('is-active');
	    $('html, body').stop(true, false).animate({
	        scrollTop: ($('.topbar').length) ? $(".topbar").offset().top : $("header").offset().top
	    }, 50),
	    $('html, body').toggleClass('toggle'),
	    $('.menu').toggleClass('toggle'),
	    setTimeout(function(){
	    	$('.menu').css('padding-top', header).children().toggleClass('toggle');
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
$(document).mouseup(function (e)
{
    var container = $('.menu').children();

    if (!container.is(e.target) 
        && container.has(e.target).length === 0)
    {
        closeMenu();
    }
});   
function backToTop(e) {
    $('html, body').stop(true, false).animate({
        scrollTop: ($('.topbar').length) ? $(".topbar").offset().top : $("header").offset().top
    }, 1000);
}
$(document).ready(function () {
	$('.slider').bxSlider({
		nextText: 'Próximo <i class="fas fa-caret-right"></i>',
		prevText: '<i class="fas fa-caret-left"></i> Anterior'
	});

	setTimeout(function(){
		$('.bx-prev,.bx-next').unwrap(),
		$('.bx-next').appendTo($('.bx-pager')),
		$('.bx-prev').prependTo($('.bx-pager'));
    }, 600);	
	
	$('.telefone').mask('(00) 0 0000-0000');

	$( ".thumbnail" ).each(function() {
	  $( this ).append('<div class="zoomin" style="background-image:url('+$(this).css('background-image').replace('url("','').replace('")','')+')" />');
	});

	$( ".menu a" ).each(function() {
		$( this ).click(function(event) {
			closeMenu();
		});	
	});	


});
      
      