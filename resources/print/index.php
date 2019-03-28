
    <title>Dashboard | UPDS</title>
<?php
    
    include("../utilities/Header.php");
    include("../utilities/navibar.php");
    include("../utilities/BaseJs.php");
    include("../utilities/Charts.php");
?>
        <script src="../../../resources/custom/highcharts/highcharts.js"></script>
        <script src="../../../resources/custom/highcharts/modules/data.js"></script>
        <script src="../../../resources/custom/highcharts/modules/exporting.js"></script>
        <script src="../../../resources/custom/highcharts/modules/drilldown.js"></script>
        
        <!-- begin #content -->
        <div id="content" class="content">
            
            <!-- begin page-header -->
                <h1 class="page-header">Dashboard</h1>
            <!-- end page-header -->
            <!--Line Divider-->
                <div class="row" style="padding: 1px; background-color: #262626; margin-bottom: 20px"></div>
            <!--Line Divider-->


            <!-- START CUSTOM CONTENT-->
                    <!-- begin #content -->
                    <div id="content" class="col-md-12">
                        <?php include("get_view_details_dashboard_count.php");?>
                        <!-- begin row -->
                        <div class="row">
                            <!-- begin col-3 -->
                            <div class="col-lg-3 col-md-6">
                                <div class="widget widget-stats bg-gradient-red">
                                    <div class="stats-icon stats-icon-lg"><i class="fa fa-exclamation-circle fa-fw"></i></div>
                                    <div class="stats-content">
                                        <div class="stats-title" style="font-size: 15px">Total Pending Applications</div>
                                        <div class="stats-number"><?php echo $count_pending; ?></div>
                                       
                                        <div class="stats-desc"><?php echo $pm_count_pending; ?> Only for this month of <?php echo $currmonth_desc?></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col-3 -->
                            <!-- begin col-3 -->
                            <div class="col-lg-3 col-md-6">
                                <div class="widget widget-stats bg-gradient-orange">
                                    <div class="stats-icon stats-icon-lg"><i class="fa fa-sync fa-fw"></i></div>
                                    <div class="stats-content">
                                        <div class="stats-title" style="font-size: 15px">Total For Revisions Applications</div>
                                        <div class="stats-number"><?php echo $count_forrevision; ?></div>
                                        <div class="stats-desc"><?php echo $pm_count_forrevision; ?> Only for this month of <?php echo $currmonth_desc?></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col-3 -->
                            <!-- begin col-3 -->
                            <div class="col-lg-3 col-md-6">
                                <div class="widget widget-stats bg-gradient-green">
                                    <div class="stats-icon stats-icon-lg"><i class="fa fa-check fa-fw"></i></div>
                                    <div class="stats-content">
                                        <div class="stats-title" style="font-size: 15px">Total Current Approved Applications</div>
                                        <div class="stats-number"><?php echo $count_approved; ?></div>
                                        <div class="stats-desc"><?php echo $pm_count_approved; ?> Only for this month of <?php echo $currmonth_desc?></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col-3 -->
                            <!-- begin col-3 -->   
                            <div class="col-lg-3 col-md-6">
                                <div class="widget widget-stats bg-gradient-black">
                                    <div class="stats-icon stats-icon-lg"><i class="fa fa-times fa-fw"></i></div>
                                    <div class="stats-content">
                                        <div class="stats-title" style="font-size: 15px">Total Closed Applications</div>
                                        <div class="stats-number"><?php echo $count_closed; ?></div>
                                        <div class="stats-desc"><?php echo $pm_count_closed; ?> Only for this month of <?php echo $currmonth_desc?></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col-3 -->
                        </div>
                        <!-- end row -->
                        
                        <!-- begin ow on line charts -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="widget-chart with-sidebar bg-black">
                                    <div class="widget-content" style="margin:15px">
                                        <h4 class="chart-title">
                                           Monthly Total Number of Zoning Applications of the Year <?php $curryear = date('Y'); echo $curryear; ?>
                                            <small>Collective Record of Transactions</small>
                                        </h4>
                                        <div id="visitors-line-chart" class="widget-chart-full-width nvd3-inverse-mode">
                                            <div class="col-md-12" >
                                                <div id="line"></div> 
                                                <script type="text/javascript">
                                                    Highcharts.chart('line', {
                                                    chart: {
                                                        type: 'line'
                                                    },
                                                    title: {
                                                        text: 'Monthly Total Number of Applications Per Year'
                                                    },
                                                    xAxis: {
                                                        categories: ['Month']
                                                    },
                                                    yAxis: {
                                                        title: {
                                                            text: 'Number of Applications'
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
                                                        name: 'Number of Applications this Month',
                                                        data: [
                                                              <?php
                                                                $curryear = date("Y");

                                                                $view_query2 = mysqli_query($connection,"SELECT DISTINCT month(za_add_timestamp) AS Month, monthname(za_add_timestamp) AS Month_Name from t_zoning_application WHERE year(za_add_timestamp) = '$curryear'");
                                                                    while($row2 = mysqli_fetch_assoc($view_query2))
                                                                        {   
                                                                            $eventMonth = $row2["Month"];
                                                                            $m_name = $row2["Month_Name"];
                                                              ?>
                                                            {
                                                                    name: '<?php

                                                                              echo $m_name; 

                                                                           ?>',
                                                                    y: <?php 
                                                                          $view_query3 = mysqli_query($connection,"SELECT COUNT(*) AS rate FROM `t_zoning_application` WHERE month(za_add_timestamp) = '$eventMonth' ");
                                                                          while($row3 = mysqli_fetch_assoc($view_query3))
                                                                              {
                                                                                    $InvQty = $row3["rate"];
                                                                                    echo ($InvQty);
                                                                              }
                                                                       ?>
                                                            },
                                                              <?php
                                                              }
                                                              ?>
                                                              ]
                                                    }
                                                    ]
                                                });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row on line charts-->

                        <!-- begin ow on two charts of application -->
                        <div class="row">
                            <!-- begin col-6 -->
                            <div class="col-md-6">
                                <div class="widget-chart with-sidebar bg-black">
                                    <div class="widget-content" style="margin:15px">
                                        <h4 class="chart-title">
                                           Total Number of Applications Per Land Use
                                            <small>Collective Record of Transactions</small>
                                        </h4>
                                        <div id="visitors-line-chart" class="widget-chart-full-width nvd3-inverse-mode">
                                            <div class="col-md-12" >
                                                <div id="groupregion"></div>
                                                <script type="text/javascript">
                                                    Highcharts.chart('groupregion', {
                                                    chart: {
                                                        type: 'column'
                                                    },
                                                    title: {
                                                        text: 'Zoning Applications Per Land Use'
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

                                                    series: [
                                                        {
                                                            name: "Application on Land Use:",
                                                            colorByPoint: true,
                                                            data: [
                                                                <?php
                                                                    $view_query = mysqli_query($connection,"SELECT * FROM `t_zoning_application` AS ZA
                                                                                                              INNER JOIN `r_land_use` AS LU
                                                                                                              ON ZA.za_land_use_ID = LU.lu_ID
                                                                                                          ");
                                                                        while($row = mysqli_fetch_assoc($view_query))
                                                                            {   
                                                                                $bygrp = $row["za_land_use_ID"];
                                                                                $name = $row["lu_desc"];
                                                                                //$InvQty = $row["Quantity"];
                                                                ?> 
                                                                    {
                                                                        name: '<?php echo $name?>',
                                                                        y: <?php
                                                                        $view_query2 = mysqli_query($connection,"SELECT COUNT(za_land_use_ID) AS rate FROM `t_zoning_application` WHERE za_land_use_ID = '$bygrp'");
                                                                        $total = 0;
                                                                            while($row2 = mysqli_fetch_assoc($view_query2))
                                                                                {   
                                                                                    $InvQty = $row2["rate"];
                                                                                    $total = $total + 'column name kung nasaan yung amount'
                                                                                    $total1 = $total1 + 'column ng 2nd table'
                                                                                    $total = $total + $total1;
                                                                                    echo ($InvQty);
                                                                                }
                                                                           ?>,
                                                                        
                                                                    },
                                                                <?php
                                                                }
                                                                ?>
                                                            ]
                                                        }
                                                    ]
                                                });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col-6 -->

                            <!-- begin col-6 -->
                            <div class="col-md-6">
                                <div class="widget-chart with-sidebar bg-black">
                                    <div class="widget-content" style="margin:15px">
                                        <h4 class="chart-title">
                                           Total Number of Applications Per Barangay
                                            <small>Collective Record of Transactions</small>
                                        </h4>
                                        <div id="visitors-line-chart" class="widget-chart-full-width nvd3-inverse-mode">
                                            <div class="col-md-12" >
                                                <div id="za_brgy"></div>
                                                <script type="text/javascript">
                                                    Highcharts.chart('za_brgy', {
                                                    chart: {
                                                        type: 'column'
                                                    },
                                                    title: {
                                                        text: 'Zoning Applications Per Barangay'
                                                    },
                                                    plotOptions: {
                                                        pie: {
                                                            allowPointSelect: true,
                                                            cursor: 'pointer',
                                                            dataLabels: {
                                                                enabled: false
                                                            },
                                                            showInLegend: true
                                                        }
                                                    },

                                                    tooltip: {
                                                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                                                        pointFormat: '<span style="color:{point.color}">{point.name}</span>:Total of  <b>{point.y:.0sf}</b><br/>'
                                                    },

                                                    series: [
                                                        {
                                                            name: "Applications in Barangay:",
                                                            colorByPoint: true,
                                                            data: [
                                                                <?php
                                                                    $view_query = mysqli_query($connection,"SELECT * FROM `t_zoning_application` AS ZA
                                                                                                              INNER JOIN `r_barangay` AS BRGY
                                                                                                              ON ZA.za_loc_brgy = BRGY.brgy_ID
                                                                                                          ");
                                                                        while($row = mysqli_fetch_assoc($view_query))
                                                                            {   
                                                                                $bygrp = $row["za_loc_brgy"];
                                                                                $name = $row["brgy_name"];
                                                                                //$InvQty = $row["Quantity"];
                                                                ?> 
                                                                    {
                                                                        name: '<?php echo $name?>',
                                                                        y: <?php
                                                                        $view_query2 = mysqli_query($connection,"SELECT COUNT(za_loc_brgy) AS rate FROM `t_zoning_application` WHERE za_loc_brgy = '$bygrp'");
                                                                            while($row2 = mysqli_fetch_assoc($view_query2))
                                                                                {   
                                                                                    $InvQty = $row2["rate"];
                                                                                    echo ($InvQty);
                                                                                }
                                                                           ?>,
                                                                        
                                                                    },
                                                                <?php
                                                                }
                                                                ?>
                                                            ]
                                                        }
                                                    ]
                                                });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col-6 -->
                           
                        </div>
                        <!-- end row on two charts of application-->
                       
                    </div>
                    <!-- end #content -->
            <!-- END CUSTOM CONTENT -->


        </div>
        <!-- end #content -->
        
    </div>
    <!-- end page container -->
    

   </body>
</html>

<!-- ======= ON PAGE SCRIPT ======== -->
<script>
    $(document).ready(function() { 
        App.init();
    });
</script>
<!-- ======= ON PAGE SCRIPT ======== -->

       
              
              

              
              
            