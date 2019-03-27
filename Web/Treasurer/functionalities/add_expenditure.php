<?php

	include('../../../dbconnection.php');

	$expense = $_POST['_expense'];
	$amount = $_POST['_amount'];
	$purpose = $_POST['_purpose'];
	$date = $_POST['_date'];

	$query = "INSERT INTO `ems_t_expenditures`(te_expense, te_amount, te_purpose, te_date) VALUES ('$expense','$amount', '$purpose', '$date')";

	$runquery = mysqli_query($connection, $query); ?>