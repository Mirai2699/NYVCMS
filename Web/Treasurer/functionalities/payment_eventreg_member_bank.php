<?php

	include('../../../dbconnection.php');

	$date = $_POST['_date'];
	$bank = $_POST['_bank'];
	$branch = $_POST['_branch'];
	$controlno = $_POST['_controlno'];
	$myId = $_POST['_myId'];
	$status = "Paid";

	$query = "INSERT INTO `ems_t_payment_eventregmem_bank`(tpeb_regid, tpeb_date, tpeb_bank, tpeb_branch, tpeb_controlno) VALUES ('$myId','$date', '$bank', '$branch', '$controlno')";

	$runquery = mysqli_query($connection, $query);

	$query1 = "UPDATE `ems_t_eventreg_mem` SET term_status = '$status' WHERE term_regid = '$myId'";

	$runquery1 = mysqli_query($connection, $query1);

?>	