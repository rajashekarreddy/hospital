<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>IAgri | Registration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="<?php echo base_url();?>public/assets/css/bootstrap.css" rel="stylesheet">
        <style type="text/css">
            body {
                padding-top: 60px;
                /*padding-bottom: 40px;*/
            }
            .sidebar-nav {
                padding: 9px 0;
            }
            .bold{
                font-weight:bold
            }
            div.error {
                color: red;
            }
			@media print {
    		#myHeader, #myFooter, #butblock { display: none }
        </style>
        <link href="<?php echo base_url();?>public/assets/css/bootstrap-responsive.css" rel="stylesheet">

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="images/favicon.ico">
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
        <script src="<?php echo base_url();?>public/assets/js/jquery.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>public/assets/js/validate.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>public/assets/js/bootbox.js" rel="stylesheet"  /></script>
    <script src="<?php echo base_url();?>public/assets/js/jqGrid-4.3.1/js/i18n/grid.locale-en.js" type="text/javascript" language="javascript"></script>
    <script src="<?php echo base_url();?>public/assets/js/jqGrid-4.3.1/src/grid.base.js" type="text/javascript" language="javascript"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>public/assets/js/jquery-ui-1.8.21/css/smoothness/jquery-ui-1.8.21.custom.css" />
    <link href="<?php echo base_url();?>public/assets/js/jqGrid-4.3.1/src/css/ui.jqgrid.css" rel="stylesheet"  />
	<script>
	function printPage()
		{
			window.print();
			return true;
		}	
        </script>
</head>

<body>
    <div id="myHeader">
	<?php echo $header;?>
	</div>
    <div class="container-fluid" style="min-height:400px">
        <div class="row-fluid" id="main_div">
            <div class="span12">
                    <div class="modal-header">
                        <h3>User Registration</h3>
                    </div>
                    <div class="modal-body">
						<div>
                            <span>Your IAGRI ID is : </span><span><?php echo $iagri_id;?></span>
                        </div>
						<div>
                           <span>Please note for future references </span>
                        </div>
						<div id="butblock">
                            <a href="#" class="btn btn-primary" onClick="printPage();">print</a>
                        </div>
                    </div>
            </div><!--/span-->
        </div><!--/row-->
        <div id="myFooter">
		<hr>
        <footer>
            <p>&copy; Company 2012</p>
        </footer>
		</div>
    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url();?>public/assets/js/bootstrap-transition.js"></script>
    <script src="<?php echo base_url();?>public/assets/js/bootstrap-alert.js"></script>
    <script src="<?php echo base_url();?>public/assets/js/bootstrap-modal.js"></script>
    <script src="<?php echo base_url();?>public/assets/js/bootstrap-dropdown.js"></script>
    <script src="<?php echo base_url();?>public/assets/js/bootstrap-scrollspy.js"></script>
    <script src="<?php echo base_url();?>public/assets/js/bootstrap-tab.js"></script>
    <script src="<?php echo base_url();?>public/assets/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo base_url();?>public/assets/js/bootstrap-popover.js"></script>
    <script src="<?php echo base_url();?>public/assets/js/bootstrap-button.js"></script>
    <script src="<?php echo base_url();?>public/assets/js/bootstrap-collapse.js"></script>
    <script src="<?php echo base_url();?>public/assets/js/bootstrap-carousel.js"></script>
    <script src="<?php echo base_url();?>public/assets/js/bootstrap-typeahead.js"></script>
</body>
</html>