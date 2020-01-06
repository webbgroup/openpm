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
    <span class="pull-right"><a href="#">Home</a> / Buy</span>
    <h2>Buy</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 hidden-xs">

<div class="hot-properties hidden-xs">
<?php foreach ($hotpop as $hotproperty) {
    ?>

<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="<?php echo base_url(); ?>uploads/<?php $pic_arr = explode(',', $hotproperty['filename']);
    echo $pic_arr[0]; ?>" class="img-responsive img-circle" alt="properties"/></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="<?php echo base_url(); ?>index.php/home/propertyRentDetail?id=<?php echo $hotproperty['resId']; ?>"><?php echo $hotproperty['title']; ?></a></h5>
                  <p class="price">$<?php echo number_format($hotproperty['rent']); ?></p> </div>
              </div>
              <?php
}
?>
</div>



<div class="advertisement">
  <h4>Advertisements</h4>
  <!-- <img src="images/advertisements.jpg" class="img-responsive" alt="advertisement"> -->

</div>

</div>

<div class="col-lg-9 col-sm-8 ">

<?php foreach ($result as $res) {
}
$pic_arr = explode(',', $res['filename']);
foreach ($pic_arr as $pic) {
    $imag[] = $pic;
}
if ($interiors) {
    foreach ($interiors as $int) {
    }
    $pic_arr3 = explode(',', $int['filename']);
    foreach ($pic_arr3 as $pic3) {
        $imag[] = $pic3;
    }
}
?>
<h2><?php echo $res['tt']; ?></h2><div class="row">
  <div class="col-lg-8">
  <div class="property-images">
    <!-- Slider Starts -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators hidden-xs">
      <?php $cpt = count($imag);
// print_r($pic_arr2);exit();
for ($c = 0; $c < $cpt; ++$c) {
    $class = (0 == $c) ? 'active' : '';
    echo ' <li data-target="#myCarousel" data-slide-to="'.$c.'" class="'.$class.'"></li>';
}
?>
      </ol>
      <div class="carousel-inner">
        <!-- Item 1 -->
        <?php
$i = 1;
foreach ($imag as $im) {
    //echo $i;
    if (1 == $i) {
        $class_ative = 'active';
    } else {
        $class_ative = '';
    } ?>
                    <div class="item <?php echo $class_ative; ?>">

                      <img src="<?php echo base_url(); ?>uploads/<?php echo $im; ?>" class="properties" alt="properties" />
                    </div>
                    <?php
++$i;
}
?>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
<!-- #Slider Ends -->
  </div>




  <div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span> Properties Detail</h4>
  <p><?php echo $res['desc']; ?></p>
  <?php if ($res['status']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Status</div><div class="col-lg-6"><?php echo $res['status']; ?></div>
  </div>
  <?php }
?>
  <?php if ($res['datePosted']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Date Posted</div><div class="col-lg-6"><?php echo $res['datePosted']; ?></div>
  </div>
  <?php }
?>
  <?php if ($res['dateUpdated']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Date Update</div><div class="col-lg-6"><?php echo $res['dateUpdated']; ?></div>
  </div>
  <?php }
?>
  <?php if ($res['numfloors']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Number Of floor</div><div class="col-lg-6"><?php echo $res['numfloors']; ?></div>
  </div>
  <?php }
?>
  <?php if (0 != $res['yearbuilt']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Year Built</div><div class="col-lg-6"><?php echo $res['yearbuilt']; ?></div>
  </div>
  <?php }
?>
  <?php if ($res['lotsize']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Lot size</div><div class="col-lg-6"><?php echo $res['lotsize']; ?></div>
  </div>
  <?php }
?>
  <?php if (0 != $res['sqFeet']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Sqfeet</div><div class="col-lg-6"><?php echo $res['sqFeet']; ?></div>
  </div>
  <?php }
?>
  <?php if (0 != $res['golf']) {?>
  <div class="row">
  <div class="col-lg-6 divpop"> Golf course</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['waterfront']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Lot size</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['commPool']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Community pool</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['pool']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Tenant pays gas</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['lawnSprinklers']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Lawn Sprinklers</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['assocFee']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Association Fee</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['fmv']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Tenant pays gas</div><div class="col-lg-6"><?php echo $res['fmv']; ?></div>
  </div>
  <?php }
?>
  <?php if (0 != $res['mls']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">MLS</div><div class="col-lg-6"><?php echo $res['mls']; ?></div>
  </div>
  <?php }
?>
  <?php if (0 != $res['tax']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Tax</div><div class="col-lg-6"><?php echo $res['tax']; ?></div>
  </div>
  <?php }
