<div class="col-md-12">
    <div class="breadcrumb_container">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Price</li>
        </ol>
    </div>

    <div class="submit_btn_all">
        <a href="<?php echo base_url() ?>backend_price/add"> 
            <button type="button" class="btn btn-primary"><span class="fa fa-plus-circle"></span> Add new</button>
        </a>	
    </div>

    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">price  List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Sales Price</th>
                        <th>Whole Sale Price</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sl = 1;
                    foreach ($price_list as $price_list_data) {
                        echo '<tr class="odd gradeX">
                        <td>' .$sl++ . '</td>
                        <td>' .$price_list_data->product_name. '</td>
                        <td>' .$price_list_data->sale_price. '</td>
                        <td>' .$price_list_data->whole_sale_price. '</td>
                        <td>' .(($price_list_data->isactive == 1) ?
                            '<span class="label label-success">Active</span>' : '<span class="label label-warning">Inactive</span>') . '</td>						
                        </tr>';                   
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>
