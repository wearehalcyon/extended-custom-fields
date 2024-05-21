'use strict';

jQuery(document).ready(function($){
    // ECF CPT type changer
    $('#ecf_field_type').on('change', function(event){
        event.preventDefault();

        if ($(this).val() == 'post_type') {
            $('#ecf_field_location_type').removeClass('hide');
            $('#ecf_field_location_taxonomy').addClass('hide');
        } else if ($(this).val() == 'post_taxonomy') {
            $('#ecf_field_location_taxonomy').removeClass('hide');
            $('#ecf_field_location_type').addClass('hide');
        }
    });
});