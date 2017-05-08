/*
 * Plugin JavaScript and JQuery code for the front end of website
 *
 * @package     Simple Scroll to Top Button
 * @uthor       Arthur Gareginyan
 * @link        http://www.arthurgareginyan.com
 * @copyright   Copyright (c) 2016-2017 Arthur Gareginyan. All Rights Reserved.
 * @since       4.0
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
