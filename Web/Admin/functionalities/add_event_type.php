<?php

	include('../../../dbconnection.php');

	$etype_name = $_POST['_etype_name'];
	$etype_description = $_POST['_etype_description'];	

	$query = "INSERT INTO `ems_r_event_type`(ret_etype_name, ret_etype_description) VALUES ('$etype_name','$etype_description')";

	$runquery = mysqli_query($connection, $query);

// 	echo "INSERT INTO `ems_r_event_type`(ret_etype_name, ret_etype_description) VALUES ('$etype_name','$etype_description')";
// ?>