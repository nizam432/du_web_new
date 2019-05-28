<div class="container">
    <?php
    if (!empty($this->session->flashdata('checkout'))) {
        ?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('checkout'); ?>
        </div>
    <?php } else{ ?>
    <form method="post"  action="<?php echo base_url(); ?>frontend_checkout/save_checkout" class="form-horizontal">
        <div class="col-sm-6">
             <div class="register-top-grid">
                <h3>Shipping Address</h3>
                <div class="form-group">
                    <label class="form-label col-sm-4">Full Name</label>
                    <div class="col-sm-8">
                        <input  type="text" class="form-control"  placeholder="Full Name" name="full_name" required >
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label col-sm-4">Phone</label>
                    <div class="col-sm-8">
                        <input  type="text" class="form-control" placeholder="Phone" name="phone" required >
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label col-sm-4">Address</label>
                    <div class="col-sm-8">
                        <textarea  type="text" class="form-control col-sm-8"  placeholder="Address" name="address" required ></textarea>
                    </div>
                </div>	
            </div>
        </div>
        <div class="col-sm-6">
            <h3>Payment</h3>
            <div class="form-group">
                <label class="form-label col-sm-4">Payment Option</label>
                <div class="col-sm-8">
                    <select name="payment_option" class="form-control" required>
                        <option value="">Select Payment Option</option>
                        <option value="1">Cash on Delivery</option>
                    </select>                       
                </div>

            </div>

        </div>

        <div class="col-sm-12">    
        <h2>Your Order</h2>

        <?php $i = 1; ?>
        <?php
        if (!empty($this->cart->contents())) :
           // pr($this->cart->contents());
            ?>
            <table class="table">
                <tr>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Amount</th>
                    <?php
                    $total = 0;
                    foreach ($this->cart->contents() as $item) :
                        $total += (($item['qty']) * ($item['price']));
                        ?>                
                    <tr>
                        <td>
                            <?php echo $i++; ?>
                        </td>
                        <td>
                            <?php echo $item['name']; ?>
                        </td>
                        <td>
                            TK <?php echo number_format($item['price'], 2); ?>
                        </td>
                        <td>
                            <?php echo $item['qty']; ?>
                        </td>
                        <td>
                            TK <?php echo number_format($item['price'] * $item['qty'], 2); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <th colspan="4"  style="text-align: right">Total</th>
                    <th>TK <?php echo $total; ?></td>
                </tr>

            <?php endif; ?>

        </table>   
        <div class="form-group">
            <button type="submit" class="btn-lg btn-success pull-right" value="submit" name="submit">Confirm Checkout</button>
        </div>        
        </div>
    </form>
    <?php }?>
</div>
