<?php 
	include("../../../dbconnection.php");
    include("../utilities/header.php");
    include("../utilities/BaseJs.php");
    include("../utilities/custom.php");
    include("../utilities/navbar.php");
    include("../utilities/notification.php");
?>
	<script src="../../../resources/highcharts/highcharts.js"></script>
        <script src="../../../resources/highcharts/modules/data.js"></script>
        <script src="../../../resources/highcharts/modules/exporting.js"></script>
        <script src="../../../resources/highcharts/modules/drilldown.js"></script>

	<title>Dashboard</title>
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">Dashboard</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Dashboard</h1>
			<!-- end page-header -->
			
			<div class="col-md-12">
				<!-- begin row -->
				<div class="row">
					
					<div id="daterep" style="width: 99%; height: 400px;"></div>
	                    <script type="text/javascript">

	                        Highcharts.chart('daterep', {
	                            chart: {
	                                type: 'line'
	                            },
	                            title: {
	                                text: 'Monthly Expenses For the Year <?php echo date("Y")?>'
	                            },
	                            xAxis: {
	                                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
	                            },
	                            yAxis: {
	                                title: {
	                                    text: 'Total Amount in Peso'
	                                }
	                            },

	                            plotOptions: {
	                                line: {
	                                    dataLabels: {
	                                        enabled: true
	                                    },
	                                    enableMouseTracking: true
	                                }
	                            },
	                            series: [{
	                                name: 'Monthly Expenses',
	                                data: [
	                                          <?php
	                                              include("../../../dbconnection.php");  
	                                              $curryear = date('Y');
	                                              $view_queryR1 = mysqli_query($connection,"SELECT IFNULL(SUM(te_amount),0.00) AS AMOUNT1 FROM ems_t_expenditures 
	                                                                 WHERE te_date BETWEEN '$curryear-01-01' AND '$curryear-02-01' ");
	                                                                 while($row = mysqli_fetch_assoc($view_queryR1))
	                                                                 {   
	                                                                    
	                                                                    echo($row["AMOUNT1"]);
	                                                                 }
	                                           ?>, 
	                                           <?php
	                                             include("../../../dbconnection.php");  

	                                              $curryear = date('Y');
	                                              $view_queryR2 = mysqli_query($connection,"SELECT IFNULL(SUM(te_amount),0.00) AS AMOUNT2 FROM ems_t_expenditures 
	                                                                 WHERE te_date BETWEEN '$curryear-02-01' AND '$curryear-02-28' ");
	                                                                 while($row = mysqli_fetch_assoc($view_queryR2))
	                                                                 {   
	                                                                    
	                                                                    echo($row["AMOUNT2"]);
	                                                                 }
	                                           ?>, 
	                                           <?php
	                                              include("../../../dbconnection.php");  
	                                              $curryear = date('Y');
	                                              $view_queryR3 = mysqli_query($connection,"SELECT IFNULL(SUM(te_amount),0.00) AS AMOUNT3 FROM ems_t_expenditures 
	                                                                 WHERE te_date BETWEEN '$curryear-03-01' AND '$curryear-03-31' ");
	                                                                 while($row = mysqli_fetch_assoc($view_queryR3))
	                                                                 {   
	                                                                    
	                                                                    echo($row["AMOUNT3"]);
	                                                                 }
	                                           ?>, 
	                                           <?php
	                                              include("../../../dbconnection.php");  
	                                              $curryear = date('Y');
	                                              $view_queryR4 = mysqli_query($connection,"SELECT IFNULL(SUM(te_amount),0.00) AS AMOUNT4 FROM ems_t_expenditures 
	                                                                 WHERE te_date BETWEEN '$curryear-04-01' AND '$curryear-04-30' ");
	                                                                 while($row = mysqli_fetch_assoc($view_queryR4))
	                                                                 {   
	                                                                    
	                                                                    echo($row["AMOUNT4"]);
	                                                                 }
	                                           ?>, 
	                                           <?php
	                                              include("../../../dbconnection.php");  
	                                              $curryear = date('Y');
	                                              $view_queryR5 = mysqli_query($connection,"SELECT IFNULL(SUM(te_amount),0.00) AS AMOUNT5 FROM ems_t_expenditures 
	                                                                 WHERE te_date BETWEEN '$curryear-05-01' AND '$curryear-05-30' ");
	                                                                 while($row = mysqli_fetch_assoc($view_queryR5))
	                                                                 {   
	                                                                    
	                                                                    echo($row["AMOUNT5"]);
	                                                                 }
	                                           ?>, 
	                                           <?php
	                                              include("../../../dbconnection.php");  
	                                              $curryear = date('Y');
	                                              $view_queryR6 = mysqli_query($connection,"SELECT IFNULL(SUM(te_amount),0.00) AS AMOUNT6 FROM ems_t_expenditures 
	                                                                 WHERE te_date BETWEEN '$curryear-06-01' AND '$curryear-06-30' ");
	                                                                 while($row = mysqli_fetch_assoc($view_queryR6))
	                                                                 {   
	                                                                    
	                                                                    echo($row["AMOUNT6"]);
	                                                                 }
	                                           ?>, 
	                                           <?php
	                                              include("../../../dbconnection.php");  
	                                              $curryear = date('Y');
	                                              $view_queryR7 = mysqli_query($connection,"SELECT IFNULL(SUM(te_amount),0.00) AS AMOUNT7 FROM ems_t_expenditures 
	                                                                 WHERE te_date BETWEEN '$curryear-07-01' AND '$curryear-07-30' ");
	                                                                 while($row = mysqli_fetch_assoc($view_queryR7))
	                                                                 {   
	                                                                    
	                                                                    echo($row["AMOUNT7"]);
	                                                                 }
	                                           ?>, 
	                                           <?php
	                                              include("../../../dbconnection.php");  
	                                              $curryear = date('Y');
	                                              $view_queryR8 = mysqli_query($connection,"SELECT IFNULL(SUM(te_amount),0.00) AS AMOUNT8 FROM ems_t_expenditures 
	                                                                 WHERE te_date BETWEEN '$curryear-08-01' AND '$curryear-08-30' ");
	                                                                 while($row = mysqli_fetch_assoc($view_queryR8))
	                                                                 {   
	                                                                    
	                                                                    echo($row["AMOUNT8"]);
	                                                                 }
	                                           ?>,
	                                           <?php
	                                              include("../../../dbconnection.php");  
	                                              $curryear = date('Y');
	                                              $view_queryR9 = mysqli_query($connection,"SELECT IFNULL(SUM(te_amount),0.00) AS AMOUNT9 FROM ems_t_expenditures 
	                                                                 WHERE te_date BETWEEN '$curryear-09-01' AND '$curryear-09-30' ");
	                                                                 while($row = mysqli_fetch_assoc($view_queryR9))
	                                                                 {   
	                                                                    
	                                                                    echo($row["AMOUNT9"]);
	                                                                 }
	                                           ?>, 
	                                           <?php
	                                              include("../../../dbconnection.php");  
	                                              $curryear = date('Y');
	                                              $view_queryR10 = mysqli_query($connection,"SELECT IFNULL(SUM(te_amount),0.00) AS AMOUNT10 FROM ems_t_expenditures 
	                                                                 WHERE te_date BETWEEN '$curryear-10-01' AND '$curryear-10-30' ");
	                                                                 while($row = mysqli_fetch_assoc($view_queryR10))
	                                                                 {   
	                                                                    
	                                                                    echo($row["AMOUNT10"]);
	                                                                 }
	                                           ?>, 
	                                           <?php
	                                              include("../../../dbconnection.php");  
	                                              $curryear = date('Y');
	                                              $view_queryR11 = mysqli_query($connection,"SELECT IFNULL(SUM(te_amount),0.00) AS AMOUNT11 FROM ems_t_expenditures 
	                                                                 WHERE te_date BETWEEN '$curryear-11-01' AND '$curryear-11-30' ");
	                                                                 while($row = mysqli_fetch_assoc($view_queryR11))
	                                                                 {   
	                                                                    
	                                                                    echo($row["AMOUNT11"]);
	                                                                 }
	                                           ?>, 
	                                           <?php
	                                              include("../../../dbconnection.php");  
	                                              $curryear = date('Y');
	                                              $view_queryR12 = mysqli_query($connection,"SELECT IFNULL(SUM(te_amount),0.00) AS AMOUNT12 FROM ems_t_expenditures 
	                                                                 WHERE te_date BETWEEN '$curryear-12-01' AND '$curryear-12-30' ");
	                                                                 while($row = mysqli_fetch_assoc($view_queryR12))
	                                                                 {   
	                                                                    
	                                                                    echo($row["AMOUNT12"]);
	                                                                 }
	                                           ?>
	                                       ]
	                            },
	                           ]

	                        });
	                    </script>
	                
				</div>
				<!-- end row -->
				<br><br>
				<div class="row">
					<div id="collection" style="width: 99%; height: 400px;"></div>
	                    <script type="text/javascript">

	                        Highcharts.chart('collection', {
	                            chart: {
	                                type: 'column'
	                            },
	                            title: {
	                                text: 'Collection From Different Transactions For the Year <?php echo date("Y")?>'
	                            },
	                            xAxis: {
	                                categories: ['Membership (Individual)', 'Membership (Organization)', 'Renewal (Individual)', 'Renewal (Organization)']
	                            },
	                            yAxis: {
	                                title: {
	                                    text: 'Total Amount in Peso'
	                                }
	                            },

	                            plotOptions: {
	                                line: {
	                                    dataLabels: {
	                                        enabled: true
	                                    },
	                                    enableMouseTracking: true
	                                }
	                            },
	                            series: [{
	                                name: 'Yearly Collection',
	                                data: [
	                                          <?php
	                                              include("../../../dbconnection.php");  
	                                              $curryear = date('Y');
	                                              $view_queryR1 = mysqli_query($connection,"SELECT IFNULL(SUM(tim_amount),0.00) AS AMOUNT1 FROM ems_t_individual_membership 
	                                                                 WHERE tim_status = 'Paid'");
	                                                                 while($row = mysqli_fetch_assoc($view_queryR1))
	                                                                 {   
	                                                                    
	                                                                    echo($row["AMOUNT1"]);
	                                                                 }
	                                           ?>, 
	                                           <?php
	                                             include("../../../dbconnection.php");  

	                                              $curryear = date('Y');
	                                              $view_queryR2 = mysqli_query($connection,"SELECT IFNULL(SUM(tom_amount),0.00) AS AMOUNT2 FROM ems_t_org_membership 
	                                                                 WHERE tom_status = 'Paid' ");
	                                                                 while($row = mysqli_fetch_assoc($view_queryR2))
	                                                                 {   
	                                                                    
	                                                                    echo($row["AMOUNT2"]);
	                                                                 }
	                                           ?>, 
	                                           <?php
	                                              include("../../../dbconnection.php");  
	                                              $curryear = date('Y');
	                                              $view_queryR3 = mysqli_query($connection,"SELECT IFNULL(SUM(tri_amount),0.00) AS AMOUNT3 FROM ems_t_renewal_indiv 
	                                                                 WHERE tri_status = 'Paid' ");
	                                                                 while($row = mysqli_fetch_assoc($view_queryR3))
	                                                                 {   
	                                                                    
	                                                                    echo($row["AMOUNT3"]);
	                                                                 }
	                                           ?>, 
	                                           <?php
	                                              include("../../../dbconnection.php");  
	                                              $curryear = date('Y');
	                                              $view_queryR4 = mysqli_query($connection,"SELECT IFNULL(SUM(tro_amount),0.00) AS AMOUNT4 FROM ems_t_renewal_org 
	                                                                 WHERE tro_status = 'Paid'");
	                                                                 while($row = mysqli_fetch_assoc($view_queryR4))
	                                                                 {   
	                                                                    
	                                                                    echo($row["AMOUNT4"]);
	                                                                 }
	                                           ?>
	                                       ]
	                            },
	                           ]

	                        });
	                    </script>

				</div>
			</div>
		</div>
		<!-- end #content -->
		
        
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
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
	<script src="assets/plugins/gritter/js/jquery.gritter.js"></script>
	<script src="assets/plugins/flot/jquery.flot.min.js"></script>
	<script src="assets/plugins/flot/jquery.flot.time.min.js"></script>
	<script src="assets/plugins/flot/jquery.flot.resize.min.js"></script>
	<script src="assets/plugins/flot/jquery.flot.pie.min.js"></script>
	<script src="assets/plugins/sparkline/jquery.sparkline.js"></script>
	<script src="assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="assets/plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="assets/js/dashboard.min.js"></script>
	<script src="assets/js/apps.min.js"></script>
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
