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
								<a href="#">Dashboard</a>
							</li>
							<li class="active">Add Properties</li>
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
							<h1>
								Add Your Property
								<!-- <small>
									<i class="icon-double-angle-right"></i>
									and Validation
								</small> -->
							</h1>
						</div><!-- /.page-header -->
							<form class="form-horizontal" id="validation-form" method="post" action="<?php echo base_url();?>index.php/admin/addResProperty" enctype="multipart/form-data">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<!-- <h4 class="lighter">
									<i class="icon-hand-right icon-animated-hand-pointer blue"></i>
									<a href="#modal-wizard" data-toggle="modal" class="pink">Add your Property</a>
								</h4> -->

								<div class="hr hr-18 hr-double dotted"></div>

								<div class="row-fluid">
									<div class="span12">
										<div class="widget-box">
											<div class="widget-header widget-header-blue widget-header-flat">
												<h4 class="lighter"></h4>

												<!-- <div class="widget-toolbar">
													<label>
														<small class="green">
															<b>Validation</b>
														</small>

														<input id="skip-validation" type="checkbox" class="ace ace-switch ace-switch-4" />
														<span class="lbl"></span>
													</label>
												</div> -->
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div id="fuelux-wizard" class="row-fluid" data-target="#step-container">
														<ul class="wizard-steps">
															<li data-target="#step1" class="active" id="litop">
																<span class="step">1</span>
																<span class="title">Choose a Type of Property </span>
															</li>

															<li data-target="#step2" id="litop2">
																<span class="step">2</span>
																<span class="title">Property Information</span>
															</li>

															<li data-target="#step3" id="litop3">
																<span class="step">3</span>
																<span class="title">Interior Floor Plan</span>
															</li>

															<!-- <li data-target="#step4">
																<span class="step">4</span>
																<span class="title">Other Info</span>
															</li> -->
														</ul>
													</div>

													<hr />

													<div class="step-content row-fluid position-relative" id="step-container">
														<div class="step-pane active" id="step1">
															<h3 class="lighter block green">Choose a type of property</h3>


																<!-- <div class="form-group has-warning">
																	<label for="inputWarning" class="col-xs-12 col-sm-3 control-label no-padding-right"></label>

																	<div class="col-xs-12 col-sm-5">
																		<span class="block input-icon input-icon-right">
																			<input class="ace" type="radio" id="forSale" name="forSale">
																			<span class="lbl"> For Sale</span>
																			<input class="ace" id="forSale2" type="radio" name="forSale">
																			<span class="lbl"> For Rent / For Lease / Lease Option</span>

																		</span>
																	</div>


																</div> -->
																<div class="form-group">

																	<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> </label>
																		<div class="col-sm-9">
																			<input class="ace" type="radio" id="forSale" name="forSale" checked value="1">
																			<span class="lbl"> For Sale</span>
																			<input class="ace" id="forSale2" type="radio" name="forSale" value="2">
																			<span class="lbl"> For Rent / For Lease / Lease Option</span>
																		</div>
																</div>


																<div class="space-4"></div>
																<div class="form-group">
																	<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> </label>
																		<div class="col-sm-3">
																			<select class="form-control" id="typeId" name="typeId">

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
																<div class="space-4"></div>



														</div>

														<div class="step-pane" id="step2">

														<!-- Commercial for sale ---------- -->

															<div id="com_sale" style="display:block">
															<div id="com_sale_common" style="display:block">
															<div class="row">

																<div class="form-group">
																	<div class="col-xs-9 col-sm-3">
																		<label>Property Address: (Ex: 123 Main Street)*</label>
																	</div>
																	<div class="col-xs-10 col-sm-4">
																		<input id="street1_common" class="col-xs-15 col-sm-10" type="text" name="street1_common" size="25" maxlength="50" onfocusout="checkValidation();">
																		<p id="street1_common_err" style="color:red"></p>
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
																			<input id="street2_common" class="col-xs-15 col-sm-10" type="text" name="street2_common" size="25" maxlength="50">
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
																			<select class="col-xs-15 col-sm-10 state val" id="state_common" name="state_common">

																			<option value="">&nbsp</option>
																			<?php
foreach ($state_val AS $key => $value) {
	echo "<option value='" . $key . "'>" . $value . "</option>";
}
?>

																			</select>
																			<p id="state_common_err" style="color:red"></p>
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
																			<select class="col-xs-15 col-sm-10 city_val" id="city_common" name="city_common">
																				<option value="">&nbsp;</option>

																			</select>
																			<p id="city_common_err" style="color:red"></p>
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
																			<select class="col-xs-15 col-sm-10 zip_val" id="zip_common" name="zip_common">
																				<option value="">&nbsp;</option>


																			</select>
																			<p id="zip_common_err" style="color:red"></p>
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
																			<select id="typeId_common2" class="col-xs-10 col-sm-6"  name="typeId_common2">
																				<option value="">&nbsp;</option>
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
																			<select id="typeId_common3" class="col-xs-10 col-sm-6"  name="typeId_common3">
																				<option value="">&nbsp;</option>
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
																			<input id="id-date-picker-5" class="col-xs-10 col-sm-6 date-picker" type="text" name="available_common" data-date-format="yyyy-mm-dd">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Price:*</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="price_common" class="col-xs-10 col-sm-6 priceall" type="text" name="price_common" placeholder="$" maxlength="13">
																			<p id="price_err" style="color:red"></p>
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Fair market value</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="fmv_common" class="col-xs-10 col-sm-6" type="text" name="fmv_common" placeholder="$" maxlength="13">
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
																			<input id="mls_common" class="col-xs-10 col-sm-6" type="text" name="mls_common" maxlength="25">
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
																			<input id="tax_common" class="col-xs-10 col-sm-6" type="text" name="tax_common" placeholder="$" maxlength="6">
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
																			<input id="noi_common" class="col-xs-10 col-sm-6" type="text" name="noi_common" placeholder="$" maxlength="15">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Gross Operating Income:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="goi_common" class="col-xs-10 col-sm-6" type="text" name="goi_common" placeholder="$" maxlength="15">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Occupancy Rate:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="occupancy_common" class="col-xs-10 col-sm-6" type="text" name="occupancy_common" placeholder="%" maxlength="5">
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
																			<input id="opExpenses_common" class="col-xs-10 col-sm-6" type="text" name="opExpenses_common" placeholder="$" maxlength="13">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Facility Size:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="sqFeet_common" class="col-xs-10 col-sm-6" type="text" name="sqFeet_common"  maxlength="10">ft
																			<span class="super">2</span>
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Number of floors:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="numFloors_common" class="col-xs-10 col-sm-6" type="text" name="numFloors_common" maxlength="2">
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
																			<input id="trafficCount_common" class="col-xs-10 col-sm-6" type="text" name="trafficCount_common" maxlength="6">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Year Built</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="yearBuilt_common" class="col-xs-10 col-sm-6" type="text" name="yearBuilt_common" maxlength="4">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Parking ratio</label>
																		</div>
																		<div class="col-xs-10 col-sm-2">
																			<input id="parkingRatio_common" class="col-xs-10 col-sm-6" type="text" name="parkingRatio_common" maxlength="6">
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
																			<input id="parkingSpaces_common" class="col-xs-10 col-sm-6" type="text" name="parkingSpaces_common" maxlength="6">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Number of units:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="numUnits_common" class="col-xs-10 col-sm-6" type="text" name="numUnits_common" maxlength="3">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label># of dock high doors</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="dockDoors_common" class="col-xs-10 col-sm-6" type="text" name="dockDoors_common">
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
																			<input id="gradeDoors_common" class="col-xs-10 col-sm-6" type="text" name="gradeDoors_common" maxlength="10">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Property taxes</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="tax_common" class="col-xs-10 col-sm-6" type="text" name="tax_common" maxlength="6" placeholder="$">
																		</div>
																		<div class="col-xs-3 col-sm-1">
																			<label>Lot Size:*</label>
																		</div>
																		<div class="col-xs-5 col-sm-1">
																			<input id="lotSize_common" class="col-xs-20 col-sm-10" type="text" name="lotSize_common" maxlength="10">
																			</div>

																			<div class="col-xs-5 col-sm-2">
																			<select id="useAcreage_common" class="col-xs-20 col-sm-10"  name="useAcreage_common">
																					<option value="1">Acres</option>
																					<option selected="" value="0">Square Feet</option>
																			</select>
																			<p id="lotSize_common_err" style="color:red"></p>
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
																			<input id="zoning_common" class="col-xs-10 col-sm-6" type="text" name="zoning_common">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Class type:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="class_common" class="col-xs-10 col-sm-6" name="class_common">
																				<option selected="" value=""></option>
																				<option value="A">A</option>
																				<option value="B">B</option>
																				<option value="C">C</option>
																			</select>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<label>
																				<input class="ace" type="checkbox" name="lawnSprinklers_common"  value="1">
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
																				<input class="ace" type="checkbox" name="courtyard_common"  value="1">
																				<span class="lbl">  Courtyard</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="fenced_common"  value="1">
																				<span class="lbl"> Fenced</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																		<label>
																				<input class="ace" type="checkbox" name="cranes_common"  value="1">
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
																				<input class="ace" type="checkbox" name="railYard_common"  value="1">
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
																			<label>Title*</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<textarea id="title_common" class="form-control"  name="title_common" maxlength="25"></textarea>
																			<p id="title_common_err" style="color:red"></p>
																		</div>
																		</div>
																		</div>

															<div class="space-4"></div>
															<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">
																			<label>Description (500 character maximum) This is how people will find your property through our text searches. More content within your description means more chances your property will show up, so please use the space provided.<font color="red">*</font></label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<textarea id="description_common" class="form-control"  name="description_common"></textarea>
																			<p id="description_common_err" style="color:red"></p>
																		</div>
																		</div>
																		</div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">

																		</div>
																		<div class="col-xs-10 col-sm-2">
																			<!-- <input name="filetoupload_common[]" type="file"  id="filetoupload_common" class="multi with-preview" accept="gif|jpg|png|jpeg"  maxlength="3" multiple>
																			<img id="img_common" src="#" alt="" style="width:140px;height: 150px;display: none;" /> -->
																			<!-- <div class="testing" id="testing" style="width:200 px; height:300px;background-color:blue;"></div> -->
																			<!-- <div class="widget-body">
																				<div class="widget-main"> -->
																					<input multiple="" type="file" id="id-input-file-comsale" name="filetoupload_common[]" />
																					<label>
																						<input type="checkbox" name="file-format" id="id-file-formatcomsale" class="ace" />
																						<!-- <span class="lbl"> Allow only images</span> -->
																					</label>
																				<!-- </div>
																																							</div> -->
																		</div>

																	</div>
																</div>
														</div>
														<!--  Start Com Different div for values(57,56,67,77,76,78) -->
												<div id="com_sale_diff" style="display:none">
													<div class="row">

																<div class="form-group">
																	<div class="col-xs-9 col-sm-3">
																		<label>Property Address: (Ex: 123 Main Street)*</label>
																	</div>
																	<div class="col-xs-10 col-sm-4">
																		<input id="street1_diff" class="col-xs-15 col-sm-10" type="text" name="street1_diff" size="25" maxlength="50">
																		<p id="street1_diff_err" style="color:red"></p>

																	</div>
																	<div class="col-xs-6 col-sm-2">
																		<label>Elementary School: </label>
																	</div>
																	<div class="col-xs-8 col-sm-3">
																		<input id="elemSchool_diff" class="col-xs-10 col-sm-5" type="text" name="elemSchool_diff" size="25" maxlength="50">
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
																			<input id="street2_diff" class="col-xs-15 col-sm-10" type="text" name="street2_diff" size="25" maxlength="50">
																		</div>
																		<div class="col-xs-6 col-sm-2">
																			<label>Middile School: </label>
																		</div>
																		<div class="col-xs-8 col-sm-3">
																			<input id="midSchool_diff" class="col-xs-10 col-sm-5" type="text" name="midSchool_diff" size="25" maxlength="50">
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
																			<select class="col-xs-15 col-sm-10 state_val" id="state_diff" name="state_diff">
																				<option value="">&nbsp;</option>
																					<?php
foreach ($state_val AS $key => $value) {
	echo "<option value='" . $key . "'>" . $value . "</option>";
}
?>

																				?>

																			</select>
																			<p id="state_diff_err" style="color:red"></p>
																		</div>


																		<div class="col-xs-6 col-sm-2">
																			<label>High School: : </label>
																		</div>
																		<div class="col-xs-8 col-sm-3">
																			<input id="highSchool_diff" class="col-xs-10 col-sm-5" type="text" name="highSchool_diff" size="25" maxlength="50">
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
																			<select class="col-xs-15 col-sm-10 city_val" id="city_diff" name="city_diff">
																				<option value="">&nbsp;</option>

																			</select>
																			<p id="city_diff_err" style="color:red"></p>
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
																			<select class="col-xs-15 col-sm-10 zip_val" id="zip_diff" name="zip_diff">
																				<option value="">&nbsp;</option>


																			</select>
																			<p id="zip_diff_err" style="color:red"></p>
																		</div>
																		<div class="col-xs-6 col-sm-2">
																			<label>Neighborhood Name:</label>
																		</div>
																		<div class="col-xs-8 col-sm-3">
																			<input id="neighborhood_diff" class="col-xs-10 col-sm-5" type="text" name="neighborhood_diff" size="25" maxlength="50">
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
																				<input class="ace" type="checkbox" name="waterfront_diff" id="waterfront_diff" value="1">
																				<span class="lbl"> Waterfront</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="golfCourse_diff"  value="1">
																				<span class="lbl"> Golf course</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input class="ace" type="checkbox" name="commPool_diff"  value="1">
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
																				<input class="ace" type="checkbox" name="lawnSprinklers_diff"  value="1">
																				<span class="lbl"> Lawn sprinklers</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="laundry_diff"  value="1">
																				<span class="lbl"> On-site laundry</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input class="ace" type="checkbox" name="gated_diff"  value="1">
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
																			<input id="id-date-picker-6" class="col-xs-10 col-sm-6 date-picker" type="text" name="available_diff" data-date-format="yyyy-mm-dd">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Sale Status:*</label>
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
																			<p id="status_diff_err" style="color:red"></p>
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Price:*</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="price_diff" class="col-xs-10 col-sm-6 priceall" type="text" name="price_diff" placeholder="$">
																			<p id="price_diff_err" style="color:red"></p>
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
																			<input id="numUnits_diff" class="col-xs-10 col-sm-6" type="text" name="numUnits_diff">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Office email address</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="email_diff" class="col-xs-10 col-sm-6" type="text" name="email_diff" >
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Phone number</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="phone_diff" class="col-xs-10 col-sm-6" type="text" name="phone_diff">
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
																			<input id="fax_diff" class="col-xs-10 col-sm-6" type="text" name="fax_diff">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Fair market value</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="fmv_diff" class="col-xs-10 col-sm-6" type="text" name="fmv_diff" placeholder="$">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>MLS#</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="mls_diff" class="col-xs-10 col-sm-6" type="text" name="mls_diff">
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
																			<input id="noi_diff" class="col-xs-10 col-sm-6" type="text" name="noi_diff" placeholder="$">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Gross Operating Income:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="goi_diff" class="col-xs-10 col-sm-6" type="text" name="goi_diff">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Occupancy Rate:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="occupancy_diff" class="col-xs-10 col-sm-6" type="text" name="occupancy_diff" placeholder="%">
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
																			<input id="opExpenses_diff" class="col-xs-10 col-sm-6" type="text" name="opExpenses_diff" maxlength="13">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Year built</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="yearBuilt_diff" class="col-xs-10 col-sm-6" type="text" name="yearBuilt_diff" maxlength="4">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label># of parking spaces</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="parkingSpaces_diff" class="col-xs-10 col-sm-6" type="text" name="parkingSpaces_diff" maxlength="6">
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
																			<label>Title*</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<textarea id="title_diff" class="form-control"  name="title_diff" maxlength="25"></textarea>
																			<p id="title_diff_err" style="color:red"></p>
																		</div>
																		</div>
																		</div>

															<div class="space-4"></div>
															<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">
																			<label>Description (500 character maximum) This is how people will find your property through our text searches. More content within your description means more chances your property will show up, so please use the space provided.*</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<textarea id="description_diff" class="form-control"  name="description_diff"></textarea>
																			<p id="description_diff_err" style="color:red"></p>
																		</div>
																		</div>
																		</div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">

																		</div>
																		<div class="col-xs-10 col-sm-2">
																			<!-- <input name="filetoupload_diff[]" type="file" id="filetoupload_diff" class="multi with-preview" accept="gif|jpg|png|jpeg"  maxlength="3" multiple/> -->
																			<!-- <img id="img_diff" src="#" alt="" style="width:140px;height: 150px;display: none;" /> -->
																			<!-- <div class="widget-body">
																				<div class="widget-main"> -->
																					<input multiple="" type="file" id="id-input-file-comsalediff" name="filetoupload_diff[]" />
																					<label>
																						<input type="checkbox" name="file-format" id="id-file-formatcomsalediff" class="ace" />
																						<!-- <span class="lbl"> Allow only images</span> -->
																					</label>
																				<!-- </div>
																			</div> -->
																		</div>

																	</div>

														</div>
														</div>

															<!--  End Differnt Div  ------------  -->
															</div>
														<!-- END commercial for Sale -->

														<!-- Commerecial rent-->

														<div id="com_rent" style="display:block">
															<div id="com_rent_common" style="display:block">
															<div class="row">

																<div class="form-group">
																	<div class="col-xs-9 col-sm-3">
																		<label>Property Address: (Ex: 123 Main Street)*</label>
																	</div>
																	<div class="col-xs-10 col-sm-4">
																		<input id="street1_rent_common" class="col-xs-15 col-sm-10" type="text" name="street1_rent_common" size="25" maxlength="50">
																		<p id="street1_rent_common_err" style="color:red"></p>
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
																			<input id="street2_rent_common" class="col-xs-15 col-sm-10" type="text" name="street2_rent_common" size="25" maxlength="50">
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
																			<select class="col-xs-15 col-sm-10 state_val" id="state_rent_common" name="state_rent_common">
																				<option value="">&nbsp;</option>
																					<?php
