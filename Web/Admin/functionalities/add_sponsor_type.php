<?php

	include('../../../dbconnection.php');

	$stype = $_POST['_stype'];

	$query = "INSERT INTO `ems_r_sponsor_type`(rst_stype_name) VALUES ('$stype')";

	$runquery = mysqli_query($connection, $query); 
?>