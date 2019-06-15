<div class="col-md-12">
	<div class="breadcrumb_container">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url()?>backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  <li><a href="<?php echo base_url(); ?>backend_department">Department</a></li>
		  <li class="active">Update Department</li>
		</ol>
	</div>
</div>

<div class="col-md-12">
  <!-- general form elements -->
  <div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title">Update Department</h3>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form action="<?php echo base_url(); ?>backend_department/update/<?php echo $department_edit->department_id ?>" method="post" class="form-horizontal">
	  <div class="box-body">
		<?php 
			if(!empty($this->session->flashdata('department_form_validation')))
			{?>
				<div class="alert alert-danger">
					<?php echo $this->session->flashdata('department_form_validation'); ?>
				</div>
		<?php }?>	  
		<div class="form-group ">
		  <label  class="form-label col-sm-2">Department Title</label>
		  <div class="col-sm-4">
			<input type="text" value="<?php echo $department_edit->department_title ?>" name="department_title" class="form-control">
		  </div>
		  
		  <label class="form-label col-sm-2">Faculty</label>
			<div class="col-sm-4">
				<select name="faculty" class="form-control">
				<option value="">Please select</option>
				<?php 
					foreach($faculty as $faculty_data)
					{		
						echo '<option '.(($faculty_data->faculty_id==$department_edit->faculty)? 'selected="selected"': '').' value="'.$faculty_data->faculty_id.'">'.$faculty_data->faculty_title.'</option>';
					}
				?>
			  </select>
			</div>
		</div>	
		<div class="form-group ">
			<label class="col-sm-2 control-label">Description<span class="req"/></span></label>
			<div class="col-sm-10">
				<textarea type="text" id="editor1" class="form-control" name="description"><?php echo $department_edit->description;?></textarea>
			</div>
		</div>		
		<div class="form-group ">
		  <label  class="form-label col-sm-2">Head of Department</label>
		  <div class="col-sm-4">
			<input type="text" value="<?php echo $department_edit->head_of_department;?>" name="head_of_department" class="form-control">
		  </div>
		  
			<label class="form-label col-sm-2">Designation</label>
			<div class="col-sm-4">
				<input type="text" value="<?php echo $department_edit->designation;?>" name="designation" class="form-control">
			</div>
		 </div>
				
		<div class="form-group ">
		  <label  class="form-label col-sm-2">Address</label>
		  <div class="col-sm-10">
			<input type="text" value="<?php echo $department_edit->address;?>" name="address" class="form-control">
		  </div>
		</div>
		
		<div class="form-group ">
		  <label  class="form-label col-sm-2">Phone</label>
		  <div class="col-sm-4">
			<input type="text" value="<?php echo $department_edit->phone;?>" name="phone" class="form-control">
		  </div>
		  
			<label class="form-label col-sm-2">Fax</label>
			<div class="col-sm-4">
				<input type="text" value="<?php echo $department_edit->fax;?>" name="fax" class="form-control">
			</div>
		 </div>
		<div class="form-group ">
		  <label  class="form-label col-sm-2">Website</label>
		  <div class="col-sm-4">
			<input type="text" value="<?php echo $department_edit->website;?>" name="website" class="form-control">
		  </div>		  
		  <label  class="form-label col-sm-2">Email ID</label>
		  <div class="col-sm-4">
			<input type="text" value="<?php echo $department_edit->email_id;?>" name="email_id" class="form-control">
		  </div>
		</div>
		<div class="form-group">
			<label class="form-label col-sm-2">Status</label>
			<div class="col-sm-4">
			<select name="status" class="form-control">
			<option <?php if($department_edit->status==1) echo ' selected="selected" ';?> value="1">Publish</option>
			<option <?php if($department_edit->status==2) echo ' selected="selected" ';?> value="2">Unpublish</option>
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
