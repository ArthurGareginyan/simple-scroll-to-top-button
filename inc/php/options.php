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
    $list = array(
        'background_button' => (string) 'fa-circle', // _control_choice
        'background-color' => (string) '#ff4f7d', // _control_color
        'display-button' => (string) '', // _control_choice
        'hidden_scrollto' => (integer) '0', // _control_hidden
        'image_button' => (string) 'fa-arrow-up', // _control_choice
        'scroll_duration' => (integer) '300', // _control_number
        'size_button' => (integer) '32', // _control_number
        'symbol-color' => (string) '#fff', // _control_color
        'transparency_button' => (boolean) '', // _control_switch
    );
    foreach ( $list as $name => $default ) {

        // Set default value if option is empty
        $array[$name] = !empty( $options[$name] ) ? $options[$name] : $default;

        // Cast, validate and sanitize by type of option
        if ( is_string( $default ) === true ) {
            $array[$name] = (string) $array[$name];
        } elseif ( is_int( $default ) === true ) {
            $array[$name] = (integer) $array[$name];
        } elseif ( is_bool( $default ) === true ) {
            $array[$name] = filter_var( $array[$name], FILTER_VALIDATE_BOOLEAN );
        }
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


    // Return the processed data
    return $array;
}
