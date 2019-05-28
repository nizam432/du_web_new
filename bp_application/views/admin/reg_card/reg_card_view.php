<div class="col-sm-12" style="background:white;padding-top:20px;padding:bottom:20px;">
	<button onclick="printDiv()" class="btn btn-success  pull-right"><span class="fa fa-print"> Print</button>
	<div style="clear:both"></div><br>
	<div id="print_reg_card">
	<?php foreach($reg_card_info as $reg_card_data): ?>	

		<div style="border:1px solid #000;padding:10px;border-radius:5px">
			<img class="jolchap" src="<?php echo base_url();?>/assets/backend/images/flogo.png">
			<table  style="width:100%;padding:3px">
				<tr>
					<td width="150" valign="top">
						<img src="<?php echo base_url();?>assets/backend/images/test_qr.png">					
					</td> 	
					
					<td style="text-align:center">
						<img src="<?php echo base_url();?>/assets/backend/images/flogo.png" width="50">
						<div style="font-size:25px;font-weight:bold">DHAKA UNIVERSITY</div>
						<div style="font-size:14px;font-weight:bold">Dhaka,Bangladesh</div>
						<div style="font-size:14px;font-weight:bold">BACHELOR OF HONOURS DEGREE</div>
					</td>                        
					<td width="150" valign="top">
						<img src="<?php echo base_url();?>/assets/backend/images/std_pic.jpg" style="width:140px">
					</td>
				</tr>
				<tr>
					<td colspan="3" style="text-align:center">
					<center>
						<div class="reg_card_title">
							Registration Card 
						</div>
					</center>
					</td>                        
				</tr>
			</table>
			
			<table  style="width:100%;margin-bottom:20px">
				<tr>                  
					<th>
						<table>
							<tr> 
							<td>Registration No</td> 
							<?php 
								$total_letter=strlen(trim($reg_card_data->REG_NO));
								for($i=0;$i<$total_letter;$i++){
								
								echo '<td style="padding:2px 10px; border:1px solid;">'.@$reg_card_data->REG_NO[$i].'</td>';
								}
							?>
							</tr>
						</table>
					</th>
					
					<th style="text-align:right">Academic Session: <span class="a_session"><?php echo $reg_card_data->SESS_START; ?></span></th>                        
				</tr>
			</table>	

			<table border="1" style="padding:10px; width:100%">
				<tr>
					<td style="padding:3px;"> 
						<table class="student_info" border="1"  style="width:100%;">
							<tr>
								<td width="150">Student's Name</td>
								<td><?php echo $reg_card_data->APPLICANT_NAME; ?></td>
							</tr>
							<tr>
								<td>Father's Name</td>
								<td><?php echo $reg_card_data->FATHER_NAME; ?></td>
							</tr>
							<tr>
								<td>Mother's Name</td>
								<td><?php echo $reg_card_data->MOTHER_NAME; ?></td>
							</tr>
							<tr>
								<td>College Code</td>
								<td><?php echo $reg_card_data->COLL_CODE; ?></td>
							</tr>
							<tr>
								<td>College Name</td>
								<td><?php echo $college[$reg_card_data->COLL_CODE]; ?></td>
							</tr>
							<tr>
								<td>Subject Name & Code</td>
								<td><?php echo $reg_card_data->SUB_NAME; ?> - <?php echo $reg_card_data->SUB_ID; ?></span></td>
							</tr>
							<tr>
								<td>Status</td>
								<td><?php echo $type[$reg_card_data->TYPE]; ?></td>
							</tr>									
						</table>
					</td> 
				</tr>
				<tr>		
					<td style="padding:3px;">
						<table  border="1" style="width:100%;">
							<tr>
								<td style="height:100px;"></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<th style="text-align:center">Student's Full Signature</th>
								<th style="text-align:center">Seal and Signature of Principal</th>
								<th style="text-align:center">Signature of Register</th>
							</tr>
						</table>
					</td>
				</tr>
			</table>	
			
			<table class="instruction">
				<tr>
					<th>বিঃদ্রঃ</th>
				</tr>
				<tr>
					<td>১ ।  ছাত্র/ছাত্রী পূর্ণ স্বাক্ষর করবে। </td>
				</tr>
				<tr>
					<td>২ ।  রেজিষ্ট্রেশন কার্ডে শিক্ষার্থীর ছবির উপর সংশ্লিষ্ট কলেজের অধ্যক্ষ সত্যায়িত করবেন।  </td>
				</tr>
				<tr>
					<td>৩ ।   এই রেজিষ্ট্রেশনে প্রদত্ত তথ্যে কোন ভুলত্রুটি পরিলক্ষিত হলে তা সংশোধন কিংবা বাতিলের ক্ষমতা বিশ্ববিদ্যালয় কর্তৃপক্ষ স‍‍রক্ষণ করে।</td>
				</tr>
				<tr>
					<td>৪ ।  রেজিষ্ট্রেশন কার্ডের মেয়াদ উত্তীর্ণের  সেশন  <?php echo number_in_bengali($reg_card_data->SESS_END); ?> ।</td>
				</tr>
				<tr>	
					<th>NB:</th>
				</tr>
				<tr>
					<td>1. A Student shall sing his/her full name</td>
				</tr>
				<tr>	
					<td>2. The Principal will attest the photograph in the Registration card</td>
				</tr>
				<tr>	
					<td>3. The Dhaka UNIVERSITY authority reseves the right to correct/cancel the card if any error is found</td>
				</tr>
				<tr>
					<td >4. The Registration card is valid up to session <?php echo $reg_card_data->SESS_END; ?></td>
				</tr>
			</table>	
		</div>
		<div style="margin-left:30px;margin-top:4px;margin-bottom:190px">Generated on: <?php echo date('l jS', strtotime(date('Y-m-d'))).' of '.date('F Y', strtotime(date('Y-m-d'))); ?></div>

		
	<?php endforeach;?>
	</div>
	<br>
	<button onclick="printDiv()" class="btn btn-success  pull-right"><span class="fa fa-print"> Print</button>
	
	<div style="clear:both"></div><br>
</div>
<script>
	function printDiv() {
        $.print("#print_reg_card");
    };
</script>

