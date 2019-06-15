<?php $faculty = $this->model_frontend->get_faculty_data();?>
<div class="mobile-menu-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="mobile-menu">
					<nav id="dropdown" style="display: block;">
						<ul>
							<li>
								<a href="<?php echo base_url() ?>" id="">Home</a>                      
							</li>
                             <li><a href="javascript:;" id="">Administration</a>                           
								<ul>
								<li class="has-child-menu"><a href="<?php echo base_url();?>">Administrative Body</a>
										<ul class="thired-level">                                            <li><a href="<?php echo base_url();?>pages/view_2/1103">Syndicate</a></li>
											<li><a href="<?php echo base_url();?>pages/view_2/1104">Academic Council</a></li>
											<li><a href="<?php echo base_url();?>pages/view_2/1105">Finance Committee</a></li>
											<li><a href="<?php echo base_url();?>pages/view_2/1106">Planning &amp; Development</a></li>
											<li><a href="<?php echo base_url();?>pages/view_2/1107">Committee for Advanced Studies and  Research (CASR)</a></li>
											<li><a href="<?php echo base_url();?>pages/view_2/1108">Dean Council</a></li>
											<li><a href="<?php echo base_url();?>pages/view_2/1109">Students' Affairs Adviser</a></li>
											<li><a href="<?php echo base_url();?>pages/view_2/11010">Proctor</a></li>
											<li><a href="<?php echo base_url();?>pages/view_2/11011">Provosts</a></li>
											<li><a href="<?php echo base_url();?>pages/view_2/11012">Controller of Examination</a></li>
											<li><a href="<?php echo base_url();?>pages/view_2/11013">Librarian</a></li>
										</ul>                                    </li><li class="has-child-menu"><a href="<?php echo base_url();?>">Administrative Section</a>
										<ul class="thired-level">                                            <li><a href="<?php echo base_url();?>pages/view_2/11028">Vice-Chancellor's Secretariat</a></li>
											<li><a href="http://registrar.bau.edu.bd/">Registrar Section</a></li>
											<li><a href="<?php echo base_url();?>pages/view_2/11030">Academic Section</a></li>
											<li><a href="<?php echo base_url();?>pages/view_2/11031">Accounts Section</a></li>
											<li><a href="<?php echo base_url();?>pages/view_2/11032">Examination Section</a></li>
											<li><a href="http://planning.bau.edu.bd/">Planning &amp; Development</a></li>
											<li><a href="<?php echo base_url();?>pages/view_2/11034">Public Relations &amp; Publications</a></li>
											<li><a href="<?php echo base_url();?>pages/view_2/11035">Engineering Section</a></li>
											<li><a href="<?php echo base_url();?>pages/view_2/11036">Instrument Maintenance Section</a></li>
											<li><a href="http://healthcare.bau.edu.bd/">Health Care Center</a></li>
											<li><a href="http://transport.bau.edu.bd/">Transport Section</a></li>
											<li><a href="http://baures.bau.edu.bd/">BAURES</a></li>
											<li><a href="<?php echo base_url();?>pages/view_2/11041">Security Section</a></li>
											<li><a href="http://ictcell.bau.edu.bd/">ICT - Cell</a></li>
										</ul>                                    </li><li><a href="http://www.bau.edu.bd/pages/dept_head">Heads of Departments</a>
									</li>
									</ul>
									</li>  
									
									
									<li>
										<a href="javascript:;" id="">Academics</a>                           
										<ul>
											<?php foreach($faculty as $faculty_data){ ?>
											<li><a href="<?php echo base_url().'frontend/faculty_details/'.$faculty_data->faculty_id?>"><?php echo $faculty_data->faculty_title ?></a></li>
											<?php }?>
										</ul>
									</li>  
									
									
									<li>
										<a href="javascript:;" id="">Admission</a>                           
										<ul>                                    
											<li>
												<a target="_blank" href="http://admission.eis.du.ac.bd/">Bangaldeshi Students</a>                 
											</li>
											<li><a href="<?php echo base_url();?>" target="">International Students</a></li>
										</ul>	
									</li>	
                             
									<li><a href="javascript:;" id="">Research</a>                           
										<ul>
											<li>
												<a href="<?php echo base_url();?>pages/view_1/11041">BAURES</a>
											</li>
											<li>
												<a href="<?php echo base_url();?>pages/view_1/11043">CASR</a>
											</li>
										</ul>
									</li>                                
									<li><a href="javascript:;" id="">Facilities</a>                           
								<ul>                                    
								<li>
									<a href="<?php echo base_url();?>pages/view_1/11028">Student Hostels</a>
									</li><li><a href="#">Transport</a>
									</li><li><a href="<?php echo base_url();?>pages/view_1/11031">Guest House</a>
									</li><li><a href="<?php echo base_url();?>pages/view_1/11032">Gymnasium &amp; Sports</a>
									</li><li><a href="<?php echo base_url();?>pages/view_1/11033">Teacher Student Center</a>
									</li><li><a href="<?php echo base_url();?>pages/view_1/11034">Botanical Garden</a>
									</li><li><a href="<?php echo base_url();?>pages/view_1/11035">Germplasm Center</a>
									</li><li><a href="<?php echo base_url();?>pages/view_1/11036">Telephone Directory</a>
									</li><li><a href="<?php echo base_url();?>pages/view_1/11037">Residence</a>
									</li><li><a href="<?php echo base_url();?>pages/view_1/11038">Bank</a>
									</li><li><a href="<?php echo base_url();?>pages/view_1/11039">Cultural Organization</a>
									</li><li><a href="#">Library</a>
									</li><li><a href="#">ICT-Cell</a>
									</li></ul></li>                                
									<li><a href="<?php echo base_url();?>frontend/contact_us" id="">Contact Us</a></li>   
							</li>            
						</ul>
					</nav>
				</div>           
			</div>
		</div>
	</div>
</div>  