<div class="breadcrumb_container">
    <div class="breadcrumb">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>backend_dashboard"><span class="fa fa-dashboard"></span> Dashboard</a></li>
            <li><a href="<?php echo base_url() ?>backend_news">News  List</a></li>
            <li><a class="active">News List</a></li>
        </ol>
    </div>
</div>

<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Edit News</h3>
            <div class="box-body">
                <?php
                if (!empty($this->session->flashdata('news_form_validation'))) {
                    ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('news_form_validation'); ?>
                    </div>
                <?php } ?>
                <form id="hsc_add_form"  action="<?php echo base_url(); ?>backend_news/update/<?php echo $news_edit->news_id; ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                    
	                    <div class="form-group">
                        <label class="col-sm-2 control-label">Title<span class="req"/></span></label>
                        <div class="col-sm-4">
                            <input class="form-control" value="<?php echo $news_edit->title;?>" name="title">
                        </div>	
                        <label class="col-sm-2 control-label">Attached File<span class="req"/></span></label>
                        <div class="col-sm-4">
                            <input type="file" name="attached_file" class="form-control">
                        </div>	                        
                    </div>                      
                    <div class="form-group">				
                        <label class="col-sm-2 control-label">Details</label>
                        <div class="col-sm-8">
                            <textarea id="editor1" name="details" class="form-control"><?php echo $news_edit->details;?></textarea>
                        </div>
                    </div>  				
                    <div class="form-group">				
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