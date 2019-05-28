<div class="col-md-12">
	<div class="breadcrumb_container">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url()?>backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  <li class="active">group</li>
		</ol>
	</div>
	
	<div class="submit_btn_all">
		<a href="<?php echo base_url()?>backend_group/add"> 
			<button type="button" class="btn btn-primary"><span class="fa fa-plus-circle"><span> Add new</button>
		</a>	
	</div>
	
	<div class="box box-primary">
		<div class="box-header">
		  <h3 class="box-title">Group  List</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body ">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
					  <th>#</th>
					  <th>Group Name</th>
					  <th>Isactive</th>
					  <th>Edit</th>
					</tr>
				</thead>
				<tbody>
			   <?php 	
					$sl=1;
					foreach($group_list as $group_list_data)
					{
						echo '<tr class="odd gradeX">
						<td>' . $sl++. '</td>
						<td>' .$group_list_data->group_name . '</td>
						<td>' . (($group_list_data->isactive==1)? 
						'<span class="label label-success">Active</span>' :  '<span class="label label-warning">Inactive</span>'). '</td>	
						<td> <a href="'.base_url().'backend_group/edit/'.$group_list_data->group_id.'"><span class="fa fa-edit"></span> Edit</a></td>					
						</tr>';
					}  
				?>
				</tbody>
			</table>
		</div>
	<!-- /.box-body -->
	</div>
</div>