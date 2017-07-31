<style>

hr{
   margin-top: 10px;
}



.sync_page_style{
   margin-top: 8px;
}
/* .wrapper,.content-wrapper{background: #fafafa !important;} */
  .well{background: #fff;}
.box-shadow
{
  background: #fff;
}
h3.box-title.blue {
   border-bottom: 1px solid #54667a !important;
    box-shadow: 1px 0px 2px 0px #ccc;
    background: rgba(0, 192, 239, 0.01);
    padding: 10px 15px;
    text-align: left;
}
.label {
    padding: 7px 10px;
    margin: 5px 0;
}
.posi-accor1{position: relative;}
.posi-accor{position: absolute;top: 8px;right: 0px;}
button.btn.btn-box-tool {
    background: #fff;
}
.modal-header {
    width: 100%;
    margin: 0px;
    padding: 0px;
}
h3.modal-title {
    width: 100%;
    margin: 0px;
}
.user-box {
    background: none;
    margin: 0px auto;
    padding: 0px;
}
.subscribe-txt1 {
    color: #474747;
    font-size: 16px;
    margin: 0px;
}
.subscribe-txt {
    color: #018cc5;
    font-size: 16px;
    margin: 10px 0 0 0;
}
</style>


<?php if(empty($page_info)){ ?>
<div class="">
  <div class="col-xs-12 ">       
    <div class="well">
      <h4 class="text-center"> <i class="fa fa-facebook-official"></i> You have no page in facebook<h4>
    </div>
  </div>
</div>
<?php }else{ ?>

<div class="col-sm-12 col-xs-12  user-box">       
    <div class="well"  style="padding:0px;">
      <h3 class="text-center blue"> <i class="fa fa-facebook-official"></i> Import Lead(s) : Page List</h3>
    </div>
  </div>

  <div class="row">
  <?php $i=0; foreach($page_info as $value) : ?>
    <div class="col-xs-12 col-sm-12 col-md-6">
      <div class="box box-shadow box-solid">
        <div class="box-header with-border text-center posi-accor1">
          <h3 class="box-title blue"><?php echo $value['page_name']; ?></h3>
          <div class="posi-accor"'>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row">
              <div id="alert_<?php echo $value['id'];?>" class="alert alert-success text-center" style="display:none;"></div>
              <?php $profile_picture=$value['page_profile']; ?>
              <div class="text-center col-md-4 col-xs-12 left">
                <img src="<?php echo $profile_picture;?>" alt="" class='custom-top-margin img-circle' style='padding:1px;border:1px solid #aaa;    width: 80px;height: 80px;'>
                <br/>
                <span class="label subscribe-txt">Subscribed : 
                   <?php 
                    if(empty($value['current_subscribed_lead_count'])) echo "0";
                    else echo custom_number_format($value['current_subscribed_lead_count']);
                    ?>
                </span>
               
                <span class="label subscribe-txt1">Unsubscribed : 
                   <?php 
                    if(empty($value['current_unsubscribed_lead_count'])) echo "0";
                    else echo custom_number_format($value['current_unsubscribed_lead_count']);
                    ?>
                </span>
              </div>
              <div class="col-md-8 col-sm-12 col-xs-12 ">
               
                <div class="info-box card-default text-center" style="margin-bottom:5px;border:1px solid #ccc;border-bottom:2px solid #ccc;border-bottom: 2px solid #ccc;">
                  <span class="info-box-icon bg-blue"><i class="fa fa-user"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text"><b><?php echo $this->lang->line("Total Leads");?></b></span><hr style="margin-bottom:2px;">
                    <span class="info-box-number" style="font-size:30px">
                      <?php 
                      if(empty($value['current_lead_count'])) echo "0";
                      else echo number_format($value['current_lead_count']);
                      ?>
                    </span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->

                <div class="sync_page_style text-center">
                  <span class="info-box-text">
                    <button id ="<?php echo $value['id'];?>" type="button" style='width:45%;padding: 7px 0;' class="pull-left btn-sm btn btn-default import_data"><i class="fa fa-retweet"></i> Scan page inbox</button>
                    <?php 
                        if(!empty($value['current_lead_count'])) $is_hidden = "";
                        else $is_hidden = "hidden";
                        echo "<button id ='".$value['user_id']."-".$value['page_id']."' style='width:45%;padding: 7px 0;' type='button' class='".$is_hidden." btn-sm user_details_modal btn btn-info pull-right'><i class='fa fa-list'></i> Lead list</button>";
                    ?>
                  </span>
                </div>               
              </div>                  
            </div><!-- /.row -->
            <hr>
            <div class="row">  
                <div class="col-sm-12 "> 
              <div class="col-xs-6 left btn-left"> 

                <?php 
                if($value['auto_sync_lead']=="1")
                {
                  $enable_disable = 0;
                  $enable_disable_class = "default";
                  $enable_disable_text = "<i class='fa fa-remove'></i> Disable daily auto scan";
                }
                else 
                {
                  $enable_disable = 1;
                  $enable_disable_class = "success";
                  $enable_disable_text = "<i class='fa fa-check'></i> Enable daily auto scan";
                }

                if($this->session->userdata('user_type') == 'Admin' || in_array(78,$this->module_access))
                echo "<button style='margin-top:10px' enable_disable='".$enable_disable."' auto_sync_lead_page_id ='".$value['page_id']."' type='button' class='btn-sm auto_sync_lead_page btn btn-".$enable_disable_class."'>{$enable_disable_text}</button>"; 
                
                ?> 
              </div>  
               <div class="col-xs-6 right btn-right">                
                  <div class="pull-right">
                    <?php 
                    echo "<i class='fa fa-clock-o'></i> Last scanned ";
                    if($value['last_lead_sync']!="0000-00-00 00:00:00") echo "<span style='font-weight:normal;color:#757474;' class='label label-default'>".date("jS M, y H:i:s",strtotime($value['last_lead_sync']))."<span>";
                    else echo "<span style='font-weight:normal;padding: 7px 10px;' class='label label-warning'>Never scanned</span>";
                  ?>
                  </div>
              </div>
                </div>
            </div>
          </div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
      <br/>
    </div>
  <?php   
      $i++;
      if($i%2 == 0)
      echo "</div><div class='row''>";
      endforeach;
  ?>
</div>
<?php } ?>

<script type="text/javascript">

  $j(document.body).on('click','.import_data',function(){
    var base_url = '<?php echo site_url();?>';
    var id=$(this).attr('id');
    var alert_id = "alert_"+id;
    $(".import_data").addClass('disabled');
    $(".auto_sync_lead_page").addClass('disabled');
    $(".user_details_modal").addClass('disabled');
    var  loading = '<img src="'+base_url+'assets/pre-loader/custom.gif" class="center-block">';
    
    $("#"+alert_id).removeClass("alert-success");
    $("#"+alert_id).show().html(loading);
    $.ajax({
      type:'POST' ,
      url:"<?php echo site_url();?>facebook_ex_import_lead/import_lead_action",
      data:{id:id},
      dataType:'JSON',
      success:function(response){
       $("#"+alert_id).addClass("alert-success");
       $("#"+alert_id).show().html(response.message);
       alert(response.message);
       location.reload();  
      }
    });

  });

  $j(document.body).on('click','.user_details_modal',function(){
    var user_page_id = $(this).attr('id');
    var base_url = '<?php echo site_url();?>';
    $("#response_div").html('<img class="center-block" src="'+base_url+'assets/pre-loader/custom_lg.gif" alt="Processing..."><br/>');
    $("#htm").modal(); 
    $.ajax({
      type:'POST' ,
      url:"<?php echo site_url();?>facebook_ex_import_lead/user_details_modal",
      data:{user_page_id:user_page_id},
      success:function(response){ 
         $('#response_div').html(response);  
      }
    });

  }); 

  $j(document.body).on('click','.lead_del',function(){
        var del_id=this.id;
        //alert(del_id);
        var user_id =$('#lead_del'+del_id).val();
        //alert(user_id);
        var agree=confirm('Are you sure you want to delete');
    if(agree)
    {
    var base_url = '<?php echo site_url();?>';
    $.ajax({
      type:'POST' ,
      url:"<?php echo site_url();?>facebook_ex_import_lead/delete_lead",
      data:{user_id:user_id},
      success:function(response){ 
         //$('#response_div').html(response); 
        $('#alert').html(response); 
      }
    })
    }
  });
  
  $j(document.body).on('click','#select_all',function(){
        //alert("hello");
       if($(this).is(':checked',true)) {
        $(".checkbox").prop('checked', true);
        }
        else {
        $(".checkbox").prop('checked',false);
        }
  });
  
   $j(document.body).on('click','#multi_lead_delete',function(){
        
        var chk_lead = [];
        $(".checkbox:checked").each(function() {
            chk_lead.push($(this).val()); 
        });
        //alert(chk_lead);
        var agree=confirm('Are you sure you want to delete');
        if(agree)
        {
            var base_url = '<?php echo site_url();?>';
            $.ajax({
            type:'POST' ,
            url:"<?php echo site_url();?>facebook_ex_import_lead/delete_multi_lead",
            data:{user_id:chk_lead},
            success:function(response){ 
                
                $('#alert').html(response);
            }
            }) 
        }
  });
  
  
  $j(document.body).on('click','.auto_sync_lead_page',function(){
    var page_id = $(this).attr('auto_sync_lead_page_id');
    var operation = $(this).attr('enable_disable');
    var base_url = '<?php echo site_url();?>';
     $(".import_data").addClass('disabled');
    $(".auto_sync_lead_page").addClass('disabled');
    $(".user_details_modal").addClass('disabled');
    $.ajax({
      type:'POST' ,
      url:"<?php echo site_url();?>facebook_ex_import_lead/enable_disable_auto_sync",
      data:{page_id:page_id,operation:operation},
      success:function(response)
      {  
         if(operation=="0") alert("Daily auto scan has been disabled successfully.");
         else alert("Daily auto scan has been enabled successfully.");
         location.reload();
      }
    });

  });

   $(document.body).on('click','.client_thread_subscribe_unsubscribe',function(){
    $(this).html('please wait...');
    var client_subscribe_unsubscribe_status = $(this).attr('id');

    $.ajax({
      type:'POST',
      url:"<?php echo site_url();?>facebook_ex_import_lead/client_subscribe_unsubscribe_status_change",
      data:{client_subscribe_unsubscribe_status:client_subscribe_unsubscribe_status},
      success:function(response){
         $("#"+client_subscribe_unsubscribe_status).parent().html(response); 
      }
    });

  });
</script>
<div class="modal fade user-box" id="htm" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title"><i class="fa fa-user"></i> Lead List</h3>
            </div>
            <div class="modal-body ">
                <div class="row">
                    <div class="col-xs-12 table-responsive" id="response_div" style="padding: 20px;"></div>
                </div>               
            </div>
        </div>
    </div>
</div>