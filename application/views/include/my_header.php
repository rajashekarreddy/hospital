<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#">Hospital</a>
            <div class="nav-collapse">
                <?php
                //if(isset($user_details) && !empty($user_details)) {
                    ?>
                <ul class="nav">
                    <!--<li class="pn <?php echo $active_tab=='user'?'active':'';?>"><a href="#grid">Health Records</a></li>-->
                    <li class="pn <?php echo $active_tab=='user'?'active':'';?>"><a href="<?php echo base_url()?>records">Health Records</a></li>
                </ul>
                <!--<p class="navbar-text pull-right"> <a href="<?php echo site_url();?>login/logout" style="color:silver"> logout</a></p>
                <p class="navbar-text pull-right"> <a href="<?php echo site_url();?>login/changepwd" style="color:silver" > Change Password</a>&nbsp;|&nbsp;</p>
                <p class="navbar-text pull-right"><span style="color:#ffffff"><?php echo $user_details->firstname.' '.$user_details->lastname;?></span>&nbsp;|&nbsp;</p>-->
                <?php
                //}
                ?>

            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>