<?php

	include('../../../dbconnection.php');

	$new_venname = $_POST['_new_ven_name'];
	$new_venadd = $_POST['_new_ven_add'];	
	$new_vencap = $_POST['_new_ven_cap'];
	$new_venconper = $_POST['_new_ven_conper'];
	$new_venconno = $_POST['_new_ven_conno'];
	$myId = $_POST['_myId'];

	$query = "UPDATE `ems_r_venue` SET rv_ven_name = '$new_venname', rv_ven_address = '$new_venadd', rv_ven_capacity = '$new_vencap', rv_ven_conper = '$new_venconper', rv_ven_contactno = '$new_venconno' WHERE rv_ven_id = '$myId'";

	$runquery = mysqli_query($connection, $query);

	// alert ('ok');

?>	