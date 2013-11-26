define(function(require){
    var Backbone  = require('backbone'),
    AppRouter = require('routers/AppRouter'),
    DesktopApp = require('views/DesktopApp');
	
    var App = function(){
        var init = function(){
            var desktopApp = new DesktopApp();
            desktopApp.render();
			
            var appRouter = new AppRouter();
            Backbone.history.start();
        };
        return {
            initialize : init
        }
    }
    return App;
});