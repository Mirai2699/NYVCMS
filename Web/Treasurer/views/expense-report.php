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
			
			
			<button type="button" class="btn btn-primary" onclick="print();" style="font-size: 16px; margin-top: 27px;">
                <i class="fa fa-print"></i>
                Print Report
            </button>

			
		</div>
		<!-- end #content -->
		
        
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->

		<?php 
			include('expense-report-printable.php');
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
	    $('#expense').printThis({
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
