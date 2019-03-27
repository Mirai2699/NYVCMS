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
				<li class="active">Activity Setup</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Activity Setup</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
				<!-- begin col-12 -->
			    <div class="col-md-12">
			    	<p>
						<td><a href="ui_modal_notification.html#modal-dialog" class="btn btn-sm btn-success" data-toggle="modal">Add Activity</a></td>
			    	</p>
			    	<!-- #modal-dialog -->
							<div class="modal fade" id="modal-dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											<h4 class="modal-title">Add Activity</h4>
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
					                                    <label class="col-md-3 control-label">Activity Name</label>
					                                    <div class="col-md-9">
					                                        <input type="text" id="txt_activity_name" class="form-control" placeholder="Activity Name"/>
					                                    </div>
					                                </div>
					                                <div class="form-group">
					                                    <label class="col-md-3 control-label">Description</label>
					                                    <div class="col-md-9">
					                                        <textarea class="form-control" id="txt_activity_desc" placeholder="Description" rows="2"></textarea>
					                                    </div>
					                                </div>
					                                <div class="form-group">
					                                    <label class="col-md-3 control-label">Start Time</label>
					                                    <div class="col-md-9">
					                                        <input id="txt_start_time" type="text" class="form-control" placeholder="13:00"/>
					                                    </div>
					                                </div>
					                                <div class="form-group">
					                                    <label class="col-md-3 control-label">Person in Charge</label>
					                                    <div class="col-md-9">
					                                        <input id="txt_pic" type="text" class="form-control" placeholder="Name"/>
					                                    </div>
					                                </div>
					                            </form>
					                        </div>
										</div>
										<div class="modal-footer">
											<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
											<a href="javascript:;" id="btn_addactivity" class="btn btn-sm btn-success">Submit</a>
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
                            <h4 class="panel-title">Activities</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Activity Name</th>
                                            <th>Description</th>
                                            <th>Start Time</th>
                                            <th>Event</th>
                                            <th>In Charge</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    	<?php

                                    		$query = "SELECT * FROM ems_r_activity INNER JOIN ems_r_event ON ems_r_activity.ra_event_id = ems_r_event.re_event_id  WHERE ra_activity_status = 1";

                                    		$runquery = mysqli_query($connection, $query);

                                    		while ($row = mysqli_fetch_assoc($runquery)){

                                    			$data_activity = $row['ra_activity_name'];
                                    			$data_description = $row['ra_activity_description'];
                                    			$data_starttime = $row['ra_activity_starttime'];
                                    			$data_event = $row['re_event_name'];
                                    			$data_pic = $row['ra_activity_pic'];
                                    			$dataactivityid = $row['ra_activity_id'];

                                    			echo "<tr>
                                    					<td>".$data_activity."</td>
                                    					<td>".$data_description."</td>
                                    					<td>".$data_starttime."</td>
                                    					<td>".$data_event."</td>
                                    					<td>".$data_pic."</td>
                                    					<td style='width:135px'>
			                                            	<a href='ui_modal_notification.html#modal-edit".$dataactivityid."' class='btn  btn-success' data-toggle='modal'><i class='fa fa-edit'></i></a>
			                                            	<a href='javascript:;' onclick='btn_areventype(".$dataactivityid.")' class='btn btn-danger' data-toggle='modal'><i class='fa fa-times'></i></a>
			                                            </td>
                                    				  </tr>


	                                  					<div class='modal fade' id='modal-edit".$dataactivityid."'>
															<div class='modal-dialog'>
																<div class='modal-content'>
																	<div class='modal-header'>
																		<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
																		<h4 class='modal-title'>Update Activity</h4>
																	</div>
																	<div class='modal-body'>
																		<div class='panel-body'>
												                            <form class='form-horizontal'>
												                                <div class='form-group'>
												                                    <label class='col-md-3 control-label'>Event Activity</label>
												                                    <div class='col-md-9'>
												                                        <input type='text' value='".$data_activity."' id='txt_event_type_name_up".$dataactivityid."' class='form-control' placeholder='Activity Name'/>
												                                    </div>
												                                </div>
												                                <div class='form-group'>
												                                    <label class='col-md-3 control-label'>Description</label>
												                                    <div class='col-md-9'>
												                                        <textarea class='form-control' id='txt_event_type_description_up".$dataactivityid."' placeholder='Description' rows='2'>".$data_description."</textarea>
												                                    </div>
												                                </div>
												                            </form>
												                        </div>
																	</div>
																	<div class='modal-footer'>
																		<a href='javascript:;' class='btn btn-sm btn-white' data-dismiss='modal'>Close</a>
																		<a href='javascript:;' onclick='btn_upeventype(".$dataactivityid.")' class='btn btn-sm btn-success'>Submit</a>
																	</div>
																</div>
															</div>
														</div> 		
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
    	$('#btn_addactivity').click(function(){
    		// alert();

    		let event = $('#dd_event').val();
    		let activity_name = $('#txt_activity_name').val();
    		let activity_desc = $('#txt_activity_desc').val();
    		let start_time = $('#txt_start_time').val();
    		let pic = $('#txt_pic').val();

    		// alert(event+" | "+activity_desc)

    		$.ajax({
    			type: 'POST',
    			data:{
    					_event:event,
    					_activity_name:activity_name,
    					_activity_desc:activity_desc,
    					_start_time:start_time,
    					_pic:pic,
    				},
    			url: '../functionalities/add_activity.php',
    			async: false,
    			success: function(data){
    				alert(data);
    				setTimeout(location.reload.bind(location), 1000);
    			},
    			error: function(reponse){
    				alert('something went wrong')
    			}

    		})

    	})
    </script>

</body>
</html>
