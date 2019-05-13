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
			<!-- <ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li><a href="javascript:;">System Configuration</a></li>
				<li class="active">Sustainable Development Goals</li>
			</ol> -->
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Membership</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
				<!-- begin col-12 -->
			    <div class="col-md-12">
                    <ul class="nav nav-tabs">
						<li class="active"><a href="ui_tabs_accordions.html#default-tab-1" data-toggle="tab">Active</a></li>
						<li class=""><a href="ui_tabs_accordions.html#default-tab-2" data-toggle="tab">Inactive</a></li>
						<li class=""><a href="ui_tabs_accordions.html#default-tab-3" data-toggle="tab">For Renewal</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade active in" id="default-tab-1">
							<!-- begin panel -->
			                    <div class="panel panel-inverse">
			                        <div class="panel-body">
			                            <div class="table-responsive">
			                                <table id="data-table" class="table table-striped table-bordered">
											<thead>
											    <tr>
											        <th>Name</th>
											        <th>Gender</th>
											        <th>Contact No.</th>
											        <th>Email</th>
											        <th>Action</th>
											    </tr>
											</thead>
											<tbody>

												<?php

													$query = "SELECT * FROM ems_t_individual_membership AS M  INNER JOIN ems_r_individual_info AS I ON M.tim_individ = I.rii_individ WHERE M.tim_status = 'Paid' AND M.tim_activeflag = 1";

													$runquery = mysqli_query($connection, $query);

													while ($row = mysqli_fetch_assoc($runquery)){

														$name = $row['rii_name'];
														$gender = $row['rii_gender'];
														$conno = $row['rii_conno'];
														$email = $row['rii_email'];
														$id = $row['tim_indivmemid'];	

														echo "<tr>
																<td>".$name."</td>
																<td>".$gender."</td>
																<td>".$conno."</td>
																<td>".$email."</td>
											                    <td>
											                        <a class='btn btn-danger btn_sm' data-toggle='modal' href='ui_modal_notification.html#modal-inactive".$id."'>Inactive
											                        </a>
											                    </td>
															</tr>";
				                                		}

				                                	?>
				                                </tbody>
				                            </table>
										</div>
			                        </div>
			                    </div>
			                    <!-- end panel -->
						</div>
						<div class="tab-pane fade" id="default-tab-2">
							<table id="data-table" class="table table-striped table-bordered">
	                            <thead>
	                                <tr>
								        <th>Name</th>
								        <th>Gender</th>
								        <th>Contact No.</th>
								        <th>Email</th>
								        <th>Action</th>
							    	</tr>
	                            </thead>
	                            <tbody>

	                            	<?php

	                            		$query = "SELECT * FROM ems_t_individual_membership AS M  INNER JOIN ems_r_individual_info AS I ON M.tim_individ = I.rii_individ WHERE M.tim_status = 'Paid' AND M.tim_activeflag = 0";

	                            		$runquery = mysqli_query($connection, $query);

	                            		while ($row = mysqli_fetch_assoc($runquery)){

	                            			$name = $row['rii_name'];
											$gender = $row['rii_gender'];
											$conno = $row['rii_conno'];
											$email = $row['rii_email'];
											$id = $row['tim_indivmemid'];

	                            			echo "<tr>
												<td>".$name."</td>
												<td>".$gender."</td>
												<td>".$conno."</td>
												<td>".$email."</td>
							                    <td>
							                        <a href='ui_modal_notification.html#modal-edit".$id."' class='btn  btn-success' data-toggle='modal'>Renew</a>
							                    </td>
											  </tr>

											  <div class='col-md-12'>
	                              					<div class='modal fade' id='modal-edit".$id."'>
														<div class='modal-dialog'>
															<div class='modal-content'>
																<div class='modal-header'>
																	<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
																	<h4 class='modal-title'>Payment</h4>
																</div>
																<div class='modal-body'>
																	<div class='panel-body'>
											                            <form class='form-horizontal'>
											                                <div class='form-group'>
											                                    <label class='col-md-3 control-label'>Name</label>
											                                    <div class='col-md-9'>
											                                        <input type='text' value='".$name."' id='txt_name".$id."' class='form-control' placeholder='Name' disabled='disabled'/>
											                                    </div>
											                                </div>
											                                <div class='form-group'>
											                                    <label class='col-md-3 control-label'>Date</label>
											                                    <div class='col-md-9'>
											                                    	<div class='input-group'>
											                                            <input type='date' id='date' class='form-control' placeholder='Date' />
											                                        </div>
											                                    </div>
											                                </div>
											                            </form>
											                        </div>
																</div>
																<div class='modal-footer'>
																	<a href='javascript:;' class='btn btn-sm btn-white' data-dismiss='modal'>Close</a>
																	<a href='javascript:;' onclick='btn_renewal(".$id.")' class='btn btn-sm btn-success'>Submit</a>
																</div>
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
						<div class="tab-pane fade" id="default-tab-3">
							<!-- begin panel -->
                            <div class="table-responsive">
                                <table id="data-table" class="table table-striped table-bordered">
									<thead>
									    <tr>
									        <th>Name</th>
									        <th>Gender</th>
									        <th>Contact No.</th>
									        <th>Email</th>
									        <th>Date</th>
									    </tr>
									</thead>
									<tbody>

										<?php

											$query = "SELECT * FROM ems_t_individual_membership AS M  INNER JOIN ems_r_individual_info AS I ON M.tim_individ = I.rii_individ INNER JOIN ems_t_renewal_indiv AS R ON R.tri_indivmemid = M.tim_indivmemid WHERE M.tim_status = 'Renewal' AND R.tri_status = 'Pending' AND M.tim_activeflag = 1 AND R.tri_activeflag = 1";

											$runquery = mysqli_query($connection, $query);

											while ($row = mysqli_fetch_assoc($runquery)){

												$name = $row['rii_name'];
												$gender = $row['rii_gender'];
												$conno = $row['rii_conno'];
												$email = $row['rii_email'];
												$date = $row['tri_date'];
												$id = $row['tri_indivrenid'];	

												echo "<tr>
														<td>".$name."</td>
														<td>".$gender."</td>
														<td>".$conno."</td>
														<td>".$email."</td>
														<td>".$date."</td>
													</tr>";
		                                		}

		                                	?>
		                                </tbody>
		                            </table>
								</div>
	                        
	                    <!-- end panel -->
						</div>
					</div>
				</div>
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

	<!-- inactive modal -->
	<?php

		$query = "SELECT * FROM ems_t_individual_membership AS M  INNER JOIN ems_r_individual_info AS I ON M.tim_individ = I.rii_individ WHERE M.tim_status = 'Paid' AND M.tim_activeflag = 1";

			$runquery = mysqli_query($connection, $query);

			while ($row = mysqli_fetch_assoc($runquery)){

				$name = $row['rii_name'];
				$gender = $row['rii_gender'];
				$conno = $row['rii_conno'];
				$email = $row['rii_email'];
				$id = $row['tim_indivmemid'];
	?>

	<div class='modal fade' id="modal-inactive<?php echo $id ?>">
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
					<h4 class='modal-title'>Change Status</h4>
				</div>
				<div class="modal-body">
					<div class="alert alert-danger m-b-0">
						<p>Are you sure you want to change the status of this member?</p>
					</div>
				</div>
				<div class='modal-footer'>
					<a href='' class='btn btn-sm btn-white' data-dismiss='modal'>No</a>
					<a href='' onclick="btn_inactive(<?php echo $id ?>)" class='btn btn-sm btn-danger'>Yes</a>
				</div>
			</div>
		</div>
	</div>
    <?php } ?>
    <!-- inactive modal -->
	
	
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
    	// $('#btn_addsdg').click(function(){
    	// 	// alert();

    	// 	let sdg_name = $('#txt_sdg_name').val();
    	// 	let sdg_description = $('#txt_sdg_description').val();

    	// 	// alert(etype_name+" | "+etype_description)

    	// 	$.ajax({
    	// 		type: 'POST',
    	// 		data:{
    	// 				_sdg_name:sdg_name,
    	// 				_sdg_description:sdg_description
    	// 			},
    	// 		url: 'functionalities/add_sdg.php',
    	// 		async: false,
    	// 		success: function(data){
    	// 			alert(data);
    	// 			setTimeout(location.reload.bind(location), 1000);
    	// 		},
    	// 		error: function(reponse){
    	// 			alert('something went wrong')
    	// 		}

    	// 	})

    	// })


    	function btn_inactive(myId){
    		// alert(myId)

    		$.ajax({
    			type: 'POST',
    			url:'../functionalities/inactive-indiv.php',
    			async: false,
    			data:{
    					_myId:myId
    			},
    			success: function(data){
    				// alert(data)
    				setTimeout(location.reload.bind(location), 1000)
    			},
    			error: function(response){
    				alert('Oops, something went wrong')
    			}
    		})
    	}

    	function btn_renewal(myId){
    		// alert(myId)
    		let date = $('#date').val(); 

    		$.ajax({
    			type: 'POST',
    			url:'../functionalities/active-indiv.php',
    			async: false,
    			data:{
    					_date:date,
    					_myId:myId
    			},
    			success: function(data){
    				// alert(data)
    				setTimeout(location.reload.bind(location), 1000)
    			},
    			error: function(response){
    				alert('Oops, something went wrong')
    			}
    		})
    	}

    	

    </script>
</body>
</html>
