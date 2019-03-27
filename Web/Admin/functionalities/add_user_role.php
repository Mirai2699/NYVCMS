<?php

	include('../../../dbconnection.php');

	$role = $_POST['_role'];

	$query = "INSERT INTO `ems_r_user_role`(rur_rolename) VALUES ('$role')";

	$runquery = mysqli_query($connection, $query);

// 	echo "INSERT INTO `ems_r_event_type`(ret_etype_name, ret_etype_description) VALUES ('$etype_name','$etype_description')";
// ?>