<?php

	include('../../../dbconnection.php');

	$newdis_name = $_POST['_new_dis'];
	$newdis_description = $_POST['_new_disdescription'];	
	$newdishead = $_POST['_new_dishead'];
	$myId = $_POST['_myId'];

	$query = "UPDATE `ems_r_district` SET rd_dis_name = '$newdis_name', rd_dis_description = '$newdis_description', rd_dis_head = '$newdishead' WHERE rd_dis_id = '$myId'";

	$runquery = mysqli_query($connection, $query);

?>	