<?php  

 
    $user = 'root';
    $pass = '';
    $dbnm = 'nyvcems_db';
    
    try 
    {
        $dbh = new PDO('mysql:host=localhost;dbname='.$dbnm, $user, $pass);
    } 
    catch (PDOException $e) 
    {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
    
    $stmt = $dbh->prepare("INSERT INTO ems_t_attendance(ta_date_attended, ta_name, ta_age, ta_gender, ta_contact_no, ta_sdg_id, ta_event_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $date);
    $stmt->bindParam(2, $name);
    $stmt->bindParam(3, $age);
    $stmt->bindParam(4, $gender);
    $stmt->bindParam(5, $contactno);
    $stmt->bindParam(6, $sdg);
    $stmt->bindParam(7, $id);

    
    $event = $_POST['btn_addAttendee']; 
    
    $arr = $_POST; 
    for($i = 0; $i <= count($arr['name'])-1;$i++)
    {
        $name = $arr['name'][$i];
        $date = $arr['date'][$i];
        $age = $arr['age'][$i];
        $gender = $arr['gender'][$i];
        $contactno = $arr['contactno'][$i];
        $sdg = $arr['sdg'][$i];
        $id = $event;
        
        
        $stmt->execute();

    }

     header('Location: attendance.php');
?>