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
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="<?php echo base_url();?>">Home</a> / Newsletter</span>
    <h2>Register</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer">
<div class="row register">
  <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">

    <h2>  <strong> <font color="red">Are you sure want to unsubscribe?</font></strong></h2>
                <input type="hidden" name="keyval">
                <br />
           <div class="col-lg-3 col-lg-offset-1 col-sm-6 ">
           <?php if ($key_res) {?>
           <input  type="hidden" id="unsubkey" value="<?php echo $key_res['key'];?>"?>
           <?php }
?>
      <button type="button" id="btnunsub" class="btn btn-info">Yes</button>

</div>
<div class="col-lg-3 col-lg-offset-1 col-sm-6 ">
      <button type="button" id="btncancelun" class="btn btn-info">No</button>

</div>


        </div>

</div>
</div>
</div>
