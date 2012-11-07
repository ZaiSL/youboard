$(function() {
    $('.task-edit-header').editable('http://www.example.com/save.php', {
        indicator : 'Saving...',
        tooltip   : 'Double click to edit...',
        event     : 'dblclick'
    });
    $('.task-edit-body').editable('http://www.example.com/save.php', {
        indicator : 'Saving...',
        tooltip   : 'Double click to edit...',
        event     : 'dblclick',
        submit    : 'Save',
        cancel    : 'Cancel',
        type      : 'textarea'
    });
});