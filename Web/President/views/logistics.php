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
				<li class="active">Logistics</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Logistics</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
				<!-- begin col-12 -->
			    <div class="col-md-12">
			    	<p>
						<td><a href="ui_modal_notification.html#modal-dialog" class="btn btn-sm btn-success" data-toggle="modal">Add Item</a></td>
			    	</p>
			    	<!-- #modal-dialog -->
							<div class="modal fade" id="modal-dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											<h4 class="modal-title">Add Item</h4>
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
					                                    <label class="col-md-3 control-label">Item</label>
					                                    <div class="col-md-9">
					                                        <input type="text" id="txt_item" class="form-control" placeholder="Item"/>
					                                    </div>
					                                </div>
					                                <div class="form-group">
					                                    <label class="col-md-3 control-label">Quantity</label>
					                                    <div class="col-md-9">
					                                        <input type="numeric" id="txt_quan" class="form-control" placeholder="Quantity"/>
					                                    </div>
					                                </div>
					                                <div class="form-group">
					                                    <label class="col-md-3 control-label">Sponsor</label>
					                                    <div class="col-md-9">
					                                        <select name="dd_sponsor" id="dd_sponsor"  class="form-control" style="color: black;" required="">
                                                                <option selected disabled value=""></option>
                                                                    <?php  
                                                                    	include ('includes/dbconnection.php');
                                                                        $sql= "SELECT DISTINCT * FROM `ems_r_sponsor`";
                                                                         $results = mysqli_query($connection, $sql) or die("Bad Query: $sql");
                                                                             while($row = mysqli_fetch_assoc($results))
                                                                                {  
                                                                                    $sponsor = $row['rs_sponsor_name'];
                                                                                    $id = $row['rs_sponsor_id'];
                                                                                ?>
                                                               <option id="<?php echo $id ?>" value="<?php echo $id ?>"><?php echo "$sponsor"; ?></option>
                                                                    <?php
                                                                                }
                                                                    ?>
                                                        </select>
					                                    </div>
					                                </div>
					                                <div class="form-group">
					                                    <label class="col-md-3 control-label">Date Received</label>
					                                    <div class="col-md-9">
					                                    	<div class="input-group">
					                                        <input type="date" class="form-control" id="date_received" placeholder="Date Received" />
					                                    	</div>
					                                    </div>
					                                </div>
					                            </form>
					                        </div>
										</div>
										<div class="modal-footer">
											<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
											<a href="javascript:;" id="btn_additem" class="btn btn-sm btn-success">Submit</a>
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
                            <h4 class="panel-title">Items</h4>
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
                                            <th>Action</th>
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
                                    					<td style='width:135px'>
			                                            	<a href='ui_modal_notification.html#modal-edit".$rlid."' class='btn  btn-success' data-toggle='modal'><i class='fa fa-edit'></i></a>
			                                            	<a href='javascript:;' onclick='btn_areventype(".$rlid.")' class='btn btn-danger' data-toggle='modal'><i class='fa fa-times'></i></a>
			                                            </td>
                                    				  </tr>


	                                  					<div class='modal fade' id='modal-edit".$rlid."'>
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
												                                    <label class='col-md-3 control-label'>Item</label>
												                                    <div class='col-md-9'>
												                                        <input type='text' value='".$item."' id='txt_event_type_name_up".$rlid."' class='form-control' placeholder='Activity Name'/>
												                                    </div>
												                                </div>
												                            </form>
												                        </div>
																	</div>
																	<div class='modal-footer'>
																		<a href='javascript:;' class='btn btn-sm btn-white' data-dismiss='modal'>Close</a>
																		<a href='javascript:;' onclick='btn_upeventype(".$rlid.")' class='btn btn-sm btn-success'>Submit</a>
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
    	$('#btn_additem').click(function(){
    		// alert();

    		let event = $('#dd_event').val();
    		let item = $('#txt_item').val();
    		let quan = $('#txt_quan').val();
    		let sponsor = $('#dd_sponsor').val();
    		let date = $('#date_received').val();

    		// alert(event+" | "+activity_desc)

    		$.ajax({
    			type: 'POST',
    			data:{
    					_event:event,
    					_item:item,
    					_quan:quan,
    					_sponsor:sponsor,
    					_date:date,
    				},
    			url: '../functionalities/add_item.php',
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
