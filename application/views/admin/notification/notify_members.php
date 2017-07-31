<?php $this->load->view('admin/theme/message'); ?>
<!-- Content Header (Page header) -->
<div class="col-xs-12">
<section class="card card-outline-info">
    <div class="table-heading">
        <h4 class="card-title"> <?php echo $this->lang->line("send email to users"); ?> </h4>
    </div>
<!-- Main content -->

    <div class="col-xs-12">
        <div class="card" style="width:100%; height:600px;padding-left: 15px;">
            <table 
            id="tt"  
            class="easyui-datagrid" 
            url="<?php echo base_url()."admin/notify_members_data_loader"; ?>" 
            
            pagination="true" 
            rownumbers="true" 
            toolbar="#tb" 
            pageSize="10" 
            pageList="[5,10,20,50,100]"  
            fit= "true" 
            fitColumns= "true" 
            nowrap= "true" 
            view= "detailview"
            idField="id"
            >
            
               <thead>
                 <tr>
                     <th field="id" checkbox="true"></th>                        
                     <th field="name" sortable="true"><?php echo $this->lang->line("name"); ?></th>   
                     <th field="email"  sortable="true"><?php echo $this->lang->line("email"); ?></th>
                     <th field="mobile" sortable="true" ><?php echo $this->lang->line("mobile"); ?></th>
                     <th field="address" sortable="true" ><?php echo $this->lang->line("address"); ?></th>
                     <th field="status" formatter="status_check" ><?php echo $this->lang->line("status"); ?></th>                  
                 </tr>
               </thead>
            </table>                        
         </div>
  
       <div id="tb" style="padding:3px 0; ">

      <a class="btn btn-info" style="color:white;margin:15px 0px 0px 0px;" title="<?php echo $this->lang->line("send email"); ?>" onclick="sms_send_email_ui()">
        <i class="fa fa-envelope"></i> <?php echo $this->lang->line("send email"); ?>
    </a>

 <form class="form-inline row col-xs-12" style="margin:15px -15px;">

                <div class="form-group form-group2 col-md-8 col-sm-8">
                    <input id="first_name" name="first_name" class="form-control" placeholder="<?php echo $this->lang->line("name"); ?>">
                </div> 
                <div class="form-group form-group2 col-md-4 col-sm-4">
                <button class='btn btn-success'  onclick="doSearch(event)"><?php echo $this->lang->line("search"); ?></button>
                </div>   
            </form> 

        </div>        
    </div>
 
</section>
</div>





<!--Modal for Send SMS  Email-->
  
<div id="modal_send_sms_email" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content ">

      <div class="modal-header user-box1">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
          <h3 id="SMS" class="modal-title"> <i class="fa fa-envelope" style="padding-right: 10px;"></i><?php echo $this->lang->line("send email"); ?></h3>
      </div>

      <div id="modalBody" class="modal-body">        
        <div id="show_message" class="text-center"></div>

        <div class="form-group form-group2">
          <label for="sms_content"><?php echo $this->lang->line("message subject"); ?> *</label><br/>
          <input type="text" id="sms_subject" required class="form-control"/>
        </div>

        <div class="form-group form-group2">
          <label for="sms_content"><?php echo $this->lang->line("message"); ?> *</label><br/>
          <textarea name="sms_content" required style="width:100%;height:200px;" id="sms_content"></textarea>
        </div>
     
      </div>

     <div class="modal-footer clearfix col-md-12 col-sm-12">
        <div class="col-md-6 col-sm-12 footer-btn">
            <button id="send_sms_email" class="btn btn-success" style="margin: 0 20px;"> <i class="fa fa-envelope"></i>  <?php echo $this->lang->line("send"); ?></button>
           <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line("close"); ?></button>
        </div>
     </div>
    </div>
  </div>
</div>



<script>   

 function sms_send_email_ui()
    {
      $("#modal_send_sms_email").modal();
    }    

    $j("document").ready(function() {
        $( ".datepicker" ).datepicker();

        $("#send_sms_email").click(function(){      
                  
          var subject=$("#sms_subject").val();
          var content=$("#sms_content").val();         
          var rows = $j('#tt').datagrid('getSelections');
          var info=JSON.stringify(rows);  
          
          if(rows=="") 
          {
            $("#show_message").addClass("alert alert-warning");
            $("#show_message").html("<b><?php echo $this->lang->line("you did not select any user"); ?></b>");
            return;
          }
          
          if(subject=="" || content=="")
          {
            $("#show_message").addClass("alert alert-warning");
            $("#show_message").html("<?php echo $this->lang->line("something is missing"); ?>");
            return;
          }

          $(this).attr('disabled','yes');
          $("#show_message").addClass("alert alert-info");
          $("#show_message").show().html('<i class="fa fa-spinner fa-spin"></i> <?php echo $this->lang->line("sending email, please wait"); ?>');
          $.ajax({
          type:'POST' ,
          url: "<?php echo site_url(); ?>admin/send_email_member",
          data:{content:content,info:info,subject:subject},
          success:function(response){
            $("#send_sms_email").removeAttr('disabled');                     
            $("#show_message").addClass("alert alert-info");
            $("#show_message").html(response);
          }
        });   
      }); 
    });  

    var base_url="<?php echo site_url(); ?>";

    function status_check(value, row, index)
    {
      var status = row.status; 
      var str = '';     

      if(status == "1")
        str = str+"<label class='label label-success'><?php echo $this->lang->line("active"); ?></label>";      

      if(status == '0')
        str = str+"<label class='label label-danger'><?php echo $this->lang->line("inactive"); ?></label>";

      return str;
    }
    
   
    function doSearch(event)
    {
        event.preventDefault(); 
        $j('#tt').datagrid('load',{
          first_name:       $j('#first_name').val(),
          is_searched:      1
        });
    }  
</script>
