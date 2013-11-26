<!DOCTYPE html>
<html ng-app = "demoApp">
    <head>

        <meta charset="utf-8">
        <title>Hospital | Health Records</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="<?php echo base_url(); ?>public/assets/css/bootstrap.css" rel="stylesheet">
        <style type="text/css">
            body {
                padding-top: 60px;
                /*padding-bottom: 40px;*/
            }
            .sidebar-nav {
                padding: 9px 0;
            }
            .ui-pg-input, .uneditable-input {
                width:16px;
            }
            select{
                width:50px;
            }
        </style>
        <link href="<?php echo base_url(); ?>public/assets/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>public/assets/css/datepicker.css" rel="stylesheet">

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="images/favicon.ico">
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
        <script src="<?php echo base_url(); ?>public/assets/js/jquery.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>public/assets/js/jqGrid-4.3.1/js/i18n/grid.locale-en.js" type="text/javascript" language="javascript"></script>
        <script src="<?php echo base_url(); ?>public/assets/js/jqGrid-4.3.1/src/grid.base.js" type="text/javascript" language="javascript"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/js/jquery-ui-1.8.21/css/smoothness/jquery-ui-1.8.21.custom.css" />
        <link href="<?php echo base_url(); ?>public/assets/js/jqGrid-4.3.1/src/css/ui.jqgrid.css" rel="stylesheet"  />
        <script src="<?php echo base_url(); ?>public/assets/js/angular.min.js"></script>
        <script src="<?php echo base_url(); ?>public/assets/js/angular-sanitize.js"></script>
        <script src="<?php echo base_url(); ?>public/assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script>
            var site_url = '<?php echo site_url(); ?>';
            function refreshWindow()
            {
                //document.location.reload();
            }
            var demoApp = angular.module('demoApp', ['ngSanitize']);
            demoApp.config(function($routeProvider) {
                $routeProvider
                        .when('/grid',
                        {
                            controller: 'SimpleController',
                            templateUrl: '<?php echo base_url(); ?>public/assets/views/view1.html'
                        })
                        .when('/record',
                        {
                            controller: 'EditRecord',
                            templateUrl: '<?php echo base_url(); ?>public/assets/views/view2.html'
                        })
                        .when('/record/:recordId', {
                    controller: 'EditRecord',
                    templateUrl: '<?php echo base_url(); ?>public/assets/views/view2.html'
                })
                        .when('/immunisation/:recordId', {
                    controller: 'Immunisation',
                    templateUrl: '<?php echo base_url(); ?>public/assets/views/immunisation.html'
                })
                        .otherwise({redirectTo: '/grid'});
            });

            demoApp.factory('simpleFactory', function() {
                var gods = [{name: 'shiva', city: 'kailasam'},
                    {name: 'krishna', city: 'dwaraka'},
                    {name: 'rama', city: 'ayodya'},
                    {name: 'vishnu', city: 'vaikuntam'}];
                var factory = {};
                factory.getGods = function() {
                    return gods;
                }
                return factory;
            });

            demoApp.controller('SimpleController', function($scope, simpleFactory) {
                $scope.gods = [];
                init();
                function init() {
                    $scope.gods = simpleFactory.getGods();
                }
                $scope.addGod = function() {
                    $scope.gods.push(
                            {
                                name: $scope.newGod.name,
                                city: $scope.newGod.city
                            });
                };
            });

            demoApp.factory('recordDataFactory', function($http, $routeParams) {
                var factory = {};
                factory.getRecordData = function() {
                    if (typeof($routeParams.recordId) == 'undefined')
                    {
                        $routeParams.recordId = 0;
                    }
                    var postData = 'id=' + $routeParams.recordId;
                    return $http({
                        method: 'POST',
                        data: postData,
                        url: 'getRecordDetails',
                        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                    }).success(function(d) {
                        return d;
                    });
                }
                return factory;
            });

            demoApp.controller('EditRecord', function($scope, $http, $routeParams, $location, recordDataFactory) {
                $scope.recordData = [];
                init();
                function init() {
                    recordDataFactory.getRecordData().then(function(response) {
                        $scope.recordData = response.data;
                    });
                }
                $('#dob').datepicker();
                $scope.saveBabyRecord = function() {
                    var postData = $('#baby_record_form').serialize();
                    $http({
                        method: 'POST',
                        data: postData,
                        url: 'saveBabyRecord',
                        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                    }).success(function(data, status) {
                    }).error(function(data, status) {
                    }).then(function(response) {
                        $location.path("/grid");
                    });
                };
            });

            demoApp.factory('immunisationFactory', function($http, $routeParams) {
                var factory = {};
                factory.getImmunisationData = function() {
                    if (typeof($routeParams.recordId) == 'undefined')
                    {
                        $routeParams.recordId = 0;
                    }
                    var postData = 'id=' + $routeParams.recordId;
                    return $http({
                        method: 'POST',
                        data: postData,
                        url: 'immunisation',
                        dataType: 'html',
                        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                    }).success(function(d) {
                        return d;
                    });
                }
                return factory;
            });

            demoApp.factory('SampleService', ["$compile", "$document",
                function($compile, $document) {

                    return {
                        add: function(html, $scope) {
                            var el = angular.element(html);
                            $compile(el)($scope);
                            $document.find("body").append(el);
                        }
                    };
                }
            ]);

            demoApp.controller('Immunisation', function($scope, $http, $routeParams, $location, immunisationFactory, SampleService) {
                $scope.data = [];
                init();
                function init() {
                    immunisationFactory.getImmunisationData().then(function(response) {
                        $scope.data = response.data;
                        $('.dp, .go_dp').each(function() {
                            $(this).datepicker().on('changeDate', function() {
                                $(this).datepicker('hide');
                            });
                        });
                    });
                }

                $scope.saveImmunRecord = function() {
                    var postData = $('#immun_form').serialize();
                    console.log(postData);
                    $http({
                        method: 'POST',
                        data: postData,
                        url: 'saveBabyRecord',
                        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                    }).success(function(data, status) {
                    }).error(function(data, status) {
                    }).then(function(response) {
                        //$location.path( "/grid" );
                    });
                };
            });
        </script>
    </head>
    <body OnResize="refreshWindow()">
<?php echo $header; ?>
        <div>
            <div ng-view=""></div>
        </div>
    </body>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>public/assets/js/bootstrap-transition.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/bootstrap-alert.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/bootstrap-modal.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/bootstrap-dropdown.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/bootstrap-scrollspy.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/bootstrap-tab.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/bootstrap-popover.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/bootstrap-button.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/bootstrap-collapse.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/bootstrap-carousel.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/bootstrap-typeahead.js"></script>
</html>