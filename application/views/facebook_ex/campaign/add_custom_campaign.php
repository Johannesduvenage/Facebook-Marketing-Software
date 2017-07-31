<style>
    .datagrid-view{
        width: 100% !important;
        margin: 15px;
    }
  input#search_client_username, select#search_page {
    width: 100%;
}
.datagrid .panel-body {
   height: 100% !important;
}

    .chat_box {
    width: 96% !important;
   margin: 7px !important;
}

.alert {
    padding: 0px;
    margin-bottom: 0px;
   
}
h3.modal-title {
    width: 100%;
    margin: 0px;
}
.form-group2 {
    margin-bottom: 20px !important;
}
h4.box-title {
    color: #2c2b2e;
    background: rgba(0, 192, 239, 0.02);
    margin-top: 15px;
    border-bottom: 1px solid #54667a !important;
    box-shadow: 1px 0px 2px 0px #ccc;
    text-align: center;
    padding: 10px;
}
.modal-header {
    width: 100%;
    padding: 0px;
}
input#delay_time {
    width: 100%;
    height: 40px;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding-left: 10px;
}
#emotion_container {
    margin-top: -9px;
    border-bottom-right-radius: 5px;
    border-bottom-left-radius: 5px;
}
.chat-header1 {
    background: #fff !important;
    color: #55ce63 !important;
    padding: 0px 0 10px 0 !important;
    text-align:center;
}
.chat_header.chat-header1 {
    font-size: 20px;
}
.chat_body1 {
   border: 0px solid #ccc !important;
}
.chat_footer {
    border: 0px solid #ccc !important;
}
.box-body1 {
    padding :10px !important;
    background: #eaeaea !important;
}
</style>
<?php $this->load->view('admin/theme/message'); ?>

<!-- Main content -->

<section class="content user-box" >  
	<div class="row" >
		<div class="col-sm-12 col-xs-12">
                    <h3 class = 'text-info' style="margin-top:0px;"><i class="fa fa-group"></i> <?php echo $this->lang->line("Custom Campaign : Lead List");?></h3>
                    <div class="col-sm-12 col-xs-12" style="text-align:center">
                        <div class="col-sm-12 col-xs-12" style="width:100%; min-height:1000px;">
                                    <table 
                                    id="tt"  
                                    class="easyui-datagrid table-responsive" 
                                    url="<?php echo base_url()."facebook_ex_campaign/custom_campaign_data"; ?>" 
                                    pagination="true" 
                                    rownumbers="true" 
                                    toolbar="#tb" 
                                    pageSize="50" 
                                    pageList="[5,10,15,20,50,100]"  
                                    fit= "true" 
                                    fitColumns= "true" 
                                    nowrap= "true" 
                                    view= "detailview"
                                    idField="id"
                                    >							
                                            <thead>
                                                    <tr>
                                                            <th field="id" checkbox="true"></th>
                                                            <th field="client_id" sortable="true"><?php echo $this->lang->line("Client ID")?></th>
                                                            <th field="client_username_formatted" sortable="true"><?php echo $this->lang->line("Client Username")?></th>
                                                            <th field="client_thread_id" sortable="true"><?php echo $this->lang->line("Message Thread ID")?></th>						
                                                            <th field="page_name_formatted" sortable="true"><?php echo $this->lang->line("Page Name")?></th>						
                                                    </tr>
                                            </thead>
                                    </table>                        
                            </div>
                        </div>
			<div id="tb">

				<?php
			        $search_page_id  = $this->session->userdata('facebook_ex_conversation_custom_page_id');
			        $search_username  = $this->session->userdata('facebook_ex_conversation_custom_username');
				?>

				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<a style="color: #fff;" id="create_new_custom_campaign" class="btn btn-info" title="<?php echo $this->lang->line("Create New Campaign"); ?>">
						<i class="fa fa-plus-circle"></i> <?php echo $this->lang->line("Create New Campaign"); ?>
						</a>

						<a href="#" data-placement="bottom"  data-toggle="popover" data-trigger="focus" title="Custom Campaign" data-content="You can create a bulk message campaign by selecting any lead group you want. Select your leads and and click 'Create New Campaign' button. System will filter multiple instances of same lead for same campaign, means one user will not recieve same campaign message multiple times.">&nbsp;&nbsp;<i class='orange fa-2x fa fa-info-circle'></i> </a>

						<br/>
					</div>
				</div>

				<form class="form-inline" style="margin-top:20px">
                                      <div class="col-sm-12" style=" padding: 0px;">
					<div class="form-group col-sm-5 left" style=" padding: 0px;">
						<input id="search_client_username" name="search_client_username" value="<?php echo $search_username;?>" class="form-control" size="20" placeholder="Client User Name">
					</div>

					<div class="form-group form-group2 col-sm-5 left">
						<select name="search_page" id="search_page"  class="form-control">
							<option value="">All Page</option>	
							<?php
								foreach ($page_info as $key => $value) 
								{
									if($value['page_id'] == $search_page_id)
									echo "<option selected value='".$value['page_id']."'>".$value['page_name']."</option>";
									else echo "<option value='".$value['page_id']."'>".$value['page_name']."</option>";
								}
							?>						
						</select>
					</div>
                                          <div col-sm-2 right>
                                                <button class='btn btn-success "'  onclick="doSearch(event)"><?php echo $this->lang->line("search lead");?></button>				
                                          </div>
                                      </div>
				</form> 
			</div>
	</div>   
