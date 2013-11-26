requirejs.config({
    urlArgs: "cached=" + new Date().getTime(),
    baseUrl: "assets/js/",
    waitSeconds: 30,
    paths: {
        "jquery": "libs/jquery/jquery",
        "underscore": "libs/underscore/underscore-min",
        "backbone": "libs/backbone/backbone-min",
        "handlebars": "libs/handlebars/handlebars",
        "jqgrid": "libs/jqGrid-4.3.1/js/jquery.jqGrid.min",
        "locale": "libs/jqGrid-4.3.1/js/i18n/grid.locale-en",
        "gridbase": "libs/jqGrid-4.3.1/src/grid.base",
        "jquery-ui": "libs/jquery-ui-1.8.21/js/jquery-ui-1.8.21.custom.min",
        "text": "plugins/requirejs/text",
        "Templates": "templates/Templates",
        "app": "app"
    },
    shim: {
        'underscore': {
            exports: '_'
        },
        'backbone': {
            deps: ['underscore', 'jquery'],
            exports: 'Backbone'
        },
        'handlebars': {
            exports: 'Handlebars'
        },
        'jqgrid':{
            deps:['jquery']
        },
        'jquery-ui':{
            deps:['jquery']
        }
    }
});

require(['app', 'jquery'], function(App, $) {

    $(function() {
        new App().initialize();
        $.ajaxSetup({ 
            cache: false
        });
    });

});