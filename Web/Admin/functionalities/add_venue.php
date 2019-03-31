<?php

	include('../../../dbconnection.php');

	$ven_name = $_POST['_ven_name'];
	$ven_cap = $_POST['_ven_cap'];
	$ven_brngy = $_POST['_ven_brngy'];
	$ven_city = $_POST['_ven_city'];
	$ven_province = $_POST['_ven_province'];
	$ven_region = $_POST['_ven_region'];
	$ven_conper = $_POST['_ven_conper'];
	$ven_conno = $_POST['_ven_conno'];

	$query = "INSERT INTO `ems_r_venue`(rv_ven_name, rv_ven_barangay, rv_ven_city, rv_ven_province, rv_ven_region, rv_ven_capacity, rv_ven_conper, rv_ven_contactno) VALUES ('$ven_name','$ven_brngy', '$ven_city', '$ven_province', '$ven_region', '$ven_cap', '$ven_conper', '$ven_conno')";

	$runquery = mysqli_query($connection, $query);

 ?>