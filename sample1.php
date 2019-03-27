<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head></head>
	<meta charset="utf-8" />
	<title>NYVCEMS</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="assets/css/animate.min.css" rel="stylesheet" />
	<link href="assets/css/style.min.css" rel="stylesheet" />
	<link href="assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="assets/css/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
</head>
<body>

	<?php

		include('includes/dbconnection.php');

		if(isset($_POST['btn_login'])){
			$username = $_POST['txt_username'];
			$pass = $_POST['txt_pass'];

			// echo $username." | ".$pass;

			$result = $connection->query("SELECT * FROM `ems_r_users` WHERE ru_username = '$username' AND ru_password = '$pass' ");

			$row = $result->fetch_assoc();

			$userfromdb = $row['ru_username'];
			$passfromdb = $row['ru_password'];
			$typefromdb = $row['ru_user_type'];

			if ($username == $userfromdb && $pass == $passfromdb)
			{
				// echo '<center><label style="color:green">TAMA CREDENTIALS</label></center>';
				//session_start (optional, remove other 'session_start' below.)

				if($typefromdb == 1){

					session_start();

					$_SESSION['checkusertype'] = $typefromdb;

					echo "<script>window.location.assign('event-type.php')</script>";
				}

				elseif($typefromdb == 2){

					session_start();

					$_SESSION['checkusertype'] = $typefromdb;

					echo "<script>window.location.assign('dashboard.php')</script>";
				}
				elseif($typefromdb == 3){

					session_start();

					$_SESSION['checkusertype'] = $typefromdb;

					echo "<script>window.location.assign('sponsor.php')</script>";
				}
			}
			else
			{
				echo '<center><label style="color:red">Incorrect Username and/or Password</label></center>'; 
			}
		} 

	?>

	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->

	
	
	<div class="login-cover">
	    <div class="login-cover-image"><img src="assets/img/nyvclogooo.jpg" align="middle" data-id="login-cover-image" alt="" /></div>
	    <div class="login-cover-bg"></div>
	</div>
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin login -->
        <div class="login login-v2" data-pageload-addclass="animated flipInX">
            <!-- begin brand -->
            <div class="login-header">
                <div class="brand"></span> Log In
                </div>
            </div>
            <!-- end brand -->
            <div class="login-content">
                <form action="#" method="POST" class="margin-bottom-0">
                    <div class="form-group m-b-20">
                        <input required type="text" name="txt_username" id="txt_username" class="form-control input-lg" placeholder="Username" autofocus="" />
                    </div>
                    <div class="form-group m-b-20">
                        <input required type="Password" name="txt_pass" id="username"  class="form-control input-lg" placeholder="Password" />
                    </div>
                    <div class="login-buttons">
                        <button name="btn_login" type="submit" class="btn btn-success btn-block btn-lg">Log in</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end login -->
        
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="assets/js/login-v2.demo.min.js"></script>
	<script src="assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

	<script>
		$(document).ready(function() {
			App.init();
			LoginV2.init();
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
</body>
</html>
