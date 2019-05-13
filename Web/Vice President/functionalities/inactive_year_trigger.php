<?php

	include('../../../dbconnection.php');

	// $myId = $_POST['_myId'];
	// $flag = 0;


	// $query = "UPDATE `ems_t_individual_membership` SET tim_activeflag = '$flag' WHERE tim_indivmemid = '$myId'";

	// $runquery1 = mysqli_query($connection, $query);

	
	//1 YEAR INACTIVE TRIGGER

	$curr_date = date('Y-m-d');
    $adv_year = date('Y') + 1;
    

	$view_query = mysqli_query($connection,"SELECT * FROM `ems_t_individual_membership` WHERE tim_activeflag = 1");
	while($row = mysqli_fetch_assoc($view_query))
	{
		$tim_ID = $row["tim_indivmemid"];

		$tim_date1 = new datetime($row["tim_date"]);
		$nf_tim_date1 = $tim_date1->format('m-d');

		$test_year = $adv_year.'-'.$nf_tim_date1;

		$tim_activeflag = $row["tim_activeflag"];

		if($test_year ==00 $curr_date)
		{

			$query = "UPDATE `ems_t_individual_membership` SET tim_activeflag = 0 WHERE tim_indivmemid = '$tim_ID'";
			$runquery1 = mysqli_query($connection, $query);
		}
		else
		{
			//No function
		}

	}

	

?>	