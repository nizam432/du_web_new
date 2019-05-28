<div class="col-md-12">
    <div class="breadcrumb_container">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>/backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>backend_menu">Menu List</a></li>
            <li class="active">Add New menu</li>
        </ol>
    </div>
</div>

<div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Add New menu</h3>
        </div><!-- /.box-header -->

        <!-- form start -->
        <form action="<?php echo base_url(); ?>backend_menu/save" method="post" class="form-horizontal">
            <div class="box-body">
                <?php
                if (!empty($this->session->flashdata('menu_form_validation'))) {
                    ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('menu_form_validation'); ?>
                    </div>
                <?php } ?>

                <div class="form-group ">
                    <label class="col-sm-2">Menu Name</label>
                    <div class="col-sm-4">
                        <input type="text" name="menu_name" class="form-control">
                    </div>
                    <label class="col-sm-2">Menu Link</label>
                    <div class="col-sm-4">
                        <input type="text" name="menu_link" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2">Root Menu</label>
                    <div class="col-sm-4">
                        <select name="root_menu" class="form-control">
                            <option value="0">Root Menu</option>
                            <?php
                            foreach ($root_menu as $root_menu_data) {
                                echo '<option value="' . $root_menu_data->menu_id . '">' . $root_menu_data->menu_name . '</option>';
                            }
                            ?>						

                        </select>
                    </div>
                    <label class="col-sm-2">Sub Root Menu</label>
                    <div class="col-sm-4">
                        <select name="sub_root_menu" class="form-control">
                            <option value="0">Sub Root Menu</option>
                            <?php
                            foreach ($sub_root_menu as $sub_root_menu_data) {
                                echo '<option value="' . $sub_root_menu_data->menu_id . '">' . $sub_root_menu_data->menu_name . '</option>';
                            }
                            ?>
                        </select>	
                    </div>	
                </div>						
                <div class="form-group ">
                    <label class="col-sm-2">Menu Order</label>
                    <div class="col-sm-4">
                        <input type="text" name="menu_order" class="form-control">
                    </div>				
                    <label class="col-sm-2">Menu Icon</label>
                    <div class="col-sm-4">
                        <input type="text" name="menu_icon" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2">Status</label>
                    <div class="col-sm-4">
                        <select name="status" class="form-control">
                            <option value="1">Publish</option>
                            <option value="2">Unpublish</option>
                        </select>
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
