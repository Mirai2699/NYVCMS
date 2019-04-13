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
    
    $stmt = $dbh->prepare("INSERT INTO ems_r_logistics(rl_item_name, rl_quantity, rl_date_received, rl_event_id, rl_sponsor_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $item);
    $stmt->bindParam(2, $quantity);
    $stmt->bindParam(3, $date);
    $stmt->bindParam(4, $id);
    $stmt->bindParam(5, $sponsor);

    
    $event = $_POST['btn_addItem']; 
    
    $arr = $_POST; 
    for($i = 0; $i <= count($arr['item'])-1;$i++)
    {
        $item = $arr['item'][$i];
        $quantity = $arr['quantity'][$i];
        $date = $arr['date'][$i];
        $id = $event;
        $sponsor = $arr['sponsor'][$i];
        
        
        $stmt->execute();

    }

     header('Location: logisticsv2.php');
?>