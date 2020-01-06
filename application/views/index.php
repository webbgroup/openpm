<div class="">
<?php /*

    Copyright (C) 2019 Joel Webb

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU Affero General Public License as
    published by the Free Software Foundation, either version 3 of the
    License, or (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Affero General Public License for more details.

    You should have received a copy of the GNU Affero General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/ ?>

            <div id="slider" class="sl-slider-wrapper">

        <div class="sl-slider">
        <?php //echo "<pre>";print_r($slider);echo "</pre>";echo "<pre>";print_r($slider_com);echo "</pre>";
$c = array_merge($slider, $slider_com); ?>
        <?php if ($slider) {
    foreach ($slider as $slide) {
        ?>

<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
<div class="sl-slide-inner">
<div class="bg-img bg-img-1" style="background-image:url(<?php echo base_url(); ?>uploads/<?php $ab = explode(',', $slide['filename']);
        echo $ab[0]; ?>);"></div>
<h2>
<?php if (1 == $slide['forSale']) {?>
<a href="<?php echo base_url(); ?>index.php/home/propertySaleDetail?id=<?php echo $slide['resId']; ?>"><?php echo $slide['title']; ?>
</a>
<?php } else {?>
<a href="<?php echo base_url(); ?>index.php/home/propertyRentDetail?id=<?php echo $slide['resId']; ?>"><?php echo $slide['title']; ?>
</a>
<?php } ?>
</h2>
<blockquote>
<p class="location"><span class="glyphicon glyphicon-map-marker"></span><?php echo $slide['address'].', '.$slide['city'].', '.$slide['state'].' ,'.$slide['zip']; ?></p
<p><?php echo $slide['description']; ?>.</p>
<?php if ('1' == $slide['forSale']) {?>
<a href="<?php echo base_url(); ?>index.php/home/propertySaleDetail?id=<?php echo $slide['resId']; ?>" style="color:white;"><cite>$ <?php echo number_format($slide['price']); ?></cite></a>
<?php } else {?>
<a href="<?php echo base_url(); ?>index.php/home/propertyRentDetail?id=<?php echo $slide['resId']; ?>" style="color:white;"><cite>$ <?php echo number_format($slide['rent']); ?></cite></a>
<?php } ?>
</blockquote>
</div>
</div>
<?php
    }
}
?>
           <?php if ($slider_com) {
    foreach ($slider_com as $slide) {
        ?>

          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-1" style="background-image:url(<?php echo base_url(); ?>uploads/<?php $ab = explode(',', $slide['comfile']);
        echo $ab[0]; ?>);"></div>
              <h2>
              <?php if ('1' == $slide['fs']) {?>
                <a href="<?php echo base_url(); ?>index.php/home/propertyComSaleDetail?id=<?php echo $slide['commId']; ?>"><?php echo $slide['ti']; ?>
                </a>
                <?php } else {?>
                <a href="<?php echo base_url(); ?>index.php/home/propertyComRentDetail?id=<?php echo $slide['commId']; ?>"><?php echo $slide['ti']; ?>
                </a>
                <?php } ?>
              </h2>
              <blockquote>
              <p class="location"><span class="glyphicon glyphicon-map-marker"></span><?php echo $slide['adr'].', '.$slide['ct'].', '.$slide['st'].' ,'.$slide['zp']; ?></p
              <p><?php echo $slide['descr']; ?>.</p>
              <?php if ('1' == $slide['fs']) {?>
                   <a href="<?php echo base_url(); ?>index.php/home/propertyComSaleDetail?id=<?php echo $slide['commId']; ?>" style="color:white;"><cite>$ <?php echo number_format($slide['pr']); ?></cite></a>
              <?php } else {
            if (0 == $slide['rent'] && 0 == $slide['type']) {?>
                  <a href="<?php echo base_url(); ?>index.php/home/propertyComRentDetail?id=<?php echo $slide['commId']; ?>" style="color:white;"><cite>$ <?php echo number_format($slide['pr']); ?></cite></a>

                    <?php } else {?>
                    <a href="<?php echo base_url(); ?>index.php/home/propertyComRentDetail?id=<?php echo $slide['commId']; ?>" style="color:white;"><cite>$ <?php echo number_format($slide['rent']); ?>&nbsp; <?php echo $slide['type']; ?></cite></a>
                  <?php } ?>
              <?php
        } ?>
              </blockquote>
            </div>
          </div>
          <?php
    }
}
?>
        </div><!-- /sl-slider -->



        <nav id="nav-dots" class="nav-dots">
        <?php
$img_count = count($c);
$c = 0;
for ($c = 0; $c < $img_count; ++$c) {
    $class = (0 == $c) ? 'nav-dot-current' : '';
    echo '<span class="'.$class.'"></span>';
}
?>
         <!--  <span class="nav-dot-current"></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span> -->
        </nav>

      </div><!-- /slider-wrapper -->
</div>
<div class="banner-search">
<form id="prop_search" method="post" action="<?php echo base_url(); ?>home/searchProp">
  <div class="container">
    <!-- banner -->
    <h3>Sale & Rent</h3>
    <div class="searchbar">
      <div class="row">
        <div class="col-lg-6 col-sm-6">
          <input type="text" class="form-control" placeholder="Search of Properties" name="search_data">
          <div class="row">
          <input type="hidden" name="serachcase" value="search"/>
            <div class="col-lg-3 col-sm-3 ">
              <select class="form-control" name="prop_type">
                <option value="1">Sale</option>
                <option value="2">Rent</option>
              </select>
            </div>
            <div class="col-lg-3 col-sm-4">
              <select class="form-control" name="price">
                 <option value="">Select Price</option>
                <option value="150000">$150,000 - $200,000</option>
                <option value="200000">$200,000 - $250,000</option>
                <option value="250000">$250,000 - $300,000</option>
                <option value="300000">$300,000 - above</option>
              </select>
            </div>
              <div class="col-lg-3 col-sm-4">
              <input type="submit" class="btn btn-success" value="Find Now">
              </div>
          </div>


        </div>
        <!-- <div class="col-lg-5 col-lg-offset-1 col-sm-6 ">
          <p>Join now and get updated with all the properties deals.</p>
          <button class="btn btn-info"   data-toggle="modal" data-target="#loginpop">Login</button>
          </div>-->
              </div>
    </div>
  </div>
  </form>
</div>
<!-- banner -->
<div class="container">
  <div class="properties-listing spacer"> <a href="<?php echo base_url(); ?>index.php/home/forSale" class="pull-right viewall">View All Listing</a>
    <h2>Featured Properties</h2>
    <div id="owl-example" class="owl-carousel">
    <?php if ($residential) {
    foreach ($residential as $res) {
        ?>
      <div class="properties">
        <div class="image-holder"><img src="<?php echo base_url(); ?>uploads/<?php $ab = explode(',', $res['filename']);
        echo $ab[0]; ?>" class="img-responsive" alt="properties" style="height:166px;display:block;"/>
          <div class="status sold"><?php echo $res['status']; ?></div>
        </div>
        <h4>
         <?php if ('1' == $res['forSale']) {?>
        <a href="<?php echo base_url(); ?>index.php/home/propertySaleDetail?id=<?php echo $res['resId']; ?>"><?php echo $res['title']; ?></a>
        <?php } else {?>
         <a href="<?php echo base_url(); ?>index.php/home/propertyRentDetail?id=<?php echo $res['resId']; ?>"><?php echo $res['title']; ?></a>
        <?php } ?>
        </h4>
        <p class="price">Price: $<?php echo number_format($res['price']); ?></p>
        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room"><?php echo $res['beds']; ?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bath Room"><?php echo $res['baths']; ?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span> <!-- <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> --> </div>
         <?php if ('1' == $res['forSale']) {?>
        <a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/home/propertySaleDetail?id=<?php echo $res['resId']; ?>">View Details</a>
        <?php } else {?>
        <a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/home/propertyRentDetail?id=<?php echo $res['resId']; ?>">View Details</a>
         <?php } ?>
      </div>
      <?php
    }
}
?>
    </div>
  </div>
  <!-- <div class="spacer">
    <div class="row">
   <div class="properties-listing spacer"> <a href="<?php echo base_url(); ?>index.php/home/buysAleRent" class="pull-right viewall">View All Listing</a>
    <h2>Featured Properties</h2>
    <div id="owl-example" class="owl-carousel">
    <?php foreach ($residential as $res) {?>
      <div class="properties">
        <div class="image-holder"><img src="<?php echo base_url(); ?>uploads/<?php echo $res['image_name']; ?>" class="img-responsive" alt="properties"/>
          <div class="status sold"><?php echo $res['status']; ?></div>
        </div>
        <h4><a href="<?php echo base_url(); ?>index.php/home/propertyDetail"><?php echo $res['title']; ?></a></h4>
        <p class="price">Price: <?php echo number_format($res['price']); ?></p>
        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room"><?php echo $res['beds']; ?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bath Room"><?php echo $res['baths']; ?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> </div>
        <a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/home/propertyDetail">View Details</a>
      </div>
      <?php }
?>
    </div>
     </div>
     </div>
     </div> -->
  <div class="spacer">
    <div class="row">

      <div class="col-lg-6 col-sm-9 recent-view">
        <h3>About Us</h3>
        <?php if ($aboutus) {
    foreach ($aboutus as $about) {
    }
    $string = $about['content'];
    $string = substr($string, 0, strpos($string, '</p>') + 4);
    $string = str_replace('<p>', '', str_replace('</p>', '', $string)); ?>
        <p><?php echo $string; ?><a href="<?php echo base_url(); ?>home/about">Learn More</a></p>
       <?php
}
?>
      </div>
      </div><!--added-->

      <div class="col-lg-5 col-lg-offset-1 col-sm-3 recommended">
        <h3>Recommended Properties</h3>
        <div id="myCarousel" class="carousel slide">

          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
            <li data-target="#myCarousel" data-slide-to="2" class=""></li>
            <li data-target="#myCarousel" data-slide-to="3" class=""></li>
          </ol>
          <!-- Carousel items -->
          <div class="carousel-inner">
           <?php if ('' != $recomended) {
    $i = 1;
    foreach ($recomended as $rec) {
        if (1 == $i) {
            $class_ative = 'active';
        } else {
            $class_ative = '';
        } ?>
            <div class="item <?php echo $class_ative; ?>">
              <div class="row">
                <div class="col-lg-4"><img src="<?php echo base_url(); ?>uploads/<?php $ab = explode(',', $rec['filename']);
        echo $ab[0]; ?>" class="img-responsive" alt="properties"/></div>
                <div class="col-lg-8">
                  <h5><a href="<?php echo base_url(); ?>index.php/home/propertySaleDetail?id=<?php echo $res['resId']; ?>"><?php echo $rec['title']; ?></a></h5>
                  <p class="price">$<?php echo number_format($rec['price']); ?></p>
                  <a href="<?php echo base_url(); ?>index.php/home/propertySaleDetail?id=<?php echo $res['resId']; ?>" class="more">More Detail</a> </div>
              </div>
            </div>
            <?php
// echo $i;
        ++$i; ?>
             <?php
    }
}
?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php // $this->load->view('footer');?>
