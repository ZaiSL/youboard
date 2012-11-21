


/**
 * Главная вьюха всего приложения.
 * Включает в себя верхний тулбар и контейнер для вьюхи доски. *
 * */
App.AppView = Backbone.View.extend({

    boardView : null,
    addIssueView : null,

    events : {
        'click .add-issue-button' : 'addIssueButtonClick' //
    },

    initialize : function(){

    },

    render : function (){

        App.issues = new App.Issues();

        this.boardView = new App.BoardView({
            //el : $('wrapper'),
            collection : App.issues
        });

        App.issues.fetch();

    },

    addIssueButtonClick : function (){

        var issue = new App.Issue();

        if (!this.addIssueView) {
            this.addIssueView = new App.AddIssueSidebarView({model : issue });
        } else {
            this.addIssueView.model = issue;
        }

        this.addIssueView.render();
        this.addIssueView.open();

    }


});