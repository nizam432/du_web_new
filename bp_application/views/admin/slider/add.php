<div class="breadcrumb_container">
    <div class="breadcrumb">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>backend_dashboard"><span class="fa fa-dashboard"></span> Dashboard</a></li>
            <li><a href="<?php echo base_url() ?>backend_slider">Slider Image List</a></li>
            <li><a class="active">Add New Slider Image</a></li>
        </ol>
    </div>
</div>

<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Add New Slider</h3>
            <div class="box-body">
                <?php
                if (!empty($this->session->flashdata('slider_form_validation'))) {
                    ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('slider_form_validation'); ?>
                    </div>
                <?php } ?>
                <form id="hsc_add_form"  action="<?php echo base_url(); ?>backend_slider/save" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="" id="id">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Slider Caption</label>
                        <div class="col-sm-4">
                            <input type="text" name="slider_caption" id="slider_caption"  class="form-control input-sm" /> 
                        </div>				
                        <label class="col-sm-2 control-label">Link</label>
                        <div class="col-sm-4">
                            <input type="text" name="link" id="link"  class="form-control input-sm" /> 
                        </div>				
                    </div>
   
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Slider Images<span class="req"/></span></label>
                        <div class="col-sm-4">
                            <input type="file" name="slider_image" class="form-control">
                        </div>					
                        <label class="col-sm-2 control-label">Isactive</label>
                        <div class="col-sm-4">
                            <select name="isactive" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>  		
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Short Description<span class="req"/></span></label>
                        <div class="col-sm-4">
                            <textarea class="form-control" name="short_description"></textarea>
                        </div>					
                    </div>  		
                    <button  class="btn btn-success  pull-right"><span class="fa fa-save"></span> Save</button>
                </form>	
            </div>	
        </div>
    </div>
</div>