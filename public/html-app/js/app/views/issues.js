

/**
 * Вьюха для конкртеного ишью
 * Завязана на модельку конкретного ишью и представляет стикер на доске
 */
App.IssueView = Backbone.View.extend({

    template : App.JST['issues/issue'],

    events : {


    },

    initialize : function (){

    },


    render : function (){

        return this;
    }


});

/**
 * Вьюха для фичи.
 * Завязана на модельку ишью, которое является фичей.
 * Представляет горизонтальную полоску с татлом фичи *
 */
App.FeatureView = Backbone.View.extend({

    template : App.JST['issues/feature'],

    events : {


    },

    initialize : function (){

    },


    render : function (){

        return this;
    }

});


/**
 * Вьюха группы ишью.
 * Завязана на модельку фичи и коллекции из дочерних ишью. Моделька фичи - необязательна
 * Представляет часть доски - полоску фичи и группу дочерних стикеров.
 */
App.IssuesGroupView = Backbone.View.extend({

    template : App.JST['issues/group'],

    events : {


    },

    initialize : function (){

    },


    render : function (){

        return this;
    }

});

/**
 * Вьюха для всей доски с фичами и ишью.
 * Должна попилить коллекцию всех ишью на группы и создать соответсвующие группы.
 */
App.BoardView = Backbone.View.extend({

    template : App.JST['issues/board'],

    events : {


    },

    initialize : function (){

        this.collection.bind('reset', this.render, this);

    },


    render : function (){



        return this;
    }


});