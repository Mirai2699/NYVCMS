<?php

	include('../../../dbconnection.php');

	$myId = $_POST['_myId'];
	$flag = 0;


	$query = "UPDATE `ems_t_individual_membership` SET tim_activeflag = '$flag' WHERE tim_indivmemid = '$myId'";

	$runquery1 = mysqli_query($connection, $query);

?>	