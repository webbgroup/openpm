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

							<li class="active">
								<a href="#">Pages</a>
							</li>
							<!-- <li class="active">Contents</li> -->
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
							<!-- <h1>Contents</h1> -->
						</div><!-- /.page-header -->
						
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form id="addpage2" action="<?php echo base_url(); ?>admin/updateFooterPageContent" method="post" enctype="multipart/form-data">
								<div class="row">
								<?php if ($contents) {
    foreach ($contents as $cnt) {
    } ?>
								<h4 class="header green clearfix">
									Contents
									<span class="block pull-right">
										<small class="grey middle">Choose style: &nbsp;</small>

										<span class="btn-toolbar inline middle no-margin">
											<span data-toggle="buttons" class="btn-group no-margin">
												<label class="btn btn-sm btn-yellow">
													1
													<input type="radio" value="1" />
												</label>

												<label class="btn btn-sm btn-yellow active">
													2
													<input type="radio" value="2" />
												</label>

												<label class="btn btn-sm btn-yellow active">
													3
													<input type="radio" value="3" />
												</label>
											</span>
										</span>
									</span>
								</h4>

								<div class="wysiwyg-editor"  id="editor1"><?php echo $cnt->content; ?></div>
								<div class="space-4"></div>
								<div class="row">
														<div class="form-group">																						
														<label class="col-sm-3 control-label no-padding-right"> Title</label>
														<div class="col-xs-5 col-sm-4">
																<input id="title" class="col-xs-10 col-sm-6" type="text" name="title" value="<?php echo $cnt->title; ?>" required>	
														</div>
												
												</div>
												</div>
												<div class="space-4"></div>
													<div class="row">
													<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right"> </label>
														<div class="col-xs-5 col-sm-4">
														<input type="file" id="up_file" name="up_file"/>
														<div class="space-4"></div>
														<img id="img_disp" style="display: none;width:150px;height:150px"/>
													</div>
												</div>
												</div>

								
								<div class="space-4"></div>
								<div class="row">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right"> </label>
										<div class="col-xs-5 col-sm-4">
											<input class="btn btn-success" id="addpage_btn" type="button" value="Save">
										</div>
										</div>
										</div>
									<div class="hr hr-double dotted"></div>
									<?php
}?>
								
								<script type="text/javascript">
									var $path_assets = "assets1";//this will be used in loading jQuery UI if needed!
								</script>
								<textarea id="page_content" name="content" style="display:none;"></textarea>
								</form>
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

	<script src="../../../../ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url(); ?>assets1//js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='<?php echo base_url(); ?>assets1//js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url(); ?>assets1//js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets1//js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<script src="<?php echo base_url(); ?>assets1//js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="<?php echo base_url(); ?>assets1//js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?php echo base_url(); ?>assets1//js/markdown/markdown.min.js"></script>
		<script src="<?php echo base_url(); ?>assets1//js/markdown/bootstrap-markdown.min.js"></script>
		<script src="<?php echo base_url(); ?>assets1//js/jquery.hotkeys.min.js"></script>
		<script src="<?php echo base_url(); ?>assets1//js/bootstrap-wysiwyg.min.js"></script>
		<script src="<?php echo base_url(); ?>assets1//js/bootbox.min.js"></script>

		<!-- ace scripts -->

		<script src="<?php echo base_url(); ?>assets1//js/ace-elements.min.js"></script>
		<script src="<?php echo base_url(); ?>assets1//js/ace.min.js"></script>

		<!-- inline scripts related to this page -->

		<script type="text/javascript">
			jQuery(function($){

				function readFile(input) {
    			if ( input.files && input.files[0] ) {
		        var FR= new FileReader();
		        FR.onload = function(e) {
		        	$('#img_disp').show();
		             $('#img_disp').attr( "src", e.target.result );
		             $('#base_sale').text( e.target.result );
		        };       
		        FR.readAsDataURL( input.files[0] );
		    }
		}

		$("#up_file").change(function(){
		    readFile( this );
		});
		
	
	function showErrorAlert (reason, detail) {
		var msg='';
		if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
		else {
			console.log("error uploading file", reason, detail);
		}
		$('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+ 
		 '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
	}

	//$('#editor1').ace_wysiwyg();//this will create the default editor will all buttons

	//but we want to change a few buttons colors for the third style
	$('#editor1').ace_wysiwyg({
		toolbar:
		[
			'font',
			null,
			'fontSize',
			null,
			{name:'bold', className:'btn-info'},
			{name:'italic', className:'btn-info'},
			{name:'strikethrough', className:'btn-info'},
			{name:'underline', className:'btn-info'},
			null,
			{name:'insertunorderedlist', className:'btn-success'},
			{name:'insertorderedlist', className:'btn-success'},
			{name:'outdent', className:'btn-purple'},
			{name:'indent', className:'btn-purple'},
			null,
			{name:'justifyleft', className:'btn-primary'},
			{name:'justifycenter', className:'btn-primary'},
			{name:'justifyright', className:'btn-primary'},
			{name:'justifyfull', className:'btn-inverse'},
			null,
			{name:'createLink', className:'btn-pink'},
			{name:'unlink', className:'btn-pink'},
			null,
			{name:'insertImage', className:'btn-success'},
			null,
			'foreColor',
			null,
			{name:'undo', className:'btn-grey'},
			{name:'redo', className:'btn-grey'}
		],
		'wysiwyg': {
			fileUploadError: showErrorAlert
		}
	}).prev().addClass('wysiwyg-style2');

	

	$('#editor2').css({'height':'200px'}).ace_wysiwyg({
		toolbar_place: function(toolbar) {
			return $(this).closest('.widget-box').find('.widget-header').prepend(toolbar).children(0).addClass('inline');
		},
		toolbar:
		[
			'bold',
			{name:'italic' , title:'Change Title!', icon: 'icon-leaf'},
			'strikethrough',
			null,
			'insertunorderedlist',
			'insertorderedlist',
			null,
			'justifyleft',
			'justifycenter',
			'justifyright'
		],
		speech_button:false
	});


	$('[data-toggle="buttons"] .btn').on('click', function(e){
		var target = $(this).find('input[type=radio]');
		var which = parseInt(target.val());
		var toolbar = $('#editor1').prev().get(0);
		if(which == 1 || which == 2 || which == 3) {
			toolbar.className = toolbar.className.replace(/wysiwyg\-style(1|2)/g , '');
			if(which == 1) $(toolbar).addClass('wysiwyg-style1');
			else if(which == 2) $(toolbar).addClass('wysiwyg-style2');
		}
	});


	

	//Add Image Resize Functionality to Chrome and Safari
	//webkit browsers don't have image resize functionality when content is editable
	//so let's add something using jQuery UI resizable
	//another option would be opening a dialog for user to enter dimensions.
	if ( typeof jQuery.ui !== 'undefined' && /applewebkit/.test(navigator.userAgent.toLowerCase()) ) {
		
		var lastResizableImg = null;
		function destroyResizable() {
			if(lastResizableImg == null) return;
			lastResizableImg.resizable( "destroy" );
			lastResizableImg.removeData('resizable');
			lastResizableImg = null;
		}

		var enableImageResize = function() {
			$('.wysiwyg-editor')
			.on('mousedown', function(e) {
				var target = $(e.target);
				if( e.target instanceof HTMLImageElement ) {
					if( !target.data('resizable') ) {
						target.resizable({
							aspectRatio: e.target.width / e.target.height,
						});
						target.data('resizable', true);
						
						if( lastResizableImg != null ) {//disable previous resizable image
							lastResizableImg.resizable( "destroy" );
							lastResizableImg.removeData('resizable');
						}
						lastResizableImg = target;
					}
				}
			})
			.on('click', function(e) {
				if( lastResizableImg != null && !(e.target instanceof HTMLImageElement) ) {
					destroyResizable();
				}
			})
			.on('keydown', function() {
				destroyResizable();
			});
	    }
		
		enableImageResize();

		/**
		//or we can load the jQuery UI dynamically only if needed
		if (typeof jQuery.ui !== 'undefined') enableImageResize();
		else {//load jQuery UI if not loaded
			$.getScript($path_assets+"/js/jquery-ui-1.10.3.custom.min.js", function(data, textStatus, jqxhr) {
				if('ontouchend' in document) {//also load touch-punch for touch devices
					$.getScript($path_assets+"/js/jquery.ui.touch-punch.min.js", function(data, textStatus, jqxhr) {
						enableImageResize();
					});
				} else	enableImageResize();
			});
		}
		*/
	}
$("#addpage_btn").click(function(){
	$("#page_content").val($("#editor1").html());

	$("#addpage2").submit();
});

});

		</script>
	</body>

<!-- Mirrored from 192.69.216.111/themes/preview/ace/wysiwyg.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 05 Oct 2013 16:12:47 GMT -->
</html>
