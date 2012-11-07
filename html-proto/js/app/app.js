var _app = Backbone.View.extend({

    el: $("body"),

    events: {
	    "click .js-open_modal_task": "openTaskWindow"
    },

    initialize: function () {
	    this.window_task = $('#modal-task');
    },

	openTaskWindow: function(){
		this.window_task.modal('show');
	}
});

var App = new _app;
