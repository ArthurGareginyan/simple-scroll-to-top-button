<?php

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
    $array['hidden_scrollto'] = !empty( $options['hidden_scrollto'] ) ? $options['hidden_scrollto'] : '0';
    $array['display-button'] = !empty( $options['display-button'] ) ? $options['display-button'] : '';
    $array['scroll_duration'] = !empty( $options['scroll_duration'] ) ? $options['scroll_duration'] : '300';
    $array['background-color'] = !empty( $options['background-color'] ) ? $options['background-color'] : '#ff4f7d';
    $array['symbol-color'] = !empty( $options['symbol-color'] ) ? $options['symbol-color'] : '#fff';
    $array['size_button'] = !empty( $options['size_button'] ) ? $options['size_button'] : '32';
    $array['background_button'] = !empty( $options['background_button'] ) ? $options['background_button'] : 'fa-circle';
    $array['image_button'] = !empty( $options['image_button'] ) ? $options['image_button'] : 'fa-arrow-up';

    // Return the processed data
    return $array;
}
