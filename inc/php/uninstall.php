<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined('ABSPATH') or die("Restricted access!");

/**
 * Delete options on uninstall
 *
 * @since 0.1
 */
function ssttbutton_uninstall() {
    delete_option( 'ssttbutton_settings' );
}
register_uninstall_hook( __FILE__, 'ssttbutton_uninstall' );
