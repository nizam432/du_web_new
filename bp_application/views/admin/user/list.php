<div class="col-md-12">
	<div class="breadcrumb_container">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url()?>backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  <li class="active">User</li>
		</ol>
	</div>
	
	<div class="submit_btn_all">
		<a href="<?php echo base_url()?>backend_user/add"> 
			<button type="button" class="btn btn-primary "><span class="fa fa-plus-circle"></span> Add new</button>
		</a>
	</div>
	
	<div class="box box-primary">
	<div class="box-header">
	  <h3 class="box-title">User List</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body table-responsive">
	  <table id="example1" class="table table-bordered table-striped">
		<thead>
		<tr>
		  <th>#</th>
		  <th>Name</th>
		  <th>Email</th>
		  <th>Status</th>
		  <th>Action</th>
		</tr>
		</thead>
		<tbody>
		   <?php 	
				$sl=1;
				foreach($register_list as $register_list_data)
				{
					echo '<tr class="odd gradeX">
					<td>' . $sl++. '</td>
					<td>' . $register_list_data->name . '</td>
					<td>' . $register_list_data->email_id . '</td>';
					echo '<td>' . (($register_list_data->status==1)? '<span class="label label-success">Publish</span>' :  '<span class="label label-warning">Unpublish</span>'). '</td>	
						<td> <a href="'.base_url().'backend_user/edit/'.$register_list_data->id.'"><span class="fa fa-edit"></span> Edit</a></td>';
				}  
		?>
		</tbody>
		<!--<tfoot>
		<tr>
		  <th>Rendering engine</th>
		  <th>Browser</th>
		  <th>Platform(s)</th>
		  <th>Engine version</th>
		</tr>
		</tfoot>-->
	  </table>
	</div>
	<!-- /.box-body -->
	</div>
</div>