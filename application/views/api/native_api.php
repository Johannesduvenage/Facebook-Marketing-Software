<?php $this->load->view('admin/theme/message'); ?>

<section class="card card-outline-info col-lg-8 col-md-12 col-sm-12 col-xs-12 margin-btn" style="padding: 0px;" >
   <section class="card">
	     	<?php 
			$text="Generate Your ".$this->config->item("product_short_name")." API Key";
			$get_key_text="Get Your ".$this->config->item("product_short_name")." API Key";
			if(isset($api_key) && $api_key!="") 
			{
				$text="Re-generate Your ".$this->config->item("product_short_name")." API Key";
				$get_key_text="Your ".$this->config->item("product_short_name")." API Key";
	   		} 
	   		?>
		    	
		    <!-- form start -->
		    <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url().'native_api/get_api_action';?>" method="GET">
		        <div class="box-body" style="padding-top:0;">
		           	<div class="form-group card card-outline-info">
		           		<div class="small-box bg-blue card-header new1">
                                             <div class="col-sm-12">
							<div class="m-b-0 col-sm-10 left">
								<h4 class=""><?php echo $get_key_text; ?></h4>
								<p>									
		   							<h2 class="key-head"><?php echo $api_key; ?></h2>
								</p>
								<input name="button" type="submit" class="btn btn-success btn-lg btn-md btn-sm btn text-white" value="<?php echo $text; ?>"/>
							</div>
							   <div class="icon col-sm-2 right key-icon">
								<i class="fa fa-key"></i>
							</div>
                                             </div>
						</div>
		            </div>	           
	         		               
		           </div> <!-- /.box-body -->      
		    </form> 	


		<?php 
		if($api_key!="") { ?>
                   
                    <div id='' class="padd-cont col-sm-12 col-xs-9">
				<h4 style="margin:0">
					<div class="alert alert-info" style="margin-bottom:0;">
						<i class="fa fa-clock-o"></i> Membership expiry alert Cron job command [Once per day]
					</div>
				</h4>
				<div class="well" style="background:#F9F2F4;margin-top:0;border-radius:0;;">
					<?php echo "curl ".site_url("native_api/send_notification")."/".$api_key; ?>
				</div>
			</div>

			<div id='' class="padd-cont col-sm-12 col-xs-9">
				<h4 style="margin:0">
					<div class="alert alert-info" style="margin-bottom:0;">
						<i class="fa fa-clock-o"></i> Auto lead list sync Cron job command [Once per day]
					</div>
				</h4>
				<div class="well" style="background:#F9F2F4;margin-top:0;border-radius:0;;">
					<?php echo "curl ".site_url("native_api/auto_lead_list_sync")."/".$api_key; ?>
				</div>
			</div>

			<div id='' class="padd-cont col-sm-12 col-xs-9">
				<h4 style="margin:0">
					<div class="alert alert-info" style="margin-bottom:0;">
						<i class="fa fa-clock-o"></i> Send inbox messages Cron job command [Once per minute or higher]
					</div>
				</h4>
				<div class="well" style="background:#F9F2F4;margin-top:0;border-radius:0;;">
					<?php echo "curl ".site_url("native_api/fb_exciter_send_inbox_message")."/".$api_key; ?>
				</div>
			</div>

			<div id='' class="padd-cont col-sm-12 col-xs-9">
				<h4 style="margin:0">
					<div class="alert alert-info" style="margin-bottom:0;">
						<i class="fa fa-clock-o"></i> Send auto private reply on comment Cron job command [Once per five minute or higher]
					</div>
				</h4>
				<div class="col-sm-12 well" style="background:#F9F2F4;margin-top:0;border-radius:0;;">
					<?php echo "curl ".site_url("native_api/send_auto_private_reply_on_comment_on_fbexciter")."/".$api_key; ?>
				</div>
			</div>

			<div id='' class="padd-cont col-sm-12 col-xs-9">
				<h4 style="margin:0">
					<div class="alert alert-info" style="margin-bottom:0;">
						<i class="fa fa-clock-o"></i> Alert for unread messages Cron job command [Once per hour or higher]
					</div>
				</h4>
				<div class="well" style="background:#F9F2F4;margin-top:0;border-radius:0;;">
					<?php echo "curl ".site_url("native_api/send_messenger_notification")."/".$api_key; ?>
				</div>
			</div>

			<div id='' class="padd-cont col-sm-12 col-xs-9">
				<h4 style="margin:0">
					<div class="alert alert-info" style="margin-bottom:0;">
						<i class="fa fa-clock-o"></i> CTA poster Cron job command [Once per hour or higher]
					</div>
				</h4>
				<div class="well" style="background:#F9F2F4;margin-top:0;border-radius:0;;">
					<?php echo "curl ".site_url("native_api/cta_poster_cron_job")."/".$api_key; ?>
				</div>
			</div>
                   
		<?php }?>
		<!-- seperator****************************************************** -->
		

   </section>
</section>



