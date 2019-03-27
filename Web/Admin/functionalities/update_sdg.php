<?php

	include('../../../dbconnection.php');

	$newsdg_name = $_POST['_new_sdg'];
	$newsdg_description = $_POST['_new_sdgdescription'];	
	$myId = $_POST['_myId'];

	$query = "UPDATE `ems_r_sdg` SET rsd_sdg_name = '$newsdg_name', rsd_sdg_description = '$newsdg_description' WHERE rsd_sdg_id = '$myId'";

	$runquery = mysqli_query($connection, $query);

?>	