foreach ($state_val AS $key => $value) {
	echo "<option value='" . $key . "'>" . $value . "</option>";
}
?>

																				?>

																			</select>
																			<p id="state_rent_common_err" style="color:red"></p>
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
																			<select class="col-xs-15 col-sm-10 city_val" id="city_rent_common" name="city_rent_common">
																				<option value="">&nbsp;</option>

																			</select>
																			<p id="city_rent_common_err" style="color:red"></p>
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
																			<select class="col-xs-15 col-sm-10 zip_val" id="zip_rent_common" name="zip_rent_common">
																				<option value="">&nbsp;</option>


																			</select>
																			<p id="zip_rent_common_err" style="color:red"></p>
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
																			<option value="">&nbsp;</option>
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
																				<option value="">&nbsp;</option>
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
																			<input id="id-date-picker-6" class="col-xs-10 col-sm-6 date-picker" type="text" name="available_rent_common" data-date-format="yyyy-mm-dd">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Rent:*</label>
																		</div>
																		<div class="col-xs-10 col-sm-1">
																			<input id="price_rent_common" class="col-xs-10 col-sm-10 priceall" type="text" name="price_rent_common" placeholder="$" maxlength="13">
																			<p id="price_rent_common_err" style="color:red"></p>
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
																			<input id="leaseTerm_rent_common" class="col-xs-10 col-sm10" type="text" name="leaseTerm_rent_common" placeholder="" maxlength="13">
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
																			<input id="procurementFee_rent_common" class="col-xs-10 col-sm10" type="text" name="procurementFee_rent_common" placeholder="$" maxlength="13">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Traffic count</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="trafficCount_rent_common" class="col-xs-10 col-sm-6" type="text" name="trafficCount_rent_common" placeholder="" maxlength="6">
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
																			<input id="tax_rent_common" class="col-xs-10 col-sm-6" type="text" name="tax_rent_common" placeholder="$" maxlength="6">
																		</div>
																		<div class="col-xs-3 col-sm-1">
																			<label>Lot Size:*</label>
																		</div>
																		<div class="col-xs-5 col-sm-1">
																			<input id="lotSize_rent_common" class="col-xs-20 col-sm-10" type="text" name="lotSize_rent_common" maxlength="10">
																			<p id="lotSize_rent_common_err" style="color:red"></p>
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
																			<input id="zoning_rent_common" class="col-xs-10 col-sm-6" type="text" name="zoning_rent_common" placeholder="" maxlength="15">
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
																			<input id="opExpenses_rent_common" class="col-xs-10 col-sm-6" type="text" name="opExpenses_rent_common" placeholder="$" maxlength="13">
																		</div>

																		<div class="col-xs-10 col-sm-3">
																			<label>
																				<input class="ace" type="checkbox" name="lawnSprinklers_rent_common"  value="1">
																				<span class="lbl"> Lawn sprinklers</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="courtyard_rent_common"  value="1">
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
																				<input class="ace" type="checkbox" name="fenced_rent_common"  value="1">
																				<span class="lbl"> Fenced</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																		<label>
																				<input class="ace" type="checkbox" name="cranes_rent_common"  value="1">
																				<span class="lbl"> Cranes</span>
																		</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="railYard_rent_common"  value="1">
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
																			<label>Title*</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<textarea id="title_rent_common" class="form-control"  name="title_rent_common" maxlength="25"></textarea>
																			<p id="title_rent_common_err" style="color:red"></p>
																		</div>
																		</div>
																		</div>

															<div class="space-4"></div>
															<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">
																			<label>Description (500 character maximum) This is how people will find your property through our text searches. More content within your description means more chances your property will show up, so please use the space provided.*</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<textarea id="description_rent_common" class="form-control"  name="description_rent_common"></textarea>
																			<p id="description_rent_common_err" style="color:red"></p>
																		</div>
																		</div>
																		</div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">

																		</div>
																		<div class="col-xs-10 col-sm-2">
																			<!-- <input name="filetoupload_rent_common[]" type="file" id="file_com_rent"multiple/>
																			<output id="list_com_rent"></output> -->
																			<input multiple="" type="file" id="id-input-file-com_rent" name="filetoupload_rent_common[]" />
																			<label>
																				<input type="checkbox" name="file-format" id="id-file-formatcom_rent" class="ace" />
																				<!-- <span class="lbl"> Allow only images</span> -->
																			</label>

																		</div>

																	</div>
																</div>
														</div>
														<div id="com_rent_diff" style="display:none">
															<div class="row">

																<div class="form-group">
																	<div class="col-xs-9 col-sm-3">
																		<label>Property Address: (Ex: 123 Main Street)*</label>
																	</div>
																	<div class="col-xs-10 col-sm-4">
																		<input id="street1_rent_diff" class="col-xs-15 col-sm-10" type="text" name="street1_rent_diff" size="25" maxlength="50">
																		<p id="street1_rent_diff_err" style="color:red"></p>
																	</div>
																	<div class="col-xs-6 col-sm-2">
																		<label>Elementary School: </label>
																	</div>
																	<div class="col-xs-8 col-sm-3">
																		<input id="elemSchool_rent_diff" class="col-xs-10 col-sm-5" type="text" name="elemSchool_rent_diff" size="25" maxlength="50">
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
																			<input id="street2_rent_diff" class="col-xs-15 col-sm-10" type="text" name="street2_rent_diff" size="25" maxlength="50">
																		</div>
																		<div class="col-xs-6 col-sm-2">
																			<label>Middile School: </label>
																		</div>
																		<div class="col-xs-8 col-sm-3">
																			<input id="midSchool_rent_diff" class="col-xs-10 col-sm-5" type="text" name="midSchool_rent_diff" size="25" maxlength="50">
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
																			<select class="col-xs-15 col-sm-10 state_val" id="state_rent_diff" name="state_rent_diff">
																				<option value="">&nbsp;</option>
																					<?php foreach ($state_val AS $key => $value) {
	echo "<option value='" . $key . "'>" . $value . "</option>";
}
?>

																			</select>
																			<p id="state_rent_diff_err" style="color:red"></p>
																		</div>

																		<div class="col-xs-6 col-sm-2">
																			<label>High School: : </label>
																		</div>
																		<div class="col-xs-8 col-sm-3">
																			<input id="highSchool_rent_diff" class="col-xs-10 col-sm-5" type="text" name="highSchool_rent_diff" size="25" maxlength="50">
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
																			<select class="col-xs-15 col-sm-10 city_val" id="city_rent_diff" name="city_rent_diff">
																				<option value="">&nbsp;</option>

																			</select>
																			<p id="city_rent_diff_err" style="color:red"></p>
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
																			<select class="col-xs-15 col-sm-10 zip_val" id="zip_rent_diff" name="zip_rent_diff">
																				<option value="">&nbsp;</option>


																			</select>
																			<p id="zip_rent_diff_err" style="color:red"></p>
																		</div>
																		<div class="col-xs-6 col-sm-2">
																			<label>Neighborhood Name:</label>
																		</div>
																		<div class="col-xs-8 col-sm-3">
																			<input id="neighborhood_rent_diff" class="col-xs-10 col-sm-5" type="text" name="neighborhood_rent_diff" size="25" maxlength="50">
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
																				<input class="ace" type="checkbox" name="tpGas_rent_diff" id="tpGas_rent_diff" value="1">
																				<span class="lbl"> Tenant pays gas</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="tpElectricity_rent_diff" class="ace" type="checkbox" name="tpElectricity_rent_diff"  value="1">
																				<span class="lbl"> Tenant pays electricity</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="tpWater_rent_diff" class="ace" type="checkbox" name="tpWater_rent_diff"  value="1">
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
																				<input class="ace" type="checkbox" name="tpCable_rent_diff" id="tpCable_rent_diff" value="1">
																				<span class="lbl"> Tenant pays cable</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="tpTrash_rent_diff" class="ace" type="checkbox" name="tpTrash_rent_diff"  value="1">
																				<span class="lbl"> Tenant pays trash</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="pets_rent_diff" class="ace" type="checkbox" name="pets_rent_diff"  value="1">
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
																				<input class="ace" type="checkbox" name="section8_rent_diff" id="section8_rent_diff" value="1">
																				<span class="lbl"> Section 8</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="fitness_rent_diff" class="ace" type="checkbox" name="fitness_rent_diff"  value="1">
																				<span class="lbl"> Fitness center</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="spa_rent_diff" class="ace" type="checkbox" name="spa_rent_diff"  value="1">
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
																				<input class="ace" type="checkbox" name="sports_rent_diff" id="sports_rent_diff" value="1">
																				<span class="lbl"> Sports complex</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="tennis_rent_diff" class="ace" type="checkbox" name="tennis_rent_diff"  value="1">
																				<span class="lbl"> Tennis</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="bikePath_rent_diff" class="ace" type="checkbox" name="bikePath_rent_diff"  value="1">
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
																				<input class="ace" type="checkbox" name="boating_rent_diff" id="boating_rent_diff" value="1">
																				<span class="lbl"> Boating</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="courtyard_rent_diff" class="ace" type="checkbox" name="courtyard_rent_diff"  value="1">
																				<span class="lbl"> Courtyard</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="playground_rent_diff" class="ace" type="checkbox" name="playground_rent_diff"  value="1">
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
																				<input class="ace" type="checkbox" name="clubhouse_rent_diff" id="clubhouse_rent_diff" value="1">
																				<span class="lbl"> Clubhouse</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="publicTrans_rent_diff" class="ace" type="checkbox" name="publicTrans_rent_diff"  value="1">
																				<span class="lbl"> Public transportation</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="waterfront_rent_diff" class="ace" type="checkbox" name="waterfront_rent_diff"  value="1">
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
																				<input id="golfCourse_rent_diff" class="ace" type="checkbox" name="golfCourse_rent_diff" value="1">
																				<span class="lbl"> Golf course</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="commPool_rent_diff" id="commPool_rent_diff"  value="1">
																				<span class="lbl"> Community pool</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input class="ace" type="checkbox" name="lawnSprinklers_rent_diff" id="lawnSprinklers_rent_diff" value="1">
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
																				<input id="fenced_rent_diff" class="ace" type="checkbox" name="fenced_rent_diff" value="1">
																				<span class="lbl"> Fenced</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="laundry_rent_diff" id="laundry_rent_diff"  value="1">
																				<span class="lbl"> On-site laundry</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input class="ace" type="checkbox" name="gated_rent_diff" id="gated_rent_diff" value="1">
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
																			<input id="id-date-picker-7" class="col-xs-10 col-sm-6 date-picker" type="text" name="available_rent_diff" data-date-format="yyyy-mm-dd">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Number of units:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="numUnits_rent_diff" class="col-xs-10 col-sm-6" type="text" name="numUnits_rent_diff" placeholder="">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Apartment slogan</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="aptSlogan_rent_diff" class="col-xs-10 col-sm-6" type="text" name="aptSlogan_rent_diff" placeholder="">
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
																			<input id="email_rent_diff" class="col-xs-10 col-sm-6" type="text" name="email_rent_diff">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Phone number</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="phone_rent_diff" class="col-xs-10 col-sm-6" type="text" name="phone_rent_diff" placeholder="">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Fax</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="fax_rent_diff" class="col-xs-10 col-sm-6" type="text" name="fax_rent_diff" placeholder="">
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
																			<input id="appFee_rent_diff" class="col-xs-20 col-sm-6" type="text" name="appFee_rent_diff" placeholder="$">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Security Deposite</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="deposit_rent_diff" class="col-xs-10 col-sm-6" type="text" name="deposit_rent_diff" placeholder="$">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Year Built</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="yearBuilt_rent_diff" class="col-xs-10 col-sm-6" type="text" name="yearBuilt_rent_diff">
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
																			<input id="parkingSpaces_rent_diff" class="col-xs-10 col-sm-6" type="text" name="parkingSpaces_rent_diff">
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
																			<label>Title*</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<textarea class="form-control"  name="title_rent_diff" id="title_rent_diff"></textarea>
																			<p id="title_rent_diff_err" style="color:red"></p>
																		</div>
																		</div>
																		</div>

															<div class="space-4"></div>
															<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">
																			<label>Description (500 character maximum) This is how people will find your property through our text searches. More content within your description means more chances your property will show up, so please use the space provided.*</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<textarea id="description_rent_diff" class="form-control"  name="description_rent_diff"></textarea>
																			<p id="description_rent_diff_err" style="color:red"></p>
																		</div>
																		</div>
																		</div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">

																		</div>
																		<div class="col-xs-10 col-sm-2">
																			<!-- <input name="filetoupload_rent_diff[]" type="file" id="filetoupload_rent_diff" class="multi with-preview" accept="gif|jpg|png|jpeg"  maxlength="3" multiple/>
																			<img id="img_rent_diff" src="#" alt="" style="width:140px;height: 150px;display: none;" /> -->
																			<input multiple="" type="file" id="id-input-file-rent_diff" name="filetoupload_rent_diff[]" />
																			<label>
																				<input type="checkbox" name="file-format" id="id-file-formatrent_diff" class="ace" />
																				<!-- <span class="lbl"> Allow only images</span> -->
																			</label>
																		</div>

																	</div>
																</div>
														</div>
														</div>

														<!-- END com com_rent -->


															<div id="res_sale" style="display:none">
															<div class="row">

																<div class="form-group">
																	<div class="col-xs-9 col-sm-3">
																		<label>Property Address: (Ex: 123 Main Street)*</label>
																	</div>
																	<div class="col-xs-10 col-sm-4">
																		<input id="street1" class="col-xs-15 col-sm-10" type="text" name="street1" size="25" maxlength="50">
																		<p id="street1_err" style="color:red"></p>
																	</div>
																	<div class="col-xs-6 col-sm-2">
																		<label>Elementary School: </label>
																	</div>
																	<div class="col-xs-8 col-sm-3">
																		<input id="elemSchool" class="col-xs-10 col-sm-5" type="text" name="elemSchool" size="25" maxlength="50">
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
																			<input id="street2" class="col-xs-15 col-sm-10" type="text" name="street2" size="25" maxlength="50">
																		</div>
																		<div class="col-xs-6 col-sm-2">
																			<label>Middile School: </label>
																		</div>
																		<div class="col-xs-8 col-sm-3">
																			<input id="midSchool" class="col-xs-10 col-sm-5" type="text" name="midSchool" size="25" maxlength="50">
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
																			<select class="col-xs-15 col-sm-10 state_val" id="state" name="state">
																				<option value="">&nbsp;</option>
																					<?php
