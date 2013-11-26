define(function(require){
	
    var Backbone  = require('backbone'),
    $ = require('jquery');
    var AppRouter = Backbone.Router.extend({
        routes : {
            '' : 'home',
            'home' : 'home',
            'register' : 'register',
			
            'about-us' : 'about',
            'about-us(/:myid)' : 'about',
	
            '*notFound': 'notFound'
        },
		
        //Home page related routes
        home : function(){
            Backbone.Events.trigger('route:home', 'home');
        },
		
        //Static page route handlers
        about : function(myid){
            Backbone.Events.trigger('route:static', 'aboutus', myid);
        },

        register : function(userid){
            Backbone.Events.trigger('route:register', 'register', userid);
        },
		
        notFound : function(){
            //Backbone.Events.trigger('route:4not4', '404');
            Backbone.Events.trigger('route:home', 'home');
        },

        initialize : function(){
            this.bind("all",function(route, router) {
                if(router){
                    Backbone.Events.trigger('route:changed', router);
                }
            });
        }
    });
    return AppRouter;
});