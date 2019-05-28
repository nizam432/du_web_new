<link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/css/reset.css"> <!-- CSS reset -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/css/sidebar_menu.css"> <!-- Resource style -->
<script src="<?php echo base_url() ?>assets/frontend/js/modernizr.js"></script> <!-- Modernizr -->

<?php
    $data['category'] = $this->model_common->get_root_category_data();
    $category_info = json_decode(json_encode($data['category']), True);

    foreach ($data['category'] as $key => $value) {
        $category_id = $category_info[$key]['category_id'];

        $data['sub_category'] = $this->model_common->get_sub_category_data($category_id);
        $sub_category = json_decode(json_encode($data['sub_category']), True);
        $category_info[$key]['sub_category'] = $sub_category;
    }
  //  pr($category_info);
?>

<div class="sidebar_menu">

    <div class="cd-dropdown-wrapper">
        <div class="visible-xs  pull-right">
            <a class="cd-dropdown-trigger btn btn-success" href="#0">Category Menu </a>
        </div>
        <nav class="cd-dropdown">
        <div class="visible-xs ">    
            <h2>Category</h2>
            <a href="#0" class="cd-close">Close</a>
        </div>
            <ul class="cd-dropdown-content">
    <?php 
    $i=1;
    foreach ($category_info as $category_info_data): ?>
                <li class="has-children">
                    <a href="#"><?php echo $category_info_data['font_icon']?' <span class="'.$category_info_data['font_icon'].'"></span> ':'<span class="fa fa-link"></span> '; echo $category_info_data['category_name']; ?></a>

                    <ul class="cd-secondary-dropdown is-hidden">
                        <li class="go-back"><a href="#0">Menu</a></li>
                        <!--<li class="see-all"><a href="http://codyhouse.co/?p=748">All <?php echo $category_info_data['font_icon']; ?></a></li>-->
                        <li class="has-children">
                            <a href="#"><?php echo $category_info_data['category_name']; ?></a>

                            <ul class="is-hidden">
                                <li class="go-back"><a href="#0"><?php echo $category_info_data['category_name']; ?></a></li>
                                <li class="see-all"><a href="<?php echo base_url().'frontend/category/'.$category_info_data['category_id'];?>">All <?php echo $category_info_data['category_name']; ?></a></li>
                                <?php foreach ($category_info_data['sub_category'] as $sub_category_data): ?>
                                <li><a href="<?php echo base_url().'frontend/sub_category/'.$sub_category_data['category_id'];?>"><?php echo $sub_category_data['category_name'];?></a></li>
                                <?php endforeach;?>
                            
                            </ul>
                        </li>

                    </ul> <!-- .cd-secondary-dropdown -->
                </li> <!-- .has-children -->
            <?php $i++; endforeach; ?>
            </ul> <!-- .cd-dropdown-content -->
        </nav> <!-- .cd-dropdown -->
    </div> <!-- .cd-dropdown-wrapper -->
    <div style="clear: both"></div>
</div>
<div style="clear: both;margin-bottom: 20px"></div>

<script src="<?php echo base_url() ?>assets/frontend/js/jquery-2.1.1.js"></script>
<script src="<?php echo base_url() ?>assets/frontend/js/jquery.menu-aim.js"></script> <!-- menu aim -->
<script src="<?php echo base_url() ?>assets/frontend/js/menu.js"></script> <!-- Resource jQuery -->