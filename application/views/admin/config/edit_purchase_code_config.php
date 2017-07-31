<?php $this->load->view('admin/theme/message'); ?>
<section class="content-header">
   <section class="content col-md-8 col-sm-12 col-xs-12 form-cont">
        <div class="card card-outline-info">
                <div class="card">
                <div class="table-heading2">
                 <h4 class="card-title"><i class="fa fa-cogs"></i> <?php echo $this->lang->line("purchase code settings");?></h4>
                 </div>
                </div><!-- /.box-header -->
                
                    <!-- form start -->
            <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url().'admin_config/edit_purchase_code_config';?>" method="POST">
                <div class="box-body">
                   <div class="form-group">
                       <div class="col-sm-12">
                        <label class="col-sm-3 control-label left" for=""><?php echo $this->lang->line("Purchase Code");?>
                        </label>
                        <?php
                            $file_data = file_get_contents(APPPATH . 'core/licence.txt');
                            $file_data_array = json_decode($file_data, true);
                        ?>
                        <div class="col-sm-9 right">
                            <input name="purchase_code" value="<?php echo $file_data_array['purchase_code'];?>"  disabled class="form-control" type="text">                
                            <span class="red"><?php echo form_error('purchase_code'); ?></span>
                        </div>
                   </div>
                   </div>

                </div> <!-- /.box-body --> 

                <div class="box-footer">
                    <div class="form-group footer-btn ">
                        <div class="col-sm-12 ">
                            <input name="submit" type="submit" class="btn btn-danger btn-md" value="<?php echo $this->lang->line("Delete Purchase Code");?>"/>  
                            <input type="button" class="btn btn-default btn-md" value="<?php echo $this->lang->line("Cancel");?>" onclick='goBack("admin_config",1)'/>  
                        </div>
                    </div>
                </div><!-- /.box-footer -->         
                </div><!-- /.box-info -->       
            </form>     
        </div>
   </section>
</section>