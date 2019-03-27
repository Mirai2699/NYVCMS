<?php

	include('../../../dbconnection.php');

	$date = $_POST['_date'];
	$bank = $_POST['_bank'];
	$branch = $_POST['_branch'];
	$controlno = $_POST['_controlno'];
	$indivmemid = $_POST['_indivmemid'];
	$myId = $_POST['_myId'];
	$status = "Paid";

	$query = "INSERT INTO `ems_t_payment_renewal_indiv`(tpri_indivrenid, tpri_date, tpri_bank, tpri_branch, tpri_controlno) VALUES ('$myId','$date', '$bank', '$branch', '$controlno')";

	$runquery = mysqli_query($connection, $query);

	$query1 = "UPDATE `ems_t_renewal_indiv` SET tri_status = '$status' WHERE tri_indivrenid = '$myId'";

	$runquery1 = mysqli_query($connection, $query1);

	$query2 = "UPDATE `ems_t_individual_membership` SET tim_status = '$status' WHERE tim_indivmemid = '$indivmemid'";

	$runquery2 = mysqli_query($connection, $query2);

?>	