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
    <span class="pull-right"><a href="<?php echo base_url(); ?>">Home</a> / Contact Us</span>
    <h2>Contact Us</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer">
<div class="row contact">
  <div class="col-lg-6 col-sm-6 ">
<form name="contact-us" method="post" action="<?php echo base_url(); ?>home/contactUs">

                <input type="text" class="form-control" placeholder="Full Name" name="name" required>
                <input type="text" class="form-control" placeholder="Email Address" name="from_email" required>
                <input type="text" class="form-control" placeholder="Contact Number" name="number" required>
                <textarea rows="6" class="form-control" placeholder="Message" name="message" required></textarea>
      <button type="submit" class="btn btn-success" name="Submit">Send Message</button>
          


                
        </div>
  <div class="col-lg-6 col-sm-6 ">
  <?php if ($map_address) {
    ?>
  <div class="well">
<!-- <iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Pulchowk,+Patan,+Central+Region,+Nepal&amp;aq=0&amp;oq=pulch&amp;sll=37.0625,-95.677068&amp;sspn=39.371738,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Pulchowk,+Patan+Dhoka,+Patan,+Bagmati,+Central+Region,+Nepal&amp;ll=27.678236,85.316853&amp;spn=0.001347,0.002642&amp;t=m&amp;z=14&amp;output=embed"></iframe> -->
<iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?php echo strip_tags($map_address['contents']->cvalue); ?>&output=embed"></iframe>  </div>
  <?php
} ?>
  </div>
</div>
</div>
</div>
