<?php 
     include ("dbconnection.php");
  
?>
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
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="resources/assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="resources/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="resources/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="resources/assets/css/animate.min.css" rel="stylesheet" />
	<link href="resources/assets/css/style.min.css" rel="stylesheet" />
	<link href="resources/assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="resources/assets/css/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="resources/assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" />
	<link href="resources/assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
	<link href="resources/assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" />
    <link href="resources/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
    <link href="resources/images/nvyc.png" rel="icon" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<!-- end #header -->
		
		
		<div id="content" class="content">
			
			<!-- begin page-header -->
			<h1 class="page-header">List of Upcoming Events</h1>
			<!-- end page-header -->
			
			<!-- begin timeline -->
			<ul class="timeline">
                 <?php
                                        $view_query = mysqli_query($connection,"SELECT * FROM `ems_r_event` where re_event_stat  = 'Pending'");
                                        while($row = mysqli_fetch_assoc($view_query))
                                {   
                                            
                                    $name = $row["re_event_name"]; 
                                    $desc = $row["re_event_description"]; 
                                    $sdate = $row["re_event_startdate"]; 
                                    $edate = $row["re_event_enddate"]; 
                                
                        ?>    
			    <li>
			        <!-- begin timeline-time -->
			        <div class="timeline-time">
			            <span class="date">Event</span>
			            <span class="time"><?php echo $sdate; ?>-<?php echo $edate; ?></span>
			        </div>
			        <!-- end timeline-time -->
			        <!-- begin timeline-icon -->
			        <div class="timeline-icon">
			            <a href="javascript:;"><i class="fa fa-calendar"></i></a>
			        </div>
			        <!-- end timeline-icon -->
			        <!-- begin timeline-body -->
			        <div class="timeline-body">
			            <div class="timeline-header">
			                <span class="username"><a href="javascript:;">Event Details</a> <small></small></span>
			                <span class="pull-right text-muted"></span>
			            </div>
			            <div class="timeline-content">
                            <h3><?php echo $name; ?></h3><br>
                            <h4 style="color : blue;">Description :</h4>
                            <h5><?php echo $desc; ?></h5>
			            </div>
			        </div>
			        <!-- end timeline-body -->
			    </li>
                  <?php
                                                 }
                                            ?> 
			    <li>
			        <!-- begin timeline-icon -->
			        <div class="timeline-icon">
			            <a href="javascript:;"><i class="fa fa-circle"></i></a>
			        </div>
			        <!-- end timeline-icon -->
			        <!-- begin timeline-body -->
			        <div class="timeline-body">
			        	End of Events
			        </div>
			        <!-- begin timeline-body -->
			    </li>
			</ul>
			<!-- end timeline -->
		</div>
		
        
		
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
	<script src="resources/assets/plugins/flot/jquery.flot.min.js"></script>
	<script src="resources/assets/plugins/flot/jquery.flot.time.min.js"></script>
	<script src="resources/assets/plugins/flot/jquery.flot.resize.min.js"></script>
	<script src="resources/assets/plugins/flot/jquery.flot.pie.min.js"></script>
	<script src="resources/assets/plugins/sparkline/jquery.sparkline.js"></script>
	<script src="resources/assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="resources/assets/plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="resources/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="resources/assets/js/dashboard.min.js"></script>
	<script src="resources/assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			Dashboard.init();
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