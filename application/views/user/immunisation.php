<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Hospital | Baby Health Record</title>
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
            .bold{
                font-weight:bold
            }
            div.error {
                color: red;
            }
            .header_cols{
                background-color: #8F3F3F;
                font-weight: 600;
                color: white;
            }
            .dp, .go_dp, .batch{
                height: 27px;
                margin-bottom: 0px;
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
        <script src="<?php echo base_url(); ?>public/assets/js/validate.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>public/assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>public/assets/js/bootbox.js" rel="stylesheet"  /></script>
    <script src="<?php echo base_url(); ?>public/assets/js/jqGrid-4.3.1/js/i18n/grid.locale-en.js" type="text/javascript" language="javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/jqGrid-4.3.1/src/grid.base.js" type="text/javascript" language="javascript"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/js/jquery-ui-1.8.21/css/smoothness/jquery-ui-1.8.21.custom.css" />
    <link href="<?php echo base_url(); ?>public/assets/js/jqGrid-4.3.1/src/css/ui.jqgrid.css" rel="stylesheet"  />
    <script src="<?php echo base_url(); ?>public/assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                jsonp: null,
                jsonpCallback: null
            });
            $('.dp, .go_dp').each(function() {
                $(this).datepicker().on('changeDate', function() {
                    $(this).datepicker('hide');
                });
                /*$(this).blur(function(){
                 $(this).datepicker('hide');
                 });*/
            });
            $('.jsave_imm').live('click', function() {
                $.ajax({
                    type: "POST",
                    url: '<?php echo site_url(); ?>records/saveImmunRecord',
                    data: $('#immun_form').serialize(),
                    beforeSend: function() {
                    },
                    success: function() {
                    },
                    complete: function() {
                        //window.location.href = '<?php echo site_url(); ?>records/';
                    }
                });
            })
        });
    </script>
</head>

<body>
    <?php echo $header; ?>

    <div class="container-fluid" style="min-height:400px">
        <div class="row-fluid" id="main_div">
            <div class="span12">
                <form name="immun_form" id="immun_form" method="post" >
                    <input type="hidden" name="baby_record_id" value="<?php echo $baby_details->id; ?>">
                    <div class="modal-header">
                        <h3>IMMUNISATION RECORD</h3>
                    </div>
                    <div class="modal-body">
                        <table>
                            <tr>
                                <td>Baby Name: </td>
                                <td><?php echo $baby_details->name; ?></td>
                            </tr>
                            <tr>
                                <td>Date of Birth: </td>
                                <td><?php echo $baby_details->dob; ?></td>
                            </tr>
                            <tr>
                                <td>Done by Dr.: </td>
                                <td><?php echo $baby_details->done_by_dr; ?></td>
                            </tr>
                        </table><br />
                        <table border='1' cellpadding='0' cellspacing='0'>
                            <!--<tr>
                                <td colspan="5">IMMUNISATION RECORD</td>
                            </tr>
                            <tr>
                                <td colspan="5">&nbsp;</td>
                            </tr>-->
                            <tr>
                                <td class="header_cols">Age</td>
                                <td class="header_cols">Vaccine</td>
                                <td class="header_cols">Due on</td>
                                <td class="header_cols">Given on</td>
                                <td class="header_cols">Batch</td>
                            </tr>
                            <?php
                            foreach ($imm_frm_details as $age => $imm) {
                                $i = 0;
                                foreach ($imm as $key => $details) {
                                    ?>
                                    <tr>
                                        <?php
                                        if ($i == 0) {
                                            ?>
                                            <td rowspan="<?php echo count($imm_frm_details[$age]); ?>"><?php echo $details['age']; ?></td>
                                            <?php
                                        }
                                        ?>
                                        <td><?php echo $details['vaccine']; ?></td>
                                        <td><input type="text" class="dp" name="data[<?php echo $age; ?>][<?php echo $details['vaccine_id'] ?>][due_on]" data-date-format="dd-mm-yyyy"></td>
                                        <td><input type="text" class="go_dp" name="data[<?php echo $age; ?>][<?php echo $details['vaccine_id'] ?>][given_on]" data-date-format="dd-mm-yyyy"></td>
                                        <td><input type="text" class="batch" name="data[<?php echo $age; ?>][<?php echo $details['vaccine_id'] ?>][batch]"></td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                            }
                            ?>
                            <tr>
                                <td colspan="5" align='middle'>
                                    <div>
                                        <a href="#" class="btn btn-primary jsave_imm">Save</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div class="cateroy_html" style="display:none">
                        </div>

                    </div>

                </form>
            </div><!--/span-->
        </div><!--/row-->
        <hr>
        <!--<footer>
            <p>&copy; Company 2012</p>
        </footer>-->
    </div><!--/.fluid-container-->

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
</body>
</html>