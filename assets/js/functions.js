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
	        scrollTop: $("header").offset().top
	    }, 300),
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
$(window).on("resize scroll",function(o){
	closeMenu();
});
function backToTop(e) {
    $('html, body').stop(true, false).animate({
        scrollTop: $("header").offset().top
    }, 1000);
}
$(document).ready(function () {
	$('.carousel-holder').slick({
		dots: true,
	})
	.append('<div class="carousel-nav"/>')
	.find('.slick-arrow').appendTo($('.carousel-nav')),	
	$( ".slick-dots, .carousel-nav" ).wrapAll('<div class="carousel-footer"/>'),
	$('.slick-arrow.slick-prev').html('<i class="fal fa-angle-left"/> Anterior'),
	$('.slick-arrow.slick-next').html('Próximo <i class="fal fa-angle-right"/>');
	$( ".o-que-fazemos-menu a" ).each(function() {
		$(this).click(function(event) {
			event.preventDefault();

			var slug = convertToSlug($(this).text()),
				el = $('#'+slug);

			if($('body').is('.pg-interna')){
				if(el.length){
				    $('html, body').stop(true, false).animate({
				        scrollTop: el.offset().top
				    }, 1000);	
				}
			} else {
				window.location = window.location.origin + '/o-que-fazemos.html#' + slug;
			}
		});
	});
});
      
      