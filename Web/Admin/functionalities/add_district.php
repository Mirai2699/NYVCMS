<?php

	include('../../../dbconnection.php');

	$dis_name = $_POST['_dis_name'];
	$dishead = $_POST['_dishead'];

	$query = "INSERT INTO `ems_r_district`(rd_dis_name, rd_dis_head) VALUES ('$dis_name', '$dishead')";

	$runquery = mysqli_query($connection, $query);
	
 ?>