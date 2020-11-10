<?php 

require_once "pdo.php";

$customerId = 5;
$custName = null;
$custMail = null;
$custPhone = null;
if(isset($customerId)){
  $stmt = $pdo->prepare(" SELECT name ,email ,phone_no FROM customer WHERE customer_id = ? ");
  $stmt->execute([$customerId]);
  $cust = $stmt->fetch();
  $custName = $cust['name'];
  $custMail = $cust['email'];
  $custPhone = $cust['phone_no'];
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Google Font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap"
      rel="stylesheet"
    />
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
      crossorigin="anonymous"
    />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css" />

    <title>La Mesa</title>
  </head>

  <body>
    <!-- Navbar -->
    <nav
      id="mainNavbar"
      class="navbar navbar-dark navbar-expand-md fixed-top py-0"
    >
      <a href="index.html" class="navbar-brand">La Mesa</a>
      <button
        class="navbar-toggler"
        data-toggle="collapse"
        data-target="#navLinks"
        aria-controls="navLinks"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="navLinks" class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="index.html" class="nav-link">HOME</a>
          </li>
          <li class="nav-item">
            <a href="about.html" class="nav-link">ABOUT</a>
          </li>
          <li class="nav-item">
            <a href="menu.php" class="nav-link">MENU</a>
          </li>
          <li class="nav-item">
            <a href="reservation.html" class="nav-link">RESERVATION</a>
          </li>
          <li class="nav-item">
            <a href="covid19.html" class="nav-link">SAFETY MEASURES</a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <section class="fluid-container px-0">
      <div
        id="sub-header"
        class="row justify-content-center align-items-center"
      >
        <div class="col-12 text-center">
          <h1 class="display-3">Reservation</h1>
        </div>
      </div>
    </section>
    <!-- Reservation Form-->
    <section>
      <div class="container" id="reservation-form">
        <form action="#">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Name</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Your Name"
                  value="<?= $custName?>"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Email</label>
                <input
                  type="email"
                  class="form-control"
                  placeholder="Your Email"
                  value = "<?=$custMail?>"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Phone</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Your Phone No"
                  value = "<?= $custPhone?>"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Date</label>
                <input
                  type="text"
                  id="datepicker-11"
                  class="form-control"
                  placeholder=""
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Time</label>
                <input
                  type="text"
                  id="timepicker"
                  class="form-control"
                  placeholder=""
                  disabled
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Guests</label>
                <input
                  id = "guestNo"
                  type="number"
                  class="form-control"
                  min="1"
                  max="8"
                  placeholder="No of Guests"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input
                  type="submit"
                  value="Book a table"
                  class="btn py-3 px-5"
                  id = "submit"
                />
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
    <!-- Footer -->
    <section id="footer">
      <div class="container">
        <div class="row py-5 pl-5 pl-md-0">
          <div class="col-10 col-md-3 mb-4 mb-md-0">
            <h3>Locations</h3>
            <ul class="list-unstyled">
              <li>City Circle</li>
              <li>Bankside</li>
              <li>Beach Rd.</li>
              <li>Bistro HQ</li>
            </ul>
          </div>
          <div class="col-10 col-md-3 mb-4 mb-md-0">
            <h3>Services</h3>
            <ul class="list-unstyled">
              <li>Dine In</li>
              <li>Takeaway</li>
              <li>Delivery</li>
            </ul>
          </div>
          <div class="col-10 col-md-3 mb-4 mb-md-0">
            <h3>Open Hours</h3>
            <ul class="list-unstyled">
              <li>Monday-Tuesday: 09.00 — 22.00</li>
              <li>Wednesday-Thursday: 09.00 — 23.00</li>
              <li>Friday: 9.00 — 00:00</li>
              <li>Saturday: 10.00 — 00:00</li>
              <li>Sunday: 10.00 — 22.00</li>
              <li>Weekend Brunch: 10.00 — 16:00</li>
            </ul>
          </div>
          <div class="col-10 col-md-3 mb-4 mb-md-0">
            <h3>Newsletter</h3>
            <!-- action (sending data) remaining-->
            <form action="">
              <div class="form-group">
                <label for="suscribersEmail">Email Address</label>
                <input
                  type="email"
                  class="form-control"
                  id="suscriberEmail"
                  placeholder="Enter email address"
                />
                <button type="submit" class="btn mt-3">Suscribe</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.5.1.js"
      integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
      crossorigin="anonymous"
    ></script>

    <script
      src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
      integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
      integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
      integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
      crossorigin="anonymous"
    ></script>
    <!-- JQuery UI -->
    <link rel="stylesheet" href="jquery-ui-1.11.4/jquery-ui.css" />
    <!-- JQuery UI Timepicker -->
    <script src="timepicker-1.3.4/jquery.timepicker.js"></script>
    <link rel="stylesheet" href="timepicker-1.3.4/jquery.timepicker.css" />

    <script>
      
      let n;
      var currentTime;
      var event = new Date();
      currentTime = event.toLocaleTimeString([], { timeStyle: "short" });
      $(function () {
        $("#datepicker-11").datepicker({ minDate: 0, maxDate: "+5D" });
      });

      $("#datepicker-11").change(function () {
        $("#timepicker").removeAttr("disabled");
      });

      $("#timepicker").timepicker({
        minTime: "10:00am",
        maxTime: "11:00pm",
        showDuration: true,
        dynamic: false,
      });

      function isEmpty(val){
        return (val === undefined || val == null || val.length <= 0) ? true : false;
      }

      $("#submit").click(function(){
        var custId ;
        custId = <?= isset($customerId) ? $customerId : null; ?>
        //keep it blank
        console.log("btn clicked");
        if(custId == null){
          alert("Customer has not logged in. Please Register/Log In")
        }
        else{
          selectedDate = $("#datepicker-11")
          .datepicker({ dateFormat: "dd,mm,yy" })
          .val();
          currentDate = $.datepicker.formatDate("mm/dd/yy", new Date());
          selectedTime = $("#timepicker").val();
          console.log("Selected date:" + selectedDate);
          console.log("Current date:" + currentDate);
          console.log("Selected Time:" + selectedTime);
          guestCount = $("#guestNo").val();
          console.log("Guest Count: "+guestCount);
          if(isEmpty(selectedDate) || isEmpty(selectedTime) || isEmpty(guestCount)){
            alert(" Fill all the fields.");
          }
          else{
            $.post("booking.php",
              {
                cid: custId,
                selectedDate: selectedDate,
                selectedTime: selectedTime,
                currentDate: currentDate,
                currentTime: currentTime,
                guestCount: guestCount
              },
              function (data) {
                alert(data);
                confirm = "Your reservation is confirmed.";
                if(data === confirm){
                window.location.replace("index.html");
                }
              }
            );
          }
        }


       
      });
    </script>
  </body>
</html>
