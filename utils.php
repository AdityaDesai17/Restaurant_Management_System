<?php 
include "pdo.php";
function menuItems($cuisineType){
  $brunchCount = 0;
  $stmt = $GLOBALS['pdo']->prepare("SELECT item_name, item_desc , image FROM item where cuisine = ?");
  $stmt->execute([$cuisineType]);
  $count = $stmt->rowCount();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
    if( $brunchCount == 0){
      echo('<div class="row">');
      }
    echo('<div class="col-12 col-md-6 mb-3">');
      echo('<div class="row justify-content-center align-items-center">');
        echo('<div class="col-6">');
          echo('<img src=images/'.htmlentities($row['image']).' alt="" class="img-fluid" />');
        echo('</div>');
        echo('<div class="col-6 py-3">');
                    // <!-- Dish Name and Description -->
          echo('<h3>'.htmlentities($row['item_name']).'</h3>');
          echo('<p class="lead">'.htmlentities($row['item_desc']).'</p>');
            echo('<div>');
              echo('<button class="btn" onclick="add($(this).parent())">
                        Order
                      </button>');
            echo('</div>');
        echo('</div>');
      echo('</div>');
    echo('</div>');
    
    $brunchCount++;
    if( $brunchCount == 2){
      echo('</div>');
      $brunchCount = 0;
      } 
  }
  if($count % 2 == 1){ 
    echo('</div>');
    } 
}

?>