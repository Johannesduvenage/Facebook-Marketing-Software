<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>plugins/grocery_crud/themes/flexigrid/css/flexigrid.css" />
<?php $this->load->view('admin/theme/message'); ?>
<section class="content-header">
	<section class="content">
		<div class="box box-info custom_box user-box col-md-8 col-sm-12 col-xs-12">
			<div class="box-header">
				<h3 class="box-title"><?php echo $this->lang->line("change password"); ?> - <?php echo " [ ".$user_name." ]"; ?></h3>
			</div><!-- /.box-header -->
			<!-- form start -->
			<form class="form-horizontal" action="<?php echo site_url().'admin/change_user_password_action';?>" method="POST">
                            <div class="form-div">
                                 <div class="container">
			                   
                                    <div class="box-body">
				

					<div class="form-group">
                                            <div class="col-sm-12">
						<label class="col-sm-3 control-label left" for="name"><?php echo $this->lang->line("password"); ?> *
						</label>
						<div class="col-sm-9 right">
							<input name="password" value="<?php echo set_value('password');?>"  class="form-control" type="password">		          
							<span class="red"><?php echo form_error('password'); ?></span>
						</div>
                                            </div>
					</div>

					<div class="form-group">
                                            <div class="col-sm-12">
						<label class="col-sm-3 control-label left" for="name"><?php echo $this->lang->line("confirm password"); ?> *
						</label>
						<div class="col-sm-9 right">
							<input name="confirm_password" value="<?php echo set_value('confirm_password');?>"  class="form-control" type="password">		          
							<span class="red"><?php echo form_error('confirm_password'); ?></span>
						</div>
                                            </div>
					</div>



				</div> <!-- /.box-body --> 
				<div class="box-footer">
					<div class="form-group footer-btn">
                                            <div class="col-sm-12 text-center" style="margin-bottom: 20px;">
							<input name="submit" type="submit" class="btn btn-info btn-md" value="<?php echo $this->lang->line("save"); ?>"/>  
							<input type="button" class="btn btn-default btn-md" value="<?php echo $this->lang->line("cancel"); ?>" onclick='goBack("admin/user_management")'/>  
						</div>
					</div>
				</div><!-- /.box-footer -->         
			</div><!-- /.box-info -->      
                            </div>
                        </div>
		</form>     
	</div>
</section>
</section>



