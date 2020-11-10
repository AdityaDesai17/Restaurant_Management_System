<?php 

require_once "pdo.php";
$selectedPayType = $_POST["selectedPayType"];
$selectedOrderType = $_POST["selectedOrderType"];
$itemName = $_POST["itemCart"];
$itemCount = $_POST["itemNo"];
$finalTotal = $_POST["finalTotal"];
echo($finalTotal);
$cid = 5 ;
$count = count($itemName);
 $stmt = $pdo->prepare('INSERT INTO orders
        ( order_type, customer_id, item_count)
        VALUES ( :ot, :cid, :itmct)');
        $stmt->execute(array(
        ':ot' =>$selectedOrderType,
        ':cid' => $cid,
        ':itmct' => $count,
       )
        );
        $orders_id = $pdo->lastInsertId();
        //echo("Last inserted order ".$orders_id);

for ($i=0; $i <$count ; $i++) { 
    //echo($itemName[$i]);
    $stmt = $GLOBALS['pdo']->prepare("SELECT item_id ,item_price FROM item where item_name = ?");
    $stmt->execute([$itemName[$i]]);
    $item = $stmt->fetch();
    $itemPrice = $item['item_price']; 
    $itemId = $item['item_id'];
    $itemQuantity = $itemCount[$i];

    $stmt1 = $pdo->prepare('INSERT INTO orders_item
        ( orders_id, item_id, quantity, price)
        VALUES ( :orderId, :itemId, :quan, :pri)');
    $stmt1->execute(array(
        ':orderId' =>$orders_id,
        ':itemId' => $itemId,
        ':quan' => $itemQuantity,
        ':pri' => $itemPrice,
       )
        );
}

$stmt1 = $pdo->prepare('INSERT INTO bill
        ( orders_id, customer_id, bill_amount, payment_method)
        VALUES ( :orderId, :custId, :billAmt, :payMeth)');
    $stmt1->execute(array(
        ':orderId' =>$orders_id,
        ':custId' => $cid,
        ':billAmt' => $finalTotal,
        ':payMeth' => $selectedPayType,
       )
        );



//echo("from checkout.php");
?>