	<?php $this->load->view('admin/admin_header'); ?>
		<?php $this->load->view('admin/admin_sidebar'); ?>
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
								Agent Management

							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
										<h4 class="pink">
											<i class="icon-hand-right green"></i>
											<a class="blue" href="<?php echo base_url(); ?>admin/addAgents"> Add an Agent </a>
										</h4>
								<!-- PAGE CONTENT BEGINS -->
						<div class="col-sm-12 widget-container-span ui-sortable">
										<div class="widget-box">
											<div class="widget-header">
												<h5 class="smaller">Agents</h5>

												<div class="widget-toolbar no-border">
	</div>
</div>

<div class="widget-body">
<div class="widget-main padding-6">
<div class="tab-content">
<div class="tab-pane in active" id="com">



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
														<th>Name</th>
														<th class="hidden-480">Email</th>

														<!-- <th>
															<i class="icon-time bigger-110 hidden-480"></i>
															Update
														</th> -->
														<th class="hidden-480">Number</th>

														<th></th>
													</tr>
												</thead>

												<tbody>
												<?php if ($result) {
    foreach ($result as $res) {
        ?>
													<tr>
														<!-- <td class="center">
															<label>
																<input type="checkbox" class="ace" value="1" />
																<span class="lbl"></span>
															</label>
														</td> -->

														<td>
															<?php if ('' != $res->profile_pic) {?>
															<a href="#"><img style="width:100px; height:100 px;" src="<?php echo base_url(); ?>uploads/<?php echo $res->profile_pic; ?>" alt=""/></a>
														<?php } else {?>
															<a href="#"><img style="width:100px; height:100 px;" src="<?php echo base_url(); ?>uploads/no-image.png">
														<?php } ?>
														</td>
														<td><?php echo $res->fullname; ?></td>
														<td class="hidden-480"><?php echo $res->email; ?></td>
														<!-- <td>Feb 12</td> -->

														<td class="hidden-480">
															<!-- <span class="label label-sm label-warning">Expiring</span> -->
															<?php echo $res->number; ?>
														</td>

														<td>
															<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
																<!-- <a class="blue" href="#">
																	<i class="icon-zoom-in bigger-130"></i>
																</a> -->

															<a class="green" href="<?php echo base_url(); ?>admin/updateProfile?id=<?php echo $res->id; ?>">
																<i class="icon-pencil bigger-130"></i>
															</a>

																<a class="red" href="<?php echo base_url(); ?>admin/deleteAgents?id=<?php echo $res->id; ?>">
																	<i class="icon-trash bigger-130"></i>
																</a>
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

																		<li>
																			<a href="<?php echo base_url(); ?>admin/updateProfile?id=<?php echo $res->id; ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="icon-edit bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="<?php echo base_url(); ?>admin/deleteAgents?id=<?php echo $res->id; ?>" class="tooltip-error" data-rel="tooltip" title="Delete">
																				<span class="red">
																					<i class="icon-trash bigger-120"></i>
																				</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</div>
														</td>
													</tr>
													<?php
    }
}
?>

												</tbody>
											</table>
										</div>
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



		</script>
	</body>

<!-- Mirrored from 192.69.216.111/themes/preview/ace/tables.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 05 Oct 2013 16:11:33 GMT -->
</html>
