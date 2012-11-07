var _app = Backbone.View.extend({

    el: $("body"),

    events: {
	    "click .js-open_modal_task": "openTaskWindow",
        "click .js-open_modal_add_task": "openAddTaskWindow"
    },

    initialize: function () {
	    this.window_task = $('#modal-task');
        this.window_add_task = $('#modal-add-task');

        Tasks.fetch({
            success: function(){
                if(Tasks.length > 0){
                    console.log(Tasks)
                }
            },
            error:function () {
                console.log('ERROR Contacts.fetch');
            }
        })
    },

	openTaskWindow: function(){
		this.window_task.modal('show');
	},

    openAddTaskWindow: function(){
        this.window_add_task.modal('show');
    }
});

var App = new _app;
