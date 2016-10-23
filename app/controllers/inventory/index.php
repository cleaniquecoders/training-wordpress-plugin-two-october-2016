<?php
// manage request
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST) && $_POST['_method'] == 'DELETE') {
    global $wpdb;
    $table_name = $wpdb->prefix . 'inventories';
    $wpdb->delete($table_name, array('id' => $_POST['id']), array('%d'));
    echo json_encode(['status' => 'success']);
    wp_die();
}
