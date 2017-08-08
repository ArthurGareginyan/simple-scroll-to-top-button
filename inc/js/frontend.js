/*
 * Plugin JavaScript and jQuery code for the front end of website
 *
 * @package     Simple Scroll to Top Button
 * @uthor       Arthur Gareginyan
 * @link        https://www.arthurgareginyan.com
 * @copyright   Copyright (c) 2016-2017 Arthur Gareginyan. All Rights Reserved.
 * @since       4.5
 */


jQuery(document).ready(function($) {

    "use strict";

    // Set variables
    var duration = parseInt( ssttbutton_scriptParams["scroll_duration"] );

    // Hide button by default
    $('#ssttbutton').hide();

    $(window).scroll(function() {
        if ($(this).scrollTop() < 200) {
            $('#ssttbutton') .fadeOut();
        } else {
    		$('#ssttbutton') .fadeIn();
        }
    });

    // Click on button
  	$('#ssttbutton').on('click', function() {
        $('html, body').animate({scrollTop:0}, duration);
        return false;
    });

});
