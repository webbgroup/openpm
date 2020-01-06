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
    <span class="pull-right"><a href="<?php echo base_url(); ?>">Home</a> / Sale & Rent</span>
    <h2>Sale & Rent</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 ">

  <div class="search-form"><h4><span class="glyphicon glyphicon-search"></span> Search for</h4>
    <input type="text" class="form-control" placeholder="Search of Properties">
    <div class="row">
            <div class="col-lg-5">
              <select class="form-control">
                <option>Sale</option>
                <option>Rent</option>
              </select>
            </div>
            <div class="col-lg-7">
              <select class="form-control">
                <option>Price</option>
                <option>$150,000 - $200,000</option>
                <option>$200,000 - $250,000</option>
                <option>$250,000 - $300,000</option>
                <option>$300,000 - above</option>
              </select>
            </div>
          </div>

          <div class="row">
          <div class="col-lg-12">
              <select class="form-control">
                <optgroup style="font-weight:bold;font-size:10px;color:black;" label="Agricultural">
                                          <option style="font-size:10px;color:black;" value="100">Farm</option>
                                          <option style="font-size:10px;color:black;" value="101">Ranch</option>
                                          <option style="font-size:10px;color:black;" value="102">Timberland</option>
                                        </optgroup>
                                        <optgroup label='Apartments and Multifamily' style='font-weight:bold;font-size:10px;color:black;'>
                                          <option value='57' style='font-size:10px;color:black;'>Complex / 100+ Units</option>
                                          <option value='56' style='font-size:10px;color:black;'>Complex / 16-100 Units</option>
                                          <option value='67' style='font-size:10px;color:black;'>Complex / 5-15 Units</option>
                                          <option value='53' style='font-size:10px;color:black;'>Duplex</option>
                                          <option value='74' style='font-size:10px;color:black;'>Mobile Home Park</option>
                                          <option value='55' style='font-size:10px;color:black;'>Quadruplex</option>
                                          <option value='54' style='font-size:10px;color:black;'>Triplex</option>
                                        </optgroup>
                                        <optgroup label='Assembly' style='font-weight:bold;font-size:10px;color:black;'>
                                          <option value='15' style='font-size:10px;color:black;'>Assembly Hall</option>
                                          <option value='16' style='font-size:10px;color:black;'>Auditorium</option>
                                          <option value='12' style='font-size:10px;color:black;'>Church</option>
                                          <option value='17' style='font-size:10px;color:black;'>Night Club</option>
                                          <option value='18' style='font-size:10px;color:black;'>Restaurant</option>
                                          <option value='64' style='font-size:10px;color:black;'>School</option>
                                          <option value='13' style='font-size:10px;color:black;'>Theater / Live</option>
                                          <option value='14' style='font-size:10px;color:black;'>Theater / Movie</option>
                                        </optgroup>
                                          <optgroup label='Health Care' style='font-weight:bold;font-size:10px;color:black;'>
                                          <option value='22' style='font-size:10px;color:black;'>Extended Care</option>
                                          <option value='23' style='font-size:10px;color:black;'>Hospital</option>
                                          <option value='21' style='font-size:10px;color:black;'>Nursing Home</option>
                                          <option value='24' style='font-size:10px;color:black;'>Short-term</option>
                                        </optgroup>
                                          <optgroup label='Industrial' style='font-weight:bold;font-size:10px;color:black;'>
                                          <option value='30' style='font-size:10px;color:black;'>Artisan Studio</option>
                                          <option value='93' style='font-size:10px;color:black;'>Distribution</option>
                                          <option value='65' style='font-size:10px;color:black;'>Flex Space</option>
                                          <option value='32' style='font-size:10px;color:black;'>Garage / Automotive</option>
                                          <option value='29' style='font-size:10px;color:black;'>Manufacturing Plant</option>
                                          <option value='31' style='font-size:10px;color:black;'>Research And Development</option>
                                          <option value='28' style='font-size:10px;color:black;'>Warehouse</option>
                                        </optgroup>
                                          <optgroup label='Land' style='font-weight:bold;font-size:10px;color:black;'>
                                          <option value='50' style='font-size:10px;color:black;'>Agricultural</option>
                                          <option value='52' style='font-size:10px;color:black;'>Forest</option>
                                          <option value='51' style='font-size:10px;color:black;'>Mining</option>
                                          <option value='70' style='font-size:10px;color:black;'>Zoned Age Restricted</option>
                                          <option value='45' style='font-size:10px;color:black;'>Zoned Commercial</option>
                                          <option value='69' style='font-size:10px;color:black;'>Zoned Golf Course</option>
                                          <option value='47' style='font-size:10px;color:black;'>Zoned Industrial</option>
                                          <option value='68' style='font-size:10px;color:black;'>Zoned Institutional</option>
                                          <option value='72' style='font-size:10px;color:black;'>Zoned Mixed Use</option>
                                          <option value='71' style='font-size:10px;color:black;'>Zoned Mobile Home</option>
                                          <option value='73' style='font-size:10px;color:black;'>Zoned Multifamily</option>
                                          <option value='48' style='font-size:10px;color:black;'>Zoned Office</option>
                                          <option value='46' style='font-size:10px;color:black;'>Zoned Residential</option>
                                          <option value='49' style='font-size:10px;color:black;'>Zoned Retail</option>
                                        </optgroup>
                                          <optgroup label='Lodging' style='font-weight:bold;font-size:10px;color:black;'>
                                          <option value='27' style='font-size:10px;color:black;'>Bed And Breakfast</option>
                                          <option value='25' style='font-size:10px;color:black;'>Hotel</option>
                                          <option value='26' style='font-size:10px;color:black;'>Motel</option>
                                        </optgroup>
                                          <optgroup label='Manufactured Housing' style='font-weight:bold;font-size:10px;color:black;'>
                                          <option value='77' style='font-size:10px;color:black;'>Doublewide</option>
                                          <option value='76' style='font-size:10px;color:black;'>Mobile Home</option>
                                          <option value='78' style='font-size:10px;color:black;'>Modular</option>
                                        </optgroup>
                                          <optgroup label='Office' style='font-weight:bold;font-size:10px;color:black;'>
                                          <option value='66' style='font-size:10px;color:black;'>Business Campus</option>
                                          <option value='33' style='font-size:10px;color:black;'>Central Business District</option>
                                          <option value='96' style='font-size:10px;color:black;'>Condo</option>
                                          <option value='95' style='font-size:10px;color:black;'>General / Flex</option>
                                          <option value='94' style='font-size:10px;color:black;'>Medical</option>
                                          <option value='34' style='font-size:10px;color:black;'>Neighborhood</option>
                                          <option value='97' style='font-size:10px;color:black;'>Showroom</option>
                                          <option value='35' style='font-size:10px;color:black;'>Suburban</option>
                                        </optgroup>
                                          <optgroup label='Retail' style='font-weight:bold;font-size:10px;color:black;'>
                                          <option value='80' style='font-size:10px;color:black;'>Outlot</option>
                                          <option value='20' style='font-size:10px;color:black;'>Shopping Mall</option>
                                          <option value='19' style='font-size:10px;color:black;'>Street Retail</option>
                                          <option value='81' style='font-size:10px;color:black;'>Strip Center / Anchored</option>
                                          <option value='79' style='font-size:10px;color:black;'>Strip Center / Unanchored</option>
                                        </optgroup>
                                          <optgroup label='Single Family Home' style='font-weight:bold;font-size:10px;color:black;'>
                                          <option value='63' style='font-size:10px;color:black;'>Condo</option>
                                          <option value='60' style='font-size:10px;color:black;'>Detached</option>
                                          <option value='62' style='font-size:10px;color:black;'>Row House</option>
                                          <option value='61' style='font-size:10px;color:black;'>Townhouse</option>
                                        </optgroup>
                                          <optgroup label='Sports and Leisure' style='font-weight:bold;font-size:10px;color:black;'>
                                          <option value='41' style='font-size:10px;color:black;'>Baseball</option>
                                          <option value='39' style='font-size:10px;color:black;'>Bowling</option>
                                          <option value='36' style='font-size:10px;color:black;'>Golf</option>
                                          <option value='43' style='font-size:10px;color:black;'>Hockey</option>
                                          <option value='38' style='font-size:10px;color:black;'>Marina</option>
                                          <option value='40' style='font-size:10px;color:black;'>Mini-golf</option>
                                          <option value='44' style='font-size:10px;color:black;'>Mixed-sport Center</option>
                                          <option value='42' style='font-size:10px;color:black;'>Soccer</option>
                                          <option value='37' style='font-size:10px;color:black;'>Tennis</option>
                                        </optgroup>
              </select>
              </div>
          </div>
          <button class="btn btn-primary">Find Now</button>

  </div>



