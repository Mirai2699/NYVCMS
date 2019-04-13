<?php

	include('../../../dbconnection.php');

	$newadvoc= $_POST['_newadvoc'];	
	$myId = $_POST['_myId'];

	$query = "UPDATE `ems_r_advocacy` SET advoc_name = '$newadvoc' WHERE advoc_id = '$myId'";

	$runquery = mysqli_query($connection, $query);

 ?>	