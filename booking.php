<?php 

require_once "pdo.php";
$cid = $_POST['cid'];
$selectedTime = $_POST['selectedTime'];
$selectedDate = $_POST['selectedDate'];
$currentDate = $_POST['currentDate'];
$currentTime = $_POST['currentTime'];
$guestCount = $_POST['guestCount'];
if (strcmp($selectedDate, $currentDate) === 0) { 
    //echo 'Both strings are equal'; 
   
    $datetime1 = new DateTime($selectedDate.$selectedTime);
    $datetime2 = new DateTime($currentDate.$currentTime);
    if ($datetime1 < $datetime2) {
        echo 'Selected Time is not available. Check for different time slot';
        exit();
    }
} 

    //echo 'Both strings are not equal'; 
    $stmt = $pdo->prepare("SELECT SUM(member_count) FROM reservations WHERE arrival_time = ? AND date = ?");
    $stmt->bindParam(1, $selectedTime, PDO::PARAM_STR);
    $stmt->bindParam(2, $selectedDate, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->fetch();
    if(($count[0] + $guestCount > 20)){
        echo("Table for " .$guestCount. " is not available at ". $selectedTime . ". Please select a different time slot.");
        exit();
    }
    
    $stmt = $pdo->prepare(' INSERT into reservations ( customer_id ,member_count ,arrival_time ,date) VALUES ( :cid ,:memCount ,:arrTime ,:date )');
    $stmt->execute(array(':cid'=> $cid ,
                        ':memCount' => $guestCount,
                        ':arrTime' => $selectedTime,
                        ':date' => $selectedDate,
                        ));

    echo("Your reservation is confirmed.")



?>