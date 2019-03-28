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
			<h1 class="page-header">Payment</h1>
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

					                                    		$query = "SELECT * FROM ems_t_individual_membership AS M  INNER JOIN ems_r_individual_info AS I ON M.tim_individ = I.rii_individ INNER JOIN ems_t_renewal_indiv AS R ON R.tri_indivmemid = M.tim_indivmemid WHERE M.tim_status = 'Renewal' AND R.tri_status = 'Pending' AND M.tim_activeflag = 1 AND R.tri_activeflag = 1";

					                                    		$runquery = mysqli_query($connection, $query);

					                                    		while ($row = mysqli_fetch_assoc($runquery)){

					                                    			$name = $row['rii_name'];
					                                    			$transno = $row['tri_transcode'];
					                                    			$amount = $row['tri_amount'];
					                                    			$date = $row['tri_date'];
					                                    			$id = $row['tri_indivrenid'];
					                                    			$indivmemid = $row['tim_indivmemid'];	

					                                    			echo "<tr>
					                                    					<td>".$name."</td>
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
																	                                        <input type='text' value='' id='txt_renindivbank' class='form-control' placeholder='Bank Name'/>
																	                                    </div>
																	                                </div>
																	                                <div class='form-group'>
																	                                    <label class='col-md-3 control-label'>Branch</label>
																	                                    <div class='col-md-9'>
																	                                        <input type='text' value='' id='txt_renindivbranch' class='form-control' placeholder='Branch Name'/>
																	                                    </div>
																	                                </div>
																	                                <div class='form-group'>
																	                                    <label class='col-md-3 control-label'>Control No.</label>
																	                                    <div class='col-md-9'>
																	                                        <input type='text' value='' id='txt_renindivcontrolno' class='form-control' placeholder='Control No.'/>
																	                                    </div>
																	                                </div>
																	                                <div class='form-group'>
																	                                    <label class='col-md-3 control-label'>Date</label>
																	                                    <div class='col-md-9'>
																	                                    	<div class='input-group'>
																	                                            <input type='date' id='renindivdate' class='form-control' placeholder='Date of Payment' />
																	                                        </div>
																	                                        <input type='hidden' id='lbl_indivmemid' class='col-md-3 control-label' value='".$indivmemid."'/>
																	                                    </div>
																	                                </div>
																	                            </form>
																	                        </div>
																						</div>
																						<div class='modal-footer'>
																							<a href='javascript:;' class='btn btn-sm btn-white' data-dismiss='modal'>Close</a>
																							<a href='javascript:;' onclick='btn_uprenindivpayment(".$id.")' class='btn btn-sm btn-success'>Submit</a>
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
					                                            <th>Date</th>
					                                        </tr>
					                                    </thead>
					                                    <tbody>

					                                    	<?php

					                                    		$query = "SELECT * FROM ems_t_individual_membership AS M  
					                                    		INNER JOIN ems_r_individual_info AS I 
					                                    		ON M.tim_individ = I.rii_individ 
					                                    		INNER JOIN ems_t_renewal_indiv AS R 
					                                    		ON R.tri_indivmemid = M.tim_indivmemid 
					                                    		INNER JOIN ems_t_payment_renewal_indiv AS P 
					                                    		ON P.tpri_indivrenid = R.tri_indivrenid 
					                                    		WHERE M.tim_status = 'Paid' 
					                                    		OR M.tim_status = 'Renewal' 
					                                    		AND R.tri_status = 'Paid' 
					                                    		AND M.tim_activeflag = 1 
					                                    		AND R.tri_activeflag = 1";

					                                    		$runquery = mysqli_query($connection, $query);

					                                    		while ($row = mysqli_fetch_assoc($runquery)){

					                                    			$name = $row['rii_name'];
					                                    			$transno = $row['tri_transcode'];
					                                    			$amount = $row['tri_amount'];
					                                    			$controlno = $row['tpri_controlno'];
					                                    			$bank = $row['tpri_bank'];
					                                    			$branch = $row['tpri_branch'];
					                                    			$date = $row['tpri_date'];
					                                    			$id = $row['tri_indivrenid'];		

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
						<!-- Renewal Indiv -->
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

					                                    		$query = "SELECT * FROM ems_t_org_membership AS M  INNER JOIN ems_r_org_info AS I ON M.tom_orgid = I.roi_orgid INNER JOIN ems_t_renewal_org AS R ON R.tro_orgmemid = M.tom_orgmemid WHERE M.tom_status = 'Renewal' AND R.tro_status = 'Pending' AND M.tom_activeflag = 1 AND R.tro_activeflag = 1";

					                                    		$runquery = mysqli_query($connection, $query);

					                                    		while ($row = mysqli_fetch_assoc($runquery)){

					                                    			$name = $row['roi_orgname'];
					                                    			$transno = $row['tro_transcode'];
					                                    			$amount = $row['tro_amount'];
					                                    			$date = $row['tro_date'];
					                                    			$orgmemid = $row['tom_orgmemid'];
					                                    			$id = $row['tro_orgrenid'];	

					                                    			echo "<tr>
					                                    					<td>".$name."</td>
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
																	                                        <input type='text' id='txt_renorgbank' class='form-control' placeholder='Bank Name'/>
																	                                    </div>
																	                                </div>
																	                                <div class='form-group'>
																	                                    <label class='col-md-3 control-label'>Branch</label>
																	                                    <div class='col-md-9'>
																	                                        <input type='text'  id='txt_renorgbranch' class='form-control' placeholder='Branch Name'/>
																	                                    </div>
																	                                </div>
																	                                <div class='form-group'>
																	                                    <label class='col-md-3 control-label'>Control No.</label>
																	                                    <div class='col-md-9'>
																	                                        <input type='text' id='txt_renorgcontrolno' class='form-control' placeholder='Control No.'/>
																	                                    </div>
																	                                </div>
																	                                <div class='form-group'>
																	                                    <label class='col-md-3 control-label'>Date</label>
																	                                    <div class='col-md-9'>
																	                                    	<div class='input-group'>
																	                                            <input type='date' id='renorgdate' class='form-control' placeholder='Date of Payment' />
																	                                        </div>
																	                                        <input type='hidden' id='lbl_orgmemid' class='col-md-3 control-label' value='".$orgmemid."'/>
																	                                    </div>
																	                                </div>
																	                            </form>
																	                        </div>
																						</div>
																						<div class='modal-footer'>
																							<a href='javascript:;' class='btn btn-sm btn-white' data-dismiss='modal'>Close</a>
																							<a href='javascript:;' onclick='btn_uporgrenpayment(".$id.")' class='btn btn-sm btn-success'>Submit</a>
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

					                                    		$query = "SELECT * FROM ems_t_org_membership AS M  
					                                    		INNER JOIN ems_r_org_info AS I ON M.tom_orgid = I.roi_orgid 
					                                    		INNER JOIN ems_t_renewal_org AS R ON R.tro_orgmemid = M.tom_orgmemid
					                                    		INNER JOIN ems_t_payment_renewal_org AS P ON P.tpro_orgrenid = R.tro_orgrenid 
					                                    		WHERE M.tom_status = 'Paid' 
						                                    		AND R.tro_status = 'Paid' 
						                                    		AND M.tom_activeflag = 1 
						                                    		AND R.tro_activeflag = 1";

					                                    		$runquery = mysqli_query($connection, $query);

					                                    		while ($row = mysqli_fetch_assoc($runquery)){

					                                    			$name = $row['roi_orgname'];
					                                    			$transno = $row['tro_transcode'];
					                                    			$amount = $row['tro_amount'];
					                                    			$controlno = $row['tpro_controlno'];
					                                    			$bank = $row['tpro_bank'];
					                                    			$branch = $row['tpro_branch'];
					                                    			$date = $row['tpro_date'];
					                                    			$id = $row['tro_orgrenid'];	

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
						<!-- Renewal Org -->

						<!-- <div class="tab-pane fade" id="default-tab-5">
							<p>
								<span class="fa-stack fa-4x pull-left m-r-10">
									<i class="fa fa-square-o fa-stack-2x"></i>
									<i class="fa fa-twitter fa-stack-1x"></i>
								</span>
								Praesent tincidunt nulla ut elit vestibulum viverra. Sed placerat magna eget eros accumsan elementum. 
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam quis lobortis neque. 
								Maecenas justo odio, bibendum fringilla quam nec, commodo rutrum quam. 
								Donec cursus erat in lacus congue sodales. Nunc bibendum id augue sit amet placerat. 
								Quisque et quam id felis tempus volutpat at at diam. Vivamus ac diam turpis.Sed at lacinia augue. 
								Nulla facilisi. Fusce at erat suscipit, dapibus elit quis, luctus nulla. 
								Quisque adipiscing dui nec orci fermentum blandit.
								Sed at lacinia augue. Nulla facilisi. Fusce at erat suscipit, dapibus elit quis, luctus nulla. 
								Quisque adipiscing dui nec orci fermentum blandit.
							</p>
						</div>
						<div class="tab-pane fade" id="default-tab-6">
							<p>
								<span class="fa-stack fa-4x pull-left m-r-10">
									<i class="fa fa-square-o fa-stack-2x"></i>
									<i class="fa fa-twitter fa-stack-1x"></i>
								</span>
								Praesent tincidunt nulla ut elit vestibulum viverra. Sed placerat magna eget eros accumsan elementum. 
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam quis lobortis neque. 
								Maecenas justo odio, bibendum fringilla quam nec, commodo rutrum quam. 
								Donec cursus erat in lacus congue sodales. Nunc bibendum id augue sit amet placerat. 
								Quisque et quam id felis tempus volutpat at at diam. Vivamus ac diam turpis.Sed at lacinia augue. 
								Nulla facilisi. Fusce at erat suscipit, dapibus elit quis, luctus nulla. 
								Quisque adipiscing dui nec orci fermentum blandit.
								Sed at lacinia augue. Nulla facilisi. Fusce at erat suscipit, dapibus elit quis, luctus nulla. 
								Quisque adipiscing dui nec orci fermentum blandit.
							</p>
						</div> -->
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

    	
    	function btn_uprenindivpayment(myId){
    		// alert(myId)

    		let bank = $('#txt_renindivbank').val()
    		let branch = $('#txt_renindivbranch').val()
    		let controlno = $('#txt_renindivcontrolno').val()
    		let date = $('#renindivdate').val()
    		let indivmemid = $('#lbl_indivmemid').val()

    		// alert(bank+" | "+branch+" | "+controlno+" | "+date)
 
    		$.ajax({
    			type:'POST',
    			data:{
    					_bank:bank,
    					_branch:branch,
    					_controlno:controlno,
    					_date:date,
    					_indivmemid:indivmemid,
    					_myId:myId
    			},
    			url:'../functionalities/update_renindivpaymentbank.php',
    			async: false,
    			success: function(data){
    				// alert(data)
    				setTimeout(location.reload.bind(location), 1000)
    			},
    			error: function(response){
    				alert('Oops, something went wrong')
    			}
    		})
    	}
    
    	function btn_uporgrenpayment(myId){
    		// alert(myId)
    		let bank = $('#txt_renorgbank').val()
    		let branch = $('#txt_renorgbranch').val()
    		let controlno = $('#txt_renorgcontrolno').val()
    		let date = $('#renorgdate').val()
    		let orgmemid = $('#lbl_orgmemid').val()

    		// alert(bank)
    		// alert(bank+" | "+branch+" | "+controlno+" | "+date)
 
    		$.ajax({
    			type:'POST',
    			url:'../functionalities/update_renorgpaymentbank.php',
    			async: false,
    			data:{
    					_bank:bank,
    					_branch:branch,
    					_controlno:controlno,
    					_date:date,
    					_orgmemid:orgmemid,
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
