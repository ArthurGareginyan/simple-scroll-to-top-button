<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined('ABSPATH') or die("Restricted access!");

/**
 * Load scripts and style sheet for settings page
 *
 * @since 4.0
 */
function ssttbutton_load_scripts_admin($hook) {

    // Return if the page is not a settings page of this plugin
    if ( 'settings_page_simple-scroll-to-top-button' != $hook ) {
        return;
    }

    // Style sheet
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_style( 'ssttbutton-admin-css', SSTOPB_URL . 'inc/css/admin.css' );

    // JavaScript
    wp_enqueue_script( 'ssttbutton-admin-js', SSTOPB_URL . 'inc/js/admin.js', array('wp-color-picker'), false, true );
    wp_enqueue_script( 'ssttbutton-frontend-js', SSTOPB_URL . 'inc/js/frontend.js', array('jquery'), false, true );

    // Bootstrap library
    wp_enqueue_style( 'ssttbutton-bootstrap-css', SSTOPB_URL . 'inc/lib/bootstrap/bootstrap.css' );
    wp_enqueue_style( 'ssttbutton-bootstrap-theme-css', SSTOPB_URL . 'inc/lib/bootstrap/bootstrap-theme.css' );
    wp_enqueue_script( 'ssttbutton-bootstrap-js', SSTOPB_URL . 'inc/lib/bootstrap/bootstrap.js' );

    // Other libraries
    wp_enqueue_style( 'ssttbutton-font-awesome-css', SSTOPB_URL . 'inc/lib/font-awesome/css/font-awesome.min.css', 'screen' );
    wp_enqueue_script( 'ssttbutton-bootstrap-checkbox-js', SSTOPB_URL . 'inc/lib/bootstrap-checkbox.js' );

}
add_action( 'admin_enqueue_scripts', 'ssttbutton_load_scripts_admin' );

/**
 * Load scripts and style sheet for front end of website
 *
 * @since 4.0
 */
function ssttbutton_load_scripts_frontend() {

    // Read options from BD
    $options = get_option( 'ssttbutton_settings' );

    // Load JQuery library
    wp_enqueue_script( 'jquery' );

    // Enqueue script and style sheet of button on front end
    if ( !empty($options['enable_button']) AND $options['enable_button'] == 'ON' ) {

        if ( $options['display-button'] == '' || $options['display-button'] == 'Home Page Only' && is_home() || $options['display-button'] == 'Home Page Only' && is_front_page() ) {

            // Style sheet
            wp_enqueue_style( 'ssttbutton-frontend-css', SSTOPB_URL . 'inc/css/frontend.css' );

            // JavaScript
            wp_enqueue_script( 'ssttbutton-frontend-js', SSTOPB_URL . 'inc/js/frontend.js', array('jquery'), false, true );

            // Other libraries
            wp_enqueue_style( 'ssttbutton-font-awesome-css', SSTOPB_URL . 'inc/lib/font-awesome/css/font-awesome.min.css', 'screen' );

        }
    }
}
add_action( 'wp_enqueue_scripts', 'ssttbutton_load_scripts_frontend' );
