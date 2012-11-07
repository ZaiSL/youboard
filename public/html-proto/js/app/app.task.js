$(function() {
    $('.task-edit-header').editable('http://www.example.com/save.php', {
        indicator : 'Saving...',
        tooltip   : 'Double click to edit...',
        event     : 'dblclick',
        style     : "inherit"
    });
    
    $('.task-edit-body').editable('http://www.example.com/save.php', {
        indicator : 'Saving...',
        tooltip   : 'Double click to edit...',
        event     : 'dblclick',
        submit    : 'Save',
        cancel    : 'Cancel',
        type      : 'textarea',
        style     : "inherit"
    });

    $(".task-edit-performer").editable("save.php", {
        indicator : 'Saving...',
        tooltip   : 'Click to edit...',
        data      : "{'deadkrolik':'deadkrolik','Pblcb':'Pblcb','raplos':'raplos','dilanmckey':'dilanmckey','iki':'iki'}",
        type      : "select",
        submit    : "OK",
        style     : "inherit",
        submitdata: function() {
            return {id : 2};
        }
    }); 

    $(".draggable").draggable({snap: ".colum-line_task", snapMode: "inner", snapTolerance: 50});
});