foreach ($state_val AS $key => $value) {
	echo "<option value='" . $key . "'>" . $value . "</option>";
}
?>

																				?>

																			</select>
																			<p id="state_err" style="color:red"></p>
																		</div>

																		<div class="col-xs-6 col-sm-2">
																			<label>High School: : </label>
																		</div>
																		<div class="col-xs-8 col-sm-3">
																			<input id="highSchool" class="col-xs-10 col-sm-5" type="text" name="highSchool" size="25" maxlength="50">
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
																			<select class="col-xs-15 col-sm-10 city_val" id="city" name="city">
																				<option value="">&nbsp;</option>

																			</select>
																			<p id="city_err" style="color:red"></p>
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
																			<select class="col-xs-15 col-sm-10 zip_val" id="zip" name="zip">
																				<option value="">&nbsp;</option>

																			</select>
																			<p id="zip_err" style="color:red"></p>
																		</div>
																		<div class="col-xs-6 col-sm-2">
																			<label>Neighborhood Name:</label>
																		</div>
																		<div class="col-xs-8 col-sm-3">
																			<input id="neighborhood" class="col-xs-10 col-sm-5" type="text" name="neighborhood" size="25" maxlength="50">
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
																				<input class="ace" type="checkbox" name="waterfront" id="waterfront" value="1">
																				<span class="lbl"> Waterfront</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="golfCourse"  value="1">
																				<span class="lbl"> Golf course</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input class="ace" type="checkbox" name="commPool"  value="1">
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
																				<input class="ace" type="checkbox" name="pool"  value="1">
																				<span class="lbl"> Private pool</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="lawnSprinklers"  value="1">
																				<span class="lbl"> Lawn sprinklers</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input class="ace" type="checkbox" name="associationFee"  value="1">
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
																			<input id="id-date-picker-1" class="col-xs-10 col-sm-6 date-picker" type="text" name="available" data-date-format="yyyy-mm-dd">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Price:*</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="price" class="col-xs-10 col-sm-6 priceall" type="text" name="price" placeholder="$">
																			<p id="price_errs" style="color:red"></p>
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Fair market value</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="fmv" class="col-xs-10 col-sm-6" type="text" name="fmv">
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
																			<input id="mls" class="col-xs-10 col-sm-6" type="text" name="mls">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Property taxes</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="tax" class="col-xs-10 col-sm-6" type="text" name="tax" placeholder="$">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Sale Status:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="status" class="col-xs-10 col-sm-6"  name="status">
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
																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-3 col-sm-1">
																			<label>Lot Size:*</label>
																		</div>
																		<div class="col-xs-5 col-sm-1">
																			<input id="lotSize" class="col-xs-20 col-sm-10" type="text" name="lotSize">
																			<p id="lotSize_err" style="color:red"></p>
																			</div>

																			<div class="col-xs-5 col-sm-2">
																			<select id="useAcreage" class="col-xs-20 col-sm-10"  name="useAcreage">
																					<option value="1">Acres</option>
																					<option selected="" value="0">Square Feet</option>
																			</select>
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Zoning:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="zoning" class="col-xs-10 col-sm-6" type="text" name="zoning" placeholder="">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Year Built</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="yearBuilt" class="col-xs-10 col-sm-6" type="text" name="yearBuilt">
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
																			<input id="parkingSpaces" class="col-xs-10 col-sm-6" type="text" name="parkingSpaces">
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
																			<textarea id="financingDetails" class="form-control"  name="financingDetails"></textarea>
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
																			<label>Title*</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<textarea id="title" class="form-control"  name="title"></textarea>
																			<p id="title_err" style="color:red"></p>
																		</div>
																		</div>
																		</div>

															<div class="space-4"></div>
															<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">
																			<label>Description (500 character maximum) This is how people will find your property through our text searches. More content within your description means more chances your property will show up, so please use the space provided.*</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<textarea id="description_res" class="form-control"  name="description"></textarea>
																			<p id="description_res_err" style="color:red"></p>
																		</div>
																		</div>
																		</div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">

																		</div>
																		<div class="col-xs-10 col-sm-2">
																			<!-- <input name="filetoupload_sale[]" type="file"  id="filetoupload_sale" class="multi with-preview" accept="gif|jpg|png|jpeg"  maxlength="3" multiple/>
																			<img id="img_sale" src="#" alt="your image" style="width:140px;height: 150px;display: none;" /> -->

																			<!-- <div class="widget-body">
																				<div class="widget-main"> -->
																					<input multiple="" type="file" id="id-input-file-ressale" name="filetoupload_sale[]"/>
																					<label>
																						<input type="checkbox" name="file-format" id="id-file-formatressale" class="ace" />
																						<!-- <span class="lbl"> Allow only images</span> -->
																					</label>
																				<!-- </div>
																			</div> -->

																		</div>

																	</div>
																</div>
														</div>

						<!-- For Residential Rentform ----------------------- -->
									<div id="res_rent" style="display:none">
															<div class="row">

																<div class="form-group">
																	<div class="col-xs-9 col-sm-3">
																		<label>Property Address: (Ex: 123 Main Street) *</label>
																	</div>
																	<div class="col-xs-10 col-sm-4">
																		<input id="street1_rent" class="col-xs-15 col-sm-10" type="text" name="street1_rent" size="25" maxlength="50">
																		<p id="street1_rent_err" style="color:red"></p>
																	</div>
																	<div class="col-xs-6 col-sm-2">
																		<label>Elementary School: </label>
																	</div>
																	<div class="col-xs-8 col-sm-3">
																		<input id="elemSchool_rent" class="col-xs-10 col-sm-5" type="text" name="elemSchool_rent" size="25" maxlength="50">
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
																			<input id="street2_rent" class="col-xs-15 col-sm-10" type="text" name="street2_rent" size="25" maxlength="50">
																		</div>
																		<div class="col-xs-6 col-sm-2">
																			<label>Middile School: </label>
																		</div>
																		<div class="col-xs-8 col-sm-3">
																			<input id="midSchool_rent" class="col-xs-10 col-sm-5" type="text" name="midSchool_rent" size="25" maxlength="50">
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
																			<select class="col-xs-15 col-sm-10 state_val" id="state_rent" name="state_rent">
																				<option value="">&nbsp;</option>
																					<?php foreach ($state_val AS $key => $value) {
	echo "<option value='" . $key . "'>" . $value . "</option>";
}
?>

																			</select>
																			<p id="state_rent_err" style="color:red"></p>
																		</div>

																		<div class="col-xs-6 col-sm-2">
																			<label>High School: : </label>
																		</div>
																		<div class="col-xs-8 col-sm-3">
																			<input id="highSchool_rent" class="col-xs-10 col-sm-5" type="text" name="highSchool_rent" size="25" maxlength="50">
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
																			<select class="col-xs-15 col-sm-10 city_val" id="city_rent" name="city_rent">
																				<option value="">&nbsp;</option>

																			</select>
																			<p id="city_rent_err" style="color:red"></p>
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
																			<select class="col-xs-15 col-sm-10 zip_val" id="zip_rent" name="zip_rent">
																				<option value="">&nbsp;</option>

																			</select>
																			<p id="zip_rent_err" style="color:red"></p>
																		</div>
																		<div class="col-xs-6 col-sm-2">
																			<label>Neighborhood Name:</label>
																		</div>
																		<div class="col-xs-8 col-sm-3">
																			<input id="neighborhood_rent" class="col-xs-10 col-sm-5" type="text" name="neighborhood_rent" size="25" maxlength="50">
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
																				<input class="ace" type="checkbox" name="tpGas_rent" id="tpGas_rent" value="1">
																				<span class="lbl"> Tenant pays gas</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="tpElectricity_rent" class="ace" type="checkbox" name="tpElectricity_rent"  value="1">
																				<span class="lbl"> Tenant pays electricity</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="tpWater_rent" class="ace" type="checkbox" name="tpWater_rent"  value="1">
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
																				<input class="ace" type="checkbox" name="tpCable_rent" id="tpCable_rent" value="1">
																				<span class="lbl"> Tenant pays cable</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="tpTrash_rent" class="ace" type="checkbox" name="tpTrash_rent"  value="1">
																				<span class="lbl"> Tenant pays trash</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="pets_rent" class="ace" type="checkbox" name="pets_rent"  value="1">
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
																				<input class="ace" type="checkbox" name="section8_rent" id="section8_rent" value="1">
																				<span class="lbl"> Section 8</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="fitness_rent" class="ace" type="checkbox" name="fitness_rent"  value="1">
																				<span class="lbl"> Fitness center</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="spa_rent" class="ace" type="checkbox" name="spa_rent"  value="1">
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
																				<input class="ace" type="checkbox" name="sports_rent" id="sports_rent" value="1">
																				<span class="lbl"> Sports complex</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="tennis_rent" class="ace" type="checkbox" name="tennis_rent"  value="1">
																				<span class="lbl"> Tennis</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="bikePath_rent" class="ace" type="checkbox" name="bikePath_rent"  value="1">
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
																				<input class="ace" type="checkbox" name="boating_rent" id="boating_rent" value="1">
																				<span class="lbl"> Boating</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="courtyard_rent" class="ace" type="checkbox" name="courtyard_rent"  value="1">
																				<span class="lbl"> Courtyard</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="playground_rent" class="ace" type="checkbox" name="playground_rent"  value="1">
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
																				<input class="ace" type="checkbox" name="clubhouse_rent" id="clubhouse_rent" value="1">
																				<span class="lbl"> Clubhouse</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="publicTrans_rent" class="ace" type="checkbox" name="publicTrans_rent"  value="1">
																				<span class="lbl"> Public transportation</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="waterfront_rent" class="ace" type="checkbox" name="waterfront_rent"  value="1">
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
																				<input id="golfCourse_rent" class="ace" type="checkbox" name="golfCourse_rent" value="1">
																				<span class="lbl"> Golf course</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="commPool_rent" id="commPool_rent"  value="1">
																				<span class="lbl"> Community pool</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input class="ace" type="checkbox" name="lawnSprinklers_rent" id="lawnSprinklers_rent" value="1">
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
																				<input id="fenced_rent" class="ace" type="checkbox" name="fenced_rent" value="1">
																				<span class="lbl"> Fenced</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="pool_rent" id="pool_rent"  value="1">
																				<span class="lbl"> Private pool</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input class="ace" type="checkbox" name="associationFee_rent" id="associationFee_rent" value="1">
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
																				<input class="ace" type="checkbox" name="groundLease_rent" id="groundLease_rent"  value="1">
																				<span class="lbl"> Ground Lease</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="leaseOp_rent" id="leaseOp_rent"  value="1">
																				<span class="lbl"> Lease Option</span>
																			</label>
																		</div>
																		<div class="col-xs-3 col-sm-1">
																			<label>Available:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="id-date-picker-3" class="col-xs-10 col-sm-6 date-picker" type="text" name="available_rent" data-date-format="yyyy-mm-dd">
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
																			<input id="sqFeet_rent" class="col-xs-10 col-sm-6" type="text" name="sqFeet_rent">
																			 ft.
																			<span class="super">2</span>
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Application fee</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="appFee_rent" class="col-xs-10 col-sm-6" type="text" name="appFee_rent" placeholder="$">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Security Deposit</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="deposit_rent" class="col-xs-10 col-sm-6" type="text" name="deposit_rent" placeholder="$">
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
																			<input id="lotSize_rent" class="col-xs-20 col-sm-10" type="text" name="lotSize_rent">
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
																			<input id="zoning_rent" class="col-xs-10 col-sm-6" type="text" name="zoning_rent" placeholder="">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Year Built</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="yearBuilt_rent" class="col-xs-10 col-sm-6" type="text" name="yearBuilt_rent">
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
																			<input id="parkingSpaces_rent" class="col-xs-10 col-sm-6" type="text" name="parkingSpaces_rent">
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
																			<textarea id="petPolicy_rent" class="form-control"  name="petPolicy_rent"></textarea>
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
																			<label>Title*</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<textarea class="form-control"  name="title_rent" id="title_rent"></textarea>
																			<p id="title_rent_err" style="color:red"></p>
																		</div>
																		</div>
																		</div>

															<div class="space-4"></div>
															<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">
																			<label>Description (500 character maximum) This is how people will find your property through our text searches. More content within your description means more chances your property will show up, so please use the space provided.*</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<textarea id="description_rent" class="form-control"  name="description_rent"></textarea>
																			<p id="description_rent_err" style="color:red"></p>
																		</div>
																		</div>
																		</div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">

																		</div>
																		<div class="col-xs-10 col-sm-2">
																			<!-- <input name="filetoupload_rent[]" type="file" id="filetoupload_rent" class="multi with-preview" accept="gif|jpg|png|jpeg"  maxlength="3" multiple/>
																			<img id="img_rent" src="#" alt="your image" style="width:140px;height: 150px;display: none;" />
																			 -->
																			<!--  <div class="widget-body">
																																							<div class="widget-main"> -->
																					<input multiple="" type="file" id="id-input-file-resrent" name="filetoupload_rent[]"/>
																					<label>
																						<input type="checkbox" name="file-format" id="id-file-formatresrent" class="ace" />
																						<!-- <span class="lbl"> Allow only images</span> -->
																					</label>
																				<!-- </div>
																			</div> -->
																		</div>

																	</div>
																</div>
														</div>



						<!-- End -------------------------------------------- -->
														</div>



														<div class="step-pane" id="step3">

														<div id="sale_inte" style="display:block">

															<div class="row">

																<div class="form-group">
																	<div class="col-xs-9 col-sm-3">
																		<label>Floor Plan Title</label>
																	</div>
																	<div class="col-xs-10 col-sm-4">
																		<input id="intefloortitle" class="col-xs-15 col-sm-10" type="text" name="intefloortitle" size="25" maxlength="50" value="">
																	</div>
																	<div class="col-xs-6 col-sm-2">
																		<label>Type Of Interior</label>
																	</div>
																	<div class="col-xs-8 col-sm-3">
																		<select class="col-xs-15 col-sm-10" id="intetype" name="intetype">
																				<option disabled="" style="font-weight:bold;color:black;font-size:12px;" value="0">Apartments and Multifamily</option>
																				<option style="color:black;font-size:12px;" value="84">1 Bedroom</option>
																				<option style="color:black;font-size:12px;" value="85">2 Bedroom</option>
																				<option style="color:black;font-size:12px;" value="86">3 Bedroom</option>
																				<option style="color:black;font-size:12px;" value="87">4+ Bedroom</option>
																				<option style="color:black;font-size:12px;" value="88">Co-op</option>
																				<option style="color:black;font-size:12px;" value="83">Loft</option>
																				<option style="color:black;font-size:12px;" value="82">Studio</option>

																			</select>
																	</div>
																</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-5">
																			<label>Description (500 character maximum)
																			<br>
																			<strong>NOTE:</strong>
																			This is how people will find your property through our text searches. More content within your description means more chances your property will show up, so please use the space provided.*</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<textarea id="intedescription" class="form-control"  name="intedescription"></textarea>
																			<p id="intedescription_err" style="color:red"></p>
																		</div>
																		</div>
																</div>

																<div class="space-4"></div>
															<div class="widget-header widget-header-blue widget-header-flat">
																<h4 class="lighter">Interior Features</h4>
															</div>

															<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="intecarpeted" id="intecarpeted" value="1">
																				<span class="lbl"> Carpeted</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="intedisposal" class="ace" type="checkbox" name="intedisposal"  value="1">
																				<span class="lbl"> Garbage Disposal</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="integasStove" class="ace" type="checkbox" name="integasStove"  value="1">
																				<span class="lbl"> Gas Stove</span>
																		</label>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="intehardwood" id="intehardwood" value="1">
																				<span class="lbl"> Hardwood Floors</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="intepatio" class="ace" type="checkbox" name="intepatio"  value="1">
																				<span class="lbl"> Patio</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="intealarm" class="ace" type="checkbox" name="intealarm"  value="1">
																				<span class="lbl"> Alarm</span>
																		</label>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="intecable" id="intecable" value="1">
																				<span class="lbl"> Cable TV</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="intedishwasher" class="ace" type="checkbox" name="intedishwasher"  value="1">
																				<span class="lbl"> Dishwasher</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="intefireplace" class="ace" type="checkbox" name="intefireplace"  value="1">
																				<span class="lbl"> Fireplace</span>
																		</label>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="intebalcony" id="intebalcony" value="1">
																				<span class="lbl"> Balcony</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="intewheelchair" class="ace" type="checkbox" name="intewheelchair"  value="1">
																				<span id="" class="lbl"> Wheelchair access</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="intemicrowave" class="ace" type="checkbox" name="intemicrowave"  value="1">
																				<span class="lbl"> Microwave</span>
																		</label>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="interefrig" id="interefrig"  value="1">
																				<span class="lbl"> Refrigerator</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="intecentralAir" id="intecentralAir"  value="1">
																				<span class="lbl"> Central A/C</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="" class="ace" type="checkbox" name="intevaulted" id="intevaulted" value="1">
																				<span class="lbl">Vaulted ceiling</span>
																		</label>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="" class="ace" type="checkbox" name="inteinternet" id="inteinternet"  value="1">
																				<span class="lbl"> High Speed Internet</span>
																			</label>
																		</div>
																		<div class="col-xs-3 col-sm-1">
																			<label>Available:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="id-date-picker-2" class="col-xs-10 col-sm-6 date-picker" type="text" name="inteavailable" data-date-format="yyyy-mm-dd">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Approximate Floorplan Size*</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="intesqFeet" class="col-xs-10 col-sm-6" type="text" name="intesqFeet">
																			 ft.
																			<span class="super">2</span>
																			<p id="intesqFeet_err" style="color:red"></p>
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-3 col-sm-1">
																			<label>Bedrooms:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="intebeds" class="col-xs-10 col-sm-6"  name="intebeds">
																				<option value="1">1</option>
																				<option value="2">2</option>
																				<option value="3">3</option>
																				<option value="4">4</option>
																				<option value="5">5</option>
																				<option value="6">6</option>
																				<option value="7">7</option>
																				<option value="8">8</option>
																				<option value="9">9</option>
																				<option value="10+">10+</option>
																			</select>
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Bathrooms:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="intebaths" class="col-xs-10 col-sm-6"  name="intebaths">
																				<option value="1">1</option>
																				<option value="1.5">1.5</option>
																				<option value="2">2</option>
																				<option value="2.5">2.5</option>
																				<option value="3">3</option>
																				<option value="3.5">3.5</option>
																				<option value="4">4</option>
																				<option value="4.5">4.5</option>
																				<option value="5">5</option>
																				<option value="5.5">5.5</option>
																				<option value="6">6</option>
																				<option value="6.5">6.5</option>
																				<option value="7">7</option>
																				<option value="7.5">7.5</option>
																				<option value="8">8</option>
																				<option value="8.5">8.5</option>
																				<option value="9">9</option>
																				<option value="9.5">9.5</option>
																				<option value="10">10</option>
																				<option value="10+">10+</option>
																			</select>
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Number of floors:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="intenumFloors" class="col-xs-10 col-sm-6"  name="intenumFloors">
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
																		<div class="col-xs-3 col-sm-1">
																			<label>Heating:</label>
																		</div>
																		<div class="col-xs-5 col-sm-3">
																			<select id="inteheating" class="col-xs-10 col-sm-6"  name="inteheating">
																				<option value="Gas">Gas</option>
																				<option value="Oil">Oil</option>
																				<option value="Heat pump">Heat pump</option>
																			</select>
																			</div>
																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">

																		</div>
																		<div class="col-xs-10 col-sm-2">
																			<!-- <input name="filetoupload_sale_inte[]" type="file" id="files" multiple/>
																			<output id="list"></output> -->
																			<input multiple="" type="file" id="id-input-file-ressaleinte" name="filetoupload_sale_inte[]" />
																					<label>
																						<input type="checkbox" name="file-format" id="id-file-formatressaleinte" class="ace" />
																						<!-- <span class="lbl"> Allow only images</span> -->
																					</label>

																		</div>

																	</div>
																</div>
														</div>

												<!--  For Rent Interior form  ------------------  -->

														<div id="rent_inte" style="display:none">

															<div class="row">

																<div class="form-group">
																	<div class="col-xs-9 col-sm-3">
																		<label>Floor Plan Title</label>
																	</div>
																	<div class="col-xs-10 col-sm-4">
																		<input id="intefloortitle_rent" class="col-xs-15 col-sm-10" type="text" name="intefloortitle_rent" size="25" maxlength="50" value="">
																	</div>
																	<div class="col-xs-6 col-sm-2">
																		<label>Type Of Interior</label>
																	</div>
																	<div class="col-xs-8 col-sm-3">
																		<select class="col-xs-15 col-sm-10" id="intetype_rent" name="intetype_rent">
																				<option disabled="" style="font-weight:bold;color:black;font-size:12px;" value="0">Apartments and Multifamily</option>
																				<option style="color:black;font-size:12px;" value="84">1 Bedroom</option>
																				<option style="color:black;font-size:12px;" value="85">2 Bedroom</option>
																				<option style="color:black;font-size:12px;" value="86">3 Bedroom</option>
																				<option style="color:black;font-size:12px;" value="87">4+ Bedroom</option>
																				<option style="color:black;font-size:12px;" value="88">Co-op</option>
																				<option style="color:black;font-size:12px;" value="83">Loft</option>
																				<option style="color:black;font-size:12px;" value="82">Studio</option>

																			</select>
																	</div>
																</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-5">
																			<label>Description (500 character maximum)
																			<br>
																			<strong>NOTE:</strong>
																			This is how people will find your property through our text searches. More content within your description means more chances your property will show up, so please use the space provided.*</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<textarea id="intedescription_rent" class="form-control"  name="intedescription_rent"></textarea>
																			<p id="intedescription_rent_err" style="color:red"></p>
																		</div>
																		</div>
																</div>

																<div class="space-4"></div>
															<div class="widget-header widget-header-blue widget-header-flat">
																<h4 class="lighter">Interior Features</h4>
															</div>

															<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="wdIncluded_rent" id="wdIncluded_rent" value="1">
																				<span class="lbl"> W/D included</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="wdConnections_rent" class="ace" type="checkbox" name="wdConnections_rent"  value="1">
																				<span class="lbl"> W/D Connections</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="intecarpeted_rent" class="ace" type="checkbox" name="intecarpeted_rent"  value="1">
																				<span class="lbl"> Carpeted</span>
																		</label>
																		</div>

																	</div>
																</div>

															<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="intedisposal_rent" class="ace" type="checkbox" name="intedisposal_rent"  value="1">
																				<span class="lbl"> Garbage Disposal</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="integasStove_rent" class="ace" type="checkbox" name="integasStove_rent"  value="1">
																				<span class="lbl"> Gas Stove</span>
																		</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="intehardwood_rent" id="intehardwood_rent" value="1">
																				<span class="lbl"> Hardwood Floors</span>
																			</label>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">

																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="intepatio_rent" class="ace" type="checkbox" name="intepatio_rent"  value="1">
																				<span class="lbl"> Patio</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="intealarm_rent" class="ace" type="checkbox" name="intealarm_rent"  value="1">
																				<span class="lbl"> Alarm</span>
																		</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="intecable_rent" id="intecable_rent" value="1">
																				<span class="lbl"> Cable TV</span>
																			</label>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="intedishwasher_rent" class="ace" type="checkbox" name="intedishwasher_rent"  value="1">
																				<span class="lbl"> Dishwasher</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="intefireplace_rent" class="ace" type="checkbox" name="intefireplace_rent"  value="1">
																				<span class="lbl"> Fireplace</span>
																		</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="intebalcony_rent" id="intebalcony_rent" value="1">
																				<span class="lbl"> Balcony</span>
																			</label>
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">

																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="intewheelchair_rent" class="ace" type="checkbox" name="intewheelchair_rent"  value="1">
																				<span id="" class="lbl"> Wheelchair access</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="intemicrowave_rent" class="ace" type="checkbox" name="intemicrowave_rent"  value="1">
																				<span class="lbl"> Microwave</span>
																		</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="interefrig_rent" id="interefrig_rent"  value="1">
																				<span class="lbl"> Refrigerator</span>
																			</label>
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">

																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="intecentralAir_rent" id="intecentralAir_rent"  value="1">
																				<span class="lbl"> Central A/C</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input  class="ace" type="checkbox" name="intevaulted_rent" id="intevaulted_rent" value="1">
																				<span class="lbl">Vaulted ceiling</span>
																		</label>
																		</div>

																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input  class="ace" type="checkbox" name="inteinternet_rent" id="inteinternet_rent"  value="1">
																				<span class="lbl"> High Speed Internet</span>
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
																			<input id="id-date-picker-4" class="col-xs-10 col-sm-6 date-picker" type="text" name="inteavailable_rent" data-date-format="yyyy-mm-dd">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Approximate Floorplan Size*</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="intesqFeet_rent" class="col-xs-10 col-sm-6" type="text" name="intesqFeet_rent">
																			 ft.
																			<span class="super">2</span>
																			<p id="intesqFeet_rent_err" style="color:red"></p>
																		</div>
																		<div class="col-xs-3 col-sm-1">
																			<label>A/C window units</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="intewindowUnits_rent" class="col-xs-10 col-sm-6" type="text" name="intewindowUnits_rent">
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-3 col-sm-1">
																			<label>Security Deposit</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="intedeposit_rent" class="col-xs-10 col-sm-6" type="text" name="intedeposit_rent">
																		</div>
																		<div class="col-xs-3 col-sm-1">
																			<label>Bedrooms:*</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="intebeds_rent" class="col-xs-10 col-sm-6"  name="intebeds_rent">
																				<option value="1">1</option>
																				<option value="2">2</option>
																				<option value="3">3</option>
																				<option value="4">4</option>
																				<option value="5">5</option>
																				<option value="6">6</option>
																				<option value="7">7</option>
																				<option value="8">8</option>
																				<option value="9">9</option>
																				<option value="10+">10+</option>
																			</select>
																			<p id="intebeds_rent_err" style="color:red"></p>
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Bathrooms*</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="intebaths_rent" class="col-xs-10 col-sm-6"  name="intebaths_rent">
																				<option value="1">1</option>
																				<option value="1.5">1.5</option>
																				<option value="2">2</option>
																				<option value="2.5">2.5</option>
																				<option value="3">3</option>
																				<option value="3.5">3.5</option>
																				<option value="4">4</option>
																				<option value="4.5">4.5</option>
																				<option value="5">5</option>
																				<option value="5.5">5.5</option>
																				<option value="6">6</option>
																				<option value="6.5">6.5</option>
																				<option value="7">7</option>
																				<option value="7.5">7.5</option>
																				<option value="8">8</option>
																				<option value="8.5">8.5</option>
																				<option value="9">9</option>
																				<option value="9.5">9.5</option>
																				<option value="10">10</option>
																				<option value="10+">10+</option>
																			</select>
																			<p id="intebaths_rent_err" style="color:red"></p>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-3 col-sm-1">
																			<label>Number of floors:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="intenumFloors_rent" class="col-xs-10 col-sm-6"  name="intenumFloors_rent">
																				<option value="1">1</option>
																				<option value="2">2</option>
																				<option value="3+">3+</option>
																			</select>
																		</div>
																		<div class="col-xs-3 col-sm-1">
																			<label>Heating:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="inteheating_rent" class="col-xs-10 col-sm-6"  name="inteheating_rent">
																				<option value="Gas">Gas</option>
																				<option value="Oil">Oil</option>
																				<option value="Heat pump">Heat pump</option>
																			</select>
																			</div>
																			<div class="col-xs-3 col-sm-1">
																			<label>Rent*</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="inteprice_rent" class="col-xs-10 col-sm-6 priceall" type="text" name="inteprice_rent" placeholder="$">
																			<p id="inteprice_rent_err" style="color:red"></p>
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">

																		</div>
																		<div class="col-xs-10 col-sm-2">
																			<!-- <input name="filetoupload_rent_inte[]" type="file" id="files_rent" multiple/>
																			<output id="list_rent"></output> -->
																			<input multiple="" type="file" id="id-input-file-resrentinte" name="filetoupload_rent_inte[]"/>
																					<label>
																						<input type="checkbox" name="file-format" id="id-file-formatresrentinte" class="ace" />
																						<!-- <span class="lbl"> Allow only images</span> -->
																					</label>

																		</div>

																	</div>
																</div>
														</div>

														<!-- Sale diff Inte floor plan -->

														<div id="diff_sale_inte" style="display:none">

															<div class="row">

																<div class="form-group">
																	<div class="col-xs-9 col-sm-3">
																		<label>Floor Plan Title</label>
																	</div>
																	<div class="col-xs-10 col-sm-4">
																		<input id="intefloortitle_diff_sale" class="col-xs-15 col-sm-10" type="text" name="intefloortitle_diff_sale" size="25" maxlength="50" value="">
																	</div>
																	<div class="col-xs-6 col-sm-2">
																		<label>Type Of Interior</label>
																	</div>
																	<div class="col-xs-8 col-sm-3">
																		<select class="col-xs-15 col-sm-10" id="intetype_diff_sale" name="intetype_diff_sale">
																				<option disabled="" style="font-weight:bold;color:black;font-size:12px;" value="0">Apartments and Multifamily</option>
																				<option style="color:black;font-size:12px;" value="84">1 Bedroom</option>
																				<option style="color:black;font-size:12px;" value="85">2 Bedroom</option>
																				<option style="color:black;font-size:12px;" value="86">3 Bedroom</option>
																				<option style="color:black;font-size:12px;" value="87">4+ Bedroom</option>
																				<option style="color:black;font-size:12px;" value="88">Co-op</option>
																				<option style="color:black;font-size:12px;" value="83">Loft</option>
																				<option style="color:black;font-size:12px;" value="82">Studio</option>

																			</select>
																	</div>
																</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-5">
																			<label>Description (500 character maximum)
																			<br>
																			<strong>NOTE:</strong>
																			This is how people will find your property through our text searches. More content within your description means more chances your property will show up, so please use the space provided.*</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<textarea id="intedescription_diff_sale" class="form-control"  name="intedescription_diff_sale"></textarea>
																			<p id="intedescription_diff_sale_err" style="color:red"></p>
																		</div>
																		</div>
																</div>

																<div class="space-4"></div>
															<div class="widget-header widget-header-blue widget-header-flat">
																<h4 class="lighter">Interior Features</h4>
															</div>

															<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																	<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="intecarpeted_rent" class="ace" type="checkbox" name="intecarpeted_diff_sale"  value="1">
																				<span class="lbl"> Carpeted</span>
																		</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="intedisposal_diff_sale" class="ace" type="checkbox" name="intedisposal_diff_sale"  value="1">
																				<span class="lbl"> Garbage Disposal</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="integasStove_diff_sale" class="ace" type="checkbox" name="integasStove_diff_sale"  value="1">
																				<span class="lbl"> Gas Stove</span>
																		</label>
																		</div>

																	</div>
																</div>

															<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">


																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="intehardwood_diff_sale" id="intehardwood_diff_sale" value="1">
																				<span class="lbl"> Hardwood Floors</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="intepatio_diff_sale" class="ace" type="checkbox" name="intepatio_diff_sale"  value="1">
																				<span class="lbl"> Patio</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="intealarm_diff_sale" class="ace" type="checkbox" name="intealarm_diff_sale"  value="1">
																				<span class="lbl"> Alarm</span>
																		</label>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">


																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="intecable_diff_sale" id="intecable_diff_sale" value="1">
																				<span class="lbl"> Cable TV</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="intedishwasher_diff_sale" class="ace" type="checkbox" name="intedishwasher_diff_sale"  value="1">
																				<span class="lbl"> Dishwasher</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="intefireplace_diff_sale" class="ace" type="checkbox" name="intefireplace_diff_sale"  value="1">
																				<span class="lbl"> Fireplace</span>
																		</label>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">

																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="intebalcony_diff_sale" id="intebalcony_diff_sale" value="1">
																				<span class="lbl"> Balcony</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="intewheelchair_diff_sale" class="ace" type="checkbox" name="intewheelchair_diff_sale"  value="1">
																				<span id="" class="lbl"> Wheelchair access</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="intemicrowave_diff_sale" class="ace" type="checkbox" name="intemicrowave_diff_sale"  value="1">
																				<span class="lbl"> Microwave</span>
																		</label>
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">


																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="interefrig_diff_sale" id="interefrig_diff_sale"  value="1">
																				<span class="lbl"> Refrigerator</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="intecentralAir_diff_sale" id="intecentralAir_diff_sale"  value="1">
																				<span class="lbl"> Central A/C</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input  class="ace" type="checkbox" name="intevaulted_diff_sale" id="intevaulted_diff_sale" value="1">
																				<span class="lbl">Vaulted ceiling</span>
																		</label>
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input  class="ace" type="checkbox" name="inteinternet_diff_sale" id="inteinternet_diff_sale"  value="1">
																				<span class="lbl"> High Speed Internet</span>
																			</label>
																		</div>
																		<div class="col-xs-3 col-sm-1">
																			<label>Available:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="id-date-picker-4" class="col-xs-10 col-sm-6 date-picker" type="text" name="inteavailable_diff_sale" data-date-format="yyyy-mm-dd">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Approximate Floorplan Size*</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="intesqFeet_diff_sale" class="col-xs-10 col-sm-6" type="text" name="intesqFeet_diff_sale">
																			 ft.
																			<span class="super">2</span>
																				<p id="intesqFeet_diff_sale_err" style="color:red"></p>
																		</div>
																	</div>
																</div>

																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-3 col-sm-1">
																			<label>Bedrooms:*</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="intebeds_diff_sale" class="col-xs-10 col-sm-6"  name="intebeds_diff_sale">
																				<option value="1">1</option>
																				<option value="2">2</option>
																				<option value="3">3</option>
																				<option value="4">4</option>
																				<option value="5">5</option>
																				<option value="6">6</option>
																				<option value="7">7</option>
																				<option value="8">8</option>
																				<option value="9">9</option>
																				<option value="10+">10+</option>
																			</select>
																			<p id="intebeds_diff_sale_err" style="color:red"></p>
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Bathrooms:*</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="intebaths_diff_sale" class="col-xs-10 col-sm-6"  name="intebaths_diff_sale">
																				<option value="1">1</option>
																				<option value="1.5">1.5</option>
																				<option value="2">2</option>
																				<option value="2.5">2.5</option>
																				<option value="3">3</option>
																				<option value="3.5">3.5</option>
																				<option value="4">4</option>
																				<option value="4.5">4.5</option>
																				<option value="5">5</option>
																				<option value="5.5">5.5</option>
																				<option value="6">6</option>
																				<option value="6.5">6.5</option>
																				<option value="7">7</option>
																				<option value="7.5">7.5</option>
																				<option value="8">8</option>
																				<option value="8.5">8.5</option>
																				<option value="9">9</option>
																				<option value="9.5">9.5</option>
																				<option value="10">10</option>
																				<option value="10+">10+</option>
																			</select>
																			<p id="intebaths_diff_sale_err" style="color:red"></p>
																		</div>
																		<div class="col-xs-3 col-sm-1">
																			<label>Number of floors:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="intenumFloors_diff_sale" class="col-xs-10 col-sm-6"  name="intenumFloors_diff_sale">
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
																		<div class="col-xs-3 col-sm-1">
																			<label>Heating:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="inteheating_diff_sale" class="col-xs-10 col-sm-6"  name="inteheating_diff_sale">
																				<option selected="" value=""></option>
																				<option value="Gas">Gas</option>
																				<option value="Oil">Oil</option>
																				<option value="Heat pump">Heat pump</option>
																			</select>
																			</div>

																	</div>

																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">

																		</div>
																		<div class="col-xs-10 col-sm-2">
																			<!-- <input name="filetoupload_diffsale_inte[]" type="file" id="file_diff_sale" multiple/>
																			<output id="list_diff_sale"></output> -->
																			<input multiple="" type="file" id="id-input-file-diff_sale" name="filetoupload_diffsale_inte[]" />
																					<label>
																						<input type="checkbox" name="file-format" id="id-file-formatdiff_sale" class="ace" />
																						<!-- <span class="lbl"> Allow only images</span> -->
																					</label>

																		</div>

																	</div>
																</div>
														</div>

													<!-- Diff rent Inte form -->
														<div id="rent_inte_diff" style="display:none">

															<div class="row">

																<div class="form-group">
																	<div class="col-xs-9 col-sm-3">
																		<label>Floor Plan Title</label>
																	</div>
																	<div class="col-xs-10 col-sm-4">
																		<input id="intefloortitle_rent_dff" class="col-xs-15 col-sm-10" type="text" name="intefloortitle_rent_dff" size="25" maxlength="50" value="">
																	</div>
																	<div class="col-xs-6 col-sm-2">
																		<label>Type Of Interior</label>
																	</div>
																	<div class="col-xs-8 col-sm-3">
																		<select class="col-xs-15 col-sm-10" id="intetype_rent_dff" name="intetype_rent_dff">
																				<option disabled="" style="font-weight:bold;color:black;font-size:12px;" value="0">Apartments and Multifamily</option>
																				<option style="color:black;font-size:12px;" value="84">1 Bedroom</option>
																				<option style="color:black;font-size:12px;" value="85">2 Bedroom</option>
																				<option style="color:black;font-size:12px;" value="86">3 Bedroom</option>
																				<option style="color:black;font-size:12px;" value="87">4+ Bedroom</option>
																				<option style="color:black;font-size:12px;" value="88">Co-op</option>
																				<option style="color:black;font-size:12px;" value="83">Loft</option>
																				<option style="color:black;font-size:12px;" value="82">Studio</option>

																			</select>
																	</div>
																</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-5">
																			<label>Description (500 character maximum)
																			<br>
																			<strong>NOTE:</strong>
																			This is how people will find your property through our text searches. More content within your description means more chances your property will show up, so please use the space provided.*</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<textarea id="intedescription_rent_dff" class="form-control"  name="intedescription_rent_dff"></textarea>
																			<p id="intedescription_rent_dff_err" style="color:red"></p>
																		</div>
																		</div>
																</div>

																<div class="space-4"></div>
															<div class="widget-header widget-header-blue widget-header-flat">
																<h4 class="lighter">Interior Features</h4>
															</div>

															<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="wdIncluded_rent_dff" id="wdIncluded_rent_dff" value="1">
																				<span class="lbl"> W/D included</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="wdConnections_rent_dff" class="ace" type="checkbox" name="wdConnections_rent_dff"  value="1">
																				<span class="lbl"> W/D Connections</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="intecarpeted_rent_dff" class="ace" type="checkbox" name="intecarpeted_rent_dff"  value="1">
																				<span class="lbl"> Carpeted</span>
																		</label>
																		</div>

																	</div>
																</div>

															<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="intedisposal_rent_dff" class="ace" type="checkbox" name="intedisposal_rent_dff"  value="1">
																				<span class="lbl"> Garbage Disposal</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="integasStove_rent_dff" class="ace" type="checkbox" name="integasStove_rent_dff"  value="1">
																				<span class="lbl"> Gas Stove</span>
																		</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="intehardwood_rent_dff" id="intehardwood_rent_dff" value="1">
																				<span class="lbl"> Hardwood Floors</span>
																			</label>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">

																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="intepatio_rent_dff" class="ace" type="checkbox" name="intepatio_rent_dff"  value="1">
																				<span class="lbl"> Patio</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="intealarm_rent_dff" class="ace" type="checkbox" name="intealarm_rent_dff"  value="1">
																				<span class="lbl"> Alarm</span>
																		</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="intecable_rent_dff" id="intecable_rent_dff" value="1">
																				<span class="lbl"> Cable TV</span>
																			</label>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="intedishwasher_rent_dff" class="ace" type="checkbox" name="intedishwasher_rent_dff"  value="1">
																				<span class="lbl"> Dishwasher</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="intefireplace_rent_dff" class="ace" type="checkbox" name="intefireplace_rent_dff"  value="1">
																				<span class="lbl"> Fireplace</span>
																		</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="intebalcony_rent" id="intebalcony_rent" value="1">
																				<span class="lbl"> Balcony</span>
																			</label>
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">

																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input id="intewheelchair_rent_dff" class="ace" type="checkbox" name="intewheelchair_rent_dff"  value="1">
																				<span id="" class="lbl"> Wheelchair access</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input id="intemicrowave_rent_dff" class="ace" type="checkbox" name="intemicrowave_rent_dff"  value="1">
																				<span class="lbl"> Microwave</span>
																		</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="interefrig_rent_dff" id="interefrig_rent_dff"  value="1">
																				<span class="lbl"> Refrigerator</span>
																			</label>
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">

																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="intecentralAir_rent" id="intecentralAir_rent"  value="1">
																				<span class="lbl"> Central A/C</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input  class="ace" type="checkbox" name="intevaulted_rent_dff" id="intevaulted_rent_dff" value="1">
																				<span class="lbl">Vaulted ceiling</span>
																		</label>
																		</div>

																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input  class="ace" type="checkbox" name="inteinternet_rent_dff" id="inteinternet_rent_dff"  value="1">
																				<span class="lbl"> High Speed Internet</span>
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
																			<input id="id-date-picker-8" class="col-xs-10 col-sm-6 date-picker" type="text" name="inteavailable_rent_dff" data-date-format="yyyy-mm-dd">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Approximate Floorplan Size*</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="intesqFeet_rent_dff" class="col-xs-10 col-sm-6" type="text" name="intesqFeet_rent_dff">
																			 ft.
																			<span class="super">2</span>
																			<p id="intesqFeet_rent_dff_err" style="color:red"></p>
																		</div>
																		<div class="col-xs-3 col-sm-1">
																			<label>A/C window units</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="intewindowUnits_rent_dff" class="col-xs-10 col-sm-6" type="text" name="intewindowUnits_rent_dff">
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-3 col-sm-1">
																			<label>Security Deposit</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="intedeposit_rent_dff" class="col-xs-10 col-sm-6" type="text" name="intedeposit_rent_dff" placeholder="$">
																		</div>
																		<div class="col-xs-3 col-sm-1">
																			<label>Bedrooms:*</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="intebeds_rent_dff" class="col-xs-10 col-sm-6"  name="intebeds_rent_dff">
																				<option value="1">1</option>
																				<option value="2">2</option>
																				<option value="3">3</option>
																				<option value="4">4</option>
																				<option value="5">5</option>
																				<option value="6">6</option>
																				<option value="7">7</option>
																				<option value="8">8</option>
																				<option value="9">9</option>
																				<option value="10+">10+</option>
																			</select>
																			<p id="intebeds_rent_dff_err" style="color:red"></p>
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Bathrooms:*</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="intebaths_rent_dff" class="col-xs-10 col-sm-6"  name="intebaths_rent_dff">
																				<option value="1">1</option>
																				<option value="1.5">1.5</option>
																				<option value="2">2</option>
																				<option value="2.5">2.5</option>
																				<option value="3">3</option>
																				<option value="3.5">3.5</option>
																				<option value="4">4</option>
																				<option value="4.5">4.5</option>
																				<option value="5">5</option>
																				<option value="5.5">5.5</option>
																				<option value="6">6</option>
																				<option value="6.5">6.5</option>
																				<option value="7">7</option>
																				<option value="7.5">7.5</option>
																				<option value="8">8</option>
																				<option value="8.5">8.5</option>
																				<option value="9">9</option>
																				<option value="9.5">9.5</option>
																				<option value="10">10</option>
																				<option value="10+">10+</option>
																			</select>
																			<p id="intebaths_rent_dff_err" style="color:red"></p>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-3 col-sm-1">
																			<label>Number of floors:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="intenumFloors_rent_dff" class="col-xs-10 col-sm-6"  name="intenumFloors_rent_dff">
																				<option value="1">1</option>
																				<option value="2">2</option>
																				<option value="3+">3+</option>
																			</select>
																		</div>
																		<div class="col-xs-3 col-sm-1">
																			<label>Heating:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="inteheating_rent_dff" class="col-xs-10 col-sm-6"  name="inteheating_rent_dff">
																				<option value="Gas">Gas</option>
																				<option value="Oil">Oil</option>
																				<option value="Heat pump">Heat pump</option>
																			</select>
																			</div>
																			<div class="col-xs-3 col-sm-1">
																			<label>Rent*</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="inteprice_rent_dff" class="col-xs-10 col-sm-6 priceall" type="text" name="inteprice_rent_dff" maxlength="6" placeholder="$">
																			<p id="inteprice_rent_dff_err" style="color:red"></p>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">

																		</div>
																		<div class="col-xs-10 col-sm-2">
																			<!-- <input name="filetoupload_diffrent_inte[]" type="file" id="file_diff_rent" multiple/>
																			<output id="list_diff_rent"></output> -->
																			<input multiple="" type="file" id="id-input-file-diff_rent_inte" name="filetoupload_diffrent_inte[]" />
																			<label>
																				<input type="checkbox" name="file-format" id="id-file-formatdiff_rent_inte" class="ace" />
																				<!-- <span class="lbl"> Allow only images</span> -->
																			</label>

																		</div>

																	</div>
																</div>
														</div>





													<!--End diff inte -->

													<!--commercial inte sale-->
													<div id="com_sale_nointe" style="display:none">
														<div class="center">
														<h3 class="green">Congrats!</h3>
														Your Property is ready to publish! Click finish to continue!
														</div>
													</div>
													<div id="com_sale_inte" style="display:none">

															<div class="row">

																<div class="form-group">
																	<div class="col-xs-9 col-sm-5">
																		<label>Floor Plan Title</label>
																	</div>
																	<div class="col-xs-10 col-sm-4">
																		<input id="intefloortitle_com_sale" class="col-xs-15 col-sm-10" type="text" name="intefloortitle_com_sale" size="25" maxlength="50" value="">
																	</div>
																</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-5">
																			<label>Description (500 character maximum)
																			<br>
																			<strong>NOTE:</strong>
																			This is how people will find your property through our text searches. More content within your description means more chances your property will show up, so please use the space provided.*</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<textarea id="intedescription_com_sale" class="form-control"  name="intedescription_com_sale"></textarea>
																			<p id="intedescription_com_sale_err" style="color:red"></p>
																		</div>
																		</div>
																</div>

																<div class="space-4"></div>
															<div class="widget-header widget-header-blue widget-header-flat">
																<h4 class="lighter">Interior Features</h4>
															</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-3 col-sm-1">
																			<label>Primary Property Type:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="typeId_com_sale_inte" class="col-xs-10 col-sm-6"  name="typeId_com_sale_inte" disabled>
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
																			<select id="typeId2_com_sale_inte" class="col-xs-10 col-sm-6"  name="typeId2_com_sale_inte">
																				<option value="">&nbsp;</option>
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
																			<select id="typeId3_com_sale_inte" class="col-xs-10 col-sm-6"  name="typeId3_com_sale_inte">
																			<option value="">&nbsp;</option>
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
																			<input id="id-date-picker-8" class="col-xs-10 col-sm-6 date-picker" type="text" name="available_com_sale_inte" data-date-format="yyyy-mm-dd">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Lease Type:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="leaseType_com_sale_inte" class="col-xs-10 col-sm-6"  name="leaseType_com_sale_inte">
																				<option selected="" value=""></option>
																				<option value="NNN">NNN</option>
																				<option value="Full Service">Full Service</option>
																				<option value="Modified Gross">Modified Gross</option>
																				<option value="Modified Net">Modified Net</option>
																				<option value="Industrial Gross">Industrial Gross</option>
																				<option value="Other">Other</option>
																			</select>
																		</div>
																		<div class="col-xs-3 col-sm-1">
																			<label>Lease term:</label>
																		</div>
																		<div class="col-xs-10 col-sm-1">
																			<input id="leaseTerm_com_sale_inte" class="col-xs-10 col-sm10" type="text" name="leaseTerm_com_sale_inte" placeholder="" maxlength="13">
																		</div>
																		<div class="col-xs-5 col-sm-2">
																		<select id="leaseDuration_com_sale_inte" class="col-xs-20 col-sm-10" name="leaseDuration_com_sale_inte">
																			<option value="Day(s)">Day(s)</option>
																			<option value="Week(s)">Week(s)</option>
																			<option value="Month(s)">Month(s)</option>
																			<option value="Year(s)">Year(s)</option>
																		</select>
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-3 col-sm-1">
																			<label>Sublease date:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="subleaseDate_com_sale_inte" class="col-xs-10 col-sm-6" type="text" name="subleaseDate_com_sale_inte">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Approximate Interior Size:*</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="sqFeet_com_sale_inte" class="col-xs-10 col-sm-6" type="text" name="sqFeet_com_sale_inte">
																			 ft.
																			<span class="super">2</span>
																			<p id="sqFeet_com_sale_inte_err" style="color:red"></p>
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Suite/Floor</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="suite_com_sale_inte" class="col-xs-10 col-sm-6" type="text" name="suite_com_sale_inte" maxlength="25">
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-3 col-sm-1">
																			<label>Number of floors:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="numFloors_com_sale_inte" class="col-xs-10 col-sm-6" type="text" name="numFloors_com_sale_inte" maxlength="4">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Minimum divisible area: </label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="minDivisible_com_sale_inte" class="col-xs-10 col-sm-6" type="text" name="minDivisible_com_sale_inte" maxlength="4">
																			 ft.
																			<span class="super">2</span>
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Maximum contiguous area</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="maxContiguous_com_sale_inte" class="col-xs-10 col-sm-6" type="text" name="maxContiguous_com_sale_inte" maxlength="25">
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-3 col-sm-1">
																			<label>Procurement fee</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="procurementFee_com_sale_inte" class="col-xs-10 col-sm-6" type="text" name="procurementFee_com_sale_inte">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Power</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="power_com_sale_inte" class="col-xs-10 col-sm-6" type="text" name="power_com_sale_inte">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Ceiling height clearance</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="ceilingHeight_com_sale_inte" class="col-xs-10 col-sm-6" type="text" name="ceilingHeight_com_sale_inte" maxlength="3">
																			 ft.
																			<span class="super">2</span>
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>

																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-3 col-sm-1">
																			<label>Office space</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="officeSpace_com_sale_inte" class="col-xs-10 col-sm-6" type="text" name="officeSpace_com_sale_inte">
																			 ft.
																			<span class="super">2</span>
																		</div>
																		<div class="col-xs-3 col-sm-1">
																			<label>Heating:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="inteheating_com_sale_inte" class="col-xs-10 col-sm-6"  name="inteheating_com_sale_inte">
																				<option selected="" value=""></option>
																				<option value="Gas">Gas</option>
																				<option value="Oil">Oil</option>
																				<option value="Heat pump">Heat pump</option>
																			</select>
																			</div>
																			<div class="col-xs-3 col-sm-1">
																			<label>Lighting:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="lighting_com_sale_inte" class="col-xs-10 col-sm-6"  name="lighting_com_sale_inte">
																				<option selected="" value=""></option>
																				<option value="Fluorescent">Fluorescent</option>
																				<option value="Incandescent">Incandescent</option>
																				<option value="Halogen">Halogen</option>

																			</select>
																			</div>

																	</div>

																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">

																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="internet_com_sale_inte" id="internet_com_sale_inte"  value="1">
																				<span class="lbl"> High Speed Internet</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input  class="ace" type="checkbox" name="wheelchair_com_sale_inte" id="wheelchair_com_sale_inte" value="1">
																				<span class="lbl">Wheelchair access</span>
																		</label>
																		</div>

																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input  class="ace" type="checkbox" name="fireSprinklers_com_sale_inte" id="fireSprinklers_com_sale_inte"  value="1">
																				<span class="lbl"> Fire sprinklers</span>
																			</label>
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">

																		</div>
																		<div class="col-xs-10 col-sm-2">
																			<!-- <input name="filetoupload_com_sale_inte[]" type="file" id="file_com_sale_inte" multiple/>
																			<output id="list_com_sale_inte"></output> -->
																			<input multiple="" type="file" id="id-input-file-com_sale_inte" name="filetoupload_com_sale_inte[]" />
																			<label>
																				<input type="checkbox" name="file-format" id="id-file-formatcom_sale_inte" class="ace" />
																				<!-- <span class="lbl"> Allow only images</span> -->
																			</label>

																		</div>

																	</div>
																</div>
														</div>

														<div id="com_rent_inte" style="display:none">

															<div class="row">

																<div class="form-group">
																	<div class="col-xs-9 col-sm-5">
																		<label>Floor Plan Title</label>
																	</div>
																	<div class="col-xs-10 col-sm-4">
																		<input id="intefloortitle_com_rent" class="col-xs-15 col-sm-10" type="text" name="intefloortitle_com_rent" size="25" maxlength="50" value="">
																	</div>
																</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-5">
																			<label>Description (500 character maximum)
																			<br>
																			<strong>NOTE:</strong>
																			This is how people will find your property through our text searches. More content within your description means more chances your property will show up, so please use the space provided.*</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																			<textarea id="intedescription_com_rent" class="form-control"  name="intedescription_com_rent"></textarea>
																			<p id="intedescription_com_rent_err" style="color:red"></p>
																		</div>
																		</div>
																</div>

																<div class="space-4"></div>
															<div class="widget-header widget-header-blue widget-header-flat">
																<h4 class="lighter">Interior Features</h4>
															</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-3 col-sm-1">
																			<label>Primary Property Type:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="typeId_com_rent_inte" class="col-xs-10 col-sm-6"  name="typeId_com_rent_inte" disabled>
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
																			<select id="typeId2_com_rent_inte" class="col-xs-10 col-sm-6"  name="typeId2_com_rent_inte">
																			<option value="">&nbsp;</option>
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
																			<select id="typeId3_com_rent_inte" class="col-xs-10 col-sm-6"  name="typeId3_com_rent_inte">
																			<option value="">&nbsp;</option>
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
																			<input id="id-date-picker-8" class="col-xs-10 col-sm-6 date-picker" type="text" name="available_com_rent_inte" data-date-format="yyyy-mm-dd">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Lease Type:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="leaseType_com_rent_inte" class="col-xs-10 col-sm-6"  name="leaseType_com_rent_inte">
																				<option selected="" value=""></option>
																				<option value="NNN">NNN</option>
																				<option value="Full Service">Full Service</option>
																				<option value="Modified Gross">Modified Gross</option>
																				<option value="Modified Net">Modified Net</option>
																				<option value="Industrial Gross">Industrial Gross</option>
																				<option value="Other">Other</option>
																			</select>
																		</div>
																		<div class="col-xs-3 col-sm-1">
																			<label>Lease term:</label>
																		</div>
																		<div class="col-xs-10 col-sm-1">
																			<input id="leaseTerm_com_rent_inte" class="col-xs-10 col-sm10" type="text" name="leaseTerm_com_rent_inte" placeholder="" maxlength="13">
																		</div>
																		<div class="col-xs-5 col-sm-2">
																		<select id="leaseDuration_com_rent_inte" class="col-xs-20 col-sm-10" name="leaseDuration_com_rent_inte">
																			<option value="Day(s)">Day(s)</option>
																			<option value="Week(s)">Week(s)</option>
																			<option value="Month(s)">Month(s)</option>
																			<option value="Year(s)">Year(s)</option>
																		</select>
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-4 col-sm-1">
																			<label>Rent:*</label>
																		</div>
																		<div class="col-xs-10 col-sm-1">
																			<input id="price_com_rent_inte" class="col-xs-10 col-sm-10 priceall" type="text" name="price_com_rent_inte" placeholder="$" maxlength="13">
																			<p id="price_com_rent_inte_err" style="color:red"></p>
																		</div>
																		<div class="col-xs-5 col-sm-2">
																		<select id="rentType_com_rent_inte" class="col-xs-20 col-sm-10" name="rentType_com_rent_inte">
																			<option value="$/SF/Month">$/SF/Month</option>
																			<option value="$/SF/Year">$/SF/Year</option>
																			<option value="$/Month">$/Month</option>
																			<option value="$/Year">$/Year</option>
																		</select>
																		</div>
																		<div class="col-xs-3 col-sm-1">
																			<label>Sublease date:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="subleaseDate_com_rent_inte" class="col-xs-10 col-sm-6" type="text" name="subleaseDate_com_rent_inte">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Approximate Interior Size:*</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="sqFeet_com_rent_inte" class="col-xs-10 col-sm-6" type="text" name="sqFeet_com_rent_inte">
																			 ft.
																			<span class="super">2</span>
																			<p id="sqFeet_com_rent_inte_err" style="color:red"></p>
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-4 col-sm-1">
																			<label>Suite/Floor</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="suite_com_rent_inte" class="col-xs-10 col-sm-6" type="text" name="suite_com_rent_inte" maxlength="25">
																		</div>
																		<div class="col-xs-3 col-sm-1">
																			<label>Number of floors:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="numFloors_com_rent_inte" class="col-xs-10 col-sm-6" type="text" name="numFloors_com_rent_inte" maxlength="4">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Minimum divisible area: </label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="minDivisible_com_rent_inte" class="col-xs-10 col-sm-6" type="text" name="minDivisible_com_rent_inte" maxlength="4">
																			 ft.
																			<span class="super">2</span>
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-4 col-sm-1">
																			<label>Maximum contiguous area</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="maxContiguous_com_rent_inte" class="col-xs-10 col-sm-6" type="text" name="maxContiguous_com_rent_inte" maxlength="25">
																		</div>
																		<div class="col-xs-3 col-sm-1">
																			<label>Procurement fee</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="procurementFee_com_rent_inte" class="col-xs-10 col-sm-6" type="text" name="procurementFee_com_rent_inte">
																		</div>
																		<div class="col-xs-4 col-sm-1">
																			<label>Power</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="power_com_rent_inte" class="col-xs-10 col-sm-6" type="text" name="power_com_rent_inte">
																		</div>
																	</div>
																</div>
																<div class="space-4"></div>

																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-4 col-sm-1">
																			<label>Ceiling height clearance</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="ceilingHeight_com_rent_inte" class="col-xs-10 col-sm-6" type="text" name="ceilingHeight_com_rent_inte" maxlength="3">
																			 ft.
																			<span class="super">2</span>
																		</div>
																		<div class="col-xs-3 col-sm-1">
																			<label>Office space</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<input id="officeSpace_com_rent_inte" class="col-xs-10 col-sm-6" type="text" name="officeSpace_com_rent_inte">
																			 ft.
																			<span class="super">2</span>
																		</div>
																		<div class="col-xs-3 col-sm-1">
																			<label>Heating:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="inteheating_com_rent_inte" class="col-xs-10 col-sm-6"  name="inteheating_com_rent_inte">
																				<option selected="" value=""></option>
																				<option value="Gas">Gas</option>
																				<option value="Oil">Oil</option>
																				<option value="Heat pump">Heat pump</option>
																			</select>
																			</div>

																	</div>

																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-3 col-sm-1">
																			<label>Lighting:</label>
																		</div>
																		<div class="col-xs-10 col-sm-3">
																			<select id="lighting_com_rent_inte" class="col-xs-10 col-sm-6"  name="lighting_com_rent_inte">
																				<option selected="" value=""></option>
																				<option value="Fluorescent">Fluorescent</option>
																				<option value="Incandescent">Incandescent</option>
																				<option value="Halogen">Halogen</option>

																			</select>
																			</div>
																		<div class="col-xs-10 col-sm-4">
																			<label>
																				<input class="ace" type="checkbox" name="internet_com_rent_inte" id="internet_com_rent_inte"  value="1">
																				<span class="lbl"> High Speed Internet</span>
																			</label>
																		</div>
																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input  class="ace" type="checkbox" name="wheelchair_com_rent_inte" id="wheelchair_com_rent_inte" value="1">
																				<span class="lbl">Wheelchair access</span>
																		</label>
																		</div>

																	</div>
																</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">

																		<div class="col-xs-10 col-sm-4">
																		<label>
																				<input  class="ace" type="checkbox" name="fireSprinklers_com_rent_inte" id="fireSprinklers_com_rent_inte"  value="1">
																				<span class="lbl"> Fire sprinklers</span>
																			</label>
																		</div>
																		</div>
																		</div>
																<div class="space-4"></div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-xs-10 col-sm-3">

																		</div>
																		<div class="col-xs-10 col-sm-2">
																			<!-- <input name="filetoupload_com_rent_inte[]" type="file" id="file_com_rent_inte" multiple/>
																			<output id="list_com_rent_inte"></output> -->
																			<input multiple="" type="file" id="id-input-file-com_rent_inte" name="filetoupload_com_rent_inte[]" />
																			<!-- <label>
																				<input type="checkbox" name="file-format" id="id-file-formatcomsale" class="ace" />
																				<span class="lbl"> Allow only images</span>
																			</label>
																			 -->
																		</div>

																	</div>
																</div>

													</div>

												<!-- ------------END---------------------  -->

														</div>

