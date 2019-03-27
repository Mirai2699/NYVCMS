<?php


	include('../dbconnection.php');


		$name = $_POST['_name'];
		$age = $_POST['_age'];
		$address = $_POST['_address'];
        $bday = $_POST['_bday'];
		$gender = $_POST['_gender'];
		$conno = $_POST['_conno'];
		$email = $_POST['_email'];
		$advoc = $_POST['_advoc'];
		$company = $_POST['_company'];
        $rep = $_POST['_rep'];
		$event = $_POST['_event'];

		echo $transno = generateTranscode();


		date_default_timezone_set('Asia/Manila');
		$date = date('m/d/Y');


		$query = "INSERT INTO ems_t_eventreg_nonmem(nmr_transcode, nmr_datereg, nmr_name, nmr_age, nmr_address, nmr_birthdate, nmr_gender, nmr_phone, nmr_email, nmr_advoc, nmr_org, nmr_represent, nmr_event_id) VALUES('$transno', '$date', '$name', '$age','$address', '$bday', '$gender', '$conno', '$email',$advoc', '$company','$rep','$event')";

		mysqli_query($dbconnection,$query);

		function generateTranscode(){
			$keylength = 10;
			$str = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
			$rand = substr(str_shuffle($str), 0, $keylength);
			return $rand;
		}

?>