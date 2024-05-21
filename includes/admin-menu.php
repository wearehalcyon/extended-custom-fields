<?php
/**
 * Add WP Dashboard ECF menu item
 * v1.0.0
 */

add_action('admin_menu', 'ecf_custom_admin_page');
function ecf_custom_admin_page(){
    add_menu_page(
        'Extended Custom Fields',
        'ECF',
        'manage_options',
        'ecf-field-group',
        'ecf_custom_page',
        'dashicons-welcome-widgets-menus',
        80
    );
}
function ecf_custom_page(){
    require "admin/ecf-index.php";
}