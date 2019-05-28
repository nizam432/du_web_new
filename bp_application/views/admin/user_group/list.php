<div class="col-md-12">
    <div class="breadcrumb_container">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">User Group</li>
        </ol>
    </div>

    <div class="submit_btn_all"> 
        <a href="<?php echo base_url() ?>backend_user_group/add"> 
            <button type="button" class="btn btn-primary "><span class="fa fa-plus-circle"></span> Add new</button>
        </a>	
    </div>
	
    <div class="box box-primary">
        <div class="box-header">
	  <h3 class="box-title">User Group List</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
		<thead>
                    <tr>
                      <th><input type="checkbox"  id="selecctall" /></th> 	
                      <th>#</th>
                      <th>User Group Name</th>
                      <th>Description</th>
                      <th>Entry By</th>
                      <th>Entry Date & Time</th>
                      <th>Status</th>
                      <th>Edit</th>
                    </tr>
		</thead>
		<tbody>
		   <?php 	
                    $sl=1;
                    foreach($user_group_list as $user_group_list_data)
                    {
                        echo '<tr class="odd gradeX">
                        <td><input type="checkbox" name="checkbox[]" value="' . $user_group_list_data->user_group_id . '" id="checkbox[]" class="checkbox1"></td>
                        <td>' . $sl++. '</td>
                        <td>'.$user_group_list_data->user_group_title . '</td>
                        <td>'.$user_group_list_data->description . '</td>
                        <td>' . $user_group_list_data->entry_by . '</td>
                        <td>' . $user_group_list_data->entry_date_time . '</td>
                        <td>' . (($user_group_list_data->status==1)? 
                        '<span class="label label-success">Publish</span>' :  '<span class="label label-warning">Unpublish</span>'). '</td>	
                        <td> <a href="'.base_url().'backend_user_group/edit/'.$user_group_list_data->user_group_id.'"><span class="fa fa-edit"></span> Edit</a></td>					
                        </tr>';
                    }  
                    ?>
		</tbody>
            </table>
	</div>
	<!-- /.box-body -->
    </div>
</div> <!--/.col-md-12 -->
