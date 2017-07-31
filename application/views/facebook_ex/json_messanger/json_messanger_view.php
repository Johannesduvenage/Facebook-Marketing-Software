
<style>
    .ajax-upload-dragdrop {
        width: 100% !important;
    }
    .chat_box {
        width: 100% !important;
        background: #fff;
        margin: 0 auto;
        padding: 20px;
    }
    #json_thumb_container {
    max-width: 100% !important;
    margin: 0px !important;
        border: 0px solid #ccc !important;
    }
    
    #json_level4 {
        width: 100% !important;
           margin-bottom: 20px; 
    }
    .chat-box-cont{
        margin-top: 0px;
        border: 1px solid #ccc;
        margin-bottom: 30px;
    }
    .chat_body {
    height: 450px !important;
    overflow-y: auto;
    border: 1px solid #ccc;
    padding: 10px 5px 10px 10px;
}
.ajax-file-upload-filename {
    width: 100% !important;
    word-break: break-all;
}
.ajax-file-upload-statusbar {
   width: 100% !important;
    word-break: break-all;
}
.chat-header1 {
    background: #fff !important;
    color: #55ce63 !important;
    padding: 0px 0 10px 0 !important;
}
.chat_header.chat-header1 {
    font-size: 20px;
}
.user-box{margin-bottom: 30px;}
#page_thumb {
   margin-left: -27px;
    padding: 0px;
}
.chat-box-cont1 {
    margin-top: -23px;
    border: 0px solid #ccc;
    padding: 0px;
    margin-bottom: 30px;
}
.chat_body1 {
   border: 0px solid #ccc !important;
    padding: 0px !important;
}
.form-group5 {
    margin-bottom: 30px;
}
.chat_footer {
    border: 0px solid #ccc !important;
}
div#json_level1 {
    border: 0px solid #ccc;
    padding: 0 0 10px 10px;
    border-top: 0px;
}
img#json_page_thumb {
    border: 0px solid #ccc;
    border-bottom: 0px;
    padding: 10px 0;
}
.level_class {
    padding: 0px 5px;
    border-top: 0px solid #ccc !important;
    
}
a#view_website {
    color: #018ec6;
        word-break: break-all;
}
a#start_chatting{
   word-break: break-all;
   color: #f0ad4e;
}
div#json_message_title,div#json_message_subtitle{
   word-break: break-all;
}
div#json_level2,div#json_level3 {
    padding: 10px 5px;
    border-top: 0px solid #ccc !important;
    border: 0px solid #ccc !important;
    word-break: break-all;
}
a#reply2 {
    background: #ccc;
    color: #4f4d4d;
    border: 0px;
    box-shadow: 0px 0px 0px #ddd !important;
    border: 0px solid #bbb !important;
}

div#json_level2 {
    background: #efefef;
    padding-left: 10px;
    border-radius: 5px;
}
div#json_level3 {
    background: #fff5e1;
    margin-top: 10px;
}
img#json_page_thumb1 {
    border: 2px dotted #ccc;
    padding: 10px;
    margin-top: 30px;
}
.ajax-file-upload-statusbar{
     border: 2px dotted #ccc !important;
     margin: 0px !important;
}
.ajax-upload-dragdrop {
    border: 2px dotted #ccc !important;
    width: 420px;
}
.box-body1 {
    padding :20px 20px !important;
    background: #eaeaea !important;
}
h3{
     margin-bottom: 0.0rem !important;
}   
</style>

