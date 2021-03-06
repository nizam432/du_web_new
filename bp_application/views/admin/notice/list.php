<div class="col-md-12">
    <div class="breadcrumb_container">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Notice</li>
        </ol>
    </div>

    <div class="submit_btn_all">
        <a href="<?php echo base_url() ?>backend_notice/add"> 
            <button type="button" class="btn btn-primary"><span class="fa fa-plus-circle"></span> Add new</button>
        </a>	
    </div>

    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Notice List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body ">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Notice</th>
                        <th>Isactive</th>
                        <th>Attached File</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sl = 1;
                    foreach ($notice_list as $notice_list_data) {
                        echo '<tr class="odd gradeX">
                            <td>' . $sl++ . '</td>
                            <td>'.$notice_list_data->notice. '</td>
                            <td>' . (($notice_list_data->status == 1) ?
                                '<span class="label label-success">Active</span>' : '<span class="label label-warning">Inactive</span>') . '</td>	
                            <td><a target="_blanck" href="'.base_url().$notice_list_data->attached_file.'" style="color:green"><span class="fa fa-download"></span> Download</a></td>
                            <td> <a href="' . base_url() . 'backend_notice/edit/' . $notice_list_data->notice_id . '"><span class="fa fa-edit"></span> Edit</a></td>					
                        </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>