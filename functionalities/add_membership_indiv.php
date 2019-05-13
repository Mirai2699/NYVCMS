<?php

	include('../dbconnection.php');

	$name = $_POST['_name'];
	$bday = $_POST['_bday'];
	$gender = $_POST['_gender'];
	$conno = $_POST['_conno'];
	$email = $_POST['_email'];
	$conper = $_POST['_conper'];
	$conperno = $_POST['_conperno'];
	$barangay = $_POST['_barangay'];
	$city = $_POST['_city'];
	$province = $_POST['_province'];
	$region = $_POST['_region'];
	$educattain = $_POST['_educattain'];
	$degree = $_POST['_degree'];
	$yeargrad = $_POST['_yeargrad'];
	$award = $_POST['_award'];
	$company = $_POST['_company'];
	$position = $_POST['_position'];
	$advoc = $_POST['_advoc'];

	$query = "INSERT INTO `ems_r_individual_info` (rii_name, rii_bday, rii_gender, rii_conno, rii_email, rii_barangay, rii_city, rii_province, rii_region, rii_conperson, rii_conpersonno, rii_educattainment, rii_yeargraduated, rii_degree, rii_awards, rii_company, rii_position, rii_advoc) VALUES ('$name', '$bday', '$gender', '$conno', '$email', '$barangay', '$city', '$province', '$region', '$conper', '$conperno', '$educattain', '$yeargrad', '$degree', '$award', '$company', '$position', '$advoc')";

	$runquery = mysqli_query($connection, $query); 





	$transno = generateTranscode();
	$amount = 150;

	$individ = mysqli_query($connection,"SELECT MAX(rii_individ) AS I FROM ems_r_individual_info WHERE rii_activeflag = 1");
	$result = mysqli_fetch_array($individ);
	$a = $result['I'];

	// $getdisid = mysqli_query($connection,"SELECT rd_dis_id, rd_dis_name, rd_dis_description FROM ems_r_district WHERE rd_dis_description LIKE '$region' rd_dis_status = 1");

	$getregion_ID = mysqli_query($connection,"SELECT * FROM ems_r_region WHERE rr_name = '$region'");
	while($rowreg = mysqli_fetch_assoc($getregion_ID))
	{
	  $region_ID = $rowreg['rr_id'];
	}


	if ($region == "Ilocos Region" || $region == "Cagayan Valley" || $region == "CAR"){
    	$district = 1;
    }
    elseif ($region == "Central Luzon" || $region == "NCR" ) {
    	$district = 2;
    }
    elseif ($region == "CALABARZON" || $region == "MIMAROPA" || $region == "Bicol Region" ) {
    	$district = 3;
    }
    elseif ($region == "Eastern Visayas" || $region == "Western Visayas" || $region == "Central Visayas" ) {
    	$district = 4;
    }
    elseif ($region == "CALABARZON" || $region == "MIMAROPA" || $region == "Bicol Region" ) {
    	$district = 5;
    }
    else {
    	$district = 6;
    }


	// date_default_timezone_set('Asia/Manila');
	// $date = date('m/d/Y');

	$query1 = "INSERT INTO `ems_t_individual_membership` (tim_transcode, tim_amount, tim_date, tim_individ, tim_disid, tim_region_id) VALUES ('$transno', '$amount', CURRENT_DATE, '$a', '$district', '$region_ID')";

	$runquery1 = mysqli_query($connection, $query1);	



	function generateTranscode(){
		$keylength = 10;
		$str = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$rand = substr(str_shuffle($str), 0, $keylength);
		return $rand;
	}

?>	