?>
  <?php if (0 != $res['useAcreage']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">useAcreage</div><div class="col-lg-6"><?php echo $res['useAcreage']; ?></div>
  </div>
  <?php }
?>
  <?php if (0 != $res['zoning']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Zoning</div><div class="col-lg-6"><?php echo $res['zoning']; ?></div>
  </div>
  <?php }
?>
  <?php if (0 != $res['parkingSpaces']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Parking Spaces</div><div class="col-lg-6"><?php echo $res['parkingSpaces']; ?></div>
  </div>
  <?php }
?>
  <?php if ($res['financingDetails']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Owner Financial Details</div><div class="col-lg-6"><?php echo $res['financingDetails']; ?></div>
  </div>
  <?php }
?>
  <?php if ('' != $res['elemSchool']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Elementary School: </div><div class="col-lg-6"><?php echo $res['elemSchool']; ?></div>
  </div>
  <?php }
?>
  <?php if ('' != $res['midSchool']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Middle School: </div><div class="col-lg-6"><?php echo $res['midSchool']; ?></div>
  </div>
  <?php }
?>
  <?php if (0 != $res['neighborhood']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Neighborhood Name:</div><div class="col-lg-6"><?php echo $res['parkingSpaces']; ?></div>
  </div>
  <?php }
?>

   <?php if (0 != $res['wdIncluded']) {?>
  <div class="row">
  <div class="col-lg-6 divpop"> W/D included</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['wdConnections']) {?>
  <div class="row">
  <div class="col-lg-6 divpop"> W/D Connections</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['tpwater']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Tenant pays water</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['tpelectricity']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Tenant pays electricity</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['tpgas']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Tenant pays gas</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['tpcable']) {?>
  <div class="row">
  <div class="col-lg-6 divpop"> Tenant pays Cable</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['tptrash']) {?>
  <div class="row">
  <div class="col-lg-6 divpop"> Tenant pays trash</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['pets']) {?>
  <div class="row">
  <div class="col-lg-6 divpop"> Pets allowed</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['sec8']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Section 8</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['fitness']) {?>
  <div class="row">
  <div class="col-lg-6 divpop"> Fitness center</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['spa']) {?>
  <div class="row">
  <div class="col-lg-6 divpop"> Spa</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['sports']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">  Sports complex</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>

   <?php if (0 != $res['tennis']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Tennis</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['bikePath']) {?>
  <div class="row">
  <div class="col-lg-6 divpop"> Bike Path</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['boating']) {?>
  <div class="row">
  <div class="col-lg-6 divpop"> Boating</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['courtyard']) {?>
  <div class="row">
  <div class="col-lg-6 divpop"> Courtyard</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['playground']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">  Playground</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['clubhouse']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">  Clubhouse</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['publicTrans']) {?>
  <div class="row">
  <div class="col-lg-6 divpop"> Public transportation</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['fenced']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">  Fenced</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['groundLease']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">  Ground Lease</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['leaseOp']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">   Lease Option</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <h5><span class="glyphicon glyphicon-th-list"></span> Interior Information</h5>
 <?php if (0 != $res['wdIncluded']) {?>
  <div class="row">
  <div class="col-lg-6 divpop"> W/D included</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['wdConnections']) {?>
  <div class="row">
  <div class="col-lg-6 divpop"> W/D Connections</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
   <?php if (0 != $res['carpeted']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Carpeted</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['dishwasher']) {?>
  <div class="row">
  <div class="col-lg-6 divpop"> Dishwasher</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['gasstove']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Gas stove</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['hardwood']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Hard wood</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>

   <?php if (0 != $res['alarm']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Alarm</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['cable']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Cable</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['fireplace']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Fire Place</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['air']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Centralized A/C</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['balcony']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Balcony</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['wheelchair']) {?>
  <div class="row">
  <div class="col-lg-6 divpop"> Wheel chair</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['vaulted']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Vaulted ceiling</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>
  <?php if (0 != $res['internet']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">High speed internet</div><div class="col-lg-6">Yes</div>
  </div>
  <?php }
?>

  <?php if (0 != $res['beds']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Bed rooms:</div><div class="col-lg-6"><?php echo $res['beds']; ?></div>
  </div>
  <?php }
?>
  <?php if (0 != $res['baths']) {?>
  <div class="row">
  <div class="col-lg-6 divpop"> Bathrooms:</div><div class="col-lg-6"><?php echo $res['beds']; ?></div>
  </div>
  <?php }
?>
  <?php if (0 != $res['heating']) {?>
  <div class="row">
  <div class="col-lg-6 divpop">Heating</div><div class="col-lg-6"><?php echo $res['heating']; ?></div>
  </div>
  <?php }
?>
  <p><?php echo $res['petPolicy']; ?></p>

  <?php //print_r($result);?>
  <!-- <p>Completely synergize resource sucking relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate resource-leveling customer service for state of the art customer service</p> -->

  </div>
  <!-- <div><h4><span class="glyphicon glyphicon-map-marker"></span> Location</h4>
  <div class="well"><iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Pulchowk,+Patan,+Central+Region,+Nepal&amp;aq=0&amp;oq=pulch&amp;sll=37.0625,-95.677068&amp;sspn=39.371738,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Pulchowk,+Patan+Dhoka,+Patan,+Bagmati,+Central+Region,+Nepal&amp;ll=27.678236,85.316853&amp;spn=0.001347,0.002642&amp;t=m&amp;z=14&amp;output=embed"></iframe></div>
  </div>
   -->
  </div>
  <div class="col-lg-4">
  <div class="col-lg-12  col-sm-6">
<div class="property-info">
<p class="price">$<?php echo number_format($res['price']); ?></p>
  <p class="area"><span class="glyphicon glyphicon-map-marker"></span><?php echo $res['address']; ?>, <?php echo $res['city']; ?>, <?php echo $res['state']; ?>, <?php echo $res['zip']; ?></p>

  <div class="profile">
  <span class="glyphicon glyphicon-user"></span> Agent Details
   <p><?php echo $res['contactName']; ?><br><?php echo $res['contactPhone']; ?><br><?php echo $res['contactEmail']; ?></p>
  </div>
</div>

    <h6><span class="glyphicon glyphicon-home"></span> Availabilty</h6>
    <div class="listing-detail">
    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room"><?php echo $res['beds']; ?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bath Room"><?php echo $res['baths']; ?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Garage Size"><?php if ('' != $res['garagesize']) {
    echo $res['garagesize'];
} else {
    echo '0';
}
?></span></div>

</div>
 <div class="col-lg-12 col-sm-6 ">
      <div class="enquiry">
        <h6><span class="glyphicon glyphicon-envelope"></span> Post Inquiry</h6>
        <form id="eqform">
                <input type="text" class="form-control"id="fullname" placeholder="Full Name" name="fullname"/>
                <input type="text" class="form-control" placeholder="you@yourdomain.com" id="email" name="email"/>
                <input type="text" class="form-control" placeholder="your number" id="number" name="number"/>
                <textarea rows="6" class="form-control" placeholder="Whats on your mind?" id="message" name="message"></textarea>
                <input type="hidden" name="agent_email" id="contactemail" value="<?php echo $res['contactEmail']; ?>"/>
                <input type="hidden" name="propid" id="propid" value="<?php echo $res['resId']; ?>"/>
                <input type="hidden" name="proptitle" id="proptitle" value="<?php echo $res['title']; ?>"/>
      <input type="button" class="btn btn-primary" name="Submit" id="btncontacteq2" value="Send Message" />
      </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
<script>
   $(document).ready(function(){
           $('#btncontacteq2').click(function(){
            var myData = $('#eqform').serialize();
            //alert(myData);
                      var fullname = $('#fullname').val();
                      var email = $('#email').val();
                      var number = $('#number').val();
                      var message = $('#message').val();
                      var contactemail = $('#contactemail').val();
                      if(fullname ==""){
                         bootbox.dialog({
                                      message: "Fullname Required",
                                      buttons: {
                                        "success" : {
                                          "label" : "OK",
                                          "className" : "btn-sm btn-primary"
                                        }
                                      }
                                    });
                          return false;
                      }
                        if(email ==""){
                         bootbox.dialog({
                                      message: "Email Required!",
                                      buttons: {
                                        "success" : {
                                          "label" : "OK",
                                          "className" : "btn-sm btn-primary"
                                        }
                                      }
                                    });
                          return false;
                      }
                      if(number ==""){
                         bootbox.dialog({
                                      message: "Number Required!",
                                      buttons: {
                                        "success" : {
                                          "label" : "OK",
                                          "className" : "btn-sm btn-primary"
                                        }
                                      }
                                    });
                          return false;
                      }
                      if(message ==""){
                         bootbox.dialog({
                                      message: "Message Required!",
                                      buttons: {
                                        "success" : {
                                          "label" : "OK",
                                          "className" : "btn-sm btn-primary"
                                        }
                                      }
                                    });
                          return false;
                      }
                       $.ajax({
                          type: 'POST',
                          url: "<?php echo base_url(); ?>home/postEnquiry",
                          cache: false,
                          data:myData,
                          dataType: "json",
                          success: function(data) {
                              if(data.success == "yes"){
                                      alert("Your inquiry has been sent");
                                          location.reload();
                                  } else {
                                       alert("Inquiry sending failed");

                                  }
                          }
                      });

            });
})
</script>
