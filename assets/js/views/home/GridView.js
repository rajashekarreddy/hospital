//test=1
define(function(require) {

    var $ = require('jquery'),
            Backbone = require('backbone'),
            Templates = require('Templates'),
            jqGrid = require('jqgrid'),
            jqueryui = require('jquery-ui'),
            locale = require("locale"),
            gridbase = require("gridbase");

    var HomeView = Backbone.View.extend({
        template: Templates.dashboardHome(),
        model: Backbone.Model.extend({}),
        initialize: function() {
            //Backbone.Events.on('poll-complete', this.onPageReload, this);

        },
        render: function() {
            this.$el.html(this.template());
            return this;
        },
        onLoadExecute: function() {
            jQuery("#customers_grid_tbl").jqGrid431({
                url: base_url+'user/getUsers',
                datatype: "json",
                mtype: "POST",
                colNames: ['IAgri-ID', 'Name', 'Contact#', 'Address', 'City', 'State', 'User Type', 'Edit'],
                colModel: [
                    {name: 'iagri_id', index: 'iagri_id', width: '10%'},
                    {name: 'name', index: 'name', width: '10%'},
                    {name: 'contact_number', index: 'contact_number', width: '10%'},
                    {name: 'address', index: 'address', width: '10%'},
                    {name: 'city', index: 'city', width: '10%'},
                    {name: 'state', index: 'state', width: '10%'},
                    {name: 'category_name', index: 'category_name', width: '20%'},
                    {name: 'edit', index: 'edit', width: '15%'}
                ],
                rowNum: 18,
                height: $(window).height() - 230,
                autowidth: true,
                //rowList:[10,20,30],
                pager: '#customers_grid_pager',
                sortname: 'id',
                viewrecords: true,
                sortorder: "desc",
                multiselect: false,
                childGrid: true,
                childGridIndex: "rows",
                gridComplete: function() {
                    $('.span12 .ui-jqgrid-bdiv').css('overflow', 'hidden'); // hide horizontal scroll bar
                }
            });
        }

    });

    return HomeView;

});