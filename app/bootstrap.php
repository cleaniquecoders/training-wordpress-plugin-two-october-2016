<?php

/**
 * GenericBooking bootstrap class - load scripts, styles, setup menus, shortcodes, define pages
 *
 * @package default
 * @author
 **/
class GenericBooking
{
    public $view;
    public function __construct()
    {
        $this->view = new GenericBookingView();
    }
    public function run()
    {
        // include admin css & javascripts
        add_action('admin_enqueue_scripts', [$this, 'enqueue_scripts_admin']);

        // include front end css & javascripts
        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts_frontend']);

        // add plugin main menus
        add_action('admin_menu', [$this, 'menus']);

        // add shortcodes
        add_action('init', [$this, 'define_shortcodes']);
    }

    public function define_shortcodes()
    {
        // short code
        // https://developer.wordpress.org/reference/functions/add_shortcode/
    }

    public function menus()
    {
        //create new top-level menu
        // https://developer.wordpress.org/reference/functions/add_menu_page/
        add_menu_page(
            'Generic Booking Plugin',
            'Generic Booking',
            'administrator', // https://codex.wordpress.org/Roles_and_Capabilities
            'generic-booking-plugin',
            [$this->view, 'setting']
        );

        add_submenu_page(
            'generic-booking-plugin', // parent slug
            'Inventories', // page-title
            'Inventories', // menu-title
            'administrator', // capability
            'manage-inventories', // menu-slug
            [$this->view, 'manageInventories']// function to be call to generate the view
        );

        add_submenu_page(
            'manage-inventories', // parent slug
            'New Inventory', // page-title
            'New Inventory', // menu-title
            'administrator', // capability
            'new-inventory', // menu-slug
            [$this->view, 'addInventory']// function to be call to generate the view
        );

        //create sub menu
        // https://developer.wordpress.org/reference/functions/add_submenu_page/
    }

    public function enqueue_scripts_admin()
    {
        // wp_enqueue_script()
        // wp_enqueue_style()
        wp_enqueue_style(
            'bootstrap-admin',
            GENERIC_BOOKING_URI . 'assets/css/bootstrap-admin.css'
        );
    }

    public function enqueue_scripts_frontend()
    {
        // wp_enqueue_script()
        // wp_enqueue_style()
    }
} // END class

class GenericBookingView
{
    public function setting()
    {
        // handle request
        require_once GENERIC_BOOKING_APP . 'controllers/setting.php';

        // handle data manipulation
        require_once GENERIC_BOOKING_APP . 'models/setting.php';

        // handle rendering
        require_once GENERIC_BOOKING_APP . 'views/setting.php';
    }

    public function manageInventories()
    {
        require_once GENERIC_BOOKING_APP . 'controllers/manage-inventories.php';
        require_once GENERIC_BOOKING_APP . 'models/manage-inventories.php';
        require_once GENERIC_BOOKING_APP . 'views/manage-inventories.php';
    }

    public function addInventory()
    {
        //require_once GENERIC_BOOKING_APP . 'controllers/add-inventory.php';
        //require_once GENERIC_BOOKING_APP . 'models/add-inventory.php';
        require_once GENERIC_BOOKING_APP . 'views/inventory/create.php';
    }
}
