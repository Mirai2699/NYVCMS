<?php 
	include("../../../dbconnection.php");
    include("../utilities/header.php");
    include("../utilities/BaseJs.php");
    include("../utilities/custom.php");
    include("../utilities/navbar.php");
    include("../utilities/notification.php");
?>
	
	<title>List of Events</title>
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li><a href="javascript:;">Reports</a></li>
				<li class="active"><a href="event-report.php">List of Events</a></li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">List of Events</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">

				<!-- begin col-12 -->
				<div class="col-md-12">
		            <p>
						<button type="button" class="btn btn-success" onclick="print();" style="font-size: 16px; margin-top: 27px;">
		                <i class="fa fa-print"></i>
		                Print Report
		            	</button>
			    	</p>

		            <!-- begin panel -->
	                    <div class="panel panel-inverse">
	                        <div class="panel-heading">
	                            <div class="panel-heading-btn">
	                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
	                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
	                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
	                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
	                            </div>
	                            <h4 class="panel-title">Events</h4>
	                        </div>
	                        <div class="panel-body">
	                            <div class="table-responsive">
	                                <table id="data-table" class="table table-striped table-bordered">
	                                    <thead>
	                                        <tr>
	                                            <th>Event Name</th>
	                                            <th>Description</th>
	                                            <th>Event Type</th>
	                                            <th>Start Date</th>
	                                            <th>End Date</th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
	                                        <?php

	                                    		$query = "SELECT * FROM ems_r_event INNER JOIN ems_r_event_type ON ems_r_event.re_etype_id = ems_r_event_type.ret_etype_id  WHERE re_event_status = 1";

	                                    		$runquery = mysqli_query($connection, $query);

	                                    		while ($row = mysqli_fetch_assoc($runquery)){

	                                    			$data_event_name = $row['re_event_name'];
	                                    			$data_event_desc = $row['re_event_description'];
	                                    			$data_event_type = $row['ret_etype_name'];
	                                    			$data_start_date = $row['re_event_startdate'];
	                                    			$data_end_date = $row['re_event_enddate'];

	                                    			echo "<tr>
	                                    					<td>".$data_event_name."</td>
	                                    					<td>".$data_event_desc."</td>
	                                    					<td>".$data_event_type."</td>
	                                    					<td>".$data_start_date."</td>
	                                    					<td>".$data_end_date."</td>
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
		        <!-- end col-12 -->
	    </div> 
	    <!-- end row -->



			
		</div>
		<!-- end #content -->
		
        
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->

		<?php 
			include('event-report-printable.php');
		?>
	</div>
	<!-- end page container -->
	
	
	
	<script>
		$(document).ready(function() {
			App.init();
			TableManageDefault.init();
		});
	</script>

	<script src="../../../resources/print/custom/jasonday-printThis-edc43df/printThis.js"></script>
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
