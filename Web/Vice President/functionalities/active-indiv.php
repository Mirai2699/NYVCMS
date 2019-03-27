<?php

	include('../../../dbconnection.php');

	$date = $_POST['_date'];
	$myId = $_POST['_myId'];
	$status = "Renewal";
	$flag = 1;
	



	$transno = generateTranscode();
	$amount = 100;


	
	// date_default_timezone_set('Asia/Manila');
	// $date = date('m-d-Y');

	$query = "INSERT INTO `ems_t_renewal_indiv` (tri_transcode, tri_amount, tri_date, tri_indivmemid) VALUES ('$transno', '$amount', '$date', '$myId')";

	$runquery = mysqli_query($connection, $query);	

	$query1 = "UPDATE `ems_t_individual_membership` SET tim_status = '$status', tim_activeflag = '$flag' WHERE tim_indivmemid = '$myId'";

	$runquery1 = mysqli_query($connection, $query1);	


	function generateTranscode(){
		$keylength = 10;
		$str = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$rand = substr(str_shuffle($str), 0, $keylength);
		return $rand;
	}

?>	