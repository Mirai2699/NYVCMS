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
				<li><a href="javascript:;">Collection</a></li>
				<li><a href="javascript:;">Payment</a></li>
				<li class="active">Event Registration</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Event Registration</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-6 -->
			    <div class="col-md-12">
					<ul class="nav nav-tabs">
						<li class="active"><a href="ui_tabs_accordions.html#default-tab-1" data-toggle="tab">Member (Bank)</a></li>
						<li class=""><a href="ui_tabs_accordions.html#default-tab-2" data-toggle="tab">Member (On Site)</a></li>
						<li class=""><a href="ui_tabs_accordions.html#default-tab-3" data-toggle="tab">Non-Member (Bank)</a></li>
						<li class=""><a href="ui_tabs_accordions.html#default-tab-4" data-toggle="tab">Non-Member (On Site)</a></li>
					</ul>
					<div class="tab-content">

						<!-- Member (Bank) -->
						<div class="tab-pane fade active in" id="default-tab-1">
							<!-- <h3 class="m-t-10"><i class="fa fa-cog"></i> Lorem ipsum dolor sit amet</h3> -->
						<ul class="nav nav-pills">
							<li class="active"><a href="ui_tabs_accordions.html#nav-pills-tab-1" data-toggle="tab">Pending</a></li>
							<li><a href="ui_tabs_accordions.html#nav-pills-tab-2" data-toggle="tab">Paid</a></li>
						</ul>
							<div class="tab-content">
								<div class="tab-pane fade active in" id="nav-pills-tab-1">
								    <h3 class="m-t-10">Pending</h3>
									<!-- begin panel -->
				                    <div class="panel panel-inverse">
				                        <div class="panel-body">
				                            <div class="table-responsive">
				                                <table id="data-table" class="table table-striped table-bordered">
				                                    <thead>
				                                        <tr>
				                                            <th>Name</th>
				                                            <th>Event</th>
				                                            <th>Transaction Code</th>
				                                            <th>Amount</th>
				                                            <th>Date</th>
				                                            <th>Action</th>
				                                        </tr>
				                                    </thead>
				                                    <tbody>

				                                    	<?php

				                                    		$query = "SELECT * FROM ems_t_individual_membership AS M  
					                                    		INNER JOIN ems_r_individual_info AS I 
					                                    		ON M.tim_individ = I.rii_individ 
					                                    		INNER JOIN ems_t_eventreg_mem AS R
					                                    		ON R.term_indivmemid = M.tim_indivmemid
					                                    		INNER JOIN ems_r_event AS E
					                                    		ON E.re_event_id = R.term_eventid
					                                    			WHERE M.tim_status = 'Paid'
					                                    			AND R.term_status = 'Pending'
					                                    			AND R.term_paymenttype = 'Bank'
					                                    			AND M.tim_activeflag = 1";

				                                    		$runquery = mysqli_query($connection, $query);

				                                    		while ($row = mysqli_fetch_assoc($runquery)){

				                                    			$name = $row['rii_name'];
				                                    			$event = $row['re_event_name'];
				                                    			$transno = $row['term_transcode'];
				                                    			$amount = $row['re_regfee_mem'];
				                                    			$date = $row['term_date'];
				                                    			$id = $row['term_regid'];	

				                                    			echo "<tr>
				                                    					<td>".$name."</td>
				                                    					<td>".$event."</td>
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
																                                    <label class='col-md-3 control-label'>Name</label>
																                                    <div class='col-md-9'>
																                                        <input type='text' value='".$event."' id='txt_name_up".$id."' class='form-control' placeholder='Name' disabled='disabled'/>
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
																                                        <input type='text' value='' id='txt_membank' class='form-control' placeholder='Bank'/>
																                                    </div>
																                                </div>
																                                <div class='form-group'>
																                                    <label class='col-md-3 control-label'>Branch</label>
																                                    <div class='col-md-9'>
																                                        <input type='text' value='' id='txt_membranch' class='form-control' placeholder='Branch'/>
																                                    </div>
																                                </div>
																                                <div class='form-group'>
																                                    <label class='col-md-3 control-label'>Control No</label>
																                                    <div class='col-md-9'>
																                                        <input type='text' value='' id='txt_memcontrolno' class='form-control' placeholder='Control No'/>
																                                    </div>
																                                </div>
																                                <div class='form-group'>
																                                    <label class='col-md-3 control-label'>Date</label>
																                                    <div class='col-md-9'>
																                                    	<div class='input-group'>
																                                            <input type='date' id='date_membank' class='form-control' placeholder='Date of Payment' />
																                                        </div>
																                                    </div>
																                                </div>
																                            </form>
																                        </div>
																					</div>
																					<div class='modal-footer'>
																						<a href='javascript:;' class='btn btn-sm btn-white' data-dismiss='modal'>Close</a>
																						<a href='javascript:;' onclick='btn_eregmembank(".$id.")' class='btn btn-sm btn-success'>Submit</a>
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
				                                            <th>Event</th>
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

				                                    		$query = "SELECT * FROM ems_t_individual_membership AS M  
					                                    		INNER JOIN ems_r_individual_info AS I 
					                                    		ON M.tim_individ = I.rii_individ 
					                                    		INNER JOIN ems_t_eventreg_mem AS R
					                                    		ON R.term_indivmemid = M.tim_indivmemid
					                                    		INNER JOIN ems_r_event AS E
					                                    		ON E.re_event_id = R.term_eventid
					                                    		INNER JOIN ems_t_payment_eventregmem_bank AS P
					                                    		ON P.tpeb_regid = R.term_regid
					                                    			WHERE M.tim_status = 'Paid'
					                                    			AND R.term_status = 'Paid'
					                                    			AND R.term_paymenttype = 'Bank'
					                                    			AND M.tim_activeflag = 1";

				                                    		$runquery = mysqli_query($connection, $query);

				                                    		while ($row = mysqli_fetch_assoc($runquery)){

				                                    			$name = $row['rii_name'];
				                                    			$event = $row['re_event_name'];
				                                    			$transno = $row['term_transcode'];
				                                    			$amount = $row['re_regfee_mem'];
				                                    			$controlno = $row['tpeb_controlno'];
				                                    			$bank = $row['tpeb_bank'];
				                                    			$branch = $row['tpeb_branch'];
				                                    			$date = $row['tpeb_date'];
				                                    			$id = $row['term_regid'];

				                                    			echo "<tr>
				                                    					<td>".$name."</td>
				                                    					<td>".$event."</td>
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
						<!-- Member (Bank) -->



						<!-- Member (On Site) -->
						<div class="tab-pane fade" id="default-tab-2">
							<ul class="nav nav-pills">
							<li class="active"><a href="ui_tabs_accordions.html#nav-pills-tab-11" data-toggle="tab">Pending</a></li>
							<li><a href="ui_tabs_accordions.html#nav-pills-tab-22" data-toggle="tab">Paid</a></li>
						</ul>
							<div class="tab-content">
								<div class="tab-pane fade active in" id="nav-pills-tab-11">
								    <h3 class="m-t-10">Pending</h3>
									<!-- begin panel -->
				                    <div class="panel panel-inverse">
				                        <div class="panel-body">
				                            <div class="table-responsive">
				                                <table id="data-table" class="table table-striped table-bordered">
				                                    <thead>
				                                        <tr>
				                                            <th>Name</th>
				                                            <th>Event</th>
				                                            <th>Transaction Code</th>
				                                            <th>Amount</th>
				                                            <th>Date</th>
				                                            <th>Action</th>
				                                        </tr>
				                                    </thead>
				                                    <tbody>

				                                    	<?php

				                                    		$query = "SELECT * FROM ems_t_individual_membership AS M  
					                                    		INNER JOIN ems_r_individual_info AS I 
					                                    		ON M.tim_individ = I.rii_individ 
					                                    		INNER JOIN ems_t_eventreg_mem AS R
					                                    		ON R.term_indivmemid = M.tim_indivmemid
					                                    		INNER JOIN ems_r_event AS E
					                                    		ON E.re_event_id = R.term_eventid
					                                    			WHERE M.tim_status = 'Paid'
					                                    			AND R.term_status = 'Pending'
					                                    			AND R.term_paymenttype = 'Onsite'
					                                    			AND M.tim_activeflag = 1";

				                                    		$runquery = mysqli_query($connection, $query);

				                                    		while ($row = mysqli_fetch_assoc($runquery)){

				                                    			$name = $row['rii_name'];
				                                    			$event = $row['re_event_name'];
				                                    			$transno = $row['term_transcode'];
				                                    			$amount = $row['re_regfee_mem'];
				                                    			$date = $row['term_date'];
				                                    			$id = $row['term_regid'];	

				                                    			echo "<tr>
				                                    					<td>".$name."</td>
				                                    					<td>".$event."</td>
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
																                                    <label class='col-md-3 control-label'>Name</label>
																                                    <div class='col-md-9'>
																                                        <input type='text' value='".$event."' id='txt_name_up".$id."' class='form-control' placeholder='Name' disabled='disabled'/>
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
																                                    <label class='col-md-3 control-label'>Received By</label>
																                                    <div class='col-md-9'>
																                                        <input type='text' value='' id='txt_rbmemsite' class='form-control' placeholder='Name'/>
																                                    </div>
																                                </div>
																                                <div class='form-group'>
																                                    <label class='col-md-3 control-label'>Date</label>
																                                    <div class='col-md-9'>
																                                    	<div class='input-group'>
																                                            <input type='date' id='date_memsite' class='form-control' placeholder='Date of Payment' />
																                                        </div>
																                                    </div>
																                                </div>
																                            </form>
																                        </div>
																					</div>
																					<div class='modal-footer'>
																						<a href='javascript:;' class='btn btn-sm btn-white' data-dismiss='modal'>Close</a>
																						<a href='javascript:;' onclick='btn_eregmemsite(".$id.")' class='btn btn-sm btn-success'>Submit</a>
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
				                                            <th>Event</th>
				                                            <th>Transaction Code</th>
				                                            <th>Amount</th>
				                                            <th>Received By</th>
				                                            <th>Date of Payment</th>
				                                        </tr>
				                                    </thead>
				                                    <tbody>

				                                    	<?php

				                                    		$query = "SELECT * FROM ems_t_individual_membership AS M  
					                                    		INNER JOIN ems_r_individual_info AS I 
					                                    		ON M.tim_individ = I.rii_individ 
					                                    		INNER JOIN ems_t_eventreg_mem AS R
					                                    		ON R.term_indivmemid = M.tim_indivmemid
					                                    		INNER JOIN ems_r_event AS E
					                                    		ON E.re_event_id = R.term_eventid
					                                    		INNER JOIN ems_t_payment_eventregmem_onsite AS P
					                                    		ON P.tpeo_regid = R.term_regid
					                                    			WHERE M.tim_status = 'Paid'
					                                    			AND R.term_status = 'Paid'
					                                    			AND R.term_paymenttype = 'Onsite'
					                                    			AND M.tim_activeflag = 1";

				                                    		$runquery = mysqli_query($connection, $query);

				                                    		while ($row = mysqli_fetch_assoc($runquery)){

				                                    			$name = $row['rii_name'];
				                                    			$event = $row['re_event_name'];
				                                    			$transno = $row['term_transcode'];
				                                    			$amount = $row['re_regfee_mem'];
				                                    			$receivedby = $row['tpeo_receivedby'];
				                                    			$date = $row['tpeo_date'];

				                                    			echo "<tr>
				                                    					<td>".$name."</td>
				                                    					<td>".$event."</td>
				                                    					<td>".$transno."</td>
				                                    					<td>".$amount."</td>
				                                    					<td>".$receivedby."</td>
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
						<!-- Member (On Site) -->

						<!-- Non-member (Bank) -->
						<div class="tab-pane fade" id="default-tab-3">
							<ul class="nav nav-pills">
							<li class="active"><a href="ui_tabs_accordions.html#nav-pills-tab-111" data-toggle="tab">Pending</a></li>
							<li><a href="ui_tabs_accordions.html#nav-pills-tab-222" data-toggle="tab">Paid</a></li>
						</ul>
							<div class="tab-content">
								<div class="tab-pane fade active in" id="nav-pills-tab-111">
								    <h3 class="m-t-10">Pending</h3>
									<!-- begin panel -->
				                    <div class="panel panel-inverse">
				                        <div class="panel-body">
				                            <div class="table-responsive">
				                                <table id="data-table" class="table table-striped table-bordered">
				                                    <thead>
				                                        <tr>
				                                            <th>Name</th>
				                                            <th>Event</th>
				                                            <th>Transaction Code</th>
				                                            <th>Amount</th>
				                                            <th>Date</th>
				                                            <th>Action</th>
				                                        </tr>
				                                    </thead>
				                                    <tbody>

				                                    	<?php

				                                    		$query = "SELECT * FROM ems_t_eventreg_nonmem AS R
					                                    		INNER JOIN ems_r_event AS E
					                                    		ON E.re_event_id = R.nmr_event_id
					                                    			WHERE R.nmr_status = 'Pending'
					                                    			AND R.nmr_paymenttype = 'Bank'";

				                                    		$runquery = mysqli_query($connection, $query);

				                                    		while ($row = mysqli_fetch_assoc($runquery)){

				                                    			$name = $row['nmr_name'];
				                                    			$event = $row['re_event_name'];
				                                    			$transno = $row['nmr_transcode'];
				                                    			$amount = $row['re_regfee_nonmem'];
				                                    			$date = $row['nmr_datereg'];
				                                    			$id = $row['nmr_id'];	

				                                    			echo "<tr>
				                                    					<td>".$name."</td>
				                                    					<td>".$event."</td>
				                                    					<td>".$transno."</td>
				                                    					<td>".$amount."</td>
				                                    					<td>".$date."</td>
				                                    					<td>
							                                            	<a href='ui_modal_notification.html#modal-edit2".$id."' class='btn  btn-success' data-toggle='modal'><i class='fa fa-check'></i></a>
							                                            	<a href='javascript:;' onclick='btn_areventype".$id."' class='btn btn-danger' data-toggle='modal'><i class='fa fa-times'></i></a>
							                                            </td>
				                                    				  </tr>

				                                    				  	<div class='col-md-12'>
					                                  					<div class='modal fade' id='modal-edit2".$id."'>
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
																                                    <label class='col-md-3 control-label'>Name</label>
																                                    <div class='col-md-9'>
																                                        <input type='text' value='".$event."' id='txt_name_up".$id."' class='form-control' placeholder='Name' disabled='disabled'/>
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
																                                        <input type='text' value='' id='txt_nonmembank' class='form-control' placeholder='Bank'/>
																                                    </div>
																                                </div>
																                                <div class='form-group'>
																                                    <label class='col-md-3 control-label'>Branch</label>
																                                    <div class='col-md-9'>
																                                        <input type='text' value='' id='txt_nonmembranch' class='form-control' placeholder='Branch'/>
																                                    </div>
																                                </div>
																                                <div class='form-group'>
																                                    <label class='col-md-3 control-label'>Control No</label>
																                                    <div class='col-md-9'>
																                                        <input type='text' value='' id='txt_nonmemconno' class='form-control' placeholder='Control No'/>
																                                    </div>
																                                </div>
																                                <div class='form-group'>
																                                    <label class='col-md-3 control-label'>Date</label>
																                                    <div class='col-md-9'>
																                                    	<div class='input-group'>
																                                            <input type='date' id='date_nonmembank' class='form-control' placeholder='Date of Payment' />
																                                        </div>
																                                    </div>
																                                </div>
																                            </form>
																                        </div>
																					</div>
																					<div class='modal-footer'>
																						<a href='javascript:;' class='btn btn-sm btn-white' data-dismiss='modal'>Close</a>
																						<a href='javascript:;' onclick='btn_eregnonmembank(".$id.")' class='btn btn-sm btn-success'>Submit</a>
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
								<div class="tab-pane fade" id="nav-pills-tab-222">
								    <h3 class="m-t-10">Paid</h3>
									<!-- begin panel -->
				                    <div class="panel panel-inverse">
				                        <div class="panel-body">
				                            <div class="table-responsive">
				                                <table id="data-table" class="table table-striped table-bordered">
				                                    <thead>
				                                        <tr>
				                                            <th>Name</th>
				                                            <th>Event</th>
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

				                                    		$query = "SELECT * FROM ems_t_eventreg_nonmem AS R
					                                    		INNER JOIN ems_r_event AS E
					                                    		ON E.re_event_id = R.nmr_event_id
					                                    		INNER JOIN ems_t_payment_eventregnonmem_bank AS P
					                                    		ON P.tpnb_regid = R.nmr_id
					                                    			WHERE R.nmr_status = 'Paid'
					                                    			AND R.nmr_paymenttype = 'Bank'"	;

				                                    		$runquery = mysqli_query($connection, $query);

				                                    		while ($row = mysqli_fetch_assoc($runquery)){

				                                    			$name = $row['nmr_name'];
				                                    			$event = $row['re_event_name'];
				                                    			$transno = $row['nmr_transcode'];
				                                    			$amount = $row['re_regfee_nonmem'];
				                                    			$controlno = $row['tpnb_controlno'];
				                                    			$bank = $row['tpnb_bank'];
				                                    			$branch = $row['tpnb_branch'];
				                                    			$date = $row['tpnb_date'];
				                                    			$id = $row['nmr_id'];	

				                                    			echo "<tr>
				                                    					<td>".$name."</td>
				                                    					<td>".$event."</td>
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
						<!-- Non-member (Bank) -->

						<!-- Non-member (On SIte) -->
						<div class="tab-pane fade" id="default-tab-4">
							<ul class="nav nav-pills">
							<li class="active"><a href="ui_tabs_accordions.html#nav-pills-tab-1111" data-toggle="tab">Pending</a></li>
							<li><a href="ui_tabs_accordions.html#nav-pills-tab-2222" data-toggle="tab">Paid</a></li>
						</ul>
							<div class="tab-content">
								<div class="tab-pane fade active in" id="nav-pills-tab-1111">
								    <h3 class="m-t-10">Pending</h3>
									<!-- begin panel -->
				                    <div class="panel panel-inverse">
				                        <div class="panel-body">
				                            <div class="table-responsive">
				                                <table id="data-table" class="table table-striped table-bordered">
				                                    <thead>
				                                        <tr>
				                                            <th>Name</th>
				                                            <th>Event</th>
				                                            <th>Transaction Code</th>
				                                            <th>Amount</th>
				                                            <th>Date</th>
				                                            <th>Action</th>
				                                        </tr>
				                                    </thead>
				                                    <tbody>

				                                    	<?php

				                                    		$query = "SELECT * FROM ems_t_eventreg_nonmem AS R
					                                    		INNER JOIN ems_r_event AS E
					                                    		ON E.re_event_id = R.nmr_event_id
					                                    			WHERE R.nmr_status = 'Pending'
					                                    			AND R.nmr_paymenttype = 'Onsite'";

				                                    		$runquery = mysqli_query($connection, $query);

				                                    		while ($row = mysqli_fetch_assoc($runquery)){

				                                    			$name = $row['nmr_name'];
				                                    			$event = $row['re_event_name'];
				                                    			$transno = $row['nmr_transcode'];
				                                    			$amount = $row['re_regfee_nonmem'];
				                                    			$date = $row['nmr_datereg'];
				                                    			$id = $row['nmr_id'];	

				                                    			echo "<tr>
				                                    					<td>".$name."</td>
				                                    					<td>".$event."</td>
				                                    					<td>".$transno."</td>
				                                    					<td>".$amount."</td>
				                                    					<td>".$date."</td>
				                                    					<td>
							                                            	<a href='ui_modal_notification.html#modal-edit3".$id."' class='btn  btn-success' data-toggle='modal'><i class='fa fa-check'></i></a>
							                                            	<a href='javascript:;' onclick='btn_areventype".$id."' class='btn btn-danger' data-toggle='modal'><i class='fa fa-times'></i></a>
							                                            </td>
				                                    				  </tr>

				                                    				  	<div class='col-md-12'>
					                                  					<div class='modal fade' id='modal-edit3".$id."'>
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
																                                    <label class='col-md-3 control-label'>Name</label>
																                                    <div class='col-md-9'>
																                                        <input type='text' value='".$event."' id='txt_name_up".$id."' class='form-control' placeholder='Name' disabled='disabled'/>
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
																                                    <label class='col-md-3 control-label'>Received By</label>
																                                    <div class='col-md-9'>
																                                        <input type='text' value='' id='txt_rbnonmemsite' class='form-control' placeholder='Received By'/>
																                                    </div>
																                                </div>
																                                <div class='form-group'>
																                                    <label class='col-md-3 control-label'>Date</label>
																                                    <div class='col-md-9'>
																                                    	<div class='input-group'>
																                                            <input type='date' id='date_nonmemsite' class='form-control' placeholder='Date of Payment' />
																                                        </div>
																                                    </div>
																                                </div>
																                            </form>
																                        </div>
																					</div>
																					<div class='modal-footer'>
																						<a href='javascript:;' class='btn btn-sm btn-white' data-dismiss='modal'>Close</a>
																						<a href='javascript:;' onclick='btn_eregnonmemsite(".$id.")' class='btn btn-sm btn-success'>Submit</a>
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
								<div class="tab-pane fade" id="nav-pills-tab-2222">
								    <h3 class="m-t-10">Paid</h3>
									<!-- begin panel -->
				                    <div class="panel panel-inverse">
				                        <div class="panel-body">
				                            <div class="table-responsive">
				                                <table id="data-table" class="table table-striped table-bordered">
				                                    <thead>
				                                        <tr>
				                                            <th>Name</th>
				                                            <th>Event</th>
				                                            <th>Transaction Code</th>
				                                            <th>Amount</th>
				                                            <th>Received By</th>
				                                            <th>Date</th>
				                                        </tr>
				                                    </thead>
				                                    <tbody>

				                                    	<?php

				                                    		$query = "SELECT * FROM ems_t_eventreg_nonmem AS R
					                                    		INNER JOIN ems_r_event AS E
					                                    		ON E.re_event_id = R.nmr_event_id
					                                    		INNER JOIN ems_t_payment_eventregnonmem_onsite AS P
					                                    		ON P.tpno_regid = R.nmr_id
					                                    			WHERE R.nmr_status = 'Paid'
					                                    			AND R.nmr_paymenttype = 'Onsite'";

				                                    		$runquery = mysqli_query($connection, $query);

				                                    		while ($row = mysqli_fetch_assoc($runquery)){

				                                    			$name = $row['nmr_name'];
				                                    			$event = $row['re_event_name'];
				                                    			$transno = $row['nmr_transcode'];
				                                    			$amount = $row['re_regfee_nonmem'];
				                                    			$receivedby = $row['tpno_receivedby'];
				                                    			$date = $row['tpno_date'];

				                                    			echo "<tr>
				                                    					<td>".$name."</td>
				                                    					<td>".$event."</td>
				                                    					<td>".$transno."</td>
				                                    					<td>".$amount."</td>
				                                    					<td>".$receivedby."</td>
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
						<!-- Non-member (On SIte) -->
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

    	function btn_eregmembank(myId){
    		// alert(myId)

    		let bank = $('#txt_membank').val()
    		let branch = $('#txt_membranch').val()
    		let controlno = $('#txt_memcontrolno').val()
    		let date = $('#date_membank').val()

    		// alert(bank+" | "+branch)
 
    		$.ajax({
    			type: 'POST',
    			url:'../functionalities/payment_eventreg_member_bank.php',
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

    	function btn_eregmemsite(myId){
    		// alert(myId)

    		let receivedby = $('#txt_rbmemsite').val()
    		let date = $('#date_memsite').val()

    		// alert(bank+" | "+branch)
 
    		$.ajax({
    			type: 'POST',
    			url:'../functionalities/payment_eventreg_member_onsite.php',
    			async: false,
    			data:{
    					_receivedby:receivedby,
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

    	function btn_eregnonmembank(myId){
    		// alert(myId)

    		let bank = $('#txt_nonmembank').val()
    		let branch = $('#txt_nonmembranch').val()
    		let controlno = $('#txt_nonmemconno').val()
    		let date = $('#date_nonmembank').val()

    		// alert(bank+" | "+branch)
 
    		$.ajax({
    			type: 'POST',
    			url:'../functionalities/payment_eventreg_nonmember_bank.php',
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
    	
    	function btn_eregnonmemsite(myId){
    		// alert(myId)

    		let receivedby = $('#txt_rbnonmemsite').val()
    		let date = $('#date_nonmemsite').val()

    		// alert(bank+" | "+branch)
 
    		$.ajax({
    			type: 'POST',
    			url:'../functionalities/payment_eventreg_nonmember_onsite.php',
    			async: false,
    			data:{
    					_receivedby:receivedby,
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
