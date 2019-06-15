
<!-- Slider 1 Area Start Here -->               
<?php  $this->load->view('pages/slider')?>

<?php $this->load->view('pages/home/about');?>
<!-- Slider 1 Area End Here -->

<!-- About 2 Area End Here -->
<!-- News and Event Area Start Here -->
<div class="news-event-area">
	<div class="container">
		<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="usefull_link">
				<h1><span class="fa fa-link"></span> Usefull Link</h1>
				<ul>
					<?php foreach($use_full_link as $link_data){?>
					<li>
						<a target="_blank" href="<?php echo $link_data->link_or_url?>">
							<span class="fa fa-angle-double-right"></span> 
							<?php echo $link_data->link_title;?> 
						</a>
					</li>
					<?php } ?>
				</ul>
			</div><br>
			<div class="usefull_link">
				<h1><span class="fa fa-link"></span>  Quick Link</h1>
				<ul>
					<?php foreach($quick_link as $link_data){?>
					<li>
						<a target="_blank" href="<?php echo $link_data->link_or_url?>">
							<span class="fa fa-angle-double-right"></span> 
							<?php echo $link_data->link_title;?> 
						</a>
					</li>
					<?php } ?>
				</ul>
			</div><br>			
			<div class="usefull_link">
				<h1><span class="fa fa-link"></span>  Quick Link</h1>
				<ul>
					<?php foreach($quick_link as $link_data){?>
					<li>
						<a target="_blank" href="<?php echo $link_data->link_or_url?>">
							<span class="fa fa-angle-double-right"></span> 
							<?php echo $link_data->link_title;?> 
						</a>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>					
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<!--<h2 class="title-default-left">LIFE AT DU</h2>-->
			<div class="home_about">
				<img src="<?php echo base_url()?>/assets/frontend/images/du_pic_1.jpg" class="img-responsive" alt="news">
				<p align="justify">
				<h2>The University</h2>
		On the first day of July 1921 the University of Dhaka opened its doors to students with 
		Sir P.J. Hartog as the first Vice-Chancellor of the University. 
		The University was set up in a picturesque part of the city known as Ramna on 600 acres of land.
		<br /><br />
		The University started its activities with 3 Faculties,12
		Departments, 60 teachers, 877 students and 3 dormitories
		(Halls of Residence) for the students. At present the University
		consists of 13 Faculties, 83 Departments, 12 Institutes, 20 residential halls,
		3 hostels and more than 56 Research Centres. The
		number of students and teachers has risen to about 37018
		and 1992 respectively.
		
		
		<br /><br />
		
		The main purpose of the University was to create new areas of knowledge and
		disseminate this knowledge to the society through its students. Since its inception
		the University has a distinct character of having distinguished scholars as
		faculties who have enriched the global pool of knowledge by making notable
		contributions in the fields of teaching and research.
				</p>
				<div class="news-btn-holder">
				<a href="<?php echo base_url()?>frontend/about_us" class="view-all-accent-btn">Read More</a>
				</div>	
			</div>
		</div>
		
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<?php $this->load->view('pages/home/notice'); ?>
		</div>		
		

							  
		</div>
	</div>
</div>

<!-- Faculty Area  -->
  <?php  //$this->load->view('pages/news'); ?>

<!-- News Area  -->
  <?php $this->load->view('pages/home/news'); ?>

<!-- Gallery Area -->
<?php $this->load->view('pages/gallery'); ?>
