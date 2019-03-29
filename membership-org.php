<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>NYVCEMS</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="resources/assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="resources/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="resources/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="resources/assets/css/animate.min.css" rel="stylesheet" />
	<link href="resources/assets/css/style.min.css" rel="stylesheet" />
	<link href="resources/assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="resources/assets/css/theme/default.css" rel="stylesheet" id="theme" />
	<script src="resources/assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="resources/assets/plugins/bootstrap-wizard/css/bwizard.min.css" rel="stylesheet" />
	<link href="resources/assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
	<link href="resources/assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" />
	<link href="resources/assets/plugins/parsley/src/parsley.css" rel="stylesheet" />
	<link href="resources/images/nvyc.png" rel="icon" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="resources/assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-without-sidebar page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar navbar-default navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<a href="homepage.php" class="navbar-brand" style="margin-bottom: 3px">
                        <div class="row" >
                             <img src="resources/images/nvyc.png" style="width: 20%">
                             NYVCEMS
                        </div>
                    </a>
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- end mobile sidebar expand / collapse button -->
				
				
			</div>
			<!-- end container-fluid -->
		</div>
		<!-- end #header -->
		
		
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin page-header -->
			<h1 class="page-header">Membership Form</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
                <!-- begin col-12 -->
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <h4 class="panel-title">Organization</h4>
                        </div>
                        <div class="panel-body">
                            <form action="http://seantheme.com/" method="POST" data-parsley-validate="true" name="form-wizard">
								<div id="wizard">
									<ol>
										<li>
										    Organization Information 
										</li>
										<li>
										    Organizational Background
										</li>
										<li>
										    Completed
										</li>
									</ol>
									<!-- begin wizard step-1 -->
									<div class="wizard-step-1">
                                        <fieldset>
                                            <legend class="pull-left width-full">Organization Information</legend>
                                            <!-- begin row -->
                                            <div class="row">
                                                <!-- begin col-4 -->
                                                <div class="col-md-4">
													<div class="form-group">
														<label>Name of Organization:</label>
														<input type="text" data-parsley-group="wizard-step-1" id="txt_name" placeholder="Name" class="form-control" required />
													</div>
                                                </div>

                                          		<div class="col-md-4">
													<div class="form-group">
														<label>Current Number of Members:</label>
														<input type="text" data-parsley-group="wizard-step-1" id="txt_nummem" placeholder="Number of members" data-parsley-type="digits" class="form-control" data-parsley-required="true" required />
													</div>
                                            	</div>

                                                <div class="col-md-4">
													<div class="form-group">
														<label>Official Org Contact Number:</label>
														<input type="text" id="txt_offconno" data-parsley-group="wizard-step-1" placeholder="" data-parsley-type="number" data-parsley-required="true" class="form-control" required />
													</div>
                                                </div>

                                                <div class="col-md-4">
													<div class="form-group">
														<label>Official Org Email Address:</label>
														<input type="text" data-parsley-type="email" data-parsley-group="wizard-step-1" id="txt_email" placeholder="" class="form-control" data-parsley-required="true" data-parsley-type="email" />
													</div>
                                                </div>
                                            	 <!-- begin col-4 -->
                                                <div class="col-md-4">
													<div class="form-group">
														<label>Name of President/Founder/Representative with Designation:</label>
														<input type="text" id="txt_rep" data-parsley-group="wizard-step-1" name="repre" placeholder="" class="form-control" required />
													</div>
                                                </div>

                                                <div class="col-md-4">
													<div class="form-group">
														<label>Contact Number of(President/Founder/Representative) :</label>
														<input type="text" id="txt_repno" data-parsley-group="wizard-step-1" name="number" placeholder="" class="form-control" data-parsley-type="number" data-parsley-required="true"  required />
													</div>
                                                </div>

                                                <div class="col-md-4">
													<div class="form-group">
														<label>Barangay</label>
														<input type="text" data-parsley-group="wizard-step-1" id="txt_brngy" placeholder="Barangay" class="form-control" required />
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label>City/Municipality</label>
														<input type="text" data-parsley-group="wizard-step-1" id="txt_city" placeholder="City/Municipality" class="form-control" required />
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label>Province</label>
														<input type="text" data-parsley-group="wizard-step-1" id="txt_province" placeholder="Province" class="form-control" required />
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
	                                  				  <label class="col-md-3">Region</label>
	                                  				 		<select required data-parsley-group="wizard-step-2" class="form-control" id="dd_region">
		                                           				<option value="Ilocos Region">Ilocos Region</option>
		                                          				<option value="Cagayan Valley">Cagayan Valley</option>
		                                          				<option value="Central Luzon">Central Luzon</option>
		                                          				<option value="CALABARZON">CALABARZON</option>
		                                          				<option value="MIMAROPA">MIMAROPA</option>
		                                          				<option value="Bicol Region">Bicol Region</option>
		                                          				<option value="CAR">CAR</option>
		                                          				<option value="NCR">NCR</option>
		                                          				<option value="Western Visayas">Western Visayas</option>
		                                          				<option value="Central Visayas">Central Visayas</option>
		                                          				<option value="Eastern Visayas">Eastern Visayas</option>
		                                          				<option value="Zamboanga Peninsula">Zamboanga Peninsula</option>
		                                          				<option value="Northern Mindanao">Northern Mindanao</option>
		                                          				<option value="Davao Region">Davao Region</option>
		                                          				<option value="SOCCSKSARGEN">SOCCSKSARGEN</option>
		                                          				<option value="Caraga Region">Caraga Region</option>
		                                          				<option value="SOCCSKSARGEN">SOCCSKSARGEN</option>
		                                          				<option value="ARMM">ARMM</option>
	                                     				   </select>
	                                  				</div>
	                              				 </div>

	                              				 <div class="col-md-4">
	                                            	<div class="form-group">
					                                    <label class="control-label">Date of Establishment</label>
				                                    	<div class="input-group">
				                                        <input type="date" data-parsley-group="wizard-step-1" class="form-control" id="date_established" placeholder="Date Established" required />
				                                    	</div>
					                                </div>
				                            	</div>
                                                <!-- end col-4 -->
                                            </div>
                                            <!-- end col-12 -->
	                                    </fieldset>
                                    </div>
                                            <!-- end row -->

									<!-- end wizard step-1 -->
									<!-- begin wizard step-2 -->
									<div class="wizard-step-2">
										<fieldset>
											<legend class="pull-left width-full">Organizational Background</legend>
                                            <!-- begin row -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                	<div class="form-group">
		                                  				<label class="col-md-3">Classification:</label>
		                                  				 	<select id="dd_class" class="form-control">
			                                           			<option value="Youth Organization">Youth Organization</option>
			                                          			<option value="Youth-serving Organization">Youth-serving Organization</option>
		                                     				</select>
		                                  				</div>

		                                  			<div class="form-group">
		                                  				<label class="col-md-3">Sub-Classification:</label>
		                                  				 	<select id="dd_subclass" class="form-control">
			                                           			<option value="Community-Based">Community-Based</option>
			                                         			<option value="Faith-Based">Faith-Based</option>
			                                           			<option value="School Based">School-Based</option>
			                                          			<option value="young Professionals/Working Youth">Young Professionals/Working Youth</option>
			                                          			<option value="Out-of-school YOuth">Out-of-School Youth</option>
			                                          			<option value="Youth with Special Needs">Youth with Special Needs</option>
			                                          			<option value="Federation">Federation</option>
		                                     				</select>
		                                  				</div>


													<div class="form-group">
														<label>Advocacy:</label>
															<select id="dd_advoc" class="form-control">
			                                           			<option value="Health">Health</option>
			                                         			<option value="Education">Education</option>
			                                           			<option value="Economic Empowerment">Economic Empowerment</option>
			                                          			<option value="Social Inclusion & Equity">Social Inclusion & Equity</option>
			                                          			<option value="Peace-building & Security">Peace-building & Security</option>
			                                          			<option value="Governance">Governance</option>
			                                          			<option value="Active Citizenship">Active Citizenship</option>
			                                          			<option value="Governance">Empowerment</option>
			                                          			<option value="Governance">Global Mobility</option>
		                                     				</select>
													</div>
			                                    </div>
	                                        </div>
	                                            <!-- end row -->
										</fieldset>
									</div>
									<!-- end wizard step-2 -->
									<!-- begin wizard step-5 -->
									<div>
									    <div class="jumbotron m-b-0 text-center">
                                            <h3>Membership Registration Created Successfully</h3>
                                            <p>Thank you for registering as member. Please do wait for the confirmation of your application,<br> we will contact you soon. :)</p>
                                            <p><a class="btn btn-success btn-lg" id="btn_addorgmem" role="button">Ok</a></p>
                                        </div>
									</div>
									<!-- begin wizard step-5 -->
								</div>
							</form>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
		</div>
		<!-- end #content -->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="resources/assets/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="resources/assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="resources/assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="resources/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="resources/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="resources/assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="resources/assets/plugins/parsley/dist/parsley.js"></script>
	<script src="resources/assets/js/form-wizards.demo.min.js"></script>
	<script src="resources/assets/plugins/bootstrap-wizard/js/bwizard.js"></script>
	<script src="resources/assets/js/form-wizards-validation.demo.min.js"></script>
	<script src="resources/assets/js/form-plugins.demo.min.js"></script>
	<script src="resources/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="resources/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
	<script src="resources/assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			FormWizardValidation.init();
			FormPlugins.init();
		});
	</script>
	<script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-53034621-1', 'auto');
      ga('send', 'pageview');
    </script>

    <script type="text/javascript">
    	$('#btn_addorgmem').click(function(){
    		// alert();

    		let name = $('#txt_name').val();
    		let date = $('#date_established').val();
    		let barangay = $('#txt_brngy').val();
    		let city = $('#txt_city').val();
    		let province = $('#txt_province').val();
    		let region = $('#dd_region').val();
    		let nummem = $('#txt_nummem').val();
    		let orgconno = $('#txt_offconno').val();
    		let orgemail = $('#txt_email').val();
    		let repname = $('#txt_rep').val();
    		let repconno = $('#txt_repno').val();
    		let classification = $('#dd_class').val();
    		let subclass = $('#dd_subclass').val();
    		let advoc = $('#dd_advoc').val();

    		// alert(name+" | "+age+" | "+gender+" | "+conno+" | "+email+" | "+conper+" | "+conperno+" | "+address+" | "+aduca+" | "++" | "++" | "++" | "++" | "+)

    		$.ajax({
    			type: 'POST',
    			data:{
    					_name:name,
    					_date:date,
    					_barangay:barangay,
    					_city:city,
    					_province:province,
    					_region:region,
    					_nummem:nummem,
    					_orgconno:orgconno,
    					_orgemail:orgemail,
    					_repname:repname,
    					_repconno:repconno,
    					_classification:classification,
    					_subclass:subclass,
    					_advoc:advoc
    				},
    			url: 'functionalities/add_membership_org.php',
    			async: false,
    			success: function(data){
    				// alert(data);
    				setTimeout(location.reload.bind(location), 1000)
    			},
    			error: function(reponse){
    				alert('something went wrong')
    			}

    		})

    	})
    </script>
</body>
</html>
