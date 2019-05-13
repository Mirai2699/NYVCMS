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
				<li class="active">Dashboard</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Dashboard</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
				<!-- begin col-3 -->
				<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-green">
						<div class="stats-icon"><i class="fa fa-users"></i></div>
						<div class="stats-info">
							<h4>TOTAL NUMBER OF MEMBERS</h4>
							<p>
								<?php
									$query1 = mysqli_query($connection, "Select count(*) indv from ems_t_individual_membership WHERE tim_status = 'Paid' AND tim_activeflag = 1");
									$count = 0;
									if ($query1)
										$count += mysqli_fetch_assoc($query1)["indv"];
									echo $count;
								?>
									
							</p>	
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				
				
				<!-- begin col-3 -->
				<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-red">
						<div class="stats-icon"><i class="fa fa-users"></i></div>
						<div class="stats-info">
							<h4>TOTAL NUMBER OF ORGANIZATIONS</h4>
							<p>
								<?php
									$query1 = mysqli_query($connection, "Select count(*) s from ems_r_org_info");
									$count = 0;
									if ($query1)
										$count += mysqli_fetch_assoc($query1)["s"];
									echo $count;
								?>
							</p>	
						</div>
					</div>
				</div>
				<!-- end col-3 -->
			</div>
			<!-- end row -->

			<div class="col-md-12" style="margin-top: 15px; margin-bottom: 20px">
				<div id="collection" style="width: 100%; height: 500px;border:1px solid black;"></div>
			    <script type="text/javascript">

			        Highcharts.chart('collection', {
			            chart: {
			                type: 'bar'
			            },
			            title: {
			                text: 'Total Number of Members per Disrtict For the Year <?php echo date("Y")?>'
			            },
			             subtitle: {
						    text: 'Click the bars to view the total number of members per region.'
						},
			            xAxis: {
			               type: 'category'
			            },
			            yAxis: {
			                title: {
			                    text: 'Total Number of Members'
			                }
			            },

			            plotOptions: {
			            	series:
			            	{
			            		colorByPoint: false,
			            	},
			            	
			                line: {
			                    dataLabels: {
			                        enabled: true
			                    },
			                    enableMouseTracking: true
			                }
			            },
			            series: [{
			                name: 'Total number of Members',
			                data: [
				                          
				                           <?php
				                              include("../../../dbconnection.php");  
				                              $curryear = date('Y');
				                              $view_query = mysqli_query($connection,"SELECT * FROM `ems_r_district` 
				                              	WHERE rd_dis_status = 1");
				                              while($row = mysqli_fetch_assoc($view_query))
				                                  {   
				                                      $id = $row["rd_dis_id"];
				                                      $name = $row["rd_dis_name"];
				                           ?>
				                           {
				                               name: '<?php echo $name?>',
				                               y: <?php
				                               $view_query2 = mysqli_query($connection,"SELECT COUNT(tim_indivmemid) AS NUM 
				                               	FROM `ems_t_individual_membership` 
				                               	WHERE tim_disid = '$id'
				                               	AND tim_activeflag = 1
				                               	AND tim_status = 'Paid'");
				                                   while($row2 = mysqli_fetch_assoc($view_query2))
				                                       {   
				                                           $NoM = $row2["NUM"];
				                                           echo ($NoM);
				                                       }
				                                  ?>,
				                                drilldown:  'dis<?php echo $id ?>',
				                              
				                               
				                           },
				                       <?php } ?>
				                  ]
			            },
			           ],
			           drilldown: {
			           	     series: [
			           	      //requisition types
			           	     <?php
			           	        
			           	        $view_query = mysqli_query($connection,"SELECT * FROM `ems_r_district` 
			           	        	WHERE rd_dis_status = 1");
			           	        while($row = mysqli_fetch_assoc($view_query))
			           	            {   
			           	                $id = $row["rd_dis_id"];
			           	                $name = $row["rd_dis_name"];
			           	     ?>
			           	     {
			           	        name: 'Total Number of Members',
			           	        id: 'dis<?php echo $id ?>',
			           	        type:'column',
			           	        data: [
			           	              <?php

			           	                   $view_query3 = mysqli_query($connection,"SELECT * FROM `ems_r_region`
			           	                                                          WHERE rr_disid = '$id'");
			           	                    while($row3 = mysqli_fetch_assoc($view_query3))
			           	                        {   
			           	                            $reg_ID = $row3["rr_id"];
			           	                            $display = $row3["rr_name"];
			           	                          

			           	              ?>

			           	              { 
			           	                  name: '<?php echo $display ?>',
			           	                  y: <?php
			           	                       $view_query4 = mysqli_query($connection,"SELECT COUNT(tim_indivmemid) AS NUM 
				                               	FROM `ems_t_individual_membership` 
				                               	WHERE tim_region_id = '$reg_ID'
				                               	AND tim_activeflag = 1
				                               	AND tim_status = 'Paid'");
				                                   while($row4 = mysqli_fetch_assoc($view_query4))
				                                       {   
				                                           $NoM = $row4["NUM"];
				                                       }
			           	                      echo $NoM;
			           	                          
			           	                        
			           	                     ?>,
			           	                  
			           	              },
			           	              <?php
			           	              }?>
			           	        ]
			           	 
			           	      }, 
			           	  <?php
			           	    }
			           	  ?>
			           	     

			           	]
			           }

			        });
			    </script>               

			</div>
			<br><br>
			<!-- end row -->
			<div class="col-md-12" style="margin-top: 15px; margin-bottom: 20px">
				<div id="collection1" style="width: 100%; height: 500px;border:1px solid black;"></div>
			    <script type="text/javascript">

			        Highcharts.chart('collection1', {
			            chart: {
			                type: 'bar'
			            },
			            title: {
			                text: 'Total Number of Organizations per Disrtict For the Year <?php echo date("Y")?>'
			            },
						xAxis: {
			                categories: ['District 1', 'District 2', 'District 3', 'District 4', 'District 5', 'District 6']
			            },
			            yAxis: {
			                title: {
			                    text: 'Total Number of Members'
			                }
			            },

			            plotOptions: {
			            	series:
			            	{
			            		colorByPoint: false,
			            	},
			            	
			                line: {
			                    dataLabels: {
			                        enabled: true
			                    },
			                    enableMouseTracking: true
			                }
			            },
			            series: [{
			                name: 'Total number of Members',
			                data: [
			                          <?php
			                              	include("../../../dbconnection.php");  
			                              	$curryear = date('Y');
			                              	$view_query1 = mysqli_query($connection, "SELECT COUNT(tom_orgmemid) AS DIS1 
			                              		FROM ems_t_org_membership 
			                                                 WHERE tom_status = 'Paid'
			                                                 AND tom_activeflag = 1
			                                                 AND tom_disid = 1 ");
											while($row = mysqli_fetch_assoc($view_query1))
                                                {   
                                                    $dis = $row["DIS1"];
                                                    echo ($dis);
                                                }
			                           ?>,
			                           <?php
			                              	include("../../../dbconnection.php");  
			                              	$curryear = date('Y');
			                              	$view_query1 = mysqli_query($connection, "SELECT COUNT(tom_orgmemid) AS DIS2 
			                              		FROM ems_t_org_membership 
			                                                 WHERE tom_status = 'Paid'
			                                                 AND tom_activeflag = 1
			                                                 AND tom_disid = 2 ");
											while($row = mysqli_fetch_assoc($view_query1))
                                                {   
                                                    $dis = $row["DIS2"];
                                                    echo ($dis);
                                                }
			                           ?>,
			                           <?php
			                              	include("../../../dbconnection.php");  
			                              	$curryear = date('Y');
			                              	$view_query1 = mysqli_query($connection, "SELECT COUNT(tom_orgmemid) AS DIS3 
			                              		FROM ems_t_org_membership 
			                                                 WHERE tom_status = 'Paid'
			                                                 AND tom_activeflag = 1
			                                                 AND tom_disid = 3 ");
											while($row = mysqli_fetch_assoc($view_query1))
                                                {   
                                                    $dis = $row["DIS3"];
                                                    echo ($dis);
                                                }
			                           ?>,
			                           <?php
			                              	include("../../../dbconnection.php");  
			                              	$curryear = date('Y');
			                              	$view_query1 = mysqli_query($connection, "SELECT COUNT(tom_orgmemid) AS DIS4 
			                              		FROM ems_t_org_membership 
			                                                 WHERE tom_status = 'Paid'
			                                                 AND tom_activeflag = 1
			                                                 AND tom_disid = 4 ");
											while($row = mysqli_fetch_assoc($view_query1))
                                                {   
                                                    $dis = $row["DIS4"];
                                                    echo ($dis);
                                                }
			                           ?>,
			                           <?php
			                              	include("../../../dbconnection.php");  
			                              	$curryear = date('Y');
			                              	$view_query1 = mysqli_query($connection, "SELECT COUNT(tom_orgmemid) AS DIS5 
			                              		FROM ems_t_org_membership 
			                                                 WHERE tom_status = 'Paid'
			                                                 AND tom_activeflag = 1
			                                                 AND tom_disid = 5 ");
											while($row = mysqli_fetch_assoc($view_query1))
                                                {   
                                                    $dis = $row["DIS5"];
                                                    echo ($dis);
                                                }
			                           ?>,
			                           <?php
			                              	include("../../../dbconnection.php");  
			                              	$curryear = date('Y');
			                              	$view_query1 = mysqli_query($connection, "SELECT COUNT(tom_orgmemid) AS DIS6 
			                              		FROM ems_t_org_membership 
			                                                 WHERE tom_status = 'Paid'
			                                                 AND tom_activeflag = 1
			                                                 AND tom_disid = 6 ");
											while($row = mysqli_fetch_assoc($view_query1))
                                                {   
                                                    $dis = $row["DIS6"];
                                                    echo ($dis);
                                                }
			                           ?>
			                       ]
			            },
			           ]

			        });
			    </script>               

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
