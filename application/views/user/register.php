<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Hospital | Baby Health Record</title>
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
        </style>
        <link href="<?php echo base_url();?>public/assets/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="<?php echo base_url();?>public/assets/css/datepicker.css" rel="stylesheet">

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
        <script src="<?php echo base_url();?>public/assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>public/assets/js/bootbox.js" rel="stylesheet"  /></script>
    <script src="<?php echo base_url();?>public/assets/js/jqGrid-4.3.1/js/i18n/grid.locale-en.js" type="text/javascript" language="javascript"></script>
    <script src="<?php echo base_url();?>public/assets/js/jqGrid-4.3.1/src/grid.base.js" type="text/javascript" language="javascript"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>public/assets/js/jquery-ui-1.8.21/css/smoothness/jquery-ui-1.8.21.custom.css" />
    <link href="<?php echo base_url();?>public/assets/js/jqGrid-4.3.1/src/css/ui.jqgrid.css" rel="stylesheet"  />
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                jsonp: null,
                jsonpCallback: null
            });
            
            $('#dob').datepicker();
            
            //$('.ccategory').trigger('change');
            $('#main_div').css('min-height',$(window).height()-130);

            $('.jsave_customer').live('click',function(){
                $("#customer_form").submit();
            })

            $.validator.addMethod("checklenght1", function(value, phone_number1) {
                if($("#telephone_no").val().length != 10)
                {
                    return false;
                }
                else
                {
                    return true;
                }
            }, "");

            $("#customer_form").validate({
                rules: {
                    name: {
                        required : true
                    },
                    dob: {
                        required : true
                    },
                    oob: {
                        required : true
                    },
                    delivered_at: {
                        required : true
                    },
                    mode_of_delivery: {
                        required : true
                    },
                    done_by_dr: {
                        required : true
                    },
                    birth_weight: {
                        required : true
                    },
                    head_circumference: {
                        required : true
                    },
                    length: {
                        required : true
                    },
                    blood_group: {
                        required : true
                    },
                    mothers_name: {
                        required : true
                    },
                    mothers_blood_group: {
                        required : true
                    },
                    mothers_occupation: {
                        required : true
                    },
                    fathers_name: {
                        required : true
                    },
                    fathers_blood_group: {
                        required : true
                    },
                    fathers_occupation: {
                        required : true
                    },
                    home_address: {
                        required : true
                    },
                    telephone_no: {
                        required : true
                    }
                },
                messages: {
                    name: {
                        required : "Please Enter Child Name"
                    },
                    dob: {
                        required : "Please Enter Date of Birth"
                    },
                    oob: {
                        required : "Please Enter Order of Birth"
                    },
                    delivered_at: {
                        required : "Please Enter Delivered At"
                    },
                    mode_of_delivery: {
                        required : "Please Enter Mode of Delivery"
                    },
                    done_by_dr: {
                        required : "Please Enter Done by Dr."
                    },
                    birth_weight: {
                        required : "Please Enter Birth Weight"
                    },
                    head_circumference: {
                        required : "Please Enter Head Circumference"
                    },
                    length: {
                        required : "Please Enter Length"
                    },
                    blood_group: {
                        required : "Please Enter Blood Group"
                    },
                    mothers_name: {
                        required : "Please Enter Mother's Name"
                    },
                    mothers_blood_group: {
                        required : "Please Enter Mother's Blood Group"
                    },
                    mothers_occupation: {
                        required : "Please Enter Mother's Occupation"
                    },
                    fathers_name: {
                        required : "Please Enter Father's Name"
                    },
                    fathers_blood_group: {
                        required : "Please Enter Father's Blood Group"
                    },
                    fathers_occupation: {
                        required : "Please Enter Father's Occupation"
                    },
                    home_address: {
                        required : "Please Enter Home Address"
                    },
                    telephone_no: {
                        required : "Please Enter Telephone Number"
                    }
                },
                submitHandler: function()
                {
                    $.ajax({
                        type: "POST",
                        url: '<?php echo site_url();?>records/saveBabyRecord',
                        data: $('#customer_form').serialize(),
                        beforeSend : function(){
                        },
                        success: function(){
                        },
                        complete: function(){
                            window.location.href='<?php echo site_url();?>records/';
                        }
                    });
                }
            });
        });
    </script>
</head>

<body>
    <?php echo $header;?>

    <div class="container-fluid" style="min-height:400px">
        <div class="row-fluid" id="main_div">
            <div class="span12">
                <form name="customer_form" id="customer_form" method="post" >
                    <input type="hidden" name="id" value="<?php echo $cus_data->id;?>">
                    <div class="modal-header">
                        <h3>Baby Health Record</h3>
                    </div>
                    <div class="modal-body">
                        <?php
                        echo $form_html;
                        ?>
                        <div class="cateroy_html" style="display:none">
                        </div>
                        <div>
                            <a href="#" class="btn btn-primary jsave_customer">Submit</a>
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