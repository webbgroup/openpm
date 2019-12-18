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
							<li class="active">Dashboard</li>
						</ul><!-- .breadcrumb -->


					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								Property Sale List

							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="alert alert-block alert-success">
									<button type="button" class="close" data-dismiss="alert">
										<i class="icon-remove"></i>
									</button>

									<i class="icon-ok green"></i>

									Welcome to
									<strong class="green">
										OpenPM
										<!-- <small>(v1.2)</small> -->
									</strong>
									<!-- ,
	the lightweight, feature-rich and easy to use admin template. -->
								</div>






						<div class="col-sm-12 widget-container-span ui-sortable">
										<div class="widget-box">
										<h4 class="pink">
											<i class="icon-hand-right green"></i>
											<a class="blue" href="<?php echo base_url(); ?>admin/propAdd"> Add a Property </a>
										</h4>
											<div class="widget-header">
												<h5 class="smaller">For Sale</h5>

												<div class="widget-toolbar no-border">
													<ul id="myTab" class="nav nav-tabs">
<li class="active" id="tab1">
				<a href="#res" data-toggle="tab">Residential</a>
			</li>

			<li id="tab2">
				<a href="#com" data-toggle="tab">Commercial</a>
			</li>

		</ul>
	</div>
</div>

<div class="widget-body">
<div class="widget-main padding-6">
<div class="tab-content">
<div class="tab-pane" id="com">



<div class="table-responsive">
											<table id="sample-table-2" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<!-- <th class="center">
															<label>
																<input type="checkbox" class="ace" name="edit[]" />
																<span class="lbl"></span>
															</label>
														</th> -->
														<th>Image</th>
														<th>Title</th>
														<th class="hidden-480">Description</th>

														<!-- <th>
															<i class="icon-time bigger-110 hidden-480"></i>
															Update
														</th> -->
														<th class="hidden-480">Status</th>

														<th></th>
													</tr>
												</thead>

												<tbody>
												<?php if ($com_property) {
	foreach ($com_property as $com) {
		?>
													<tr>
														<!-- <td class="center">
															<label>
																<input type="checkbox" class="ace" value="1" />
																<span class="lbl"></span>
															</label>
														</td> -->

														<td>
														<?php if ($com['filename'] != "") {
			?>

															<a href="#"><img style="width:200px; height:150 px;" src="<?php echo base_url(); ?>uploads/<?php $ab = explode(",", $com['filename']);
			echo $ab[0];?>" alt=""/></a>
														<?php } else {?>
															<a href="#"><img style="width:200px; height:150 px;" src="<?php echo base_url(); ?>uploads/no-image.png">
														<?php }
		?>
														</td>
														<td><?php echo $com['title']; ?><br /></td>
														<td class="hidden-480"><?php echo $com['description']; ?></td>
														<!-- <td>Feb 12</td> -->

														<td class="hidden-480">
															<span class="label label-sm label-warning"><?php echo $com['status']; ?></span>
														</td>

														<td>
															<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
																<!-- <a class="blue" href="#">
																	<i class="icon-zoom-in bigger-130"></i>
																</a> -->
																<?php
if ($com['uId'] == $this->session->userdata('id') || $this->session->userdata('id') == 1) {?>
																<a class="green" href="<?php echo base_url(); ?>admin/propertyComEdit?id=<?php echo $com['commId']; ?>&type=<?php echo $com['typeId']; ?>&forSale=<?php echo $com['forSale'] ?>">
																	<i class="icon-pencil bigger-130"></i>
																</a>

																<a class="red" href="<?php echo base_url(); ?>admin/propertyComDel?id=<?php echo $com['commId']; ?>&forSale=<?php echo $com['forSale'] ?>">
																	<i class="icon-trash bigger-130"></i>
																</a>
																<?php }
		?>
															</div>

															<div class="visible-xs visible-sm hidden-md hidden-lg">
																<div class="inline position-relative">
																	<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
																		<i class="icon-caret-down icon-only bigger-120"></i>
																	</button>

																	<ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
																		<!-- <li>
																			<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																				<span class="blue">
																					<i class="icon-zoom-in bigger-120"></i>
																				</span>
																			</a>
																		</li> -->
																																				<?php
if ($com['uId'] == $this->session->userdata('id') || $this->session->userdata('id') == 1) {?>
																		<li>
																			<a href="<?php echo base_url(); ?>admin/propertyComEdit?id=<?php echo $com['commId']; ?>&type=<?php echo $com['typeId']; ?>&forSale=<?php echo $com['forSale'] ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="icon-edit bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="<?php echo base_url(); ?>admin/propertyComDel?id=<?php echo $com['commId']; ?>&forSale=<?php echo $com['forSale'] ?>" class="tooltip-error" data-rel="tooltip" title="Delete">
																				<span class="red">
																					<i class="icon-trash bigger-120"></i>
																				</span>
																			</a>
																		</li>
																		<?php }
		?>
																	</ul>
																</div>
															</div>
														</td>
													</tr>
													<?php }
}
?>

												</tbody>
											</table>
										</div>
