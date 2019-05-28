
	<!-- Courses 1 Area Start Here -->
	<div class="courses1-area">
		<div id="shadow-carousel" class="container">    
			<div class="rc-carousel"
				data-loop="true"
				data-items="4"
				data-margin="20"
				data-autoplay="false"
				data-autoplay-timeout="10000"
				data-smart-speed="2000"
				data-dots="false"
				data-nav="true"
				data-nav-speed="false"
				data-r-x-small="1"
				data-r-x-small-nav="true"
				data-r-x-small-dots="false"
				data-r-x-medium="2"
				data-r-x-medium-nav="true"
				data-r-x-medium-dots="false"
				data-r-small="2"
				data-r-small-nav="true"
				data-r-small-dots="false"
				data-r-medium="3"
				data-r-medium-nav="true"
				data-r-medium-dots="false"
				data-r-large="4"
				data-r-large-nav="true"
				data-r-large-dots="false"> 
					<?php foreach($news as $news_data){?>
					<div class="courses-box1">
					<div class="single-item-wrapper">
						<div class="courses-img-wrapper">
						<img class="img-responsive" src="<?php echo base_url().$news_data->news_image ?>" alt="">                                
						</div>
						<div class="courses-content-wrapper">
			  <h3 class="item-title" style="font-size:16px;"><a href="<?php echo base_url()?>news_details/<?php echo $news_data->news_id ?>"><?php echo $news_data->title ?></a></h3>
							<p class="item-content"><span style = "font-weight: normal;"><?php echo word_limit($news_data->details, 20)  ?></span></p>
						   <p class="item-content"><a href="<?php echo base_url() ?>news_details/<?php echo $news_data->news_id ?>">>>> Read More</a></p>
						</div>                            
					</div>                            
				</div>
				
				<?php } ?>
                         
				
			</div> 
		</div>  
	</div>  
	<!-- Courses 1 Area End Here -->