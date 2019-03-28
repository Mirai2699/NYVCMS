<?php

	include('../../../dbconnection.php');

	$date = $_POST['_date'];
	$receivedby = $_POST['_receivedby'];
	$myId = $_POST['_myId'];
	$status = "Paid";

	$query = "INSERT INTO `ems_t_payment_eventregmem_onsite`(tpeo_regid, tpeo_date, tpeo_receivedby) VALUES ('$myId','$date', '$receivedby')";

	$runquery = mysqli_query($connection, $query);

	$query1 = "UPDATE `ems_t_eventreg_mem` SET term_status = '$status' WHERE term_regid = '$myId'";

	$runquery1 = mysqli_query($connection, $query1);

?>	