<?php

	include('../../../dbconnection.php');

	$mtype = $_POST['_mtype'];
	$fee = $_POST['_fee'];	

	$query = "INSERT INTO `ems_r_membership_type`(mtype_name, mtype_fee) VALUES ('$mtype','$fee')";

	$runquery = mysqli_query($connection, $query);
	
 ?>