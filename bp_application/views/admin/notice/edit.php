<div class="breadcrumb_container">
    <div class="breadcrumb">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>backend_dashboard"><span class="fa fa-dashboard"></span> Dashboard</a></li>
            <li><a href="<?php echo base_url() ?>backend_notice">Slider  List</a></li>
            <li><a class="active">Slider List</a></li>
        </ol>
    </div>
</div>

<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Slider</h3>
            <div class="box-body">
                <?php
                if (!empty($this->session->flashdata('notice_form_validation'))) {
                    ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('notice_form_validation'); ?>
                    </div>
                <?php } ?>
                <form id="hsc_add_form"  action="<?php echo base_url(); ?>backend_notice/update/<?php echo $notice_edit->notice_id; ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Notice<span class="req"/></span></label>
                        <div class="col-sm-4">
                            <textarea class="form-control" name="notice"><?php echo $notice_edit->notice;?></textarea>
                        </div>					
                    </div>  

   
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Attached File<span class="req"/></span></label>
                        <div class="col-sm-4">
                            <input type="file" name="attached_file" class="form-control">
                        </div>					
                        <label class="col-sm-2 control-label">Isactive</label>
                        <div class="col-sm-4">
                            <select name="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div> 
                      
                    <button  class="btn btn-success  pull-right"><span class="fa fa-save"></span> Save</button>
                </form>	
            </div>	
        </div>
    </div>
</div>