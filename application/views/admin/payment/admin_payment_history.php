<?php $this->load->view('admin/theme/message'); ?>
<?php    
    $view_permission    = 1;
    $edit_permission    = 1;
    $delete_permission  = 1;
?>
<!-- Content Header (Page header) -->
<div class="col-xs-12">
<section class="card card-outline-info">
    <div class="table-heading2">
        <h4 class="card-title"> <?php echo $this->lang->line("payment history"); ?> </h4>
    </div>
  <!-- Main content -->
    <div class="col-xs-12">
        <div class="card" style="width:100%; height:700px;margin:13px 20px 0px;">
            <table 
            id="tt"  
            class="easyui-datagrid table-responsive" 
            url="<?php echo base_url()."payment/admin_payment_history_data"; ?>" 
            
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
                     <th field="paypal_email" sortable="true"><?php echo $this->lang->line("email"); ?></th>                        
                     <th field="first_name" sortable="true"><?php echo $this->lang->line("first name"); ?></th>                        
                     <th field="last_name"  sortable="true" ><?php echo $this->lang->line("last name"); ?></th>
                     <th field="payment_date"  sortable="true"><?php echo $this->lang->line("payment date"); ?></th>
                     <th field="paid_amount" sortable="true" ><?php echo $this->lang->line("paid amount"). "-".$currency; ?></th>
                     <th field="cycle_start_date" sortable="true" ><?php echo $this->lang->line("cycle start date"); ?></th>
                     <th field="cycle_expired_date" sortable="true" ><?php echo $this->lang->line("cycle expire date"); ?></th>                  
                 </tr>
               </thead>
            </table>                        


         </div>
  
       <div id="tb" class=" col-xs-12" style="padding:3px;">
            <h5 style="color:#90a4ae;font-weight: 300;margin: 15px 0;"><?php echo $this->lang->line("total paid amount"); ?>: <?php echo $total_paid_amount." ".$currency; ?></h5> 
            <div class="row">
            <form class="form-inline input-margin" style="margin: 20px 12px;">

                <div class="form-group form-group3 ">
                    <input id="first_name" name="first_name" class="form-control" size="20" placeholder="<?php echo $this->lang->line("first name"); ?>">
                </div> 

                <div class="form-group form-group3">
                    <input id="last_name" name="last_name" class="form-control" size="20" placeholder="<?php echo $this->lang->line("last name"); ?>">
                </div> 

                <div class="form-group form-group3">
                    <input id="from_date" name="from_date" class="form-control datepicker" size="20" placeholder="<?php echo $this->lang->line("from date"); ?>">
                </div>

                <div class="form-group form-group3">
                    <input id="to_date" name="to_date" class="form-control  datepicker" size="20" placeholder="<?php echo $this->lang->line("to date"); ?>">
                </div>  

                <button class='btn btn-info'  onclick="doSearch(event)"><?php echo $this->lang->line("search"); ?></button>
                      
            </form> 
                </div>
        </div>        
    </div>
  
</section>
</div>

<script>       
    $j(function() {
        $( ".datepicker" ).datepicker();
    });  

    var base_url="<?php echo site_url(); ?>"
    
    // function action_column(value,row,index)
    // {               
    //     var details_url=base_url+'admin/view_details/'+row.id;        
    //     var edit_url=base_url+'admin/update_book/'+row.id;
    //     var delete_url=base_url+'admin/delete_book_action/'+row.id;
        
    //     var str="";
    //     var view_permission="<?php echo $view_permission; ?>";        
    //     var edit_permission="<?php echo $edit_permission; ?>";   
    //     var delete_permission="<?php echo $delete_permission; ?>";   
        
    //     if(view_permission==1)     
    //     str="<a title='"+'<?php echo $this->lang->line("view") ?>'+"' style='cursor:pointer' href='"+details_url+"'>"+' <img src="<?php echo base_url("plugins/grocery_crud/themes/flexigrid/css/images/magnifier.png");?>" alt="View">'+"</a>";
        
    //     if(edit_permission==1)
    //     str=str+"&nbsp;&nbsp;&nbsp;&nbsp;<a style='cursor:pointer' title='"+'<?php echo $this->lang->line("edit") ?>'+"' href='"+edit_url+"'>"+' <img src="<?php echo base_url("plugins/grocery_crud/themes/flexigrid/css/images/edit.png");?>" alt="Edit">'+"</a>";

    //     if(delete_permission == 1)
    //     str=str+"&nbsp;&nbsp;&nbsp;&nbsp;<a style='cursor:pointer' title='"+'<?php echo $this->lang->line("delete") ?>'+"' href='"+delete_url+"'>"+' <img src="<?php echo base_url("plugins/grocery_crud/themes/flexigrid/css/images/close.png");?>" alt="Delete">'+"</a>";
        
    //     return str;
    // }  

    // function paid_amount_show(value,row,index)
    // {
    //   var str = '';
    //   $.ajax({
    //      type:"POST",
    //      url:base_url+"payment/paid_amount_show",
    //      async:false,
    //      success:function(response){
    //         str = response;
    //      }
    //   });
    //   return str;
    // }
   
    function doSearch(event)
    {
        event.preventDefault(); 
        $j('#tt').datagrid('load',{
          first_name:       $j('#first_name').val(),
          last_name:        $j('#last_name').val(),
          from_date:        $j('#from_date').val(),
          to_date:          $j('#to_date').val(),
          is_searched:      1
        });
    }  
</script>
