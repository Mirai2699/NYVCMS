<?php

	include('../../../dbconnection.php');

	$newmtype = $_POST['_newmtype'];
	$newfee = $_POST['_newfee'];	
	$myId = $_POST['_myId'];

	$query = "UPDATE `ems_r_membership_type` SET mtype_name = '$newmtype', mtype_fee = '$newfee' WHERE mtype_id = '$myId'";

	$runquery = mysqli_query($connection, $query);

?>	