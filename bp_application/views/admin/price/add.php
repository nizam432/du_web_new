<div class="col-md-12">
    <div class="breadcrumb_container">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>/backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>backend_price">Menu List</a></li>
            <li class="active">Add New Price</li>
        </ol>
    </div>
</div>

<div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Add New Price</h3>
        </div><!-- /.box-header -->

        <!-- form start -->
        <form action="<?php echo base_url(); ?>backend_price/save" method="post" class="form-horizontal">
            <div class="box-body">
                <?php
                if (!empty($this->session->flashdata('price_form_validation'))) {
                    ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('price_form_validation'); ?>
                </div>
                <?php } ?>
                <div class="form-group">
                    <label class="col-sm-2">Product Name</label>
                    <div class="col-sm-4">
                        <select name="product_id" class="form-control">
                            <option value="0">Please select</option>
                            <?php
                                foreach ($product as $product_data) {
                                    echo '<option value="' . $product_data->product_id . '">' . $product_data->product_name . '</option>';
                                }
                            ?>						
                        </select>
                    </div>

                    <label class="col-sm-2">Sales Price</label>
                    <div class="col-sm-4">
                        <input type="text" name="sale_price" class="form-control">
                    </div>   

                </div>        
                <div class="form-group ">
                    <label class="col-sm-2">Whole sale price</label>
                    <div class="col-sm-4">
                        <input type="text" name="whole_sale_price" class="form-control">
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
