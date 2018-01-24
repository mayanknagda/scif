<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} for php 5.4 and above

if(session_id() == '' || !isset($_SESSION)){session_start();}


?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SCIF</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
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
        <li><a href="contact.php">Contact</a></li>
          <?php

          if(isset($_SESSION['username'])){
            echo '<li><a href="account.php">My Account</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>




    <div class="row" style="margin-top:30px;">
      <div class="small-12">
        <p>State-of-the-art facilities available for users.<br>
        <table style="width:100%">
  <tr>
    <th>Sr. No</th>
    <th>Name of the Instrument</th> 
    <th>Make/Model</th>
    <th>Available options</th>
  </tr>
  <tr>
    <td>1</td>
    <td>Hi-Resolution Transmission Electron Microscope (HRTEM)</td> 
    <td>JEOL, Japan</td>
    <td>Imaging, SAED, EDAX</td>
  </tr>
  <tr>
    <td>2</td>
    <td>Micro-Raman Spectrometer</td> 
    <td>HORIBA France, LABRAM HR Evolution</td>
    <td>Raman spectroscopy and Imaging<br>
Lasers: <br>
785 nm, 633 nm, 532 nm
and 325 nm
</td>
  </tr>
  <tr>
    <td>3</td>
    <td>X-Ray Diffractometer (XRD)</td> 
    <td>BRUKER</td>
    <td>Powder and Thin film geometry.

<br>Small angle X-ray scattering
</td>
  </tr>
</table>
        </p>

        <footer>
           <p style="text-align:center; font-size:0.8em;">&copy; SCIF</p>
        </footer>

      </div>
    </div>







    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
