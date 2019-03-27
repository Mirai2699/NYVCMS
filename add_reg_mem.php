<?php


	$db = mysqli_connect('localhost','root','','nyvcems_db');


	if(isset($_POST['addRegMem']))
	{
		
	    $a = $_POST['eventId'];
	    $c = $_POST['pType'];
		$b = $_POST['fullname'];

        /*$view_query = mysqli_query($connection,"SELECT * FROM `ems_t_individual_membership` as i left join `ems_r_individual_info` as j on i.tim_individ = j.rii_individ where i.tim_status = 'Paid' and j.rii_name = $b");
         while($row = mysqli_fetch_assoc($view_query))
        {   
             
         }*/
        $id = 1;

        $keylength = 10;
		$str = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$rand = substr(str_shuffle($str), 0, $keylength);
		$trans = $rand;

        $query = "INSERT INTO ems_t_eventreg_mem  (term_eventid,
										     term_indivmemid,
										     term_paymenttype, term_date 
										     ) 

				   					  VALUES(
				   					  		 '$a',
				   					  		 '$id',
				   					  		 '$c',
				   					  		 CURRENT_DATE
				   					  		 )";

		mysqli_query($db,$query);
        
		header('location: Reg_non_member.php');
	}


?>