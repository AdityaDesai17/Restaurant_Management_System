// @ts-nocheck
console.log("From menu.js");

function add(clicked) {
  eleid = clicked;
  parenteleid = eleid.parent();
  $(eleid).empty();
  $(eleid).append(
    '<input type="button"  class="btn" value="-" id="moins" onclick="minus($(this).parent())">\
      <input type="text"  class="btn" size="1" value="1" >\
      <input type="button"   class="btn" value="+" id="plus" onclick="plus($(this).parent())">\
      '
  );
  item = $(parenteleid).find("h3").text();
  console.log(item);
  localStorage.setItem(item, 1);
}

function plus(clicked) {
  eleid = clicked;
  parenteleid = eleid.parent();
  item = $(parenteleid).find("h3").text();
  count = $(eleid).find("input:text").val();
  if (count < 9) {
    count++;
    localStorage.setItem(item, count);
    $(eleid).find("input:text").val(count);
  }
}

function minus(clicked) {
  eleid = clicked;
  parenteleid = eleid.parent();
  item = $(parenteleid).find("h3").text();
  count = $(eleid).find("input:text").val();

  if (count > 1) {
    count--;
    localStorage.setItem(item, count);
    $(eleid).find("input:text").val(count);
  } else {
    localStorage.removeItem(item);
    $(eleid).empty();
    $(eleid).append(
      '<input type="button" class="btn" value="  Order  " onclick="add($(this).parent())" >'
    );
  }
}

for (var i = 0; i < localStorage.length; i++) {
  console.log(localStorage.key(i));
}
