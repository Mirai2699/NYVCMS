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
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="resources/assets/plugins/bootstrap-wizard/css/bwizard.min.css" rel="stylesheet" />
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
                            <h4 class="panel-title">Individual</h4>
                        </div>
                        <div class="panel-body">
                            <form action="http://seantheme.com/" method="POST" data-parsley-validate="true" name="form-wizard">
								<div id="wizard">
									<ol>
										<li>
										    Personal Information 
										</li>
										<li>
										    Educational Background
										</li>
										<li>
										    Employment Background
										</li>
										<li>
										    Advocacy
										</li>
										<li>
										    Completed
										</li>
									</ol>
									<!-- begin wizard step-1 -->
									<div class="wizard-step-1">
                                        <fieldset>
                                            <legend class="pull-left width-full">Personal Information</legend>
                                            <!-- begin row -->
                                            <div class="row">
	                                                <!-- begin col-4 -->
	                                                <div class="col-md-4">
														<div class="form-group">
															<label>Name:</label>
															<input type="text" data-parsley-group="wizard-step-1" id="txt_name" placeholder="Name" class="form-control" required />
														</div>
	                                                </div>
	                                                <div class="col-md-2">
														<div class="form-group">
															<label>Birthday:</label>
															<input type="text" data-parsley-group="wizard-step-1" id="date_bday" class="form-control" required />
														</div>
	                                                </div>

	                                          		<div class="col-md-2">
														<div class="form-group">
		                                  				  <label class="col-md-3">Gender:</label>
		                                  				 		<select data-parsley-group="wizard-step-2" class="form-control" id="dd_gender"	required="">
		                                  				 			<option value="" selected disabled>-- Select Gender--</option>
			                                           				<option value="Male">Male</option>
			                                          				<option value="Female">Female</option>
		                                     				   </select>
		                                  				</div>
		                              				 </div>

			                              			<div class="col-md-2">
														<div class="form-group">
															<label>Contact Number:</label>
															<input type="text" data-parsley-group="wizard-step-1" id="txt_conno" placeholder="09123456789" class="form-control" data-parsley-type="number" required />
														</div>
	                                                </div>

	                                                <div class="col-md-3">
														<div class="form-group">
															<label>Email Address:</label>
															<input type="text" data-parsley-group="wizard-step-1" id="txt_email" placeholder="emailaddress@gmail.com" class="form-control" data-parsley-type="email" required />
														</div>
	                                                </div>
	                                                <div class="col-md-4">
														<div class="form-group">
															<label>Name of Family to be notified in case of emergency:</label>
															<input type="text" data-parsley-group="wizard-step-1" id="txt_conper" placeholder="Contact Person" class="form-control" required />
														</div>
                                                	</div>
                                                	 <!-- begin col-4 -->
	                                                <div class="col-md-4">
														<div class="form-group">
															<label>Contact Number(Emergency):</label>
															<input type="text" data-parsley-group="wizard-step-1" id="txt_conperno" placeholder="09123456789" class="form-control" data-parsley-type="number" required />
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
		                                  				 		<select data-parsley-group="wizard-step-2" class="form-control" id="dd_region" required="">
			                                           				<option value="" selected disabled>-- Select Region --</option>
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
	                                                <!-- end col-4 -->
	                                            
	                                            <!-- end col-12 -->
                                            </div>
                                            <!-- end row -->
										</fieldset>
									</div>
									<!-- end wizard step-1 -->

									<!-- begin wizard step-2 -->
									<div class="wizard-step-2">
										<fieldset>
											<legend class="pull-left width-full">Educational Background</legend>
                                            <!-- begin row -->
                                            <div class="row">
                                                <div class="col-md-6">
													<div class="form-group">
														<label>Highest Educational Attainment:</label>
														<input type="text" data-parsley-group="wizard-step-2" id="txt_educattain" placeholder="" class="form-control" required />
													</div>
													<div class="form-group">
														<label>Year Graduated (if undergraduate, use N/A):</label>
														<input type="text" data-parsley-group="wizard-step-2" id="txt_yeargrad" placeholder="" value="N/A" class="form-control" required />
													</div>
                                                </div>
                                                <!-- end col-6 -->
                                                <!-- begin col-6 -->
                                                <div class="col-md-6">
													<div class="form-group">
														<label>Degree Taken:</label>
														<input type="text" data-parsley-group="wizard-step-2" id="txt_degree" placeholder="" value="N/A" class="form-control" required />
													</div>
													<div class="form-group">
														<label>Awards (if graduated, please include awards given if there's any. Otherwise, use N/A):</label>
														<textarea class="form-control" data-parsley-group="wizard-step-2" id="txt_award" value="N/A" placeholder="" rows="5" required></textarea>
													</div>
                                                </div>
                                                <!-- end col-6 -->
	                                        </div>
	                                            <!-- end row -->
										</fieldset>
									</div>
									<!-- end wizard step-2 -->
									<!-- begin wizard step-3 -->
									<div class="wizard-step-3">
										<fieldset>
											<legend class="pull-left width-full">Employment Background <small>(Use N/A if not working)</small></legend>
                                            <!-- begin row -->
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Name of the Company/Institution:</label>
                                                        <div class="controls">
                                                            <input type="text" data-parsley-group="wizard-step-3" id="txt_company" placeholder="" value="N/A" class="form-control" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end col-4 -->
                                                <!-- begin col-4 -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Position:</label>
                                                        <div class="controls">
                                                            <input type="text" data-parsley-group="wizard-step-3" id="txt_position" placeholder="" value="N/A" class="form-control" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end col-6 -->
                                            </div>
                                            <!-- end row -->
                                        </fieldset>
									</div>
									<!-- end wizard step-3 -->
									<!-- begin wizard step-4 -->
									<div class="wizard-step-4">
										<fieldset>
											<legend class="pull-left width-full">Advocacy:</small></legend>
                                            <!-- begin row -->
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <select required id="dd_advoc" data-parsley-group="wizard-step-4" class="form-control" name="mem_advoc">
	                                           				<option value="Health">Health</option>
	                                          				<option value="Education">Education</option>
	                                          				<option value="Economic Empowerment">Economic Empowerment</option>
	                                          				<option value="Social Inclusion and Equity">Social Inclusion and Equity</option>
	                                          				<option value="Peace-building and Security">Peace-building and Security</option>
	                                          				<option value="Governance">Governance</option>
	                                          				<option value="Active Citizenship">Active Citizenship</option>
	                                          				<option value="Empowerment">Empowerment</option>
	                                          				<option value="Global Mobility">Global Mobility</option>
                                     				   </select>
                                                    </div>
                                                </div>
                                                <!-- end col-4 -->
                                            </div>
                                            <!-- end row -->
                                        </fieldset>
									</div>
									<!-- end wizard step-4-->
									<!-- begin wizard step-5 -->
									<div>
									    <div class="jumbotron m-b-0 text-center">
                                            <h3>Implementing Rules and Regulations of the Data Privacy Act of 2012</h3>
                                            <p>By clicking the submission button, it means that you agree to the terms, conditions and provisionaries of the National Privacy Commission in regards to the compliance to the Data Privacy Act of 2012, in terms of collecting personal and senstitive information.</p>
                                            <p>
                                            	<a class="btn btn-primary btn-lg" data-toggle="modal" role="button" href="ui_modal_notification.html#modal-view">View IRR</a>
                                            	<a class="btn btn-success btn-lg" id="btn_addindivmem" role="button">Submit</a>
                                            </p>
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

	<div class='modal fade' id="modal-view">
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
					<h4 class='modal-title text-center'>Implementing Rules and Regulations of the Data Privacy Act of 2012</h4>
				</div>
				<div class="modal-body">
					<div class="alert  m-b-0">
						<p> Pursuant to the mandate of the National Privacy Commission to administer and implement the provisions of the Data Privacy Act of 2012, and to monitor and ensure compliance of the country with international standards set for data protection, the following rules and regulations are hereby promulgated to effectively implement the provisions of the Act:</p>
						<br>
						<strong>This modal discusses only the Section 19: Principles in Collection, Processing and Retention, under the Rule IV: Data Privacy Principles Section 19.</strong>
						<br><br>
						<p>General principles in collection, processing and retention. The processing of personal data shall adhere to the following general principles in the collection, processing, and retention of personal data:</p>
						<br>
						<span class="semi-bold"><em>a. Collection must be for a declared, specified, and legitimate purpose.</em></span>
						<br><br>
						<p>1. Consent is required prior to the collection and processing of personal data, subject to exemptions provided by the Act and other applicable laws and regulations. When consent is required, it must be time-bound in relation to the declared, specified and legitimate purpose. Consent given may be withdrawn. </p>
						<br>
						<p>2. The data subject must be provided specific information regarding the purpose and extent of processing, including, where applicable, the automated processing of his or her personal data for profiling, or processing for direct marketing, and data sharing. </p>
						<br>
						<p>3. Purpose should be determined and declared before, or as soon as reasonably practicable, after collection. </p>
						<br>
						<p>4. Only personal data that is necessary and compatible with declared, specified, and legitimate purpose shall be collected.</p>
						<br>
						<span class="semi-bold"><em>b. Personal data shall be processed fairly and lawfully.</em></span>
						<br><br>
						<p>1. Processing shall uphold the rights of the data subject, including the right to refuse, withdraw consent, or object. It shall likewise be transparent, and allow the data subject sufficient information to know the nature and extent of processing. </p>
						<br>
						<p>2. Information provided to a data subject must always be in clear and plain language to ensure that they are easy to understand and access. </p>
						<br>
						<p>3. Processing must be in a manner compatible with declared, specified, and legitimate purpose.</p>
						<br>
						<p>4. Processed personal data should be adequate, relevant, and limited to what is necessary in relation to the purposes for which they are processed.</p>
						<br>
						<p>5. Processing shall be undertaken in a manner that ensures appropriate privacy and security safeguards.</p>
						<br>
						<span class="semi-bold"><em>c. Processing should ensure data quality.</em></span>
						<br><br>
						<p>1. Personal data should be accurate and where necessary for declared, specified and legitimate purpose, kept up to date. </p>
						<br>
						<p>2. Inaccurate or incomplete data must be rectified, supplemented, destroyed or their further processing restricted.</p>
						<br>
						<span class="semi-bold"><em>d. Personal Data shall not be retained longer than necessary.</em></span>
						<br><br>
						<p>1. Retention of personal data shall only for as long as necessary: </p>
						<br>
						<p>(a) for the fulfillment of the declared, specified, and legitimate purpose, or when the processing relevant to the purpose has been terminated; </p>
						<br>
						<p>(b) for the establishment, exercise or defense of legal claims; or </p>
						<br>
						<p>(c) for legitimate business purposes, which must be consistent with standards followed by the applicable industry or approved by appropriate government agency. </p>
						<br>
						<p>2. Retention of personal data shall be allowed in cases provided by law. </p>
						<br>
						<p>3. Personal data shall be disposed or discarded in a secure manner that would prevent further processing, unauthorized access, or disclosure to any other party or the public, or prejudice the interests of the data subjects.</p>
						<br>
						<span class="semi-bold"><em>e. Any authorized further processing shall have adequate safeguards.</em></span>
						<br><br>
						<p>1. Personal data originally collected for a declared, specified, or legitimate purpose may be processed further for historical, statistical, or scientific purposes, and, in cases laid down in law, may be stored for longer periods, subject to implementation of the appropriate organizational, physical, and technical security measures required by the Act in order to safeguard the rights and freedoms of the data subject. </p>
						<br>
						<p>2. Personal data which is aggregated or kept in a form which does not permit identification of data subjects may be kept longer than necessary for the declared, specified, and legitimate purpose. </p>
						<br>
						<p>3. Personal data shall not be retained in perpetuity in contemplation of a possible future use yet to be determined.</p>
					</div>
				</div>
				<div class="modal-footer">
					<a href='' class='btn btn-sm btn-primary' data-dismiss='modal'>Close</a>
				</div>
			</div>
		</div>
	</div>
	
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
	<script src="resources/assets/plugins/bootstrap-wizard/js/bwizard.js"></script>
	<script src="resources/assets/js/form-wizards-validation.demo.min.js"></script>
	<script src="resources/assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			FormWizardValidation.init();
			$('#date_bday').datepicker({
				dateFormat: "yy-mm-dd",
				changeMonth: true,
				changeYear: true,
				minDate: '-40Y',
				maxDate: '-18Y'
			})
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
    	$('#btn_addindivmem').click(function(){
    		// alert();

    		let name = $('#txt_name').val();
    		let bday = $('#date_bday').val();
    		let gender = $('#dd_gender').val();
    		let conno = $('#txt_conno').val();
    		let email = $('#txt_email').val();
    		let conper = $('#txt_conper').val();
    		let conperno = $('#txt_conperno').val();
    		let barangay = $('#txt_brngy').val();
    		let city = $('#txt_city').val();
    		let province = $('#txt_province').val();
    		let region = $('#dd_region').val();
    		let educattain = $('#txt_educattain').val();
    		let degree = $('#txt_degree').val();
    		let yeargrad = $('#txt_yeargrad').val();
    		let award = $('#txt_award').val();
    		let company = $('#txt_company').val();
    		let position = $('#txt_position').val();
    		let advoc = $('#dd_advoc').val();


    		// alert(name+" | "+age+" | "+gender+" | "+conno+" | "+email+" | "+conper+" | "+conperno+" | "+address+" | "+aduca+" | "++" | "++" | "++" | "++" | "+)

    		$.ajax({
    			type: 'POST',
    			data:{
    					_name:name,
    					_bday:bday,
    					_gender:gender,
    					_conno:conno,
    					_email:email,
    					_conper:conper,
    					_conperno:conperno,
    					_barangay:barangay,
    					_city:city,
    					_province:province,
    					_region:region,
    					_educattain:educattain,
    					_degree:degree,
    					_yeargrad:yeargrad,
    					_award:award,
    					_company:company,
    					_position:position,
    					_advoc:advoc
    				},
    			url: 'functionalities/add_membership_indiv.php',
    			async: false,
    			success: function(data){
    				alert("Membership Registration Created Successfully! Thank you for registering as a member. Please do wait for the confirmation of your application. We will contact you soon.");
    				setTimeout(location.reload.bind(location), 1000)
    			},
    			error: function(reponse){
    				alert('Oops, something went wrong.')
    			}

    		})

    	})
    </script>
</body>
</html>
