<div class="col-md-12">
	<div class="breadcrumb_container">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url()?>backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  <li class="active">Menu</li>
		</ol>
	</div>
	
	<div class="submit_btn_all">
		<a href="<?php echo base_url()?>backend_menu/add"> 
			<button type="button" class="btn btn-primary"><span class="fa fa-plus-circle"><span> Add new</button>
		</a>	
	</div>
	
	<div class="box box-primary">
		<div class="box-header">
		  <h3 class="box-title">Menu  List</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body table-responsive">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
					  <th>#</th>
					  <th>ID</th>
					  <th>Menu Name</th>
					  <th>Menu Link</th>
					  <th>Menu Order</th>
					  <th>Status</th>
					  <th>Edit</th>
					</tr>
				</thead>
				<tbody>
			   <?php 	
					$sl=1;
					foreach($menu_list as $menu_list_data)
					{
						echo '<tr class="odd gradeX">
						<td>' . $sl++. '</td>
						<td>' . $menu_list_data->menu_id . '</td>
						<td>' .$menu_list_data->menu_name . '</td>
						<td>' .(($menu_list_data->menu_link=='')? '#':$menu_list_data->menu_link) . '</td>
						<td>' .$menu_list_data->menu_order . '</td>
						<td>' . (($menu_list_data->status==1)? 
						'<span class="label label-success">Publish</span>' :  '<span class="label label-warning">Unpublish</span>'). '</td>	
						<td> <a href="'.base_url().'backend_menu/edit/'.$menu_list_data->menu_id.'"><span class="fa fa-edit"></span> Edit</a></td>					
						</tr>';
					}  
				?>
				</tbody>
			</table>
		</div>
	<!-- /.box-body -->
	</div>
</div>