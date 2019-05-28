<section>
    <div class="container">
        <div class="col-sm-3">
            <div class="left-sidebar">
                <?php $this->load->view('pages/details_sidebar'); ?>
            </div>
        </div>
        <div class="col-sm-9">
            <div id="cart" >
                <div id = "heading">
                    <h2 >CART</h2>
                </div>

                <div id="text">
                    <?php
                    $cart_check = $this->cart->contents();
                    //  pr($cart_check);
// If cart is empty, this will show below message.
                    if (empty($cart_check)) {
                        echo 'To add products to your shopping cart click on "Add to Cart" Button';
                    }
                    ?> </div>

                <table class="table" border="0" cellpadding="5px" cellspacing="1px">
                    <?php
// All values of cart store in "$cart".
                    if ($cart = $this->cart->contents()):
                        ?>
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Amount</th>
                                <th>Cancel Product</th>
                            </tr>
                        </thead>
                        <?php
// Create form and send all values in "shopping/update_cart" function.
                        echo form_open('frontend_shopping_cart/update_shopping_cart_items');
                        $grand_total = 0;
                        $i = 1;

                        foreach ($cart as $item):

                            echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                            echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                            echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                            echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                            echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
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
                                    <input type="number" name="cart[75][qty]" value="<?php echo $item['qty']; ?>" class="form-control" type="number" maxlength="3" size="1" style="text-align: right;width:80px " />
                                </td> 
                                <?php $grand_total = $grand_total + $item['subtotal']; ?>
                                <td>
                                    TK <?php echo number_format($item['subtotal'], 2) ?>
                                </td>
                                <td>
                                    <a href="<?php echo  base_url();?>frontend_shopping_cart/remove_shopping_cart_items/<?php echo $item['rowid']?>" style="color:red"><i class="fa fa-minus-circle"></i> Remove</a>
                                
                                </td>
                            <?php endforeach; ?>
                        </tr>
                        <tr>
                            <td colspan="6" align="right"><b>Sub Total: TK <?php
//Grand Total.
                            echo number_format($grand_total, 2);
                            ?></b></td>

                            <?php // "clear cart" button call javascript confirmation message   ?>
                        </tr>

                    <?php endif; ?>
                </table>
                <div class="form-group pull-right">          
                    <?php //submit button.   ?>
                    <input class ="btn  btn-warning"  type="submit" value="UPDATE CART">
                    <?php echo form_close(); ?>

                    <!-- "Place order button" on click send "billing" controller -->
                    <input class ="btn  btn-success " type="button" value="CHECKOUT" onclick="window.location = '<?php echo base_url() ?>frontend_checkout'"></td>
                </div>
            </div>

        </div>
    </div>
</section>
