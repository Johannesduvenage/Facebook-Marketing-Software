<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>assets/images/favicon.png">
    <title><?php echo $this->config->item('product_name')." | ".$page_title;?></title>
    <?php $this->load->view('include/css_include_backnew');?>
	  <?php $this->load->view('include/js_include_backnew');?>
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.png"> 	
  </head>
  
  
<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
     <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

      <?php $this->load->view('admin/theme/header');?>

     

      <!-- Left side column. contains the logo and sidebar -->
      <?php 
        $this->load->view('admin/theme/sidebar');
      ?>

      <!-- Content Wrapper. Contains page content --> 
       <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                
                <div class="row page-titles">
                    <div class="col-md-6 col-sm-12 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url()."facebook_ex_dashboard/index"; ?>">Home</a></li>
                            <li class="breadcrumb-item active"><?php echo $page_title;?></li>
                        </ol>
                    </div>
                    <!--1)
                    <div class="col-md-6 col-4 align-self-center">
                        <!--<button class="right-side-toggle waves-effect waves-light btn-info btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                        <button class="btn pull-right hidden-sm-down btn-success"><i class="mdi mdi-plus-circle"></i> Create</button>-->
                        <!--2)<div class="dropdown pull-right m-r-10 hidden-sm-down">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                January 2017
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">February 2017</a>
                                <a class="dropdown-item" href="#">March 2017</a>
                                <a class="dropdown-item" href="#">April 2017</a>
                            </div>
                        </div>
                    </div>-->
                </div>
                
                
                
      
      <?php
      if($this->uri->segment(2)=="login_config" && ($this->uri->segment(3)=="add" || $this->uri->segment(3)=="edit"))
      { ?>
      <div class="clearfix" style="padding:15px">
        <a class="btn btn-info pull-right" href="https://www.youtube.com/watch?v=5cLYkoL1X5M&feature=youtu.be" target="_BLANK"><?php echo $this->lang->line("how to create facebook app?"); ?></a>
        <a class="btn btn-info pull-left" href="https://youtu.be/1hj0WWEnftU" target="_BLANK"><?php echo $this->lang->line("how to create google auth?"); ?></a> <br/><br/>
        <div class="alert alert-info text-center">
          <b> <?php echo $this->lang->line("google auth redirect url")." : <i>". site_url("home/google_login_back"); ?> </i></b>
        </div>
      </div>
      <?php } ?>

  		<?php 
        if($crud==1) 
			$this->load->view('admin/theme/theme_crud',$output); 
        else 
			$this->load->view($body);
      ?>  
      
     </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->

    <!-- Footer -->
      <?php $this->load->view('admin/theme/footer');?>
    <!-- Footer -->
    
     </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
  </body>
</html>
