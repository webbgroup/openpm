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
		    <span class="pull-right"><a href="<?php echo base_url();?>">Home</a> / Sale</span>
		    <h2>Sale & Rent</h2>
		</div>
		</div>
		<!-- banner -->


		<div class="container">
		<div class="properties-listing spacer">

		<div class="row">
		<div class="col-lg-3 col-sm-4 ">

		  <div class="search-form"><form id="prop_search3" method="post" action="<?php echo base_url();?>home/searchProp"><h4><span class="glyphicon glyphicon-search"></span> Search for</h4>
		    <input type="text" class="form-control" placeholder="Search of Properties" name="search_data" id="search_data">
		    <div class="row">
		            <div class="col-lg-5">
		              <select class="form-control" name="prop_type" id="prop_type">
		                <option value="1">Sale</option>
		                <option value="2">Rent</option>
		              </select>
		            </div>
		            <div class="col-lg-7">
		              <select class="form-control" name="price" id="sr_price">
		                 <option value="">Select Price</option>
		                <option value="150000">$150,000 - $200,000</option>
		                <option value="200000">$200,000 - $250,000</option>
		                <option value="250000">$250,000 - $300,000</option>
		                <option value="300000">$300,000 - above</option>
		              </select>
		            </div>
		          </div>
		          <input type="submit" class="btn btn-primary" value="Find Now">
		          </form>

		  </div>



		<!-- <div class="hot-properties hidden-xs">
		<h4>Hot Properties</h4>
		<?php if ($hotpop) {
	foreach ($hotpop as $hotproperty) {
		?>

		<div class="row">
		                <div class="col-lg-4 col-sm-5"><img src="<?php echo base_url();?>uploads/<?php $pic_arr = explode(",", $hotproperty['filename']);
		echo $pic_arr[0];?>" class="img-responsive img-circle" alt="properties"/></div>
		                <div class="col-lg-8 col-sm-7">
		                  <h5><a href="<?php echo base_url();?>index.php/home/propertySaleDetail?id=<?php echo $hotproperty['resId'];?>"><?php echo $hotproperty['title'];?></a></h5>
		                  <p class="price"><?php echo $hotproperty['price'];?></p> </div>
		              </div>
		              <?php }}
?>

		</div>
		 -->

		</div>

		<div class="col-lg-9 col-sm-8">
		<div class="sortby clearfix">
		<!-- <div class="pull-left result">Showing: 12 of 100 </div> -->
		  <!-- <div class="pull-right">
		  <select class="form-control">
		  <option>Sort by</option>
		  <option>Price: Low to High</option>
		  <option>Price: High to Low</option>
		  </select></div> -->

		</div>
		<div class="row">

		     <!-- properties -->
		      <?php if ($search_result_res) {
	/*echo "<pre>";
	print_r($search_result_res);
	echo "</pre>";exit();*/
	foreach ($search_result_res as $res) {
		if ($res['diff'] == 1) {
			?>
		          <div class="col-lg-4 col-sm-6"  id="forrent" style="min-height: 408px;">
		          <div class="properties">
		            <div class="image-holder"><img src="<?php echo base_url();?>uploads/<?php if ($res['filename'] == '') {?><?php } else {
				$pic_ar = explode(",", $res['filename']);
				echo $pic_ar[0];}
			?>" class="img-responsive" alt="properties">
		              <div class="status sold"><?php echo $res['extstatus'];?></div>
		            </div>
		           <?php if ($res['extforSale'] == 1) {?>
		            <h4><a href="<?php echo base_url();?>index.php/home/propertySaleDetail?id=<?php echo $res['resId'];?>"><?php echo $res['exttitle'];?></a></h4>
		            <p class="price">Price: $<?php echo number_format($res['myprice']);?></p>
		            <?php } else {?>
		                  <h4><a href="<?php echo base_url();?>index.php/home/propertyRentDetail?id=<?php echo $res['resId'];?>"><?php echo $res['exttitle'];?></a></h4>
		            <p class="price">Price: $<?php echo number_format($res['myprice']);?></p>
		              <?php }
			?>
		           <!-- <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room"><?php echo $res['beds'];?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bath Room"><?php echo $res['baths'];?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span> --> <!-- <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> --> </div>
		            <?php if ($res['extforSale'] == 1) {?>
		            <a class="btn btn-primary" href="<?php echo base_url();?>index.php/home/propertySaleDetail?id=<?php echo $res['resId'];?>">View Details</a>
		             <?php } else {?>
		               <a class="btn btn-primary" href="<?php echo base_url();?>index.php/home/propertyRentDetail?id=<?php echo $res['resId'];?>">View Details</a>
		           <?php }
			?>
		          </div>

		      <?php } else {
			?>
		      	<div class="col-lg-4 col-sm-6"  id="forrent" style="min-height: 408px;">
		          <div class="properties">
		            <div class="image-holder"><img src="<?php echo base_url();?>uploads/<?php if ($res['filename'] == '') {?><?php } else {
				$pic_ar = explode(",", $res['filename']);
				echo $pic_ar[0];}
			?>" class="img-responsive" alt="properties">
		              <div class="status sold"><?php echo $res['extstatus'];?></div>
		            </div>
		           <?php if ($res['extforSale'] == 1) {?>
		            <h4><a href="<?php echo base_url();?>index.php/home/propertyComSaleDetail?id=<?php echo $res['resId'];?>"><?php echo $res['exttitle'];?></a></h4>
		            <p class="price">Price: $<?php echo number_format($res['myprice']);?></p>
		            <?php } else {?>
		                  <h4><a href="<?php echo base_url();?>index.php/home/propertyComRentDetail?id=<?php echo $res['resId'];?>"><?php echo $res['exttitle'];?></a></h4>
		            <p class="price">Price: $<?php echo number_format($res['myprice']);?></p>
		              <?php }
			?>
		           <!-- <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room"><?php echo $res['beds'];?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bath Room"><?php echo $res['baths'];?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span> --> <!-- <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> --> </div>
		            <?php if ($res['extforSale'] == 1) {?>
		            <a class="btn btn-primary" href="<?php echo base_url();?>index.php/home/propertyComSaleDetail?id=<?php echo $res['resId'];?>">View Details</a>
		             <?php } else {?>
		               <a class="btn btn-primary" href="<?php echo base_url();?>index.php/home/propertyComRentDetail?id=<?php echo $res['resId'];?>">View Details</a>
		           <?php }
			?>
		          </div>
		     <?php }

	}}
?>
		        </div>
		      <div class="center">
		<ul class="pagination">
		  <?php foreach ($links as $link) {
	echo "<li>" . $link . "</li>";
}
?>
		         <!--  <li><a href="#">«</a></li>
		         <li><a href="#">1</a></li>
		         <li><a href="#">2</a></li>
		         <li><a href="#">3</a></li>
		         <li><a href="#">4</a></li>
		         <li><a href="#">5</a></li>
		         <li><a href="#">»</a></li> -->
		        </ul>
		</div>

		</div>
		</div>
		</div>
		</div>
		</div>
	<script>
	$(document).ready(function(){
		var a = <?php echo $search_arry["prop_type"];?>;
		var pr = '<?php echo $search_arry["price"];?>';
		var sr='<?php echo $search_arry["title"];?>';
		$('#prop_type').val(a);
		$('#sr_price').val(pr);
		$('#search_data').val(sr);
	});
	</script>
		<?php //include'footer.php';?>
