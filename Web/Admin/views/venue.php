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
				<li><a href="javascript:;">Event Management</a></li>
				<li class="active">Venue</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Venue</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
				<!-- begin col-12 -->
			    <div class="col-md-12">
			    	<p>
						<td><a href="ui_modal_notification.html#modal-dialog" class="btn btn-sm btn-success" data-toggle="modal">Add Venue</a></td>
			    	</p>
			    	<!-- #modal-dialog -->
							<div class="modal fade" id="modal-dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											<h4 class="modal-title">Add Venue</h4>
										</div>
										<div class="modal-body">
											<div class="panel-body">
					                            <form class="form-horizontal">
					                                <div class="form-group">
					                                    <label class="col-md-3 control-label">Name</label>
					                                    <div class="col-md-9">
					                                        <input type="text" id="txt_ven_name" class="form-control" placeholder="Name"/>
					                                    </div>
					                                </div>
					                                <div class="form-group">
					                                    <label class="col-md-3 control-label">Capacity</label>
					                                    <div class="col-md-9">
					                                        <input type="text" id="txt_ven_cap" class="form-control" placeholder="Capacity"/>
					                                    </div>
					                                </div>
					                                <div class="form-group">
					                                    <label class="col-md-3 control-label">Contact Person</label>
					                                    <div class="col-md-9">
					                                        <input type="text" id="txt_ven_conper" class="form-control" placeholder="Name"/>
					                                    </div>
					                                </div>
					                                <div class="form-group">
					                                    <label class="col-md-3 control-label">Contact no.</label>
					                                    <div class="col-md-9">
					                                        <input type="text" id="txt_ven_conno" class="form-control" placeholder="09xxxxxxxxx"/>
					                                    </div>
					                                </div>
					                                <div class="form-group">
					                                    <label class="col-md-3 control-label">Barangay</label>
					                                    <div class="col-md-9">
					                                        <input type="text" id="txt_brngy" class="form-control" placeholder="Name"/>
					                                    </div>
					                                </div>
					                                <div class="form-group">
					                                    <label class="col-md-3 control-label">City/Municipality</label>
					                                    <div class="col-md-9">
					                                        <input type="text" id="txt_city" class="form-control" placeholder="Name"/>
					                                    </div>
					                                </div>
					                                <div class="form-group">
					                                    <label class="col-md-3 control-label">Province</label>
					                                    <div class="col-md-9">
					                                        <input type="text" id="txt_province" class="form-control" placeholder="Name"/>
					                                    </div>
					                                </div>
					                                <div class="col-md-4">
														<div class="form-group">
		                                  				  <label class="col-md-3">Region</label>
		                                  				 		<select required data-parsley-group="wizard-step-2" class="form-control" id="dd_region">
			                                           				<option value="Ilocos Region">Ilocos Region</option>
			                                          				<option value="Cagayan Valley">Cagayan Valley</option>
			                                          				<option value="Central Luzon">Central Luzon</option>
			                                          				<option value="CALABARZON">CALABARZON</option>
			                                          				<option value="MIMAROPA">MIMAROPA</option>
			                                          				<option value="Bicol Region">Bicol Region</option>
			                                          				<option value="CAR">CAR</option>
			                                          				<option value="NCR">NCR</option>
			                                          				<option value="Western Visayas">Western Visayas</option>
			                                          				<option value="Central Visayas">Central Visayas</option>
			                                          				<option value="Eastern Visayas">Eastern Visayas</option>
			                                          				<option value="Zamboanga Peninsula">Zamboanga Peninsula</option>
			                                          				<option value="Northern Mindanao">Northern Mindanao</option>
			                                          				<option value="Davao Region">Davao Region</option>
			                                          				<option value="SOCCSKSARGEN">SOCCSKSARGEN</option>
			                                          				<option value="Caraga Region">Caraga Region</option>
			                                          				<option value="SOCCSKSARGEN">SOCCSKSARGEN</option>
			                                          				<option value="ARMM">ARMM</option>
		                                     				   </select>
		                                  				</div>
		                              				 </div>
					                            </form>
					                        </div>
										</div>
										<div class="modal-footer">
											<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
											<a href="javascript:;" id="btn_addven" class="btn btn-sm btn-success">Submit</a>
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
                            <h4 class="panel-title">Venues</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Capacity</th>
                                            <th>Barangay</th>
                                            <th>City/Municipality</th>
                                            <th>Province</th>
                                            <th>Region</th>
                                            <th>Contact Person</th>
                                            <th>Contact No.</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    	<?php

                                    		$query = "SELECT * FROM ems_r_venue WHERE rv_ven_status = 1";

                                    		$runquery = mysqli_query($connection, $query);

                                    		while ($row = mysqli_fetch_assoc($runquery)){

                                    			$data_ven = $row['rv_ven_name'];
                                    			$data_vencap = $row['rv_ven_capacity'];
                                    			$data_brngy = $row['rv_ven_barangay'];
                                    			$data_city = $row['rv_ven_city'];
                                    			$data_province = $row['rv_ven_province'];
                                    			$data_region = $row['rv_ven_region'];
                                    			$data_venconper = $row['rv_ven_conper'];
                                    			$data_venconno = $row['rv_ven_contactno'];
                                    			$data_venid = $row['rv_ven_id'];

                                    			echo "<tr>
                                    					<td>".$data_ven."</td>
                                    					<td>".$data_vencap."</td>
                                    					<td>".$data_brngy."</td>
                                    					<td>".$data_city."</td>
                                    					<td>".$data_province."</td>
                                    					<td>".$data_region."</td>
                                    					<td>".$data_venconper."</td>
                                    					<td>".$data_venconno."</td>
                                    					<td>
			                                            	<a href='ui_modal_notification.html#modal-edit".$data_venid."' class='btn  btn-success' data-toggle='modal'><i class='fa fa-edit'></i></a>
			                                            	<a href='javascript:;' onclick='btn_areventype".$data_venid."' class='btn btn-danger' data-toggle='modal'><i class='fa fa-times'></i></a>
			                                            </td>
                                    				  </tr>


	                                  					<div class='modal fade' id='modal-edit".$data_venid."'>
															<div class='modal-dialog'>
																<div class='modal-content'>
																	<div class='modal-header'>
																		<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
																		<h4 class='modal-title'>Update Venue</h4>
																	</div>
																	<div class='modal-body'>
																		<div class='panel-body'>
												                            <form class='form-horizontal'>
												                                <div class='form-group'>
												                                    <label class='col-md-3 control-label'>Name</label>
												                                    <div class='col-md-9'>
												                                        <input type='text' value='".$data_ven."' id='txt_ven_name_up".$data_venid."' class='form-control' placeholder='Name'/>
												                                    </div>
												                                </div>
												                                <div class='form-group'>
												                                    <label class='col-md-3 control-label'>Capacity</label>
												                                    <div class='col-md-9'>
												                                        <input type='text' value='".$data_vencap."' id='txt_ven_cap_up".$data_venid."' class='form-control' placeholder='Name'/>
												                                    </div>
												                                </div>
												                                <div class='form-group'>
												                                    <label class='col-md-3 control-label'>Contact Person</label>
												                                    <div class='col-md-9'>
												                                        <input type='text' value='".$data_venconper."' id='txt_ven_conper_up".$data_venid."' class='form-control' placeholder='Name'/>
												                                    </div>
												                                </div>
												                                <div class='form-group'>
												                                    <label class='col-md-3 control-label'>Contact No.</label>
												                                    <div class='col-md-9'>
												                                        <input type='text' value='".$data_venconno."' id='txt_ven_conno_up".$data_venid."' class='form-control' placeholder='Name'/>
												                                    </div>
												                                </div>
												                                <div class='form-group'>
												                                    <label class='col-md-3 control-label'>Barangay</label>
												                                    <div class='col-md-9'>
												                                        <input type='text' value='".$data_brngy."' id='txt_brngy_up".$data_venid."' class='form-control' placeholder='Barangay'/>
												                                    </div>
												                                </div>
												                                <div class='form-group'>
												                                    <label class='col-md-3 control-label'>City</label>
												                                    <div class='col-md-9'>
												                                        <input type='text' value='".$data_city."' id='txt_ven_name_up".$data_venid."' class='form-control' placeholder='City'/>
												                                    </div>
												                                </div>
												                                <div class='form-group'>
												                                    <label class='col-md-3 control-label'>Province</label>
												                                    <div class='col-md-9'>
												                                        <input type='text' value='".$data_province."' id='txt_ven_name_up".$data_venid."' class='form-control' placeholder='Province'/>
												                                    </div>
												                                </div>
												                                <div class='form-group'>
								                                  				  <label class='col-md-3'>Region</label>
								                                  				 		<select required data-parsley-group='wizard-step-2' class='form-control' value='".$date_region."' id='dd_region".$data_venid."''>
									                                           				<option value='Ilocos Region'>Ilocos Region</option>
									                                          				<option value='Cagayan Valley'>Cagayan Valley</option>
									                                          				<option value='Central Luzon'>Central Luzon</option>
									                                          				<option value='CALABARZON'>CALABARZON</option>
									                                          				<option value='MIMAROPA'>MIMAROPA</option>
									                                          				<option value='Bicol Region'>Bicol Region</option>
									                                          				<option value='CAR'>CAR</option>
									                                          				<option value='NCR'>NCR</option>
									                                          				<option value='Western Visayas'>Western Visayas</option>
									                                          				<option value='Central Visayas'>Central Visayas</option>
									                                          				<option value='Eastern Visayas'>Eastern Visayas</option>
									                                          				<option value='Zamboanga Peninsula'>Zamboanga Peninsula</option>
									                                          				<option value='Northern Mindanao'>Northern Mindanao</option>
									                                          				<option value='Davao Region'>Davao Region</option>
									                                          				<option value='SOCCSKSARGEN'>SOCCSKSARGEN</option>
									                                          				<option value='Caraga Region'>Caraga Region</option>
									                                          				<option value='SOCCSKSARGEN'>SOCCSKSARGEN</option>
									                                          				<option value='ARMM'>ARMM</option>
								                                     				   </select>
								                                  				</div>
												                            </form>
												                        </div>
																	</div>
																	<div class='modal-footer'>
																		<a href='javascript:;' class='btn btn-sm btn-white' data-dismiss='modal'>Close</a>
																		<a href='javascript:;' onclick='btn_upven(".$data_venid.")' class='btn btn-sm btn-success'>Submit</a>
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
    	$('#btn_addven').click(function(){
    		// alert();

    		let ven_name = $('#txt_ven_name').val();
    		let ven_cap = $('#txt_ven_cap').val();
    		let ven_conper = $('#txt_ven_conper').val();
    		let ven_conno = $('#txt_ven_conno').val();
    		let ven_brngy = $('#txt_brngy').val();
    		let ven_city = $('#txt_city').val();
    		let ven_province =  $('#txt_province').val();
    		let ven_region =  $('#dd_region').val();

    		// alert(ven_name+" | "+ven_add)

    		$.ajax({
    			type: 'POST',
    			data:{
    					_ven_name:ven_name,
    					_ven_cap:ven_cap,
    					_ven_conper:ven_conper,
    					_ven_conno:ven_conno,
    					_ven_brngy:ven_brngy,
    					_ven_city:ven_city,
    					_ven_province:ven_province,
    					_ven_region:ven_region
    				},
    			url: '../functionalities/add_venue.php',
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


    	function btn_upven(myId){
    		// alert(myId)

    		let new_ven_name = $('#txt_ven_name_up' +myId).val();
    		let new_ven_add = $('#txt_ven_add_up' +myId).val();
    		let new_ven_cap = $('#txt_ven_cap_up' +myId).val();
    		let new_ven_conper = $('#txt_ven_conper_up' +myId).val();
    		let new_ven_conno = $('#txt_ven_conno_up' +myId).val();

    		// alert(new_ven_name+" | "+new_ven_add)

    		$.ajax({
    			type: 'POST',
    			data:{
    					_new_ven_name:new_ven_name,
			    		_new_ven_add:new_ven_add,
			    		_new_ven_cap:new_ven_cap,
			    		_new_ven_conper:new_ven_conper,
			    		_new_ven_conno:new_ven_conno,
    					_myId:myId
    			},
    			url:'../functionalities/update_venue.php',
    			async: false,
    			success: function(data){
    				// alert(data)
    				setTimeout(location.reload.bind(location), 1000)
    			},
    			error: function(response){
    				alert('something went wrong')
    			}
    		})
    	}

    </script>
</body>
</html>
