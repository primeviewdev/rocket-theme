$ = jQuery.noConflict();

$(function(){
	//mobileMenu();
	menuClick();
	mobyMobileMenu();
	console.log('Loading Resources............100%');
	$('body').hide();

	$(window).scroll(function() {
		if ($(this).scrollTop()) {
			$('#scroll-to-top').fadeIn();
		} else {
			$('#scroll-to-top').fadeOut();
		}
	});

	$("#scroll-to-top").on('click', function () {
		$("html, body").animate({scrollTop: 0}, 1000);
	});
});
function mobileMenu(){
	var screen = $(window).width();
	var nav = $('#bs-navbar-collapse');
	try{
		$("div#bs-navbar-collapse.desktop .dropdown,div#bs-navbar-collapse.desktop .btn-group").hover(function(){
			var dropdownMenu = $j(this).children(".dropdown-menu");
			dropdownMenu.parent().toggleClass("open");
		});
		$(window).resize(function() {
			nav.toggleClass('desktop');
		});
	}catch(e){
		console.log(e);
	}
}
function menuClick(){
	$('li.dropdown').on('click', function (e) {
		console.log(e);
		$(this).removeClass('open');
	});
}

$(window).on('load', function () {
	$('.loading').fadeOut();
	$('body').fadeIn();
});