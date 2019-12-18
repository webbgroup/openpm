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
															<?php if ($result['forSale'] == 1) {
	?>

																<div id="com_sale_common" style="display:block">
															<div class="row">
																<input type="hidden" name="id" id="com_form" value="<?php echo $result['commId'];?>">
																<div class="form-group">
																	<div class="col-xs-9 col-sm-3">
																		<label>Property Address: (Ex: 123 Main Street)</label>
																	</div>
																	<div class="col-xs-10 col-sm-4">
																		<input id="street1_common" class="col-xs-15 col-sm-10" type="text" name="street1_common" size="25" maxlength="50" value="<?php echo $result['address'];?>">
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
																			<input id="street2_common" class="col-xs-15 col-sm-10" type="text" name="street2_common" size="25" maxlength="50" value="<?php echo $result['address2'];?>">
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
																			<select class="col-xs-15 col-sm-10" id="city_common" name="city_common">
																				<option value="<?php echo $result['city'];?>" selected><?php echo $result['city'];?></option>

																			</select>
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
																			<select class="col-xs-15 col-sm-10" id="state_common" name="state_common">

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
																			<select class="col-xs-15 col-sm-10" id="zip_common" name="zip_common">
																					<option value="<?php echo $result['zip'];?>" selected><?php echo $result['zip'];?></option>
																			</select>
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
																		<div class="col-xs-3 col-sm-1">
																			<label>Primary Property Type:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="typeId_common" class="col-xs-10 col-sm-6"  name="typeId_common" disabled>

																				<?php

	foreach ($option as $key => $val) {
		echo "<optgroup label='$key' style='font-weight:bold;font-size:10px;color:black;'>";
		foreach ($option[$key] as $val2) {

			echo "<option value=" . $val2['typeId'] . $selected . ">" . $val2['description'] . "</option>";

		}
		echo "</optgroup> ";
	}

	?>
																			</select>
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Additional Property Type:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																		<select id="typeId_common2" class="col-xs-10 col-sm-6"  name="typeId_common2">
																				<?php

	foreach ($option as $key => $val) {
		echo "<optgroup label='$key' style='font-weight:bold;font-size:10px;color:black;'>";
		foreach ($option[$key] as $val2) {
			$selected = ($val2['typeId2'] == $result['typeId2']) ? "selected" : "";
			echo "<option value=" . $val2['typeId'] . $selected . ">" . $val2['description'] . "</option>";

		}
		echo "</optgroup> ";
	}

	?>
																			</select>
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Additional Property Type:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="typeId_common3" class="col-xs-10 col-sm-6"  name="typeId_common3">
																				<?php
foreach ($option as $key => $val) {
		echo "<optgroup label='$key' style='font-weight:bold;font-size:10px;color:black;'>";
		foreach ($option[$key] as $val2) {
			echo "<option value=" . $val2['typeId'] . ">" . $val2['description'] . "</option>";

		}
		echo "</optgroup> ";
	}

	?>
																			</select>
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
																			<input id="id-date-picker-5" class="col-xs-10 col-sm-6 date-picker" type="text" name="available_common" data-date-format="yyyy-mm-dd" value="<?php echo $result['available'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Price:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="price_common" class="col-xs-10 col-sm-6" type="text" name="price_common" placeholder="$" maxlength="13" value="<?php echo $result['price'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Fair market value</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="fmv_common" class="col-xs-10 col-sm-6" type="text" name="fmv_common" maxlength="13" value="<?php echo $result['fmv'];?>">
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
																			<input id="mls_common" class="col-xs-10 col-sm-6" type="text" name="mls_common" maxlength="25" value="<?php echo $result['mls'];?>">
																		</div>

																		<div class="col-xs-4 col-sm-1">
																			<label>Sale Status:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="status_common" class="col-xs-10 col-sm-6"  name="status_common">
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
																			<label>Property taxes</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="tax_common" class="col-xs-10 col-sm-6" type="text" name="tax_common" placeholder="$" maxlength="6" value="<?php echo $result['tax'];?>">
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
																			<input id="noi_common" class="col-xs-10 col-sm-6" type="text" name="noi_common" placeholder="$" maxlength="15" value="<?php echo $result['noi'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Gross Operating Income:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="goi_common" class="col-xs-10 col-sm-6" type="text" name="goi_common" placeholder="$" maxlength="15" value="<?php echo $result['noi'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Occupancy Rate:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="occupancy_common" class="col-xs-10 col-sm-6" type="text" name="occupancy_common" placeholder="%" maxlength="5" value="<?php echo $result['occupancy'];?>">
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
																			<input id="opExpenses_common" class="col-xs-10 col-sm-6" type="text" name="opExpenses_common" placeholder="$" maxlength="13" value="<?php echo $result['opExpenses'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Facility Size:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="sqFeet_common" class="col-xs-10 col-sm-6" type="text" name="sqFeet_common" placeholder="$" maxlength="10" value="<?php echo $result['sqfeet'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Number of floors:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="numFloors_common" class="col-xs-10 col-sm-6" type="text" name="numFloors_common" placeholder="%" maxlength="2" value="<?php echo $result['numfloors'];?>">
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-3 col-sm-1">
																			<label>Traffic count:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="trafficCount_common" class="col-xs-10 col-sm-6" type="text" name="trafficCount_common" maxlength="6" value="<?php echo $result['trafficcount'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Year Built</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="yearBuilt_common" class="col-xs-10 col-sm-6" type="text" name="yearBuilt_common" maxlength="4" value="<?php echo $result['yearbuilt'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Parking ratio</label>
																		</div>
																		<div class="col-xs-10 col-sm-2">
																			<input id="parkingRatio_common" class="col-xs-10 col-sm-6" type="text" name="parkingRatio_common" maxlength="6" value="<?php echo $result['parkingratio'];?>">
																		</div>
																		<div class="col-xs-5 col-sm-1">
																			<label>Tspace(s) / 1,000 ft.</label><span class="super">2</span>
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
																			<input id="parkingSpaces_common" class="col-xs-10 col-sm-6" type="text" name="parkingSpaces_common" maxlength="6" value="<?php echo $result['parkingSpaces'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Number of units:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="numUnits_common" class="col-xs-10 col-sm-6" type="text" name="numUnits_common" maxlength="3" value="<?php echo $result['numUnits'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label># of dock high doors</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="dockDoors_common" class="col-xs-10 col-sm-6" type="text" name="dockDoors_common" value="<?php echo $result['dockDoors'];?>">
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">

																		<div class="col-xs-4 col-sm-1">
																			<label># of grade-level doors:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="gradeDoors_common" class="col-xs-10 col-sm-6" type="text" name="gradeDoors_common" maxlength="10" value="<?php echo $result['gradeDoors'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Property taxes</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="tax_common" class="col-xs-10 col-sm-6" type="text" name="tax_common" maxlength="6" value="<?php echo $result['tax'];?>">
																		</div>
																		<div class="col-xs-3 col-sm-1">
																			<label>Lot Size:</label>
																		</div>
																		<div class="col-xs-5 col-sm-1">
																			<input id="lotSize_common" class="col-xs-20 col-sm-10" type="text" name="lotSize_common" maxlength="10" value="<?php echo $result['lotsize'];?>">
																			</div>

																			<div class="col-xs-5 col-sm-2">
																			<select id="useAcreage_common" class="col-xs-20 col-sm-10"  name="useAcreage_common">
																					<option value="1">Acres</option>
																					<option selected="" value="0">Square Feet</option>
																			</select>
																		</div>
																	</div>
																</div>
																	<div class="space-4"></div>
																	<div class="row">
																	<div class="form-group">
																		<div class="col-xs-3 col-sm-1">
																			<label>Zoning</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="zoning_common" class="col-xs-10 col-sm-6" type="text" name="zoning_common" value="<?php echo $result['zoning'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Class type:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="class_common" class="col-xs-10 col-sm-6" name="class_common">
																				<option value=""></option>
																				<option value="A">A</option>
																				<option value="B">B</option>
																				<option value="C">C</option>
																			</select>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<label>
																				<input class="ace" type="checkbox" name="lawnSprinklers_common"  value="1"<?php if ($result['lawnSprinklers'] == 1) {echo 'checked';}
	?>>
																				<span class="lbl"> Lawn sprinklers</span>
																			</label>
																		</div>

																</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="courtyard_common"  value="1"<?php if ($result['courtyard'] == 1) {echo 'checked';}
	?>>
																				<span class="lbl">  Courtyard</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="fenced_common"  value="1"<?php if ($result['fenced'] == 1) {echo 'checked';}
	?>>
																				<span class="lbl"> Fenced</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																		<label>
																				<input class="ace" type="checkbox" name="cranes_common"  value="1"<?php if ($result['cranes'] == 1) {echo 'checked';}
	?>>
																				<span class="lbl"> Cranes</span>
																		</label>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="railYard_common"  value="1"<?php if ($result['rail'] == 1) {echo 'checked';}
	?>>
																				<span class="lbl"> Adjacent to railyard</span>
																			</label>
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
																			<textarea id="title_common" class="form-control"  name="title_common" maxlength="25"><?php echo $result['title'];?></textarea>
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
																			<textarea id="description_common" class="form-control"  name="description_common"><?php echo $result['description'];?></textarea>
																		</div>
																		</div>
																		</div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">

																		</div>
																		<div class="col-xs-10 col-sm-2">
																			<input multiple="" type="file" id="id-input-file-comsale" name="filetoupload_common[]" />


																		</div>

																	</div>
																</div>
														</div>


																<?php } else {
	?>


																<div id="com_rent_common" style="display:block">
																<div class="row">
																<input type="hidden" name="id" id="com_frm2" value="<?php echo $result['commId'];?>">
																<div class="form-group">
																	<div class="col-xs-9 col-sm-3">
																		<label>Property Address: (Ex: 123 Main Street) </label>
																	</div>
																	<div class="col-xs-10 col-sm-4">
																		<input id="street1_rent_common" class="col-xs-15 col-sm-10" type="text" name="street1_rent_common" size="25" maxlength="50" value="<?php echo $result['address'];?>">
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
																			<input id="street2_rent_common" class="col-xs-15 col-sm-10" type="text" name="street2_rent_common" size="25" maxlength="50" value="<?php echo $result['address2'];?>">
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
																			<select class="col-xs-15 col-sm-10" id="city_rent_common" name="city_rent_common">
																				<option value="<?php echo $result['city'];?>" selected><?php echo $result['city'];?></option>

																			</select>
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
																			<select class="col-xs-15 col-sm-10" id="state_rent_common" name="state_rent_common">
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
																			<select class="col-xs-15 col-sm-10" id="zip_rent_common" name="zip_rent_common">
																				<option value="<?php echo $result['zip'];?>" selected><?php echo $result['zip'];?></option>

																			</select>
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
																		<div class="col-xs-3 col-sm-1">
																			<label>Primary Property Type:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="typeId_rent_common" class="col-xs-10 col-sm-6"  name="typeId_rent_common" disabled>
																				<?php
foreach ($option as $key => $val) {
		echo "<optgroup label='$key' style='font-weight:bold;font-size:10px;color:black;'>";
		foreach ($option[$key] as $val2) {
			echo "<option value=" . $val2['typeId'] . ">" . $val2['description'] . "</option>";

		}
		echo "</optgroup> ";
	}

	?>
																			</select>
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Additional Property Type:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="typeId2_rent_common" class="col-xs-10 col-sm-6"  name="typeId2_rent_common">
																				<?php
foreach ($option as $key => $val) {
		echo "<optgroup label='$key' style='font-weight:bold;font-size:10px;color:black;'>";
		foreach ($option[$key] as $val2) {
			echo "<option value=" . $val2['typeId'] . ">" . $val2['description'] . "</option>";

		}
		echo "</optgroup> ";
	}

	?>
																			</select>
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Additional Property Type:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="typeId3_rent_common" class="col-xs-10 col-sm-6"  name="typeId3_rent_common">
																				<?php
foreach ($option as $key => $val) {
		echo "<optgroup label='$key' style='font-weight:bold;font-size:10px;color:black;'>";
		foreach ($option[$key] as $val2) {
			echo "<option value=" . $val2['typeId'] . ">" . $val2['description'] . "</option>";

		}
		echo "</optgroup> ";
	}

	?>
																			</select>
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
																			<input id="id-date-picker-6" class="col-xs-10 col-sm-6 date-picker" type="text" name="available_rent_common" data-date-format="yyyy-mm-dd" value="<?php echo $result['available'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Rent:</label>
																		</div>
																		<div class="col-xs-10 col-sm-1">
																			<input id="price_rent_common" class="col-xs-10 col-sm-10" type="text" name="price_rent_common" placeholder="$" maxlength="13" value="<?php echo $result['price'];?>">
																		</div>
																		<div class="col-xs-5 col-sm-2">
																		<select id="rentType_rent_common" class="col-xs-20 col-sm-10" name="rentType_rent_common">
																			<option value="$/SF/Month">$/SF/Month</option>
																			<option value="$/SF/Year">$/SF/Year</option>
																			<option value="$/Month">$/Month</option>
																			<option value="$/Year">$/Year</option>
																		</select>
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Lease Type:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="leaseType_rent_common" class="col-xs-10 col-sm-6"  name="leaseType_rent_common">
																				<option selected="" value=""></option>
																				<option value="NNN">NNN</option>
																				<option value="Full Service">Full Service</option>
																				<option value="Modified Gross">Modified Gross</option>
																				<option value="Modified Net">Modified Net</option>
																				<option value="Industrial Gross">Industrial Gross</option>
																				<option value="Other">Other</option>
																			</select>
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-3 col-sm-1">
																			<label>Lease term:</label>
																		</div>
																		<div class="col-xs-10 col-sm-1">
																			<input id="leaseTerm_rent_common" class="col-xs-10 col-sm10" type="text" name="leaseTerm_rent_common" placeholder="" maxlength="13" value="<?php echo $result['leaseTerm'];?>">
																		</div>
																		<div class="col-xs-5 col-sm-2">
																		<select id="leaseDuration_rent_common" class="col-xs-20 col-sm-10" name="leaseDuration_rent_common">
																			<option value="Day(s)">Day(s)</option>
																			<option value="Week(s)">Week(s)</option>
																			<option value="Month(s)">Month(s)</option>
																			<option value="Year(s)">Year(s)</option>
																		</select>
																		</div>

																		<div class="col-xs-4 col-sm-1">
																			<label>Procurement fee</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="procurementFee_rent_common" class="col-xs-10 col-sm10" type="text" name="procurementFee_rent_common" placeholder="$" maxlength="13" value="<?php echo $result['procurement'];?>">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Traffic count</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="trafficCount_rent_common" class="col-xs-10 col-sm-6" type="text" name="trafficCount_rent_common" placeholder="" maxlength="6" value="<?php echo $result['trafficcount'];?>">
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-3 col-sm-1">
																			<label>Property taxes:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="tax_rent_common" class="col-xs-10 col-sm-6" type="text" name="tax_rent_common" placeholder="$" maxlength="6" value="<?php echo $result['tax'];?>">
																		</div>
																		<div class="col-xs-3 col-sm-1">
																			<label>Lot Size:</label>
																		</div>
																		<div class="col-xs-5 col-sm-1">
																			<input id="lotSize_rent_common" class="col-xs-20 col-sm-10" type="text" name="lotSize_rent_common" maxlength="10" value="<?php echo $result['lotsize'];?>">
																		</div>

																			<div class="col-xs-5 col-sm-2">
																				<select id="useAcreage_rent_common" class="col-xs-20 col-sm-10"  name="useAcreage_rent_common">
																						<option value="1">Acres</option>
																						<option selected="" value="0">Square Feet</option>
																				</select>
																			</div>
																		<div class="col-xs-3 col-sm-1">
																			<label>Zoning</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="zoning_rent_common" class="col-xs-10 col-sm-6" type="text" name="zoning_rent_common" placeholder="" maxlength="15" value="<?php echo $result['zoning'];?>">
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
																			<input id="opExpenses_rent_common" class="col-xs-10 col-sm-6" type="text" name="opExpenses_rent_common" placeholder="$" maxlength="13" value="<?php echo $result['opExpenses'];?>">
																		</div>

																		<div class="col-xs-10 col-sm-3">
																			<label>
																				<input class="ace" type="checkbox" name="lawnSprinklers_rent_common"  value="1"<?php if ($result['lawnSprinklers'] == 1) {echo 'checked';}
	?>>
																				<span class="lbl"> Lawn sprinklers</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="courtyard_rent_common" value="1"<?php if ($result['courtyard'] == 1) {echo 'checked';}
	?>>
																				<span class="lbl">  Courtyard</span>
																			</label>
																		</div>

																</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">

																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="fenced_rent_common" value="1"<?php if ($result['fenced'] == 1) {echo 'checked';}
	?>>
																				<span class="lbl"> Fenced</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																		<label>
																				<input class="ace" type="checkbox" name="cranes_rent_common"  value="1"<?php if ($result['cranes'] == 1) {echo 'checked';}
	?>>
																				<span class="lbl"> Cranes</span>
																		</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="railYard_rent_common"  value="1"<?php if ($result['rail'] == 1) {echo 'checked';}
	?>>
																				<span class="lbl"> Adjacent to railyard</span>
																			</label>
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
																			<textarea id="title_rent_common" class="form-control"  name="title_rent_common" maxlength="25"><?php echo $result['title'];?></textarea>
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
																			<textarea id="description_rent_common" class="form-control"  name="description_rent_common"><?php echo $result['description'];?></textarea>
																		</div>
																		</div>
																		</div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">

																		</div>
																		<div class="col-xs-10 col-sm-2">
																			<input multiple="" type="file" id="id-input-file-com_rent" name="filetoupload_rent_common[]" />

																		</div>

																	</div>
																</div>
														</div>

														<?php }
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

		/*	var typ = $("#typ_id").val();
			alert(typ);*/
			var for_sale = $("#for_sale").val();

				if(for_sale == 1){
					 $('#id-input-file-comsale').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'icon-cloud-upload',
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


				//dynamically change allowed formats by changing before_change callback function
				$('#id-file-formatcomsale').removeAttr('checked').on('change', function() {
					var before_change
					var btn_choose
					var no_icon
					if(this.checked) {
						btn_choose = "Drop images here or click to choose";
						no_icon = "icon-picture";
						before_change = function(files, dropped) {
							var allowed_files = [];
							for(var i = 0 ; i < files.length; i++) {
								var file = files[i];
								if(typeof file === "string") {
									//IE8 and browsers that don't support File Object
									if(! (/\.(jpe?g|png|gif|bmp)$/i).test(file) ) return false;
								}
								else {
									var type = $.trim(file.type);
									if( ( type.length > 0 && ! (/^image\/(jpe?g|png|gif|bmp)$/i).test(type) )
											|| ( type.length == 0 && ! (/\.(jpe?g|png|gif|bmp)$/i).test(file.name) )//for android's default browser which gives an empty string for file.type
										) continue;//not an image so don't keep this file
								}

								allowed_files.push(file);
							}
							if(allowed_files.length == 0) return false;

							return allowed_files;
						}
					}
					else {
						btn_choose = "Drop files here or click to choose";
						no_icon = "icon-cloud-upload";
						before_change = function(files, dropped) {
							return files;
						}
					}
					var file_input = $('#id-input-file-comsale');
					file_input.ace_file_input('update_settings', {'before_change':before_change, 'btn_choose': btn_choose, 'no_icon':no_icon})
					file_input.ace_file_input('reset_input');
				});



				$("#typeId_common").val('<?php echo $result["typeId"];?>');
				$("#typeId_common2").val('<?php echo $result["typeId2"];?>');
				$("#typeId_common3").val('<?php echo $result["typeId3"];?>');
				$("#status_common").val('<?php echo $result["status"];?>');
				//$("#useAcreage_common").val('<?php echo $result["useacreage"];?>');
				$("#class_common").val('<?php echo $result["class"];?>');
				$('#state_common').val('<?php echo $result["state"];?>');
				/*$('#city_common').val('<?php echo $result["city"];?>');
				$('#zip_common').val('<?php echo $result["zip"];?>');*/
			}else{

				$("#typeId2_rent_common").val('<?php echo $result["typeId2"];?>');
				$("#typeId3_rent_common").val('<?php echo $result["typeId2"];?>');
				$("#rentType_rent_common").val('<?php echo $result["rentType"];?>');
				$("#leaseType_rent_common").val('<?php echo $result["leaseType"];?>');
				$("#leaseDuration_rent_common").val('<?php echo $result["leaseDuration"];?>');
				//$("#useAcreage_rent_common").val('<?php echo $result["useacreage"];?>');
				$('#state_rent_common').val('<?php echo $result["state"];?>');
				/*$('#city_rent_common').val('<?php echo $result["city"];?>');
				$('#zip_rent_common').val('<?php echo $result["zip"];?>');*/
			}//com_frm2com_frm_ty




			$('#state_common').change(function(){
							var state_id = $('#state_common').val();
							           	$.ajax({
									        type: 'POST',
									        url: "<?php echo base_url();?>admin/getStates",
									        cache: false,
									        data:'state_id='+state_id,
									        dataType: "json",
									        success: function(data) {
									        		if(data.success == "yes"){

									                    $('#city_common').html(data.html);
									                    $('#city_common').change();
									                } else {
									                	//alert('error');
									                }
									        }
									    });
				});

				 $('#city_common').change(function(){
				 				var state_id = $('#state_common').val();
								var city_id = $('#city_common').val();
								           	$.ajax({
										        type: 'POST',
										        url: "<?php echo base_url();?>admin/getZip",
										        cache: false,
										        data:'city_id='+city_id+'&state_id='+state_id,
										        dataType: "json",
										        success: function(data) {
										        		if(data.success == "yes"){

										                    $('#zip_common').html(data.html);

										                } else {
										                	//alert('error');
										                }
										        }
										    });
					});

				 $('#state_rent_common').change(function(){
							var state_id = $('#state_rent_common').val();
							           	$.ajax({
									        type: 'POST',
									        url: "<?php echo base_url();?>admin/getStates",
									        cache: false,
									        data:'state_id='+state_id,
									        dataType: "json",
									        success: function(data) {
									        		if(data.success == "yes"){

									                    $('#city_rent_common').html(data.html);
									                     $('#city_rent_common').change();

									                } else {
									                	//alert('error');
									                }
									        }
									    });
				});

				 $('#city_rent_common').change(function(){
				 				var state_id = $('#state_rent_common').val();
								var city_id = $('#city_rent_common').val();
								           	$.ajax({
										        type: 'POST',
										        url: "<?php echo base_url();?>admin/getZip",
										        cache: false,
										        data:'city_id='+city_id+'&state_id='+state_id,
										        dataType: "json",
										        success: function(data) {
										        		if(data.success == "yes"){

										                    $('#zip_rent_common').html(data.html);

										                } else {
										                	//alert('error');
										                }
										        }
										    });
					});
				  $('#id-input-file-comsale').ace_file_input({
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
				$('#id-input-file-com_rent').ace_file_input({
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
