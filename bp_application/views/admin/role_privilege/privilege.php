<div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-body">
            <!-- Start user group form-->
            <form class="form-horizontal" action="<?php echo base_url() ?>backend_role_privilege/save" method="post">
                <input type="hidden"  name="user_group" value="<?php echo $user_group ?>">
                <?php //print_r($privilege);?>
                <ul><!--Menu Start--> 					
                    <?php 
                    $sl=0;
                    foreach ($menu_info as $menu_info_data): 
                        $sl++;
                        ?>	
                        <li>
                            <input type="checkbox" <?php if(in_array($menu_info_data['menu_id'], $privilege)) echo ' checked="checked" ' ?> name="menu[]" value="<?php echo $menu_info_data['menu_id']; ?>">
                            <?php echo $menu_info_data['menu_name']; ?>

                            <?php if (count($menu_info_data['sub_menu']) > 0) : ?>
                                <!--Sub Menu Start--> 
                                <?php foreach ($menu_info_data['sub_menu'] as $sub_menu_data): 
                                     $sl++;
                                    ?>
                                    <ul>
                                        <li>
                                            <input type="checkbox" <?php if(in_array($sub_menu_data['menu_id'], $privilege)) echo ' checked="checked" ' ?>  name="menu[]" value="<?php echo $sub_menu_data['menu_id']; ?>">
                                            <?php echo $sub_menu_data['menu_name']; ?>
                                        </li>
                                    </ul>	
                                <?php endforeach; ?>
                                <!--Sub Menu End--> 
                            <?php endif; ?>	

                        </li>	
                    <?php endforeach; ?>
                </ul><!--Menu End--> 
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
            </form> <!-- End user group form-->
        </div> <!-- ./box-body -->
    </div> <!-- ./box-primary -->
</div> <!-- ./col-sm-12 -->