<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

				<div class="sidebar" id="sidebar">
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
					</script>

					<div class="sidebar-shortcuts" id="sidebar-shortcuts">
						<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
							<button class="btn btn-success">
								<i class="icon-signal"></i>
							</button>

							<button class="btn btn-info">
								<i class="icon-pencil"></i>
							</button>

							<button class="btn btn-warning">
								<i class="icon-group"></i>
							</button>

							<button class="btn btn-danger">
								<i class="icon-cogs"></i>
							</button>
						</div>

						<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
							<span class="btn btn-success"></span>

							<span class="btn btn-info"></span>

							<span class="btn btn-warning"></span>

							<span class="btn btn-danger"></span>
						</div>
					</div><!-- #sidebar-shortcuts -->

					<ul class="nav nav-list">
						<li>
							<a href="<?php echo base_url();?>admin/propertySaleList">
								<i class="icon-dashboard"></i>
								<span class="menu-text"> Dashboard </span>
							</a>
						</li>
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-home"></i>
								<span class="menu-text">Properties List </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
                                                		</li>
                                                        		<li>
                                                        		<a href="<?php echo base_url();?>admin/propAdd">
                                                                		<i class="icon-home"></i>
                                                                		<span class="menu-text"> Add Property </span>
                                                        		</a>
                                                		</li>
								<li>
									<a href="<?php echo base_url();?>admin/propertySaleList">
										<i class="icon-double-angle-right"></i>
										For Sale
									</a>
								</li>

								<li>
									<a href="<?php echo base_url();?>index.php/admin/propertyRentList">
										<i class="icon-double-angle-right"></i>
										For Rent
									</a>
								</li>

								
							</ul>
						</li>
						<?php if($this->session->userdata('id')==1){?>
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-group"></i>
								<span class="menu-text">Agents </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="<?php echo base_url();?>admin/addAgents">
										<i class="icon-plus-sign bigger-120 green"></i>
										Add Agents
									</a>
								</li>

								<li>
									<a href="<?php echo base_url();?>index.php/admin/manageAgents">
										<i class="icon-double-angle-right"></i>
										Manage agents
									</a>
								</li>

								
							</ul>
						</li>
						<?php } ?>
						<?php if($this->session->userdata('id')&& $this->session->userdata('id')!=1){?>
							<li>
							<a href="<?php echo base_url();?>admin/updateProfile">
								<i class="icon-text-width"></i>
								<span class="menu-text"> Update profile </span>
							</a>
						</li>
						<?php }?>
						<li>
							<a href="<?php echo base_url();?>admin/changePwd">
								<i class="icon-key"></i>
								<span class="menu-text"> Change Password </span>
							</a>
						<?php if($this->session->userdata('id')==1){?>
						<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>

										<span class="menu-text">Customization</span>
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										
										<li>
											<a href="#" class="dropdown-toggle">
												<i class="icon-book"></i>
												<span class="menu-text">Pages </span>

												<b class="arrow icon-angle-down"></b>
											</a>

											<ul class="submenu">
												<li>
													<a href="<?php echo base_url();?>admin/pages">
														<i class="icon-plus-sign bigger-120 green"></i>
														About us
													</a>
												</li>

												<li>
													<a href="<?php echo base_url();?>index.php/admin/footer">
														<i class="icon-double-angle-right"></i>
														Footer
													</a>
												</li>

												
											</ul>
										</li>

										<li>
											<a href="#" class="dropdown-toggle">
												<i class="icon-adjust"></i>

												Colors
												<b class="arrow icon-angle-down"></b>
											</a>

											<ul class="submenu">
												<li>
													<a href="<?php echo base_url();?>admin/pageConfigHeader">
														<i class="icon-adjust"></i>
														Header
													</a>
												</li>

												<li>
													<a href="<?php echo base_url();?>index.php/admin/pageConfigFooter">
														<i class="icon-adjust"></i>
														Footer
													</a>
												</li>
												<li>
													<a href="<?php echo base_url();?>index.php/admin/hyperLinkColor">
														<i class="icon-adjust"></i>
														Hyperlink
													</a>
												</li>
												<li>
													<a href="<?php echo base_url();?>index.php/admin/btnColor">
														<i class="icon-adjust"></i>
														Button
													</a>
												</li>
												<li>
													<a href="<?php echo base_url();?>index.php/admin/bannerColor">
														<i class="icon-adjust"></i>
														Banner Color
													</a>
												</li>
											</ul>
										</li>
										<li>
											<a href="<?php echo base_url();?>index.php/admin/adTitle">
											<i class="icon-plus-sign bigger-120 green"></i>
											Title
											</a>
										</li>
										<li>
											<a href="<?php echo base_url();?>index.php/admin/addLogo">
											<i class="icon-plus-sign bigger-120 green"></i>
											Logo
											</a>
										</li>
										<li>
											<a href="<?php echo base_url();?>index.php/admin/adminCEmail">
											<i class="icon-plus-sign bigger-120 green"></i>
											Contact Email
											</a>
										</li>
										<li>
											<a href="<?php echo base_url();?>index.php/admin/adminCEmailPass">
											<i class="icon-plus-sign bigger-120 green"></i>
											SMTP password
											</a>
										</li>
										<li>
											<a href="<?php echo base_url();?>index.php/admin/officeAddr">
											<i class="icon-plus-sign bigger-120 green"></i>
											Map Location
											</a>
										</li>
									</ul>
								</li>
								<li>
							<a href="<?php echo base_url();?>admin/adminProfile">
								<i class="icon-text-width"></i>
								<span class="menu-text"> Update My profile </span>
							</a>
						</li>
						
						<?php } ?>
					</ul><!-- /.nav-list -->

					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>

					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div>
