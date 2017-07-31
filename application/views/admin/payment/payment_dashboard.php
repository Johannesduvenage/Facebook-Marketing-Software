<!-- Small boxes (Stat box) -->
<?php 
if($total_user=="") $total_user=0;
if($total_paid_amount=="") $total_paid_amount=0;
if($this_month_total_user=="") $this_month_total_user=0;
if($this_month_paid_amount=="") $this_month_paid_amount=0;
if($today_user=="") $today_user=0;
if($today_paid_amount=="") $today_paid_amount=0;
 ?>
<!-- E-->

 <!--row 1 start-->                 
<div class="row">
		<h2 class="font-medium text-inverse dash-heading"><?php echo $this->lang->line("total report") ?></h2>
	</div>

<div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-6 col-xlg-6">
                        <div class="card card-inverse card-info">
                            <div class="box bg-info text-center padd-box">
                                <h1 class="font-light text-white"><?php echo $total_user; ?></h1>
                                <h6 class="text-white"><?php echo $this->lang->line("total users") ?></h6>
                            </div>
                       
                            <span align="center" style="background-color:#006fb0;padding: 10px 0;"><a href="<?php echo site_url('payment/admin_payment_history'); ?>" class="small-box-footer"><?php echo $this->lang->line("more info") ?> <i class="fa fa-arrow-circle-right"></i></a></span>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-6 col-xlg-6">
                        <div class="card card-primary card-inverse ">
                            <div class="box text-center padd-box">
                                <h1 class="font-light text-white"><?php echo $total_paid_amount." ".$currency; ?></h1>
                                <h6 class="text-white"><?php echo $this->lang->line("total paid amount") ?></h6>
                            </div>
                            <span align="center" style="background-color: #5143a7; padding: 10px 0;"><a href="<?php echo site_url('payment/admin_payment_history'); ?>" class="small-box-footer"><?php echo $this->lang->line("more info") ?> <i class="fa fa-arrow-circle-right"></i></a></span>
                        </div>
                    </div>
                </div>
<!--row 1 end-->
<!--row 2 start-->
<div class="row">
		<h2 class="font-medium text-inverse dash-heading"><?php echo $this->lang->line("this month's report") ?></h2>
	</div>

<div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-6 col-xlg-6">
                        <div class="card card-inverse card-info">
                            <div class="box bg-info text-center padd-box">
                                <h1 class="font-light text-white"><?php echo $this_month_total_user; ?></h1>
                                <h6 class="text-white"><?php echo $this->lang->line("new users") ?></h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-6 col-xlg-6">
                        <div class="card card-primary card-inverse">
                            <div class="box text-center padd-box">
                                <h1 class="font-light text-white"><?php echo $this_month_paid_amount." ".$currency; ?></h1>
                                <h6 class="text-white"><?php echo $this->lang->line("total paid amount") ?></h6>
                            </div>
                           
                        </div>
                    </div>
                </div>
<!--row 2 end-->
<!--row 3 start-->
<div class="row">
		<h2 class="font-medium text-inverse dash-heading"><?php echo $this->lang->line("today's report") ?></h2>
	</div>

<div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-6 col-xlg-6">
                        <div class="card card-inverse card-info">
                            <div class="box bg-info text-center padd-box">
                                <h1 class="font-light text-white"><?php echo $today_user; ?></h1>
                                <h6 class="text-white"><?php echo $this->lang->line("new users") ?></h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-6 col-xlg-6">
                        <div class="card card-primary card-inverse">
                            <div class="box text-center padd-box">
                                <h1 class="font-light text-white"><?php echo $today_paid_amount." ".$currency; ?></h1>
                                <h6 class="text-white"><?php echo $this->lang->line("total paid amount") ?></h6>
                            </div>
                           
                        </div>
                    </div>
                </div>
<!--row 3 end-->
<!-- E-->
