<?php

	include('../dbconnection.php');

	$name = $_POST['_name'];
	$date = $_POST['_date'];
	$barangay = $_POST['_barangay'];
	$city = $_POST['_city'];
	$province = $_POST['_province'];
	$region = $_POST['_region'];
	$nummem = $_POST['_nummem'];
	$orgconno = $_POST['_orgconno'];
	$orgemail = $_POST['_orgemail'];
	$repname = $_POST['_repname'];
	$repconno = $_POST['_repconno'];
	$classification= $_POST['_classification'];
	$subclass = $_POST['_subclass'];
	$advoc = $_POST['_advoc'];

	$query = "INSERT INTO `ems_r_org_info` (roi_orgname, roi_date_established, roi_barangay, roi_city, roi_province, roi_region, roi_numofmem, roi_orgconno, roi_orgemail, roi_repname, roi_repconno, roi_classification, roi_subclassification, roi_advoc) VALUES ('$name', '$date', '$barangay', '$city', '$province', '$region', '$nummem', '$orgconno', '$orgemail', '$repname', '$repconno', '$classification', '$subclass', '$advoc')";

	$runquery = mysqli_query($connection, $query); 

	$transno = generateTranscode();
	$amount = 500;

	$orgid = mysqli_query($connection,"SELECT MAX(roi_orgid) AS M FROM ems_r_org_info WHERE roi_activeflag = 1");
	$result = mysqli_fetch_array($orgid); 
	$a = $result['M'];

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


	$query1 = "INSERT INTO `ems_t_org_membership` (tom_transcode, tom_amount, tom_date, tom_orgid, tom_disid) VALUES ('$transno', '$amount', CURRENT_DATE, '$a', '$district')";

	$runquery1 = mysqli_query($connection, $query1);	



	function generateTranscode(){
		$keylength = 10;
		$str = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$rand = substr(str_shuffle($str), 0, $keylength);
		return $rand;
	}

?>	