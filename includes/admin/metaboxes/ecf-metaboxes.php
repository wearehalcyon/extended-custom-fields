<?php
// add_action('edit_form_advanced', 'ecf_custom_cpt_metaboxes');
// function ecf_custom_cpt_metaboxes(){
//     echo 123;
// }

// Fields
add_action('add_meta_boxes', 'ecf_cpt_custom_meta_box_fields', 1);
function ecf_cpt_custom_meta_box_fields() {
    add_meta_box(
        'ecf_cpt_meta_box_fields',
        'Fields List',
        'ecf_cpt_meta_box_callback_fields',
        'ecf-fields',
        'normal',
        'high'
    );
}
function ecf_cpt_meta_box_callback_fields($post){
    wp_nonce_field('ecf_cpt_meta_box_nonce_fields', 'meta_box_nonce');

    $meta_value = get_post_meta($post->ID, '_ecf_cpt_fields', true);

    include "partials/ecf-fields.php";
}

// Location
add_action('add_meta_boxes', 'ecf_cpt_custom_meta_box_location', 2);
function ecf_cpt_custom_meta_box_location() {
    add_meta_box(
        'ecf_cpt_meta_box_location',
        'Location (Rule group)',
        'ecf_cpt_meta_box_callback_location',
        'ecf-fields',
        'normal',
        'high'
    );
}
function ecf_cpt_meta_box_callback_location($post) {
    wp_nonce_field('ecf_cpt_meta_box_nonce_location', 'meta_box_nonce');

    $meta_value = get_post_meta($post->ID, '_ecf_cpt_location', true);
    $type = isset($meta_value['type']) ? $meta_value['type'] : '';
    $rule = isset($meta_value['rule']) ? $meta_value['rule'] : '';
    $location = isset($meta_value['location']) ? $meta_value['location'] : '';

    include "partials/ecf-locations.php";
}

add_action('save_post', 'save_ecf_cpt_meta_box_data');
function save_ecf_cpt_meta_box_data($post_id) {
    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'ecf_cpt_meta_box_nonce_location')) {
        return $post_id;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    if (isset($_POST['ecf_field_type']) && isset($_POST['ecf_field_rule']) && isset($_POST['ecf_field_location'])) {
        $type = sanitize_text_field($_POST['ecf_field_type']);
        $rule = sanitize_text_field($_POST['ecf_field_rule']);
        $location = sanitize_text_field($_POST['ecf_field_location']);

        $meta_value = array(
            'type' => $type,
            'rule' => $rule,
            'location' => $location
        );

        update_post_meta($post_id, '_ecf_cpt_location', $meta_value);
    } else {
        delete_post_meta($post_id, '_ecf_cpt_location');
    }
}

// Settings
add_action('add_meta_boxes', 'ecf_cpt_custom_meta_box_settings', 3);
function ecf_cpt_custom_meta_box_settings() {
    add_meta_box(
        'ecf_cpt_meta_box_settings',
        'Settings',
        'ecf_cpt_meta_box_callback_settings',
        'ecf-fields',
        'normal',
        'high'
    );
}
function ecf_cpt_meta_box_callback_settings($post){
    wp_nonce_field('ecf_cpt_meta_box_nonce_settings', 'meta_box_nonce');

    $meta_value = get_post_meta($post->ID, '_ecf_cpt_settings', true);

    include "partials/ecf-settings.php";
}