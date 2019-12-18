<!DOCTYPE html>
<html lang="en">
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
<head>
<title><?php if($site_title){echo $site_title['contents']->cvalue;}?></title>
<meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="<?php echo base_url();?>assets/style.css"/>
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.js"></script>
  <script src="<?php echo base_url();?>assets/script.js"></script>



<!-- Owl stylesheet -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/owl-carousel/owl.carousel.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/owl-carousel/owl.theme.css">
<script src="<?php echo base_url();?>assets/owl-carousel/owl.carousel.js"></script>
<!-- Owl stylesheet -->


<!-- slitslider -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/slitslider/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/slitslider/css/custom.css" />
    <script type="text/javascript" src="<?php echo base_url();?>assets/slitslider/js/modernizr.custom.79639.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/slitslider/js/jquery.ba-cond.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/slitslider/js/jquery.slitslider.js"></script>
<!-- slitslider -->
<?php if($hycolor){
 $h_color=$hycolor['contents']['cvalue'];
}
if($btncolors){
  $btn=$btncolors['contents']['cvalue'];
}
if($style){
  $color= $style['contents']->cvalue;
}
if($bannercolor){
  $banner= $bannercolor['contents']['cvalue'];
}
?>
<!-- <link rel="stylesheet" href="<?php echo base_url();?>assets/test.php"> -->


<style type="text/css">
  a{
    color :<?php echo $h_color;?>;
  }
  .btn-primary{
      background :<?php echo $btn;?> none repeat scroll 0 0;
  }
  .btn-success , .sl-slider blockquote cite{
     background :<?php echo $btn;?> none repeat scroll 0 0;
  }
  #nav_wrap{
    background-color :<?php echo $color;?>;
  }
  .banner-search , .inside-banner{
    background : <?php echo $banner;?>;
  }

</style>
<script type="text/javascript">
$(document).ready(function(){
    $('.menuclass').click(function(){
      $('.menuclass').removeClass('active');
      $(this).addClass('active');
    });
});
</script>
</head>

<body>
<?php ?>
<!-- Header Starts -->
<div class="navbar-wrapper">

        <div class="navbar-inverse" role="navigation" id="nav_wrap">
          <div class="container">
            <div class="navbar-header">


              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
            <div id="smoothmenu1" class="ddsmoothmenu">
              <ul class="nav navbar-nav navbar-right">
               <li class="<?=($this->uri->segment(2)==='index')?'active':''?>"><a href="<?php echo base_url();?>">Home</a></li>
                <li class="<?=($this->uri->segment(2)==='about')?'active':''?>"><a href="<?php echo base_url('home/about');?>">About</a></li>
                <li class="<?=($this->uri->segment(2)==='agents')?'active':''?>"><a href="<?php echo base_url('home/agents');?>">Agents</a></li>         
                <li class="<?=($this->uri->segment(2)==='contact')?'active':''?>"><a href="<?php echo base_url('home/contact');?>">Contact</a></li>
              </ul>
              </div>
            </div>
            <!-- #Nav Ends -->

          </div>
        </div>

    </div>
<!-- #Header Starts -->




<div class="container">

<!-- Header Starts -->
<div class="header">
<?php if($site_logo){
  ?>
<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url();?>uploads/<?php echo $site_logo['contents']->cvalue;?>" alt="Realestate"></a>

 <?php }?>

              
               

            
              <ul class="pull-right">
               <!--  <li><a href="<?php echo base_url();?>index.php/home/buysAleRent">Buy</a></li> -->
                <li><a href="<?php echo base_url();?>home/forSale">Sale</a></li>         
                <li><a href="<?php echo base_url();?>home/forRent">Rent</a></li>
              </ul>
</div>
<!-- #Header Starts -->
</div>
