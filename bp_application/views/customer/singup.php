<section><!--form-->
    <div class="container">
        <div class="col-md-12">
            <h3>REGISTERED CUSTOMERS</h3>

            <form action="<?php echo base_url(); ?>customer/login/save_singup" method="post">

                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="form-label">Customer Name</label>
                        <input type="text" name="customer_name" class="form-control" placeholder="Full Name" />
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="form-label">Gender</label>
                        <select type="text" name="gender" class="form-control">
                            <option value="">Please select</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="form-label">Email ID</label>
                        <input type="text" name="email_id" class="form-control" placeholder="Email Address" />
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" placeholder="Phone" />
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" />
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="form-label">Conform Password</label>
                        <input type="text" name="conform_password" class="form-control" placeholder="Password" />
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>	
        <div class="clearfix"> </div>
    </div><br><br>
</section><!--/form-->

