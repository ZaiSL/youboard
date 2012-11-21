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

    //$('.draggable').draggable({snap: ".column-line_task", snapMode: "inner", snapTolerance: 50});
    $('.column-line_task').sortable({connectWith: '.ui-sortable'});

	$('.feature-line .column-line').equalHeights();

    /*$(".droppable").droppable({
        tolerance: "intersect",
        accept: ".draggable",
        //activeClass: "ui-state-default",
        //hoverClass: "ui-state-hover",
        drop: function(event, ui) {      
            //$(this).sortable();  
            $(this).prepend($(ui.draggable));
            $('.placeholder').remove();
        },
        over: function(event, ui) {
            //var plch = '<div class="placeholder"></div>';
            //$(ui.draggable).sortable( { placeholder: "sortable-placeholder" }, $(this), document.body );
            $(this).prepend('<div class="placeholder"></div>');
        },
        activate: function(event, ui) {
            //$(ui.draggable).hide();
            $(this).sortable({placeholder: "srt-p"}, $(ui.draggable))
        },
        out: function(event, ui) {
            $('.placeholder').remove();
        }

});*/
});