<?php
// fetch data
global $wpdb;
$table_name = $wpdb->prefix . 'inventories';

$sql = "select * from $table_name order by name";

// $result = $wpdb->query($sql);
$inventories = $wpdb->get_results($sql, OBJECT_K);

// var_dump($result);exit();
