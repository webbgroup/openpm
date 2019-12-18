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
    <span class="pull-right"><a href="<?php echo base_url();?>">Home</a> / Agents</span>
    <h2>Agents</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer agents">

<div class="row">
  <div class="col-lg-8  col-lg-offset-2 col-sm-12">
      <!-- agents -->
      <?php if($result) { foreach($result as $res){?>
      <div class="row">
     <?php if($res->profile_pic!=""){?>
        <div class="col-lg-2 col-sm-2 "><a href="#"><img src="<?php echo base_url(); ?>uploads/<?php echo $res->profile_pic;?>" class="img-responsive"  alt="<?php echo $res->fullname;?>" style="height: auto;"></a></div>
        <?php }else{?>
        <div class="col-lg-2 col-sm-2 "><a href="#"><img src="<?php echo base_url(); ?>uploads/no-image.png" class="img-responsive"  alt="<?php echo $res->fullname;?>"></a></div>
        <?php }?>
        <div class="col-lg-7 col-sm-7 "><h4><?php echo $res->fullname;?></h4><p><?php echo $res->description;?></p></div>
        <div class="col-lg-3 col-sm-3 "><span class="glyphicon glyphicon-envelope"></span> <a href=""><?php echo $res->email;?></a><br>
        <span class="glyphicon glyphicon-earphone"></span> <?php echo $res->number;?></div>
      </div>
      <!-- agents -->
      <?php }}?>
       <!-- agents -->
     
     
  </div>
</div>


</div>
</div>
