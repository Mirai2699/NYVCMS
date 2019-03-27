<?php

	include('../../../dbconnection.php');

	$event = $_POST['_event'];
	$item = $_POST['_item'];	
	$quan = $_POST['_quan'];
	$sponsor = $_POST['_sponsor'];
	$date = $_POST['_date'];

	$query = "INSERT INTO `ems_r_logistics`(rl_item_name, rl_quantity, rl_date_received, rl_event_id, rl_sponsor_id) VALUES ('$item','$quan', '$date', '$event', '$sponsor')";

	$runquery = mysqli_query($connection, $query);
	
 ?>