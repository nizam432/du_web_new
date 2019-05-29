<div class="usefull_link">
    <h1><i class="fa fa-bell" aria-hidden="true"></i> Notice Board</h1>
	<ul>
            <?php foreach($notice as $notice_data){?>
            <li>
                <a target="_blank" href="<?php echo base_url()?>notice/<?php echo $notice_data->notice_id; ?>">
                    <?php echo $notice_data->notice ?>
                </a>
            </li>  
            <?php } ?>
        </ul>    
</div>