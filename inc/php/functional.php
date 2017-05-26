<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Render checkboxes and fields for saving settings data to database
 *
 * @since 4.1
 */
function ssttbutton_setting( $name, $label, $help=null, $field=null, $placeholder=null, $size=null ) {

    // Read options from BD
    $options = get_option( SSTOPB_SETTINGS . '_settings' );

    if ( !empty( $options[$name] ) ) {
        $value = esc_textarea( $options[$name] );
    } else {
        $value = "";
    }

    // Generate the table
    if ( !empty( $options[$name] ) ) {
        $checked = "checked='checked'";
    } else {
        $checked = "";
    }

    if ( $field == "check" ) {
        $input = "<input type='checkbox' name='" . SSTOPB_SETTINGS . "_settings[$name]' id='" . SSTOPB_SETTINGS . "_settings[$name]' $checked >";
    } elseif ( $field == "field" ) {
        $input = "<input type='text' name='" . SSTOPB_SETTINGS . "_settings[$name]' id='" . SSTOPB_SETTINGS . "_settings[$name]' size='$size' value='$value' placeholder='$placeholder' >";
    }

    // Put table to the variables $out and $help_out
    $out = "<tr>
                <th scope='row'>
                    $label
                </th>
                <td>
                    $input
                </td>
            </tr>";
    if ( !empty( $help ) ) {
        $help_out = "<tr>
                        <td></td>
                        <td class='help-text'>
                            $help
                        </td>
                     </tr>";
    } else {
        $help_out = "";
    }

    // Print the generated table
    echo $out . $help_out;
}

/**
 * Generate the CSS of button from options and add it to head section of website
 *
 * @since 4.1
 */
function ssttbutton_css_options() {

    // Read options from BD and declare variables
    $options = get_option( SSTOPB_SETTINGS . '_settings' );

    if ( !empty( $options['background-color'] ) ) {
        $backgroun_color = $options['background-color'];
    } else {
        $backgroun_color = "#000000";
    }

    if ( !empty( $options['symbol-color'] ) ) {
        $symbol_color = $options['symbol-color'];
    } else {
        $symbol_color = "#ffffff";
    }

    if ( !empty( $options['size_button'] ) ) {
        $size_button = $options['size_button'];
    } else {
        $size_button = "32";
    }

    ?>
        <style type="text/css">
            #ssttbutton {
                <?php if ( !empty( $options['transparency_button'] ) AND $options['transparency_button'] == 'on' ) {
                    echo '
                        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
                        filter: alpha(opacity=50);
                        -moz-opacity: .5;
                        -khtml-opacity: .5;
                        opacity: .5;
                    ';
                } ?>
                font-size: <?php echo $size_button; ?>px;
            }
            .ssttbutton-background {
                color: <?php echo $backgroun_color; ?>;
            }
            .ssttbutton-symbol {
                color: <?php echo $symbol_color; ?>;
            }
        </style>
    <?php
}
add_action( 'wp_head' , SSTOPB_PREFIX . '_css_options' );

/**
 * Add DIV container with button to footer.
 *
 * @since 4.1
 */
function ssttbutton_add_container() {

    // Read options from BD and declare variables
    $options = get_option( SSTOPB_SETTINGS . '_settings' );

    // Return if the button is disabled
    if ( empty( $options['enable_button'] ) ) {
        return;
    }

    ?>
        <a id="ssttbutton" href="#top">
            <span class="fa-stack fa-lg">
                <i class="ssttbutton-background fa <?php if ( !empty( $options['background_button'] ) ) { echo $options['background_button']; } else { echo 'fa-circle'; }  ?> fa-stack-2x"></i>
                <i class="ssttbutton-symbol fa <?php if ( !empty( $options['image_button'] ) ) { echo $options['image_button']; } else { echo 'fa-hand-o-up'; }  ?> fa-stack-1x"></i>
            </span>
        </a>
    <?php
}
add_action( 'wp_footer', SSTOPB_PREFIX . '_add_container', 999 );
