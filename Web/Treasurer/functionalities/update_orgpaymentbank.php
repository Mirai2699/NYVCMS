<?php

	include('../../../dbconnection.php');

	$date = $_POST['_date'];
	$bank = $_POST['_bank'];
	$branch = $_POST['_branch'];
	$controlno = $_POST['_controlno'];
	$myId = $_POST['_myId'];
	$status = "Paid";

	$query = "INSERT INTO `ems_t_payment_orgmem`(tpo_orgmemid, tpo_datereceived, tpo_bank, tpo_branch, tpo_controlno) VALUES ('$myId','$date', '$bank', '$branch', '$controlno')";

	$runquery = mysqli_query($connection, $query);

	$query1 = "UPDATE `ems_t_org_membership` SET tom_status = '$status' WHERE tom_orgmemid = '$myId'";

	$runquery1 = mysqli_query($connection, $query1);

?>	