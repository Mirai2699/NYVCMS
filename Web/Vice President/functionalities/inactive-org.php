<?php

	include('../../../dbconnection.php');

	$myId = $_POST['_myId'];
	$flag = 0;


	$query = "UPDATE `ems_t_org_membership` SET tom_activeflag = '$flag' WHERE tom_orgmemid = '$myId'";

	$runquery1 = mysqli_query($connection, $query);

?>	