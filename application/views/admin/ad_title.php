<?php $this->load->view('admin/admin_header');?>
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
						</ul><!-- .breadcrumb -->


					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
							Customization

							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
				<div class="col-sm-12 widget-container-span ui-sortable">
										<div class="widget-box">
											

												<div class="widget-header">
												<h5 class="smaller">Title</h5>

												<div class="widget-toolbar no-border">
													
														</div>
													</div>

													<div class="widget-body">
													<div class="widget-main padding-6">
													
												<div class="space-4"></div>
												
												<div class="row">
														<div class="form-group">																						
														<label class="col-sm-3 control-label no-padding-right"> Site Title</label>
														<div class="col-xs-5 col-sm-4">
																
																<input id="title" class="col-xs-10 col-sm-6" type="text" name="title"  required>
															
														</div>
														<div class="col-xs-5 col-sm-4">
																<p id="error_text_username" style="color:red"></p>
														</div>
												
												</div>
												</div>
												<div class="space-4"></div>
												<div class="row">
														<div class="form-group">																						
														<label class="col-sm-3 control-label no-padding-right"> </label>
														<div class="col-xs-5 col-sm-4">
																	<button class="btn btn-success" id="btn_title" type="submit"> Save </button>
														</div>
												
												</div>
												</div>
												
												<div class="space-4"></div>
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
		<script src="<?php echo base_url();?>assets1/js/bootstrap-colorpicker.min.js"></script>
		<script src="<?php echo base_url();?>assets1/js/bootbox.min.js"></script>
		<!-- <script src="<?php echo base_url();?>assets1/js/dropzone.min.js"></script> -->
		<!-- ace scripts -->
		
		<script src="<?php echo base_url();?>assets1/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url();?>assets1/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			$(document).ready(function(){
				
		  		$("#btn_title").click(function(){
		  				var title = $('#title').val();
		  				if(title==""){
		  					$('#error_text_username').html('Required');
		  					return false;
		  					}else{
		  					
		  				$.ajax({
						        type: 'POST',
						        url: "<?php echo base_url();?>admin/saveTitle",
						        cache: false,
						        data:'title='+title,
						        
						        dataType: "json",
						        async : false,
						        	success: function(data) {
						        		if(data.success == "yes"){
						                 /* bootbox.dialog({
                                      message: "Title Added", 
                                      buttons: {
                                        "success" : {
                                          "label" : "OK",
                                          "className" : "btn-sm btn-primary"
                                        }
                                      }
                                    });*/
		  							location.reload(true);
						                }else {
						                	
						                }
						        	}

			

						});
		  			}

		  		})
			/*var password = $('#password').val();
			var new_pass = $("#newpwd").val();
			var c_pass = $("#cnewpwd").val();
			var valid1 = false;
			var valid2 =false;
				$.ajax({
						        type: 'POST',
						        url: "<?php echo base_url();?>admin/validateOldPassword",
						        cache: false,
						        data:'password='+password,
						        
						        dataType: "json",
						        async : false,
						        	success: function(data) {
						        		if(data.success == "password_correct"){
						                    $('.error_text_username').html('Old password is correct');
						                   valid1 = true;

						                }else {
						                	 $('.error_text_username').html('Wrong Password');
						                	valid1 = false;
						                }
						        	}

			

		});*/
	
});
		</script>
	</body>

<!-- Mirrored from 192.69.216.111/themes/preview/ace/blank.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 05 Oct 2013 16:13:16 GMT -->
</html>