<!-- 														<div class="step-pane" id="step4">
	<div class="center">
		<h3 class="green">Congrats!</h3>
		Your product is ready to ship! Click finish to continue!
	</div>
</div> -->
													</div>


													<hr />
													<div class="row-fluid wizard-actions">
														<input type="hidden" id="div_val" value="1">
														<button class="btn btn-prev" type="button" id="prevbutton">
															<i class="icon-arrow-left"></i>
															Prev
														</button>

														<button class="btn btn-success btn-next" data-last="Finish " type="button" id="nextbutton">
															Next
															<i class="icon-arrow-right icon-on-right"></i>
														</button>

														<!-- <button class="btn btn-success btn-next" data-last="Finish ">
															Next
															<i class="icon-arrow-right icon-on-right"></i>
														</button> -->

													</div>
												</div><!-- /widget-main -->
											</div><!-- /widget-body -->

										</div>
									</div>
								</div>
									</div>
								</div><!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
						</form>
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
		<!--<script src="<?php echo base_url();?>assets1/js/dropzone.min.js"></script> -->
		<script src="<?php echo base_url();?>dropzone/jQuery.MultiFile.min.js"></script>
		<!-- ace scripts -->

		<script src="<?php echo base_url();?>assets1/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url();?>assets1/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->

		<script type="text/javascript">
			jQuery(function($) {

				$('[data-rel=tooltip]').tooltip();

				$(".select2").css('width','200px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				});


				var $validation = false;
				$('#fuelux-wizard').ace_wizard().on('change' , function(e, info){
					if(info.step == 1 && $validation) {
						if(!$('#validation-form').valid()) return false;
					}
				}).on('finished', function(e) {

					/*bootbox.dialog({
						message: "Thank you! Your information was successfully saved!",
						buttons: {
							"success" : {
								"label" : "OK",
								"className" : "btn-sm btn-primary"
							}
						}
					});*/

				//$('#validation-form').submit();
				}).on('stepclick', function(e){
					//return false;//prevent clicking on steps
				});


				/*$('#skip-validation').removeAttr('checked').on('click', function(){
					$validation = this.checked;
					if(this.checked) {
						$('#sample-form').hide();
						$('#validation-form').removeClass('hide');
					}
					else {
						$('#validation-form').addClass('hide');
						$('#sample-form').show();
					}
				});*/



				//documentation : http://docs.jquery.com/Plugins/Validation/validate


				$.mask.definitions['~']='[+-]';
				$('#phone').mask('(999) 999-9999');

				jQuery.validator.addMethod("phone", function (value, element) {
					return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
				}, "Enter a valid phone number.");

				$('#validation-form').validate({


				});




				$('#modal-wizard .modal-header').ace_wizard();
				$('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');
			})

			$('.date-picker').datepicker({autoclose:true},{ dateFormat: 'yyyy-mm-dd'}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
			 var currentDate = new Date();
			 	$(".date-picker").datepicker("setDate", currentDate);

			/*$(".date-picker").datepicker({
		        dateFormat: 'yyyy-mm-dd'
		    });*/
		</script>
		<script type="text/javascript">


			$(document).ready(function(){
				var type_val= $("#typeId").val();
				if(type_val==100 || type_val==101 || type_val==102){
							$("#res_rent").hide();
				           	$("#res_sale").hide();
				            $("#rent_inte").hide();
				            $("#sale_inte").hide();
				            $("#com_sale").show();
				            $("#com_sale_common").show();
				            $("#com_sale_nointe").show();
				            $("#com_rent").hide();

				}



			    $('input[type="radio"]').click(function(){
			    	var type_val2= $("#typeId").val();
			    	//alert(type_val2);

			        if($(this).attr("value")==1){

			        	if(type_val2==57 || type_val2==56 || type_val2==67){

			            /*$("#res_rent").hide();
			            $("#rent_inte").hide();
			            $("#res_sale").show();
			            $("#sale_inte").show();
			            $("#com_sale").show();
			            $("#com_common").show();
			            $("#com_sale_diff").show();
			            $("#diff_sale_inte").show();*/
			            	$("#res_rent").hide();
				           	$("#res_sale").hide();
				            $("#rent_inte").hide();
				            $("#sale_inte").hide();
				            $("#com_sale").show();
				            $("#com_sale_common").hide();
				            $("#com_sale_diff").show();
				            $("#diff_sale_inte").show();
				            $("#com_rent").hide();
				            $("#rent_inte_diff").hide();
				            $("#com_sale_nointe").hide();
				        }else if(type_val2==53 || type_val2==55 || type_val2==54 || type_val2==60 || type_val2==63 || type_val2==62 || type_val2==61 || type_val2==77 ||type_val2==76 ||type_val2==78)
				        {
				        	$("#com_sale_nointe").hide();
				        	$("#res_rent").hide();
				         	$("#res_sale").show();
				            $("#rent_inte").hide();
				            $("#com_sale_common").hide();
				            $("#com_sale_diff").hide();
				            $("#sale_inte").show();
				            $("#com_sale").show();

				        }else{
				        	if(type_val2==15 ||type_val2==16 ||type_val2==12 ||type_val2==17 ||type_val2==18 ||type_val2==64 ||type_val2==13 ||type_val2==14 ||
			        			type_val2==22 ||type_val2==23 ||type_val2==21 ||type_val2==24 ||type_val2==30 ||type_val2==93 ||type_val2==65 ||type_val2==32 ||
			        			type_val2==32 ||type_val2==29 ||type_val2==31 ||type_val2==28 ||type_val2==27 ||type_val2==25 ||type_val2==26 ||type_val2==66 ||
			        			type_val2==33 ||type_val2==96 ||type_val2==95 ||type_val2==94 ||type_val2==34 ||type_val2==97 ||type_val2==35 ||
			        			type_val2==80 ||type_val2==20 ||type_val2==19 ||type_val2==81 ||type_val2==79 ||type_val2==41 ||type_val2==39 ||type_val2==36 ||
			        			type_val2==43 ||type_val2==38 ||type_val2==40 ||type_val2==44 ||type_val2==42 ||type_val2==37){
				        		$("#res_rent").hide();
					         	$("#res_sale").hide();
					            $("#rent_inte").hide();
					            $("#com_sale_diff").hide();
					            $("#sale_inte").hide();
					           	$("#com_sale").show();
					           	$("#com_sale_common").show();
					            $("#com_sale_inte").show();
					            $("#com_rent").hide();
					            $("#com_sale_nointe").hide();

				        	}else{
				        		$("#res_rent").hide();
					         	$("#res_sale").hide();
					            $("#rent_inte").hide();
					            $("#com_sale_common").show();
					            $("#com_sale_diff").hide();
					            $("#sale_inte").hide();
					            $("#com_sale").show();
					            $('#com_sale_nointe').show();
					            $("#com_rent").hide();
				        	}

				        }

			        }

			        if($(this).attr("value")==2){
			        	if(type_val2==57 || type_val2==56 || type_val2==67 ){
			        		$("#com_rent").show();
			        		$("#com_rent_diff").show();
			        		$("#rent_inte_diff").show();
			        		$("#res_rent").hide();
				           	$("#res_sale").hide();
				            $("#rent_inte").hide();
				            $("#sale_inte").hide();
				            $("#com_sale").hide();
				            $("#com_sale_common").hide();
				            $("#com_sale_diff").hide();
				            $("#com_rent_common").hide();
				            $("#diff_sale_inte").hide();
				            $("#com_sale_nointe").hide();

			        	}else if(type_val2==53 || type_val2==55 || type_val2==54 || type_val2==60 || type_val2==63 || type_val2==62 || type_val2==61 || type_val2==77 ||type_val2==76 ||type_val2==78)
			        	{
			        		//alert(type_val2);
		        			$("#res_sale").hide();
				            $("#rent_inte").show();
				            $("#sale_inte").hide();
				            $("#com_sale").hide();
				            $("#com_sale_common").hide();
				            $("#com_sale_diff").hide();
		    				$("#res_rent").show();
		    				$("#com_rent").hide();
		    				$("#diff_sale_inte").hide();
		    				$("#com_sale_nointe").hide();
			        	}else{
			        		if(type_val2==15 ||type_val2==16 ||type_val2==12 ||type_val2==17 ||type_val2==18 ||type_val2==64 ||type_val2==13 ||type_val2==14 ||
			        			type_val2==22 ||type_val2==23 ||type_val2==21 ||type_val2==24 ||type_val2==30 ||type_val2==93 ||type_val2==65 ||type_val2==32 ||
			        			type_val2==32 ||type_val2==29 ||type_val2==31 ||type_val2==28 ||type_val2==27 ||type_val2==25 ||type_val2==26 ||type_val2==66 ||
			        			type_val2==33 ||type_val2==96 ||type_val2==95 ||type_val2==94 ||type_val2==34 ||type_val2==97 ||type_val2==35 ||
			        			type_val2==80 ||type_val2==20 ||type_val2==19 ||type_val2==81 ||type_val2==79 ||type_val2==41 ||type_val2==39 ||type_val2==36 ||
			        			type_val2==43 ||type_val2==38 ||type_val2==40 ||type_val2==44 ||type_val2==42 ||type_val2==37){

			        			$("#res_rent").hide();
					           	$("#res_sale").hide();
					            $("#rent_inte").hide();
					            $("#sale_inte").hide();
					            $("#com_sale").hide();
					            $("#com_sale_common").hide();
					            $("#com_sale_diff").hide();
					            $("#com_rent").show();
					            $("#com_rent_common").show();
					            $("#com_rent_inte").show();
					            $("#com_sale_nointe").hide();

			        		}else{

		        			$("#res_rent").hide();
				           	$("#res_sale").hide();
				            $("#rent_inte").hide();
				            $("#sale_inte").hide();
				            $("#com_sale").hide();
				            $("#com_sale_common").hide();
				            $("#com_sale_diff").hide();
				            $("#com_rent").show();
				            $("#com_rent_common").show();
				            $("#com_rent_inte").hide();

				        	}

			        	}

			            /*$("#res_sale").hide();
			            $("#res_rent").show();
			            $("#sale_inte").hide();
			            $("#rent_inte").show();
			            $("#com_sale").hide();
			            $("#com_rent").show();
			             $("#com_sale_diff").hide();
			            $("#diff_sale_inte").hide();*/


			        }

			    });
			    $('#typeId').on('change', function() {
			    	/*var val= $("#typeId").val();*/
			    	var sale_value=$('input[name=forSale]:checked').val();
			    		var a=this.value;
			    		if(a==57 || a==56 || a==67){

			    			if(sale_value==1){

				    			$("#res_rent").hide();
					           	$("#res_sale").hide();
					            $("#rent_inte").hide();
					            $("#sale_inte").hide();
					            $("#com_sale").show();
					            $("#com_sale_common").hide();
					            $("#com_sale_diff").show();
					            $("#diff_sale_inte").show();
					            $("#com_rent").hide();
					            $("#rent_inte_diff").hide();
					            $("#com_sale_nointe").hide();
				        	}else{
				        		$("#com_rent").show();
				        		$("#com_rent_diff").show();
				        		$("#rent_inte_diff").show();
				        		$("#res_rent").hide();
					           	$("#res_sale").hide();
					            $("#rent_inte").hide();
					            $("#sale_inte").hide();
					            $("#com_sale").hide();
					            $("#com_sale_common").hide();
					            $("#com_sale_diff").hide();
					            $("#com_rent_common").hide();
					            $("#diff_sale_inte").hide();
					            $("#com_sale_nointe").hide();
				        	}

			    		}else if(a==53 || a==55 || a==54 || a==60 || a==63 || a==62 || a==61 || a==77 ||a==76 ||a==78){
			    			//alert(sale_value);
			    			if(sale_value==1){
			    				$("#res_rent").hide();
					           	$("#res_sale").show();
					            $("#rent_inte").hide();
					            $("#com_sale_common").hide();
					            $("#com_sale_diff").hide();
					            $("#sale_inte").show();
					            $("#com_sale").hide();
					            $("#com_rent").hide();
					           	$("#com_sale_nointe").hide();

			    			}else{

			    				$("#res_sale").hide();
					            $("#rent_inte").show();
					            $("#sale_inte").hide();
					            $("#com_sale").hide();
					            $("#com_sale_common").hide();
					            $("#com_sale_diff").hide();
			    				$("#res_rent").show();
			    				$("#com_rent").hide();
					            $("#com_sale_nointe").hide();

			    			}



			    		}else{
			    			if(a==15 ||a==16 ||a==12 ||a==17 ||a==18 ||a==64 ||a==13 ||a==14 ||
			        			a==22 ||a==23 ||a==21 ||a==24 ||a==30 ||a==93 ||a==65 ||a==32 ||
			        			a==32 ||a==29 ||a==31 ||a==28 ||a==27 ||a==25 ||a==26 ||a==66 ||
			        			a==33 ||a==96 ||a==95 ||a==94 ||a==34 ||a==97 ||a==35 ||
			        			a==80 ||a==20 ||a==19 ||a==81 ||a==79 ||a==41 ||a==39 ||a==36 ||
			        			a==43 ||a==38 ||a==40 ||a==44 ||a==42 ||a==37){
				    				if(sale_value==1){
				    					//alert("test");
					    				$("#res_rent").hide();
							         	$("#res_sale").hide();
							            $("#rent_inte").hide();
							            $("#com_sale_diff").hide();
							            $("#sale_inte").hide();
							           	$("#com_sale").show();
							           	$("#com_sale_common").show();
							            $("#com_sale_inte").show();
							            $("#com_rent").hide();
							            $("#com_rent_common").hide();
							            $("#diff_sale_inte").hide();
							            $("#com_sale_nointe").hide();
						            }else{
						              	$("#res_rent").hide();
							           	$("#res_sale").hide();
							            $("#rent_inte").hide();
							            $("#sale_inte").hide();
							            $("#com_sale").hide();
							            $("#com_sale_common").hide();
							            $("#com_sale_diff").hide();
							            $("#com_rent").show();
							            $("#com_rent_common").show();
							            $("#com_rent_inte").show();
							            $("#diff_sale_inte").hide();
							            $("#com_sale_nointe").hide();
					              }



			    			}else{
			    			if(sale_value==1){
						  //	alert( a); // or $(this).val()
						  	$("#res_rent").hide();
				           	$("#res_sale").hide();
				            $("#rent_inte").hide();
				            $("#sale_inte").hide();
				            $("#com_sale").show();
				            $("#com_sale_common").show();
				            $('#com_sale_nointe').show();
				            $("#com_sale_diff").hide();
				            $("com_rent").hide();
				            $("com_rent_common").hide();
				        }else{
				        	$("#res_rent").hide();
				           	$("#res_sale").hide();
				            $("#rent_inte").hide();
				            $("#sale_inte").hide();
				            $("#com_sale").hide();
				            $("#com_sale_common").hide();
				            $("#com_sale_diff").hide();
				            $("#com_rent").show();
				            $("#com_rent_common").show();
				            $('#com_sale_nointe').show();
				            $("#com_rent_diff").hide();
				        }

						}
					}

				});

			$( "#nextbutton" ).click(function() {
				var valid_res =0;
				var valuediv=parseInt($("#div_val").val());
				var sale_val=$('input[name=forSale]:checked').val();
				var prod_type= $("#typeId").val();

				if(sale_val ==1){
					if(prod_type==57 || prod_type==56 || prod_type==67 ){
						 if(valuediv==1){
						 	valuediv++;
						 	$("#div_val").val(valuediv);
						 	return true;
					 	 	}
					 	 	if(valuediv==2){

							 	var street1_diff=$("#street1_diff").val();
							 	var state_diff=$("#state_diff").val();
							 	var city_diff=$("#city_diff").val();
							 	var zip_diff=$("#zip_diff").val();
							 	var status_diff=$("#status_diff").val();
							 	var price_diff=$("#price_diff").val();
							 	var title_diff=$("#title_diff").val();
							 	var description_diff=$("#description_diff").val();
							 	var filetoupload_diff=$("#filetoupload_diff").val();
						 	 	if(street1_diff==""){
						 	 		 $('#street1_diff').css('border','1px solid #f09784');
						 	 		 $('#street1_diff_err').html("Required");
						 	 		 $('#street1_diff').focus();

	 	 		  					  valid_res = 1;

						 	 	}
						 	 	if(state_diff==""){
						 	 		 $('#state_diff').css('border','1px solid #f09784');
						 	 		 $('#state_diff').focus();
						 	 		 $('#state_diff_err').html("Required");
						 	 		  valid_res = 1;
						 	 	}
						 	 	if(city_diff==""){
						 	 		 $('#city_diff').css('border','1px solid #f09784');
						 	 		 $('#city_diff').focus();
						 	 		 $('#city_diff_err').html("Required");

	 	 		  					  valid_res = 1;
						 	 	}
						 	 	if(zip_diff==""){
						 	 		 $('#zip_diff').css('border','1px solid #f09784');
						 	 		 $('#zip_diff').focus();
						 	 		 $('#zip_diff_err').html("Required");

	 	 		  					 valid_res = 1;

						 	 	}
						 	 	if(status_diff==""){
						 	 		 $('#status_diff').css('border','1px solid #f09784');
						 	 		 $('#status_diff').focus();
						 	 		 $('#status_diff_err').html("Required");

	 	 		  					 valid_res = 1;

						 	 	}
						 	 	if(price_diff==""){
						 	 		 $('#price_diff').css('border','1px solid #f09784');
						 	 		  $('#price_diff').focus();
						 	 		  $('#price_diff_err').html("Required");

	 	 		  					 valid_res = 1;
						 	 	}
						 	 	if(title_diff==""){
						 	 		$('#title_diff').css('border','1px solid #f09784');
						 	 		$('#title_diff').focus();
						 	 		$('#title_diff_err').html("Required");
	 	 		  					 valid_res = 1;
						 	 	}
						 	 	if(description_diff==""){
						 	 		$('#description_diff').css('border','1px solid #f09784');
						 	 		$('#title_diff').focus();
						 	 		$('#description_diff_err').html("Required");
	 	 		  					  valid_res = 1;


						 	 	}
						 	 if(valid_res == 1){
						 	 	$('#step3').removeClass('active');
						 	 	$('#step2').addClass('active');
						 	 	$('#litop2').removeClass('complete');
						 	 	$('#litop3').removeClass('active');
						 	 	$('#litop2').addClass('active');
						 	 	/*$("#nextbutton").html('Next');*/
						 	 	$("#nextbutton").html('Next<i class="icon-arrow-right icon-on-right"></i>');
						 	 		 return false;
						 	 }else{
						 	 	valuediv++;
								 	$("#div_val").val(valuediv);
								 	$('#step2').removeClass('active');
	 	 		  					 $('#step3').addClass('active');
								 	$('#litop2').addClass('complete');
							 	 	$('#litop3').removeClass('complete');
							 	 	$('#litop3').addClass('active');
							 	 	$("#nextbutton").html('Finish<i class="icon-arrow-right icon-on-right"></i>');
								 	return true;
						 	 }

					 	 }
					 	 if(valuediv==3){
					 	 	var intedescription_diff_sale = $("#intedescription_diff_sale").val();
					 	 		var intesqFeet_diff_sale = $("#intesqFeet_diff_sale").val();
					 	 		var intebeds_diff_sale = $("#intebeds_diff_sale").val();
					 	 		var intebaths_diff_sale= $("#intebaths_diff_sale").val();
					 	 		if(intedescription_diff_sale==""){
					 	 			 $('#intedescription_diff_sale').css('border','1px solid #f09784');
					 	 			 $('#intedescription_diff_sale').focus();
					 	 			 $('#intedescription_diff_sale_err').html("Required");
					 	 			 valid_res = 1;

					 	 		}
					 	 		if(intesqFeet_diff_sale==""){
					 	 			 $('#intesqFeet_diff_sale').css('border','1px solid #f09784');
					 	 			 $('#intesqFeet_diff_sale').focus();
					 	 			 $('#intesqFeet_diff_sale_err').html("Required");
					 	 			 valid_res = 1;
					 	 		}
					 	 		if(intebeds_diff_sale==""){
					 	 			 $('#intebeds_diff_sale').css('border','1px solid #f09784');
					 	 			 $('#intebeds_diff_sale').focus();
					 	 			 $('#intebeds_diff_sale_err').html("Required");
					 	 			 valid_res = 1;
					 	 		}
					 	 		if(intebaths_diff_sale==""){
					 	 			 $('#intebaths_diff_sale').css('border','1px solid #f09784');
					 	 			 $('#intebaths_diff_sale').focus();
					 	 			  $('#intebaths_diff_sale_err').html("Required");
					 	 			  valid_res = 1;
					 	 		}
					 	 		if(valid_res ==0){

					 	 			$('#validation-form').submit();
					 	 		}

					 	 }




					}else if(prod_type==53 || prod_type==55 || prod_type==54 || prod_type==60 || prod_type==63 || prod_type==62 || prod_type==61 || prod_type==77 ||prod_type==76 ||prod_type==78){
						if(valuediv==1){
						 	valuediv++;
						 	$("#div_val").val(valuediv);
						 	//alert(valuediv);
						 	return true;
						 }
						 if(valuediv==2){
							 	var street1=$("#street1").val();
						 		var state=$("#state").val();
					 			var city=$("#city").val();
				 				var zip=$("#zip").val();
							 	var status=$("#status").val();
							 	var price=$("#price").val();
							 	var lotSize=$("#lotSize").val();
							 	var title=$("#title").val();
							 	var description=$("#description_res").val();
							 	//alert(description);
							 	var filetoupload_sale=$("#filetoupload_sale").val();
						 	 	if(street1==""){
						 	 		 $('#street1').css('border','1px solid #f09784');
						 	 		  $('#street1').focus();
						 	 		  $('#street1_err').html("Required");
						 	 		valid_res = 1;
						 	 	}
						 	 	if(state==""){
						 	 		 $('#state').css('border','1px solid #f09784');
						 	 		  $('#state').focus();
						 	 		  $('#state_err').html("Required");
						 	 		valid_res = 1;
						 	 	}
						 	 	if(city==""){
						 	 		 $('#city').css('border','1px solid #f09784');
						 	 		  $('#city').focus();
						 	 		  $('#city_err').html("Required");
						 	 		valid_res = 1;
						 	 	}
						 	 	if(zip==""){
						 	 		 $('#zip').css('border','1px solid #f09784');
						 	 		  $('#zip').focus();
						 	 		  $('#zip_err').html("Required");
						 	 		valid_res = 1;
				 	 			}
				 	 			if(price==""||price==0){

						 	 		 $('#price').css('border','1px solid #f09784');
						 	 		  $('#price').focus();
						 	 		  $('#price_errs').html("Required");
						 	 		valid_res = 1;
						 	 	}
						 	 	if(status==""){
						 	 		 $('#status').css('border','1px solid #f09784');
						 	 		  $('#status').focus();
						 	 		 $('#status_err').html("Required");
						 	 		valid_res = 1;
						 	 	}
						 	 	if(lotSize==""){
						 	 		 $('#lotSize').css('border','1px solid #f09784');
						 	 		 $('#lotSize').focus();
						 	 		 $('#lotSize_err').html("Required");
						 	 		valid_res = 1;

						 	 	}
						 	 	if(title==""){
						 	 		$('#title').css('border','1px solid #f09784');
						 	 		$('#title').focus();
						 	 		$('#title_err').html("Required");
						 	 		valid_res = 1;
						 	 	}
						 	 	if(description==""){
						 	 		$('#description_res').css('border','1px solid #f09784');
						 	 		$('#description_res').focus();
						 	 		$('#description_res_err').html("Required");
							 	 	valid_res = 1;
						 	 	}
						 	 	if(valid_res == 1){
						 	 			$('#step3').removeClass('active');
						 	 			$('#step2').addClass('active');
						 	 			$('#litop2').removeClass('complete');
								 	 	$('#litop3').removeClass('active');
								 	 	$('#litop2').addClass('active');
								 	 	$("#nextbutton").html('Next<i class="icon-arrow-right icon-on-right"></i>');
						 	 		 return false;

						 	 	}else{
						 	 		valuediv++;
								 	$("#div_val").val(valuediv);
								 	//alert(valuediv);
								 	$('#step2').removeClass('active');
						 	 		$('#step3').addClass('active');
						 	 		$('#litop2').addClass('complete');
							 	 	$('#litop3').removeClass('complete');
							 	 	$('#litop3').addClass('active');
							 	 	$("#nextbutton").html('Finish<i class="icon-arrow-right icon-on-right"></i>');
								 	return true;
						 	 	}

					 	 }
					 	 if(valuediv==3){

					 	 	//alert($('#id-date-picker-2').val());

					 	 	//$('#validation-form').submit();
					 	 		var intedescription = $("#intedescription").val();
					 	 		var intesqFeet = $("#intesqFeet").val();
					 	 		var intebeds = $("#intebeds").val();
					 	 		var intebaths= $("#intebaths").val();
					 	 		if(intedescription==""){
					 	 			 $('#intedescription').css('border','1px solid #f09784');
					 	 			 $('#intedescription').focus();
					 	 			 $('#intedescription_err').html("Required");
						 	 		valid_res = 1;

					 	 		}
					 	 		if(intesqFeet==""){
					 	 			 $('#intesqFeet').css('border','1px solid #f09784');
					 	 			 $('#intesqFeet').focus();
					 	 			 $('#intesqFeet_err').html("Required");
						 	 		valid_res = 1;
					 	 		}
					 	 		if(intebeds==""){
					 	 			 $('#intebeds').css('border','1px solid #f09784');
					 	 			 $('#intebeds').focus();
					 	 			 $('#intebeds_err').html("Required");
						 	 		valid_res = 1;
					 	 		}
					 	 		if(intebaths==""){
					 	 			 $('#intebaths').css('border','1px solid #f09784');
					 	 			 $('#intebaths').focus();
					 	 			 $('#intebaths_err').html("Required");
						 	 		valid_res = 1;
					 	 		}
					 	 		if(valid_res == 0){


					 	 			$('#validation-form').submit();
					 	 		}
					 	 		//$('#validation-form').submit();

						}



					}else{
						if(prod_type==15 ||prod_type==16 ||prod_type==12 ||prod_type==17 ||prod_type==18 ||prod_type==64 ||prod_type==13 ||prod_type==14 ||
			        			prod_type==22 ||prod_type==23 ||prod_type==21 ||prod_type==24 ||prod_type==30 ||prod_type==93 ||prod_type==65 ||prod_type==32 ||
			        			prod_type==32 ||prod_type==29 ||prod_type==31 ||prod_type==28 ||prod_type==27 ||prod_type==25 ||prod_type==26 ||prod_type==66 ||
			        			prod_type==33 ||prod_type==96 ||prod_type==95 ||prod_type==94 ||prod_type==34 ||prod_type==97 ||prod_type==35 ||
			        			prod_type==80 ||prod_type==20 ||prod_type==19 ||prod_type==81 ||prod_type==79 ||prod_type==41 ||prod_type==39 ||prod_type==36 ||
			        			prod_type==43 ||prod_type==38 ||prod_type==40 ||prod_type==44 ||prod_type==42 ||prod_type==37){

											if(valuediv==1){
									 	valuediv++;
									 	$("#div_val").val(valuediv);
									 	$("#typeId_common").val(prod_type);
									 	return true;
								 	 	}
								 	 	if(valuediv==2){



										 	var street1_common=$("#street1_common").val();
										 	var state_common=$("#state_common").val();
										 	var city_common=$("#city_common").val();
										 	var zip_common=$("#zip_common").val();
										 	var status_common=$("#status_common").val();
										 	var price_common=$("#price_common").val();
										 	var lotSize_common=$("#lotSize_common").val();
										 	var title_common=$("#title_common").val();
										 	var description_common=$("#description_common").val();
										 	var filetoupload_common=$("#filetoupload_common").val();
									 	 	if(street1_common==""){
									 	 		 $('#street1_common').css('border','1px solid #f09784');
									 	 		  $('#street1_common').focus();
									 	 		  $('#street1_common_err').html("Required");
									 	 		valid_res = 1;
								 	 		}
								 	 		if(state_common==""){
									 	 		 $('#state_common').css('border','1px solid #f09784');
									 	 		 $('#state_common').focus();
									 	 		 $('#state_common_err').html("Required");
									 	 		valid_res = 1;
								 	 		}
								 	 		if(city_common==""){
									 	 		 $('#city_common').css('border','1px solid #f09784');
									 	 		 $('#city_common').focus();
									 	 		 $('#city_common_err').html("Required");
									 	 		valid_res = 1;
								 	 		}
								 	 		if(zip_common==""){
								 	 		 $('#zip_common').css('border','1px solid #f09784');
								 	 		 $('#zip_common').focus();
								 	 		 $('#zip_common_err').html("Required");
								 	 			valid_res = 1;
									 	 	}
									 	 	if(status_common==""){
									 	 		 $('#status_common').css('border','1px solid #f09784');
									 	 		 $('#street1_common').focus();
									 	 		 $('#status_common').html("Required");
									 	 		valid_res = 1;

									 	 	}
									 	 	if(price_common=="" || price_common==0){
									 	 		 $('#price_common').css('border','1px solid #f09784');
									 	 		 $('#price_common').focus();
									 	 		 $('#price_err').html("Required");
									 	 		valid_res = 1;
									 	 	}
									 	 	if(lotSize_common==""){
									 	 		$('#lotSize_common').css('border','1px solid #f09784');
									 	 		$('#lotSize_common').focus();
									 	 		$('#lotSize_common_err').html("Required");
									 	 		valid_res = 1;
									 	 	}
									 	 	if(title_common==""){
									 	 		$('#title_common').css('border','1px solid #f09784');
									 	 		$('#title_common').focus();
									 	 		$('#title_common_err').html("Required");
									 	 		valid_res = 1;
									 	 	}
									 	 	if(description_common==""){
									 	 		$('#description_common').css('border','1px solid #f09784');
									 	 		$('#description_common').focus();
									 	 		$('#description_common_err').html("Required");
									 	 		valid_res = 1;
									 	 	}
									 	 	if(valid_res ==1){
									 	 		$('#step3').removeClass('active');
						 	 					$('#step2').addClass('active');
						 	 					$('#litop2').removeClass('complete');
										 	 	$('#litop3').removeClass('active');
										 	 	$('#litop2').addClass('active');
										 	 	$("#nextbutton").html('Next<i class="icon-arrow-right icon-on-right"></i>');
						 	 		 			return false;

									 	 	}else{
									 	 		valuediv++;
											 	$("#div_val").val(valuediv);
											 	$("#typeId_com_sale_inte").val(prod_type);
											 	//alert(valuediv);
											 	$('#step2').removeClass('active');
						 	 					$('#step3').addClass('active');
						 	 					$('#litop2').addClass('complete');
										 	 	$('#litop3').removeClass('complete');
										 	 	$('#litop3').addClass('active');
										 	 	$("#nextbutton").html('Finish<i class="icon-arrow-right icon-on-right"></i>');
											 	return true;
									 	 	}

										}
										 if(valuediv==3){
											 	 	var intedescription = $("#intedescription_com_sale").val();
										 	 		var intesqFeet = $("#sqFeet_com_sale_inte").val();
										 	 		/*var intebeds = $("#intebeds").val();
										 	 		var intebaths= $("#intebaths").val();*/
										 	 		if(intedescription==""){
										 	 			 $('#intedescription_com_sale').css('border','1px solid #f09784');
										 	 			 $('#intedescription_com_sale').focus();
										 	 			 $('#intedescription_com_sale_err').html("Required");
											 	 		valid_res = 1;

										 	 		}
										 	 		if(intesqFeet==""){
										 	 			 $('#sqFeet_com_sale_inte').css('border','1px solid #f09784');
										 	 			 $('#sqFeet_com_sale_inte').focus();
										 	 			 $('#sqFeet_com_sale_inte_err').html("Required");
											 	 		valid_res = 1;
										 	 		}
										 	 		if(valid_res ==0){


										 	 			$('#validation-form').submit();
										 	 		}

									 }

						}else{


						 if(valuediv==1){
						 	valuediv++;
						 	$("#div_val").val(valuediv);
						 	$("#typeId_common").val(prod_type);
						 		$("#nextbutton").html('Finish<i class="icon-arrow-right icon-on-right"></i>');
						 	return true;
					 	 	}
					 	 	if(valuediv==2){


							 	var street1_common=$("#street1_common").val();
							 	var state_common=$("#state_common").val();
							 	var city_common=$("#city_common").val();
							 	var zip_common=$("#zip_common").val();
							 	var status_common=$("#status_common").val();
							 	var price_common=$("#price_common").val();
							 	var lotSize_common=$("#lotSize_common").val();
							 	var title_common=$("#title_common").val();
							 	var description_common=$("#description_common").val();
							 	var filetoupload_common=$("#filetoupload_common").val();
						 	 	if(street1_common==""){
						 	 		 $('#street1_common').css('border','1px solid #f09784');
						 	 		 $('#street1_common').focus();
						 	 		  $('#street1_common_err').html("Required");
						 	 		  $('#step3').removeClass('active');
						 	 		  $('#step2').addClass('active');
						 	 		  $('#litop2').removeClass('complete');
								 	 	$('#litop3').removeClass('active');
								 	 	$('#litop2').addClass('active');

						 	 		return false;
						 	 	}else if(state_common==""){
						 	 		 $('#state_common').css('border','1px solid #f09784');
						 	 		 $('#state_common').focus();
						 	 		 $('#state_common_err').html("Required");
						 	 		   $('#step3').removeClass('active');
						 	 		  $('#step2').addClass('active');
						 	 		  $('#litop2').removeClass('complete');
								 	 	$('#litop3').removeClass('active');
								 	 	$('#litop2').addClass('active');
						 	 		return false;
					 	 		}else if(city_common==""){
						 	 		 $('#city_common').css('border','1px solid #f09784');
						 	 		 $('#city_common').focus();
						 	 		 $('#city_common_err').html("Required");
						 	 		 $('#step3').removeClass('active');
						 	 		 $('#step2').addClass('active');
						 	 		 $('#litop2').removeClass('complete');
								 	 	$('#litop3').removeClass('active');
								 	 	$('#litop2').addClass('active');
						 	 		return false;
					 	 		}else if(zip_common==""){
					 	 		 	$('#zip_common').css('border','1px solid #f09784');
					 	 		 	$('#zip_common').focus();
					 	 		 	$('#zip_common_err').html("Required");
					 	 		   	$('#step3').removeClass('active');
					 	 		  	$('#step2').addClass('active');
					 	 		  	$('#litop2').removeClass('complete');
								 	 	$('#litop3').removeClass('active');
								 	 	$('#litop2').addClass('active');
					 	 		return false;
						 	 	}else if(status_common==""){
						 	 		 $('#status_common').css('border','1px solid #f09784');
						 	 		 $('#status_common').focus();
						 	 		 $('#step3').removeClass('active');
	 	 		  					 $('#step2').addClass('active');
	 	 		  					 $('#litop2').removeClass('complete');
								 	 	$('#litop3').removeClass('active');
								 	 	$('#litop2').addClass('active');
						 	 		return false;

						 	 	}else if(price_common=="" || price_common==0){
						 	 		 $('#price_common').css('border','1px solid #f09784');
						 	 		 $('#price_common').focus();
						 	 		  $('#price_err').html("Required");
						 	 		   $('#step3').removeClass('active');
	 	 		  					 $('#step2').addClass('active');

						 	 		return false;
						 	 	}else if(lotSize_common==""){
						 	 		$('#lotSize_common').css('border','1px solid #f09784');
						 	 		$('#lotSize_common').focus();
						 	 		$('#lotSize_common_err').html("Required");
						 	 		$('#step3').removeClass('active');
	 	 		  					 $('#step2').addClass('active');
						 	 		$('#litop2').removeClass('complete');
								 	 	$('#litop3').removeClass('active');
								 	 	$('#litop2').addClass('active');
						 	 		return false;
						 	 	}else if(title_common==""){
						 	 		$('#title_common').css('border','1px solid #f09784');
						 	 		$('#title_common').focus();
						 	 		$('#title_common_err').html("Required");
						 	 		 $('#step3').removeClass('active');
	 	 		  					 $('#step2').addClass('active');
	 	 		  					 	$('#litop2').removeClass('complete');
								 	 	$('#litop3').removeClass('active');
								 	 	$('#litop2').addClass('active');
						 	 		return false;
						 	 	}else if(description_common==""){
						 	 		$('#description_common').css('border','1px solid #f09784');
						 	 		$('#description_common').focus();
						 	 		$('#description_common_err').html("Required");
						 	 		 $('#step3').removeClass('active');
	 	 		  					 $('#step2').addClass('active');
	 	 		  					 	$('#litop2').removeClass('complete');
								 	 	$('#litop3').removeClass('active');
								 	 	$('#litop2').addClass('active');
						 	 		return false;


						 	 	}else{
						 	 		 $('#step3').removeClass('active');
	 	 		  					 $('#step2').addClass('active');
						 	 		/*valuediv++;
								 	$("#div_val").val(valuediv);*/
								 	$('#fuelux-wizard').ace_wizard().on('change' , function(e, info){

								}).on('stepclick', function(e){
									//return false;//prevent clicking on steps
								});
								$('#validation-form').submit();
								 	return true;

						 	 	}
					 	 }
						// if(valuediv==3){
						// 	/*$("#com_sale_nointe").show();*/
						//  	valuediv++;
						//  	$('#validation-form').submit();
						//  	return true;
						//  }

					}
				}

				}else{
					if(prod_type==57 || prod_type==56 || prod_type==67 ){
						 if(valuediv==1){
						 	valuediv++;
						 	$("#div_val").val(valuediv);
						 //	alert(valuediv);
						 	return true;
					 	 	}
					 	 	if(valuediv==2){
							 	var street1_rent_diff=$("#street1_rent_diff").val();
							 	var state_rent_diff=$("#state_rent_diff").val();
							 	var city_rent_diff=$("#city_rent_diff").val();
							 	var zip_rent_diff=$("#zip_rent_diff").val();
							 	var title_rent_diff=$("#title_rent_diff").val();
							 	var description_rent_diff=$("#description_rent_diff").val();
						 	 	if(street1_rent_diff==""){
						 	 		 $('#street1_rent_diff').css('border','1px solid #f09784');
						 	 		 $('#street1_rent_diff').focus();
						 	 		 $('#street1_rent_diff_err').html("Required");
						 	 		valid_res = 1;
					 	 		}
					 	 		if(state_rent_diff==""){
						 	 		$('#state_rent_diff').css('border','1px solid #f09784');
						 	 		$('#state_rent_diff').focus();
						 	 		 $('#state_rent_diff_err').html("Required");
						 	 		valid_res = 1;
						 	 	}
						 	 	if(city_rent_diff==""){
						 	 		$('#city_rent_diff').css('border','1px solid #f09784');
						 	 		$('#city_rent_diff').focus();
						 	 		 $('#city_rent_diff_err').html("Required");
						 	 		valid_res = 1;
					 	 		}
					 	 		if(zip_rent_diff==""){
						 	 		$('#zip_rent_diff').css('border','1px solid #f09784');
						 	 		$('#zip_rent_diff').focus();
						 	 		 $('#zip_rent_diff_err').html("Required");
						 	 		valid_res = 1;
						 	 	/*}else if(status_diff==""){
						 	 		 $('#status_diff').css('border','1px solid #f09784');
						 	 		return false;

						 	 	}else if(price_diff==""){
						 	 		 $('#price_diff').css('border','1px solid #f09784');
						 	 		return false;
						 	 	}*/
						 	 	}
						 	 	if(title_rent_diff==""){
						 	 		$('#title_rent_diff').css('border','1px solid #f09784');
						 	 		$('#title_rent_diff').focus();
						 	 		 $('#title_rent_diff_err').html("Required");
						 	 		valid_res = 1;
						 	 	}
						 	 	if(description_rent_diff==""){
						 	 		$('#description_rent_diff').css('border','1px solid #f09784');
						 	 		$('#description_rent_diff').focus();
						 	 		$('#description_rent_diff_err').html("Required");
						 	 		valid_res = 1;

						 	 	}if(valid_res ==1){
						 	 			$('#step3').removeClass('active');
				 	 					$('#step2').addClass('active');
				 	 						$('#litop2').removeClass('complete');
								 	 	$('#litop3').removeClass('active');
								 	 	$('#litop2').addClass('active');
								 	 		$("#nextbutton").html('Next<i class="icon-arrow-right icon-on-right"></i>');
				 	 		 			return false;


						 	 	}else{
						 	 		valuediv++;
								 	$("#div_val").val(valuediv);
								 	$('#step2').removeClass('active');
			 	 					$('#step3').addClass('active');
			 	 					$('#litop2').addClass('complete');
							 	 	$('#litop3').removeClass('complete');
							 	 	$('#litop3').addClass('active');
							 	 		$("#nextbutton").html('Finish<i class="icon-arrow-right icon-on-right"></i>');
								 	return true;
						 	 	}
					 	 }if(valuediv==3){
					 	 		var intedescription_rent_dff = $("#intedescription_rent_dff").val();
					 	 		var intesqFeet_rent_dff = $("#intesqFeet_rent_dff").val();
					 	 		var intebeds_rent_dff = $("#intebeds_rent_dff").val();
					 	 		var intebaths_rent_dff= $("#intebaths_rent_dff").val();
					 	 		var inteprice_rent_dff = $("#inteprice_rent_dff").val();
					 	 		if(intedescription_rent_dff==""){
					 	 			 $('#intedescription_rent_dff').css('border','1px solid #f09784');
					 	 			 $('#intedescription_rent_dff').focus();
					 	 			 $('#intedescription_rent_dff_err').html("Required");
						 	 		valid_res = 1;

					 	 		}
					 	 		if(intesqFeet_rent_dff==""){
					 	 			 $('#intesqFeet_rent_dff').css('border','1px solid #f09784');
					 	 			 $('#intesqFeet_rent_dff').focus();
					 	 			 $('#intesqFeet_rent_dff_err').html("Required");
						 	 		valid_res = 1;
					 	 		}
					 	 		if(intebeds_rent_dff==""){
					 	 			 $('#intebeds_rent_dff').css('border','1px solid #f09784');
					 	 			  $('#intebeds_rent_dff').focus();
					 	 			  $('#intebeds_rent_dff_err').html("Required");
						 	 		valid_res = 1;
					 	 		}
					 	 		if(intebaths_rent_dff==""){
					 	 			 $('#intebaths_rent_dff').css('border','1px solid #f09784');
					 	 			 $('#intebaths_rent_dff').focus();
					 	 			  $('#intebaths_rent_dff_err').html("Required");
						 	 		valid_res = 1;
						 	 	}
						 	 	if(inteprice_rent_dff==""){
						 	 		 $('#inteprice_rent_dff').css('border','1px solid #f09784');
						 	 		 $('#inteprice_rent_dff').focus();
						 	 		  $('#inteprice_rent_dff_err').html("Required");
						 	 		valid_res = 1;
					 	 		}
					 	 		if(valid_res ==0)
					 	 		{

					 	 			$('#validation-form').submit();
					 	 		}

					 	 }




					}else if(prod_type==53 || prod_type==55 || prod_type==54 || prod_type==60 || prod_type==63 || prod_type==62 || prod_type==61 || prod_type==77 ||prod_type==76 ||prod_type==78){
						if(valuediv==1){
						 	valuediv++;
						 	$("#div_val").val(valuediv);
						 	//alert(valuediv);
						 	return true;
						 }
						 if(valuediv==2){
							 	var street1_rent=$("#street1_rent").val();
							 	var state_rent=$("#state_rent").val();
							 	var city_rent=$("#city_rent").val();
							 	var zip_rent=$("#zip_rent").val();
							 	var title_rent=$("#title_rent").val();
							 	var description_rent=$("#description_rent").val();
						 	 	if(street1_rent==""){
						 	 		 $('#street1_rent').css('border','1px solid #f09784');
						 	 		  $('#street1_rent').focus();
						 	 		  $('#street1_rent_err').html("Required");
						 	 		valid_res = 1;
						 	 	}
						 	 	if(state_rent==""){
						 	 		$('#state_rent').css('border','1px solid #f09784');
						 	 		  $('#state_rent').focus();
						 	 		 $('#state_rent_err').html("Required");
						 	 		valid_res = 1;
						 	 	}
						 	 	if(city_rent==""){
						 	 		$('#city_rent').css('border','1px solid #f09784');
						 	 		  $('#city_rent').focus();
						 	 		 $('#city_rent_err').html("Required");
						 	 		valid_res = 1;
						 	 	}else if(zip_rent==""){
						 	 		$('#zip_rent').css('border','1px solid #f09784');
						 	 		 $('#zip_rent').focus();
						 	 		 $('#zip_rent_err').html("Required");
						 	 		valid_res = 1;
				 	 			}else if(title_rent==""){
						 	 		$('#title_rent').css('border','1px solid #f09784');
						 	 		  $('#title_rent').focus();
						 	 		 $('#title_rent_err').html("Required");
						 	 		valid_res = 1;
						 	 	}else if(description_rent==""){
						 	 		$('#description_rent').css('border','1px solid #f09784');
						 	 		  $('#description_rent').focus();
						 	 		$('#description_rent_err').html("Required");
						 	 		valid_res = 1;

						 	 	}
						 	 	if(valid_res ==1){
						 	 		$('#step3').removeClass('active');
			 	 					$('#step2').addClass('active');
			 	 						$('#litop2').removeClass('complete');
								 	 	$('#litop3').removeClass('active');
								 	 	$('#litop2').addClass('active');
								 	 		$("#nextbutton").html('Next<i class="icon-arrow-right icon-on-right"></i>');
			 	 					return false;

						 	 	}else{
						 	 		valuediv++;
								 	$("#div_val").val(valuediv);
								 	$('#step2').removeClass('active');
			 	 					$('#step3').addClass('active');
								 	$('#litop2').addClass('complete');
							 	 	$('#litop3').removeClass('complete');
							 	 	$('#litop3').addClass('active');
							 	 		$("#nextbutton").html('Finish<i class="icon-arrow-right icon-on-right"></i>');
								 	return true;
						 	 	}

					 	 }
					 	 if(valuediv==3){
					 	 		var intedescription_rent = $("#intedescription_rent").val();
					 	 		var intesqFeet_rent = $("#intesqFeet_rent").val();
					 	 		var intebeds_rent = $("#intebeds_rent").val();
					 	 		var intebaths_rent= $("#intebaths_rent").val();
					 	 		var inteprice_rent = $("#inteprice_rent").val();
					 	 		if(intedescription_rent==""){
					 	 			 $('#intedescription_rent').css('border','1px solid #f09784');
					 	 			 $('#intedescription_rent').focus();
					 	 			 $('#intedescription_rent_err').html("Required");
						 	 		valid_res = 1;

					 	 		}
					 	 		if(intesqFeet_rent==""){
					 	 			 $('#intesqFeet_rent').css('border','1px solid #f09784');
					 	 			  $('#intesqFeet_rent').focus();
					 	 			  $('#intesqFeet_rent_err').html("Required");
						 	 		valid_res = 1;
					 	 		}
					 	 		if(intebeds_rent==""){
					 	 			 $('#intebeds_rent').css('border','1px solid #f09784');
					 	 			 $('#intebeds_rent').focus();
					 	 			 $('#intebeds_rent_err').html("Required");
						 	 		valid_res = 1;
					 	 		}
					 	 		if(intebaths==""){
					 	 			 $('#intebaths').css('border','1px solid #f09784');
					 	 			  $('#intebaths').focus();
					 	 			  $('#intebaths_err').html("Required");
						 	 		valid_res = 1;
						 	 	}
						 	 	if(inteprice_rent==""){
						 	 		 $('#inteprice_rent').css('border','1px solid #f09784');
						 	 		 $('#inteprice_rent').focus();
						 	 		  $('#inteprice_rent_err').html("Required");
						 	 		valid_res = 1;
					 	 		}
					 	 		if(valid_res ==0){

					 	 			$('#validation-form').submit();
					 	 		}
					 	 		//$('#validation-form').submit();

						}



					}else{
						if(prod_type==15 ||prod_type==16 ||prod_type==12 ||prod_type==17 ||prod_type==18 ||prod_type==64 ||prod_type==13 ||prod_type==14 ||
			        			prod_type==22 ||prod_type==23 ||prod_type==21 ||prod_type==24 ||prod_type==30 ||prod_type==93 ||prod_type==65 ||prod_type==32 ||
			        			prod_type==32 ||prod_type==29 ||prod_type==31 ||prod_type==28 ||prod_type==27 ||prod_type==25 ||prod_type==26 ||prod_type==66 ||
			        			prod_type==33 ||prod_type==96 ||prod_type==95 ||prod_type==94 ||prod_type==34 ||prod_type==97 ||prod_type==35 ||
			        			prod_type==80 ||prod_type==20 ||prod_type==19 ||prod_type==81 ||prod_type==79 ||prod_type==41 ||prod_type==39 ||prod_type==36 ||
			        			prod_type==43 ||prod_type==38 ||prod_type==40 ||prod_type==44 ||prod_type==42 ||prod_type==37){
									if(valuediv==1){
								 	valuediv++;
								 	$("#div_val").val(valuediv);
								 	$("#typeId_rent_common").val(prod_type);
								 	return true;
							 	 	}
							 	 	if(valuediv==2){
									 	var street1_rent_common=$("#street1_rent_common").val();
								 		var state_rent_common=$("#state_rent_common").val();
								 		var city_rent_common=$("#city_rent_common").val();
						 				var zip_rent_common=$("#zip_rent_common").val();
									 	var price_rent_common=$("#price_rent_common").val();
									 	var price_rent_common=$("#price_rent_common").val();
									 	var lotSize_rent_common=$("#lotSize_rent_common").val();
									 	var title_rent_common=$("#title_rent_common").val();
									 	var description_rent_common=$("#description_rent_common").val();
									 	var filetoupload_common=$("#id-input-file-comsale").val();
								 	 	if(street1_rent_common==""){
								 	 		 $('#street1_rent_common').css('border','1px solid #f09784');
								 	 		 $('#street1_rent_common').focus();
								 	 		 $('#street1_rent_common_err').html("Required");
								 	 		valid_res = 1;

								 	 	}
								 	 	if(state_rent_common==""){
								 	 		 $('#state_rent_common').css('border','1px solid #f09784');
								 	 		  $('#state_rent_common').focus();
								 	 		 $('#state_rent_common_err').html("Required");
								 	 		valid_res = 1;
								 	 	}
								 	 	if(city_rent_common==""){
								 	 		 $('#city_rent_common').css('border','1px solid #f09784');
								 	 		  $('#city_rent_common').focus();
								 	 		 $('#city_rent_common_err').html("Required");
								 	 		valid_res = 1;
								 	 	}
								 	 	if(zip_rent_common==""){
								 	 		 $('#zip_rent_common').css('border','1px solid #f09784');
								 	 		  $('#zip_rent_common').focus();
								 	 		 $('#zip_rent_common_err').html("Required");
								 	 		valid_res = 1;
								 	 	}
								 	 	if(price_rent_common==""){
								 	 		 $('#price_rent_common').css('border','1px solid #f09784');
								 	 		  $('#price_rent_common').focus();
								 	 		 $('#price_rent_common_err').html("Required");
								 	 		valid_res = 1;
								 	 	}
								 	 	if(lotSize_rent_common==""){
								 	 		$('#lotSize_rent_common').css('border','1px solid #f09784');
								 	 		$('#lotSize_rent_common').focus();
								 	 		$('#lotSize_rent_common_err').html("Required");
								 	 		valid_res = 1;
								 	 	}
								 	 	if(title_rent_common==""){
								 	 		$('#title_rent_common').css('border','1px solid #f09784');
								 	 		$('#title_rent_common').focus();
								 	 		$('#title_rent_common_err').html("Required");
								 	 		valid_res = 1;
								 	 	}
								 	 	if(description_rent_common==""){
								 	 		$('#description_rent_common').css('border','1px solid #f09784');
								 	 		$('#description_rent_common_err').focus();
								 	 		$('#description_rent_common_err').html("Required");
								 	 		valid_res = 1;
								 	 	}
								 	 	if(valid_res ==1){
								 	 			$('#step3').removeClass('active');
						 	 					$('#step2').addClass('active');
						 	 					$('#litop2').removeClass('complete');
										 	 	$('#litop3').removeClass('active');
										 	 	$('#litop2').addClass('active');
										 	 		$("#nextbutton").html('Next<i class="icon-arrow-right icon-on-right"></i>');
						 	 					return false;

								 	 	}else{
								 	 		valuediv++;
										 	$("#div_val").val(valuediv);
										 	$("#typeId_com_rent_inte").val(prod_type);
										 	$('#step2').removeClass('active');
			 	 							$('#step3').addClass('active');


								 	 	$('#litop2').addClass('complete');
							 	 	$('#litop3').removeClass('complete');
							 	 	$('#litop3').addClass('active');
							 	 		$("#Finish").html('Next<i class="icon-arrow-right icon-on-right"></i>');
										 	return true;
								 	 	}

								 	 }
								 	 if(valuediv==3){

								 	 	var intedescription_rent = $("#intedescription_com_rent").val();
							 	 		var intesqFeet_rent = $("#sqFeet_com_rent_inte").val();
							 	 		/*var intebeds_rent = $("#intebeds_rent").val();*/
							 	 		var sqFeet_com_rent_inte= $("#sqFeet_com_rent_inte").val();
							 	 		var inteprice_rent = $("#price_com_rent_inte").val();
							 	 		if(intedescription_rent==""){
							 	 			 $('#intedescription_com_rent').css('border','1px solid #f09784');
							 	 			 $('#intedescription_com_rent').focus();
							 	 			 $('#intedescription_com_rent_err').html("Required");
								 	 		valid_res = 1;
							 	 		}
							 	 		if(inteprice_rent==""){
								 	 		//alert();
								 	 		 $('#price_com_rent_inte').css('border','1px solid #f09784');
								 	 		 $('#price_com_rent_inte').focus();
								 	 		 $('#price_com_rent_inte_err').html("Required");
								 	 		valid_res = 1;
							 	 		}
							 	 		if(intesqFeet_rent==""){
							 	 			 $('#sqFeet_com_rent_inte').css('border','1px solid #f09784');
							 	 			 $('#sqFeet_com_rent_inte').focus();
							 	 			 $('#sqFeet_com_rent_inte_err').html("Required");
								 	 		valid_res = 1;

							 	 		}

							 	 		if(valid_res ==0){

							 	 			$('#validation-form').submit();
							 	 		}
								 	 }

						}else{

						 if(valuediv==1){
						 	valuediv++;
						 	$("#div_val").val(valuediv);
						 	$("#typeId_rent_common").val(prod_type);

						 		$("#typeId_rent_common").val(prod_type);
						 			$("#nextbutton").html('Finish<i class="icon-arrow-right icon-on-right"></i>');
						 	return true;
					 	 	}
					 	 	if(valuediv==2){

							 	var street1_rent_common=$("#street1_rent_common").val();
							 	var state_rent_common=$("#state_rent_common").val();
						 		var city_rent_common=$("#city_rent_common").val();
				 				var zip_rent_common=$("#zip_rent_common").val();
							 	var price_rent_common=$("#price_rent_common").val();
							 	var price_rent_common=$("#price_rent_common").val();
							 	var lotSize_rent_common=$("#lotSize_rent_common").val();
							 	var title_rent_common=$("#title_rent_common").val();
							 	var description_rent_common=$("#description_rent_common").val();
							 	//var filetoupload_common=$("#file_com_rent").val();
						 	 	if(street1_rent_common==""){
						 	 		 $('#street1_rent_common').css('border','1px solid #f09784');
						 	 		  $('#street1_rent_common').focus();
						 	 		  $('#street1_rent_common_err').html("Required");
						 	 		  $('#step3').removeClass('active');
						 	 			$('#step2').addClass('active');
						 	 				$('#litop2').removeClass('complete');
								 	 	$('#litop3').removeClass('active');
								 	 	$('#litop2').addClass('active');
						 	 		return false;
					 	 		}else if(state_rent_common==""){
						 	 		 $('#state_rent_common').css('border','1px solid #f09784');
						 	 		  $('#state_rent_common').focus();
						 	 		 $('#state_rent_common_err').html("Required");
						 	 		 $('#step3').removeClass('active');
						 	 		$('#step2').addClass('active');
						 	 			$('#litop2').removeClass('complete');
								 	 	$('#litop3').removeClass('active');
								 	 	$('#litop2').addClass('active');
						 	 		return false;
						 	 	}else if(city_rent_common==""){
						 	 		 $('#city_rent_common').css('border','1px solid #f09784');
						 	 		  $('#city_rent_common').focus();
						 	 		 $('#city_rent_common_err').html("Required");
						 	 		 $('#step3').removeClass('active');
						 	 		$('#step2').addClass('active');
						 	 			$('#litop2').removeClass('complete');
								 	 	$('#litop3').removeClass('active');
								 	 	$('#litop2').addClass('active');
						 	 		return false;
						 	 	}else if(zip_rent_common==""){
						 	 		 $('#zip_rent_common').css('border','1px solid #f09784');
						 	 		  $('#zip_rent_common').focus();
						 	 		 $('#zip_rent_common_err').html("Required");
						 	 		 $('#step3').removeClass('active');
						 	 		$('#step2').addClass('active');
						 	 			$('#litop2').removeClass('complete');
								 	 	$('#litop3').removeClass('active');
								 	 	$('#litop2').addClass('active');
						 	 		return false;
						 	 	}else if(status_common==""){
						 	 		 $('#status_common').css('border','1px solid #f09784');
						 	 		 $('#status_common').focus();
						 	 		 $('#status_common_err').html("Required");
						 	 		 $('#step3').removeClass('active');
						 	 		$('#step2').addClass('active');
						 	 			$('#litop2').removeClass('complete');
								 	 	$('#litop3').removeClass('active');
								 	 	$('#litop2').addClass('active');
						 	 		return false;

						 	 	}else if(price_rent_common==""){
						 	 		 $('#price_rent_common').css('border','1px solid #f09784');
						 	 		  $('#price_rent_common').focus();
						 	 		  $('#price_rent_common_err').html("Required");
						 	 		  $('#step3').removeClass('active');
						 	 			$('#step2').addClass('active');
						 	 				$('#litop2').removeClass('complete');
								 	 	$('#litop3').removeClass('active');
								 	 	$('#litop2').addClass('active');
						 	 		return false;
						 	 	}else if(lotSize_rent_common==""){
						 	 		$('#lotSize_rent_common').css('border','1px solid #f09784');
						 	 		  $('#lotSize_rent_common').focus();
						 	 		$('#lotSize_rent_common_err').html("Required");
						 	 		$('#step3').removeClass('active');
						 	 		$('#step2').addClass('active');
						 	 			$('#litop2').removeClass('complete');
								 	 	$('#litop3').removeClass('active');
								 	 	$('#litop2').addClass('active');
						 	 		return false;
						 	 	}else if(title_rent_common==""){
						 	 		$('#title_rent_common').css('border','1px solid #f09784');
						 	 		 $('#title_rent_common').focus();
						 	 		$('#title_rent_common_err').html("Required");
						 	 		$('#step3').removeClass('active');
						 	 		$('#step2').addClass('active');
						 	 			$('#litop2').removeClass('complete');
								 	 	$('#litop3').removeClass('active');
								 	 	$('#litop2').addClass('active');
						 	 		return false;
						 	 	}else if(description_rent_common==""){
						 	 		$('#description_rent_common').css('border','1px solid #f09784');
						 	 		$('#description_rent_common').focus();
						 	 		$('#description_rent_common_err').html("Required");
						 	 		$('#step3').removeClass('active');
						 	 		$('#step2').addClass('active');
						 	 			$('#litop2').removeClass('complete');
								 	 	$('#litop3').removeClass('active');
								 	 	$('#litop2').addClass('active');
						 	 		return false;

						 	 	}else{
						 	 		 $('#step3').removeClass('active');
	 	 		  					 $('#step2').addClass('active');
								 	 	$('#fuelux-wizard').ace_wizard().on('change' , function(e, info){

										}).on('stepclick', function(e){
											//return false;//prevent clicking on steps
										});
										$('#validation-form').submit();
										 	return true;

						 	 	}

						 	 }
						 	 /*if(valuediv==3){

							 	valuediv++;
							 	$('#validation-form').submit();
							 	return true;
							 }*/
					 	 }

					}
				}


			});

				$( "#prevbutton" ).click(function() {
					var valuedivpre=parseInt($("#div_val").val());
					if(valuedivpre==2){
						valuedivpre--;
						 	$("#div_val").val(valuedivpre);
						 	$('#step3').removeClass('active');
						 	$('#step2').removeClass('active');
						 	$('#step1').addClass('active');
					}
					if(valuedivpre==3){
						valuedivpre--;
						 	$("#div_val").val(valuedivpre);
						 	$('#step3').removeClass('active');
						 	$('#step2').addClass('active');
						 	$('#step1').removeClass('active');
						 	//alert(valuedivpre);
					}



				});
 				$(".priceall").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
			        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
			             // Allow: Ctrl+A, Command+A
			            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) ||
			             // Allow: home, end, left, right, down, up
			            (e.keyCode >= 35 && e.keyCode <= 40)) {
			                 // let it happen, don't do anything
			                 return;
			        }
			        // Ensure that it is a number and stop the keypress
			        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
			            e.preventDefault();
			        }
			    });

			    $('#city_common').hide();
			    $('#zip_common').hide();
			    $('#city_diff').hide();
			    $('#zip_diff').hide();
			    $('#city_rent_common').hide();
			    $('#zip_rent_common').hide();
		    	$('#city_rent_diff').hide();
		    	$('#zip_rent_diff').hide();
		    	$('#city').hide();
		    	$('#zip').hide();
		    	$('#city_rent').hide();
				$('#zip_rent').hide();
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
									        			$('#city_common').show();
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
										        			$('#zip_common').show();
										                    $('#zip_common').html(data.html);

										                } else {
										                	//alert('error');
										                }
										        }
										    });
					});

	////////////////////////////////////////////////////////////////////
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
									        			$('#city_diff').show();
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
										        			$('#zip_diff').show();
										                    $('#zip_diff').html(data.html);

										                } else {
										                	//alert('error');
										                }
										        }
										    });
					});

		////////////////////////////////////////////////////////////////////
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
									        			$('#city_rent_common').show();
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
										        			$('#zip_rent_common').show();
										                    $('#zip_rent_common').html(data.html);

										                } else {
										                	//alert('error');
										                }
										        }
										    });
					});
				 //////////////////////////////////////////////////////////////
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
									        			$('#city_rent_diff').show();
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
										        			$('#zip_rent_diff').show();
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
									        			$('#city').show();
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
										        			$('#zip').show();
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
									        			$('#city_rent').show();
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
										        			$('#zip_rent').show();
										                    $('#zip_rent').html(data.html);

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


				//dynamically change allowed formats by changing before_change callback function
				$('#id-file-formatressale').removeAttr('checked').on('change', function() {
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
					var file_input = $('#id-input-file-ressale');
					file_input.ace_file_input('update_settings', {'before_change':before_change, 'btn_choose': btn_choose, 'no_icon':no_icon})
					file_input.ace_file_input('reset_input');
				});


				$('#id-input-file-comsalediff').ace_file_input({
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


				//dynamically change allowed formats by changing before_change callback function
				$('#id-file-formatcomsalediff').removeAttr('checked').on('change', function() {
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
					var file_input = $('#id-input-file-comsalediff');
					file_input.ace_file_input('update_settings', {'before_change':before_change, 'btn_choose': btn_choose, 'no_icon':no_icon})
					file_input.ace_file_input('reset_input');
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


				//dynamically change allowed formats by changing before_change callback function
				$('#id-file-formatresrent').removeAttr('checked').on('change', function() {
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
					var file_input = $('#id-input-file-resrent');
					file_input.ace_file_input('update_settings', {'before_change':before_change, 'btn_choose': btn_choose, 'no_icon':no_icon})
					file_input.ace_file_input('reset_input');
				});


				$('#id-input-file-resrentinte').ace_file_input({
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


				//dynamically change allowed formats by changing before_change callback function
				$('#id-file-formatresrentinte').removeAttr('checked').on('change', function() {
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
					var file_input = $('#id-file-formatresrentinte');
					file_input.ace_file_input('update_settings', {'before_change':before_change, 'btn_choose': btn_choose, 'no_icon':no_icon})
					file_input.ace_file_input('reset_input');
				});



				$('#id-input-file-ressaleinte').ace_file_input({
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


				//dynamically change allowed formats by changing before_change callback function
				$('#id-file-formatressaleinte').removeAttr('checked').on('change', function() {
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
					var file_input = $('#id-file-formatressaleinte');
					file_input.ace_file_input('update_settings', {'before_change':before_change, 'btn_choose': btn_choose, 'no_icon':no_icon})
					file_input.ace_file_input('reset_input');
				});


	///////////////////////////////// DIFF SALE INTE //////////////////////
	///
	///
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


				//dynamically change allowed formats by changing before_change callback function
				$('#id-file-formatdiff_sale').removeAttr('checked').on('change', function() {
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
					var file_input = $('#id-file-formatdiff_sale');
					file_input.ace_file_input('update_settings', {'before_change':before_change, 'btn_choose': btn_choose, 'no_icon':no_icon})
					file_input.ace_file_input('reset_input');
				});

			///////////////////////////////// COM SALE INTE //////////////////////
	///
	///
			$('#id-input-file-com_sale_inte').ace_file_input({
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


				//dynamically change allowed formats by changing before_change callback function
				$('#id-file-formatcom_sale_inte').removeAttr('checked').on('change', function() {
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
					var file_input = $('#id-file-formatcom_sale_inte');
					file_input.ace_file_input('update_settings', {'before_change':before_change, 'btn_choose': btn_choose, 'no_icon':no_icon})
					file_input.ace_file_input('reset_input');
				});

				///////////////////////////////// COM RENT //////////////////////
	///
	///
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


				//dynamically change allowed formats by changing before_change callback function
				$('#id-file-formatcom_rent').removeAttr('checked').on('change', function() {
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
					var file_input = $('#id-file-formatcom_rent');
					file_input.ace_file_input('update_settings', {'before_change':before_change, 'btn_choose': btn_choose, 'no_icon':no_icon})
					file_input.ace_file_input('reset_input');
				});


				///////////////////////////////// DIFF RENT //////////////////////
	///
	///
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


				//dynamically change allowed formats by changing before_change callback function
				$('#id-file-formatrent_diff').removeAttr('checked').on('change', function() {
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
					var file_input = $('#id-file-formatrent_diff');
					file_input.ace_file_input('update_settings', {'before_change':before_change, 'btn_choose': btn_choose, 'no_icon':no_icon})
					file_input.ace_file_input('reset_input');
				});



				///////////////////////////////// DIFF RENT INTE //////////////////////
	///
	///
			$('#id-input-file-diff_rent_inte').ace_file_input({
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


				//dynamically change allowed formats by changing before_change callback function
				$('#id-file-formatdiff_rent_inte').removeAttr('checked').on('change', function() {
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
					var file_input = $('#id-file-formatdiff_rent_inte');
					file_input.ace_file_input('update_settings', {'before_change':before_change, 'btn_choose': btn_choose, 'no_icon':no_icon})
					file_input.ace_file_input('reset_input');
				});

				$('#id-input-file-com_rent_inte').ace_file_input({
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

<!-- Mirrored from 192.69.216.111/themes/preview/ace/form-wizard.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 05 Oct 2013 16:11:59 GMT -->
</html>
