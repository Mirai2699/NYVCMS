<?php

	include('../../../dbconnection.php');

	$region = $_POST['_region'];
	$district = $_POST['_district'];
	$myId = $_POST['_myId'];

	echo $query = "UPDATE `ems_r_region` SET rr_region = '$region', rr_disid = '$district' WHERE rr_id = '$myId'";

	$runquery = mysqli_query($connection, $query);

?>	