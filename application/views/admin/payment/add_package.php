<section class="content-header col-lg-8 col-md-12 col-sm-12 col-xs-12 user-box">
   <section class="content">
     <div class="box box-info custom_box user-box">
       <div class="box-header">
        <div class="table-heading2">
         <h4 class="box-title"> <?php echo $this->lang->line("add")." - ".$this->lang->line("package settings"); ?></h4>
         </div>
        </div><!-- /.box-header -->
       <!-- form start -->
       <form class="form-horizontal" action="<?php echo site_url().'payment/add_package_action';?>" method="POST">
         <div class="box-body">
           <div class="form-group">
               <div class="col-sm-12">
             <label class="col-sm-3 control-label left" for="name"> <?php echo $this->lang->line("package name")?> *</label>
             <div class="col-sm-9 right">
               <input name="name" value="<?php echo set_value('name');?>"  class="form-control" type="text">
               <span class="red"><?php echo form_error('name'); ?></span>
             </div>
               </div>
           </div>
           <div class="form-group">
                <div class="col-sm-12">
             <label class="col-sm-3 control-label left" for="price"><?php echo $this->lang->line("price")?> - <?php echo $payment_config[0]['currency']; ?> *</label>
             <div class="col-sm-9 right">
               <input name="price" value="<?php echo set_value('price');?>"  class="form-control" type="text">

               <span class="red"><?php echo form_error('price'); ?></span>
               </div>
             </div>
           </div>
           <div class="form-group">
                <div class="col-sm-12">
             <label class="col-sm-3 control-label left" for="price"><?php echo $this->lang->line("validity");?> - <?php echo $this->lang->line("days"); ?> *</label>
             <div class="col-sm-9 right">
               <input name="validity" value="<?php echo set_value('validity');?>"  class="form-control" type="text">

               <span class="red"><?php echo form_error('validity'); ?></span>
             </div>
             </div>
           </div>
           <div class="form-group edit-box">
                <div class="col-sm-12">
             <label class="col-sm-3 control-label " for=""><?php echo $this->lang->line("modules")?> * </label>
             <div class="col-sm-9 table-responsive right">

             <table class="table table-bordered table-condensed table-hover table-striped edit-table" style="width:auto;">
             	<tr>
             		<td colspan="5"><input  id="all_modules" type="checkbox"/> <font color="blue">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->lang->line("All Modules"); ?></font> [<?php echo $this->lang->line("0 means unlimited");?>]</td>
             	</tr>
	             <?php                  
	                  $current_modules=array();
	                  if(count($this->input->post('modules'))>0)  
	                  $current_modules=$this->input->post('modules');  

	              	  echo "<tr>";    
                        echo "<th class='text-center success'>"; 
                          echo $this->lang->line("modules");         
                        echo "</th>";
                        echo "<th class='text-center success' colspan='2'>"; 
                          echo $this->lang->line("Analysis Limit");         
                        echo "</th>";
                        // echo "<th class='text-center success' colspan='2'>"; 
                        //   echo $this->lang->line("Bulk Limit");         
                        // echo "</th>";
                     echo "</tr>"; 

	                  foreach($modules as $module) 
	                  {  
	                 	 echo "<tr>";    
		                    echo "<td>";
			                    if(is_array($current_modules) && in_array($module['id'], $current_modules))
			                    { ?>                  
			                        <input  name="modules[]" class="modules" checked="checked" type="checkbox" value="<?php echo $module['id']; ?>"/>
			                    <?php 
			                    }
			                    else
			                    { ?>
			                        <input  name="modules[]" class="modules"  type="checkbox" value="<?php echo $module['id']; ?>"/>
			                     <?php 
			                    }
			                    echo "&nbsp;&nbsp;&nbsp;&nbsp;".$this->lang->line($module['module_name']);                
			                echo "</td>";
			                 

                        if(in_array($module["id"],array(13,14,16,17,24,26,27,33,38,39,40,41,42,43,44,45,46,47,48,49,52,53,55,57,59,60,61,62,63,77,78,82,83)))
                        {
                          $type="hidden";
                          $limit="";

                        }
                        else
                        {
                            $type="number";
                            if($module["id"]=="1") $limit=$this->lang->line("Analysis Limit");
                            else $limit=$this->lang->line("Analysis Limit")." / ".$this->lang->line("Month");
                        }


		                    echo "<td style='padding-left:10px'>".$limit."</td><td><input type='".$type."' value='0' min='0' style='width:70px;' name='monthly_".$module['id']."'></td>";
			                
			                if(!in_array($module["id"],array(3,4,5,6,7,8,9,10,15,18,21,22,58)))
			                {
			                	$type="hidden";
			                	$limit="";

			                }
			                else
			                {
	                	      $type="number";
                      		$limit=$this->lang->line("Bulk Limit")." / ".$this->lang->line("Analysis");
			                }

		                    // echo "<td style='padding-left:10px'>".$limit."</td><td><input type='".$type."' value='0' min='0' style='width:70px;' name='bulk_".$module['id']."'></td>";
	                  	echo "</tr>";                 
		               }                
	              ?>         		
             	</table>     
               <span class="red" ><?php echo "<br/><br/>".form_error('modules'); ?></span>  
              </div> 
           </div>
           </div>


           </div> <!-- /.box-body --> 
           <div class="box-footer">
            <div class="form-group footer-btn">
                <div class="col-sm-12" style="margin-bottom:20px;">
               <input name="submit" type="submit" class="btn btn-info btn-md" value="<?php echo $this->lang->line('save'); ?>"/>         
               <input type="button" class="btn btn-default btn-md" value="<?php echo $this->lang->line('cancel'); ?>" onclick='goBack("payment/package_settings",0)'/>
             </div>
           </div>
         </div><!-- /.box-footer -->         
         </div><!-- /.box-info -->       
       </form>     
     </div>
   </section>
</section>


<script type="text/javascript">
  $j(document).ready(function() {
    $("#all_modules").change(function(){
      if ($(this).is(':checked')) 
      $(".modules").prop("checked",true);
      else
      $(".modules").prop("checked",false);
    });
  });
</script>

<style type="text/css" media="screen">
  td,th{background:#fff}
</style>