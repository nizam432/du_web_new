<?php $faculty = $this->model_frontend->get_faculty_data();?>
<div class="main-menu-area bg-primary" id="sticker">
	<div class="container">
		<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<ul class="mainMenu">
				<li>
					<a href="<?php echo base_url() ?>" id="">Home</a>                      
				</li>
				
				<li><a href="javascript:;" id="">Administration</a>							  					
					<div class="subMenuContainer">
						<div class="subMenuContainerPad">
							<div>
								<ul class="SubChild">                                    
									<li>
										<a href="<?php echo base_url();?>">Administrative Body</a>

										<ul>                                            
											<li>
												<a href="<?php echo base_url();?>pages/view_2/1103" target="">Syndicate</a>
											</li>
											<li><a href="<?php echo base_url();?>pages/view_2/1104" target="">Academic Council</a></li>
											<li><a href="<?php echo base_url();?>pages/view_2/1105" target="">Finance Committee</a></li>
											<li><a href="<?php echo base_url();?>pages/view_2/1106" target="">Planning &amp; Development</a></li>
											<li><a href="<?php echo base_url();?>pages/view_2/1107" target="">Committee for Advanced Studies and  Research (CASR)</a></li>
											<li><a href="<?php echo base_url();?>pages/view_2/1108" target="">Dean Council</a></li>
											<li><a href="<?php echo base_url();?>pages/view_2/1109" target="">Students' Affairs Adviser</a></li>
											<li><a href="<?php echo base_url();?>pages/view_2/11010" target="">Proctor</a></li>
											<li><a href="<?php echo base_url();?>pages/view_2/11011" target="">Provosts</a></li>
											<li><a href="<?php echo base_url();?>pages/view_2/11012" target="">Controller of Examination</a></li>
											<li><a href="<?php echo base_url();?>pages/view_2/11013" target="">Librarian</a></li>
										</ul>
									</li>
									<li>
										<a href="<?php echo base_url();?>">Administrative Section</a>

										<ul>                                            
											<li><a href="<?php echo base_url();?>pages/view_2/11028" target="">Vice-Chancellor's Secretariat</a></li>
											<li><a href="http://registrar.bau.edu.bd/" target="_blank">Registrar Section</a></li>
											<li><a href="<?php echo base_url();?>pages/view_2/11030" target="">Academic Section</a></li>
											<li><a href="<?php echo base_url();?>pages/view_2/11031" target="">Accounts Section</a></li>
											<li><a href="<?php echo base_url();?>pages/view_2/11032" target="">Examination Section</a></li>
											<li><a href="http://planning.bau.edu.bd/" target="_blank">Planning &amp; Development</a></li>
											<li><a href="<?php echo base_url();?>pages/view_2/11034" target="">Public Relations &amp; Publications</a></li>
											<li><a href="<?php echo base_url();?>pages/view_2/11035" target="">Engineering Section</a></li>
											<li><a href="<?php echo base_url();?>pages/view_2/11036" target="">Instrument Maintenance Section</a></li>
											<li><a href="http://healthcare.bau.edu.bd/" target="_blank">Health Care Center</a></li>
											<li><a href="http://transport.bau.edu.bd/" target="_blank">Transport Section</a></li>
											<li><a href="http://baures.bau.edu.bd/" target="_blank">BAURES</a></li>
											<li><a href="<?php echo base_url();?>pages/view_2/11041" target="">Security Section</a></li>
											<li><a href="http://ictcell.bau.edu.bd/" target="_blank">ICT - Cell</a></li>
										</ul>                                    
									</li>
									<li><a href="http://www.bau.edu.bd/pages/dept_head" target="_blank">Heads of Departments</a></li>
								</ul>
							</div>
						</div>
					</div>
				</li>                                
				<li><a href="javascript:;" id="">Academics</a>							  													
					<div class="subMenuContainer">
						<div class="subMenuContainerPad"><div>
								<ul class="SubChild">                                    
									<!--<li><a href="<?php echo base_url();?>">Faculty &amp; Departments</a>-->

										<?php foreach($faculty as $faculty_data){ ?>
											<li><a href="<?php echo base_url().'frontend/faculty_details/'.$faculty_data->faculty_id?>"><?php echo $faculty_data->faculty_title ?></a></li>
										<?php }?>
										<!--<ul>   
										<?php foreach($faculty as $faculty_data){ ?>
											<li><a href="<?php echo base_url().'frontend/faculty/'.$faculty_data->faculty_id?>" target="_blank">Veterinary Science</a></li>
										<?php }?>
										</ul>  -->                                  
									]
								</ul>
							</div>
						</div>
					</div>
				</li>                                
				<li><a href="javascript:;" id="">Admission</a>							  
					<div class="subMenuContainer">
						<div class="subMenuContainerPad"><div>
							<ul class="SubChild">                                    
									<li>
										<a target="_blank" href="http://admission.eis.du.ac.bd/">Bangaldeshi Students</a>                 
									</li>
									<li><a href="<?php echo base_url();?>" target="">International Students</a></li>
								</ul>
							</div>
						</div>
					</div>
				</li>                                
				<li><a href="javascript:;" id="">Research</a>							  
					<div class="subMenuContainer">
						<div class="subMenuContainerPad">
							<div>
								<ul class="SubChild">        
									<li>
										<a href="<?php echo base_url();?>pages/view_1/11041" target="">BAURES</a>
									</li>
									<li><a href="<?php echo base_url();?>pages/view_1/11043" target="">CASR</a></li>
								</ul>
							</div>
						</div>
					</div>
				</li>                                
				<li><a href="javascript:;" id="">Facilities</a>							  
					<div class="subMenuContainer">
						<div class="subMenuContainerPad"><div>
							<ul class="SubChild">                                    
								<li><a href="<?php echo base_url();?>pages/view_1/11028" target="">Student Hostels</a>
									</li>
									<li>
										<a href="#" target="_blank">Transport</a>
									</li>
									<li>
										<a href="<?php echo base_url();?>pages/view_1/11031" target="">Guest House</a>
									</li>
									<li>
										<a href="<?php echo base_url();?>pages/view_1/11032" target="">Gymnasium &amp; Sports</a>
									</li>
									<li><a href="<?php echo base_url();?>pages/view_1/11033" target="">Teacher Student Center</a>
									</li>
									<li><a href="<?php echo base_url();?>pages/view_1/11034" target="">Botanical Garden</a>
									</li>
									<li><a href="<?php echo base_url();?>pages/view_1/11035" target="">Germplasm Center</a>
									</li>
									<li><a href="<?php echo base_url();?>pages/view_1/11036" target="">Telephone Directory</a>
									</li>
									<li><a href="<?php echo base_url();?>pages/view_1/11037" target="">Residence</a>
									</li>
									<li><a href="<?php echo base_url();?>pages/view_1/11038" target="">Bank</a>
									</li>
									<li><a href="<?php echo base_url();?>pages/view_1/11039" target="">Cultural Organization</a>
									</li>
									<li><a href="#" target="_blank">Library</a>
									</li>
									<li><a href="#" target="_blank">ICT-Cell</a></li>
									</ul>
									</div>
									</div>
									</div>
							</li>                                
							<li><a href="<?php echo base_url();?>frontend/contact_us" id="" target="">Contact Us</a>

				</li>                                

				</li>     </ul>	

			</div>   
		</div>                          
	</div> 
	</div>
</div>