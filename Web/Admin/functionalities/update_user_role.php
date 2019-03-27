<?php

	include('../../../dbconnection.php');

	$new_role = $_POST['_new_role'];
	$myId = $_POST['_myId'];

	$query = "UPDATE `ems_r_user_role` SET rur_rolename = '$new_role' WHERE rur_roleid = $myId";

	$runquery = mysqli_query($connection, $query);

// 	echo "INSERT INTO `ems_r_event_type`(ret_etype_name, ret_etype_description) VALUES ('$etype_name','$etype_description')";
// ?>	