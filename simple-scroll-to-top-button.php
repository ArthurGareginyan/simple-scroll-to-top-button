<?php
/**
 * Plugin Name: Simple Scroll to Top Button
 * Plugin URI: https://github.com/ArthurGareginyan/simple-scroll-to-top-button
 * Description: Easily add cross browser "Scroll to Top" button to your website. It will be responsive and compatible with all major browsers. It will work with any theme!
 * Author: Arthur Gareginyan
 * Author URI: http://www.arthurgareginyan.com
 * Version: 4.1
 * License: GPL3
 * Text Domain: simple-scroll-to-top-button
 * Domain Path: /languages/
 *
 * Copyright 2016-2017 Arthur Gareginyan (email : arthurgareginyan@gmail.com)
 *
 * This file is part of "Simple Scroll to Top Button".
 *
 * "Simple Scroll to Top Button" is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * "Simple Scroll to Top Button" is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with "Simple Scroll to Top Button".  If not, see <http://www.gnu.org/licenses/>.
 *
 *
 *               █████╗ ██████╗ ████████╗██╗  ██╗██╗   ██╗██████╗
 *              ██╔══██╗██╔══██╗╚══██╔══╝██║  ██║██║   ██║██╔══██╗
 *              ███████║██████╔╝   ██║   ███████║██║   ██║██████╔╝
 *              ██╔══██║██╔══██╗   ██║   ██╔══██║██║   ██║██╔══██╗
 *              ██║  ██║██║  ██║   ██║   ██║  ██║╚██████╔╝██║  ██║
 *              ╚═╝  ╚═╝╚═╝  ╚═╝   ╚═╝   ╚═╝  ╚═╝ ╚═════╝ ╚═╝  ╚═╝
 *
 *   ██████╗  █████╗ ██████╗ ███████╗ ██████╗ ██╗███╗   ██╗██╗   ██╗ █████╗ ███╗   ██╗
 *  ██╔════╝ ██╔══██╗██╔══██╗██╔════╝██╔════╝ ██║████╗  ██║╚██╗ ██╔╝██╔══██╗████╗  ██║
 *  ██║  ███╗███████║██████╔╝█████╗  ██║  ███╗██║██╔██╗ ██║ ╚████╔╝ ███████║██╔██╗ ██║
 *  ██║   ██║██╔══██║██╔══██╗██╔══╝  ██║   ██║██║██║╚██╗██║  ╚██╔╝  ██╔══██║██║╚██╗██║
 *  ╚██████╔╝██║  ██║██║  ██║███████╗╚██████╔╝██║██║ ╚████║   ██║   ██║  ██║██║ ╚████║
 *   ╚═════╝ ╚═╝  ╚═╝╚═╝  ╚═╝╚══════╝ ╚═════╝ ╚═╝╚═╝  ╚═══╝   ╚═╝   ╚═╝  ╚═╝╚═╝  ╚═══╝
 *
 */


/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Define global constants
 *
 * @since 4.1
 */
defined( 'SSTOPB_DIR' ) or define( 'SSTOPB_DIR', dirname( plugin_basename( __FILE__ ) ) );
defined( 'SSTOPB_BASE' ) or define( 'SSTOPB_BASE', plugin_basename( __FILE__ ) );
defined( 'SSTOPB_URL' ) or define( 'SSTOPB_URL', plugin_dir_url( __FILE__ ) );
defined( 'SSTOPB_PATH' ) or define( 'SSTOPB_PATH', plugin_dir_path( __FILE__ ) );
defined( 'SSTOPB_TEXT' ) or define( 'SSTOPB_TEXT', 'simple-scroll-to-top-button' );
defined( 'SSTOPB_SLUG' ) or define( 'SSTOPB_SLUG', 'simple-scroll-to-top-button' );
defined( 'SSTOPB_PREFIX' ) or define( 'SSTOPB_PREFIX', 'ssttbutton' );
defined( 'SSTOPB_SETTINGS' ) or define( 'SSTOPB_SETTINGS', 'ssttbutton' );
defined( 'SSTOPB_NAME' ) or define( 'SSTOPB_NAME', 'Simple Scroll to Top Button' );
defined( 'SSTOPB_VERSION' ) or define( 'SSTOPB_VERSION', get_file_data( __FILE__, array( 'Version' ) ) );

/**
 * Load the plugin modules
 *
 * @since 4.0
 */
require_once( SSTOPB_PATH . 'inc/php/core.php' );
require_once( SSTOPB_PATH . 'inc/php/enqueue.php' );
require_once( SSTOPB_PATH . 'inc/php/version.php' );
require_once( SSTOPB_PATH . 'inc/php/functional.php' );
require_once( SSTOPB_PATH . 'inc/php/page.php' );
require_once( SSTOPB_PATH . 'inc/php/messages.php' );
require_once( SSTOPB_PATH . 'inc/php/uninstall.php' );
