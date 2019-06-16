<div class="breadcrumb_container">
    <div class="breadcrumb">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>backend_dashboard"><span class="fa fa-dashboard"></span> Dashboard</a></li>
            <li><a href="<?php echo base_url() ?>backend_Link">Administration</a></li>
            <!--<li><a class="active">Add New Link</a></li>-->
        </ol>
    </div>
</div>

<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Administration</h3>
            <div class="box-body">
                <?php
                if (!empty($this->session->flashdata('link_form_validation'))) {
                    ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('link_form_validation'); ?>
                    </div>
                <?php } ?>
              <form id="hsc_add_form"  action="<?php echo base_url(); ?>backend_administration/save" method="post" class="form-horizontal" enctype="multipart/form-data">
                   
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Administrator Type</label>
                        <div class="col-sm-4">
						<?php $administrator_type=get_array('administrator_type');?>
                            <select name="administrator_type" id="administrator_type" class="form-control">
                                <option value="">Select</option>
								<?php foreach($administrator_type as $key=>$value){?>
                                <option value="<?php echo $key?>"><?php echo $value ?></option>
								<?php } ?>
                            </select>
                        </div>						
                         <div class="col-sm-2">
					<!--	<button onclick="fnc_administration_type()"  class="btn btn-success  pull-right"><span class="fa fa-search"></span> search</button>-->
						<input type="button" class="btn btn-primary" value="Search" onclick="fnc_administration()"><br><br>
						</div>  
                    </div>  				
                    
               </form>
            </div>	
        </div>
    </div>
</div>

<script>
function fnc_administration(){
	var administrator_type=$("#administrator_type").val();
	alert(administrator_type);
}
</script>