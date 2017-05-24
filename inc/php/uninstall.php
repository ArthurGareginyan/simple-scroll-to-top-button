<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Delete options on uninstall
 *
 * @since 4.1
 */
function ssttbutton_uninstall() {
    delete_option( SSTOPB_SETTINGS . '_settings' );
}
register_uninstall_hook( __FILE__, SSTOPB_PREFIX . '_uninstall' );
