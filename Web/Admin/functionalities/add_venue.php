<?php

	include('../../../dbconnection.php');

	$ven_name = $_POST['_ven_name'];
	$ven_add = $_POST['_ven_add'];	
	$ven_cap = $_POST['_ven_cap'];
	$ven_conper = $_POST['_ven_conper'];
	$ven_conno = $_POST['_ven_conno'];

	$query = "INSERT INTO `ems_r_venue`(rv_ven_name, rv_ven_address, rv_ven_capacity, rv_ven_conper, rv_ven_contactno) VALUES ('$ven_name','$ven_add', '$ven_cap', '$ven_conper', '$ven_conno')";

	$runquery = mysqli_query($connection, $query);

 ?>