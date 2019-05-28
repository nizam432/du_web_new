<div class="row">
    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#slider-carousel" data-slide-to="1"></li>
            <li data-target="#slider-carousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
            <?php foreach ($slider as $key=>$slider_data):?>
            <?php //echo $key;?>
            <div class="item <?php if($key==0) echo 'active'?>">
<!--                <div class="col-sm-6">
                    <h1><span>E</span>-SHOPPER</h1>
                    <h2>Free E-Commerce Template</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                    <button type="button" class="btn btn-default get">Get it now</button>
                </div>-->
                <div class="col-sm-12">
                    <img style="height: 280px; width: 100%;" src="<?php echo base_url().$slider_data->slider_image; ?>" class=" girl img-responsive" alt="" />
                    <!--<img src="<?php echo base_url(); ?>assets/frontend/images/home/pricing.png"  class="pricing" alt="" />-->
                </div>
            </div>
            <?php endforeach;?>
        </div>

        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>

</div>