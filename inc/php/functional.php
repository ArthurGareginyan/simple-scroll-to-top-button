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
 * @since 4.5
 */
function ssttbutton_setting( $name, $label, $help=null, $field=null, $placeholder=null, $size=null ) {

    // Read options from database and declare variables
    $options = get_option( SSTOPB_SETTINGS . '_settings' );
    $value = !empty( $options[$name] ) ? esc_textarea( $options[$name] ) : '';

    // Generate the table
    $checked = !empty( $options[$name] ) ? "checked='checked'" : '';

    if ( $field == "check" ) {
        $input = "<input type='checkbox' name='" . SSTOPB_SETTINGS . "_settings[$name]' id='" . SSTOPB_SETTINGS . "_settings[$name]' $checked class='$name' >";
    } elseif ( $field == "field" ) {
        $input = "<input type='text' name='" . SSTOPB_SETTINGS . "_settings[$name]' id='" . SSTOPB_SETTINGS . "_settings[$name]' size='$size' value='$value' placeholder='$placeholder' class='$name' >";
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
 * Add DIV container with button to footer.
 *
 * @since 4.5
 */
function ssttbutton_add_container() {

    // Read options from database
    $options = get_option( SSTOPB_SETTINGS . '_settings' );

    // Return if the button is disabled
    if ( empty( $options['enable_button'] ) ) {
        return;
    }

    // Declare variables
    $transparency = (!empty( $options['transparency_button'] ) AND $options['transparency_button'] == 'on') ? 'ssttbutton-transparent' : '' ;
    $background_button = !empty( $options['background_button'] ) ? $options['background_button'] : 'fa-circle';
    $image_button = !empty( $options['image_button'] ) ? $options['image_button'] : 'fa-hand-o-up';

    ?>
        <a id="ssttbutton" href="#top" class="<?php echo $transparency; ?>">
            <span class="fa-stack fa-lg">
                <i class="ssttbutton-background fa <?php echo $background_button; ?> fa-stack-2x"></i>
                <i class="ssttbutton-symbol fa <?php echo $image_button; ?> fa-stack-1x"></i>
            </span>
        </a>
    <?php
}
add_action( 'wp_footer', SSTOPB_PREFIX . '_add_container', 999 );