</section>





<div class="modal fade" id="add_custom_campaign_modal" data-backdrop="static" data-keyboard="false" >
	<div class="modal-dialog custom-popup user-box" style="width: 85% !important;margin-top: 30px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">New Custom Campaign</h3>
			</div>
			<div class="modal-body">

				<div class="row padding-5">
					<div class="col-xs-12 col-md-8 padding-10 user-box" >
						<div class="box box-primary">
							<div class="box-header ui-sortable-handle  text-center" style="cursor: move;margin-bottom: 0px;">
								
                                                            <h4 class="box-title" style="margin:0px;"><i class="fa fa-paper-plane"></i> Custom Campaign</h4>
								<!-- tools box -->
								<div class="pull-right box-tools"></div><!-- /. tools -->
							</div>
							<div class="box-body">
								<form action="#" enctype="multipart/form-data" id="inbox_campaign_form" method="post">
									<div class="form-group form-group2">
										<label>
											Campaign Name 
											<a href="#" data-placement="top" data-toggle="popover" data-trigger="focus" title="Campaign Name" data-content="Put a name so that you can identify it later"><i class='fa fa-info-circle'></i> </a>
										</label>
										<input type="text" class="form-control"  name="campaign_name" id="campaign_name">
									</div>
									<div class="form-group form-group2">
										<label>
											Message *
											<a href="#" data-placement="bottom"  data-toggle="popover" data-trigger="focus" title="Message" data-content="Message may contain texts, urls and emotions.You can include #LEAD_USER_NAME# variable by clicking 'Include Lead User Name' button. The variable will be replaced by real names when we will send it. If you want to show links or youtube video links with preview, then you can use 'Paste URL' OR 'Paste Youtube Video URL' fields below. Remember that if you put url/link inside this message area, preview of 'Paste URL' OR 'Paste Youtube Video ID' will not work. Then, the first url inside this message area will be previewed."><i class='fa fa-info-circle'></i> </a>
										</label>
										<span class='pull-right'> 
											<a href="#" data-placement="top"  data-toggle="popover" data-trigger="focus" title="Include lead user last name"" data-content="You can include #LEAD_USER_LAST_NAME# variable inside your message. The variable will be replaced by real names when we will send it."><i class='fa fa-info-circle'></i> </a> 
											<a title="Include lead user name" class='btn btn-default btn-sm' id="lead_last_name"><i class='fa fa-user'></i> Include "Last Name"</a>
										</span>
										<span class='pull-right'> 
											<a href="#" data-placement="top"  data-toggle="popover" data-trigger="focus" title="Include lead user first name"" data-content="You can include #LEAD_USER_FIRST_NAME# variable inside your message. The variable will be replaced by real names when we will send it."><i class='fa fa-info-circle'></i> </a> 
											<a title="Include lead user name" class='btn btn-default btn-sm' id="lead_first_name"><i class='fa fa-user'></i> Include "First Name"</a>
										</span>	
										<textarea class="form-control" name="message" id="message" placeholder="Type your message here..." style="height:170px;#emotion_container { border-bottom-right-radius: 0px;border-bottom-left-radius: 0px;}"></textarea>
										<div class='text-center' id="emotion_container"><?php echo $emotion_list;?></div>
									</div>
									
                                                                    <div class="form-group form-group2 col-xs-12 col-md-12" style="padding:0px;">
										<label>
											Paste URL <br/><small>(will be attached & previewed)</small>
											<a href="#" data-placement="top"  data-toggle="popover" data-trigger="focus" title="Paste URL" data-content="Paste any url, make sure your url contains http:// or https://. This url will be attched after your message with preview."><i class='fa fa-info-circle'></i> </a>
										</label>
										<input class="form-control" name="link" id="link"  type="text" placeholder="http://example.com">
									</div>	

									<div class="form-group form-group2 col-xs-12 col-md-12 text-center">
										<label></label>
										<h4 style="margin:30px 0;" title="Eiher url or video will be previewed and attached at the bottom of message">OR</h4>
									</div>	

									<div class="form-group form-group2 col-xs-12 col-md-12" style="padding:0px;">
										<label>
											Paste Youtube Video URL  <br/><small>(will be attached & previewed)</small>
											<a href="#" data-placement="top"  data-toggle="popover" data-trigger="focus" title="Paste Youtube Video URL" data-content="Paste any Youtube video URL, make sure your youtube url looks like https://www.youtube.com/watch?v=VIDEO_ID or https://youtu.be/VIDEO_ID. This video url will be attched after your message with preview."><i class='fa fa-info-circle'></i> </a>
										</label>
										<input class="form-control" name="video_url" id="video_url" type="text" placeholder="https://www.youtube.com/watch?v=VIDEO_ID"> 
									</div>

									
									<img id="preview_loading" class="loading center-block" src="<?php echo base_url("assets/pre-loader/Fading squares2.gif");?>" alt="">
								    <div class="clearfix"></div>
									
									<!-- mostofa -->
									<!-- <div class="alert alert-danger text-center" id="alert_div" style="display: none; font-size: 600;"></div> -->
									<h4><div class='alert alert-warning text-center' style="padding:10px;-webkit-border-radius:10px !important;,-moz-border-radius:10px !important;,border-radius:10px !important;">You have selected <span id="thread_count">0</span> leads</div></h4>
								

									<div class="form-group form-group2">
				                        <label style="width:100%;">
				                       		Exclude these leads
				                        	<a href="#" data-placement="top" data-toggle="popover" data-trigger="focus" title="Do not send message to these leads" data-content="You can choose one or more. The leads you choose here will be unlisted form this campaign and will not recieve this message. Start typing a lead name, it's auto-complete."><i class='fa fa-info-circle'></i> </a>
			                        
				                        </label>
				                        <select name="do_not_send[]" id="do_not_send" multiple="multiple" class="tokenize-sample form-control do_not_send_autocomplete">                                     
				                        </select>
				                    </div> 	

									<div class="row">
										<div class="form-group form-group2 col-md-12 col-sm-12 col-xs-12 ">
											<label class="col-md-6 col-sm-12 col-xs-12 left"  style="padding:0px;">
												Delay time (seconds)
												 <a href="#" data-placement="top" data-toggle="popover" data-trigger="focus" title="Delay time" data-content="Delay time is the delay between two successive message send. It is very important because without a delay time facebook may treat bulk sending as spam. Put input integer value in seconds upto 15 secs. Keep it '0' to get random delay."><i class='fa fa-info-circle'></i> </a>
											</label>
											<div class="col-md-6 col-sm-12 col-xs-12 right">
											<input name="delay_time" value="0" min="0" max="15" id="delay_time" type="number"><br/>0 means random
                                                                                        </div>
										</div>

                                                                            <div class="form-group form-group2 col-xs-12 col-md-12" style="padding: 0px;">
                                                                                <label class="col-md-12 col-sm-12 col-xs-12 control-label label-txt">
												Embed unsubscribe link
												 <a href="#" data-placement="top" data-toggle="popover" data-trigger="focus" title="Embed unsubscribe link with message" data-content="You can embed 'unsubscribe link' with the message you send. Just enable it and system will automaticallly add the link at the bottom. Clicking the link will unsubscribe the lead. You can use your own method to serve this purpose if you want."><i class='fa fa-info-circle'></i> </a>
											</label>
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
											<input name="unsubscribe_button" value="0" id="unsubscribe_button_disable" checked type="radio"> Disable &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<input name="unsubscribe_button" value="1" id="unsubscribe_button_enable" type="radio"> Enable 
                                                                                     
                                                                                    </div>
                                                                                </div>
                                                                            
									</div>

                                                                        <div class="form-group form-group2 col-xs-12 col-md-12" style="padding:0px;">
										<label class="col-md-12 col-sm-12 col-xs-12 control-label label-txt" style="padding:0px;">
											Schedule
											 <a href="#" data-placement="top" data-toggle="popover" data-trigger="focus" title="Schedule" data-content="You can either send message now or can schedule it later. If you want to sed later the schedule it and system will automatically process this campaign as time and time zone mentioned. Schduled campaign may take upto 1 hour lomger than your schedule time depending on server's processing.."><i class='fa fa-info-circle'></i> </a>
										</label>
										 <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
										<input name="schedule_type" value="now" id="schedule_now" checked type="radio"> Now &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input name="schedule_type" value="later" id="schedule_later" type="radio"> Later 
                                                                                 </div>
									</div>							

									<div class="form-group form-group2 schedule_block_item col-xs-12 col-md-12">
										<label>Schedule time  <a href="#" data-placement="top"  data-toggle="popover" data-trigger="focus" title="Schedule Time" data-content="Select date and time when you want to process this campaign."><i class='fa fa-info-circle'></i> </a></label>
										<input placeholder="Time"  name="schedule_time" id="schedule_time" class="form-control datepicker" type="text"/>
									</div>

									<div class="form-group form-group2 schedule_block_item col-xs-12 col-md-12">
										<label>
											Time zone
											 <a href="#" data-placement="top" data-toggle="popover" data-trigger="focus" title="Time zone" data-content="Server will consider your time zone when it process the campaign."><i class='fa fa-info-circle'></i> </a>
										</label>
										<?php
										$time_zone[''] = 'Please Select';
										echo form_dropdown('time_zone',$time_zone,set_value('time_zone'),' class="form-control" id="time_zone" required'); 
										?>
									</div>					 

									<div class="clearfix"></div>

									<div class="box-footer clearfix">
										<div class="col-xs-12 footer-btn">
											<button style='margin-bottom:10px;' class="<?php if($campaign_limit_status=="3") echo 'disabled ';?>btn btn-info center-block btn-md" id="submit_post" name="submit_post" type="button"><i class="fa fa-send"></i> Submit Campaign </button>
										</div>
									</div>
									<?php if($campaign_limit_status=="3") echo "<h4><div class='alert alert-danger text-center'><i class='fa fa-remove'></i> Sorry, your monthly limit to create campaign is exceeded. You can not create another campaign this month. <a href='".site_url('payment/usage_history')."'>".$this->lang->line("See usage log")."</a></div></h4>"?>
									<?php  echo "<h4 id='monthly_message_send_limit'><div class='alert alert-danger text-center'><i class='fa fa-remove'></i> Sorry, your monthly limit to send message is exceeded. <a href='".site_url('payment/usage_history')."'>".$this->lang->line("See usage log")."</a></div></h4>"?>

									<div class="alert text-center" id="response_modal_content"></div>

								</form>
							</div>
							
						</div>
					</div>  <!-- end of col-6 left part -->


                                        <div class="col-xs-12 col-md-3 padding-10 user-box" >
						<div class="box box-primary" style="margin-bottom:20px;">
							<div class="box-header ui-sortable-handle  text-center" style="cursor: move;margin-bottom: 0px;">
								
								<h4 class="box-title" style="margin:0px;"><i class="fa fa-facebook-official"></i> Inbox Preview</h4>
								<!-- tools box -->
								<div class="pull-right box-tools"></div><!-- /. tools -->
							</div>
							<div class="box-body preview box-body1">					
								
								<div class="chat_box">
									<div class="chat_header chat-header1">
										<span id="page_name">Page Name</span>
									</div>
									<div class="chat_body chat_body1 ">
										<img id="page_thumb" class="pull-left" src="<?php echo base_url("assets/images/chat_box_thumb.png");?>">
										<span id="preview_message" class="pull-left"><span id="preview_message_plain">Your message goes here...</span><span id="preview_message_link"></span></span>
										<div class="clearfix"></div>
										<div id="video_thumb" class="pull-left">
											<div id="video_embed">
												<!-- <iframe width="100%" height="100" src="https://www.youtube.com/embed/SP8o501ORJ4" frameborder="0" allowfullscreen></iframe> -->
											</div>
											<div id="video_info">								
												<div id="video_info_title"></div>
												<div id="video_info_description"></div>
												<div id="video_info_youtube">youtube.com</div>
											</div>
										</div>

										<div class="clearfix"></div>
										<div id="link_thumb" class="pull-left">
											<div class="col-xs-5" id="link_embed"></div>
											<div class="col-xs-7" id="link_info">
												<div id="link_info_title"></div>
												<div id="link_info_description"></div>
												<div id="link_info_website"></div>
											</div>	
										</div>

									</div>
                                                                        <div class="clearfix"><hr></div>
									<div class="chat_footer">
										<img src="<?php echo base_url("assets/images/chat_box.png");?>" class="img-responsive">
									</div>
								</div>
							</div>							
						</div>



						<div class="box box-primary">
							<div class="box-header ui-sortable-handle  text-center" style="cursor: move;margin-bottom: 0px;">
								
                                                            <h4 class="box-title" style="margin:0px;"><i class="fa fa-cogs"></i> Send Test Message</h4>
								<!-- tools box -->
								<div class="pull-right box-tools"></div><!-- /. tools -->
							</div>
							<div class="box-body" id="test_msg_box_body">
								<div class="alert" id="test_send_modal_content">
									<form id="test_message_form">
										<img id="test_loading" class="loading center-block" src="<?php echo base_url("assets/pre-loader/Fading squares2.gif");?>" alt="">
										<h4><div id="test_message_response" class="table-responsive"></div></h4>
										<div class="form-group">
					                        <label class="text-center">
					                       		Choose up to 3 leads to test how it will look. Start typing, it's auto-complete.                       	
					                        </label>
					                        <select  name="test_send[]" id="test_send" multiple="multiple" class="tokenize-sample form-control test_send_autocomplete">                                     
					                        </select>
					                    </div>
					                     <div class="box-footer clearfix">
                                                                                <div class="col-xs-12 footer-btn ">
											<button class="<?php if($campaign_limit_status=="3") echo 'disabled ';?> btn btn-info btn-md" id="submit_test_post" name="submit_test_post" type="button"><i class="fa fa-envelope"></i> Send Test Message </button>
										</div> 
                                                             </div>
									</form>
								</div>
							</div>
						</div>




					</div> <!-- end of col-6 right part -->

				</div>




				
			</div>			
		</div>
	</div>
