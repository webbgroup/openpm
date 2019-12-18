<?php $pageName = 'about';?>
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
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="#">Home</a> / About Us</span>
    <h2>About Us</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer">
<div class="row">
<?php if($page){
  foreach($page as $pg){

    }?>
  <div class="col-lg-8  col-lg-offset-2">
  <img src="<?php echo base_url(); ?>uploads/<?php echo $pg['file_name'];?>" class="img-responsive thumbnail"  alt="realestate">
  <h3><?php echo $pg['title'];?></h3>
  <p><?php echo $pg['content'];?></p>
 <?php } ?>
</div>
</div>
</div>
</div>
<?php // $this->load->view('footer');?>
