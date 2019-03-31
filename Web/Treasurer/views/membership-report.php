<?php 
	include("../../../dbconnection.php");
    include("../utilities/header.php");
    include("../utilities/BaseJs.php");
    include("../utilities/custom.php");
    include("../utilities/navbar.php");
    include("../utilities/notification.php");
?>
	
	<title>List of Sponsors</title>
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li><a href="javascript:;">Reports</a></li>
				<li class="active"><a href="event-report.php">List of Expenses</a></li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">List of Expenses</h1>
			<!-- end page-header -->
			
			<div class="row">
				<!-- begin col-12 -->
				<div class="col-md-12">
				<p>
					<button type="button" class="btn btn-primary" onclick="print();" style="font-size: 16px; margin-top: 27px;">
		                <i class="fa fa-print"></i>
		                Print Report
		            </button>
		        </p>
		        <br>
					<div class="panel panel-inverse">
	                    <div class="panel-heading">
	                        <div class="panel-heading-btn">
	                            <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
	                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a> -->
	                        </div>
	                        <h4 class="panel-title">Expense</h4>
	                    </div>
	                    <div class="panel-body">
	                        <div class="table-responsive">
	                            <table id="data-table" class="table table-striped table-bordered">
	                                <thead>
	                                <tr>
	                                	<th>Item Name</th>
	                                	<th>Quantity</th>
	                                    <th>Event</th>
	                                    <th>Sponsor</th>
	                                    <th>Date Received</th>
	                                </tr>
	                            </thead>
	                            <tbody>

	                            	<?php

	                            		$query = "SELECT * FROM ems_r_logistics AS L INNER JOIN ems_r_sponsor AS S ON L.rl_sponsor_id = S.rs_sponsor_id INNER JOIN ems_r_event AS E ON E.re_event_id = L.rl_event_id WHERE rl_status = 1";

	                            		$runquery = mysqli_query($connection, $query);

	                            		while ($row = mysqli_fetch_assoc($runquery)){

	                            			$item = $row['rl_item_name'];
	                            			$quantity = $row['rl_quantity'];
	                            			$event = $row['re_event_name'];
	                            			$sponsor = $row['rs_sponsor_name'];
	                            			$date_received = $row['rl_date_received'];
	                            			$rlid = $row['rl_id'];

	                            			echo "<tr>
	                            					<td>".$item."</td>
	                            					<td>".$quantity."</td>
	                            					<td>".$event."</td>
	                            					<td>".$sponsor."</td>
	                            					<td>".$date_received."</td>
	                            				  </tr>";
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
	        </div>
		</div>
		<!-- end #content -->
		
        
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->

		<?php 
			include('membership-report-printable.php');
		?>
	</div>
	<!-- end page container -->
	
	
	
	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>

	<script src="../../../resources/print/custom/jasonday-printThis-edc43df/printThis.js"></script>
	<script type="text/javascript">
	  function print()
	  {
	    $('#membership').printThis({
	       debug: false,               // show the iframe for debugging
	       importCSS: true,            // import page CSS
	       importStyle:true,           // import style tags
	       printContainer: true,       // grab outer container as well as the contents of the selector
	       //loadCSS: "",              // path to additional css file - use an array [] for multiple
	       pageTitle: "",              // add title to print page
	       removeInline: false,        // remove all inline styles from print elements
	       printDelay: 333,            // variable print delay
	       header: null,               // prefix to html
	       footer: "National Youth Volunteers Coalition Event Management System",               // postfix to html
	       base: false ,               // preserve the BASE tag, or accept a string for the URL
	       formValues: true,           // preserve input/form values
	       canvas: false,              // copy canvas elements (experimental)
	       doctypeString: null,        // enter a different doctype for older markup
	       removeScripts: false,       // remove script tags from print content
	       copyTagClasses: false       // copy classes from the html & body tag
	     });
	  }
	</script>
</body>
</html>
