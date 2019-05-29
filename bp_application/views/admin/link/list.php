<div class="col-md-12">
    <div class="breadcrumb_container">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Link</li>
        </ol>
    </div>

    <div class="submit_btn_all">
        <a href="<?php echo base_url() ?>backend_Link/add"> 
            <button type="button" class="btn btn-primary"><span class="fa fa-plus-circle"></span> Add new</button>
        </a>	
    </div>

    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Link List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body ">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Link</th>
                        <th>Type</th>
                        <th>Isactive</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sl = 1;
					$link_type=get_array('link_type');
                    foreach ($link_list as $link_list_data) {
                        echo '<tr class="odd gradeX">
                            <td>' . $sl++ . '</td>
                            <td>'.$link_list_data->link_title. '</td>
                            <td>'.$link_list_data->link_or_url. '</td>
                            <td>'.$link_type[$link_list_data->link_type]. '</td>
                            <td>' . (($link_list_data->status == 1) ?
                                '<span class="label label-success">Active</span>' : '<span class="label label-warning">Inactive</span>') . '</td>	 
                            <td> <a href="' . base_url() . 'backend_Link/edit/' . $link_list_data->link_id . '"><span class="fa fa-edit"></span> Edit</a></td>					
                        </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>