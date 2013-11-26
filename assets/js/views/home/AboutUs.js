define(function(require) {

    var $ = require('jquery'),
            Backbone = require('backbone'),
            Templates = require('Templates');

    var HomeView = Backbone.View.extend({
        template: Templates.aboutUs(),
        model: Backbone.Model.extend({}),
        initialize: function() {
            //Backbone.Events.on('poll-complete', this.onPageReload, this);

        },
        render: function() { 
			this.$el.html(this.template());
            return this;
        },
        onLoadExecute: function() {
            
        }

    });

    return HomeView;

});