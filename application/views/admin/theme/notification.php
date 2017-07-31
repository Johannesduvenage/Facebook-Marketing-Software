
<ul class="navbar-nav my-lg-0">


    <li class="nav-item ">
        <div class="app-search new-search-height">
            <?php
            echo form_dropdown('fb_rx_account_switch', $fb_rx_account_switching_info, $this->session->userdata("facebook_rx_fb_user_info"), 'class="form-control  pull-right" id="fb_rx_account_switch" style="width:100%;line-height:30px;margin-top:-5px;font-size:14px;"');
            ?>
        </div>
    </li> 

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
        <div class="dropdown-menu dropdown-menu-right animated flipInY">
            <ul class="dropdown-user">
                <li>
                    <div class="dw-user-box">
                        <div class="u-img"><i class="fa fa-user-circle-o" aria-hidden="true"></i></div>
                        <div class="u-text">
                            <h4><?php echo $this->session->userdata('username'); ?></h4>
                            
                    </div>
                </li>
                
                <li><a href="<?php echo site_url('change_password/reset_password_form') ?>"><i class="ti-settings"></i> <?php echo $this->lang->line("change password"); ?></a></li>
                <li role="separator" class="divider"></li>
                <li><a href="<?php echo site_url('home/logout') ?>"><i class="fa fa-power-off"></i> <?php echo $this->lang->line("logout"); ?></a></li>
            </ul>
        </div>
    </li>

</ul>
