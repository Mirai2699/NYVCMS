<?php

	include('../../../dbconnection.php');

	$sdg_name = $_POST['_sdg_name'];
	$sdg_description = $_POST['_sdg_description'];	

	$query = "INSERT INTO `ems_r_sdg`(rsd_sdg_name, rsd_sdg_description) VALUES ('$sdg_name','$sdg_description')";

	$runquery = mysqli_query($connection, $query);
	
 ?>