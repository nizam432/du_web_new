<section><!--form-->
    <div class="container">
        <div class="col-md-6 login-left">
            <h3>NEW CUSTOMERS</h3>
            <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
            <a class="btn btn-success" href="<?= base_url() ?>customer/login/singup">Create an Account</a>
        </div>
        <div class="col-md-6 login-right">
            <h3>REGISTERED CUSTOMERS</h3>
            <p>If you have an account with us, please log in.</p>
            <?php if ($this->session->flashdata('error')) { ?>
                <div role="alert" class="alert alert-danger">
                    <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                    <?= $this->session->flashdata('error') ?>
                </div>
            <?php } ?>
            <form action="<?php echo base_url(); ?>/customer/login/check_login" method="post">
                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input type="text" name="email_id" class="form-control" placeholder="Full Name" />
                </div>
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" />
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>	
        <div class="clearfix"> </div>
    </div><br><br>
</section><!--/form-->

