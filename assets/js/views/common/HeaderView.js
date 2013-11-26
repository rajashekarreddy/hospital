//test=1
define(function(require) {

    var $ = require('jquery'),
            Backbone = require('backbone'),
            Templates = require('Templates');

    var HeaderView = Backbone.View.extend({
        template: Templates.header(),
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

    return HeaderView;

});