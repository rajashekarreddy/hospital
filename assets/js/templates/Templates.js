define( function( require ) {
	
	// Define template engine dependency and require each template
	var Handlebars = require('handlebars'),
	
	  _header = require('text!templates/common/header.html'),
	  _dashboardHome = require('text!templates/home/grid.html'),
	  _aboutUs = require('text!templates/home/aboutus.html'),
	  _registration = require('text!templates/home/registration.html');
	  
	  

	// Given a template and an optional arguments object, returns the 
	// compiled template, or, if a context is passed, invokes the compiled 
	// template with the given context.
	var _compiled = function(tpl, context) {
	    var compiled = Handlebars.compile(tpl);
	    return context ? compiled(context) : compiled;
	};

	// Expose a public API which provides named methods for retrieving
	// each compiled template; defer to Handlebars to cache previously
	// compiled templates upon subsequent invocations
	return {
		header: function() {
			return _compiled(_header, arguments[0]);
		},
		dashboardHome: function() {
			return _compiled(_dashboardHome, arguments[0]);
		},
		aboutUs: function() {
			return _compiled(_aboutUs, arguments[0]);
		},
		registration: function() {
			return _compiled(_registration, arguments[0]);
		}

		
	}
});