<?php $this->load->view("include/upload_js"); ?>
<div class="row padding-20">
	<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <div class="box box-primary user-box" >
			<div class="box-header ui-sortable-handle  text-center" style="cursor: move;margin-bottom: 0px;">
				
				<h3 class="box-title" style="margin-top:0px;"><i class="fa fa-paper-plane" style="padding-right: 10px;"></i>Messanger AD JSON script</h3>
				<!-- tools box -->
				<div class="pull-right box-tools"></div><!-- /. tools -->
			</div>
                
			<div class="box-body">
				<form action="#" enctype="multipart/form-data" id="inbox_json_form" method="post">
					<div class="row">
                                            <div class="col-sm-12">
						<div class="form-group form-group5" style="padding: 0px;">
							<label class="col-md-12 col-sm-12 col-xs-12  control-label label-txt">
								Image Url
							</label>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
							<input class="form-control" name="image_url_link" id="image_url_link" type="text" placeholder="http://example.com/images/1.png"> 
						
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12 " style="padding: 0px;">
                                                <div class="form-group form-group5" style="position:relative;">
                                                    <hr class="border-lft">
                                                    <h4 style="margin: 0px;" class="text-center">OR</h4>
                                                     <hr class="border-rht">
						</div>	
                                                </div>
						<div class="col-sm-12">
							<div class="form-group form-group5">
                                                            <div  class="col-md-8 col-sm-12 col-xs-12 left" style="padding: 0px;">
                                                            <label class=" control-label label-txt" >Upload Image</label>
                                                            <div id="image_url">Upload</div>
                                                            </div>
                                                                <div class="col-md-4 col-sm-12 col-xs-12 right" >
								
                                                                 <img id="json_page_thumb1" style="width:100%;height:auto;" class="img-responsive" src="<?php echo base_url("assets/images/chat_box_thumb3.jpg");?>">
                                                                </div>
							</div>
                                                       
						</div>
                                            </div>
                                           
						<div class="col-md-12 col-sm-12 col-xs-12">		
						<div class="form-group form-group5">
							<label class="col-md-12 col-sm-12 col-xs-12 control-label label-txt">
								Title
							</label>
                                                     <div class="col-md-12 col-sm-12 col-xs-12">
							<input class="form-control" name="message_title" id="message_title" type="text" placeholder="Welcome"> 
						
                                                     </div>
                                                </div>
                                                </div>
                                            <div class="col-sm-12">
						<div class="form-group form-group5">
							<label class="col-md-12 col-sm-12 col-xs-12 control-label label-txt">
								Sub-Title
							</label>
                                                     <div class="col-md-12 col-sm-12 col-xs-12">
							<input class="form-control" name="message_subtitle" id="message_subtitle" type="text" placeholder="Subtitle"> 
                                                     </div>
                                                </div>
					
                                            </div>

                                            <div class="col-sm-12">
						<div class="form-group form-group5">
							<label class="col-md-12 col-sm-12 col-xs-12 control-label label-txt">
								Website Url
							</label>
                                                     <div class="col-md-12 col-sm-12 col-xs-12">
							<input class="form-control" name="website_url" id="website_url" type="text" placeholder="http://example.com/page1"> 
                                                     </div>
						</div>
					
                                            </div>
                                            <div class="col-sm-12">
						<div class="form-group form-group5">
							<label class="col-md-12 col-sm-12 col-xs-12 control-label label-txt">
								View website button text
							</label>
                                                     <div class="col-md-12 col-sm-12 col-xs-12">
							<input class="form-control" name="website_button_text" id="website_button_text" type="text" placeholder="View Website"> 
						
                                                     </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
						<div class="form-group form-group5 ">
							<label class="col-md-12 col-sm-12 col-xs-12 control-label label-txt">
								Start chatting button text
							</label>
                                                     <div class="col-md-12 col-sm-12 col-xs-12">
							<input class="form-control" name="start_chat_button_text" id="start_chat_button_text" type="text" placeholder="Start Chatting"> 
						
                                                     </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
					
						<div class="form-group form-group5">
							<label class="col-md-12 col-sm-12 col-xs-12 control-label label-txt">
								Quick reply button 1 text
							</label>
                                                     <div class="col-md-12 col-sm-12 col-xs-12">
							<input class="form-control" name="reply_1_button_text" id="reply_1_button_text" type="text" placeholder="Ok, thanks"> 
						
                                                     </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
						<div class="form-group ">
							<label class="col-md-12 col-sm-12 col-xs-12 control-label label-txt">
								Quick reply button 2 text
							</label>
                                                     <div class="col-md-12 col-sm-12 col-xs-12">
							<input class="form-control" name="reply_2_button_text" id="reply_2_button_text" type="text" placeholder="No, thanks"> 
						
                                                     </div>
                                                </div>
                                            </div>
				    <div class="clearfix"></div>
					<br/><br/>			 
                                         
					<div class="box-footer col-sm-12">
                                             <div class="form-group footer-btn">
                                            <div class="col-sm-12">
						
							<button  class="btn btn-info center-block btn-md" id="get_json_code" name="get_json_code" type="button"><i class="fa fa-get-pocket"></i> Get JSON code</button>
						
                                            </div>
                                             </div>
					</div>
                                    </div>
				</form>
			</div>
			
		</div>
	</div>  <!-- end of col-6 left part -->


        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin: 0px;">
		<div class="box box-primary user-box" >
			<div class="box-header ui-sortable-handle  text-center" style="cursor: move;margin-bottom: 0px;">
				<h3 class="box-title" style="margin-top:0px;"><i class="fa fa-facebook-official" style="padding-right: 10px;margin-bottom: 0px;"></i>Inbox Preview</h3>
			</div>
			<div class="box-body preview box-body1">	

				
				
				<div class="chat_box">
					<div class="chat_header chat-header1 text-center">
						<span class='text-center' id="page_name">Page Name</span>
						
					</div>
                                    <div class="chat_body chat_body1">
					<div class="col-md-12 col-sm-12 col-xs-12">
                                            <!--<div class="col-md-1 col-sm-2 col-xs-2 left">
						<img id="page_thumb" class="pull-left" src="<?php //echo base_url("assets/images/chat_box_thumb.png");?>">
                                            </div>-->
                                            <div class="col-md-12 col-sm-12 col-xs-12 chat-box-cont chat-box-cont1">
						<span id="json_thumb_container">						
							<span class="clearfix"></span>
							<img id="json_page_thumb" style="width:100%;height:auto;" class="img-responsive" src="<?php echo base_url("assets/images/chat_box_thumb3.jpg");?>">
							<div id="json_level1" class='level_class'>
								<div id="json_message_title">Message Title</div>
								<div id="json_message_subtitle">Message subtitle</div>
							</div>
                                                        
							<div id="json_level2" class='level_class text-center'>
								<a id="view_website" href="">View Website</a>
							</div>
							<div id="json_level3" class='level_class text-center'>
								<a id="start_chatting" href="">Start Chatting</a>
							</div>
						</span>
						<div class="clearfix"></div>	
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                          <center id="json_level4">
							<a id="reply1" class="btn btn-info btn-md col-md-5 left" href="">Reply1</a>
							<a id="reply2" class="btn btn-default btn-md col-md-5 right" href="">Reply2</a>
						</center>  
                                        </div>
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
	</div> <!-- end of col-6 right part -->

</div>

<?php $this->load->view("facebook_ex/campaign/style");?>

<style type="text/css">
			
				
			.level_class
			{
				padding: 10px 5px;
				border-top: 1px solid #ccc;
			}	
			#json_level1
			{
				padding-top: 2px;
			}
			#json_level2 a,#json_level3 a
			{
				font-weight: 600;
			}
			#json_message_title
			{
				font-size: 15px;
				font-weight: 700;
				color: #000;
			}
			#json_message_subtitle
			{
				font-size: 13px;
				color: #777;
			}
									
			</style>			


<div class="modal fade" id="response_json_modal" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title text-center">Please copy the following JSON code for farther use</h4>
			</div>
			<div class="modal-body">
				<div class="alert text-center" id="response_json_modal_content" style="font-style: italic;">
					
				</div>
			</div>
		</div>
	</div>
</div>
<script>
</script>
