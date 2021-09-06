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
    $list = array(
        'background_button' => 'fa-circle',
        'background-color' => '#ff4f7d',
        'display-button' => '',
        'hidden_scrollto' => '0',
        'image_button' => 'fa-arrow-up',
        'scroll_duration' => '300',
        'size_button' => '32',
        'symbol-color' => '#fff',
        'transparency_button' => '',
    );
    foreach ( $list as $name => $default ) {
        $array[$name] = !empty( $options[$name] ) ? $options[$name] : $default;
    }

    // Sanitize data


    // Modify data
    $array['transparency_button'] = ( $array['transparency_button'] == 'on' || $array['transparency_button'] == '1' || $array['transparency_button'] == 'true' ) ? true : false;

    // Return the processed data
    return $array;
}
