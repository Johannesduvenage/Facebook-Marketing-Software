<?php 
	if($this->session->userdata('success_message') == 'success')
	{
		echo "<h4 style='margin:0'><div class='alert alert-success text-center'><i class='fa fa-check-circle'></i> Your account has been imported successfully !</div></h4>";
		$this->session->unset_userdata('success_message');
	}

	if($this->session->userdata('limit_cross') != '')
	{
		echo "<h4 style='margin:0'><div class='alert alert-danger text-center'><i class='fa fa-remove'></i> ".$this->session->userdata('limit_cross')."</div></h4>";
		$this->session->unset_userdata('limit_cross');
	}
?>
<style>
	.custom_progress {box-title
	  height: 2px;
	  margin-top: 0px;
	  margin-bottom: 10px;
	  overflow: hidden;
	  background-color: #f5f5f5;
	  border-radius: 4px;
	  -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1);
	          box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1);
	}
	.custom_progress_bar {
	  float: left;
	  width: 0;
	  height: 100%;
	  font-size: 4px;
	  line-height: 6px;
	  color: #fff;
	  text-align: center;
	  background-color: #337ab7;
	  -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .15);
	          box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .15);
	  -webkit-transition: width .6s ease;
	       -o-transition: width .6s ease;
	          transition: width .6s ease;
	}
	
	.account_list{
		padding-left: 5%;
	}
	.individual_account_name{
		font-weight: bold;
		font-size: 14px;
	}
	.padded_ul{
		padding-left: 10%;
	}
	.horizontal_break{
		padding: 2px;
		margin: 0px;
	}

	.info-box-icon {
	    border-top-left-radius: 2px;
	    border-top-right-radius: 0;
	    border-bottom-right-radius: 0;
	    border-bottom-left-radius: 2px;
	    display: block;
	    float: left;
	    height: 55px;
	    width: 90px;
	    text-align: center;
	    font-size: 40px;
	    line-height: 55px;
	    background: rgba(0,0,0,0.2);
	}

	.info-box {
	    display: block;
	    min-height: 50px;
	    //background: #fff;
	    width: 100%;
	    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
	    border-radius: 2px;
	    margin-bottom: 15px;
	}
	.wrapper,.content-wrapper{background: #fafafa !important;}
	.well{background: #fff;}
        .btn.btn-md.btn-info a {color: #fff;}
        .accinfotext{color:#fff;}
        .info-box-content {
            padding: 20px 0;
            font-weight: 500;
        }
        img.img-thumbnail.img-margin {
            width: 60px;
            height: 60px;
        }
</style>
<div class="container">



    <div class="row">
	<?php if($existing_accounts != '0') : ?>
        <div class="col-md-12 col-sm-12" style="margin-bottom:30px;padding: 0px;">
            
                        	<?php  if($this->config->item("backup_mode")==0) : ?>
	<div class="user-box col-md-6 col-sm-12 col-xs-12 left" role="dialog">
            <div class="modal-dialog modal-lg" role="document" style="margin:0px auto;">
			<div class="modal-content">
				<div class="card-title">
                                    
                                    <h3 class="modal-title text-center" style="margin-top:0px;"><i class='fa fa-facebook-official'></i> Add Facebook Account</h3>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12 col-xs-12">
							<input type="text" class="form-control" placeholder="Enter Your Facebook Numeric ID" id="fb_numeric_id" />
							
						</div>
						
                                                <div class="col-xs-12 margin-btn" >
                                                    <button class="btn btn-success btn-resp" id="submit"><i class='fa fa-send'></i> Send App Request</button>
                                                    <span class="label label-info label-fb-num btn-resp"><a href="http://findmyfbid.com/" target="_blank" style="color: white;">How to get FB numeric ID?</a></span>
                                                 </div>
						<div class="col-xs-12" id="response">
							
						</div>

					</div>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
                       <?php  endif;?>
                     <div class="user-box col-md-5 col-sm-12 col-xs-12 right" style="margin-left:15px;">				
                            <h3 style="margin:0px;">
					<div class="well text-center">
						<p><i class="fa fa-facebook-official"></i> Your existing accounts</p>
                                                <p data-toggle="tooltip" title="You must be logged in your facebook account for which you want to refresh your access token. For synch your new page, simply refresh your token. If any access token is restricted for any action, refresh your access token." style="font-size:14px;">Refresh your access token<br/><span class="btn btn-md btn-info" style="color:#fff;"> <?php echo $fb_login_button; ?></span></p>
					</div>
				</h3>
			</div>
           
        </div>
</div>
			<div class="row">
			<?php $i=0; foreach($existing_accounts as $value) : ?>
				<div class="user-box col-md-12 col-sm-12 col-xs-12">
					<div class="box box-primary box-solid box-cont-new">
                                            <div class="box-header with-border" style="position:relative;">
                                                        <h3 class="box-title" style="margin-top: 0px;">
							<i class="fa fa-facebook"></i> <?php echo $value['name']; ?>							
                                                        </h3>
                                                    <div class="box-tools pull-right" style="position:absolute;top:10px;right:0px;background: none;">
                                                        <button class="btn btn-box-tool" data-widget="collapse" style="background: none;"><i class="fa fa-minus"></i></button>
						</div><!-- /.box-tools -->
						</div><!-- /.box-header -->
						<div class="box-body">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<?php 
									if($value['validity'] == 'no')
									{
										echo "<div class='alert alert-danger text-center'><i class='fa fa-close'></i> Your login validity has been expired!</div>";
									}
								?>
								<div class="row">
									<?php $profile_picture="https://graph.facebook.com/me/picture?access_token={$value['user_access_token']}&width=150&height=150"; ?>
									<div class="text-center col-md-2 col-sm-12 col-xs-12">
										<img src="<?php echo $profile_picture;?>" alt="" class='img-responsive profile-pic'>
									</div>
									<div class="col-xs-12 col-md-10 col-sm-12 col-xs-12 accinfotext">
                                                                            <div class="col-xs-12 col-sm-6 col-md-6 left" style="padding:0px;">
										<div class="info-box" >
											<!--<span class="info-box-icon bg-aqua"><i class="fa fa-newspaper-o"></i></span>-->
											<div class="info-box-content card-primary text-center">
												
												<span class="info-box-number"><?php echo number_format($value['total_pages']); ?></span><br/>
                                                                                                <span class="info-box-text"><?php echo $this->lang->line("Total Pages");?></span>
											</div><!-- /.info-box-content -->
										</div><!-- /.info-box -->
                                                                             </div>
                                                                             <div class="col-xs-12 col-sm-6 col-md-6 right">
										<div class="info-box">
											<!--<span class="info-box-icon bg-blue"><i class="fa fa-users"></i></span>-->
											<div class="info-box-content card-success text-center">
                                                                                                <span class="info-box-number">
													<?php echo number_format($value['total_groups']); ?>						
												</span><br/>
												<span class="info-box-text"><?php echo $this->lang->line("Total Groups");?></span>
												
											</div><!-- /.info-box-content -->
										</div><!-- /.info-box -->
                                                                             </div>
                                                                                <button class="delete_account pull-left btn btn-danger" table_id="<?php echo $value['userinfo_table_id']; ?>" data-toggle="tooltip" title="Do you want to remove this account from our database? You can import again."><i class="fa fa-remove"></i> Remove this account</button>
									</div>
																	
								</div><!-- /.row -->

								
                                                                
                                                                <p class="existing_account text-center " >Page List</p>
								<div class="custom_progress"><div class="custom_progress_bar"></div></div>
								<?php foreach($value['page_list'] as $page_info) : ?>
									<div class="row">
                                                                            <div class="col-md-12 col-sm-12 box-3" >
										<div class="col-xs-12 col-sm-2 col-md-2 left">
											<img src="<?php echo $page_info['page_profile']; ?>" alt="" class='img-thumbnail img-margin'>
										</div>
										<div class="col-xs-12 col-sm-6 col-md-7 left">
                                                                                    <p class="txt-pmar"><b class="txt-heading">Name : </b> <?php echo $page_info['page_name']; ?></p>											
											<p class="txt-pmar"><b class="txt-heading">Email : </b> <?php echo $page_info['page_email']; ?></p>
										</div>
										<!-- <div class="col-xs-12 col-sm-12 col-md-1">
											 
										</div> -->
										<div class="col-xs-12 col-sm-4 col-md-3 left margin-btn1">
											<i class="fa fa-close text-danger close-font" table_id="<?php echo $page_info['id']; ?>" title="Do you want to remove this page from our database?" data-toggle="tooltip"></i>  
											
												<a href="<?php echo base_url('facebook_rx_insight/page_insight/facebook_rx_fb_page_info/'.$page_info['id']); ?>" class="btn btn-success pull-right" target="_blank"><i class="fa fa-bar-chart"></i> Analytics</a>
										</div>
                                                                            </div>
									</div>
									<hr class="horizontal_break">
								<?php endforeach; ?>

							</div>

						</div><!-- /.box-body -->
					</div><!-- /.box -->
				</div>

			<?php
				$i++;
				if($i%2 == 0)
					echo "</div><div class='row' style='padding:0 15px;'>";
				endforeach;				
			?>
			</div> 
		</div>
	<?php endif; ?>
</div>


<div class="modal fade" id="delete_confirmation" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">Delete Confirmation</h4>
            </div>
            <div class="modal-body" id="delete_confirmation_body">                

            </div>
        </div>
    </div>
</div>


<script>
	$(document).ready(function(){
	    $('[data-toggle="tooltip"]').tooltip();
	});
	
	$j("document").ready(function() {

		var base_url = "<?php echo base_url(); ?>";

		$(".group_delete").click(function(){
			var ans = confirm('Do you want to delete this group from database?');
			if(ans)
			{
				$("#delete_confirmation_body").html('<img class="center-block" src="'+base_url+'assets/pre-loader/custom_lg.gif" alt="Processing..."><br/>');
				$("#delete_confirmation").modal();

				var group_table_id = $(this).attr('table_id');
				$.ajax
				({
				   type:'POST',
				   // async:false,
				   url:base_url+'facebook_rx_account_import/ajax_delete_group_action',
				   data:{group_table_id:group_table_id},
				   success:function(response)
				    {
				        $("#delete_confirmation_body").html(response);
				    }
				       
				});

			}
		});


		$(".page_delete").click(function(){
			var ans = confirm('Do you want to delete this page from database?');
			if(ans)
			{
				$("#delete_confirmation_body").html('<img class="center-block" src="'+base_url+'assets/pre-loader/custom_lg.gif" alt="Processing..."><br/>');
				$("#delete_confirmation").modal();

				var page_table_id = $(this).attr('table_id');
				$.ajax
				({
				   type:'POST',
				   // async:false,
				   url:base_url+'facebook_rx_account_import/ajax_delete_page_action',
				   data:{page_table_id:page_table_id},
				   success:function(response)
				    {
				        $("#delete_confirmation_body").html(response);
				    }
				       
				});

			}
		});


		$(".delete_account").click(function(){
			var ans = confirm('Do you want to delete this account from database?');
			if(ans)
			{
				$("#delete_confirmation_body").html('<img class="center-block" src="'+base_url+'assets/pre-loader/custom_lg.gif" alt="Processing..."><br/>');
				$("#delete_confirmation").modal();

				var user_table_id = $(this).attr('table_id');
				$.ajax
				({
				   type:'POST',
				   // async:false,
				   url:base_url+'facebook_rx_account_import/ajax_delete_account_action',
				   data:{user_table_id:user_table_id},
				   success:function(response)
				    {
				    	if(response == 'success')
				    	{
				    		var link="<?php echo site_url('home/logout'); ?>"; 
							window.location.assign(link);
				    	}
				    	else
					        $("#delete_confirmation_body").html(response);
				    }
				       
				});

			}
		});


		$('#delete_confirmation').on('hidden.bs.modal', function () { 
			location.reload(); 
		});


		$("#submit").click(function(){
			var fb_numeric_id = $("#fb_numeric_id").val().trim();
			if(fb_numeric_id == '')
			{
                            
				alert("Please Enter Your Facebook Numeric ID First");
				return false;
			}

			var loading = '<br/><br/><img src="'+base_url+'assets/pre-loader/custom.gif" class="center-block"><br/>';
        	$("#response").html(loading);

			$.ajax
			({
			   type:'POST',
			   // async:false,
			   url:base_url+'facebook_rx_account_import/send_user_roll_access',
			   data:{fb_numeric_id:fb_numeric_id},
			   success:function(response)
			    {
			        $("#response").html(response);
			    }
			       
			});
		});

		
		$(document.body).on('click','#fb_confirm',function(){
			var loading = '<br/><br/><img src="'+base_url+'assets/pre-loader/custom.gif" class="center-block"><br/>';
        	$("#response").html(loading);
			$.ajax
			({
			   type:'POST',
			   // async:false,
			   url:base_url+'facebook_rx_account_import/ajax_get_login_button',
			   data:{},
			   success:function(response)
			    {
			        $("#response").html(response);
			    }
			       
			});
		});


	});
</script>