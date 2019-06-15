<div class="container">
	<div class="other_page notice_details">
		<div class="col-sm-3">
				<div class="usefull_link">
					<h1><?php echo $faculty_details->faculty_title ?></h1>
					<ul>
						<?php foreach($department as $department_data){ ?>
						<li>
							<a href="<?php echo base_url();?>frontend/department_details/<?php echo $department_data->department_id ?>">
							<span class="fa fa-angle-double-right"></span> <?php echo $department_data->department_title ?></a>
						</li>		 
						<?php }?>
					</ul>    
				</div>		
		</div>
		<div class="col-sm-9">
			<div class="department_details">
				<h1><?php echo $faculty_details->faculty_title ?></h1>
				<h2><b>Head of Department:</b> <?php echo $department_details->head_of_department?></h2>
				<h2><b>Designation:</b> <?php echo $department_details->designation?></h2>
				<h2><b>Address:</b> <?php echo $department_details->address?></h2>
				<h2><b>Phone:</b> <?php echo $department_details->phone?></h2>
				<h2><b>Fax:</b> <?php echo $department_details->fax?></h2>
				<h2><b>Email ID:</b> <?php echo $department_details->email_id;?></h2>
				<h2><b>Website:</b> <?php echo $department_details->website;?></h2><br>
				<?php if(file_exists($faculty_details->faculty_head_picture)){?>
				<div class="">
					<img  src="<?php echo base_url().$faculty_details->faculty_head_picture ?>">
				</div>
				<?php } ?>
				<div><?php echo $faculty_details->description; ?></div>	
			</div>
		</div>
	</div>
</div>