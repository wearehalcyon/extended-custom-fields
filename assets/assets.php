<?php
add_action('admin_enqueue_scripts', 'ecf_cpt_load_scripts', 10);
function ecf_cpt_load_scripts(){
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script('ecf-cpt-scripts', plugin_dir_url(__FILE__) . 'js/scripts.js', array('jquery'), true, true);

    wp_register_style( 'ecf-cpt-styles', plugin_dir_url(__FILE__) . 'css/style.css', false, true );
    wp_enqueue_style( 'ecf-cpt-styles' );
}