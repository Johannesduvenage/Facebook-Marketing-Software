<style>
    
    .modal-header {
        padding: 0px !important;
    }
span.info-box-icon.bg-aqua {
    background: #fff;
}
.info-box-icon {
	    border-top-left-radius: 2px;
	    border-top-right-radius: 0;
	    border-bottom-right-radius: 0;
	    border-bottom-left-radius: 2px;
	    display: block;
	    float: left;
	    height: 85px;
	    width: 90px;
	    text-align: center;
	    margin: 0 auto;
	    font-size: 88px;
	    line-height: 90px;
	    background: rgba(0,0,0,0.2);
	}

	.info-box {
	    display: block;
            min-height: 90px;
            background: #fff;
            width: 94%;
            box-shadow: 0 1px 1px rgba(0,0,0,0.1);
            border-radius: 2px;
            margin: 15px 0px;
	}
        .info-box:nth-child(1) {
            margin-left: 10px;
        }

    .label {
            padding: 6px 10px;
            font-size: 12px;
    }
    .info-box-content {
            padding: 10px;
            font-weight: 500;
            line-height: 20px;
    }
    .modal-content {
            border: 0px solid rgba(0,0,0,.2);
    }
    .cont-notif-box {
            height: 541px;
            overflow-y: scroll;
            overflow-x: hidden;
     }
     .modal-dialog {
        max-width: 100%;
        margin: 0 30px 30px 0;
        height: 533px;
        overflow-x: scroll;
    }

    .cont-notif-box {
        margin-bottom: 64px;
    }
    @media only screen and (max-width: 767px) {
        .form-group {
            margin-bottom: 30px;
        }
        .modal-dialog {
            max-width: 100%;
            margin: 0 0px 30px 0;
        }
        .radio {
            padding-left: 0px;
        }
    }
</style>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<?php $this->load->view('admin/theme/message'); ?>	
<div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 left" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog  modal-md user-box">
		<div class="modal-content">
			<div class="modal-header">
                            <h3 class="modal-title text-center" style="margin:0px;width:100%;"><i class="fa fa-cogs"></i> Email notification settings</h3>
			</div>
			<div class="modal-body" id="enable_share_modal_body">                
				<form class="form-horizontal" method="POST" action="<?php echo base_url('fb_msg_manager/notification_settings'); ?>">

					<div class="form-group">
						<label class="control-label col-sm-12">Please select your time zone</label>
						<div class="col-sm-12">
							<?php 
							$time_zone = 'Europe/Dublin';
							if(!empty($settings_info))
							{	
								if($settings_info[0]['time_zone'] != '')		    		
									$time_zone = $settings_info[0]['time_zone'];
							}

							echo form_dropdown('time_zone',$time_zone_list,$time_zone,'class="form-control"');
							?>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-12">Do you have FB business manager account ?</label>
						<div class="col-sm-12">
							<?php 
							$check_business = 'no';
							if(!empty($settings_info))
							{					    		
								$check_business = $settings_info[0]['has_business_account'];
							}
							?>

							<div class="radio">
								<label><input type="radio" <?php if($check_business == 'yes') echo "checked"; ?> value="yes" name="has_business_account">Yes <i>[https://business.facebook.com/]</i></label>
							</div>
							<div class="radio">
								<label><input type="radio" <?php if($check_business == 'no') echo 'checked'; ?> value="no" name="has_business_account">No <i>[https://www.facebook.com/]</i></label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-12">Do you want to get  email alert for unread messages ?</label>
						<div class="col-sm-12">
							<?php 
							$checking = 'no';
							if(!empty($settings_info))
							{					    		
								$checking = $settings_info[0]['is_enabled'];
							}
							?>
							<label class="radio-inline">
								<input type="radio" name="get_notification" value="yes" <?php if($checking == 'yes') echo "checked"; ?> >Yes
							</label>
							<label class="radio-inline">
								<input type="radio" name="get_notification" value="no" <?php if($checking == 'no') echo 'checked'; ?> >No
							</label>
						</div>
					</div>

					<div id="second_part" style="display: none;">
						<div class="form-group">
							<label class="control-label col-sm-12">Time interval for getting email alert</label>
							<div class="col-sm-12">
								<?php 
								$option_array = array(
									'60' => '1 hour',
									'90' => '1.5 hours',
									'120' => '2 hours',
									'150' => '2.5 hours',
									'180' => '3 hours',
									'210' => '3.5 hours',
									'240' => '4 hours'
									);
								$selected_option = '60';
								if(!empty($settings_info))
								{					    		
									$selected_option = $settings_info[0]['time_interval'];
								}

								echo form_dropdown('time_interval',$option_array,$selected_option,'class="form-control"');
								?>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-12">Email address to which alert will be sent</label>
							<div class="col-sm-12">
								<input type="email" class="form-control" name="email_address" value="<?php if(!empty($settings_info)) echo $settings_info[0]['email_address']; ?>">
							</div>
						</div>

					</div>
                                        <div class="box-footer">
					<div class="form-group footer-btn"> 
						<div class="col-sm-12 ">
							<button type="submit" class="btn btn-info">Submit</button>
						</div>
					</div>
                                        </div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	if($("input[name=get_notification]:checked").val()=="yes")
		$("#second_part").show();
	
	$(document.body).on('change','input[name=get_notification]',function(){    
    	if($("input[name=get_notification]:checked").val()=="yes")
	    	$("#second_part").show();
    	else 
    		$("#second_part").hide();
    });
</script>



	<div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 right user-box cont-notif-box">		
            <div class="text-center" style="padding:0px;"><h3 class="red" style="margin:0px;width: 102%;"> <i class="fa fa-calendar-check-o"></i> Enable Page For Inbox & Notification</h3></div>
		<div class="row">
			<?php foreach($page_list as $value) : ?>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">				
					<div class="info-box" style="border:1px solid #ccc;">
						<span class="info-box-icon bg-aqua"><?php echo $value['page_profile']; ?></span>
						<div class="info-box-content">
                                                    <span class="info-box-text" style="font-size: 16px;"><?php echo $value['page_name'];;?></span><br>
							<span class="info-box-number" style="margin-top: 15px;"><?php echo $value['msg_manager']; ?></span>
						</div><!-- /.info-box-content -->
					</div><!-- /.info-box -->
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<script>
	$j("document").ready(function(){
		
		var base_url="<?php echo base_url(); ?>";
		
		$(document.body).on('click','.action',function(){
			var table_id = $(this).attr('table_id');
			var action = $(this).attr('action');
			var str = "Do you want to "+action+" messenger manager for this page ?";
			var ans = confirm(str);

			if(ans)
			{
				$.ajax({
					url:base_url+'fb_msg_manager/enable_disable_messenger_manager',
					type:'POST',
					data:{table_id:table_id,action:action},
					success:function(response){
						location.reload();					
					}
					
				});
			}			
			
		});
		
	});
	
	
</script>