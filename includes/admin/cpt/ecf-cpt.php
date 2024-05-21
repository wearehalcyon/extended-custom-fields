<?php
/**
 * Add ECF custom post type
 */

// Main CPT menu post type
add_action( 'init', 'ecf_register_cpt_field_groups' );
function ecf_register_cpt_field_groups(){
    register_post_type(
        'ecf-fields',
        array(
            'labels'          => array(
                'name'               => __( 'ECF Field Groups', 'ecf' ),
                'menu_name'          => __( 'ECF', 'ecf' ),
                'singular_name'      => __( 'Field Group', 'ecf' ),
                'add_new'            => __( 'Add New', 'ecf' ),
                'add_new_item'       => __( 'Add New Field Group', 'ecf' ),
                'edit_item'          => __( 'Edit Field Group', 'ecf' ),
                'new_item'           => __( 'New Field Group', 'ecf' ),
                'view_item'          => __( 'View Field Group', 'ecf' ),
                'search_items'       => __( 'Search Field Groups', 'ecf' ),
                'not_found'          => __( 'No Field Groups found', 'ecf' ),
                'not_found_in_trash' => __( 'No Field Groups found in Trash', 'ecf' ),
            ),
            'public'          => false,
            'hierarchical'    => true,
            'show_ui'         => true,
            'show_in_menu'    => true,
            '_builtin'        => false,
            'capability_type' => 'post',
            'supports'        => array('title'),
            'rewrite'         => false,
            'query_var'       => false,
            'menu_position'   => 80,
            'menu_icon'       => 'dashicons-welcome-widgets-menus'
        )
    );
}