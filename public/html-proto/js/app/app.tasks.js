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