<div class="hot-properties hidden-xs">
<h4>Hot Properties</h4>
<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="<?php echo base_url(); ?>images/properties/1.jpg" class="img-responsive img-circle" alt="properties"></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="<?php echo base_url(); ?>index.php/home/propertyDetail">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p> </div>
              </div>
<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="<?php echo base_url(); ?>images/properties/1.jpg" class="img-responsive img-circle" alt="properties"></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="<?php echo base_url(); ?>index.php/home/propertyDetail">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p> </div>
              </div>

<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="<?php echo base_url(); ?>images/properties/1.jpg" class="img-responsive img-circle" alt="properties"></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="<?php echo base_url(); ?>index.php/home/propertyDetail">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p> </div>
              </div>

<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="<?php echo base_url(); ?>images/properties/1.jpg" class="img-responsive img-circle" alt="properties"></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="<?php echo base_url(); ?>index.php/home/propertyDetail">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p> </div>
              </div>

</div>


</div>

<div class="col-lg-9 col-sm-8">
<div class="sortby clearfix">
<div class="pull-left result">Showing: 12 of 100 </div>
  <div class="pull-right">
  <select class="form-control">
  <option>Sort by</option>
  <option>Price: Low to High</option>
  <option>Price: High to Low</option>
</select></div>

</div>
<div class="row">

     <!-- properties -->
      <?php foreach ($residential as $res) {?>
      <div class="col-lg-4 col-sm-6">
      <div class="properties">
        <div class="image-holder"><img src="<?php echo base_url(); ?>uploads/<?php if ('' == $res['image_name']) {?>no-image.png<?php } else {
    echo $res['image_name'];
}?>" class="img-responsive" alt="properties">
          <div class="status sold">Sold</div>
        </div>
        <h4><a href="<?php echo base_url(); ?>index.php/home/propertyDetail"><?php echo $res['title']; ?></a></h4>
        <p class="price">Price: $234,900</p>
       <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room"><?php echo $res['beds']; ?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bath Room"><?php echo $res['baths']; ?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span> <!-- <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> --> </div>
        <a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/home/propertyDetail">View Details</a>
      </div>
      </div>
      <?php }?>
      <div class="center">
<ul class="pagination">
          <li><a href="#">«</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#">»</a></li>
        </ul>
</div>

</div>
</div>
</div>
</div>
</div>

<?php include 'footer.php'; ?>
