<?php

// If uninstall not called from WordPress, then exit.
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

// delete room booking version
delete_option('genericBookingplugin_version');

// delete tables or data if necessary
