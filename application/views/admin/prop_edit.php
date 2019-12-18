	<?php $this->load->view('admin/admin_header');?>
		<?php $this->load->view('admin/admin_sidebar');?>
					<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="#">Home</a>
							</li>

							<li>
								<a href="#">Properties</a>
							</li>
							<li class="active">Edit</li>
						</ul><!-- .breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="icon-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- #nav-search -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1> Update Property Information </h1>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="col-sm-12 widget-container-span ui-sortable">
										<div class="widget-box">


											<div class="widget-header">
												<h5 class="smaller">Update Property Information</h5>

												<div class="widget-toolbar no-border">

													</div>
												</div>
												<div class="widget-body">
													<div class="widget-main padding-6">
														<form id="prop_edit" method="post" action="<?php echo base_url();?>admin/updateChanges" enctype="multipart/form-data">
														<?php foreach ($results as $result) {

}
?>
														<input type="hidden" name="typeId" id="typ_id" value="<?php echo $result['typeId'];?>">
														<input type="hidden" name="forSale" id="for_sale" value="<?php echo $result['forSale'];?>">
														<input type="hidden" name="uniq" id="uniq" value="<?php echo $result['uniqueId'];?>">

													<?php if ($result['typeId'] == 53 || $result['typeId'] == 55 || $result['typeId'] == 54 || $result['typeId'] == 60 || $result['typeId'] == 63 || $result['typeId'] == 62 || $result['typeId'] == 61 || $result['typeId'] == 77 || $result['typeId'] == 76 || $result['typeId'] == 78) {
	if ($result['forSale'] == 1) {
		?>

														<div id="res_sale" style="display:block">

															<div class="row">
																<input type="hidden" name="id" value="<?php echo $result['resId'];?>">
																<div class="form-group">
																	<div class="col-xs-9 col-sm-3">
																		<label>Property Address: (Ex: 123 Main Street) Residential</label>
																	</div>
																	<div class="col-xs-10 col-sm-4">
																		<input id="street1" class="col-xs-15 col-sm-10" type="text" name="street1" size="25" maxlength="50" value="<?php echo $result['address'];?>">
																	</div>
																	<div class="col-xs-6 col-sm-2">
																		<label>Elementary School: </label>
																	</div>
																	<div class="col-xs-8 col-sm-3">
																		<input id="elemSchool" class="col-xs-10 col-sm-5" type="text" name="elemSchool" size="25" maxlength="50" value="<?php echo $result['elemSchool'];?>">
																	</div>
																</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-9 col-sm-3">
																			<label>Property Address2:</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<input id="street2" class="col-xs-15 col-sm-10" type="text" name="street2" size="25" maxlength="50" value="<?php echo $result['address2'];?>">
																		</div>
																		<div class="col-xs-6 col-sm-2">
																			<label>Middile School: </label>
																		</div>
																		<div class="col-xs-8 col-sm-3">
																			<input id="midSchool" class="col-xs-10 col-sm-5" type="text" name="midSchool" size="25" maxlength="50" value="<?php echo $result['midSchool'];?>">
																		</div>
																	</div>
																</div>

																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-9 col-sm-3">
																			<label>Property City:</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<select class="col-xs-15 col-sm-10" id="city" name="city" value="<?php echo $result['city'];?>">
																				<option value="<?php echo $result['city'];?>" selected><?php echo $result['city'];?></option>

																			</select>
																		</div>
																		<div class="col-xs-6 col-sm-2">
																			<label>High School: : </label>
																		</div>
																		<div class="col-xs-8 col-sm-3">
																			<input id="highSchool" class="col-xs-10 col-sm-5" type="text" name="highSchool" size="25" maxlength="50" value="<?php echo $result['highSchool'];?>">
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-9 col-sm-3">
																			<label>Property State:</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<select class="col-xs-15 col-sm-10" id="state" name="state">
																					<option value="">&nbsp</option>
																			<?php
foreach ($state_val AS $key => $value) {
			echo "<option value='" . $key . "'>" . $value . "</option>";
		}
		?>

																			</select>
																		</div>

																	</div>
																</div>

																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-9 col-sm-3">
																			<label>Property Zip:</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<select class="col-xs-15 col-sm-10" id="zip" name="zip">
																				<option value="<?php echo $result['zip'];?>" selected><?php echo $result['zip'];?></option>

																			</select>
																		</div>
																		<div class="col-xs-6 col-sm-2">
																			<label>Neighborhood Name:</label>
																		</div>
																		<div class="col-xs-8 col-sm-3">
																			<input id="neighborhood" class="col-xs-10 col-sm-5" type="text" name="neighborhood" size="25" maxlength="50" value="<?php echo $result['neighborhood'];?>">
																		</div>
																	</div>
																</div>
															<div class="space-4"></div>
															<div class="widget-header widget-header-blue widget-header-flat">
																<h4 class="lighter">Property Exterior Information</h4>
															</div>

															<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="waterfront" id="waterfront" value="1"<?php if ($result['waterfront'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Waterfront</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="golfCourse"  value="1"<?php if ($result['golf'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Golf course</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input class="ace" type="checkbox" name="commPool"  value="1"<?php if ($result['commPool'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Community pool</span>
																		</label>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="pool"  value="1"<?php if ($result['pool'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Private pool</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="lawnSprinklers"  value="1"<?php if ($result['lawnSprinklers'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Lawn sprinklers</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input class="ace" type="checkbox" name="associationFee"  value="1"<?php if ($result['assocFee'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl">Association fee</span>
																		</label>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-3 col-sm-1">
																			<label>Available:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="id-date-picker-1" class="col-xs-10 col-sm-6 date-picker" type="text" name="available" data-date-format="yyyy-mm-dd" value="<?php echo $result['available'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Price:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="price" class="col-xs-10 col-sm-6" type="text" name="price" placeholder="$" value="<?php echo $result['price'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Fair market value</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="fmv" class="col-xs-10 col-sm-6" type="text" name="fmv" value="<?php echo $result['fmv'];?>">
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-3 col-sm-1">
																			<label>MLS #</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="mls" class="col-xs-10 col-sm-6" type="text" name="mls" value="<?php echo $result['mls'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Property taxes</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="tax" class="col-xs-10 col-sm-6" type="text" name="tax" placeholder="$" value="<?php echo $result['tax'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Sale Status:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="status" class="col-xs-10 col-sm-6"  name="status">
																				<option value="Active">Active</option>
																				<option value="Incomplete">Incomplete</option>
																				<option value="Closed">Closed</option>
																				<option value="Contingent">Contingent</option>
																				<option value="Contingent Accepting Backup Offers">Contingent Accepting Backup Offers</option>
																				<option value="Expired">Expired</option>
																				<option value="Pending">Pending</option>
																				<option value="Pending Accepting Backup Offers">Pending Accepting Backup Offers</option>
																				<option value="Temporary Off Market">Temporary Off Market</option>
																				<option value="Withdrawn">Withdrawn</option>
																			</select>
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-3 col-sm-1">
																			<label>Lot Size:</label>
																		</div>
																		<div class="col-xs-5 col-sm-1">
																			<input id="lotSize" class="col-xs-20 col-sm-10" type="text" name="lotSize" value="<?php echo $result['lotsize'];?>">
																			</div>

																			<div class="col-xs-5 col-sm-2">
																			<select id="useAcreage" class="col-xs-20 col-sm-10"  name="useAcreage" value="<?php echo $result['useAcreage'];?>">
																					<option value="1">Acres</option>
																					<option selected="" value="0">Square Feet</option>
																			</select>
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Zoning:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="zoning" class="col-xs-10 col-sm-6" type="text" name="zoning" placeholder="" value="<?php echo $result['zoning'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Year Built</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="yearBuilt" class="col-xs-10 col-sm-6" type="text" name="yearBuilt" value="<?php echo $result['yearbuilt'];?>">
																		</div>
																	</div>
																</div>
																	<div class="space-4"></div>
																	<div class="row">
																	<div class="form-group">
																		<div class="col-xs-3 col-sm-1">
																			<label># of parking spaces</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="parkingSpaces" class="col-xs-10 col-sm-6" type="text" name="parkingSpaces" value="<?php echo $result['parkingSpaces'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Garage size:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="garageSize" class="col-xs-10 col-sm-6"  name="garageSize">
																				<option selected="" value=""></option>
																				<option value="1">1</option>
																				<option value="2">2</option>
																				<option value="3+">3+</option>
																			</select>
																		</div>

																</div>
																</div>
																<div class="space-4"></div>
																	<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">
																			<label>Owner Financing Details</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<textarea id="financingDetails" class="form-control"  name="financingDetails"><?php echo $result['financingDetails'];?></textarea>
																		</div>
																		</div>
																		</div>

															<div class="space-4"></div>
															<div class="widget-header widget-header-blue widget-header-flat">
																<h4 class="lighter">Ad Information</h4>
															</div>

															<div class="space-4"></div>
															<div class="space-4"></div>
																	<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">
																			<label>Title</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<textarea id="title" class="form-control"  name="title"><?php echo $result['title'];?></textarea>
																		</div>
																		</div>
																		</div>

															<div class="space-4"></div>
															<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">
																			<label>Description (500 character maximum) This is how people will find your property through our text searches. More content within your description means more chances your property will show up, so please use the space provided.</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<textarea id="description_res" class="form-control"  name="description"><?php echo $result['description'];?></textarea>
																		</div>
																		</div>
																		</div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">

																		</div>
																		<div class="col-xs-10 col-sm-2">
																			<input multiple="" type="file" id="id-input-file-ressale" name="filetoupload_sale[]"/>
																					<label>
																						<!-- <input type="checkbox" name="file-format" id="id-file-formatressale" class="ace" /> -->
																						<!-- <span class="lbl"> Allow only images</span> -->
																					</label>
																		</div>

																	</div>
																</div>
														</div>
														<?php } else {
		?>
															<div id="res_rent" style="display:block">
															<div class="row">
																<input type="hidden" name="id" value="<?php echo $result['resId'];?>">
																<div class="form-group">
																	<div class="col-xs-9 col-sm-3">
																		<label>Property Address: (Ex: 123 Main Street) </label>
																	</div>
																	<div class="col-xs-10 col-sm-4">
																		<input id="street1_rent" class="col-xs-15 col-sm-10" type="text" name="street1_rent" size="25" maxlength="50" value="<?php echo $result['address'];?>">
																	</div>
																	<div class="col-xs-6 col-sm-2">
																		<label>Elementary School: </label>
																	</div>
																	<div class="col-xs-8 col-sm-3">
																		<input id="elemSchool_rent" class="col-xs-10 col-sm-5" type="text" name="elemSchool_rent" size="25" maxlength="50" value="<?php echo $result['elemSchool'];?>">
																	</div>
																</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-9 col-sm-3">
																			<label>Property Address2:</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<input id="street2_rent" class="col-xs-15 col-sm-10" type="text" name="street2_rent" size="25" maxlength="50" value="<?php echo $result['address2'];?>">
																		</div>
																		<div class="col-xs-6 col-sm-2">
																			<label>Middile School: </label>
																		</div>
																		<div class="col-xs-8 col-sm-3">
																			<input id="midSchool_rent" class="col-xs-10 col-sm-5" type="text" name="midSchool_rent" size="25" maxlength="50" value="<?php echo $result['midSchool'];?>">
																		</div>
																	</div>
																</div>

																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-9 col-sm-3">
																			<label>Property City:</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<select class="col-xs-15 col-sm-10" id="city_rent" name="city_rent" value="<?php echo $result['city'];?>">
																				<option value="<?php echo $result['city'];?>" selected><?php echo $result['city'];?></option>

																			</select>
																		</div>
																		<div class="col-xs-6 col-sm-2">
																			<label>High School: : </label>
																		</div>
																		<div class="col-xs-8 col-sm-3">
																			<input id="highSchool_rent" class="col-xs-10 col-sm-5" type="text" name="highSchool_rent" size="25" maxlength="50" value="<?php echo $result['highSchool'];?>">
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-9 col-sm-3">
																			<label>Property State:</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<select class="col-xs-15 col-sm-10" id="state_rent" name="state_rent"  value="<?php echo $result['state'];?>">
																				<option value="">&nbsp</option>
																			<?php
foreach ($state_val AS $key => $value) {
			echo "<option value='" . $key . "'>" . $value . "</option>";
		}
		?>
																			</select>
																		</div>

																	</div>
																</div>

																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-9 col-sm-3">
																			<label>Property Zip:</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<select class="col-xs-15 col-sm-10" id="zip_rent" name="zip_rent"  value="<?php echo $result['zip'];?>">
																				<option value="<?php echo $result['zip'];?>" selected><?php echo $result['zip'];?></option>

																			</select>
																		</div>
																		<div class="col-xs-6 col-sm-2">
																			<label>Neighborhood Name:</label>
																		</div>
																		<div class="col-xs-8 col-sm-3">
																			<input id="neighborhood_rent" class="col-xs-10 col-sm-5" type="text" name="neighborhood_rent" size="25" maxlength="50"  value="<?php echo $result['neighborhood'];?>">
																		</div>
																	</div>
																</div>
															<div class="space-4"></div>
															<div class="widget-header widget-header-blue widget-header-flat">
																<h4 class="lighter">Property Exterior Information</h4>
															</div>

															<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="tpGas_rent" id="tpGas_rent" value="1"<?php if ($result['tpgas'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Tenant pays gas</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="tpElectricity_rent" class="ace" type="checkbox" name="tpElectricity_rent"  value="1"<?php if ($result['tpelectricity'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Tenant pays electricity</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="tpWater_rent" class="ace" type="checkbox" name="tpWater_rent"  value="1"<?php if ($result['tpwater'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Tenant pays water</span>
																		</label>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="tpCable_rent" id="tpCable_rent" value="1"<?php if ($result['tpcable'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Tenant pays cable</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="tpTrash_rent" class="ace" type="checkbox" name="tpTrash_rent"  value="1"<?php if ($result['tptrash'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Tenant pays trash</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="pets_rent" class="ace" type="checkbox" name="pets_rent"  value="1"<?php if ($result['pets'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Pets allowed</span>
																		</label>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="section8_rent" id="section8_rent" value="1"<?php if ($result['pets'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Section 8</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="fitness_rent" class="ace" type="checkbox" name="fitness_rent"  value="1"<?php if ($result['fitness'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Fitness center</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="spa_rent" class="ace" type="checkbox" name="spa_rent" value="1"<?php if ($result['spa'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Spa</span>
																		</label>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="sports_rent" id="sports_rent" value="1"<?php if ($result['sports'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Sports complex</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="tennis_rent" class="ace" type="checkbox" name="tennis_rent"  value="1"<?php if ($result['tennis'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Tennis</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="bikePath_rent" class="ace" type="checkbox" name="bikePath_rent"  value="1"<?php if ($result['bikePath'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Bike Path</span>
																		</label>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="boating_rent" id="boating_rent" value="1"<?php if ($result['boating'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Boating</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="courtyard_rent" class="ace" type="checkbox" name="courtyard_rent" value="1"<?php if ($result['courtyard'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Courtyard</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="playground_rent" class="ace" type="checkbox" name="playground_rent"  value="1"<?php if ($result['playground'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Playground</span>
																		</label>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="clubhouse_rent" id="clubhouse_rent" value="1"<?php if ($result['clubhouse'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Clubhouse</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="publicTrans_rent" class="ace" type="checkbox" name="publicTrans_rent"  value="1"<?php if ($result['publicTrans'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Public transportation</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="waterfront_rent" class="ace" type="checkbox" name="waterfront_rent"  value="1"<?php if ($result['waterfront'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Waterfront</span>
																		</label>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="golfCourse_rent" class="ace" type="checkbox" name="golfCourse_rent" value="1"<?php if ($result['golf'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Golf course</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="commPool_rent" id="commPool_rent"  value="1"<?php if ($result['commPool'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Community pool</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input class="ace" type="checkbox" name="lawnSprinklers_rent" id="lawnSprinklers_rent" value="1"<?php if ($result['lawnSprinklers'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> lawn sprinklers</span>
																		</label>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="fenced_rent" class="ace" type="checkbox" name="fenced_rent" value="1"<?php if ($result['fenced'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Fenced</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="pool_rent" id="pool_rent"  value="1"<?php if ($result['pool'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Private pool</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input class="ace" type="checkbox" name="associationFee_rent" id="associationFee_rent" value="1"<?php if ($result['assocFee'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Association fee</span>
																		</label>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="groundLease_rent" id="groundLease_rent"  value="1"<?php if ($result['groundLease'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Ground Lease</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="leaseOp_rent" id="leaseOp_rent"  value="1"<?php if ($result['leaseOp'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Lease Option</span>
																			</label>
																		</div>
																		<div class="col-xs-3 col-sm-1">
																			<label>Available:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="id-date-picker-3" class="col-xs-10 col-sm-6 date-picker" type="text" name="available_rent" data-date-format="yyyy-mm-dd" value="<?php echo $result['available'];?>">
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-4 col-sm-1">
																			<label>Building Size</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="sqFeet_rent" class="col-xs-10 col-sm-6" type="text" name="sqFeet_rent" value="<?php echo $result['sqFeet'];?>">
																			 ft.
																			<span class="super">2</span>
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Application fee</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="appFee_rent" class="col-xs-10 col-sm-6" type="text" name="appFee_rent" placeholder="$" value="<?php echo $result['appFee'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Security Deposit</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="deposit_rent" class="col-xs-10 col-sm-6" type="text" name="deposit_rent" placeholder="$" value="<?php echo $result['secdep'];?>">
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-3 col-sm-1">
																			<label>Lot Size:</label>
																		</div>
																		<div class="col-xs-5 col-sm-1">
																			<input id="lotSize_rent" class="col-xs-20 col-sm-10" type="text" name="lotSize_rent" value="<?php echo $result['lotsize'];?>">
																		</div>

																			<div class="col-xs-5 col-sm-2">
																			<select id="useAcreage_rent" class="col-xs-20 col-sm-10"  name="useAcreage_rent">
																					<option value="1">Acres</option>
																					<option selected="" value="0">Square Feet</option>
																			</select>
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Zoning:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="zoning_rent" class="col-xs-10 col-sm-6" type="text" name="zoning_rent" placeholder="" value="<?php echo $result['zoning'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Year Built</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="yearBuilt_rent" class="col-xs-10 col-sm-6" type="text" name="yearBuilt_rent" value="<?php echo $result['yearbuilt'];?>">
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>
																	<div class="row">
																	<div class="form-group">
																		<div class="col-xs-3 col-sm-1">
																			<label># of parking spaces</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="parkingSpaces_rent" class="col-xs-10 col-sm-6" type="text" name="parkingSpaces_rent" value="<?php echo $result['parkingSpaces'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Garage size:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="garageSize_rent" class="col-xs-10 col-sm-6"  name="garageSize_rent">
																				<option selected="" value=""></option>
																				<option value="1">1</option>
																				<option value="2">2</option>
																				<option value="3+">3+</option>
																			</select>
																		</div>

																</div>
																</div>
																<div class="space-4"></div>
																	<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">
																			<label>Pet Policy (if applicable)</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<textarea id="petPolicy_rent" class="form-control"  name="petPolicy_rent"><?php echo $result['petPolicy'];?></textarea>
																		</div>
																		</div>
																		</div>
															<div class="space-4"></div>
															<div class="widget-header widget-header-blue widget-header-flat">
																<h4 class="lighter">Ad Information</h4>
															</div>

															<div class="space-4"></div>
															<div class="space-4"></div>
																	<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">
																			<label>Title</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<textarea class="form-control"  name="title_rent" id="title_rent"><?php echo $result['title'];?></textarea>
																		</div>
																		</div>
																		</div>

															<div class="space-4"></div>
															<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">
																			<label>Description (500 character maximum) This is how people will find your property through our text searches. More content within your description means more chances your property will show up, so please use the space provided.</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<textarea id="description_rent" class="form-control"  name="description_rent"><?php echo $result['description'];?></textarea>
																		</div>
																		</div>
																		</div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">

																		</div>
																		<div class="col-xs-10 col-sm-2">
																			<input multiple="" type="file" id="id-input-file-resrent" name="filetoupload_rent[]"/>
																					<label>
																						<!-- <input type="checkbox" name="file-format" id="id-file-formatresrent" class="ace" /> -->
																						<!-- <span class="lbl"> Allow only images</span> -->
																					</label>
																		</div>

																	</div>
																</div>
														</div>
															<?php }
	?>
															 <?php } else if ($result['typeId'] == 57 || $result['typeId'] == 56 || $result['typeId'] == 67) {
	if ($result['forSale'] == 1) {
		?>
															<div id="com_sale_diff" style="display:block">
													<div class="row">
																<input type="hidden" name="id" value="<?php echo $result['resId'];?>">
																<div class="form-group">
																	<div class="col-xs-9 col-sm-3">
																		<label>Property Address: (Ex: 123 Main Street)</label>
																	</div>
																	<div class="col-xs-10 col-sm-4">
																		<input id="street1_diff" class="col-xs-15 col-sm-10" type="text" name="street1_diff" size="25" maxlength="50" value="<?php echo $result['address'];?>">
																	</div>
																	<div class="col-xs-6 col-sm-2">
																		<label>Elementary School: </label>
																	</div>
																	<div class="col-xs-8 col-sm-3">
																		<input id="elemSchool_diff" class="col-xs-10 col-sm-5" type="text" name="elemSchool_diff" size="25" maxlength="50" value="<?php echo $result['elemSchool'];?>">
																	</div>
																</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-9 col-sm-3">
																			<label>Property Address2:</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<input id="street2_diff" class="col-xs-15 col-sm-10" type="text" name="street2_diff" size="25" maxlength="50" value="<?php echo $result['address2'];?>">
																		</div>
																		<div class="col-xs-6 col-sm-2">
																			<label>Middile School: </label>
																		</div>
																		<div class="col-xs-8 col-sm-3">
																			<input id="midSchool_diff" class="col-xs-10 col-sm-5" type="text" name="midSchool_diff" size="25" maxlength="50" value="<?php echo $result['midSchool'];?>">
																		</div>
																	</div>
																</div>

																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-9 col-sm-3">
																			<label>Property City:</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<select class="col-xs-15 col-sm-10" id="city_diff" name="city_diff" value="<?php echo $result['city'];?>">
																				<option value="<?php echo $result['city'];?>" selected><?php echo $result['city'];?></option>

																			</select>
																		</div>
																		<div class="col-xs-6 col-sm-2">
																			<label>High School: : </label>
																		</div>
																		<div class="col-xs-8 col-sm-3">
																			<input id="highSchool_diff" class="col-xs-10 col-sm-5" type="text" name="highSchool_diff" size="25" maxlength="50" value="<?php echo $result['highSchool'];?>">
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-9 col-sm-3">
																			<label>Property State:</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<select class="col-xs-15 col-sm-10" id="state_diff" name="state_diff" value="<?php echo $result['state'];?>">
																				<option value="">&nbsp</option>
																			<?php
foreach ($state_val AS $key => $value) {
			echo "<option value='" . $key . "'>" . $value . "</option>";
		}
		?>
																			</select>
																		</div>

																	</div>
																</div>

																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-9 col-sm-3">
																			<label>Property Zip:</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<select class="col-xs-15 col-sm-10" id="zip_diff" name="zip_diff" value="<?php echo $result['zip'];?>">
																				<option value="<?php echo $result['zip'];?>" selected><?php echo $result['zip'];?></option>

																			</select>
																		</div>
																		<div class="col-xs-6 col-sm-2">
																			<label>Neighborhood Name:</label>
																		</div>
																		<div class="col-xs-8 col-sm-3">
																			<input id="neighborhood_diff" class="col-xs-10 col-sm-5" type="text" name="neighborhood_diff" size="25" maxlength="50" value="<?php echo $result['neighborhood'];?>">
																		</div>
																	</div>
																</div>
															<div class="space-4"></div>
															<div class="widget-header widget-header-blue widget-header-flat">
																<h4 class="lighter">Property Exterior Information</h4>
															</div>

															<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="waterfront_diff" id="waterfront_diff" value="1"<?php if ($result['waterfront'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Waterfront</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="golfCourse_diff"  value="1"<?php if ($result['golf'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Golf course</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input class="ace" type="checkbox" name="commPool_diff"  value="1"<?php if ($result['commPool'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Community pool</span>
																		</label>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">

																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="lawnSprinklers_diff"  value="1"<?php if ($result['lawnSprinklers'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Lawn sprinklers</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="laundry_diff"  value="1"<?php if ($result['onSiteLaundry'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> On-site laundry</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input class="ace" type="checkbox" name="gated_diff" value="1"<?php if ($result['gated'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl">Gated community</span>
																		</label>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-3 col-sm-1">
																			<label>Available:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="id-date-picker-6" class="col-xs-10 col-sm-6 date-picker" type="text" name="available_diff" data-date-format="yyyy-mm-dd" value="<?php echo $result['available'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Sale Status:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="status_diff" class="col-xs-10 col-sm-6"  name="status_diff">
																				<option selected="" value="Active">Active</option>
																				<option value="Incomplete">Incomplete</option>
																				<option value="Closed">Closed</option>
																				<option value="Contingent">Contingent</option>
																				<option value="Contingent Accepting Backup Offers">Contingent Accepting Backup Offers</option>
																				<option value="Expired">Expired</option>
																				<option value="Pending">Pending</option>
																				<option value="Pending Accepting Backup Offers">Pending Accepting Backup Offers</option>
																				<option value="Temporary Off Market">Temporary Off Market</option>
																				<option value="Withdrawn">Withdrawn</option>
																			</select>
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Price:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="price_diff" class="col-xs-10 col-sm-6" type="text" name="price_diff" placeholder="$" value="<?php echo $result['price'];?>">
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-3 col-sm-1">
																			<label>Number of units:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="numUnits_diff" class="col-xs-10 col-sm-6" type="text" name="numUnits_diff" value="<?php echo $result['numUnits'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Office email address</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="email_diff" class="col-xs-10 col-sm-6" type="text" name="email_diff" value="<?php echo $result['email'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Phone number</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="phone_diff" class="col-xs-10 col-sm-6" type="text" name="phone_diff" value="<?php echo $result['phone'];?>">
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-3 col-sm-1">
																			<label>Fax</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="fax_diff" class="col-xs-10 col-sm-6" type="text" name="fax_diff" value="<?php echo $result['fax'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Fair market value</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="fmv_diff" class="col-xs-10 col-sm-6" type="text" name="fmv_diff" placeholder="$" value="<?php echo $result['fmv'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>MLS#</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="mls_diff" class="col-xs-10 col-sm-6" type="text" name="mls_diff" value="<?php echo $result['mls'];?>">
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-3 col-sm-1">
																			<label>Net Operating Income:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="noi_diff" class="col-xs-10 col-sm-6" type="text" name="noi_diff" placeholder="$" value="<?php echo $result['noi'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Gross Operating Income:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="goi_diff" class="col-xs-10 col-sm-6" type="text" name="goi_diff" value="<?php echo $result['goi'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Occupancy Rate:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="occupancy_diff" class="col-xs-10 col-sm-6" type="text" name="occupancy_diff" placeholder="%" value="<?php echo $result['occupancy'];?>">
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-3 col-sm-1">
																			<label>Operating Expenses:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="opExpenses_diff" class="col-xs-10 col-sm-6" type="text" name="opExpenses_diff" maxlength="13" value="<?php echo $result['opExpenses'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Year built</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="yearBuilt_diff" class="col-xs-10 col-sm-6" type="text" name="yearBuilt_diff" maxlength="4" value="<?php echo $result['yearbuilt'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label># of parking spaces</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="parkingSpaces_diff" class="col-xs-10 col-sm-6" type="text" name="parkingSpaces_diff" maxlength="6" value="<?php echo $result['parkingSpaces'];?>">
																		</div>
																	</div>
																</div>
																	<div class="space-4"></div>
																	<div class="row">
																	<div class="form-group">
																		<div class="col-xs-4 col-sm-1">
																			<label>Garage size:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="garageSize_diff" class="col-xs-10 col-sm-6"  name="garageSize_diff">
																				<option selected="" value=""></option>
																				<option value="1">1</option>
																				<option value="2">2</option>
																				<option value="3+">3+</option>
																			</select>
																		</div>

																</div>
																</div>


															<div class="space-4"></div>
															<div class="widget-header widget-header-blue widget-header-flat">
																<h4 class="lighter">Ad Information</h4>
															</div>

															<div class="space-4"></div>
															<div class="space-4"></div>
																	<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">
																			<label>Title</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<textarea id="title_diff" class="form-control"  name="title_diff" maxlength="25"><?php echo $result['title'];?></textarea>
																		</div>
																		</div>
																		</div>

															<div class="space-4"></div>
															<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">
																			<label>Description (500 character maximum) This is how people will find your property through our text searches. More content within your description means more chances your property will show up, so please use the space provided.</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<textarea id="description_diff" class="form-control"  name="description_diff"><?php echo $result['description'];?></textarea>
																		</div>
																		</div>
																		</div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">

																		</div>
																		<div class="col-xs-10 col-sm-2">
																			<input multiple="" type="file" id="id-input-file-diff_sale" name="filetoupload_diff[]" />
																					<label>
																						<input type="checkbox" name="file-format" id="id-file-formatdiff_sale" class="ace" />
																						<!-- <span class="lbl"> Allow only images</span> -->
																					</label>
																		</div>

																	</div>

														</div>
														</div>
														<?php } else {
		?>
														<div id="com_rent_diff" style="display:block">
															<div class="row">
																<input type="hidden" name="id" value="<?php echo $result['resId'];?>">
																<div class="form-group">
																	<div class="col-xs-9 col-sm-3">
																		<label>Property Address: (Ex: 123 Main Street)</label>
																	</div>
																	<div class="col-xs-10 col-sm-4">
																		<input id="street1_rent_diff" class="col-xs-15 col-sm-10" type="text" name="street1_rent_diff" size="25" maxlength="50" value="<?php echo $result['address'];?>">
																	</div>
																	<div class="col-xs-6 col-sm-2">
																		<label>Elementary School: </label>
																	</div>
																	<div class="col-xs-8 col-sm-3">
																		<input id="elemSchool_rent_diff" class="col-xs-10 col-sm-5" type="text" name="elemSchool_rent_diff" size="25" maxlength="50" value="<?php echo $result['elemSchool'];?>">
																	</div>
																</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-9 col-sm-3">
																			<label>Property Address2:</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<input id="street2_rent_diff" class="col-xs-15 col-sm-10" type="text" name="street2_rent_diff" size="25" maxlength="50"  value="<?php echo $result['address2'];?>">
																		</div>
																		<div class="col-xs-6 col-sm-2">
																			<label>Middile School: </label>
																		</div>
																		<div class="col-xs-8 col-sm-3">
																			<input id="midSchool_rent_diff" class="col-xs-10 col-sm-5" type="text" name="midSchool_rent_diff" size="25" maxlength="50" value="<?php echo $result['midSchool'];?>">
																		</div>
																	</div>
																</div>

																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-9 col-sm-3">
																			<label>Property City:</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<select class="col-xs-15 col-sm-10" id="city_rent_diff" name="city_rent_diff" value="<?php echo $result['city'];?>">
																				<option value="<?php echo $result['city'];?>" selected><?php echo $result['city'];?></option>

																			</select>
																		</div>
																		<div class="col-xs-6 col-sm-2">
																			<label>High School: : </label>
																		</div>
																		<div class="col-xs-8 col-sm-3">
																			<input id="highSchool_rent_diff" class="col-xs-10 col-sm-5" type="text" name="highSchool_rent_diff" size="25" maxlength="50" value="<?php echo $result['highSchool'];?>">
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-9 col-sm-3">
																			<label>Property State:</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<select class="col-xs-15 col-sm-10" id="state_rent_diff" name="state_rent_diff">
																				<option value="">&nbsp</option>
																			<?php
foreach ($state_val AS $key => $value) {
			echo "<option value='" . $key . "'>" . $value . "</option>";
		}
		?>
																			</select>
																		</div>

																	</div>
																</div>

																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-9 col-sm-3">
																			<label>Property Zip:</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<select class="col-xs-15 col-sm-10" id="zip_rent_diff" name="zip_rent_diff">
																				<option value="<?php echo $result['zip'];?>" selected><?php echo $result['zip'];?></option>

																			</select>
																		</div>
																		<div class="col-xs-6 col-sm-2">
																			<label>Neighborhood Name:</label>
																		</div>
																		<div class="col-xs-8 col-sm-3">
																			<input id="neighborhood_rent_diff" class="col-xs-10 col-sm-5" type="text" name="neighborhood_rent_diff" size="25" maxlength="50" alue="<?php echo $result['neighborhood'];?>">
																		</div>
																	</div>
																</div>
															<div class="space-4"></div>
															<div class="widget-header widget-header-blue widget-header-flat">
																<h4 class="lighter">Property Exterior Information</h4>
															</div>

															<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="tpGas_rent_diff" id="tpGas_rent_diff" value="1"<?php if ($result['tpgas'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Tenant pays gas</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="tpElectricity_rent_diff" class="ace" type="checkbox" name="tpElectricity_rent_diff"  value="1"<?php if ($result['tpelectricity'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Tenant pays electricity</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="tpWater_rent_diff" class="ace" type="checkbox" name="tpWater_rent_diff"  value="1"<?php if ($result['tpwater'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Tenant pays water</span>
																		</label>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="tpCable_rent_diff" id="tpCable_rent_diff" value="1"<?php if ($result['tpcable'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Tenant pays cable</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="tpTrash_rent_diff" class="ace" type="checkbox" name="tpTrash_rent_diff"  value="1"<?php if ($result['tptrash'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Tenant pays trash</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="pets_rent_diff" class="ace" type="checkbox" name="pets_rent_diff"  value="1"<?php if ($result['pets'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Pets allowed</span>
																		</label>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="section8_rent_diff" id="section8_rent_diff"  value="1"<?php if ($result['pets'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Section 8</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="fitness_rent_diff" class="ace" type="checkbox" name="fitness_rent_diff"  value="1"<?php if ($result['fitness'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Fitness center</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="spa_rent_diff" class="ace" type="checkbox" name="spa_rent_diff"  value="1"<?php if ($result['spa'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Spa</span>
																		</label>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="sports_rent_diff" id="sports_rent_diff" value="1"<?php if ($result['sports'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Sports complex</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="tennis_rent_diff" class="ace" type="checkbox" name="tennis_rent_diff"  value="1"<?php if ($result['tennis'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Tennis</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="bikePath_rent_diff" class="ace" type="checkbox" name="bikePath_rent_diff"  value="1"<?php if ($result['bikePath'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Bike Path</span>
																		</label>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="boating_rent_diff" id="boating_rent_diff" value="1"<?php if ($result['boating'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Boating</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="courtyard_rent_diff" class="ace" type="checkbox" name="courtyard_rent_diff"  value="1"<?php if ($result['courtyard'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Courtyard</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="playground_rent_diff" class="ace" type="checkbox" name="playground_rent_diff"   value="1"<?php if ($result['playground'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Playground</span>
																		</label>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="clubhouse_rent_diff" id="clubhouse_rent_diff"  value="1"<?php if ($result['clubhouse'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Clubhouse</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="publicTrans_rent_diff" class="ace" type="checkbox" name="publicTrans_rent_diff"  value="1"<?php if ($result['publicTrans'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Public transportation</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="waterfront_rent_diff" class="ace" type="checkbox" name="waterfront_rent_diff"  value="1"<?php if ($result['waterfront'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Waterfront</span>
																		</label>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="golfCourse_rent_diff" class="ace" type="checkbox" name="golfCourse_rent_diff" value="1"<?php if ($result['golf'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Golf course</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="commPool_rent_diff" id="commPool_rent_diff"  value="1"<?php if ($result['commPool'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Community pool</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input class="ace" type="checkbox" name="lawnSprinklers_rent_diff" id="lawnSprinklers_rent_diff"  value="1"<?php if ($result['lawnSprinklers'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> lawn sprinklers</span>
																		</label>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="fenced_rent_diff" class="ace" type="checkbox" name="fenced_rent_diff" value="1"<?php if ($result['fenced'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Fenced</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="laundry_rent_diff" id="laundry_rent_diff"   value="1"<?php if ($result['onSiteLaundry'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> On-site laundry</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input class="ace" type="checkbox" name="gated_rent_diff" id="gated_rent_diff" value="1"<?php if ($result['gated'] == 1) {echo 'checked';}
		?>>
																				<span class="lbl"> Gated community</span>
																		</label>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-3 col-sm-1">
																			<label>Available:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="id-date-picker-7" class="col-xs-10 col-sm-6 date-picker" type="text" name="available_rent_diff" data-date-format="yyyy-mm-dd" value="<?php echo $result['available'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Number of units:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="numUnits_rent_diff" class="col-xs-10 col-sm-6" type="text" name="numUnits_rent_diff" placeholder="" value="<?php echo $result['numUnits'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Apartment slogan</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="aptSlogan_rent_diff" class="col-xs-10 col-sm-6" type="text" name="aptSlogan_rent_diff" placeholder="" value="<?php echo $result['slogan'];?>">
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-4 col-sm-1">
																			<label>Office email address</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="email_rent_diff" class="col-xs-10 col-sm-6" type="text" name="email_rent_diff" value="<?php echo $result['email'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Phone number</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="phone_rent_diff" class="col-xs-10 col-sm-6" type="text" name="phone_rent_diff" placeholder=""  value="<?php echo $result['phone'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Fax</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="fax_rent_diff" class="col-xs-10 col-sm-6" type="text" name="fax_rent_diff" placeholder=""  value="<?php echo $result['fax'];?>">
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-4 col-sm-1">
																			<label>Application fee</label>
																		</div>
																		<div class="col-xs-5 col-sm-3">
																			<input id="appFee_rent_diff" class="col-xs-20 col-sm-6" type="text" name="appFee_rent_diff" placeholder="$"  value="<?php echo $result['appFee'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Security Deposite</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="deposit_rent_diff" class="col-xs-10 col-sm-6" type="text" name="deposit_rent_diff" placeholder="$" value="<?php echo $result['secdep'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Year Built</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="yearBuilt_rent_diff" class="col-xs-10 col-sm-6" type="text" name="yearBuilt_rent_diff" value="<?php echo $result['yearbuilt'];?>">
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>
																	<div class="row">
																	<div class="form-group">
																		<div class="col-xs-3 col-sm-1">
																			<label># of parking spaces</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="parkingSpaces_rent_diff" class="col-xs-10 col-sm-6" type="text" name="parkingSpaces_rent_diff" value="<?php echo $result['parkingSpaces'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Garage size:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="garageSize_rent_diff" class="col-xs-10 col-sm-6"  name="garageSize_rent_diff">
																				<option selected="" value=""></option>
																				<option value="1">1</option>
																				<option value="2">2</option>
																				<option value="3+">3+</option>
																			</select>
																		</div>

																</div>
																</div>

															<div class="space-4"></div>
															<div class="widget-header widget-header-blue widget-header-flat">
																<h4 class="lighter">Ad Information</h4>
															</div>

															<div class="space-4"></div>
															<div class="space-4"></div>
																	<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">
																			<label>Title</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<textarea class="form-control"  name="title_rent_diff" id="title_rent_diff"><?php echo $result['title'];?></textarea>
																		</div>
																		</div>
																		</div>

															<div class="space-4"></div>
															<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">
																			<label>Description (500 character maximum) This is how people will find your property through our text searches. More content within your description means more chances your property will show up, so please use the space provided.</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<textarea id="description_rent_diff" class="form-control"  name="description_rent_diff"><?php echo $result['title'];?></textarea>
																		</div>
																		</div>
																		</div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">

																		</div>
																		<div class="col-xs-10 col-sm-2">
																			<input multiple="" type="file" id="id-input-file-rent_diff" name="filetoupload_rent_diff[]" />
																			<label>
																				<!-- <input type="checkbox" name="file-format" id="id-file-formatrent_diff" class="ace" /> -->
																				<!-- <span class="lbl"> Allow only images</span> -->
																			</label>
																		</div>

																	</div>
																</div>
														</div>
														</div>

														<?php }
}
?>


														<div class="row">
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right"> </label>
																<div class="col-xs-5 col-sm-4">
																	<input class="btn btn-success" type="submit" Value="Save">
																</div>
															</div>

														</div>



													</form>


													</div>

												</div>

										</div>
								</div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

				<div class="ace-settings-container" id="ace-settings-container">
					<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
						<i class="icon-cog bigger-150"></i>
					</div>

					<div class="ace-settings-box" id="ace-settings-box">
						<div>
							<div class="pull-left">
								<select id="skin-colorpicker" class="hide">
									<option data-skin="default" value="#438EB9">#438EB9</option>
									<option data-skin="skin-1" value="#222A2D">#222A2D</option>
									<option data-skin="skin-2" value="#C6487E">#C6487E</option>
									<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
								</select>
							</div>
							<span>&nbsp; Choose Skin</span>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
							<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
							<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
							<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
							<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
							<label class="lbl" for="ace-settings-add-container">
								Inside
								<b>.container</b>
							</label>
						</div>
					</div>
				</div><!-- /#ace-settings-container -->
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url();?>assets1/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='<?php echo base_url();?>assets1/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url();?>assets1/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>assets1/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<script src="<?php echo base_url();?>assets1/js/fuelux/fuelux.wizard.min.js"></script>
		<script src="<?php echo base_url();?>assets1/js/jquery.validate.min.js"></script>
		<script src="<?php echo base_url();?>assets1/js/additional-methods.min.js"></script>
		<script src="<?php echo base_url();?>assets1/js/bootbox.min.js"></script>
		<script src="<?php echo base_url();?>assets1/js/jquery.maskedinput.min.js"></script>
		<script src="<?php echo base_url();?>assets1/js/select2.min.js"></script>
		<script src="<?php echo base_url();?>assets1/js/date-time/bootstrap-datepicker.min.js"></script>
		<!-- <script src="<?php echo base_url();?>assets1/js/dropzone.min.js"></script> -->
		<!-- ace scripts -->

		<script src="<?php echo base_url();?>assets1/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url();?>assets1/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
		$(function() {
		 var currentDate = new Date();
				$('.date-picker').datepicker({autoclose:true},{ dateFormat: 'yyyy-mm-dd'},{setdate : new Date()}).next().on(ace.click_event, function(){
					$(this).prev().focus();

				});
				$(".date-picker").datepicker("setDate", currentDate);
});
		$(document).ready(function(){

			var typ = $("#typ_id").val();
			//alert(typ);
			var for_sale = $("#for_sale").val();
			if(typ == 53 || typ== 55 || typ == 54 || typ ==60 || typ==63 || typ==62 || typ==61 || typ == 77 || typ ==76 || typ==78){
				if(for_sale == 1){
					$("#res_rent").hide();
					$("#com_sale_diff").hide();
					$("#com_rent_diff").hide();
					$("#res_sale").show();
					$("#status").val('<?php echo $result["status"];?>');
				/*	$("#useAcreage").val('<?php echo $result["useacreage"];?>');*/
					$("#garageSize").val('<?php echo $result["garagesize"];?>');
					$('#state').val('<?php echo $result["state"];?>');


				}else{
					$("#res_rent").show();
					$("#com_sale_diff").hide();
					$("#com_rent_diff").hide();
					$("#res_sale").hide();
					$("#garageSize_rent").val('<?php echo $result["garagesize"];?>');
					$('#state_rent').val('<?php echo $result["state"];?>');
				}
			}else {
				if(for_sale == 1){
					$("#res_rent").hide();
					$("#com_sale_diff").show();
					$("#com_rent_diff").hide();
					$("#res_sale").hide();
					$("#status_diff").val('<?php echo $result["status"];?>');
					$("#garageSize_diff").val('<?php echo $result["garagesize"];?>');
					$('#state_diff').val('<?php echo $result["state"];?>');

				}else{
					$("#res_rent").hide();
					$("#com_sale_diff").hide();
					$("#com_rent_diff").show();
					$("#res_sale").hide();
					$("#garageSize_rent_diff").val('<?php echo $result["garagesize"];?>');
					$('#state_rent_diff').val('<?php echo $result["state"];?>');
				}

			}
			//////////////////////////
			///
			///
				$('#state_diff').change(function(){
							var state_id = $('#state_diff').val();
							           	$.ajax({
									        type: 'POST',
									        url: "<?php echo base_url();?>admin/getStates",
									        cache: false,
									        data:'state_id='+state_id,
									        dataType: "json",
									        success: function(data) {
									        		if(data.success == "yes"){

									                    $('#city_diff').html(data.html);
									                    $('#city_diff').change();
									                } else {
									                	//alert('error');
									                }
									        }
									    });
				});

				 $('#city_diff').change(function(){
				 				var state_id = $('#state_diff').val();
								var city_id = $('#city_diff').val();
								           	$.ajax({
										        type: 'POST',
										        url: "<?php echo base_url();?>admin/getZip",
										        cache: false,
										        data:'city_id='+city_id+'&state_id='+state_id,
										        dataType: "json",
										        success: function(data) {
										        		if(data.success == "yes"){

										                    $('#zip_diff').html(data.html);

										                } else {
										                	//alert('error');
										                }
										        }
										    });
					});
				 ////////////////////////
				 $('#state_rent_diff').change(function(){
							var state_id = $('#state_rent_diff').val();
							           	$.ajax({
									        type: 'POST',
									        url: "<?php echo base_url();?>admin/getStates",
									        cache: false,
									        data:'state_id='+state_id,
									        dataType: "json",
									        success: function(data) {
									        		if(data.success == "yes"){

									                    $('#city_rent_diff').html(data.html);
									                    $('#city_rent_diff').change();
									                } else {
									                	//alert('error');
									                }
									        }
									    });
				});

				 $('#city_rent_diff').change(function(){
				 				var state_id = $('#state_rent_diff').val();
								var city_id = $('#city_rent_diff').val();
								           	$.ajax({
										        type: 'POST',
										        url: "<?php echo base_url();?>admin/getZip",
										        cache: false,
										        data:'city_id='+city_id+'&state_id='+state_id,
										        dataType: "json",
										        success: function(data) {
										        		if(data.success == "yes"){

										                    $('#zip_rent_diff').html(data.html);

										                } else {
										                	//alert('error');
										                }
										        }
										    });
					});
				  //////////////////////////////////////////////////////////////
				 $('#state').change(function(){
							var state_id = $('#state').val();
							           	$.ajax({
									        type: 'POST',
									        url: "<?php echo base_url();?>admin/getStates",
									        cache: false,
									        data:'state_id='+state_id,
									        dataType: "json",
									        success: function(data) {
									        		if(data.success == "yes"){

									                    $('#city').html(data.html);
									                    $('#city').change();
									                } else {
									                	//alert('error');
									                }
									        }
									    });
				});

				 $('#city').change(function(){
				 				var state_id = $('#state').val();
								var city_id = $('#city').val();
								           	$.ajax({
										        type: 'POST',
										        url: "<?php echo base_url();?>admin/getZip",
										        cache: false,
										        data:'city_id='+city_id+'&state_id='+state_id,
										        dataType: "json",
										        success: function(data) {
										        		if(data.success == "yes"){

										                    $('#zip').html(data.html);

										                } else {
										                	//alert('error');
										                }
										        }
										    });
					});
				   //////////////////////////////////////////////////////////////
				 $('#state_rent').change(function(){
							var state_id = $('#state_rent').val();
							           	$.ajax({
									        type: 'POST',
									        url: "<?php echo base_url();?>admin/getStates",
									        cache: false,
									        data:'state_id='+state_id,
									        dataType: "json",
									        success: function(data) {
									        		if(data.success == "yes"){

									                    $('#city_rent').html(data.html);
									                    $('#city_rent').change();
									                } else {
									                	//alert('error');
									                }
									        }
									    });
				});

				 $('#city_rent').change(function(){
				 				var state_id = $('#state_rent').val();
								var city_id = $('#city_rent').val();
								           	$.ajax({
										        type: 'POST',
										        url: "<?php echo base_url();?>admin/getZip",
										        cache: false,
										        data:'city_id='+city_id+'&state_id='+state_id,
										        dataType: "json",
										        success: function(data) {
										        		if(data.success == "yes"){

										                    $('#zip_rent').html(data.html);

										                } else {
										                	//alert('error');
										                }
										        }
										    });
					});
				$('#id-input-file-ressale').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'icon-picture',
					droppable:true,
					thumbnail:'fit'//large | fit
					//,icon_remove:null//set null, to hide remove/reset button
					/**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
					/**,before_remove : function() {
						return true;
					}*/
					,
					preview_error : function(filename, error_code) {
						//name of the file that failed
						//error_code values
						//1 = 'FILE_LOAD_FAILED',
						//2 = 'IMAGE_LOAD_FAILED',
						//3 = 'THUMBNAIL_FAILED'
						//alert(error_code);
					}

				}).on('change', function(){
					//console.log($(this).data('ace_input_files'));
					//console.log($(this).data('ace_input_method'));
				});

				$('#id-input-file-resrent').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'icon-picture',
					droppable:true,
					thumbnail:'fit'//large | fit
					//,icon_remove:null//set null, to hide remove/reset button
					/**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
					/**,before_remove : function() {
						return true;
					}*/
					,
					preview_error : function(filename, error_code) {
						//name of the file that failed
						//error_code values
						//1 = 'FILE_LOAD_FAILED',
						//2 = 'IMAGE_LOAD_FAILED',
						//3 = 'THUMBNAIL_FAILED'
						//alert(error_code);
					}

				}).on('change', function(){
					//console.log($(this).data('ace_input_files'));
					//console.log($(this).data('ace_input_method'));
				});

				$('#id-input-file-diff_sale').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'icon-picture',
					droppable:true,
					thumbnail:'fit'//large | fit
					//,icon_remove:null//set null, to hide remove/reset button
					/**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
					/**,before_remove : function() {
						return true;
					}*/
					,
					preview_error : function(filename, error_code) {
						//name of the file that failed
						//error_code values
						//1 = 'FILE_LOAD_FAILED',
						//2 = 'IMAGE_LOAD_FAILED',
						//3 = 'THUMBNAIL_FAILED'
						//alert(error_code);
					}

				}).on('change', function(){
					//console.log($(this).data('ace_input_files'));
					//console.log($(this).data('ace_input_method'));
				});

				$('#id-input-file-rent_diff').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'icon-picture',
					droppable:true,
					thumbnail:'fit'//large | fit
					//,icon_remove:null//set null, to hide remove/reset button
					/**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
					/**,before_remove : function() {
						return true;
					}*/
					,
					preview_error : function(filename, error_code) {
						//name of the file that failed
						//error_code values
						//1 = 'FILE_LOAD_FAILED',
						//2 = 'IMAGE_LOAD_FAILED',
						//3 = 'THUMBNAIL_FAILED'
						//alert(error_code);
					}

				}).on('change', function(){
					//console.log($(this).data('ace_input_files'));
					//console.log($(this).data('ace_input_method'));
				});
			});
		</script>
	</body>

<!-- Mirrored from 192.69.216.111/themes/preview/ace/blank.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 05 Oct 2013 16:13:16 GMT -->
</html>
