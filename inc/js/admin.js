/*
 * Plugin JavaScript and jQuery code for the admin pages of website
 *
 * @package     Simple Scroll to Top Button
 * @uthor       Arthur Gareginyan
 * @link        https://www.arthurgareginyan.com
 * @copyright   Copyright (c) 2016-2017 Arthur Gareginyan. All Rights Reserved.
 * @since       4.6
 */


jQuery(document).ready(function($) {

    "use strict";

    // Color picker
    $('.color-picker').wpColorPicker();

    // Remove the 'successful' message after 3 seconds
    if ('.updated') {
        setTimeout(function() {
            $('.updated').fadeOut();
        }, 3000);
    }

    // Enable Bootstrap Checkboxes
    $(':checkbox').checkboxpicker();

    // Add dynamic content to page tabs. Needed for having an up to date content.
    $('.include-tab-author').load('https://www.spacexchimp.com/assets/dynamic-content/plugins.html #include-tab-author');
    $('.include-tab-store').load('https://www.spacexchimp.com/assets/dynamic-content/plugins.html #include-tab-store');

    // Add questions and answers into spoilers and color them in different colors
    $('.panel-group .panel').each(function(i) {
         $('.question-' + (i+1) ).appendTo( $('h4', this) );
         $('.answer-' + (i+1) ).appendTo( $('.panel-body', this) );

         if ( $(this).find('h4 div').hasClass('question-red') ) {
             $(this).addClass('panel-danger');
         } else {
             $(this).addClass('panel-info');
         }
    });

    // Live preview
    $('.background-button').on('change', function() {
        var val = $('input[type=radio]:checked', '.background-button').val() || 'fa-circle';
        val = 'ssttbutton-background fa ' + val + ' fa-stack-2x';
        $('#preview .ssttbutton-background').attr('class', val);
    });

    $('.background-color').wpColorPicker({
        change: function (event, ui) {
            var element = event.target;
            var color = ui.color.toString();
            $('#preview  .ssttbutton-background').css('color',color);
        },
        clear: function (event) {
            var element = $(event.target).siblings('.wp-color-picker')[0];
            var color = '';
            if (element) {
              $('#preview  .ssttbutton-background').css('color',color);
            }
        }
    });

    $('.image-button').on('change', function() {
        var val = $('input[type=radio]:checked', '.image-button').val() || 'fa-hand-o-up';
        val = 'ssttbutton-symbol fa ' + val + ' fa-stack-1x';
        $('#preview .ssttbutton-symbol').attr('class', val);
    });

    $('.symbol-color').wpColorPicker({
        change: function (event, ui) {
            var element = event.target;
            var color = ui.color.toString();
            $('#preview .ssttbutton-symbol').css('color',color);
        },
        clear: function (event) {
            var element = $(event.target).siblings('.wp-color-picker')[0];
            var color = '';
            if (element) {
                $('#preview .ssttbutton-symbol').css('color',color);
            }
        }
    });

    $('.transparency_button').on('change', function() {
        var val = $(this).val();
        var position = $(this).next().children().hasClass('btn-success');
        if (position === true) {
            $('#preview #ssttbutton').addClass('ssttbutton-transparent');
        } else {
            $('#preview #ssttbutton').removeClass('ssttbutton-transparent');
        }
    });

    $('.size_button').change(function() {
        var val = $(this).val() || '32';
        //$('#preview #ssttbutton').css('font-size',val);
        $('#preview #ssttbutton').attr('style', 'font-size:' + val + 'px !important;');

    });

});
