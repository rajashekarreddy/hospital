<style type="text/css">
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
                                    <a class="btn btn-primary jsave_imm" ng-click="saveImmunRecord()">Save</a>
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
<script>
    $(document).ready(function() {
        $('.dp, .go_dp').each(function() {
            $(this).datepicker().on('changeDate', function() {
                $(this).datepicker('hide');
            });
        });
        $('.jsave_imm').live('click', function() { alert('hi');
            /*$.ajax({
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
            });*/
        });
    });
</script>
