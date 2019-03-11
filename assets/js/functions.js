var menu = false;

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
function closeMenu(e) {
	if(menu){
		menu = false;
		$('.menu').children().removeClass('toggle'),
	    $('.is-active').removeClass('is-active'),
	    setTimeout(function(){
		    $('html, body, .menu').removeClass('toggle');
	    }, 500);	    
	}
}
function backToTop(e) {
    $('html, body').stop(true, false).animate({
        scrollTop: $("header").offset().top
    }, 1000);
}
$(document).ready(function () {
});
      
      