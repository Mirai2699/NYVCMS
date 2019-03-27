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
				<li class="active">Sponsor</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Sponsor</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
				<!-- begin col-12 -->
			    <div class="col-md-12">
			    	<p>
						<td><a href="ui_modal_notification.html#modal-dialog" class="btn btn-sm btn-success" data-toggle="modal">Add Sponsor</a></td>
			    	</p>
			    	<!-- #modal-dialog -->
							<div class="modal fade" id="modal-dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											<h4 class="modal-title">Add Sponsor</h4>
										</div>
										<div class="modal-body">
											<div class="panel-body">
					                            <form class="form-horizontal">
					                                <div class="form-group">
					                                    <label class="col-md-3 control-label">Type</label>
					                                    <div class="col-md-9">
					                                        <select name="dd_type" id="dd_type"  class="form-control" style="color: black;" required="">
                                                                <option selected disabled value=""></option>
                                                                    <?php  
                                                                        $sql= "SELECT DISTINCT * FROM `ems_r_sponsor_type`";
                                                                         $results = mysqli_query($connection, $sql) or die("Bad Query: $sql");
                                                                             while($row = mysqli_fetch_assoc($results))
                                                                                {  
                                                                                    $stype = $row['rst_stype_name'];
                                                                                    $id = $row['rst_stype_id'];
                                                                                ?>
                                                               <option id="<?php echo $id ?>" value="<?php echo $id ?>"><?php echo "$stype"; ?></option>
                                                                    <?php
                                                                                }
                                                                    ?>
                                                        </select>
					                                    </div>
					                                </div>
					                            	<div class="form-group">
					                                    <label class="col-md-3 control-label">Sponsor Name</label>
					                                    <div class="col-md-9">
					                                        <input type="text" id="txt_sponsor" class="form-control" placeholder="Sponsor Name"/>
					                                    </div>
					                                </div>
					                                <div class="form-group">
					                                    <label class="col-md-3 control-label">Contact No.</label>
					                                    <div class="col-md-9">
					                                        <input type="numeric" id="txt_conno" class="form-control" placeholder="09xxxxxxxxx"/>
					                                    </div>
					                                </div>
					                                <div class="form-group">
					                                    <label class="col-md-3 control-label">Address</label>
					                                    <div class="col-md-9">
					                                        <textarea class="form-control" id="txt_address" placeholder="Address" rows="2"></textarea>
					                                    </div>
					                                </div>
					                            </form>
					                        </div>
										</div>
										<div class="modal-footer">
											<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
											<a href="javascript:;" id="btn_addsponsor" class="btn btn-sm btn-success">Submit</a>
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
                            <h4 class="panel-title">Sponsors</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                        	<th>Sponsor Name</th>
                                        	<th>Type</th>
                                            <th>Contact No.</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    	<?php
                                    	

                                    		$query = "SELECT * FROM ems_r_sponsor AS S INNER JOIN ems_r_sponsor_type AS ST ON S.rs_stype_id = ST.rst_stype_id WHERE rs_status = 1";

                                    		$runquery = mysqli_query($connection, $query);

                                    		while ($row = mysqli_fetch_assoc($runquery)){

                                    			$data_sponsor = $row['rs_sponsor_name'];
                                    			$data_type = $row['rst_stype_name'];
                                    			$data_conno = $row['rs_sponsor_contact_no'];
                                    			$data_address = $row['rs_sponsor_address'];
                                    			$datasponsorid = $row['rs_sponsor_id'];

                                    			echo "<tr>
                                    					<td>".$data_sponsor."</td>
                                    					<td>".$data_type."</td>
                                    					<td>".$data_conno."</td>
                                    					<td>".$data_address."</td>
                                    					<td style='width:135px'>
			                                            	<a href='ui_modal_notification.html#modal-edit".$datasponsorid."' class='btn  btn-success' data-toggle='modal'><i class='fa fa-edit'></i></a>
			                                            	<a href='javascript:;' onclick='btn_areventype(".$datasponsorid.")' class='btn btn-danger' data-toggle='modal'><i class='fa fa-times'></i></a>
			                                            </td>
                                    				  </tr>


	                                  					<div class='modal fade' id='modal-edit".$datasponsorid."'>
															<div class='modal-dialog'>
																<div class='modal-content'>
																	<div class='modal-header'>
																		<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
																		<h4 class='modal-title'>Update Sponsor</h4>
																	</div>
																	<div class='modal-body'>
																		<div class='panel-body'>
												                            <form class='form-horizontal'>
												                                <div class='form-group'>
												                                    <label class='col-md-3 control-label'>Sponsor</label>
												                                    <div class='col-md-9'>
												                                        <input type='text' value='".$data_sponsor."' id='txt_event_type_name_up".$datasponsorid."' class='form-control' placeholder='Activity Name'/>
												                                    </div>
												                                </div>
												                            </form>
												                        </div>
																	</div>
																	<div class='modal-footer'>
																		<a href='javascript:;' class='btn btn-sm btn-white' data-dismiss='modal'>Close</a>
																		<a href='javascript:;' onclick='btn_upeventype(".$datasponsorid.")' class='btn btn-sm btn-success'>Submit</a>
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
    	$('#btn_addsponsor').click(function(){
    		// alert();

    		let sponsor = $('#txt_sponsor').val();
    		let type = $('#dd_type').val();
    		let conno = $('#txt_conno').val();
    		let address = $('#txt_address').val();

    		// alert(event+" | "+activity_desc)

    		$.ajax({
    			type: 'POST',
    			data:{
    					_sponsor:sponsor,
    					_type:type,
    					_conno:conno,
    					_address:address
    				},
    			url: '../functionalities/add_sponsor.php',
    			async: false,
    			success: function(data){
    				// alert(data);
    				// setTimeout(location.reload.bind(location), 1000);
    			},
    			error: function(reponse){
    				alert('something went wrong')
    			}

    		})

    	})
    </script>

</body>
</html>
