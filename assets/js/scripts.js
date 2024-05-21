'use strict';

// Slugify field name
function slugify(text) {
    return text.toString().toLowerCase()
        .replace(/\s+/g, '_')
        .replace(/[^\w\-]+/g, '')
        .replace(/\_\_+/g, '_')
        .replace(/^_+/, '')
        .replace(/_+$/, '');
}

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

    // Name changer
    $(document).on('change', '.ecf-cpt-name-input', function(event){
        event.preventDefault();

        let text = $(this).val();

        $(this).parent().next('td').find('> .ecf-cpt-slug-input').val(slugify(text));
    });

    // Add Field
    $('.ecf-cpt-add-field').click(function(){
        var newRow = $('.ecf-cpt-field-row').last().clone();
        
        newRow.find('input').val('');
        newRow.find('select').prop('selectedIndex', 0);

        newRow.appendTo('.ecf-cpt-table.ecf-cpt-fields tbody');
    });
});