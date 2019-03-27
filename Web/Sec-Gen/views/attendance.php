<?php 
	include("../../../dbconnection.php");
    include("../utilities/header.php");
    include("../utilities/BaseJs.php");
    include("../utilities/custom.php");
    include("../utilities/navbar.php");
    include("../utilities/notification.php");
?>
		
		
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li><a href="javascript:;">Event Management	</a></li>
				<li class="active">Attendance</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Attendance</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
				<!-- begin col-12 -->
			    <div class="col-md-12">
			    	<p>
						<td><a href="ui_modal_notification.html#modal-dialog" class="btn btn-sm btn-success" data-toggle="modal">Add Attendee</a></td>
			    	</p>
			    	<!-- #modal-dialog -->
							<div class="modal fade" id="modal-dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											<h4 class="modal-title">Add Attendee</h4>
										</div>
										<div class="modal-body">
											<div class="panel-body">
					                            <form class="form-horizontal">
					                            	<div class="form-group">
					                                    <label class="col-md-3 control-label">Event</label>
					                                    <div class="col-md-9">
					                                         <select name="dd_event" id="dd_event"  class="form-control" style="color: black;" required="">
                                                                <option selected disabled value=""></option>
                                                                    <?php  
                                                                    	include ('includes/dbconnection.php');
                                                                        $sql= "SELECT DISTINCT * FROM `ems_r_event`";
                                                                         $results = mysqli_query($connection, $sql) or die("Bad Query: $sql");
                                                                             while($row = mysqli_fetch_assoc($results))
                                                                                {  
                                                                                    $event = $row['re_event_name'];
                                                                                    $id = $row['re_event_id'];
                                                                                ?>
                                                               <option id="<?php echo $id ?>" value="<?php echo $id ?>"><?php echo "$event"; ?></option>
                                                                    <?php
                                                                                }
                                                                    ?>
                                                        </select>
					                                    </div>
					                                </div>
					                                <div class="form-group">
					                                    <label class="col-md-3 control-label">SDG</label>
					                                    <div class="col-md-9">
					                                         <select id="dd_sdg"  class="form-control" style="color: black;" required="">
                                                                <option selected disabled value=""></option>
                                                                    <?php  
                                                                    	include ('includes/dbconnection.php');
                                                                        $sql= "SELECT DISTINCT * FROM `ems_r_sdg`";
                                                                         $results = mysqli_query($connection, $sql) or die("Bad Query: $sql");
                                                                             while($row = mysqli_fetch_assoc($results))
                                                                                {  
                                                                                    $sdg = $row['rsd_sdg_name'];
                                                                                    $id = $row['rsd_sdg_id'];
                                                                                ?>
                                                               <option id="<?php echo $id ?>" value="<?php echo $id ?>"><?php echo "$sdg"; ?></option>
                                                                    <?php
                                                                                }
                                                                    ?>
                                                        </select>
					                                    </div>
					                                </div>
					                                <div class="form-group">
					                                    <label class="col-md-3 control-label">Date</label>
					                                    <div class="col-md-9">
					                                    	<div class="input-group">
					                                            <input type="date" id="date" class="form-control" placeholder="Date" />
					                                        </div>
					                                    </div>
					                                </div>
					                                <div class="form-group">
					                                    <label class="col-md-3 control-label">Name</label>
					                                    <div class="col-md-9">
					                                        <input type="text" id="txt_name" class="form-control" placeholder="Name"/>
					                                    </div>
					                                </div>
					                                <div class="form-group">
					                                    <label class="col-md-3 control-label">Age</label>
					                                    <div class="col-md-3">
					                                        <input id="txt_age" type="text" class="form-control" placeholder="Age"/>
					                                    </div>
					                                    <label class="col-md-2 control-label">Gender</label>
					                                    <div class="col-md-3">
					                                        <select id="dd_gender" class="form-control">
					                                            <option value="Male">Male</option>
					                                            <option value="Female">Female</option>
					                                        </select>
					                                    </div>
					                                </div>
					                                <div class="form-group">
					                                    <label class="col-md-3 control-label">Contact No.</label>
					                                    <div class="col-md-9">
					                                        <input id="txt_contactno" type="text" class="form-control" placeholder="09xxxxxxxxx"/>
					                                    </div>
					                                </div>
					                            </form>
					                        </div>
										</div>
										<div class="modal-footer">
											<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
											<a href="javascript:;" id="btn_addattendee" class="btn btn-sm btn-success">Submit</a>
										</div>
									</div>
								</div>
							</div>
							<!-- #modal-without-animation -->
			        <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Attendance</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Event</th>
                                            <th>SDG</th>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th style='width:75px'>Age</th>
                                            <th style='width:90px'>Gender</th>
                                            <th style='width:130px'>Contact No.</th>
                                            <th style='width:90px'>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    	<?php


                                    		$query = "SELECT * FROM ems_t_attendance AS A INNER JOIN ems_r_event AS E ON A.ta_event_id = E.re_event_id INNER JOIN ems_r_sdg AS S ON A.ta_sdg_id = S.rsd_sdg_id WHERE ta_activeflag = 1";

                                    		$runquery = mysqli_query($connection, $query);

                                    		while ($row = mysqli_fetch_assoc($runquery)){

                                    			$event = $row['re_event_name'];
                                    			$sdg = $row['rsd_sdg_name'];
                                    			$name = $row['ta_name'];
                                    			$date = $row['ta_date_attended'];
                                    			$age = $row['ta_age'];
                                    			$gender = $row['ta_gender'];
                                    			$contactno = $row['ta_contact_no'];
                                    			$attendanceid = $row['ta_attendance_id'];

                                    			echo "<tr>
                                    					<td>".$event."</td>
                                    					<td>".$sdg."</td>
                                    					<td>".$name."</td>
                                    					<td>".$date."</td>
                                    					<td>".$age."</td>
                                    					<td>".$gender."</td>
                                    					<td>".$contactno."</td>
                                    					<td style='width:100px'>
			                                            	<a href='javascript:;' onclick='btn_areventype(".$attendanceid.")' class='btn btn-danger' data-toggle='modal'><i class='fa fa-times'></i></a>
			                                            </td>
                                    				  </tr>
	                                    			 ";
                                    		}

                                    	?>
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

    <script type="text/javascript">
    	$('#btn_addattendee').click(function(){
    		// alert();

    		let event = $('#dd_event').val();
    		let sdg = $('#dd_sdg').val();
    		let date = $('#date').val();
    		let name = $('#txt_name').val();
    		let age = $('#txt_age').val();
    		let gender = $('#dd_gender').val();
    		let contactno = $('#txt_contactno').val();

    		// alert(event+" | "+sdg+" | "+date+" | "+name+" | "+age+" | "+gender+" | "+contactno)

    		$.ajax({
    			type: 'POST',
    			data:{
    					_event:event,
    					_sdg:sdg,
    					_date:date,
    					_name:name,
    					_age:age,
    					_gender:gender,
    					_contactno:contactno
    				},
    			url: 'functionalities/add_atendance.php',
    			async: false,
    			success: function(data){
    				alert('An attendee is succesfully added');
    				setTimeout(location.reload.bind(location), 1000);
    			},
    			error: function(reponse){
    				alert('Oops, something went wrong')
    			}

    		})

    	})
    </script>

</body>
</html>
