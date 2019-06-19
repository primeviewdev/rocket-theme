$ = jQuery.noConflict();

$(function(){
	//mobileMenu();
	menuClick();
	mobyMobileMenu();
	console.log('Loading Resources............100%');
	$('body').hide();
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
	$j('li.dropdown').click(function(e){
		console.log(e);
		$(this).removeClass('open');
	});
}

	$(window).load(function() {
		$('.loading').fadeOut();
		$('body').fadeIn();
	});