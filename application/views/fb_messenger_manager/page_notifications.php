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
        a.label.label-info {
    width: 76px;
    padding: 6px;
}
</style>

<div class="row" style="padding: 10px; padding-top: 0px;">
	<div class="col-md-12 col-sm-12 col-xs-12 user-box">
		<div id="notification_div"></div>
		<br/>
	</div>
</div>

<script>
	$j("document").ready(function(){
		var base_url="<?php echo base_url(); ?>";
		var loading = '<img src="'+base_url+'assets/pre-loader/custom_lg.gif" class="center-block">';

		$("#notification_div").html(loading);

    	function ajax_call()
    	{    		
	    	$.ajax({
					url:base_url+'fb_msg_manager_notification/get_pages_notification',
					type:'POST',
					data:{},
					success:function(response){
						$("#notification_div").html(response);			
					}
					
				});	    	
    	}

    	$(document.body).on('click','#refresh_button_notification',function(){  
    		$("#notification_div").html(loading);		
	    	ajax_call();
    	});

    	ajax_call();
    	


	});
</script>