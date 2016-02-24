/*
 Smooth scroll v1.1 | @agareginyan | GPL v3 Licensed
*/


jQuery(document).ready(function($) {

    $('#ssttbutton').hide();

	$(window).scroll(function() {
        if ($(this).scrollTop() < 200) {
			$('#ssttbutton') .fadeOut();
        } else {
			$('#ssttbutton') .fadeIn();
        }
    });

	$('#ssttbutton').on('click', function() {
		$('html, body').animate({scrollTop:0}, 'fast');
		return false;
    });

});