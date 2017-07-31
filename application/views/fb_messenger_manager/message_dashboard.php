<style>
	.refresh_button_holder
	{
		padding: 0px;
		margin-top: 5px; 
		margin-bottom:5px;
	}
	.header_title{
		margin: 0px;
		padding: 0px;
		color: #3C8DBC;
	}
	.right_content
	{
		float: right;
		margin-bottom: 10px;

	}
	.right_content_message
	{
		    color: #4B4F56;
    background: rgba(0, 192, 239, 0.12);
    padding: 10px;
    margin: 0px;
    border-radius: 10px;
	}
	.right_content_name
	{
	color: #55ce63;
    text-align: left;
    padding: 5px 10px;
    margin: 0px;
    font-size: 14px;
    font-weight: 500;
	}
	.right_content_date
	{
		color: gray;
    text-align: left !important;
    font-weight: 400;
    padding: 0px;
    padding-left: 10px;
    margin: 0px;
    font-size: 13px;
	}

	.left_content
	{
		float: left;
		margin-bottom: 10px;
	}
	.left_content_message
	{
		    background: #f3f2f2;
                    padding: 10px;
                    margin: 0px;
                    border-radius: 10px;
                    font-size: 14px;
	}
	.left_content_name
	{
	color: #55ce63;
    text-align: left;
    padding: 5px 10px;
    margin: 0px;
    font-size: 14px;
    font-weight: 500;
	}
	.left_content_date
	{
		color: gray;
    text-align: left !important;
    font-weight: 400;
    padding: 0px;
    padding-left: 10px;
    margin: 0px;
    font-size: 13px;
	}
        .modal-header {
        padding: 0px !important;
    }
    span.label.label-success.reply_button {
    padding: 6px 12px;
}
input#reply_message {
    margin: 10px;
    width: 95%;
    line-height: 30px;
    box-shadow: 0px 0px 0px #ddd !important;
}
div#emotion_container {
    text-align: center;
}
a.label.label-info {
    width: 79px;
    padding: 6px;
}
.user-box1 {
    background: none;
    margin: 0px auto;
    padding: 0px;
}
.user-box1 h3 {
    background: rgba(0, 192, 239, 0);
    padding: 10px;
    text-align: left;
}
.modal-body {
    margin: 0px;
}
</style>
<div class="row" style="padding: 10px; padding-top: 0px;">
	<div class="col-md-12 col-sm-12 col-xs-12 user-box">
		<div id="unread_message_div"></div>
		<br/>
		<div id="page_list_div"></div>
	</div>
</div>

<div class="modal fade user-box col-md-12 col-sm-12 col-xs-12 user-box1" id="conversation_modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title" style="margin:0px;width:100%;"><i class="fa fa-wechat"></i> Conversation of <span id="conversation_page_name"></span></h3>
            </div>
            <div class="modal-body" id="conversation_modal_body" style="height: 400px;overflow-y: scroll;">                

            </div>
           
         
            	<input class="form-control col-md-12 col-sm-12 col-xs-12" type="text" placeholder="type your reply message here" id="reply_message" name="reply_message">
            	<div class=" col-md-12 col-sm-12 col-xs-12" id="emotion_container" ><?php echo $emotion_list;?>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    <button class="btn btn-info btn-md " id="final_reply_button" style="margin: 20px 0;padding: 10px;"><i class="fa fa-send"></i> Send Reply</button></div>
                </div>
            </div>
        </div>
    </div>


<script>
	$(document).ready(function(){
	    $('[data-toggle="tooltip"]').tooltip();
	});

	$(document.body).on('click','.emotion',function(){  
    	var img_link = $(this).attr("src");
    	var eval = $(this).attr("eval");
    	var caretPos = $(this).parent().prev()[0].selectionStart;
    	var textAreaTxt = $(this).parent().prev().val();
    	var txtToAdd = " "+eval+" ";
    	// var new_text = textAreaTxt + txtToAdd;
    	$(this).parent().prev().val(textAreaTxt.substring(0, caretPos) + txtToAdd + textAreaTxt.substring(caretPos));
    });
	
	$j("document").ready(function(){
		var base_url="<?php echo base_url(); ?>";
		var loading = '<img src="'+base_url+'assets/pre-loader/custom_lg.gif" class="center-block">';

		$(document.body).on('click','.reply_button',function(){
			var thread_id = $(this).attr('thread_id');
			$("#final_reply_button").attr('thread_id',thread_id);
			var page_table_id = $(this).attr('page_table_id');
			$("#final_reply_button").attr('page_table_id',page_table_id);
			var page_name = $(this).attr('page_name');
			$("#conversation_modal").modal();
			$("#conversation_modal_body").html(loading);					
			$("#conversation_page_name").html(page_name);					
			$.ajax({
					url:base_url+'fb_msg_manager/get_post_conversation',
					type:'POST',
					data:{thread_id:thread_id,page_table_id:page_table_id},
					success:function(response){
						$("#conversation_modal_body").html(response);
						var element = document.getElementById("conversation_modal_body");
						element.scrollTop = element.scrollHeight;					
					}
					
				});
		});

		$(document.body).on('click','#final_reply_button',function(){
			var thread_id = $(this).attr('thread_id');
			var page_table_id = $(this).attr('page_table_id');
			var reply_message = $("#reply_message").val().trim();
			if(reply_message == '')
			{
				alert("You did not provide any reply message.");
				return false;
			}

			$("#conversation_modal_body").html(loading);
			$("#reply_message").val('');
			$("#final_reply_button").addClass('disabled');
			$.ajax({
					url:base_url+'fb_msg_manager/reply_to_conversation',
					type:'POST',
					data:{thread_id:thread_id,page_table_id:page_table_id,reply_message:reply_message},
					success:function(response){
						$("#conversation_modal_body").html(response);
						$("#final_reply_button").removeClass('disabled');			
					}
					
				});
		});

    	$("#unread_message_div").html(loading);
    	$("#page_list_div").html(loading);

    	function ajax_call()
    	{    		
	    	$.ajax({
					url:base_url+'fb_msg_manager/get_unread_message',
					type:'POST',
					data:{},
					success:function(response){
						$("#unread_message_div").html(response);
				    	$.ajax({
								url:base_url+'fb_msg_manager/get_pages_conversation',
								type:'POST',
								data:{},
								success:function(response){
									$("#page_list_div").html(response);					
								}
								
							});				
					}
					
				});	    	
    	}
    	
    	$(document.body).on('click','#refresh_button',function(){  
    		$("#unread_message_div").html(loading);
	    	$("#page_list_div").html(loading);  		
	    	ajax_call();
    	});

    	ajax_call();
	});
</script>