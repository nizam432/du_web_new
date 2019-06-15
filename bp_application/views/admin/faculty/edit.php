<div class="col-md-12">
	<div class="breadcrumb_container">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url()?>backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  <li><a href="<?php echo base_url(); ?>backend_faculty">faculty</a></li>
		  <li class="active">Update Faculty</li>
		</ol>
	</div>
</div>

<div class="col-md-12">
  <!-- general form elements -->
  <div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title">Update Faculty</h3>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form action="<?php echo base_url(); ?>backend_faculty/update/<?php echo $faculty_edit->faculty_id ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
	  <div class="box-body">
		<?php 
			if(!empty($this->session->flashdata('faculty_form_validation')))
			{?>
				<div class="alert alert-danger">
					<?php echo $this->session->flashdata('faculty_form_validation'); ?>
				</div>
		<?php }?>	
		<div class="form-group ">
			<label class="col-sm-2 control-label">Faculty Title<span class="req"/></span></label>
			<div class="col-sm-4">
				<input type="text" class="form-control" value="<?php echo $faculty_edit->faculty_title; ?>" name="faculty_title">
			</div>	
			<label class="col-sm-2 control-label">Head Of Office<span class="req"/></span></label>
			<div class="col-sm-4">
				<input type="text" class="form-control" value="<?php echo $faculty_edit->head_of_office; ?>" name="head_of_office">
			</div>			  
		</div>
		<div class="form-group ">
			<label class="col-sm-2 control-label">Designation<span class="req"/></span></label>
			<div class="col-sm-4">
				<input type="text" class="form-control" name="designation" value="<?php echo $faculty_edit->designation; ?>">
			</div>	
			<label class="col-sm-2 control-label">Picture<span class="req"/></span></label>
			<div class="col-sm-2">
				<input type="file" class="form-control" name="faculty_head_picture">
			</div>		
			<div class="col-sm-2">
				<img width="80" src="<?php echo base_url().$faculty_edit->faculty_head_picture ?>">
			</div>
		</div>
		
		<div class="form-group ">
			<label class="col-sm-2 control-label">Description<span class="req"/></span></label>
			<div class="col-sm-10">
				<textarea type="text" id="editor1" class="form-control" name="description"><?php echo $faculty_edit->description; ?></textarea>
			</div>
		</div>
		
		<div class="form-group">
		  <label class="col-sm-2 control-label">Status</label>
		  <div class="col-sm-4">
			  <select name="status" class="form-control">
				<option <?php if($faculty_edit->status==1) echo ' selected="selected"'  ?> value="1">Publish</option>
				<option <?php if($faculty_edit->status==2) echo ' selected="selected"'  ?> value="2">Unpublish</option>
			  </select>
			  </div>
		</div>
		
	  </div>
	  <!-- /.box-body -->
	  <div class="box-footer">
		<button  class="btn btn-success  pull-right"><span class="fa fa-save"></span> Save</button>
	  </div>
	</form>
  </div>
  <!-- /.box -->
</div>
