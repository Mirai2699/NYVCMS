
    <title>Zoning Report | MUPDS</title>
<?php
    
    include("../utilities/Header.php");
   // include("../utilities/Notification.php");
    include("../utilities/navibar.php");
    include("../utilities/BaseJs.php");
    include("../utilities/Table_Default.php");
?>
     
        
        <!-- begin #content -->
        <div id="content" class="content">
            <!-- begin breadcrumb -->
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
                    <li class="breadcrumb-item active">View Zoning Report</li>
                </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
                <h1 class="page-header">Zoning Application Report View</h1>
            <!-- end page-header -->
            <!--Line Divider-->
                <div class="row" style="padding: 1px; background-color: #262626; margin-bottom: 20px"></div>
            <!--Line Divider-->


            <!-- START CUSTOM CONTENT-->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h2 class="panel-title">Create a Report</h2>
                </div>
                <div class="panel-body">
                    <!--FILTER START-->
                    <div class="row" style="margin:3px">
                        <div class="col-md-12" style="border:1px solid; background-color: #242424;">
                            <p style="font-size: 15px; font-weight: bold; margin: 5px; color: white;">Action Available:</p>
                            <!--FORM START-->
                            <form action="" method="POST">
                                <div class="row" style="margin: 10px">
                                    <div class="col-md-2">
                                        <label style="color: white">Filter By Status</label>
                                        <select class="form-control" name="filter_by_status">
                                            <option value="ALL" selected> -- ALL STATUS -- </option>
                                            <option value="PENDING">PENDING</option>
                                            <option value="REVISION">FOR REVISION</option>
                                            <option value="APPROVED">APPROVED</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label style="color: white">Filter By Barangay</label>
                                        <select class="form-control" name="filter_by_brgy">
                                            <option value="ALL" selected> -- ALL BARANGAY -- </option>
                                            <?php
                                              
                                              $get_brgy = mysqli_query($connection,"SELECT * FROM `r_barangay` WHERE brgy_stat = 'Active'
                                                and brgy_municipality = 2");
                                              while($row = mysqli_fetch_assoc($get_brgy))
                                              {
                                                  $brgy_ID = $row["brgy_ID"];
                                                  $brgy_name = $row["brgy_name"];
                                            ?>
                                            <option value="<?php echo $brgy_ID ?>"><?php echo $brgy_name?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label style="color: white">Filter by Month</label>
                                        <div class="row">
                                            <input type="month" name="start_month" class="form-control" style="width: 45%" />
                                            <label style="margin: 5px; color: white">To</label>
                                            <input type="month" name="end_month" class="form-control" style="width: 45%" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-success" name="filter_stat" style="font-size: 16px; margin-top: 27px">
                                            <i class="fa fa-copy"></i>
                                            Create Report
                                        </button>
                                        &nbsp;&nbsp;
                                         <button type="button" class="btn btn-primary" onclick="print();" style="font-size: 16px; margin-top: 27px;">
                                            <i class="fa fa-print"></i>
                                            Print Report
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <!--FORM END-->
                            <div class="row" style="margin-bottom: 10px"></div>
                        </div>
                    </div>
                    <!--FILTER END-->
                </div>
               

                <div class="panel-body">
                    <div class="panel-heading" style="background-color: #242424">
                        <h2 class="panel-title" style="color: white">Zoning Applications</h2>
                    </div>
                    <!--FILTER START-->
                    <div class="row" style="margin:3px">

                        <div class="col-md-12">
                            <br>
                            <!--FORM START-->
                            <table id="data-table-default" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>App No.</th>
                                        <th>Applicant Name</th>
                                        <th>Project Location (Brgy)</th>
                                        <th>Project Status</th>
                                        <th>Current Step</th>
                                        <th>Application Date</th>   
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php include("report_zoning_filter_details.php");?>
                                </tbody>
                            </table>
                            <!--FORM END-->
                            <div class="row" style="margin-bottom: 10px"></div>
                        </div>
                    </div>
                    <!--FILTER END-->
                </div>
            </div>
            <!-- END CUSTOM CONTENT -->


        </div>
        <!-- end #content -->
        
    </div>
    <!-- end page container -->
    
    <?php include("zone_app_report_printable.php");?>
   </body>
</html>
<!-- ======= ON PAGE SCRIPT ======== -->
<!-- <script>
    $(document).ready(function() { 
        App.init();
    });
</script> -->
<script src="../../../resources/custom/jasonday-printThis-edc43df/printThis.js"></script>
<script type="text/javascript">
  function print()
  {
    $('#demo').printThis({
       debug: false,               // show the iframe for debugging
       importCSS: true,            // import page CSS
       importStyle:true,           // import style tags
       printContainer: true,       // grab outer container as well as the contents of the selector
       //loadCSS: "",              // path to additional css file - use an array [] for multiple
       pageTitle: "",              // add title to print page
       removeInline: false,        // remove all inline styles from print elements
       printDelay: 333,            // variable print delay
       header: null,               // prefix to html
       footer: "Municipal Urban Planning and Development System | © SRG 7TH Generation All Right Reserved ",               // postfix to html
       base: false ,               // preserve the BASE tag, or accept a string for the URL
       formValues: true,           // preserve input/form values
       canvas: false,              // copy canvas elements (experimental)
       doctypeString: null,        // enter a different doctype for older markup
       removeScripts: false,       // remove script tags from print content
       copyTagClasses: false       // copy classes from the html & body tag
     });
  }
</script>
<!-- ======= ON PAGE SCRIPT ======== -->




       
              
              

              
              
            