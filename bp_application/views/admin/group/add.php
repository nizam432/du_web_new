<div class="col-md-12">
	<div class="breadcrumb_container">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url()?>/backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  <li><a href="<?php echo base_url(); ?>backend_group">Group List</a></li>
		  <li class="active">Add New group</li>
		</ol>
	</div>
</div>

<div class="col-md-12">
  <!-- general form elements -->
	<div class="box box-primary">
		<div class="box-header with-border">
		  <h3 class="box-title">Add New group</h3>
		</div><!-- /.box-header -->

		<!-- form start -->
		<form action="<?php echo base_url(); ?>backend_group/save" method="post" class="form-horizontal">
			<div class="box-body">
				<?php 
					if(!empty($this->session->flashdata('group_form_validation')))
					{?>
						<div class="alert alert-danger">
							<?php echo $this->session->flashdata('group_form_validation'); ?>
						</div>
					<?php }?>

				<div class="form-group ">
					<label class="col-sm-2">Group Name</label>
					<div class="col-sm-4">
						<input type="text" name="group_name" class="form-control">
					</div>					
					<label class="col-sm-2">Isactive</label>
					<div class="col-sm-4">
						<select name="isactive" class="form-control">
							<option value="1">Active</option>
							<option value="2">Inactive</option>
						</select>
					</div>
				</div>

			</div> <!-- /.box-body -->
		  <div class="box-footer">
			<button type="submit" class="btn btn-primary pull-right"><span class="fa fa-save"></span> Save</button>
		  </div>
		</form> <!-- form end -->
	</div>
  <!-- /.box -->
</div>
