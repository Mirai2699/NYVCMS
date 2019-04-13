<?php

	include('../../../dbconnection.php');

	$advoc = $_POST['_advoc'];

	$query = "INSERT INTO `ems_r_advocacy`(advoc_name) VALUES ('$advoc')";

	$runquery = mysqli_query($connection, $query); 
?>