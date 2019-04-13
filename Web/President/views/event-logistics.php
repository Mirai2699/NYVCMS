<?php 
    include("../../../dbconnection.php");
    include("../utilities/header.php");
    include("../utilities/BaseJs.php");
    include("../utilities/custom.php");
    include("../utilities/navbar.php");
    include("../utilities/notification.php");

if (isset($_GET['viewItems'])) 
    {
        $ids = $_GET['viewItems'];

    } 
?>
        
            <!-- begin #content -->
        <div id="content" class="content">
            <!-- begin breadcrumb -->
            <ol class="breadcrumb pull-right">
                <li><a href="logistics.php">Logistics </a></li>
                <li><a href="javascript:;">Sponsored Items </a></li>
            </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <h1 class="page-header">Sponsored Items</h1>
            <!-- end page-header -->

            <!-- begin row -->
            <div class="row">
                <!-- begin col-12 -->
                <div class="col-md-12">
                            <!-- #modal-without-animation -->
                    <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                           <!--  <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            </div> -->
                            <h4 class="panel-title">Sponsored Items</h4>
                        </div>
                        <div class="panel-body">
                            
                        <?php  

                            //$ids = $row['Batch_No'];
                            $sql = "SELECT * FROM `ems_r_event` WHERE re_event_id = $ids";


                            $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                            while($row = mysqli_fetch_assoc($result))
                            {
                              $name = $row['re_event_name'];
                              $desc = $row['re_event_description'];
                              $sdate = $row['re_event_startdate'];
                              $edate = $row['re_event_enddate'];
                        ?>
                            <h1><?php echo $name; ?></h1>
                            <h2><?php echo $sdate; ?> - <?php echo $edate; ?></h2><br>
                            <h4>Description: <?php echo $desc; ?></h4>
                            
                        <?php
                            }
                        ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;">                                                             
                                    </div>
                                </div>
                            </div>
                            <br>
                            <table class="display table table-bordered table-striped">                                
                                <tr>
                                    <td>                          
                                        <form action="addItem.php" method="POST">

                                            <div class="form-content">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p><button type="button" id="btnAdd" class="btn btn-primary"><i class="fa fa-plus"></i></button></p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div style="padding: 1px; margin-bottom: 10px; background-color: #E0E1E7;">                                                             
                                                        </div>
                                                    </div>
                                                </div>

                                             
                                                 <div class="form-group">
                                                    <input type="hidden" name="r_batch" value="">
                                                </div>

                                                <div class="form-group">
                                                    <input type="hidden" name="currentdate" value="">
                                                </div>
                                                <div class="row group">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Item</label>
                                                            <input type="" name="item[]" class="form-control" placeholder="Name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <div class="form-group">
                                                            <label>Quantity</label>
                                                            <input type="" name="quantity[]" date-parsley-type="digits" class="form-control" placeholder="8888" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Sponsor</label>
                                                            <select class="form-control" name="sponsor[]">
                                                                <option value="" selected disabled>-- Select Sponsor--</option>
                                                                   <?php
                                                                        $view_query = mysqli_query($connection,"SELECT * FROM `ems_r_sponsor` AS S
                                                                            INNER JOIN `ems_r_sponsorship` AS SS
                                                                            ON S.rs_sponsor_id = SS.rss_sponsor_id
                                                                            INNER JOIN `ems_r_event` AS E
                                                                            ON SS.rss_event_id = E.re_event_id
                                                                            WHERE S.rs_status = 1
                                                                            AND E.re_event_status = 1
                                                                            AND SS.rss_activeflag = 1
                                                                            AND SS.rss_event_id = ".$ids."");
                                                                        while($row = mysqli_fetch_assoc($view_query))
                                                                    {   
                                                                        $name = $row["rs_sponsor_name"];
                                                                        $id = $row["rs_sponsor_id"]; 
                                  
                                                                    ?>    
                                                                <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
                                                                <?php
                                                                     }
                                                                ?>  
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Date Received</label>
                                                            <input type="date" name="date[]" class="form-control" placeholder="" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-danger btnRemove" style="margin-top: 23px;"><i class="fa fa-minus"></i></button>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-12">
                                                        <div style="padding: 1px; margin-bottom: 10px; background-color: #E0E1E7;">                                                 
                                                        </div>
                                                    </div>

                                                </div>  
                                            </div>


                                           <a data-toggle="modal" href="#Continue" class="btn btn-success">Submit</a>   
                                            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Continue" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content" style="text-align: center;">
                                                            <div class="modal-header">
                                                                
                                                            </div>
                                                            <br>
                                                          <h1>Are you sure you want to add the item/s?</h1>
                                                            <div class="panel" style="height: 50%; width: 100%">
                                                                <br>
                                                                <button type="submit" class="btn btn-success btn-lg" name="btn_addItem" value="<?php echo $ids; ?>">   Yes   </button> &nbsp&nbsp&nbsp&nbsp
                                                                <button data-dismiss="modal" class="btn btn-error btn-lg">No</button>
                                                            </div>
                                                            <br>
                                                        </div>
                                                    </div>
                                            </div>
                                          </form>  
                                    </td> 
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                              <!--   <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
                            </div>
                            <h4 class="panel-title">List of Sponsored Items</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Sponsor</th>
                                            <th>Date Received</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                            // $query = "SELECT * FROM (`ems_r_sponsor` as sp RIGHT JOIN `ems_r_sponsorship` as pp on pp.rss_sponsor_id = sp.rs_sponsor_id) left join ems_r_event as ev on pp.rss_event_id = ev.re_event_id where ev.re_event_id =".$ids."";

                                        $query = "SELECT * FROM `ems_r_sponsor` AS S
                                            INNER JOIN `ems_r_logistics` as L
                                            ON S.rs_sponsor_id = L.rl_sponsor_id
                                            INNER JOIN `ems_r_event` AS E
                                            ON L.rl_event_id = E.re_event_id
                                            WHERE S.rs_status = 1
                                            AND E.re_event_status = 1
                                            AND L.rl_status = 1
                                            AND L.rl_event_id = ".$ids."";

                                            $runquery = mysqli_query($connection, $query);

                                            while ($row = mysqli_fetch_assoc($runquery)){

                                                
                                            $item = $row["rl_item_name"];
                                            $quantity = $row['rl_quantity'];
                                            $sponsor = $row['rs_sponsor_name'];
                                            $date = $row['rl_date_received'];

                                                echo "<tr>
                                                        <td>".$item."</td>
                                                        <td>".$quantity."</td>
                                                        <td>".$sponsor."</td>
                                                        <td>".$date."</td>
                                                        <td style='width:65px'>
                                                        <center>
                                                             <a href='event-logistics.php?viewItems='  class='btn btn-danger'><i class='fa fa-archive'></i></a>
                                                            </center>
                                                        </td>
                                                      </tr> 
                                                     ";
                                            }

                                        ?>
                                    </tbody>
                                    </tbody>
                                </table>
                            </div>
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
    </div>
    <!-- end page container -->
    
    
    
    <script>
        $(document).ready(function() {
            App.init();
            TableManageDefault.init();
            Notification.init();
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
 

<script>

        $('.form-content').multifield({
            section: '.group',
            btnAdd:'#btnAdd',
            btnRemove:'.btnRemove',
        });
</script>

</body>
</html>
