<div class="breadcrumb_container">
    <div class="breadcrumb">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>backend_dashboard"><span class="fa fa-dashboard"></span> Dashboard</a></li>
            <li><a href="<?php echo base_url() ?>backend_product">Product List</a></li>
            <li><a class="active">Product List</a></li>
        </ol>
    </div>
</div>

<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Add New Product</h3>
            <div class="box-body">
                <?php
                if (!empty($this->session->flashdata('product_form_validation'))) {
                    ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('product_form_validation'); ?>
                    </div>
                <?php } ?>
                <form  enctype="multipart/form-data" id="hsc_add_form" action="<?php echo base_url(); ?>backend_product/update/<?php echo $product_edit->product_id; ?>" method="post" class="form-horizontal">
                    <input type="hidden" name="id" value="" id="id">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Product Name <span class="req"/></label>
                        <div class="col-sm-4">
                            <input type="text" name="product_name" id="product_name" value="<?php echo $product_edit->product_name; ?>"  class="form-control input-sm" /> 
                        </div>
                        <label class="col-sm-2 control-label">Group <span class="req"/></label>
                        <div class="col-sm-4">
                            <select name="group_id" id="group_id" class="form-control group_id">	
                                <option value="">Select Group</option>
                                <?php
					
                                    foreach ($product_group as $product_group_data) {
                                        echo '<option '.(($product_edit->group_id==$product_group_data->group_id)? ' selected="selected" ':'').' value="' . $product_group_data->group_id . '">' . $product_group_data->group_name . '</option>';
                                    }
                                ?>
                            </select>								
                        </div>						
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Category <span class="req"/></label>
                        <div class="col-sm-4">
                            <select name="category_id" id="category_id" class="form-control category_id">	
                                <?php
                                foreach ($root_category as $category_data) {
                                    echo '<option  '.(($product_edit->category_id==$category_data->category_id)? ' selected="selected" ':'').' value="' . $category_data->category_id . '">' . $category_data->category_name . '</option>';
                                }
                                ?>
                            </select>								
                        </div>	
                        <label class="col-sm-2 control-label"> Sub Category <span class="req"/></label>
                        <div class="col-sm-4">
                            <select name="sub_category_id" id="sub_category_id" class="form-control sub_category_id">	
                                <?php
                                foreach ($sub_root_subcategory as $sub_category_data) {
                                    echo '<option  '.(($product_edit->sub_category_id==$sub_category_data->category_id)? ' selected="selected" ':'').'   value="' . $sub_category_data->category_id . '">' . $sub_category_data->category_name . '</option>';
                                }
                                ?>
                            </select>								
                        </div>      
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Description<span class="req"/></label>
                        <div class="col-sm-4">
                            <textarea type="text" name="description" id="description"  class="form-control input-sm textarea" ><?php echo $product_edit->description; ?></textarea> 
                        </div>
                    </div>  
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Product Images<span class="req"/></label>
                        <div class="col-sm-4">
                            <input type="file" name="master_image[]" class="form-control">
                        </div>						
                        <label class="col-sm-2 control-label">Isactive<span class="req"/></label>
                        <div class="col-sm-4">
                            <select name="isactive" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>	
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Optional Images<span class="req"/></label>
                        <div class="col-sm-4">
                            <input type="file" name="optional_image[]" class="form-control input-sm" multiple="multiple">
                        </div>	
                        <div class="col-sm-4">
                            <a onclick="add_optional_image()" class="btn btn-success input-sm"><i class="fa fa-plus"></i></a>
                            <a onclick="remove_optional_image()" class="btn btn-danger input-sm"><i class="fa fa-minus"></i></a>
                        </div>	                       
                    </div>
                    <div id="optional_image"></div> 
                    <button  class="btn btn-success  pull-right"><span class="fa fa-save"> Save</button>
                </form>	
            </div>	
        </div>
    </div>
</div>
<script>
    function add_optional_image(){
        $('#optional_image').append(
                '<div class="other_image">'
                +'<div class="form-group">'
                +'<label class="col-sm-2 control-label">Optional Images<span class="req"/></label>'
                +'<div class="col-sm-4">'
                +'<input type="file" name="optional_image[]" multiple="multiple" class="form-control input-sm">'
                +'</div>'
                +'</div>'
                +'</div>'
                 );
       //alert('test');
    }
    function remove_optional_image(){
         $('.other_image:last').remove();
    }
</script>

<script>
    // Faculty data load
    $('.group_id').change(function () {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>backend_product/ajax_get_category_data",
            data: {group_id: $(this).val()},
            beforeSend: function () {
                $(".category_id option:gt(0)").remove();
                $('.category_id').find("option:eq(0)").html("Please wait..");

            },
            success: function (data) {
                /*get response as json */
                $('.category_id').find("option:eq(0)").html("Please Select");
                $('.sub_category_id').find("option:eq(0)").html("Please Select");
                var obj = jQuery.parseJSON(data);
                $(obj).each(function (){
                    var option = $('<option />');
                    option.attr('value', this.value).text(this.label);
                    $('.category_id').append(option);
                });
            }
        });
    });
    
    // Category data load
    $('.category_id').change(function () {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>backend_product/ajax_get_sub_category_data",
            data: {category_id: $(this).val()},
            beforeSend: function () {
                $(".sub_category_id option:gt(0)").remove();
                $('.sub_category_id').find("option:eq(0)").html("Please wait..");

            },
            success: function (data) {
                /*get response as json */
                $('.sub_category_id').find("option:eq(0)").html("Please Select");
                var obj = jQuery.parseJSON(data);
                $(obj).each(function (){
                    var option = $('<option />');
                    option.attr('value', this.value).text(this.label);
                    $('.sub_category_id').append(option);
                });
            }
        });
    });    
    
</script>