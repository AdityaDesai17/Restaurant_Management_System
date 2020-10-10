console.log("running from cart.js");

$(document).ready(function () {
  if (localStorage.length > 0) {
    console.log(" Cart is Available");
    $(".col-12").empty();
    $(".col-12").append(
      '<h2 class="text-center">Your Order</h2>\
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
    for (var i = 0; i < localStorage.length; i++) {
      console.log(localStorage.key(i));
      $(".col-12").append(
        '<div class="row py-3 text-center">\
        <div class="col-4">\
            <p>' +
          localStorage.key(i) +
          '</p>\
        </div>\
        <div class="col-4">\
            <button class="btn">-</button>\
            <button class="btn">3</button>\
            <button class="btn">+</button>\
        </div>\
        <div class="col-4">\
            <p>Rs 270</p>\
        </div>\
    </div>'
      );
    }
  } else {
    console.log(" Cart is empty");
  }
});
