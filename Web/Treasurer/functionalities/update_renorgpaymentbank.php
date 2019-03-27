<?php

	include('../../../dbconnection.php');

	$date = $_POST['_date'];
	$bank = $_POST['_bank'];
	$branch = $_POST['_branch'];
	$controlno = $_POST['_controlno'];
	$orgmemid = $_POST['_orgmemid'];
	$myId = $_POST['_myId'];
	$status = "Paid";

	$query = "INSERT INTO `ems_t_payment_renewal_org`(tpro_orgrenid, tpro_date, tpro_bank, tpro_branch, tpro_controlno) VALUES ('$myId','$date', '$bank', '$branch', '$controlno')";

	$runquery = mysqli_query($connection, $query);

	$query1 = "UPDATE `ems_t_renewal_org` SET tro_status = '$status' WHERE tro_orgrenid = '$myId'";

	$runquery1 = mysqli_query($connection, $query1);

	$query2 = "UPDATE `ems_t_org_membership` SET tom_status = '$status' WHERE tom_orgmemid = '$orgmemid'";

	$runquery2 = mysqli_query($connection, $query2);

?>	