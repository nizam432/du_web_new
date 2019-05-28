<div class="row">
    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php 
            $i=0;
            foreach ($slider as $key=>$slider_data){?>
            <li data-target="#slider-carousel" data-slide-to="<?php echo $i++ ?>" <?php if($key==0) echo 'active'?>"></li>
            <?php }?>
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
                    <img style="height: 500px; width: 100%;" src="<?php echo base_url().$slider_data->slider_image; ?>" class=" girl img-responsive" alt="" />
                    <!--<img src="<?php echo base_url(); ?>assets/frontend/images/home/pricing.png"  class="pricing" alt="" />-->
                </div>
            </div>
            <?php endforeach;?>
        </div>

<!--        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
            <i class="fa fa-angle-left">ddd</i>
        </a>
        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
            <i class="fa fa-angle-right">ddd</i>
        </a>-->
<!-- Left and right controls -->
  <a class="left carousel-control" href="#slider-carousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#slider-carousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
    </div>

</div>

