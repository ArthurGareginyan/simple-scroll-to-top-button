<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Base for the _load_scripts hook
 *
 * @since 4.1
 */
function ssttbutton_load_scripts_base( $options ) {

    // Load JQuery library
    wp_enqueue_script( 'jquery' );

    // JavaScript
    wp_enqueue_script( SSTOPB_PREFIX . '-frontend-js', SSTOPB_URL . 'inc/js/frontend.js', array('jquery'), false, true );

    // Other libraries
    wp_enqueue_style( SSTOPB_PREFIX . '-font-awesome-css', SSTOPB_URL . 'inc/lib/font-awesome/css/font-awesome.min.css', 'screen' );

    // Dynamic JS. Create JS object and injected it into the JS file
    if ( !empty( $options['scroll_duration'] ) ) { $scroll_duration = $options['scroll_duration']; } else { $scroll_duration = "300"; }
    $script_params = array(
                           'scroll_duration' => $scroll_duration,
                           );
    wp_localize_script( SSTOPB_PREFIX . '-frontend-js', SSTOPB_PREFIX . '_scriptParams', $script_params );

}

/**
 * Load scripts and style sheet for settings page
 *
 * @since 4.1
 */
function ssttbutton_load_scripts_admin( $hook ) {

    // Return if the page is not a settings page of this plugin
    $settings_page = 'settings_page_' . SSTOPB_SLUG;
    if ( $settings_page != $hook ) {
        return;
    }

    // Read options from BD
    $options = get_option( SSTOPB_SETTINGS . '_settings' );

    // Style sheet
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_style( SSTOPB_PREFIX . '-admin-css', SSTOPB_URL . 'inc/css/admin.css' );

    // JavaScript
    wp_enqueue_script( SSTOPB_PREFIX . '-admin-js', SSTOPB_URL . 'inc/js/admin.js', array('wp-color-picker'), false, true );

    // Bootstrap library
    wp_enqueue_style( SSTOPB_PREFIX . '-bootstrap-css', SSTOPB_URL . 'inc/lib/bootstrap/bootstrap.css' );
    wp_enqueue_style( SSTOPB_PREFIX . '-bootstrap-theme-css', SSTOPB_URL . 'inc/lib/bootstrap/bootstrap-theme.css' );
    wp_enqueue_script( SSTOPB_PREFIX . '-bootstrap-js', SSTOPB_URL . 'inc/lib/bootstrap/bootstrap.js' );

    // Other libraries
    wp_enqueue_style( SSTOPB_PREFIX . '-font-awesome-css', SSTOPB_URL . 'inc/lib/font-awesome/css/font-awesome.min.css', 'screen' );
    wp_enqueue_script( SSTOPB_PREFIX . '-bootstrap-checkbox-js', SSTOPB_URL . 'inc/lib/bootstrap-checkbox.js' );

    // Call the function that contain a basis of scripts
    ssttbutton_load_scripts_base( $options );

}
add_action( 'admin_enqueue_scripts', SSTOPB_PREFIX . '_load_scripts_admin' );

/**
 * Load scripts and style sheet for front end of website
 *
 * @since 4.1
 */
function ssttbutton_load_scripts_frontend() {

    // Read options from BD
    $options = get_option( SSTOPB_SETTINGS . '_settings' );

    // Return if the button is disabled
    if ( empty( $options['enable_button'] ) ) {
        return;
    }

    // If 
    if ( $options['display-button'] == '' OR $options['display-button'] == 'Home Page Only' AND is_home() OR $options['display-button'] == 'Home Page Only' AND is_front_page() ) {

        // Call the function that contain a basis of scripts
        ssttbutton_load_scripts_base( $options );

        // Style sheet
        wp_enqueue_style( SSTOPB_PREFIX . '-frontend-css', SSTOPB_URL . 'inc/css/frontend.css' );

    }

}
add_action( 'wp_enqueue_scripts', SSTOPB_PREFIX . '_load_scripts_frontend' );
