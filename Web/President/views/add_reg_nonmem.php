<?php


	$db = mysqli_connect('localhost','root','','nyvcems_db');

	$keylength = 10;
	$str = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$rand = substr(str_shuffle($str), 0, $keylength);
	$trans = $rand;



	if(isset($_POST['addReg']))
	{
		$event = $_POST['nmr_event_id'];
		$name = $_POST['nmr_name'];
		$age = $_POST['nmr_age'];
        //$address = $_POST['nmr_address'];
        $brngy = $_POST['nmr_brngy'];
		$city = $_POST['nmr_city'];
		$municipality = $_POST['nmr_municipality'];
		$region = $_POST['nmr_region'];
		$bday = $_POST['nmr_birthdate'];
		$gender = $_POST['nmr_gender'];
		$phone = $_POST['nmr_phone'];
		$email = $_POST['nmr_email'];
		$advoc = $_POST['nmr_advoc'];
        $org = $_POST['nmr_org'];
		$rep = $_POST['nmr_represent'];
		$payment = $_POST['nmr_payment'];

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

		$query = "INSERT INTO ems_t_eventreg_nonmem(nmr_name,
										     nmr_age,
                                             nmr_birthdate,
                                             nmr_gender,
										     nmr_phone,
                                             nmr_email,
                                             nmr_advoc,
										     nmr_org,
                                             nmr_represent,
                                             nmr_event_id,
                                             nmr_brngy,
                                             nmr_city,
                                             nmr_municipality,
                                             nmr_region,
                                             nmr_paymenttype,
                                             nmr_datereg,
                                             nmr_transcode  
										     ) 

				   					  VALUES(
				   					  		 '$name',
				   					  		 '$age',
				   					  		 '$bday',
				   					  		 '$gender',
				   					  		 '$phone',
				   					  		 '$email',
				   					  		 '$advoc',
				   					  		 '$org',
				   					  		 '$rep',
				   					  		 '$event    ',
				   					  		 '$brngy',
				   					  		 '$city',
				   					  		 '$municipality',
				   					  		 '$region',
				   					  		 '$payment',
				   					  		 CURRENT_DATE,
				   					  		 '$trans'
				   					  		 )";

		mysqli_query($db,$query);
		header('location: event_list.php');
	}


?>