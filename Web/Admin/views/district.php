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
				<li class="active">District</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">District</h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
				<!-- begin col-12 -->
			    <div class="col-md-12">
			    	<p>
						<td><a href="ui_modal_notification.html#modal-dialog" class="btn btn-sm btn-success" data-toggle="modal">Add District</a></td>
			    	</p>
			    	<!-- #modal-dialog -->
							<div class="modal fade" id="modal-dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											<h4 class="modal-title">Add District</h4>
										</div>
										<div class="modal-body">
											<div class="panel-body">
					                            <form class="form-horizontal">
					                                <div class="form-group">
					                                    <label class="col-md-3 control-label">District Name</label>
					                                    <div class="col-md-9">
					                                        <input type="text" id="txt_dis_name" class="form-control" placeholder="Name"/>
					                                    </div>
					                                </div>
					                                <div class="form-group">
					                                    <label class="col-md-3 control-label">District Head</label>
					                                    <div class="col-md-9">
					                                        <input type="text" id="txt_dishead_name" class="form-control" placeholder="Name"/>
					                                    </div>
					                                </div>
					                            </form>
					                        </div>
										</div>
										<div class="modal-footer">
											<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
											<a href="javascript:;" id="btn_adddis" class="btn btn-sm btn-success">Submit</a>
										</div>
									</div>
								</div>
							</div>
							<!-- #modal-without-animation -->

			        <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <h4 class="panel-title">Districts</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>District</th>
                                            <th>District Head</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    	<?php

                                    		$query = "SELECT * FROM ems_r_district WHERE rd_dis_status = 1";

                                    		$runquery = mysqli_query($connection, $query);

                                    		while ($row = mysqli_fetch_assoc($runquery)){

                                    			$data_dis = $row['rd_dis_name'];
                                    			$data_dishead = $row['rd_dis_head'];
                                    			$datadisid = $row['rd_dis_id'];

                                    			echo "<tr>
                                    					<td>".$data_dis."</td>
                                    					<td>".$data_dishead."</td>
                                    					<td style='width:80px'>
			                                            	<a href='ui_modal_notification.html#modal-edit".$datadisid."' class='btn  btn-success' data-toggle='modal'><i class='fa fa-edit'></i></a>
			                                            	<a href='javascript:;' onclick='btn_areventype".$datadisid."' class='btn btn-danger' data-toggle='modal'><i class='fa fa-times'></i></a>
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

                    <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <h4 class="panel-title">Regions</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Region</th>
                                            <th>District</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                            $query = "SELECT * FROM ems_r_region AS R
                                            INNER JOIN ems_r_district AS D
                                            ON D.rd_dis_id = R.rr_disid
                                            WHERE R.rr_activeflag = 1
                                            AND D.rd_dis_status = 1";

                                            $runquery = mysqli_query($connection, $query);

                                            while ($row = mysqli_fetch_assoc($runquery)){

                                                $name = $row['rr_name'];
                                                $district = $row['rd_dis_name'];
                                                $id = $row['rr_id'];

                                                echo "<tr>
                                                        <td style='width:300px'>".$name."</td>
                                                        <td>".$district."</td>
                                                        <td style='width:75px'>
                                                            <a href='ui_modal_notification.html#modal-edit1".$id."' class='btn  btn-success' data-toggle='modal'><i class='fa fa-edit'></i></a>
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

    <!-- district modal -->
	<?php

		$query = "SELECT * FROM ems_r_district WHERE rd_dis_status = 1";

		$runquery = mysqli_query($connection, $query);

		while ($row = mysqli_fetch_assoc($runquery)){

			$data_dis = $row['rd_dis_name'];
			$data_dishead = $row['rd_dis_head'];
			$datadisid = $row['rd_dis_id'];
	?>

	<div class='modal fade' id="modal-edit<?php echo $datadisid ?>">
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
					<h4 class='modal-title'>Update District</h4>
				</div>
				<div class='modal-body'>
					<div class='panel-body'>
                        <form class='form-horizontal'>
                            <div class='form-group'>
                                <label class='col-md-3 control-label'>District Name</label>
                                <div class='col-md-9'>
                                    <input type='text' value="<?php echo $data_dis ?>" id="txt_dis_name_up<?php echo $datadisid ?>" class='form-control' placeholder='District'/>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class='col-md-3 control-label'>District Head</label>
                                <div class='col-md-9'>
                                    <input type='text' value="<?php echo $data_dishead ?>" id="txt_dishead_name_up<?php echo $datadisid ?>" class='form-control' placeholder='District Head'/>
                                </div>
                            </div>
                        </form>
                    </div>
				</div>
				<div class='modal-footer'>
					<a href='javascript:;' class='btn btn-sm btn-white' data-dismiss='modal'>Close</a>
					<a href='' onclick="btn_updis(<?php echo $datadisid ?>)" class='btn btn-sm btn-success'>Submit</a>
				</div>
			</div>
		</div>
	</div>
    <?php } ?>
    <!-- district modal -->

<!-- region modal -->
    <?php


        $query = "SELECT * FROM ems_r_region AS R
        INNER JOIN ems_r_district AS D
        ON D.rd_dis_id = R.rr_disid
        WHERE R.rr_activeflag = 1
        AND D.rd_dis_status = 1";

        $runquery = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($runquery)){

            $name = $row['rr_name'];
            $district = $row['rd_dis_name'];
            $id = $row['rr_id'];
            $disid = $row['rd_dis_id'];
    ?>

    <div class='modal fade' id="modal-edit1<?php echo $id?>">
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
                    <h4 class='modal-title'>Update District</h4>
                </div>
                <div class='modal-body'>
                    <div class='panel-body'>
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Region</label>
                                <div class="col-md-9">
                                    <input type="text" value="<?php echo $name ?>" id="txt_region_up<?php echo $id?>" class="form-control" placeholder="Name"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">District</label>
                                <div class="col-md-9">
                                    <select name="dd_etype" id="dd_district"  class="form-control" style="color: black;" required="">
                                            <?php  
                                                $sql= "SELECT DISTINCT * FROM ems_r_district WHERE rd_dis_status = 1";
                                                 $results = mysqli_query($connection, $sql) or die("Bad Query: $sql");
                                                     while($row = mysqli_fetch_assoc($results))
                                                        {  
                                                            $disname = $row['rd_dis_name'];
                                                            $disid1 = $row['rd_dis_id'];
                                                        ?>
                                       <option value="<?php echo $disid1 ?>"><?php echo "$disname"; ?></option>
                                            <?php
                                                        }
                                            ?>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href='javascript:;' class='btn btn-sm btn-white' data-dismiss='modal'>Close</a>
                    <a href='javascript:;' onclick='btn_upregion(<?php echo $id ?>)' class='btn btn-sm btn-success'>Submit</a>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <!-- region modal -->
	
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
    	$('#btn_adddis').click(function(){
    		// alert();

    		let dis_name = $('#txt_dis_name').val();
    		let dis_description = $('#txt_dis_description').val();
    		let dishead = $('#txt_dishead_name').val();

    		// alert(etype_name+" | "+etype_description)

    		$.ajax({
    			type: 'POST',
    			data:{
    					_dis_name:dis_name,
    					_dishead:dishead
    				},
    			url: '../functionalities/add_district.php',
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


    	function btn_updis(myId){
    		// alert(myId)

    		let new_dis = $('#txt_dis_name_up' +myId).val()
    		let new_dishead = $('#txt_dishead_name_up' +myId).val();

    		// alert(new_dis+" | "+new_dishead)

    		$.ajax({
    			type: 'POST',
    			url:'../functionalities/update_district.php',
    			async: false,
    			data:{
    					_new_dis:new_dis,
    					_new_dishead:new_dishead,
    					_myId:myId
    			},
    			success: function(data){
    				// alert(data)
    				setTimeout(location.reload.bind(location), 1000)
    			},
    			error: function(response){
    				alert('something went wrong')
    			}
    		})
    	}

        function btn_upregion(myId){
            // alert(myId)

            let region = $('#txt_region_up' +myId).val();
            let district = $('#dd_district' +myId).val();

            alert(region+" | "+district)

            // $.ajax({
            //     type: 'POST',
            //     url:'../functionalities/update_region.php',
            //     async: false,
            //     data:{
            //             _region:region,
            //             _district:district,
            //             _myId:myId
            //     },
            //     success: function(data){
            //         alert(data)
            //         // setTimeout(location.reload.bind(location), 1000)
            //     },
            //     error: function(response){
            //         alert('something went wrong')
            //     }
            // })
        }

    </script>
</body>
</html>
