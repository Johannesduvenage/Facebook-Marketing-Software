<style>
    .pDiv {
    margin-top: 0px;
}
</style>
<?php $this->load->view('admin/theme/message'); ?>
<section class="content-header">
   <section class="content col-md-8 col-sm-12 col-xs-12 form-cont">
     	<div class="card card-outline-info">
		    	<div class="card">
                        <div class="table-heading2">
		         <h4 class="card-title"><i class="fa fa-cogs"></i> <?php echo $this->lang->line("general settings");?></h4>
		         </div>
                        </div><!-- /.box-header -->
		       		<!-- form start -->
                                
		    <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url().'admin_config/edit_config';?>" method="POST">
		        <div class="box-body">
		           	<div class="form-group">
                                    <div class="col-sm-12">
		              	<label class="col-sm-3 control-label left" for=""><?php echo $this->lang->line("company name");?>
		              	</label>
		                	<div class="col-sm-9 right">
		               			<input name="institute_name" value="<?php echo $this->config->item('institute_address1');?>"  class="form-control" type="text">		               
		             			<span class="red"><?php echo form_error('institute_name'); ?></span>
		             		</div>
		            </div>
                            </div>
		           <div class="form-group">
                               <div class="col-sm-12">
		             	<label class="col-sm-3 control-label left" for=""><?php echo $this->lang->line("company address");?>
		             	</label>
	             		<div class="col-sm-9 right">
	               			<input name="institute_address" value="<?php echo $this->config->item('institute_address2');?>"  class="form-control" type="text">		          
	             			<span class="red"><?php echo form_error('institute_address'); ?></span>
	             		</div>
                               </div>
		           </div> 

		           <div class="form-group">
                               <div class="col-sm-12">
		             	<label class="col-sm-3 control-label left" for=""><?php echo $this->lang->line("company email");?> *
		             	</label>
	             		<div class="col-sm-9 right">
	               			<input name="institute_email" value="<?php echo $this->config->item('institute_email');?>"  class="form-control" type="email">		          
	             			<span class="red"><?php echo form_error('institute_email'); ?></span>
	             		</div>
                               </div>
		           </div>  


		           <div class="form-group">
                               <div class="col-sm-12">
		             	<label class="col-sm-3 control-label left" for=""><?php echo $this->lang->line("company phone/ mobile");?>
		             	</label>
	             		<div class="col-sm-9 right">
	               			<input name="institute_mobile" value="<?php echo $this->config->item('institute_mobile');?>"  class="form-control" type="text">		          
	             			<span class="red"><?php echo form_error('institute_mobile'); ?></span>
	             		</div>
                               </div>
		           </div> 

		           <div class="form-group form-logo">
                                <div class="col-sm-12">
		             	<label class="col-sm-3 control-label left" for=""><?php echo $this->lang->line("logo");?>
		             	</label>
	             		<div class="col-sm-9 right" >
		           			<div class='text-center' style="background:#357CA5;padding:10px;"><img class="img-responsive" src="<?php echo base_url().'assets/images/logo.png';?>" alt="Logo"/></div>
	               			<?php echo $this->lang->line("Max Dimension");?> : 600 x 300, <?php echo $this->lang->line("Max Size");?> : 200KB,  <?php echo $this->lang->line("Allowed Format");?> : png
	               			<input name="logo" class="form-control" type="file">		          
	             			<span class="red"> <?php echo $this->session->userdata('logo_error'); $this->session->unset_userdata('logo_error'); ?></span>
	             		</div>
                                </div>
		           </div> 

		           <div class="form-group favi-cont">
                               <div class="col-sm-12">
		             	<label class="col-sm-3 control-label left" for=""><?php echo $this->lang->line("favicon");?>
		             	</label>
	             		<div class="col-sm-9 right">
	             			<div class='text-center'><img class="" src="<?php echo base_url().'assets/images/favicon.png';?>" alt="Favicon"/></div>
	               			 <?php echo $this->lang->line("Max Dimension");?> : 32 x 32, <?php echo $this->lang->line("Max Size");?> : 50KB, <?php echo $this->lang->line("Allowed Format");?> : png

	               			<input name="favicon"  class="form-control" type="file">		          
	             			<span class="red"><?php echo $this->session->userdata('favicon_error'); $this->session->unset_userdata('favicon_error'); ?></span>
	             		</div>
                               </div>
		           </div> 

		           <div class="form-group">
                               <div class="col-sm-12">
		             	<label class="col-sm-3 control-label left" for=""><?php echo $this->lang->line("language");?>
		             	</label>
	             		<div class="col-sm-9 right">	             			
	               			<?php
							$select_lan="english";
							if($this->config->item('language')!="") $select_lan=$this->config->item('language');
							echo form_dropdown('language',$language_info,$select_lan,'class="form-control" id="language"');  ?>		          
	             			<span class="red"><?php echo form_error('language'); ?></span>
	             		</div>
                               </div>
		           </div>

		        
		           <div class="form-group">
                               <div class="col-sm-12">
		             	<label class="col-sm-3 control-label left" for=""><?php echo $this->lang->line("time zone");?>
		             	</label>
	             		<div class="col-sm-9 right">	             			
	               			<?php	$time_zone['']="Time Zone";
							echo form_dropdown('time_zone',$time_zone,$this->config->item('time_zone'),'class="form-control" id="time_zone"');  ?>		          
	             			<span class="red"><?php echo form_error('time_zone'); ?></span>
	             		</div>
                               </div>
		           </div> 

		           
		         		               
		           </div> <!-- /.box-body --> 

		           	<div class="box-footer">
		            	<div class="form-group footer-btn">
		             		<div class="col-sm-12 ">
		               			<input name="submit" type="submit" class="btn btn-info btn-md btn-size" value="<?php echo $this->lang->line("Save");?>"/>  
		              			<input type="button" class="btn btn-default btn-md btn-size" value="<?php echo $this->lang->line("Cancel");?>" onclick='goBack("admin_config",1)'/>  
		             		</div>
		           		</div>
		         	</div><!-- /.box-footer -->         
		        </div><!-- /.box-info -->       
		    </form>     
     	</div>
   </section>
</section>



