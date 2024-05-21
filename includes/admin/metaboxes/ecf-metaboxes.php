<?php
// add_action('edit_form_advanced', 'ecf_custom_cpt_metaboxes');
// function ecf_custom_cpt_metaboxes(){
//     echo 123;
// }

add_action('add_meta_boxes', 'ecf_cpt_custom_meta_box');
function ecf_cpt_custom_meta_box() {
    add_meta_box(
        'ecf_cpt_meta_box_list',
        'Location',
        'ecf_cpt_meta_box_callback',
        'ecf-fields',
        'normal',
        'high'
    );
}

function ecf_cpt_meta_box_callback($post) {
    wp_nonce_field('ecf_cpt_meta_box_nonce', 'meta_box_nonce');

    $meta_value = get_post_meta($post->ID, '_ecf_cpt_meta_value_key', true);
    $type = isset($meta_value['type']) ? $meta_value['type'] : '';
    $rule = isset($meta_value['rule']) ? $meta_value['rule'] : '';
    $location = isset($meta_value['location']) ? $meta_value['location'] : '';

    include "partials/ecf-locations.php";
}

add_action('save_post', 'save_ecf_cpt_meta_box_data');
function save_ecf_cpt_meta_box_data($post_id) {
    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'ecf_cpt_meta_box_nonce')) {
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

        update_post_meta($post_id, '_ecf_cpt_meta_value_key', $meta_value);
    } else {
        delete_post_meta($post_id, '_ecf_cpt_meta_value_key');
    }
}