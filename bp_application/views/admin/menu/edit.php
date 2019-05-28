<div class="col-md-12">
	<div class="breadcrumb_container">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url()?>backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  <li><a href="<?php echo base_url(); ?>backend_menu">Menu List</a></li>
		  <li class="active">Update Menu</li>
		</ol>
	</div>
</div>

<div class="col-md-6 col-md-offset-3">
  <!-- general form elements -->
	<div class="box box-primary">
		<div class="box-header with-border">
		  <h3 class="box-title">Update Menu</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form action="<?php echo base_url(); ?>backend_menu/update/<?php echo $menu_edit->menu_id ?>" method="post">
			<div class="box-body">
				<?php 
					if(!empty($this->session->flashdata('menu_form_validation')))
					{?>
						<div class="alert alert-danger">
							<?php echo $this->session->flashdata('menu_form_validation'); ?>
						</div>
				<?php }?>	  
				<div class="form-group ">
					<label >menu Title</label>
					<input type="text" name="menu_name" value="<?php echo $menu_edit->menu_name ?>" class="form-control">
				</div>
				<div class="form-group ">
					<label >Menu Link</label>
					<input type="text" name="menu_link" value="<?php echo $menu_edit->menu_link ?>" class="form-control">
				</div>
				<div class="form-group">
					<label>Root Menu</label>
					<select name="root_menu" class="form-control">
						<option value="0">Root Menu</option>
						<?php 
							foreach($root_menu as $root_menu_data){
								echo '<option value="'.$root_menu_data->menu_id.'">'.$root_menu_data->menu_name.'</option>'; 
							}
						?>						
						
					</select>
				</div>				
				<div class="form-group">
					<label>Sub Root Menu</label>
					<select name="sub_root_menu" class="form-control">
						<option value="0">Sub Root Menu</option>
						<?php 
							foreach($sub_root_menu as $sub_root_menu_data){
								echo '<option value="'.$sub_root_menu_data->menu_id.'">'.$sub_root_menu_data->menu_name.'</option>'; 
							}
						?>
					</select>
				</div>					
				<div class="form-group ">
					<label >Menu Order</label>
					<input type="text" name="menu_order" value="<?php echo $menu_edit->menu_order ?>" class="form-control">
				</div>
				<div class="form-group ">
					<label >Menu Icon</label>
					<input type="text" name="menu_icon" value="<?php echo $menu_edit->menu_icon ?>" class="form-control">
				</div>				
				<div class="form-group">
					<label>Status</label>
					<select name="status" class="form-control">
						<option <?php if($menu_edit->status==1) echo ' selected="selected" ';?> value="1">Publish</option>
						<option <?php if($menu_edit->status==2) echo ' selected="selected" ';?> value="2">Unpublish</option>
					</select>
				</div>
			</div>
			<!-- /.box-body -->
			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
  <!-- /.box -->
</div>
