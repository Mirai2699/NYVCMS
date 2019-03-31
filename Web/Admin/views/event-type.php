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
				<li><a href="javascript:;">System Configuration</a></li>
				<li class="active">Event Type</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Event Type</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
				<!-- begin col-12 -->
			    <div class="col-md-12">
			    	<p>
						<td><a href="ui_modal_notification.html#modal-dialog" class="btn btn-sm btn-success" data-toggle="modal">Add Event Type</a></td>
			    	</p>
			    	<!-- #modal-dialog -->
							<div class="modal fade" id="modal-dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											<h4 class="modal-title">Add Event Type</h4>
										</div>
										<div class="modal-body">
											<div class="panel-body">
					                            <form class="form-horizontal">
					                                <div class="form-group">
					                                    <label class="col-md-3 control-label">Event Type</label>
					                                    <div class="col-md-9">
					                                        <input type="text" id="txt_stype" class="form-control" placeholder="Event Type"/>
					                                    </div>
					                                </div>
					                            </form>
					                        </div>
										</div>
										<div class="modal-footer">
											<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
											<a href="javascript:;" id="btn_addstype" class="btn btn-sm btn-success">Submit</a>
										</div>
									</div>
								</div>
							</div>
							<!-- #modal-without-animation -->
			        <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a> -->
                            </div>
                            <h4 class="panel-title">Event Type</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sponsor Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    	<?php

                                    		$query = "SELECT DISTINCT * FROM ems_r_event_type WHERE ret_status = 1";

                                    		$runquery = mysqli_query($connection, $query);

                                    		while ($row = mysqli_fetch_assoc($runquery)){

                                    			$data_stype = $row['ret_etype_name'];
                                    			$datastypeid = $row['ret_etype_id'];

                                    			echo "<tr>
                                    					<td>".$data_stype."</td>
                                    					<td style='width:135px'>
			                                            	<a href='ui_modal_notification.html#modal-edit".$datastypeid."' class='btn  btn-success' data-toggle='modal'><i class='fa fa-edit'></i></a>
			                                            	<a href='javascript:;' onclick='btn_areventype(".$datastypeid.")' class='btn btn-danger' data-toggle='modal'><i class='fa fa-times'></i></a>
			                                            </td>
                                    				  </tr>


	                                  					<div class='modal fade' id='modal-edit".$datastypeid."'>
															<div class='modal-dialog'>
																<div class='modal-content'>
																	<div class='modal-header'>
																		<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
																		<h4 class='modal-title'>Update Sponsor Type</h4>
																	</div>
																	<div class='modal-body'>
																		<div class='panel-body'>
												                            <form class='form-horizontal'>
												                                <div class='form-group'>
												                                    <label class='col-md-3 control-label'>Sponsor Type</label>
												                                    <div class='col-md-9'>
												                                        <input type='text' value='".$data_stype."' id='txt_stype_up".$datastypeid."' class='form-control' placeholder='Sponsor Type'/>
												                                    </div>
												                                </div>
												                            </form>
												                        </div>
																	</div>
																	<div class='modal-footer'>
																		<a href='javascript:;' class='btn btn-sm btn-white' data-dismiss='modal'>Close</a>
																		<a href='javascript:;' onclick='btn_upeventype(".$datastypeid.")' class='btn btn-sm btn-success'>Submit</a>
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
    	$('#btn_addstype').click(function(){
    		// alert();

    		let stype = $('#txt_stype').val();

    		// alert(stype)

    		$.ajax({
    			type: 'POST',
    			data:{
    					_stype:stype
    				},
    			url: '../functionalities/add_event_type.php',
    			async: false,
    			success: function(data){
    				alert('Successfully Added!');
    				setTimeout(location.reload.bind(location), 1000);
    			},
    			error: function(reponse){
    				alert('something went wrong')
    			}

    		})

    	})


    	function btn_upeventype(myId){
    		// alert(myId)

    		let new_stype = $('#txt_stype_up'+myId).val()

    		// alert(new_eventtype+" | "+new_evendescription)

    		$.ajax({
    			type: 'POST',
    			url:'../functionalities/update_event_type.php',
    			async: false,
    			data:{
    					_new_stype: new_stype,
    					_myId:myId
    			},
    			success: function(data){
    				alert('Updated Successfully!')
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
