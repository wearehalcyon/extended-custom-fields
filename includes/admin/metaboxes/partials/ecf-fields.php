<table class="ecf-cpt-table ecf-cpt-fields" cellspacing="0" cellpadding="0">
    <thead>
        <tr>
            <th><strong>Title</strong></th>
            <th><strong>Name</strong></th>
            <th><strong>Type</strong></th>
            <th><strong>Actions</strong></th>
        </tr>
    </thead>
    <tbody>
        <tr class="ecf-cpt-field-row">
            <td>
                <input class="ecf-cpt-name-input" type="text" name="name[]">
            </td>
            <td>
                <input class="ecf-cpt-slug-input" type="text" name="slug[]" value="">
            </td>
            <td>
                <select name="type[]">
                    <optgroup label="Basic">
                        <option value="text">Text</option>
                        <option value="text_area">Text Area</option>
                        <option value="number">Number</option>
                        <option value="email">Email</option>
                        <option value="password">Password</option>
                    </optgroup>
                    <optgroup label="Content">
                        <option value="image">Image</option>
                        <option value="file">File</option>
                        <option value="rich_text_editor">Rich Text Editor</option>
                    </optgroup>
                    <optgroup label="Choice">
                        <option value="checkbox">Checkbox</option>
                        <option value="radio">Radio</option>
                        <option value="select">Select</option>
                        <option value="true_false">True / False</option>
                    </optgroup>
                    <optgroup label="Dynamic">
                        <option value="tab">Tab</option>
                        <option value="repeater">Repeater</option>
                    </optgroup>
                </select>
            </td>
            <td class="ecf-cpt-field-actions">
                <a href="javascript:;" class="link">Duplicate</a>
                <a href="javascript:;" class="delete">Remove</a>
            </td>
        </tr>
    </tbody>
</table>
<div class="add-field-container">
    <a href="javascript:;" class="button button-primary ecf-cpt-add-field">Add Field</a>
</div>