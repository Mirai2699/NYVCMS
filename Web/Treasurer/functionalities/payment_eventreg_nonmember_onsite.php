<?php

	include('../../../dbconnection.php');

	$date = $_POST['_date'];
	$receivedby = $_POST['_receivedby'];
	$myId = $_POST['_myId'];
	$status = "Paid";

	$query = "INSERT INTO `ems_t_payment_eventregnonmem_onsite`(tpno_regid, tpno_date, tpno_receivedby) VALUES ('$myId','$date', '$receivedby')";

	$runquery = mysqli_query($connection, $query);

	$query1 = "UPDATE `ems_t_eventreg_nonmem` SET nmr_status = '$status' WHERE nmr_id = '$myId'";

	$runquery1 = mysqli_query($connection, $query1);

?>	