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

    // Retrieve the plugin options data from the database
    $array = get_option( $plugin['settings'] . '_settings' );

    // Fill in the "$array" variable if the plugin options data in the database is not exist
    if ( ! is_array( $array ) ) {
        $array = array();
    }

    // Prepare the plugin options data for use
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
        $array[$name] = ! empty( $array[$name] ) ? $array[$name] : $default;

        // Cast and validate by type of option
        if ( is_string( $default ) === true ) {
            $array[$name] = (string) $array[$name];
        } elseif ( is_int( $default ) === true ) {
            $array[$name] = (integer) $array[$name];
        } elseif ( is_bool( $default ) === true ) {
            $array[$name] = filter_var( $array[$name], FILTER_VALIDATE_BOOLEAN );
        }
    }

    // Sanitize data
    $array['background_button'] = sanitize_text_field( $array['background_button'] );
    $array['background-color'] = sanitize_hex_color( $array['background-color'] );
    $array['display-button'] = sanitize_text_field( $array['display-button'] );
    $array['image_button'] = sanitize_text_field( $array['image_button'] );
    $array['symbol-color'] = sanitize_hex_color( $array['symbol-color'] );

    // Modify data


    // Return the processed data
    return $array;
}

/**
 * Write the options to a text file for development/testing purposes
 */
function spacexchimp_p008_test() {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p008_plugin();

    // Put the value of the plugin options into an array for easier access
    $options = spacexchimp_p008_options();

    // Prepare a variable for storing the processed data
    $data = print_r( $options, true );

    // Name and destination of the backup files
    $date = date( 'm-d-Y_hia' );
    $file_location_date = $plugin['path'] . '/test/' . $date . '.txt';
    $file_location_last = $plugin['path'] . '/test/last.txt';

    // Make two backup files
    file_put_contents( $file_location_date, $data );
    file_put_contents( $file_location_last, $data );
}
//spacexchimp_p008_test();
