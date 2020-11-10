<?php 
include "pdo.php";
include "utils.php";
?>

<!DOCTYPE html>
<html lang="en">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
            <a href="reservation.php" class="nav-link">RESERVATION</a>
          </li>
          <li class="nav-item">
            <a href="covid19.html" class="nav-link">SAFETY MEASURES</a>
          </li>
          <li class="nav-item">
            <a href="cart.html" class="nav-link"> CART <span></span> </a>
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
          <h1 class="display-3">Menu</h1>
        </div>
      </div>
    </section>
    <!-- Cuisine List -->
    <section>
      <div class="container">
        <div class="menu-list row text-center pt-3">
          <div class="col-12 col-md-2">
            <h3><a href="#american">American</a></h3>
          </div>
          <div class="col-12 col-md-2">
            <h3><a href="#chinese">Chinese</a></h3>
          </div>
          <div class="col-12 col-md-2">
            <h3><a href="#indian">Indian</a></h3>
          </div>
          <div class="col-12 col-md-2">
            <h3><a href="#italian">Italian</a></h3>
          </div>
          <div class="col-12 col-md-2">
            <h3><a href="#korean">Korean</a></h3>
          </div>
          <div class="col-12 col-md-2">
            <h3><a href="#mexican">Mexican</a></h3>
          </div>
        </div>
      </div>
    </section>
    <!-- Menu -->
    <section id="menu" class="container">
      <!-- Introductory Menu-->
      <div id="intro-items">
        <div class="menu-list text-center py-5">
          <h3>Brunch</h3>
        </div>
        
        <?php 
        menuItems('Brunch');
        ?> 
        
      </div>
      <!-- American Cuisine-->
      <div id="american">
        <div class="menu-list text-center py-5">
          <h3>American</h3>
        </div>
       
        <?php 
        menuItems('American');
        ?> 
      </div>
      <!-- Mexican Cuisine-->
      <div id="mexican">
        <div class="menu-list text-center py-5">
          <h3>Mexican</h3>
        </div>
        
        <?php 
        menuItems('Mexican');
        ?> 
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
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
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
    <script src="menu.js"></script>
  </body>
</html>
