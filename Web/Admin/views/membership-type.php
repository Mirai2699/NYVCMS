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
                <li class="active">Membership Type</li>
            </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <h1 class="page-header">Membership Types</h1>
            <!-- end page-header -->
            
            <!-- begin row -->
            <div class="row">
                <!-- begin col-12 -->
                <div class="col-md-12">
                    <p>
                        <td><a href="ui_modal_notification.html#modal-dialog" class="btn btn-sm btn-success" data-toggle="modal">Add Membership Type</a></td>
                    </p>
                    <!-- #modal-dialog -->
                            <div class="modal fade" id="modal-dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">Add Membership Type</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Membership Type</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="txt_mtype" class="form-control" placeholder="Membership Type" required="" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Membership Fee</label>
                                                        <div class="col-md-9">
                                                          <input type="digits" id="txt_fee" class="form-control" placeholder="00.00" required="" data-parsely-type="digits"/>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
                                            <a href="javascript:;" id="btn_addmtype" class="btn btn-sm btn-success">Submit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- #modal-without-animation -->
                    <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                               <!--  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a> -->
                            </div>
                            <h4 class="panel-title">Membership Type</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Membership Types</th>
                                            <th>Membership Fee</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                            $query = "SELECT * FROM ems_r_membership_type WHERE mtype_activeflag = 1";

                                            $runquery = mysqli_query($connection, $query);

                                            while ($row = mysqli_fetch_assoc($runquery)){

                                                $mtype = $row['mtype_name'];
                                                $fee = $row['mtype_fee'];
                                                $id = $row['mtype_id'];

                                                echo "<tr>
                                                        <td>".$mtype."</td>
                                                        <td>".$fee."</td>
                                                        <td>
                                                            <a href='ui_modal_notification.html#modal-edit".$id."' class='btn  btn-success' data-toggle='modal'><i class='fa fa-edit'></i></a>
                                                            <a href='javascript:;' onclick='btn_areventype".$id."' class='btn btn-danger' data-toggle='modal'><i class='fa fa-times'></i></a>
                                                        </td>
                                                      </tr>


                                                        <div class='modal fade' id='modal-edit".$id."'>
                                                            <div class='modal-dialog'>
                                                                <div class='modal-content'>
                                                                    <div class='modal-header'>
                                                                        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
                                                                        <h4 class='modal-title'>Update Membership Type</h4>
                                                                    </div>
                                                                    <div class='modal-body'>
                                                                        <div class='panel-body'>
                                                                            <form class='form-horizontal'>
                                                                                <div class='form-group'>
                                                                                    <label class='col-md-3 control-label'>Membership Type</label>
                                                                                    <div class='col-md-9'>
                                                                                        <input type='text' value='".$mtype."' id='txt_mtype_up".$id."' class='form-control' placeholder='Name' required/>
                                                                                    </div>
                                                                                </div>
                                                                                <div class='form-group'>
                                                                                    <label class='col-md-3 control-label'>Membership Fee</label>
                                                                                    <div class='col-md-9'>
                                                                                        <input type='digits' value='".$fee."' id='txt_fee_up".$id."' class='form-control' placeholder='00.00' required/>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                    <div class='modal-footer'>
                                                                        <a href='javascript:;' class='btn btn-sm btn-white' data-dismiss='modal'>Close</a>
                                                                        <a href='javascript:;' onclick='btn_upmtype(".$id.")' class='btn btn-sm btn-success'>Submit</a>
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
        $('#btn_addmtype').click(function(){
            // alert();

            let mtype = $('#txt_mtype').val();
            let fee = $('#txt_fee').val();

            // alert(etype_name+" | "+etype_description)

            $.ajax({
                type: 'POST',
                data:{
                        _mtype:mtype,
                        _fee:fee
                    },
                url: '../functionalities/add_membership_type.php',
                async: false,
                success: function(data){
                    alert("Successfully Added!");
                    setTimeout(location.reload.bind(location), 1000);
                },
                error: function(reponse){
                    alert('something went wrong')
                }

            })

        })


        function btn_upmtype(myId){
            // alert(myId)

            let newmtype = $('#txt_mtype_up'+myId).val()
            let newfee = $('#txt_fee_up'+myId).val();

            // alert(newfee)

            $.ajax({
                type: 'POST',
                url:'../functionalities/update_membership_type.php',
                async: false,
                data:{
                        _newmtype:newmtype,
                        _newfee:newfee,
                        _myId:myId
                },
                success: function(data){
                    alert("Updated Successfully!")
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
