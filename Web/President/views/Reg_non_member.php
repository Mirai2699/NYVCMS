<?php 
     include ("dbconnection.php");
  
if (isset($_GET['regEvent'])) 
    {
        $ids = $_GET['regEvent'];

    } 
  
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>NYVCMS | Registration</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="resources/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="resources/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="resources/assets/css/animate.min.css" rel="stylesheet" />
	<link href="resources/assets/css/style.min.css" rel="stylesheet" />
	<link href="resources/assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="resources/assets/css/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="resources/assets/plugins/parsley/src/parsley.css" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="resources/assets/plugins/pace/pace.min.js"></script>
    <style>
        .reg{
            display: none
        }
    </style>
	<!-- ================== END BASE JS ================== -->
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed ">	
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			
			<!-- begin page-header -->
			<h1 class="page-header">Event Registration</h1>
			<!-- end page-header -->
			 <div class="panel-body panel-form">
                            <form class="form-horizontal form-bordered" role="form" method="POST">
                                <div class="form-group" id="samp">
									<label class="control-label col-md-4 col-sm-4" for="message">Register as :</label>
									<div class="col-md-6 col-sm-6">
                                        <select class="form-control regType" id="reg" name="nmr_advoc" >
                                   			<option value="Health"></option>
                              				<option value="Member">Member</option>
                              				<option value="Non member">Non member</option>
                              			</select>
									</div>
								</div>
                            </form>
                        </div>
			<div class="row">
                <!-- begin col-6 -->
			    <div class="col-md-10">
			        <!-- begin panel -->
                    <div class="panel panel-inverse  reg" id="member" data-sortable-id="form-validation-1">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            </div>
                            <h4 class="panel-title">Member register</h4>
                        </div>
                        <div class="panel-body panel-form">
                            <form class="form-horizontal form-bordered" role="form" method="POST" action="add_reg_mem.php" >
                                 <div class="form-group">
									<label class="control-label col-md-4 col-sm-4" for="message">Event * :</label>
									<div class="col-md-6">
                                        
                                        <select class="form-control" id="dd_event" name="nmr_event_id" data-parsley-required="true" placeholder="Gender">
                                                                  <?php
                                                                        $view_query = mysqli_query($connection,"SELECT * FROM `ems_r_event` WHERE re_event_id = $ids");
                                                                        while($row = mysqli_fetch_assoc($view_query))
                                                                    {   
                                                                        $e_name = $row["re_event_name"];
                                                                        $e_no = $row["re_event_id"]; 
                                  
                                                                    ?>     
					                                            <option value="<?php echo $e_no; ?>"><?php echo $e_name; ?></option>
                                                                <?php
                                                                     }
                                                                ?> 
                                        </select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4" for="fullname">Name * :</label>
									<div class="col-md-6 col-sm-6">
										<input class="form-control" type="text" id="fullname" name="fullname" placeholder="Required" data-parsley-required="true" />
									</div>
								</div>
                                <div class="form-group">
									<label class="control-label col-md-4 col-sm-4" for="message">Type of payment * :</label>
									<div class="col-md-6 col-sm-6">
                                        <select class="form-control" name="pType" data-parsley-required="true"placeholder="Gender">
		                                           				<option></option>
		                                           				<option value="Onsite">On-site</option>	
		                                           				<option value="Bank">Bank</option>	
                                        </select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4"></label>
									<div class="col-md-6 col-sm-6">
										<button type="submit" name="addRegMem" class="btn btn-primary">Submit </button>
									</div>
								</div>
                            </form>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-6 -->
            </div>
			<div class="row">
                <!-- begin col-6 -->
			    <div class="col-md-10">
			        <!-- begin panel -->
                    <div class="panel panel-inverse  reg" id="nonmember" data-sortable-id="form-validation-1">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            </div>
                            <h4 class="panel-title">Non member register</h4>
                        </div>
                        <div class="panel-body panel-form">
                            <form class="form-horizontal form-bordered" role="form" method="POST" action="add_reg_nonmem.php" >
                                <div class="form-group">
									<label class="control-label col-md-4 col-sm-4" for="message">Event * :</label>
									<div class="col-md-6">
                                        
                                        <select class="form-control" id="dd_event" name="nmr_event_id" placeholder="Gender">
                                                                  <?php
                                                                        $view_query = mysqli_query($connection,"SELECT * FROM `ems_r_event` WHERE re_event_id = $ids");
                                                                        while($row = mysqli_fetch_assoc($view_query))
                                                                    {   
                                                                        $e_name = $row["re_event_name"];
                                                                        $e_no = $row["re_event_id"]; 
                                  
                                                                    ?>     
					                                            <option value="<?php echo $e_no; ?>"><?php echo $e_name; ?></option>
                                                                <?php
                                                                     }
                                                                ?> 
                                        </select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4" for="fullname">Name * :</label>
									<div class="col-md-6 col-sm-6">
										<input class="form-control" type="text" id="fullname" name="nmr_name" placeholder="Required" data-parsley-required="true" />
									</div>
								</div>
                                	<div class="form-group">
									<label class="control-label col-md-4 col-sm-4" for="message">Age * :</label>
									<div class="col-md-6 col-sm-6">
										<input class="form-control" type="text" id="digits" name="nmr_age" data-parsley-type="digits" data-parsley-required="true" placeholder="Age" />
									</div>
								</div>
                                <!-- <div class="form-group">
									<label class="control-label col-md-4 col-sm-4" for="message">Complete Permanent Home Address :</label>
									<div class="col-md-6 col-sm-6">
										<textarea class="form-control" id="message" name="nmr_address" rows="4" data-parsley-range="[5,200]"></textarea>
									</div>
								</div> -->
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4" for="fullname">Barangay * :</label>
									<div class="col-md-6 col-sm-6">
										<input class="form-control" type="text" id="fullname" name="nmr_brgy" placeholder="Required" data-parsley-required="true" />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4" for="fullname">City * :</label>
									<div class="col-md-6 col-sm-6">
										<input class="form-control" type="text" id="fullname" name="nmr_city" placeholder="Required" data-parsley-required="true" />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4" for="fullname">Municipality * :</label>
									<div class="col-md-6 col-sm-6">
										<input class="form-control" type="text" id="fullname" name="nmr_municipality" placeholder="Required" data-parsley-required="true" />
									</div>
								</div>
									<div class="form-group">
                      				  <label class="control-label col-md-4 col-sm-4">Region</label>
                      				  <div class="col-md-6 col-sm-6">
                      				 		<select class="form-control" id="dd_region" name="nmr_region">
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
                                <div class="form-group">
									<label class="control-label col-md-4 col-sm-4" for="message">Birthdate :</label>
									<div class="col-md-6 col-sm-6">
										<input class="form-control" type="text" id="data-phone" data-parsley-type="number" placeholder="yyyy-mm-dd" name="nmr_birthdate" />
									</div>
								</div>
                                	<div class="form-group">
									<label class="control-label col-md-4 col-sm-4" for="message">Gender * :</label>
									<div class="col-md-6 col-sm-6">
                                        <select class="form-control" name="nmr_gender" data-parsley-required="true"placeholder="Gender">
		                                           				<option></option>
		                                           				<option>Male</option>
		                                          				<option>Female</option>
		                                     				   </select>
									</div>
								</div>
                                <div class="form-group">
									<label class="control-label col-md-4 col-sm-4" for="message">Phone :</label>
									<div class="col-md-6 col-sm-6">
										<input class="form-control" type="text" id="data-phone" data-parsley-type="number" placeholder="09XXXXXXXXX" name="nmr_phone"/>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4" for="email">Email Address * :</label>
									<div class="col-md-6 col-sm-6">
										<input class="form-control" type="text" id="email" name="nmr_email" data-parsley-type="email" placeholder="Email" data-parsley-required="true" />
									</div>
								</div>
                                <div class="form-group">
									<label class="control-label col-md-4 col-sm-4" for="message">Advocacy * :</label>
									<div class="col-md-6 col-sm-6">
                                        <select class="form-control" name="nmr_advoc" data-parsley-required="true"placeholder="Gender">
		                                           			<option value="Health">Health</option>
	                                          				<option value="Education">Education</option>
	                                          				<option value="Economic Empowerment">Economic Empowerment</option>
	                                          				<option value="Social Inclusion and Equity">Social Inclusion and Equity</option>
	                                          				<option value="Peace-building and Security">Peace-building and Security</option>
	                                          				<option value="Governance">Governance</option>
	                                          				<option value="Active Citizenship">Active Citizenship</option>
	                                          				<option value="Empowerment">Empowerment</option>
	                                          				<option value="Global Mobility">Global Mobility</option>	                                     				   </select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4" for="email">Name of School/Organization/Institution/Company * :</label>
									<div class="col-md-6 col-sm-6">
										<input class="form-control" type="text" id="email" name="nmr_org" data-parsley-type="email" placeholder="Email" data-parsley-required="true" />
									</div>
								</div>
                                <div class="form-group">
									<label class="control-label col-md-4 col-sm-4" for="message">Choose what you represent * :</label>
									<div class="col-md-6 col-sm-6">
                                        <select class="form-control" name="nmr_represent" data-parsley-required="true"placeholder="Gender">
		                                           				<option>School-based Organization</option>
		                                           				<option>Community-based Organization</option>	
		                                           				<option>Church-based Organization</option>	
		                                           				<option>Young Professionals</option>	
		                                           				<option>Local Youth Development Council (LYDC) Members</option>	
		                                           				<option>Sangguniang Kabataan</option>		                                     				   </select>
									</div>
								</div>
                                
                                <div class="form-group">
									<label class="control-label col-md-4 col-sm-4" for="message">Type of payment * :</label>
									<div class="col-md-6 col-sm-6">
                                        <select class="form-control" name="nmr_payment" data-parsley-required="true"placeholder="Gender">
		                                           				<option></option>
		                                           				<option value="Onsite">On-site</option>	
		                                           				<option value="Bank">Bank</option>	
                                        </select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4"></label>
									<div class="col-md-6 col-sm-6">
										<button type="submit" name="addReg" class="btn btn-primary">Submit </button>
									</div>
								</div>
                            </form>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-6 -->
            </div>
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
	<script src="resources/assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
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
     <script>
        $(".regType").change(function() {
            if(document.getElementById('reg').value != ""){
                
                var sample = $('select#reg').val();
                
                if(sample == "Member"){
                    document.getElementById("member").style.display = "block";
                    document.getElementById("nonmember").style.display = "none";
                    document.getElementById("reg").style.display = "none";
                    document.getElementById("samp").style.display = "none";
                   }
                else if(sample == "Non member"){
                    document.getElementById("member").style.display = "none";
                    document.getElementById("nonmember").style.display = "block";
                    document.getElementById("reg").style.display = "none";
                    document.getElementById("samp").style.display = "none";
                   }
            }  
        });
    </script>
</body>
</html>
