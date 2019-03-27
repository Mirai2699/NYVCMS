<?php

	include('../../../dbconnection.php');

	$sponsor = $_POST['_sponsor'];
	$event = $_POST['_event'];
	$amount = $_POST['_amount'];
	$date = $_POST['_date'];

	$query = "INSERT INTO `ems_r_sponsorship`(rss_sponsor_id, rss_event_id, rss_amount, rss_received_date) VALUES ('$sponsor', '$event','$amount','$date')";

	$runquery = mysqli_query($connection, $query); ?>