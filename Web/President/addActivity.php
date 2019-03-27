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
    
    $stmt = $dbh->prepare("INSERT INTO ems_r_activity(ra_activity_name, ra_activity_description, ra_activity_starttime, ra_event_id) VALUES (?, ?, ?, ?)");
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $desc);
    $stmt->bindParam(3, $time);
    $stmt->bindParam(4, $event);

    
    $event = $_POST['addAct']; 
    
    $arr = $_POST; 
    for($i = 0; $i <= count($arr['name'])-1;$i++)
    {
        $name = $arr['name'][$i];
        $desc = $arr['desc'][$i];
        $time = $arr['time'][$i];
        $id = $event;
        
        $stmt->execute();

    }

     header('Location: event-setup.php');
?>