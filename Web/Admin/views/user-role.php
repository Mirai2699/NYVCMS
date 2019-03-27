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
				<li><a href="javascript:;">System Configuration</a></li>
				<li class="active">User Role</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">User Role</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
				<!-- begin col-12 -->
			    <div class="col-md-12">
			    	<p>
						<td><a href="ui_modal_notification.html#modal-dialog" class="btn btn-sm btn-success" data-toggle="modal">Add User Role</a></td>
			    	</p>
			    	<!-- #modal-dialog -->
							<div class="modal fade" id="modal-dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											<h4 class="modal-title">Add User Role</h4>
										</div>
										<div class="modal-body">
											<div class="panel-body">
					                            <form class="form-horizontal">
					                                <div class="form-group">
					                                    <label class="col-md-3 control-label">User Role</label>
					                                    <div class="col-md-9">
					                                        <input type="text" id="txt_user_role" class="form-control" placeholder="User Role"/>
					                                    </div>
					                                </div>
					                            </form>
					                        </div>
										</div>
										<div class="modal-footer">
											<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
											<a href="javascript:;" id="btn_adduserrole" class="btn btn-sm btn-success">Submit</a>
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
                                            <th>User Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    	<?php

                                    		$query = "SELECT * FROM ems_r_user_role WHERE rur_activeflag = 1";

                                    		$runquery = mysqli_query($connection, $query);

                                    		while ($row = mysqli_fetch_assoc($runquery)){

                                    			$data_userrole = $row['rur_rolename'];
                                    			$dataroleid = $row['rur_roleid'];

                                    			echo "<tr>
                                    					<td>".$data_userrole."</td>
                                    					<td>
			                                            	<a href='ui_modal_notification.html#modal-edit".$dataroleid."' class='btn  btn-success' data-toggle='modal'><i class='fa fa-edit'></i></a>
			                                            	<a href='javascript:;' onclick='btn_userrole(".$dataroleid.")' class='btn btn-danger' data-toggle='modal'><i class='fa fa-times'></i></a>
			                                            </td>
                                    				  </tr>


	                                  					<div class='modal fade' id='modal-edit".$dataroleid."'>
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
												                                    <label class='col-md-3 control-label'>User Role</label>
												                                    <div class='col-md-9'>
												                                        <input type='text' value='".$data_userrole."' id='txt_user_role_up".$dataroleid."' class='form-control' placeholder='User Role'/>
												                                    </div>
												                                </div>
												                            </form>
												                        </div>
																	</div>
																	<div class='modal-footer'>
																		<a href='javascript:;' class='btn btn-sm btn-white' data-dismiss='modal'>Close</a>
																		<a href='javascript:;' onclick='btn_upuserrole(".$dataroleid.")' class='btn btn-sm btn-success'>Submit</a>
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
    	$('#btn_adduserrole').click(function(){
    		// alert();

    		let role = $('#txt_user_role').val();

    		// alert(etype_name+" | "+etype_description)

    		$.ajax({
    			type: 'POST',
    			data:{
    					_role:role,
    				},
    			url: 'functionalities/add_user_role.php',
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


    	function btn_upuserrole(myId){
    		// alert(myId)

    		let new_role = $('#txt_user_role_up'+myId).val()
    		// alert(new_eventtype+" | "+new_evendescription)

    		$.ajax({
    			type: 'POST',
    			url:'../functionalities/update_user_role.php',
    			async: false,
    			data:{
    					_new_role: new_role,
    					_myId:myId
    			},
    			success: function(data){
    				alert(data)
    				setTimeout(location.reload.bind(location), 1000)
    			},
    			error: function(response){
    				alert('something went wrong')
    			}
    		})
    	}

    	function btn_areventype(myId){
    		// alert(myId)

    		// let new_eventtype = $('#txt_event_type_name_up'+myId).val()
    		// let new_eventdescription = $('#txt_event_type_description_up'+myId).val();

    		// // alert(new_eventtype+" | "+new_evendescription)

    		// $.ajax({
    		// 	type: 'POST',
    		// 	url:'crud/update_event_type.php',
    		// 	async: false,
    		// 	data:{
    		// 			_new_eventtype: new_eventtype,
    		// 			_new_eventdescription: new_eventdescription,
    		// 			_myId:myId
    		// 	},
    		// 	success: function(data){
    		// 		alert(data)
    		// 		setTimeout(location.reload.bind(location), 1000)
    		// 	},
    		// 	error: function(response){
    		// 		alert('something went wrong')
    		// 	}
    		// })
    	}

    </script>
</body>
</html>
