<?php 
	include("../../../dbconnection.php");
    include("../utilities/header.php");
    include("../utilities/BaseJs.php");
    include("../utilities/custom.php");
    include("../utilities/navbar.php");
    include("../utilities/notification.php");

if (isset($_GET['viewEvent'])) 
    {
        $ids = $_GET['viewEvent'];

    } 
?>
		
			<!-- begin #content -->
        <div id="content" class="content">
            <!-- begin breadcrumb -->
            <ol class="breadcrumb pull-right">
                <li><a href="javascript:;">Home</a></li>
                <li><a href="javascript:;">Event Activities </a></li>
            </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <h1 class="page-header">Event Activities</h1>
            <!-- end page-header -->

			<!-- begin row -->
			<div class="row">
				<!-- begin col-12 -->
			    <div class="col-md-12">
							<!-- #modal-without-animation -->
			        <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            </div>
                            <h4 class="panel-title">Activities</h4>
                        </div>
                        <div class="panel-body">
                            
                        <?php  

                            //$ids = $row['Batch_No'];
                            $sql = "SELECT * FROM `ems_r_event` WHERE re_event_id = $ids";


                            $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

                            while($row = mysqli_fetch_assoc($result))
                            {
                              $name = $row['re_event_name'];
                              $desc = $row['re_event_description'];
                              $sdate = $row['re_event_startdate'];
                              $edate = $row['re_event_enddate'];
                        ?>
                            <h1><?php echo $name; ?></h1>
                            <h2><?php echo $sdate; ?> - <?php echo $edate; ?></h2><br>
                            <h4>Description: <?php echo $desc; ?></h4>
                            
                        <?php
                            }
                        ?>
                             <div class="row">
                                <div class="col-md-12">
                                    <div style="padding: 1px; margin-bottom: 10px; background-color: #757575;">                                                             
                                    </div>
                                </div>
                            </div>
                            <br>
                            <table class="display table table-bordered table-striped">                                
                                <tr>
                                    <td>                          
                                        <form action="addActivity.php" method="POST">

                                            <div class="form-content">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p><button type="button" id="btnAdd" class="btn btn-primary">Add</button></p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div style="padding: 1px; margin-bottom: 10px; background-color: #E0E1E7;">                                                             
                                                        </div>
                                                    </div>
                                                </div>

                                             
                                                 <div class="form-group">
                                                    <input type="hidden" name="r_batch" value="">
                                                </div>

                                                <div class="form-group">
                                                    <input type="hidden" name="currentdate" value="">
                                                </div>
                                                <div class="row group">                                   <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Activity Name</label>
                                                            <input style="color: black; padding-right: 2px;" type="text" name="name[]" class="form-control" required="" minlength="3" min="1" max="100" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <input style="color: black; padding-right: 2px;" type="text" name="desc[]" class="form-control" required="" minlength="3" min="1" max="100" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Person/s in charge</label>
                                                            <input style="color: black; padding-right: 2px;" type="text" name="pic[]" class="form-control" required="" minlength="3" min="1" max="100" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Start time</label>
                                                            <input style="color: black; padding-right: 2px;" type="text" name="time[]" class="form-control" required="" minlength="3" min="1" placeholder="00:00" max="100" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-danger btnRemove" style="margin-top: 23px;">Remove</button>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-12">
                                                        <div style="padding: 1px; margin-bottom: 10px; background-color: #E0E1E7;">                                                 
                                                        </div>
                                                    </div>

                                                </div>  
                                            </div>


                                           <a data-toggle="modal" href="#Continue" class="btn btn-success">Submit</a>   
                                            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Continue" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content" style="text-align: center;">
                                                            <div class="modal-header">
                                                                
                                                            </div>
                                                            <br>
                                                          <h1>Do you wanted to add the activities?</h1>
                                                            <div class="panel" style="height: 50%; width: 100%">
                                                                <br>
                                                                <button type="submit" class="btn btn-success btn-lg" name="addAct" value="<?php echo $ids; ?>">   Yes   </button> &nbsp&nbsp&nbsp&nbsp
                                                                <button data-dismiss="modal" class="btn btn-error btn-lg">No</button>
                                                            </div>
                                                            <br>
                                                        </div>
                                                    </div>
                                            </div>
                                          </form>  
                                    </td> 
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Event Sponsor/s</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Activity Name</th>
                                            <th>Description</th>
                                            <th>Person in charge</th>
                                            <th>Start time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                    		$query = "SELECT * FROM `ems_r_activity` as ac left join `ems_r_event` as ev on ac.ra_event_id = ev.re_event_id where ac.ra_event_id =".$ids."";

                                    		$runquery = mysqli_query($connection, $query);

                                    		while ($row = mysqli_fetch_assoc($runquery)){

                                    			
                                            $name = $row["ra_activity_name"];
                                            $desc = $row["ra_activity_description"]; 
                                            $pic = $row["ra_activity_pic"]; 
                                            $time = $row["ra_activity_starttime"]; 

                                    			echo "<tr>
                                    					<td>".$name."</td>
                                    					<td>".$desc."</td>
                                    					<td>".$pic."</td>
                                    					<td>".$time."</td>
                                    					<td style='width:135px'>
                                                        <center>
                                                             <a href='event_to_sponsor.php?viewEvent='  class='btn btn-primary'><i class='fa fa-edit'></i></a>
                                                            </center>
			                                            </td>
                                    				  </tr>	
	                                    			 ";
                                    		}

                                    	?>
                                    </tbody>
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

    <script>
    	$(function()){
    		$('#date_event_start').mask("9999/99/99", {placeholder: 'YYYY/MM/DD' });
    		$('#date_event_end').mask("9999/99/99", {placeholder: 'YYYY/MM/DD' });

    	});


    </script>


    <script type="text/javascript">
    	$('#btn_addevent').click(function(){
    		// alert();

    		let event_name = $('#txt_event_name').val();
    		let event_desc = $('#txt_event_desc').val();
    		let event_type = $('#dd_etype').val();
    		let event_startdate = $('#date_event_start').val();
    		let event_enddate = $('#date_event_end').val();
    		let event_venue = $('#dd_venue').val();
    		let event_budget = $('#txt_budget').val();

    		// alert(etype_name+" | "+etype_description)

    		$.ajax({
    			type: 'POST',
    			data:{
    					_event_name:event_name,
    					_event_desc:event_desc,
    					_event_type:event_type,
    					_event_startdate:event_startdate,
    					_event_enddate:event_enddate,
    					_event_venue:event_venue,
    					_event_budget:event_budget
    				},
    			url: '../functionalities/add_event.php',
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
<script>

        $('.form-content').multifield({
            section: '.group',
            btnAdd:'#btnAdd',
            btnRemove:'.btnRemove',
        });
</script>

</body>
</html>
