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
                <li><a href="javascript:;">Event Management </a></li>
            </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <h1 class="page-header">Event Setup</h1>
            <!-- end page-header -->

			<!-- begin row -->
			<div class="row">
				<!-- begin col-12 -->
			    <div class="col-md-12">
			    	<p>
						<td><a href="ui_modal_notification.html#modal-dialog" class="btn btn-sm btn-success" data-toggle="modal">Add Event</a></td>
			    	</p>
			    	<!-- #modal-dialog -->
							<div class="modal fade" id="modal-dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											<h4 class="modal-title">Add Event</h4>
										</div>
										<div class="modal-body">
											<div class="panel-body">
					                            <form class="form-horizontal">
					                                <div class="form-group">
					                                    <label class="col-md-3 control-label">Event Name</label>
					                                    <div class="col-md-9">
					                                        <input type="text" id="txt_event_name" class="form-control" placeholder="Event Name"/>
					                                    </div>
					                                </div>
					                                <div class="form-group">
					                                    <label class="col-md-3 control-label">Description</label>
					                                    <div class="col-md-9">
					                                        <textarea class="form-control" id="txt_event_desc" placeholder="Description" rows="2"></textarea>
					                                    </div>
					                                </div>
					                                <div class="form-group">
					                                    <label class="col-md-3 control-label">Event Type</label>
					                                    <div class="col-md-9">
					                                        <select name="dd_etype" id="dd_etype"  class="form-control" style="color: black;" required="">
                                                                <option selected disabled value=""></option>
                                                                    <?php  
                                                                        $sql= "SELECT DISTINCT * FROM ems_r_event_type WHERE ret_status = 1";
                                                                         $results = mysqli_query($connection, $sql) or die("Bad Query: $sql");
                                                                             while($row = mysqli_fetch_assoc($results))
                                                                                {  
                                                                                    $etype = $row['ret_etype_name'];
                                                                                    $id = $row['ret_etype_id'];
                                                                                ?>
                                                               <option id="<?php echo $id ?>" value="<?php echo $id ?>"><?php echo "$etype"; ?></option>
                                                                    <?php
                                                                                }
                                                                    ?>
                                                        	</select>
					                                    </div>
					                                </div>
					                                <div class="form-group">
					                                    <label class="col-md-3 control-label">Date</label>
					                                    <div class="col-md-9">
					                                        <div class="input-group input-daterange">
					                                            <input type="text" id="date_event_start" class="form-control" name="start" placeholder="Date Start" />
					                                            <span class="input-group-addon">to</span>
					                                            <input type="text" id="date_event_end" class="form-control" name="end" placeholder="Date End" />
					                                        </div>
					                                    </div>
					                                </div>
					                                <div class="form-group">
					                                    <label class="col-md-3 control-label">Venue</label>
					                                    <div class="col-md-9">
					                                        <select name="dd_venue" id="dd_venue"  class="form-control" style="color: black;" required="">
                                                                <option selected disabled value=""></option>
                                                                    <?php  
                                                                        $sql= "SELECT DISTINCT * FROM `ems_r_venue`";
                                                                         $results = mysqli_query($connection, $sql) or die("Bad Query: $sql");
                                                                             while($row = mysqli_fetch_assoc($results))
                                                                                {  
                                                                                    $ven = $row['rv_ven_name'];
                                                                                    $id = $row['rv_ven_id'];
                                                                                ?>
                                                               <option id="<?php echo $id ?>" value="<?php echo $id ?>"><?php echo "$ven"; ?></option>
                                                                    <?php
                                                                                }
                                                                    ?>
                                                        </select>
					                                    </div>
					                                </div>
					                                <div class="form-group">
					                                    <label class="col-md-3 control-label">Member Fee</label>
					                                    <div class="col-md-9">
					                                        <input type="text" id="txt_mem_fee" class="form-control" placeholder="00.00"/>
					                                    </div>
					                                </div>
					                                <div class="form-group">
					                                    <label class="col-md-3 control-label">Non member fee</label>
					                                    <div class="col-md-9">
					                                        <input type="text" id="txt_nonmem_fee" class="form-control" placeholder="00.00"/>
					                                    </div>
					                                </div>
					                            </form>
					                        </div>
										</div>
										<div class="modal-footer">
											<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
											<a href="javascript:;" id="btn_addevent" class="btn btn-sm btn-success">Submit</a>
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
                                            <th>Action</th>
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
                                    			$dataeventid = $row['re_event_id'];

                                    			echo "<tr>
                                    					<td>".$data_event_name."</td>
                                    					<td>".$data_event_desc."</td>
                                    					<td>".$data_event_type."</td>
                                    					<td>".$data_start_date."</td>
                                    					<td>".$data_end_date."</td>
                                    					<td style='width:135px'>
                                                        <center>
			                                            	<a href='ui_modal_notification.html#modal-edit".$dataeventid."' class='btn  btn-success' data-toggle='modal'><i class='fa fa-edit'></i></a>
                                                             <a href='event_to_sponsor.php?viewEvent=".$dataeventid."'  class='btn btn-primary'><i class='fa fa-group'></i></a>
                                                            <a href='event_to_activity.php?viewEvent=".$dataeventid."'  class='btn btn-primary'><i class='fa fa-file-text'></i></a>
                                                            </center>
			                                            </td>
                                    				  </tr>


	                                  					<div class='modal fade' id='modal-edit".$dataeventid."'>
															<div class='modal-dialog'>
																<div class='modal-content'>
																	<div class='modal-header'>
																		<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
																		<h4 class='modal-title'>Update User Role</h4>
																	</div>
																	<div class='modal-body'>
																		<div class='panel-body'>
												                            <form class='form-horizontal'>
												                                <div class='form-group'>
												                                    <label class='col-md-3 control-label'>Event Name</label>
												                                    <div class='col-md-9'>
												                                        <input type='text' value='".$data_event_name."' id='txt_event_name_up".$dataeventid."' class='form-control' placeholder='Event Name'/>
												                                    </div>
												                                </div><br><br>
												                                <div class='form-group'>
												                                    <label class='col-md-3 control-label'>Description</label>
												                                    <div class='col-md-9'>
												                                        <textarea id='txt_event_desc_up".$dataeventid."' class='form-control' placeholder='Description' rows='2'>".$data_event_desc."</textarea>
												                                    </div>
												                                </div>
												                            </form>
												                        </div>
																	</div>
																	<div class='modal-footer'>
																		<a href='javascript:;' class='btn btn-sm btn-white' data-dismiss='modal'>Close</a>
																		<a href='javascript:;' onclick='btn_upuserrole(".$dataeventid.")' class='btn btn-sm btn-success'>Submit</a>
																	</div>
																</div>
															</div>
														</div> 		
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

    <script>
    	$(function()){
    		$('#date_event_start').mask("9999/99/99", {placeholder: 'YYYY/MM/DD' });
    		$('#date_event_end').mask("9999/99/99", {placeholder: 'YYYY/MM/DD' });

    	});


    </script>


    <script type="text/javascript">
    	$('#btn_addevent').click(function(){
    		// alert();

    		let event_name = $('#txt_event_name').val();
    		let event_desc = $('#txt_event_desc').val();
    		let event_type = $('#dd_etype').val();
    		let event_startdate = $('#date_event_start').val();
    		let event_enddate = $('#date_event_end').val();
    		let event_venue = $('#dd_venue').val();
    		let event_memfee = $('#txt_mem_fee').val();
    		let event_nonmemfee = $('#txt_nonmem_fee').val();

    		// alert(etype_name+" | "+etype_description)

    		$.ajax({
    			type: 'POST',
    			data:{
    					_event_name:event_name,
    					_event_desc:event_desc,
    					_event_type:event_type,
    					_event_startdate:event_startdate,
    					_event_enddate:event_enddate,
    					_event_venue:event_venue,
    					_event_memfee:event_memfee,
    					_event_nonmemfee:event_nonmemfee
    				},
    			url: '../functionalities/add_event.php',
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
