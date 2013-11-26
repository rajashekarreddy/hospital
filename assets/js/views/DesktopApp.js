define(function(require) {

    var $ = require('jquery'),
    Backbone = require('backbone'),
    Templates = require('Templates')

    var DesktopApp = Backbone.View.extend({
        mainDiv: $('#main-content'),
        headerDiv: $('#header'),
        render: function() {
            this.loadDefaultViews();
        },
        initialize: function() {
            Backbone.Events.on('route:static', this.showStaticPage, this);
            Backbone.Events.on('route:home', this.showHomeUI, this);
            Backbone.Events.on('route:register', this.showRegistrationUI, this);
        },
        showHomeUI: function(subRoute) {

            /*$('#main-content').html('Home Page');
            
            /*if (subRoute == "home") {
                this.showHomeDefaultUI();
            }*/
			
            this.showHomeDefaultUI();

        },
        showHomeDefaultUI: function() {
            this.removeMainView();
            var GridView = require('views/home/GridView');
            var self = this;

            var gridView = new GridView();
            this.currentMainView = gridView;
			
            gridView.render().$el.hide().appendTo(self.mainDiv).fadeIn(500, function() {
                gridView.onLoadExecute();
                
            });

        },
        
        showStaticPage: function(subRoute,myid) {
            this.removeMainView();
            var AboutUs = require('views/home/aboutUs');
            var self = this;

            var aboutUs = new AboutUs();
            this.currentMainView = aboutUs; 
			
            aboutUs.render().$el.hide().appendTo(self.mainDiv).fadeIn(500, function() {
                aboutUs.onLoadExecute();               
                
            });
        },
        showRegistrationUI: function(subRoute,userid) {
            this.removeMainView();
            var Registration = require('views/home/registration');
            var self = this;

            var registration = new Registration();
            this.currentMainView = registration;

            registration.render().$el.hide().appendTo(self.mainDiv).fadeIn(500, function() {
                registration.onLoadExecute();

            });
        },
        removeMainView: function() {
            this.mainDiv.empty();
            if (this.currentMainView) {
                this.currentMainView.remove();
            //$.blockUI();
            }
        },
        loadDefaultViews: function() {
            var HeaderView = require('views/common/HeaderView');
            var headerView = new HeaderView();
            var headerHtml = headerView.render().el;
            $(headerHtml).hide().appendTo(this.headerDiv).fadeIn(500);
		
        }
    });

    return DesktopApp;

});