<?php

function genericBookingplugin_setup_tables()
{
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix . 'inventories';

    $sql = "CREATE TABLE $table_name (
		id int(11) unsigned NOT NULL AUTO_INCREMENT,
		`name` varchar(255) DEFAULT NULL,
		`value` int(11),
		  PRIMARY KEY (`id`)
	) $charset_collate;";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($sql);
}
