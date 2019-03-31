<?php

	include('../../../dbconnection.php');

	$stype = $_POST['_stype'];

	$query = "INSERT INTO `ems_r_event_type`(ret_etype_name) VALUES ('$stype')";

	$runquery = mysqli_query($connection, $query); 
?>