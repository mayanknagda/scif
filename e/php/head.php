<?php
echo '<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Book</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link rel="stylesheet" href="css/foundation.css" />
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
<style type="text/css">

  .boxed {
  border: 1px solid green ;
}
</style>
  <style type="text/css">

  table {
    table-layout: auto;
    border-collapse: collapse;
    width: 100%;
}
table td {
    border: 1px solid #ccc;
}
table .absorbing-column {
    width: 100%;
}

</style>
</head>
<body>

  <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">SRM CENTRAL INSTRUMENTATION FACILITY (SCIF) PORTAL</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section -->

      <ul class="right">
        <li><a href="about.php">About</a></li>
        <li><a href="facilities.php">Facilities</a></li>
        <li><a href="services.php">Services</a></li>
        <li><a href="products.php">Instruments</a></li>
        <li><a href="cart.php">View Bookings</a></li>
        <li><a href="orders.php">My Bookings</a></li>
        <li><a href="contact.php">Contact</a></li>'; // Echo Dump edit wisely 
    

          if(isset($_SESSION['username'])){
            echo '<li><a href="account.php">My Account</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }
          
        echo '</ul>';
      echo '</section>';
    echo'</nav>';
?>