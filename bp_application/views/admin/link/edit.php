<div class="breadcrumb_container">
    <div class="breadcrumb">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>backend_dashboard"><span class="fa fa-dashboard"></span> Dashboard</a></li>
            <li><a href="<?php echo base_url() ?>backend_link">Link  List</a></li>
            <li><a class="active">Link List</a></li>
        </ol>
    </div>
</div>

<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Link</h3>
            <div class="box-body">
                <?php
                if (!empty($this->session->flashdata('link_form_validation'))) {
                    ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('link_form_validation'); ?>
                    </div>
                <?php } ?>
                <form id="hsc_add_form"  action="<?php echo base_url(); ?>backend_link/update/<?php echo $link_edit->link_id; ?>" method="post" class="form-horizontal" enctype="multipart/form-data">

                    <div class="form-group">
						<label class="col-sm-2 control-label">Title<span class="req"/></span></label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="link_title" value="<?php echo $link_edit->link_title; ?>">
						</div>	
						<label class="col-sm-2 control-label">Link<span class="req"/></span></label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="link_or_url" value="<?php echo $link_edit->link_or_url; ?>">
						</div>					
                    </div>                      
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Link Type</label>
                        <div class="col-sm-4">
							<?php $link_type=get_array('link_type');?>
                            <select name="link_type" class="form-control">
								<?php foreach($link_type as $key=>$value){?>
                                <option <?php if($link_edit->link_type==$key) echo ' selected="selected" ' ?>  value="<?php echo $key; ?>"><?php echo $value ?></option>
								<?php } ?>
                            </select>
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