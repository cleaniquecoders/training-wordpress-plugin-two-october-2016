<?php
// handle request
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'inventories';
    $wpdb->insert(
        $table_name,
        array(
            'name' => $_POST['name'],
            'value' => $_POST['value'],
        )
    );
    $url = admin_url('admin.php?page=manage-inventories');
    if (wp_redirect($url)) {
        exit;
    }
}
