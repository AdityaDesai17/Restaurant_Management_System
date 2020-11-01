<?php 
$cuisineType = $_POST['itemName'];
require_once "pdo.php";
$stmt = $GLOBALS['pdo']->prepare("SELECT item_price FROM item where item_name = ?");
$stmt->execute([$cuisineType]);
$user = $stmt->fetch();
 echo($user['item_price']); 
    
?>