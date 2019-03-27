<?php

	include('../../../dbconnection.php');

	$date = $_POST['_date'];
	$myId = $_POST['_myId'];
	$status = "Renewal";
	$flag = 1;



	$transno = generateTranscode();
	$amount = 300;


	
	// date_default_timezone_set('Asia/Manila');
	// $date = date('m-d-Y');

	$query = "INSERT INTO `ems_t_renewal_org` (tro_transcode, tro_amount, tro_date, tro_orgmemid) VALUES ('$transno', '$amount', '$date', '$myId')";

	$runquery = mysqli_query($connection, $query);	

	$query1 = "UPDATE `ems_t_org_membership` SET tom_status = '$status', tom_activeflag = '$flag' WHERE tom_orgmemid = '$myId'";

	$runquery1 = mysqli_query($connection, $query1);

	function generateTranscode(){
		$keylength = 10;
		$str = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$rand = substr(str_shuffle($str), 0, $keylength);
		return $rand;
	}

?>	