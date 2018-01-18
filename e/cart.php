<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])) {
  echo '<h1>Invalid Login! Redirecting...</h1>';
  header("Refresh: 0.001; url=login.php");
}

include 'config.php';

?>

<!doctype html>
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
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
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

    <div class="row" style="margin-top:10px;">
      <div class="large-12">
        <p><h3>Book Instruments</h3></p>
        <?php

            $total = 0;
            echo '<table>';
            echo '<tr>';
            echo '<th>Instrument Name</th>';
            echo '<th>Instrument Issue Date</th>';
            echo '</tr>';
            $result = $mysqli->query("SELECT id, product_name, price FROM products");
                echo '<tr>';
                  echo '<td colspan="1" align="left"><form action="action_page1.php" method="get">';
                  echo '<select name="instrument">';
                  while($row=$result->fetch_object()){
                   echo' <option value="'.$row->id.'">'.$row->product_name.'</option>';
                  }
                  echo'</td>';
                  echo'</select>';
                 echo '<td colspan="1" align="left"><input type="text" name="date" id="datepicker"></td>';
            echo '</td>';
            echo'</tr>';
            echo'<tr>';
            echo'<td>';
            echo '<button type=submit style="float:right;">Book</button>';
            echo '</form>';
          echo '</tr>';
          echo '</table>';
          echo '</div>';
          echo '</div>';
          ?>



    <div class="row" style="margin-top:10px;">
      <div class="small-12">
        <footer style="margin-top:10px;">
           <p style="text-align:center; font-size:0.8em;clear:both;">&copy; SCIF</p>
        </footer>

      </div>
    </div>
 
<!--<p>Date: <input type="text" id="datepicker"></p>-->
 
 
</body>
</html>