<?php

	include('../../../dbconnection.php');

	echo $sponsor = $_POST['_sponsor'];
	echo $type = $_POST['_type'];	
	echo $conno = $_POST['_conno'];
	echo $address = $_POST['_address'];

	echo $query = "INSERT INTO `ems_r_sponsor`(rs_sponsor_name, rs_sponsor_contact_no, rs_sponsor_address, rs_stype_id) VALUES ('$sponsor','$conno', '$address', '$type')";

	$runquery = mysqli_query($connection, $query);
	
 ?>