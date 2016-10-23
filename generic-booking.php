<?php

/*
Plugin Name: Generic Booking Plugin
Version: 1.0.0
Description: A simple booking plugin
Author: Nasrul Hazim Bin Mohamad
Author URI: http://blog.nasrulhazim.com
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

// Set Plugin Directory Path
define('BOOKING_DIR', plugin_dir_path(__FILE__));

// Set Plugin URI
define('BOOKING_URI', plugin_dir_url(__FILE__));

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require BOOKING_DIR . 'app/bootstrap.php';

register_activation_hook(__FILE__, 'genericBookingplugin_activate');

register_deactivation_hook(__FILE__, 'genericBookingplugin_deactivate');

function genericBookingplugin_activate()
{
    $version = $plugin_data['Version'];

    // check WordPress version, if less than version we need, don't activate
    if (version_compare(get_bloginfo('version'), '4.0', '<')) {
        wp_die("You must use at least WordPress 4.1 to use this plugin!");
    }

    // If no record on plugin version, do create one
    if (get_option('genericBookingplugin_version') === false) {
        add_option('genericBookingplugin_version', $version);
        // create tables if any
    } else if (get_option('genericBookingplugin_version') < $version) {
        // else, do update the slider version
        update_option('genericBookingplugin_version', $version);
        // update tables if any
    }
}

function genericBookingplugin_deactivate()
{

}

function genericBookingplugin_run()
{
    $bootsrap = new GenericBooking();
    $bootsrap->run();
}

genericBookingplugin_run();
