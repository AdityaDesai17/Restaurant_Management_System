// @ts-nocheck
console.log("running from cart.js");

function reload() {
  $(".test").empty();
  $(".test").html(
    '<h3 class="text-center">Your Order</h3>\
<div class="row py-3 text-center">\
<div class="col-4">\
  <h3>Item</h3>\
</div>\
<div class="col-4">\
  <h3>Quantity</h3>\
</div>\
<div class="col-4">\
  <h3>Cost</h3>\
</div>\
</div>'
  );
  var cost1;
  var cart = [];
  for (var i = 0; i < localStorage.length; i++) {
    console.log(localStorage.key(i));

    $(".test").append(
      '<div class="row py-3 text-center">\
    <div class="col-4">\
      <p>' +
        localStorage.key(i) +
        '</p>\
    </div>\
    <div class="col-4">\
      <input type="hidden" name="itemName" value="' +
        localStorage.key(i) +
        '">\
      <button class="btn" onclick="minus($(this).parent())" >-</button>\
      <input type="text"  class="btn" id="count' +
        i +
        '" size="1" value="' +
        localStorage.getItem(localStorage.key(i)) +
        '" disabled>\
      <button class="btn" onclick="plus($(this).parent())" >+</button>\
    </div>\
    <div class="col-4">\
      <p id="cost' +
        i +
        '" ></p>\
    </div>\
    </div>'
    );
    $.ajaxSetup({ async: false });
    $.post(
      "test2.php",
      {
        itemName: localStorage.key(i),
      },
      function (data) {
        cost = Number(data);
        cost1 = i;
        //console.log(cost1);
        //console.log("Final Cost " + cost);
        finalcost = localStorage.getItem(localStorage.key(cost1)) * cost;
        // console.log(finalcost);
        document.getElementById("cost" + cost1).innerHTML = finalcost;
        cart.push(finalcost);
        console.log(cart);
        var sum = 0;
        for (var x = 0; x < cart.length; x++) {
          sum = sum + cart[x];
        }
        var tot = "Pay Rs: " + sum;
        //console.log(tot);
        var costBtn = document.getElementById("TotalCost");
        costBtn.style.display = "inline-block";
        document.getElementById("TotalCost").innerHTML = tot;
      }
    );
  }
}

function plus(clicked) {
  eleid = clicked;
  parenteleid = eleid.parent();
  item = $(parenteleid).find("input:hidden").val();
  console.log(item);
  count = $(eleid).find("input:text").val();
  if (count < 9) {
    count++;
    localStorage.setItem(item, count);
    $(eleid).find("input:text").val(count);
    reload();
  }
}

function minus(clicked) {
  eleid = clicked;
  parenteleid = eleid.parent();
  item = $(parenteleid).find("input:hidden").val();
  console.log(item);
  count = $(eleid).find("input:text").val();

  if (count > 1) {
    count--;
    localStorage.setItem(item, count);
    $(eleid).find("input:text").val(count);
    reload();
  } else {
    localStorage.removeItem(item);
    reload();
  }
}

function clearAll() {
  localStorage.clear();
  var costBtn = document.getElementById("TotalCost");
  costBtn.style.display = "none";
  reload();
}

$(document).ready(function () {
  if (localStorage.length > 0) {
    console.log(" Cart is Available");
    var costBtn = document.getElementById("TotalCost");
    costBtn.style.display = "inline-block";
    $(".test").empty();
    $(".test").html(
      '<h3 class="text-center">Your Order</h3>\
<div class="row py-3 text-center">\
<div class="col-4">\
  <h3>Item</h3>\
</div>\
<div class="col-4">\
  <h3>Quantity</h3>\
</div>\
<div class="col-4">\
  <h3>Cost</h3>\
</div>\
</div>'
    );
    reload();
  } else {
    console.log(" Cart is empty");
  }
});