</div>

<div class="tab-pane in active" id="res">

		<div class="table-responsive">
											<table id="sample-table-3" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<!-- <th class="center">
															<label>
																<input type="checkbox" class="ace" value="1"/>
																<span class="lbl"></span>
															</label>
														</th> -->
														<th>Image</th>
														<th>Title</th>
														<th class="hidden-480">Description</th>

														<!-- <th>
															<i class="icon-time bigger-110 hidden-480"></i>
															Update
														</th> -->
														<th class="hidden-480">Status</th>

														<th></th>
													</tr>
												</thead>

												<tbody>
												<?php if ($res_property) {
	foreach ($res_property as $res) {
		?>
													<tr>
														<!-- <td class="center">
															<label>
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td> -->

														<td>
															<a href="#"><img style="width:200px; height:150 px;" src="<?php echo base_url(); ?>uploads/<?php $pic_ar = explode(",", $res['filename']);
		echo $pic_ar[0];?>" alt=""/></a>
														</td>
														<td><?php echo $res['title']; ?></td>
														<td class="hidden-480"><?php echo $res['description']; ?></td>
														<!-- <td>Feb 12</td> -->

														<td class="hidden-480">
															<span class="label label-sm label-warning"><?php echo $res['status']; ?></span>
														</td>

														<td>
															<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
																<!-- <a class="blue" href="#">
																	<i class="icon-zoom-in bigger-130"></i>
																</a> -->
																<?php
if ($res['uId'] == $this->session->userdata('id') || $this->session->userdata('id') == 1) {?>
																<a class="green" href="<?php echo base_url(); ?>admin/propertyEdit?id=<?php echo $res['resId']; ?>&type=<?php echo $res['typeId']; ?>&forSale=<?php echo $res['forSale'] ?>">
																	<i class="icon-pencil bigger-130"></i>
																</a>

																<a class="red" href="<?php echo base_url(); ?>admin/propertyResDel?id=<?php echo $res['resId']; ?>&forSale=<?php echo $res['forSale'] ?>">
																	<i class="icon-trash bigger-130"></i>
																</a>
																<?php }
		?>
															</div>

															<div class="visible-xs visible-sm hidden-md hidden-lg">
																<div class="inline position-relative">
																	<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
																		<i class="icon-caret-down icon-only bigger-120"></i>
																	</button>

																	<ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
																		<!-- <li>
																			<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																				<span class="blue">
																					<i class="icon-zoom-in bigger-120"></i>
																				</span>
																			</a>
																		</li>
																		 -->

																		 <?php
if ($res['uId'] == $this->session->userdata('id') || $this->session->userdata('id') == 1) {?>
																		<li>
																			<a href="<?php echo base_url(); ?>admin/propertyEdit?id=<?php echo $res['resId']; ?>&type=<?php echo $res['typeId']; ?>&forSale=<?php echo $res['forSale'] ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="icon-edit bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="<?php echo base_url(); ?>admin/propertyResDel?id=<?php echo $res['resId']; ?>&forSale=<?php echo $res['forSale'] ?>" class="tooltip-error" data-rel="tooltip" title="Delete">
																				<span class="red">
																					<i class="icon-trash bigger-120"></i>
																				</span>
																			</a>
																		</li>
																		<?php }
		?>
																	</ul>
																</div>
															</div>
														</td>
													</tr>
													<?php }}
?>

												</tbody>
											</table>
										</div>
</div>
</div>
<div class="edit_form_block"></div>

													</div>
												</div>
											</div>
										</div>
									</div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->


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
			window.jQuery || document.write("<script src='<?php echo base_url(); ?>assets1/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='<?php echo base_url(); ?>assets1/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url(); ?>assets1/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets1/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<script src="<?php echo base_url(); ?>assets1/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url(); ?>assets1/js/jquery.dataTables.bootstrap.js"></script>

		<!-- ace scripts -->

		<script src="<?php echo base_url(); ?>assets1/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url(); ?>assets1/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->

		<script type="text/javascript">
			jQuery(function($) {
				var oTable1 = $('#sample-table-2').dataTable( {
				"aoColumns": [
			      { "bSortable": false },
			      null, null,null,
				  { "bSortable": false }
				] } );


				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});

				});


				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();

					var off2 = $source.offset();
					var w2 = $source.width();

					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			})
			jQuery(function($) {
				var oTable1 = $('#sample-table-3').dataTable( {
				"aoColumns": [
			      { "bSortable": false },
			      null, null,null,
				  { "bSortable": false }
				] } );


				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});

				});


				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();

					var off2 = $source.offset();
					var w2 = $source.width();

					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			})
		</script>
	</body>

<!-- Mirrored from 192.69.216.111/themes/preview/ace/tables.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 05 Oct 2013 16:11:33 GMT -->
</html>
