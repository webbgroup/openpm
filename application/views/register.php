<?php include 'header.php'; ?>
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
    <span class="pull-right"><a href="<?php echo base_url(); ?>">Home</a> / Register</span>
    <h2>Register</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer">
<div class="row register">
  <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">


                <input type="text" class="form-control" placeholder="Full Name" name="form_name">
                <input type="text" class="form-control" placeholder="Enter Email" name="form_email">
                <input type="password" class="form-control" placeholder="Password" name="form_phone">
                <input type="password" class="form-control" placeholder="Confirm Password" name="form_phone">

                <textarea rows="6" class="form-control" placeholder="Address" name="form_message"></textarea>
      <button type="submit" class="btn btn-success" name="Submit">Register</button>
          


                
        </div>
  
</div>
</div>
</div>

<?php// include'footer.php';?>
