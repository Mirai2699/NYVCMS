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
				<li><a href="javascript:;">Finance</a></li>
				<li><a href="javascript:;">Collection</a></li>
				<li class="active">Payment</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Membership</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-6 -->
			    <div class="col-md-12">
					<ul class="nav nav-tabs">
						<li class="active"><a href="ui_tabs_accordions.html#default-tab-1" data-toggle="tab">Individual</a></li>
						<li class=""><a href="ui_tabs_accordions.html#default-tab-2" data-toggle="tab">Organization</a></li>
					</ul>
					<div class="tab-content">

						<!-- Membership Indiv -->
						<div class="tab-pane fade active in" id="default-tab-1">
							<!-- <h3 class="m-t-10"><i class="fa fa-cog"></i> Lorem ipsum dolor sit amet</h3> -->
						<ul class="nav nav-pills">
							<li class="active"><a href="ui_tabs_accordions.html#nav-pills-tab-1" data-toggle="tab">Bank</a></li>
							<li><a href="ui_tabs_accordions.html#nav-pills-tab-2" data-toggle="tab">Paid</a></li>
						</ul>
							<div class="tab-content">
								<div class="tab-pane fade active in" id="nav-pills-tab-1">
								    <h3 class="m-t-10">Bank</h3>
									<!-- begin panel -->
				                    <div class="panel panel-inverse">
				                        <div class="panel-body">
				                            <div class="table-responsive">
				                                <table id="data-table" class="table table-striped table-bordered">
				                                    <thead>
				                                        <tr>
				                                            <th>Name</th>
				                                            <th>Transaction Code</th>
				                                            <th>Amount</th>
				                                            <th>Date</th>
				                                            <th>Action</th>
				                                        </tr>
				                                    </thead>
				                                    <tbody>

				                                    	<?php

				                                    		$query = "SELECT * FROM ems_t_individual_membership AS M  INNER JOIN ems_r_individual_info AS I ON M.tim_individ = I.rii_individ WHERE M.tim_status = 'Pending'";

				                                    		$runquery = mysqli_query($connection, $query);

				                                    		while ($row = mysqli_fetch_assoc($runquery)){

				                                    			$name = $row['rii_name'];
				                                    			$transno = $row['tim_transcode'];
				                                    			$amount = $row['tim_amount'];
				                                    			$date = $row['tim_date'];
				                                    			$id = $row['tim_indivmemid'];	

				                                    			echo "<tr>
				                                    					<td>".$name."</td>
				                                    					<td>".$transno."</td>
				                                    					<td>".$amount."</td>
				                                    					<td>".$date."</td>
				                                    					<td>
							                                            	<a href='ui_modal_notification.html#modal-edit".$id."' class='btn  btn-success' data-toggle='modal'><i class='fa fa-check'></i></a>
							                                            	<a href='javascript:;' onclick='btn_areventype".$id."' class='btn btn-danger' data-toggle='modal'><i class='fa fa-times'></i></a>
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
																                                        <input type='text' value='".$name."' id='txt_name_up".$id."' class='form-control' placeholder='Name' disabled='disabled'/>
																                                    </div>
																                                </div>
																                                <div class='form-group'>
																                                    <label class='col-md-3 control-label'>Transaction No.</label>
																                                    <div class='col-md-9'>
																                                        <input type='text' value='".$transno."' id='txt_trans_up".$id."' class='form-control' placeholder='Name' disabled='disabled'/>
																                                    </div>
																                                </div>
																                                <div class='form-group'>
																                                    <label class='col-md-3 control-label'>Amount</label>
																                                    <div class='col-md-9'>
																                                        <input type='text' value='".$amount."' id='txt_amount_up".$id."' class='form-control' placeholder='Name' disabled='disabled'/>
																                                    </div>
																                                </div>
																                                <div class='form-group'>
																                                    <label class='col-md-3 control-label'>Bank</label>
																                                    <div class='col-md-9'>
																                                        <input type='text' value='' id='txt_indivbank' class='form-control' placeholder='Bank Name'/>
																                                    </div>
																                                </div>
																                                <div class='form-group'>
																                                    <label class='col-md-3 control-label'>Branch</label>
																                                    <div class='col-md-9'>
																                                        <input type='text' value='' id='txt_indivbranch' class='form-control' placeholder='Branch Name'/>
																                                    </div>
																                                </div>
																                                <div class='form-group'>
																                                    <label class='col-md-3 control-label'>Control No.</label>
																                                    <div class='col-md-9'>
																                                        <input type='text' value='' id='txt_indivcontrolno' class='form-control' placeholder='Control No.'/>
																                                    </div>
																                                </div>
																                                <div class='form-group'>
																                                    <label class='col-md-3 control-label'>Date</label>
																                                    <div class='col-md-9'>
																                                    	<div class='input-group'>
																                                            <input type='date' id='indivdate' class='form-control' placeholder='Date of Payment' />
																                                        </div>
																                                    </div>
																                                </div>
																                            </form>
																                        </div>
																					</div>
																					<div class='modal-footer'>
																						<a href='javascript:;' class='btn btn-sm btn-white' data-dismiss='modal'>Close</a>
																						<a href='javascript:;' onclick='btn_upindivpayment(".$id.")' class='btn btn-sm btn-success'>Submit</a>
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
				                        </div>
				                    </div>
				                    <!-- end panel -->
								</div> 

								<div class="tab-pane fade" id="nav-pills-tab-2">
								    <h3 class="m-t-10">Paid</h3>
									<!-- begin panel -->
				                    <div class="panel panel-inverse">
				                        <div class="panel-body">
				                            <div class="table-responsive">
				                                <table id="data-table" class="table table-striped table-bordered">
				                                    <thead>
				                                        <tr>
				                                            <th>Name</th>
				                                            <th>Transaction Code</th>
				                                            <th>Amount</th>
				                                            <th>Control No.</th>
				                                            <th>Bank</th>
				                                            <th>Branch</th>
				                                            <th>Date of Payment</th>
				                                        </tr>
				                                    </thead>
				                                    <tbody>

				                                    	<?php

				                                    		$query = "SELECT * FROM ems_t_individual_membership AS M  INNER JOIN ems_r_individual_info AS I ON M.tim_individ = I.rii_individ INNER JOIN ems_t_payment_indivmem AS P ON M.tim_indivmemid = P.tpi_indivmemid WHERE M.tim_status = 'Paid' OR M.tim_status = 'Renewal'";

				                                    		$runquery = mysqli_query($connection, $query);

				                                    		while ($row = mysqli_fetch_assoc($runquery)){

				                                    			$name = $row['rii_name'];
				                                    			$transno = $row['tim_transcode'];
				                                    			$amount = $row['tim_amount'];
				                                    			$controlno = $row['tpb_controlno'];
				                                    			$bank = $row['tpb_bank'];
				                                    			$branch = $row['tpb_branch'];
				                                    			$date = $row['tpb_date'];
				                                    			$id = $row['tim_indivmemid'];	

				                                    			echo "<tr>
				                                    					<td>".$name."</td>
				                                    					<td>".$transno."</td>
				                                    					<td>".$amount."</td>
				                                    					<td>".$controlno."</td>
				                                    					<td>".$bank."</td>
				                                    					<td>".$branch."</td>
				                                    					<td>".$date."</td>
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
							</div>
						</div>
						<!-- Membership Indiv -->

						<!-- Membership Org -->
						<div class="tab-pane fade" id="default-tab-2">
							<ul class="nav nav-pills">
							<li class="active"><a href="ui_tabs_accordions.html#nav-pills-tab-11" data-toggle="tab">Bank</a></li>
							<li><a href="ui_tabs_accordions.html#nav-pills-tab-22" data-toggle="tab">Paid</a></li>
						</ul>
							<div class="tab-content">
								<div class="tab-pane fade active in" id="nav-pills-tab-11">
								    <h3 class="m-t-10">Bank</h3>
									<!-- begin panel -->
				                    <div class="panel panel-inverse">
				                        <div class="panel-body">
				                            <div class="table-responsive">
				                                <table id="data-table" class="table table-striped table-bordered">
				                                    <thead>
				                                        <tr>
				                                            <th>Name</th>
				                                            <th>Transaction Code</th>
				                                            <th>Amount</th>
				                                            <th>Date</th>
				                                            <th>Action</th>
				                                        </tr>
				                                    </thead>
				                                    <tbody>

				                                    	<?php

				                                    		$query = "SELECT * FROM ems_t_org_membership AS M  INNER JOIN ems_r_org_info AS I ON M.tom_orgid = I.roi_orgid WHERE M.tom_status = 'Pending'";

				                                    		$runquery = mysqli_query($connection, $query);

				                                    		while ($row = mysqli_fetch_assoc($runquery)){

				                                    			$name = $row['roi_orgname'];
				                                    			$transno = $row['tom_transcode'];
				                                    			$amount = $row['tom_amount'];
				                                    			$date = $row['tom_date'];
				                                    			$id = $row['tom_orgid'];	

				                                    			echo "<tr>
				                                    					<td>".$name."</td>
				                                    					<td>".$transno."</td>
				                                    					<td>".$amount."</td>
				                                    					<td>".$date."</td>
				                                    					<td>
							                                            	<a href='ui_modal_notification.html#modal-edit1".$id."' class='btn  btn-success' data-toggle='modal'><i class='fa fa-check'></i></a>
							                                            	<a href='javascript:;' onclick='btn_areventype".$id."' class='btn btn-danger' data-toggle='modal'><i class='fa fa-times'></i></a>
							                                            </td>
				                                    				  </tr>

				                                    				  	<div class='col-md-12'>
					                                  					<div class='modal fade' id='modal-edit1".$id."'>
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
																                                        <input type='text' value='".$name."' id='txt_name_up".$id."' class='form-control' placeholder='Name' disabled='disabled'/>
																                                    </div>
																                                </div>
																                                <div class='form-group'>
																                                    <label class='col-md-3 control-label'>Transaction No.</label>
																                                    <div class='col-md-9'>
																                                        <input type='text' value='".$transno."' id='txt_trans_up".$id."' class='form-control' placeholder='Name' disabled='disabled'/>
																                                    </div>
																                                </div>
																                                <div class='form-group'>
																                                    <label class='col-md-3 control-label'>Amount</label>
																                                    <div class='col-md-9'>
																                                        <input type='text' value='".$amount."' id='txt_amount_up".$id."' class='form-control' placeholder='Name' disabled='disabled'/>
																                                    </div>
																                                </div>
																                                <div class='form-group'>
																                                    <label class='col-md-3 control-label'>Bank</label>
																                                    <div class='col-md-9'>
																                                        <input type='text' value='' id='txt_orgbank' class='form-control' placeholder='Bank Name'/>
																                                    </div>
																                                </div>
																                                <div class='form-group'>
																                                    <label class='col-md-3 control-label'>Branch</label>
																                                    <div class='col-md-9'>
																                                        <input type='text' value='' id='txt_orgbranch' class='form-control' placeholder='Branch Name'/>
																                                    </div>
																                                </div>
																                                <div class='form-group'>
																                                    <label class='col-md-3 control-label'>Control No.</label>
																                                    <div class='col-md-9'>
																                                        <input type='text' value='' id='txt_orgcontrolno' class='form-control' placeholder='Control No.'/>
																                                    </div>
																                                </div>
																                                <div class='form-group'>
																                                    <label class='col-md-3 control-label'>Date</label>
																                                    <div class='col-md-9'>
																                                    	<div class='input-group'>
																                                            <input type='date' id='orgdate' class='form-control' placeholder='Date of Payment' />
																                                        </div>
																                                    </div>
																                                </div>
																                            </form>
																                        </div>
																					</div>
																					<div class='modal-footer'>
																						<a href='javascript:;' class='btn btn-sm btn-white' data-dismiss='modal'>Close</a>
																						<a href='javascript:;' onclick='btn_uporgpayment(".$id.")' class='btn btn-sm btn-success'>Submit</a>
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
				                        </div>
				                    </div>
				                    <!-- end panel -->
								</div>
								<div class="tab-pane fade" id="nav-pills-tab-22">
								    <h3 class="m-t-10">Paid</h3>
									<!-- begin panel -->
				                    <div class="panel panel-inverse">
				                        <div class="panel-body">
				                            <div class="table-responsive">
				                                <table id="data-table" class="table table-striped table-bordered">
				                                    <thead>
				                                        <tr>
				                                            <th>Name</th>
				                                            <th>Transaction Code</th>
				                                            <th>Amount</th>
				                                            <th>Control No.</th>
				                                            <th>Bank</th>
				                                            <th>Branch</th>
				                                            <th>Date of Payment</th>
				                                        </tr>
				                                    </thead>
				                                    <tbody>

				                                    	<?php

				                                    		$query = "SELECT * FROM ems_t_org_membership AS M  INNER JOIN ems_r_org_info AS I ON M.tom_orgid = I.roi_orgid INNER JOIN ems_t_payment_orgmem AS P ON M.tom_orgmemid = P.tpo_orgmemid WHERE M.tom_status = 'Paid' OR M.tom_status = 'Renewal'";

				                                    		$runquery = mysqli_query($connection, $query);

				                                    		while ($row = mysqli_fetch_assoc($runquery)){

				                                    			$name = $row['roi_orgname'];
				                                    			$transno = $row['tom_transcode'];
				                                    			$amount = $row['tom_amount'];
				                                    			$controlno = $row['tpo_controlno'];
				                                    			$bank = $row['tpo_bank'];
				                                    			$branch = $row['tpo_branch'];
				                                    			$date = $row['tpo_datereceived'];
				                                    			$id = $row['tom_orgid'];	

				                                    			echo "<tr>
				                                    					<td>".$name."</td>
				                                    					<td>".$transno."</td>
				                                    					<td>".$amount."</td>
				                                    					<td>".$controlno."</td>
				                                    					<td>".$bank."</td>
				                                    					<td>".$branch."</td>
				                                    					<td>".$date."</td>
				                                    				<tr>";
				                                    		}

				                                    	?>
				                                    </tbody>
				                                </table>
											</div>
				                        </div>
				                    </div>
				                    <!-- end panel -->
								</div>
							</div>
						</div>
						<!-- Membership Org -->

					</div>
				</div>
			    <!-- end col-6 -->
			</div>
			<!-- end row -->
		</div>
		<!-- end #content -->
		
        
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->

	
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

    	function btn_upindivpayment(myId){
    		// alert(myId)

    		let bank = $('#txt_indivbank').val()
    		let branch = $('#txt_indivbranch').val()
    		let controlno = $('#txt_indivcontrolno').val()
    		let date = $('#indivdate').val()

    		// alert(bank+" | "+branch)
 
    		$.ajax({
    			type: 'POST',
    			url:'../functionalities/update_indivpaymentbank.php',
    			async: false,
    			data:{
    					_bank:bank,
    					_branch:branch,
    					_controlno:controlno,
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

    	function btn_uporgpayment(myId){
    		// alert(myId)

    		let bank = $('#txt_orgbank').val()
    		let branch = $('#txt_orgbranch').val()
    		let controlno = $('#txt_orgcontrolno').val()
    		let date = $('#orgdate').val()

    		// alert(bank+" | "+branch+" | "+controlno+" | "+date)
 
    		$.ajax({
    			type:'POST',
    			url:'../functionalities/update_orgpaymentbank.php',
    			data:{
    					_bank:bank,
    					_branch:branch,
    					_controlno:controlno,
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
