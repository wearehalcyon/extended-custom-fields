<table style="width:100%;">
    <thead>
        <tr>
            <td><strong>Show this field in:</strong></td>
            <td></td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <select id="ecf_field_type" class="refresh-location-rule" name="ecf_field_type" style="width:100%;">
                    <option value="post_type" <?php selected($type, 'post_type'); ?>>Post Type</option>
                    <option value="post_taxonomy" <?php selected($type, 'post_taxonomy'); ?>>Taxonomy</option>
                </select>
            </td>
            <td>
                <select id="ecf_field_rule" class="" name="ecf_field_rule" style="width:100%;">
                    <option value="==" <?php selected($rule, '=='); ?> <?php selected($rule, '=='); ?>>is equal to</option>
                    <option value="!=" <?php selected($rule, '!='); ?> <?php selected($rule, '!='); ?>>is not equal to</option>
                </select>
            </td>
            <td>
                <select id="ecf_field_location" class="ecf_select_dynamic post_types" name="ecf_field_location" style="width:100%;">
                    <?php foreach (get_post_types() as $cpt) : ?>
                        <?php if (
                            $cpt != 'attachment' &&
                            $cpt != 'revision' &&
                            $cpt != 'nav_menu_item' &&
                            $cpt != 'custom_css' &&
                            $cpt != 'customize_changeset' &&
                            $cpt != 'oembed_cache' &&
                            $cpt != 'user_request' &&
                            $cpt != 'wp_block' &&
                            $cpt != 'wp_template' &&
                            $cpt != 'wp_template_part' &&
                            $cpt != 'wp_global_styles' &&
                            $cpt != 'wp_navigation' &&
                            $cpt != 'wp_font_family' &&
                            $cpt != 'wp_font_face' &&
                            $cpt != 'acf-field-group' &&
                            $cpt != 'acf-field' &&
                            $cpt != 'ecf-fields'
                        ) : ?>
                            <option value="<?php echo esc_attr($cpt); ?>" <?php selected($location, $cpt); ?>><?php echo esc_html(ucwords(str_replace(['_', '-'], ' ', $cpt))); ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <select id="ecf_field_location" class="ecf_select_dynamic post_taxonomies hide" name="ecf_field_location" style="width:100%;">
                    <?php foreach (get_taxonomies() as $tax) : ?>
                        <?php if (
                            $tax != 'post_tag' &&
                            $tax != 'nav_menu' &&
                            $tax != 'link_category' &&
                            $tax != 'post_format' &&
                            $tax != 'wp_theme' &&
                            $tax != 'wp_template_part_area' &&
                            $tax != 'wp_pattern_category'
                        ) : ?>
                            <option value="<?php echo esc_attr($tax); ?>"><?php echo esc_html(ucwords(str_replace(['_', '-'], ' ', $tax))); ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
    </tbody>
</table>