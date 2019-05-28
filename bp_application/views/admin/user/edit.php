<div class="col-md-12">
	<div class="breadcrumb_container">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url()?>/backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  <li class="active">Edit user</li>
		</ol>
	</div>
</div>

<div class="col-md-12">
  <!-- general form elements -->
	<div class="box box-primary">
		<div class="box-header with-border">
		  <h3 class="box-title">Edit User</h3>
		</div>
		<div class="box-body">
			<?php if(!empty($this->session->flashdata('user_form_validation'))):?>
				<div class="alert alert-danger">
					<?php echo $this->session->flashdata(user_form_validation); ?>
				</div>
			<?php endif;?>
			<form class="form-horizontal" action="<?php echo base_url(); ?>backend_user/update/<?php echo $user_edit_data->id; ?>" data-toggle="validator" method="post">
				<?php 
					if(!empty($this->session->flashdata('user_form_validation')))
					{?>
						<div class="alert alert-danger">
							<?php echo $this->session->flashdata('user_form_validation'); ?>
						</div>
				<?php }?>			
				<div class="box-body">
					<div class="form-group">
						<label class="control-label col-sm-2">Name</label>
						<div class="col-sm-4">
							<input type="text" name="name" value="<?php echo $user_edit_data->name; ?>" class="form-control" required>
						</div>		
						<label class="control-label col-sm-2">Email</label>
						<div class="col-sm-4">
							<input type="text" name="email_id" value="<?php echo $user_edit_data->email_id; ?>" class="form-control" required>
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-2">Password</label>
						<div class="col-sm-4">
							<input type="password" name="password" class="form-control" >
						</div>	
						<label class="control-label col-sm-2">User Group</label>
						<div class="col-sm-4">
							<select name="user_group" class="form-control" >
								<?php foreach($user_group as $user_group_data):?>
									<option value="<?php echo $user_group_data->user_group_id;  ?>"><?php echo $user_group_data->user_group_title; ?></option>
								<?php endforeach; ?>	
							</select>
						</div>
					</div>	
					
					<div class="form-group">
						<label class="control-label col-sm-2">Status</label>
						<div class="col-sm-4">
							<select name="status" class="form-control">
								<option value="1">Active</option>
								<option value="2">Inactive</option>
							</select>
						</div>
					</div><br>
					<div class="box-footer">
						<button type="submit" class="btn btn-primary pull-right">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>