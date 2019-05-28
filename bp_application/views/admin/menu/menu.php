<?php
$user_data = $this->session->userdata('login_session_data');
$privilege = $user_data['privilege'];
$data = array();
$data['menu'] = $this->model_common->get_root_menu_data();
$menu_info = json_decode(json_encode($data['menu']), True);

foreach ($data['menu'] as $key => $value) {
    $menu_id = $menu_info[$key]['menu_id'];

    $data['sub_menu'] = $this->model_common->get_sub_menu_data($menu_id);
    $sub_menu = json_decode(json_encode($data['sub_menu']), True);
    $menu_info[$key]['sub_menu'] = $sub_menu;
}
?>
<ul class="sidebar-menu"> <br>
    <li class="header active">Menu</li>

<?php foreach ($menu_info as $menu_info_data): ?>
        <?php if (in_array($menu_info_data['menu_id'], $privilege)): ?>
            <li <?php if (count($menu_info_data['sub_menu']) > 0) {
                echo ' class="treeview" ';
            } ?>>
                <a href="<?php if (!empty($menu_info_data['menu_link'])) {
                echo base_url() . $menu_info_data['menu_link'];
            } else {
                echo '#';
            } ?>">
				
                    <i class="<?php echo $menu_info_data['menu_icon']; ?>" aria-hidden="true"></i> <span><?php echo $menu_info_data['menu_name']; ?></span>
                    <?php
                    if (count($menu_info_data['sub_menu']) > 0) {
                        echo '<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>';
                    }
                    ?>

                </a>
                    <?php if (count($menu_info_data['sub_menu']) > 0) : ?>

                    <ul class="treeview-menu">
            <?php foreach ($menu_info_data['sub_menu'] as $sub_menu_data): ?>
                <?php if (in_array($sub_menu_data['menu_id'], $privilege)): ?>
                                <li>
                                    <a href="<?php echo base_url() . $sub_menu_data['menu_link'] ?>">
                                        <i class="<?php echo $sub_menu_data['menu_icon']; ?>"></i> <span>
										<?php echo $sub_menu_data['menu_name']; ?></span>
                                    </a>
                                </li>	
                    <?php endif; ?>	
                <?php endforeach; ?>			
                    </ul>		
        <?php endif; ?>		
            </li>
    <?php endif; ?>
<?php endforeach; ?>
</ul>