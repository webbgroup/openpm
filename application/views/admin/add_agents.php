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
						</ul><!-- .breadcrumb -->


					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								Add Agents

							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
				<div class="col-sm-12 widget-container-span ui-sortable">
										<div class="widget-box">
											

												<div class="widget-header">
												<h5 class="smaller">Add agents</h5>

												<div class="widget-toolbar no-border">
													
														</div>
													</div>

													<div class="widget-body">
													<div class="widget-main padding-6">
													
											
													<form id="agents_form" action="<?php echo base_url(); ?>admin/saveAgents" method="post" enctype="multipart/form-data">
													
												<div class="space-4"></div>
												
												<div class="row">
														<div class="form-group">																						
														<label class="col-sm-3 control-label no-padding-right"> User name</label>
														<div class="col-xs-5 col-sm-4">
																<input id="uname" class="col-xs-10 col-sm-6" type="text" name="uname"  required>	
														</div>
														<div class="col-xs-5 col-sm-4">
																<span class="error_text_username"></span>
														</div>
												
												</div>
												</div>
												
												<div class="space-4"></div>
												<div class="row">
														<div class="form-group">																						
														<label class="col-sm-3 control-label no-padding-right"> Password</label>
														<div class="col-xs-5 col-sm-4">
																<input id="password" class="col-xs-10 col-sm-6" type="text" name="password" required>	
														</div>
												
												</div>
												</div>
												<div class="space-4"></div>
												<div class="row">
														<div class="form-group">																						
														<label class="col-sm-3 control-label no-padding-right"> Full Name</label>
														<div class="col-xs-5 col-sm-4">
						
																<input id="fullname" class="col-xs-10 col-sm-6" type="text" name="fullname" value="" required>	
				
														</div>
												
												</div>
												</div>
												<div class="space-4"></div>
												<div class="row">
														<div class="form-group">																						
														<label class="col-sm-3 control-label no-padding-right"> Email</label>
														<div class="col-xs-5 col-sm-4">

																<input id="email" class="col-xs-10 col-sm-6" type="text" name="email" value="" required>	
													
														</div>
												
												</div>
												</div>
												<div class="space-4"></div>
												<div class="row">
														<div class="form-group">																						
														<label class="col-sm-3 control-label no-padding-right"> Number</label>
														<div class="col-xs-5 col-sm-4">
														
														<!-- <input id="number" class="col-xs-10 col-sm-6" type="text" name="number"> -->	
														<div class="input-group">
																<span class="input-group-addon">
																	<i class="icon-phone"></i>
																</span>

																<input class="col-xs-10 col-sm-6 input-mask-phone" type="text" id="form-field-mask-2" name="number" value="" required/>
															</div>
														</div>
												
												</div>
												</div>
												<div class="space-4"></div>
												<div class="row">
														<div class="form-group">																						
														<label class="col-sm-3 control-label no-padding-right"> Decription</label>
														<div class="col-xs-5 col-sm-4">
															<textarea id="form-field-9" class="form-control limited" maxlength="255" name="description" required></textarea>
														</div>
												
												</div>
												</div>
												<div class="space-4"></div>
												<div class="row">
														<div class="form-group">																						
														<label class="col-sm-3 control-label no-padding-right"> profile Picture</label>
														<div class="col-xs-5 col-sm-2">
														<input type="file" id="id-input-file-user" name="pic" />
														</div>
														</div>
												
												</div>
												</div>
												<div class="space-4"></div>
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
	
		<script src="<?php echo base_url(); ?>assets1/js/fuelux/fuelux.wizard.min.js"></script>
		<script src="<?php echo base_url(); ?>assets1/js/jquery.validate.min.js"></script>
		<script src="<?php echo base_url(); ?>assets1/js/additional-methods.min.js"></script>
		<script src="<?php echo base_url(); ?>assets1/js/bootbox.min.js"></script>
		<script src="<?php echo base_url(); ?>assets1/js/jquery.maskedinput.min.js"></script>
		<script src="<?php echo base_url(); ?>assets1/js/select2.min.js"></script>
		<script src="<?php echo base_url(); ?>assets1/js/date-time/bootstrap-datepicker.min.js"></script>
		<!-- <script src="<?php echo base_url(); ?>assets1/js/dropzone.min.js"></script> -->
		<!-- ace scripts -->

		<script src="<?php echo base_url(); ?>assets1/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url(); ?>assets1/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
		$(function() {
		 var currentDate = new Date();
				$('.date-picker').datepicker({autoclose:true},{ dateFormat: 'yyyy-mm-dd'},{setdate : new Date()}).next().on(ace.click_event, function(){
					$(this).prev().focus();
					
				});
				$(".date-picker").datepicker("setDate", currentDate);
});
		$("#agents_form").validate({
		  submitHandler: function(form) {
		  	
			var username = $('#uname').val();
			var valid = false;
						    	$.ajax({
						        type: 'POST',
						        url: "<?php echo base_url(); ?>admin/validateUsername",
						        cache: false,
						        data:'username='+username,
						        
						        dataType: "json",
						        async : false,
						        	success: function(data) {
						        		if(data.success == "username_exist"){
						                    $('.error_text_username').html('User name already taken');
						                   valid = false;

						                }else {
						                	 $('.error_text_username').html('');
						                	valid = true;
						                }
						        	}

						    });
						    	
				if(valid){
				form.submit();
		  		}
		  }
		});
		</script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.input-mask-phone').mask('(999) 999-9999');
				$('#id-input-file-user').ace_file_input({
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

