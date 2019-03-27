<?php

	include('../../../dbconnection.php');

	$date = $_POST['_date'];
	$bank = $_POST['_bank'];
	$branch = $_POST['_branch'];
	$controlno = $_POST['_controlno'];
	$myId = $_POST['_myId'];
	$status = "Paid";

	$query = "INSERT INTO `ems_t_payment_indivmem`(tpi_indivmemid, tpb_date, tpb_bank, tpb_branch, tpb_controlno) VALUES ('$myId','$date', '$bank', '$branch', '$controlno')";

	$runquery = mysqli_query($connection, $query);

	$query1 = "UPDATE `ems_t_individual_membership` SET tim_status = '$status' WHERE tim_indivmemid = '$myId'";

	$runquery1 = mysqli_query($connection, $query1);

?>	