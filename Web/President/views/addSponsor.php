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
    
    $stmt = $dbh->prepare("INSERT INTO ems_r_sponsorship(rss_sponsor_id, rss_event_id, rss_amount, rss_received_date) VALUES (?, ?, ?, ?)");
    $stmt->bindParam(1, $sponsor);
    $stmt->bindParam(2, $id);
    $stmt->bindParam(3, $amount);
    $stmt->bindParam(4, $date);

    
    $event = $_POST['addSpons']; 
    
    $arr = $_POST; 
    for($i = 0; $i <= count($arr['sponsor'])-1;$i++)
    {
        $sponsor = $arr['sponsor'][$i];
        $amount = $arr['amount'][$i];
        $id = $event;
        $date = $arr['date'][$i];
        
        $stmt->execute();

    }

     header('Location: event-setup.php');
?>