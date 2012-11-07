var TaskModel = Backbone.Model.extend({
    defaults:function () {
        return {
	        project: 'zfm',
	        summary: 'Новая задача',
	        description: '',
	        permittedGroup: 'ZFM'
        };
    }
})

var TasksCollection = Backbone.Collection.extend({
    model: TaskModel,
    url: '/tasks/all_issues'
})
var Tasks = new TasksCollection;