</div>




<?php $this->load->view("facebook_ex/campaign/style");?>
<script src="<?php echo base_url();?>plugins/multiselect_tokenize/jquery.tokenize.js" type="text/javascript"></script>

<script>

 
	$j("document").ready(function(){


		var base_url="<?php echo base_url();?>";

		$('[data-toggle="popover"]').popover(); 
		$('[data-toggle="popover"]').on('click', function(e) {e.preventDefault(); return true;});

		$(".schedule_block_item,#video_thumb,#link_thumb,#preview_message_link,.loading,#monthly_message_send_limit").hide();
		$(".overlay").hide();

		var today = new Date();
		var next_date = new Date(today.getFullYear(), today.getMonth() + 1, today.getDate());
		$j('.datepicker').datetimepicker({
			theme:'dark',
			format:'Y-m-d H:i:s',
			formatDate:'Y-m-d H:i:s',
			minDate: today,
			maxDate: next_date
		})	

		$j("#inbox_to_pages").multipleSelect({
            filter: true,
            multiple: true
        });	


        $(document.body).on('click','#create_new_custom_campaign',function(){ 
        	var rows = $j('#tt').datagrid('getSelections');
          	var info=JSON.stringify(rows);  
          	var info_array = JSON.parse(info);
          	var selected = info_array.length;
          	var upto = 1000;
          	if(rows=="") 
	        {
	            alert("Please select one or more (up to "+upto+") leads to create custom campaign.")
	            return;
	        }
	        if(selected>upto) 
	        {
	            alert("You can select upto "+upto+" leads. You have selected "+selected+" leads.")
	            return;
	        }
	        $("#thread_count").html(selected);
            $("#add_custom_campaign_modal").modal();
        });


        $(document.body).on('change','input[name=schedule_type]',function(){    
        	if($("input[name=schedule_type]:checked").val()=="later")
        	$(".schedule_block_item").show();
        	else 
        	{
        		$("#schedule_time").val("");
        		$("#time_zone").val("");
        		$(".schedule_block_item").hide();
        	}
        }); 


        function message_change()
        {
        	var message=$(this).val();
        	message=message.replace(/[\r\n]/g, "<br />");

        	if( $("#preview_message_link").html() != "") message = message + "<br/>";

        	$("#preview_message").show();
        	$("#preview_message_plain").show();

        	var words = message.split(" ");    
    		var img;
    		var src;
    		for (var i = 0; i < words.length; i++) 
    		{
			    words[i] = words[i].replace(/"/g,""); // replce all " from message

			    if(typeof($(".emotion[eval=\""+words[i]+"\"]").attr("title"))==='undefined') continue;			    
			    
		    	src = $(".emotion[eval=\""+words[i]+"\"]").attr("title");	
		    	src =  "<?php echo base_url('assets/images/emotions-fb');?>/"+src+".gif";	    	
		    	img= "<img src='"+src+"'>";
		    	message = message.replace(words[i], img);			    
			}	

        	$("#preview_message_plain").html(message).text();
        	if(message=="" && $("#preview_message_link").html() == "") $("#preview_message").hide(); 
        }

        $(document.body).on('keyup','#message',message_change); 
        $(document.body).on('blur','#message',message_change);

     
        $(document.body).on('click','.emotion',function(){  
        	var img_link = $(this).attr("src");
        	var eval = $(this).attr("eval");
        	var caretPos = document.getElementById("message").selectionStart;
		    var textAreaTxt = $("#message").val();
		    var txtToAdd = " "+eval+" ";
		    $("#message").val(textAreaTxt.substring(0, caretPos) + txtToAdd + textAreaTxt.substring(caretPos) );
		    $("#message").blur();
		});


        $(document.body).on('click','#lead_first_name',function(){  
		    var caretPos = document.getElementById("message").selectionStart;
		    var textAreaTxt = $("#message").val();
		    var txtToAdd = " #LEAD_USER_FIRST_NAME# ";
		    $("#message").val(textAreaTxt.substring(0, caretPos) + txtToAdd + textAreaTxt.substring(caretPos) );
		    $("#preview_message_plain").html($("#message").val());
		});


		$(document.body).on('click','#lead_last_name',function(){  
		    var caretPos = document.getElementById("message").selectionStart;
		    var textAreaTxt = $("#message").val();
		    var txtToAdd = " #LEAD_USER_LAST_NAME# ";
		    $("#message").val(textAreaTxt.substring(0, caretPos) + txtToAdd + textAreaTxt.substring(caretPos) );
		    $("#preview_message_plain").html($("#message").val());
		});

   
 		$(document.body).on('blur','#link',function(){  
        	var link=$("#link").val();  
        	
	        if(link!='')
	        {
	            $("#preview_loading").show();
	            $.ajax({
	            type:'POST' ,
	            url:"<?php echo site_url();?>facebook_ex_campaign/link_grabber",
	            data:{link:link},
	            dataType : 'JSON',
	            success:function(response){	 

	            	$("#preview_loading").hide();          		                
	             
               	 	if(response.status=='0')
               	 	{
               	 		alert("URL is invalid.");
               	 		$("#link").val("");
               	 		$("#link_thumb").hide();
               	 		$("#preview_message").css("-webkit-border-radius","10px");       
            			$("#preview_message").css("-moz-border-radius","10px");       
            			$("#preview_message").css("border-radius","10px"); 
               	 	}
               	 	else
               	 	{
            			if(response.image=="") response.image= "<?php echo base_url('assets/images/chat_box_thumb2.png');?>";
            			$("#link_embed").html("<img src='"+response.image+"'>");
            			$("#link_info_title").html(response.title);
            			$("#link_info_description").html(response.description);
            			var link_author=link;
            			link_author = link_author.replace("http://", ""); 
	                	link_author = link_author.replace("https://", ""); 
	                	link_author = link_author.replace("www.", ""); 
	                	
	                	if($("#message").val() == "")
            			$("#preview_message_link").html("<a href='"+link+"' target='_BLANK'>"+link+"</a>").show();
            			else $("#preview_message_link").html("<br/><a href='"+link+"' target='_BLANK'>"+link+"</a>").show();
            			
            			$("#link_info_website").html(link_author);
            			$("#link_thumb").show(); 
            			$("#video_thumb").hide(); 
            			$("#video_url").val("");

            			if( $("#message").val() == "") 
            			$("#preview_message_plain").hide();            	
            			else 
            			{
            				$("#preview_message").css("-webkit-border-radius","10px 10px 10px 0");       
            				$("#preview_message").css("-moz-border-radius","10px 10px 10px 0");       
            				$("#preview_message").css("border-radius","10px 10px 10px 0");       
            			}
               	 	}
                             
	            }
	        }); 	            
	        }
	        else 
	       	{
	       		$("#link_thumb").hide(); 
	       		$("#preview_message_link").hide();
	       		$("#preview_message").css("-webkit-border-radius","10px");       
            	$("#preview_message").css("-moz-border-radius","10px");       
            	$("#preview_message").css("border-radius","10px"); 
	       	}     		      
            
        });


        $(document.body).on('blur','#video_url',function(){  
        	var link=$("#video_url").val();  
	        if(link!='')
	        {
	            $("#preview_loading").show();
	            $.ajax({
	            type:'POST' ,
	            url:"<?php echo site_url();?>facebook_ex_campaign/youtube_video_grabber",
	            data:{link:link},
	            dataType : 'JSON',
	            success:function(response){	           		                
	             	
	       			$("#preview_loading").hide();   
               	 	if(response.status=='0')
               	 	{
               	 		alert("Youtube URL is invalid.");
               	 		$("#video_url").val("");
               	 		$("#video_thumb").hide();
               	 	}
               	 	else
               	 	{
            			$("#video_embed").html(response.video_embed);
            			$("#video_info_title").html(response.title);
            			$("#video_info_description").html(response.description);
            			
            			if($("#message").val() == "")
            			$("#preview_message_link").html("<a href='"+link+"' target='_BLANK'>"+link+"</a>").show();
            			else $("#preview_message_link").html("<br/><a href='"+link+"' target='_BLANK'>"+link+"</a>").show();
            			
            			$("#video_thumb").show(); 
            			$("#link_thumb").hide(); 
            			$("#link").val("");

            			if( $("#message").val() == "") 
            			$("#preview_message_plain").hide();
            				
            			else 
            			{
            				$("#preview_message").css("-webkit-border-radius","10px 10px 10px 0");       
            				$("#preview_message").css("-moz-border-radius","10px 10px 10px 0");       
            				$("#preview_message").css("border-radius","10px 10px 10px 0");       
            			}
               	 	}
                             
	            }
	        }); 	            
	        }	
	        else 
	       	{
	       		$("#video_thumb").hide(); 
	       		$("#preview_message_link").hide();
	       		$("#preview_message").css("-webkit-border-radius","10px");       
            	$("#preview_message").css("-moz-border-radius","10px");       
            	$("#preview_message").css("border-radius","10px"); 
	       	}  
            
        });


        
        


	    $(document.body).on('click','#submit_test_post',function(){ 
	    	var thread_ids = $('.test_send_autocomplete').tokenize().toArray();
	    	if(thread_ids.length==0) 
	    	{
	    		alert("Please choose any lead to send test message.");
	    	 	return;
	    	}
	    	var message = $("#message").val();
	    	var link = $("#link").val();
	    	var video_url = $("#video_url").val();

	    	if(message=="" && link==""&&  video_url=="")
    		{
    			alert("Please type a message or paste url/video url. System can not send blank message.");
    			return;
    		} 
    	    $("#test_loading").show();
    	    $("#submit_test_post").addClass("disabled");
	        $.ajax({
		       type:'POST' ,
		       url: base_url+"facebook_ex_campaign/send_test_message",
		       data: {message:message,link:link,video_url:video_url,thread_ids:thread_ids},
		       success:function(response)
		       {  	    	 			
	 			  $("#test_loading").hide();
	 			  $("#submit_test_post").removeClass("disabled");
	 			  $("#test_message_response").html(response);
		       	  
		       }
	      	});
	    });



	    $(document.body).on('click','#submit_post',function(){ 
       
            var campaign_limit_status = "<?php echo $campaign_limit_status?>";
            if(campaign_limit_status=="3")
            {
            	alert(" Sorry, your monthly limit to create campaign is exceeded. You can not create another campaign this month.");
            	return;
            }

            var rows = $j('#tt').datagrid('getSelections');
          	var info=JSON.stringify(rows);
          	var upto = 1000;
          	if(rows=="") 
	        {
	            alert("Please select one or more (up to "+upto+") leads to create custom campaign.")
	            return;
	        }	       
        	
    		if($("#message").val()=="" && $("#link").val()==""&&  $("#video_url").val()=="")
    		{
    			alert("Please type a message or paste url/video url. System can not send blank message.");
    			return;
    		}        	              	
      
        	var schedule_type = $("input[name=schedule_type]:checked").val();
        	var schedule_time = $("#schedule_time").val();
        	var time_zone = $("#time_zone").val();
        	if(schedule_type=='later' && (schedule_time=="" || time_zone==""))
        	{
        		alert("Please select schedule time/time zone.");
        		return;
        	}

        	$("#response_modal_content").removeClass("alert-danger");
        	$("#response_modal_content").removeClass("alert-success");
        	var loading = '<img src="'+base_url+'assets/pre-loader/Fading squares2.gif" class="center-block">';
        	$("#response_modal_content").html(loading);
        	$("#response_modal_content").show();

        	var report_link = base_url+"facebook_ex_campaign/campaign_report";
        	var success_message = "<i class='fa fa-check-circle'></i> Campaign have been submitted successfully. <a href='"+report_link+"'>See report</a>";

        	$("#response_modal_content").removeClass("alert-danger");
         	$("#response_modal_content").addClass("alert-success");
         	$("#response_modal_content").html(success_message);

         	var campaign_name = $("#campaign_name").val();
         	var message = $("#message").val();
         	var link = $("#link").val();
         	var video_url = $("#video_url").val();
         	var do_not_send = $('.do_not_send_autocomplete').tokenize().toArray();
         	var schedule_type = $("input[name=schedule_type]:checked").val();
         	var unsubscribe_button = $("input[name=unsubscribe_button]:checked").val();
         	var delay_time = $("#delay_time").val();
         	var schedule_time = $("#schedule_time").val();
         	var time_zone = $("#time_zone").val();

		      $.ajax({
			       type:'POST' ,
			       url: base_url+"facebook_ex_campaign/create_custom_campaign_action",
			       data: {campaign_name:campaign_name,message:message,link:link,video_url:video_url,do_not_send:do_not_send,schedule_type:schedule_type,schedule_time:schedule_time,time_zone:time_zone,info:info,unsubscribe_button:unsubscribe_button,delay_time:delay_time},
			       success:function(response)
			       {  
			       }
		      	});
		    $(this).addClass("disabled");
        });



    });

    $(document).ready(function(){
        var base_url="<?php echo base_url();?>";
        $('.do_not_send_autocomplete').tokenize({
            datas: base_url+"facebook_ex_campaign/lead_autocomplete/1"
        });

        $('.test_send_autocomplete').tokenize({
            datas: base_url+"facebook_ex_campaign/lead_autocomplete/0",
            maxElements : 3
        });
    })

</script>


<script>   

    function doSearch(event)
	{
		event.preventDefault(); 
		$j('#tt').datagrid('load',{
			search_client_username   :     $j('#search_client_username').val(),             
			search_page   		:     $j('#search_page').val(),     
			is_searched		:     1
		});

	}   	
</script>


