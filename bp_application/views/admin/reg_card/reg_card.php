<div class="col-md-12">
    <div class="breadcrumb_container">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>/backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Registration Card</li>
        </ol>
    </div>
</div>

<div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Search Course</h3>
        </div>
        <form class="form-horizontal" id="reg_card_search_form" action="<?php echo base_url() ?>backend_student_honours/reg_card_view" method="post">
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-1 control-label">Subject</label>
                    <div class="col-sm-3">
                        <select name="sub_id" id="sub_id"  class="form-control department" required>
                            <option value="">Please select</option>
                            <?php
                            foreach ($subject as $subject_data) {
                                echo '<option  value="' . $subject_data->sub_id . '">' . $subject_data->sub_title . '</option>';
                            }
                            ?>                            
                        </select>
                    </div>                   
                    <div class="col-sm-2">
                        <button type="submit" id="search" class="btn btn-primary search"><span class="fa fa-search"></span> Search</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php // $this->model_common->get_barcode();?>
		 <div id="registration_card"></div>


<script>
 //Student information
	$(function () {
		$("#reg_card_search_form").submit(function (event) {	
			$.ajax({
				url: $(this).attr('action'),
				type: $(this).attr('method'),
				data: $("#reg_card_search_form").serialize(),
               // processData: false,
                //contentType: false,
				success: function (response){
					$('#registration_card').html(response);
				}
			});
			event.preventDefault();
		});
    });
</script>

<style>
	.student_info td{
		padding:5px;
	}
	
	.reg_card_title{
		font-size:14px;
		margin-top:5px;
		margin-bottom:10px;
		text-align:center;
		font-weight:bold;
		border:1px solid #000;
		width:200px;
		border-radius:10px;
		padding:3px 0px;
	}
	.jolchap{
		position: absolute;
 		opacity:0.1;
		left:36%;
		margin-top:140px;
/*		top:150px; */
	}
	
	.instruction{
		margin-top:30px
	}
	
	.instruction td{
		padding-left:20px;
	}
	.a_session{
		border:1px solid #000;
		padding:2px 15px;
	}
</style>
