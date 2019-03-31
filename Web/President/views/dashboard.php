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
									$query1 = mysqli_query($connection, "Select count(*) indv from ems_t_individual_membership");
									$query2 = mysqli_query($connection, "select count(*) org from ems_t_org_membership");
									$count = 0;
									if ($query1)
										$count += mysqli_fetch_assoc($query1)["indv"];
									if ($query2)
										$count += mysqli_fetch_assoc($query2)["org"];
									echo $count;
								?>
									
							</p>	
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-blue">
						<div class="stats-icon"><i class="fa fa-calendar"></i></div>
						<div class="stats-info">
							<h4>TOTAL NUMBER OF EVENTS</h4>
							<p>
								<?php
									$query1 = mysqli_query($connection, "Select count(*) event from ems_r_event");
									$count = 0;
									if ($query1)
										$count += mysqli_fetch_assoc($query1)["event"];
									echo $count;
								?>
							</p>	
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-purple">
						<div class="stats-icon"><i class="fa fa-star-o"></i></div>
						<div class="stats-info">
							<h4>TOTAL NUMBER OF SPONSORS</h4>
							<p>
								<?php
									$query1 = mysqli_query($connection, "Select count(*) s from ems_r_sponsor");
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
			<!-- begin row -->
			<div class="col-md-12" style="margin-bottom: 30px">
			    <div id="daterep" style="width: 100%; height: 500px;border:1px solid black;"></div>
			    <script type="text/javascript">
			        Highcharts.chart('daterep', {
			            chart: {
			                type: 'line'
			            },
			            title: {
			                text: 'Monthly Collective Number of Attendees in All Events in the Year <?php echo date('Y');?>'
			            },
			            xAxis: {
			                categories: [<?php
                                $curryear = date("Y");

                                     $view_query2 = mysqli_query($connection,"SELECT DISTINCT month(re_event_enddate) AS Month, monthname(re_event_enddate) AS Name from ems_r_event WHERE year(re_event_enddate) = '$curryear'");
                                    while($row2 = mysqli_fetch_assoc($view_query2))
                                        {   
                                            $eventMonth = $row2["Month"];
                                            $m_name = $row2["Name"];
                                            echo '\''.$m_name.'\',';
                                        }
                             ?>]
			            },
			            yAxis: {
			                title: {
			                    text: 'Total Number of Attendees'
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
			                name: 'Number of attendees',
			                data: [
			                      <?php
			                        $curryear = date("Y");
			                        $baseyear = ($curryear - 1);

			                        $view_query2 = mysqli_query($connection,"SELECT DISTINCT month(re_event_enddate) AS Month_End, monthname(re_event_enddate) AS Month_Name from ems_r_event WHERE year(re_event_enddate) = ".$curryear." ORDER BY month(re_event_enddate) ASC");
			                            while($row2 = mysqli_fetch_assoc($view_query2))
			                                {   
			                                    $eventMonth = $row2["Month_End"];
			                                    $eventMonthName = $row2["Month_Name"];
			                      ?>
			                    {
			                            name: '<?php
			                                      echo $eventMonthName; 
			                                   ?>',
			                            y: <?php 
			                                  $view_query3 = mysqli_query($connection,"SELECT COUNT(ta_attendance_id) AS attendees
			                                  											FROM `ems_t_attendance` AS ATT 
			                                  											INNER JOIN `ems_r_event` AS EVE 
			                                  											ON ATT.ta_event_id = EVE.re_event_id
			                                  											WHERE month(ta_date_attended) = ".$eventMonth." AND year(ta_date_attended) = ".$curryear." ");
			                                  $total = 0;
			                                  while($row3 = mysqli_fetch_assoc($view_query3))
			                                      {
			                                        
			                                        $eventMonthQty = $row3["attendees"];
			                                        $total = $total + $eventMonthQty;
			                                        echo($total);
			                                      }
			                               ?>
			                    },
			                      <?php
			                      }
			                      ?>
			                      ]
			            },
			           
			          ]

			        });
			    </script>
			</div>

			<div class="col-md-6" style="margin-bottom: 30px">
					<div id="evepertype" style="width: 100%; height: 500px;border:1px solid black;"></div>
				    <script type="text/javascript">
					        Highcharts.chart('evepertype', {
					        chart: {
					            type: 'column'
					        },
					        title: {
					            text: 'Events Per Event Type'
					        },
					        
					        xAxis: {
					            type: 'category',
					            title: {
					                text: null
					            },
					            min: 0,
					            scrollbar: {
					                enabled: true
					            },
					            tickLength: 0
					        },
					        yAxis: {
					            title: {
					                text: null
					            }
					        },
					        legend: {
					            enabled: false
					        },
					        plotOptions: {
					            series: {
					            	colorByPoint: true,
					                borderWidth: 0,
					                dataLabels: {
					                    enabled: true,
					                    format: '{point.y:.0f}'
					                }
					            }
					        },

					        tooltip: {
					            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
					            pointFormat: '<span style="color:{point.color}">{point.name}</span>:Total of  <b>{point.y:.0sf}</b><br/>'
					        },
				            series: [{
				                name: 'Event Type:',
				                data: [
				                          
				                           <?php
				                              include("../../../dbconnection.php");  
				                              $curryear = date('Y');
				                              $view_query = mysqli_query($connection,"SELECT * FROM `ems_r_event` AS EVE 
				                              										 INNER JOIN `ems_r_event_type` AS EVETYPE 
				                              										 ON EVE.re_etype_id = EVETYPE.ret_etype_id");
				                              while($row = mysqli_fetch_assoc($view_query))
				                                  {   
				                                      $re_type = $row["re_etype_id"];
				                                      $name = $row["ret_etype_name"];
				                           ?>
				                           {
				                               name: '<?php echo $name?>',
				                               y: <?php
				                               $view_query2 = mysqli_query($connection,"SELECT COUNT(re_etype_id) AS rate FROM `ems_r_event` WHERE re_etype_id = '$re_type'");
				                                   while($row2 = mysqli_fetch_assoc($view_query2))
				                                       {   
				                                           $InvQty = $row2["rate"];
				                                           echo ($InvQty);
				                                       }
				                                  ?>,
				                               
				                           },
				                       <?php } ?>
				                       ]
				            },
				           ]

				        });
				    </script>    
			</div>
			<div class="col-md-6" style="margin-bottom: 30px">
					<div id="sponpertype" style="width: 100%; height: 500px; border:1px solid black;"></div>
				    <script type="text/javascript">
					        Highcharts.chart('sponpertype', {
					        chart: {
					            type: 'column'
					        },
					        title: {
					            text: 'Sponsors Per Sponsor Type'
					        },
					        
					        xAxis: {
					            type: 'category',
					            title: {
					                text: null
					            },
					            min: 0,
					            scrollbar: {
					                enabled: true
					            },
					            tickLength: 0
					        },
					        yAxis: {
					            title: {
					                text: null
					            }
					        },
					        legend: {
					            enabled: false
					        },
					        plotOptions: {
					            series: {
					            	colorByPoint: true,
					                borderWidth: 0,
					                dataLabels: {
					                    enabled: true,
					                    format: '{point.y:.0f}'
					                }
					            }
					        },

					        tooltip: {
					            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
					            pointFormat: '<span style="color:{point.color}">{point.name}</span>:Total of  <b>{point.y:.0sf}</b><br/>'
					        },
				            series: [{
				                name: 'Sponsor Type:',
				                data: [
				                          
				                           <?php
				                              include("../../../dbconnection.php");  
				                              $curryear = date('Y');
				                              $view_query = mysqli_query($connection,"SELECT * FROM `ems_r_sponsor` AS SPON 
				                              										 INNER JOIN `ems_r_sponsor_type` AS SPONTYPE 
				                              										 ON SPON.rs_stype_id = SPONTYPE.rst_stype_id");
				                              while($row = mysqli_fetch_assoc($view_query))
				                                  {   
				                                      $rs_type = $row["rs_stype_id"];
				                                      $name = $row["rst_stype_name"];
				                           ?>
				                           {
				                               name: '<?php echo $name?>',
				                               y: <?php
				                               $view_query2 = mysqli_query($connection,"SELECT COUNT(rs_stype_id) AS rate FROM `ems_r_sponsor` WHERE rs_stype_id = '$rs_type'");
				                                   while($row2 = mysqli_fetch_assoc($view_query2))
				                                       {   
				                                           $InvQty = $row2["rate"];
				                                           echo ($InvQty);
				                                       }
				                                  ?>,
				                               
				                           },
				                       <?php } ?>
				                       ]
				            },
				           ]

				        });
				    </script>    
			</div>
			<div class="col-md-12" style="">
				<div id="collection" style="width: 100%; height: 500px; border:1px solid black;"></div>
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
			<!-- end row -->
			<br><br>
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
