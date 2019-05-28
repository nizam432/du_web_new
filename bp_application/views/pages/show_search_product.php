<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <?php $this->load->view('pages/default_sidebar'); ?>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="">
                    <div class="row"><br><br>
                        <div class="col-sm-12 padding-right">
                            <div class="features_items">
                                <!--<h2 class="title text-center">Popular Items</h2>-->
                                <?php 
                                 // pr($product);
       // exit;
                                
                                
                                foreach ($product as $product_data): ?>
                                    <div class="col-sm-4">

                                        <div class="product-image-wrapper">
                                            <div class="single-products"> 

                                                <div class="productinfo text-center">
                                                    <a href="<?php echo base_url().'frontend/details/'.$product_data->product_id; ?>">
                                                        <img src="<?php echo base_url().$product_data->master_image; ?>" alt="" />
                                                        <h2><?php echo $product_data->sale_price; ?></h2>
                                                        <p><?php echo $product_data->product_name; ?></p>
                                                    </a>
                                                    <form action="<?php echo base_url() ?>frontend_shopping_cart/add_shopping_cart" method="post">
                                                        <input type="hidden" name="id" value="<?php echo $product_data->product_id; ?>" />
                                                        <input type="hidden" name="name" value="<?php echo $product_data->product_name; ?>" />
                                                        <input type="hidden" name="price" value="<?php echo $product_data->sale_price; ?>" />
                                                        <button href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                    </form>
                                                </div>
                                                <!-- <div class="product-overlay">
                                                     <div class="overlay-content">
                                                         <h2>$56</h2>
                                                         <p>Easy Polo Black Edition</p>
                                                         <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                     </div>
                                                 </div>-->
                                            </div>
<!--                                            <div class="choose">
                                                <ul class="nav nav-pills nav-justified">
                                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                                </ul>
                                            </div>-->
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>