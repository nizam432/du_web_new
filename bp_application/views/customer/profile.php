<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<div class="container">
    <div class="control_panel_menu row">
        <div class="col-sm-3 ">
            <?php $this->load->view('customer/left_menu');?>
        </div>
        <div class="col-sm-9">
            <?php if (!empty($this->session->flashdata('customer_info'))):
                ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('customer_info'); ?>
                </div>
            <?php endif; ?>
            <h3>Edit Profile</h3>
            <hr>
            <form method="post" action="<?php echo base_url()?>customer/profile/update" class="form-horizontal">
                <div class="form-group">
                    <label class="form-label col-sm-2">Full Name</label>
                    <div class="col-sm-4">
                        <input type="text" name="customer_name" value="<?php echo $profile_data->customer_name; ?>" class="form-control" required>
                    </div>
                    <label class="form-label col-sm-2">Gender</label>
                    <div class="col-sm-4">
                        <select type="text" name="gender" class="form-control">
                            <option value="">Please select</option>
                            <option <?php if($profile_data->gender==1) echo ' selected="selected" '; ?> value="1">Male</option>
                            <option <?php if($profile_data->gender==2) echo ' selected="selected" '; ?>  value="2">Female</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label col-sm-2">Email ID</label>
                    <div class="col-sm-4">
                        <input type="text" name="email_id" value="<?php echo $profile_data->email_id?>" class="form-control" placeholder="Email Address" />
                    </div>
                    <label class="form-label col-sm-2">Phone</label>
                    <div class="col-sm-4">
                        <input type="text" name="phone" value="<?php echo $profile_data->phone?>" class="form-control" placeholder="Phone" />
                    </div>
                </div>
                <div class="form-group"><br>
                    <button class="btn btn-success center-block" type="submit" name="submit" value="">Submit</button>
                    <br>
                </div>
            </form>
        </div>
    </div>
</div>
