<div class="col-md-12">
    <div class="breadcrumb_container">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>/backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Add/Edit Previlege</li>
        </ol>
    </div> 
</div>
<div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Role privilege</h3>
        </div>
        <div class="box-body">
            <?php
            if (!empty($this->session->flashdata('role_privilege_form_validation'))) {
                ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('role_privilege_form_validation'); ?>
                </div>
            <?php } ?>		
            <!-- Start user group form-->
            <form class="form-horizontal" action="<?php echo base_url() ?>backend_role_privilege/save" method="post">
                <div class="form-group">
                    <label class="col-sm-2 control-label">User Group</label>
                    <div class="col-sm-3">
                        <select  class="form-control addrecord" name="user_group" id="user_group">
                            <option value="">Please select</option>
                            <?php
                            foreach ($user_group as $user_group_data) {
                                echo '<option value="' . $user_group_data->user_group_id . '">' . $user_group_data->user_group_title . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
        </div> <!-- ./box-body -->
    </div> <!-- ./box-primary -->
</div> <!-- ./col-sm-12 -->
<div id="privilege"></div>
<script>
    // Faculty data load
    $('#user_group').change(function () {
      
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>backend_role_privilege/get_previlige_info",
            data: {user_group: $(this).val()},
            success: function (data) {
                  $('#privilege').html(data);
//                var total_row=$('[id^="menu"]').length;
//
//                for(var i=1; i<=total_row; i++)
//                {
//                    if($('.menu'+i).is(':checked'))
//                    {
//                      $('.menu'+i).remove('checked="checked"');
//                    }
//
//                }
                //$("input[type='checkbox']").attr("checked",false);
                //$('.menu').prop('checked', false);
                //var obj = jQuery.parseJSON(data);
               // $(obj).each(function (index, val)
               // {
                    
                //    $('#menu' + val['menu']).attr('checked', true);
               // });
            },
            /*ends */

        });
    });
</script>
