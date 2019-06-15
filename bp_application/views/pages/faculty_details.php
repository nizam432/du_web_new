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
			<div class="faculty_details">
				<?php //print_r($faculty_details);?>
				<h1>Head of Office: <?php echo $faculty_details->head_of_office ?></h1>
				<h1>Designation: <?php echo $faculty_details->designation ?></h1>
				<h2><?php echo $faculty_details->faculty_title ?></h2>
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