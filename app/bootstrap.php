<?php

/**
 * GenericBooking bootstrap class - load scripts, styles, setup menus, shortcodes, define pages
 *
 * @package default
 * @author
 **/
class GenericBooking
{
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

        //create sub menu
        // https://developer.wordpress.org/reference/functions/add_submenu_page/
    }

    public function enqueue_scripts_admin()
    {
        // wp_enqueue_script()
        // wp_enqueue_style()
    }

    public function enqueue_scripts_frontend()
    {
        // wp_enqueue_script()
        // wp_enqueue_style()
    }
} // END class
