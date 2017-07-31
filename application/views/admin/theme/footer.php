
<footer class="footer">
                © 2017 FB Inboxer v1.1 - OnePath Network

            </footer>


 <!-- All Jquery -->
    <!-- ============================================================== -->
   
    
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url();?>assets/admin/plugins/bootstrap/js/tether.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url();?>assets/admin/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url();?>assets/admin/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url();?>assets/admin/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url();?>assets/admin/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url();?>assets/admin/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    <script src="<?php echo base_url();?>assets/admin/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!-- Chart JS -->
    <script src="<?php echo base_url();?>assets/admin/plugins/Chart.js/Chart.min.js"></script>
    <!--<script src="<?php echo base_url();?>assets/admin/js/dashboard2.js"></script>-->
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url();?>assets/admin/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    

    <script src="<?php echo base_url();?>assets/admin/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>plugins/upload/jquery.uploadfile.min.js"></script>
   <script>
        $t = $.noConflict();
	$t("document").ready(function(){
            

		var base_url="<?php echo base_url();?>";

		$('[data-toggle="popover"]').popover(); 
		$('[data-toggle="popover"]').on('click', function(e) {e.preventDefault(); return true;});

		$t("#image_url").uploadFile({
			url:base_url+"facebook_ex_json_messanger/upload_image_only",
			fileName:"myfile",
			returnType: "json",
			dragDrop: true,
			showDelete: true,
			multiple:false,
	        maxFileCount:1,
			acceptFiles:".png,.jpg,.jpeg",
			deleteCallback: function (data, pd) {
	        var delete_url="<?php echo site_url('facebook_ex_json_messanger/delete_uploaded_file');?>";
                var deafult_image = base_url+"assets/images/chat_box_thumb3.jpg";
                $.post(delete_url, {op: "delete",name: data},
                    function (resp,textStatus, jqXHR) { 
                    	$("#image_url_link").val("");
                    	$("#json_page_thumb").attr('src',deafult_image); 
                        $("#json_page_thumb1").attr('src',deafult_image); 
                    });
	           
	        },
	        onSuccess:function(files,data,xhr,pd)
	        {
	        	var data_modified = base_url+"upload/"+data;
	        	$("#image_url_link").val(data_modified);
	        	$("#json_page_thumb").attr('src',data_modified);
                        $("#json_page_thumb1").attr('src',data_modified);
	        }

		});
                
                
                 $t("#link_preview_upload").uploadFile({
                
	        url:base_url+"facebook_rx_cta_poster/upload_link_preview",
	        fileName:"myfile",
	        maxFileSize:1*1024*1024,
	        showPreview:false,
	        returnType: "json",
	        dragDrop: true,
	        showDelete: true,
	        multiple:false,
	        maxFileCount:1, 
	        acceptFiles:".png,.jpg,.jpeg",
	        deleteCallback: function (data, pd) {
	            var delete_url="<?php echo site_url('facebook_rx_cta_poster/delete_uploaded_file');?>";
                    $.post(delete_url, {op: "delete",name: data},function (resp,textStatus, jqXHR) { });
	           
	         },
	         onSuccess:function(files,data,xhr,pd){
	               var data_modified = base_url+"upload_caster/ctapost/"+data;
	               $("#link_preview_image").val(data_modified);	
	               $(".preview_img").attr("src",data_modified);	
	           }
	    });
                

        $(document.body).on('blur','#image_url_link',function(){
        	var image_url_link = $('#image_url_link').val();
        	$("#json_page_thumb").attr('src',image_url_link);
        });

        $(document.body).on('keyup','#message_title',function(){
        	var message_title = $('#message_title').val();
        	$("#json_message_title").html(message_title);
        });

        $(document.body).on('keyup','#message_subtitle',function(){
        	var message_subtitle = $('#message_subtitle').val();
        	$("#json_message_subtitle").html(message_subtitle);
        });

        $(document.body).on('keyup','#website_button_text',function(){
        	var website_button_text = $('#website_button_text').val();
        	$("#view_website").html(website_button_text);
        });

        $(document.body).on('keyup','#start_chat_button_text',function(){
        	var start_chat_button_text = $('#start_chat_button_text').val();
        	$("#start_chatting").html(start_chat_button_text);
        });

        $(document.body).on('keyup','#reply_1_button_text',function(){
        	var reply_1_button_text = $('#reply_1_button_text').val();
        	$("#reply1").html(reply_1_button_text);
        });

        $(document.body).on('keyup','#reply_2_button_text',function(){
        	var reply_2_button_text = $('#reply_2_button_text').val();
        	$("#reply2").html(reply_2_button_text);
        });


        $(document.body).on('click','#get_json_code',function(){
        	var image_url_link = $("#image_url_link").val().trim();
        	var start_chat_button_text = $("#start_chat_button_text").val().trim();
        	var message_title = $("#message_title").val().trim();
        	var message_subtitle = $("#message_subtitle").val().trim();
        	var website_url = $("#website_url").val().trim();
        	var website_button_text = $("#website_button_text").val().trim();
        	var reply_1_button_text = $("#reply_1_button_text").val().trim();
        	var reply_2_button_text = $("#reply_2_button_text").val().trim();
        	if(image_url_link=='' || start_chat_button_text=='' || message_title=='' || message_subtitle=='' || website_url=='' || website_button_text=='' || reply_1_button_text=='' || reply_2_button_text=='') 
        	{
        		alert("Please provide all the information");
        		return false;
        	} 

         	$("#response_json_modal").modal();
        	var loading = '<img src="'+base_url+'assets/pre-loader/custom_lg.gif" class="center-block">';
			$("#response_json_modal_content").html(loading);

        	var queryString = new FormData($("#inbox_json_form")[0]);
		    $.ajax({
		    	type:'POST' ,
		    	url: base_url+"facebook_ex_json_messanger/ajax_get_json_code",
		    	data: queryString,
		    	dataType : 'JSON',
		    	// async: false,
		    	cache: false,
		    	contentType: false,
		    	processData: false,
		    	success:function(response){	
		    		if(response.status == 'error')
		    		{
		    			var textarea = "<div class='alert alert-danger text-center'>"+response.message+"</div>";     	
			         	$("#response_json_modal_content").html(textarea);
		    		}
		    		else
		    		{
			    		var textarea = "<textarea class='form-control' rows='12'>"+response.message+"</textarea>";     	
			         	$("#response_json_modal_content").html(textarea);
		    		}
		    	}

		    });	    		      
            
        });


    });
    

</script>

<script src="<?php echo base_url();?>js/app.min.js" type="text/javascript"></script>
