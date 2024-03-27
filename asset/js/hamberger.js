jQuery(document).ready(function($) {
	$('.header-toggle').on("click", function () {
		$('.header-nav').toggleClass('open'); 
		$('.header-toggle').toggleClass('active'); 
        $('.drawer_bg').toggleClass('add_bg');
	});
});