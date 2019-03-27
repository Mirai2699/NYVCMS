<?php


	$db = mysqli_connect('localhost','root','','nyvcems_db');


	if(isset($_POST['addReg']))
	{
		$a = $_POST['nmr_event_id'];
		$b = $_POST['nmr_fname'];
		$c = $_POST['nmr_mname'];
		$d = $_POST['nmr_lname'];
		$e = $_POST['nmr_ename'];
		$f = $_POST['nmr_age'];
        $g = $_POST['nmr_address'];
		$h = $_POST['nmr_birthdate'];
		$i = $_POST['nmr_gender'];
		$j = $_POST['nmr_phone'];
		$k = $_POST['nmr_email'];
		$l = $_POST['nmr_advoc'];
        $m = $_POST['nmr_org'];
		$n = $_POST['nmr_represent'];
		$o = $_POST['nmr_payment'];


		$query = "INSERT INTO ems_t_eventreg_nonmem(nmr_fname,
										     nmr_mname,
										     nmr_lname,
										     nmr_ename,
										     nmr_age,
										     nmr_address,
                                             nmr_birthdate,
                                             nmr_gender,
										     nmr_phone,
                                             nmr_email,
                                             nmr_advoc,
										     nmr_org,
                                             nmr_represent,
                                             nmr_event_id,
                                             nmr_paymenttype
										     ) 

				   					  VALUES(
				   					  		 '$b',
				   					  		 '$c',
				   					  		 '$d',
				   					  		 '$e',
				   					  		 '$f',
				   					  		 '$g',
				   					  		 '$h',
				   					  		 '$i',
				   					  		 '$j',
				   					  		 '$k',
				   					  		 '$l',
				   					  		 '$m',
				   					  		 '$n',
				   					  		 '$a',
				   					  		 '$o'
				   					  		 )";

		mysqli_query($db,$query);
		header('location: Reg_non_member.php');
	}


?>