<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Callback function that returns an array with the value of the plugin options
 * @return array
 */
function spacexchimp_p008_options() {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p008_plugin();

    // Retrieve options from database
    $options = get_option( $plugin['settings'] . '_settings' );

    // Make the "$options" array if the plugin options data in the database is not exist
    if ( ! is_array( $options ) ) {
        $options = array();
    }

    // Create an array with options
    $array = $options;

    // Set default value if option is empty
    $list = array(
        'background_button' => 'fa-circle', // _control_choice
        'background-color' => '#ff4f7d', // _control_color
        'display-button' => '', // _control_choice
        'hidden_scrollto' => '0', // _control_hidden
        'image_button' => 'fa-arrow-up', // _control_choice
        'scroll_duration' => '300', // _control_number
        'size_button' => '32', // _control_number
        'symbol-color' => '#fff', // _control_color
        'transparency_button' => '', // _control_switch
    );
    foreach ( $list as $name => $default ) {
        $array[$name] = !empty( $options[$name] ) ? $options[$name] : $default;
    }

    // Sanitize data
    //$array['background_button'] = esc_textarea( $array['background_button'] );
    //$array['background-color'] = esc_textarea( $array['background-color'] );
    //$array['display-button'] = esc_textarea( $array['display-button'] );
    //$array['hidden_scrollto'] = esc_textarea( $array['hidden_scrollto'] );
    //$array['image_button'] = esc_textarea( $array['image_button'] );
    //$array['scroll_duration'] = esc_textarea( $array['scroll_duration'] );
    //$array['size_button'] = esc_textarea( $array['size_button'] );
    //$array['symbol-color'] = esc_textarea( $array['symbol-color'] );
    //$array['transparency_button'] = esc_textarea( $array['transparency_button'] );

    // Modify data
    $array['transparency_button'] = ( $array['transparency_button'] == 'on' || $array['transparency_button'] == '1' || $array['transparency_button'] == 'true' ) ? true : false;

    // Return the processed data
    return $array;
}
