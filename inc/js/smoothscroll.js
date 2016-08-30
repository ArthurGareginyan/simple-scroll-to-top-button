/*
 * Smooth scroll
 *
 * Copyright (c) 2016 Arthur Gareginyan ( http://www.arthurgareginyan.com ).
 * All Rights Reserved.
 */


jQuery(document).ready(function($) {

    "use strict";

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