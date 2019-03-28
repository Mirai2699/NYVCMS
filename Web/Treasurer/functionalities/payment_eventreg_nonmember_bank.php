<?php

	include('../../../dbconnection.php');

	$date = $_POST['_date'];
	$bank = $_POST['_bank'];
	$branch = $_POST['_branch'];
	$controlno = $_POST['_controlno'];
	$myId = $_POST['_myId'];
	$status = "Paid";

	echo $query = "INSERT INTO `ems_t_payment_eventregnonmem_bank`(tpnb_regid, tpnb_date, tpnb_bank, tpnb_branch, tpnb_controlno) VALUES ('$myId','$date', '$bank', '$branch', '$controlno')";

	$runquery = mysqli_query($connection, $query);

	echo $query1 = "UPDATE `ems_t_eventreg_nonmem` SET nmr_status = '$status' WHERE nmr_id = '$myId'";

	$runquery1 = mysqli_query($connection, $query1);

?>	