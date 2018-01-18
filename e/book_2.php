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
  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> 
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
  <script type="text/javascript">
    
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

<!--REAL CODE IS FROM HERE ON!-->

    <!--Checking if already booked a slot today! -->
    <?php
    $order_limit_reached=0; // Limit at max of 1 order per day.
    $un=$_SESSION["username"];
    $q1=$mysqli->query("SELECT id, fname, lname FROM users WHERE email='$un'");
    $q1_result=$q1->fetch_object();

    $id=$q1_result->id; // store id from query.
    $first_name=$q1_result->fname; //store first name from query.
    $last_name=$q1_result->lname; // store ladt name from query.
    $order_date=$_SESSION["date"]; // store the order_date from SESSIONS

    // RUN QUERY ON DATABASE TO SEE IF USER HAS PLACED AN ORDER.
    $result=$mysqli->query("SELECT * FROM orders WHERE (user_id=$id) AND (date_of_order='$order_date')");

    if($result->num_rows) // IF YES HE STOP HIM. 
    {
      echo "<br><br>";
      echo "<h3 align='center'>Sorry!</h3>";
      echo "<br>";
      echo "<p align='center'>You have already placed an order. Order Limit is reached as only 1 order per person per day is allowed.";
      echo "<div class='mybutton'>";
      echo '<p><a href="index.php"><input type="submit" value="Home" style="float:middle; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
      echo '</div>';
      $order_limit_reached=1;
    }
    else // IF NO PROCEED.
    {
      $disp_order_details=0;
    }


    if($order_limit_reached==0) // Print the Order Details only if user has not made more than 1 order.
    {

        echo ' <div class="myown" style="margin-top:10px;" width: 400px> ';
        echo  ' <div class="myown" width: 400px> ';
        echo ' <p><h3>Booking Details</h3></p> ';


        //Code to display the slot section of the table.
        $slot=$_POST["slot"];
        $postfix; 
        $prefix;
        if($slot>=1 and $slot<5)
        {
        $slot_start_time=$slot+6;
        $slot_end_time=$slot+7;
        $postfix=$prefix="AM";
        }
        else if($slot==5)
        {
        $slot_start_time=$slot+6;
        $slot_end_time=$slot+7;
        $prefix="AM";
        $postfix="Noon";
        }

        else if ($slot==6) 
        {
        $slot_start_time=$slot+6;
        $slot_end_time=$slot-5;
        $prefix="Noon";
        $postfix="PM";
        }
        else if($slot>6 and $slot<=16)
        {
        $slot_start_time=$slot-6;
        $slot_end_time=$slot-5;
        $postfix=$prefix="PM";
        }
        else 
        {
          $postfix=$prefix="Invalid slot selection please try again!";
        }
        // End of code to display the slot section of the table.


        //Code to display the instrument name and price section in the table
        $pid=$_SESSION['instrument'];
        $q=$mysqli->query("SELECT product_code, product_name, price FROM products WHERE id=$pid");
        $result=$q->fetch_object();
        $price=$result->price;
        $product_name=$result->product_name; // Product Name
        $product_code=$result->product_code; // Product Code
        // End of code to display the instrument name and price section in the table
        

        // Pushing data into the database.
        $conf=0;
        $in_id=(int)$id;
        echo $order_date;
        $od = date('Y-m-d', strtotime($order_date));
        $push=$mysqli->query("INSERT INTO orders ( user_id, date_of_order, product_code, product_name) VALUES(($in_id, '$od', '$product_code', '$product_name')");
        if($push)
        {
          $conf=1;
        }
        else
        {
          $conf=0;
        }


        // Blocking the Slot

        // CODE STILL TO BE WRITTEN!

       // End of Push
        echo "<br>";
        echo $conf;
        echo gettype($od);
        echo gettype($product_name);
        echo gettype($product_code);
        echo gettype($in_id);
        echo '<table cellpadding="2" cellspacing="2" width: 400px>';
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Email</th>";
        echo "<th>Instrument Name</th>";
        echo "<th>Price</th>";
        echo "<th>Slot</th>";
        echo "<th>Booking Status</th>";
        echo "<tr>";
        echo '<td colspan="1" align="left">';
        echo $first_name.' '.$last_name;
        echo '<td colspan="1" align="left">';
        echo $un;
        echo '<td colspan="1" align="left">';
        echo $product_name;
        echo '<td colspan="1" align="left">';
        echo $price;
        echo "<td colspan='1' align='left'>$slot_start_time $prefix - $slot_end_time $postfix</td>";
        echo '<td colspan="1" align="left">Confimed</td>';
        echo '</tr>';



      }
        ?>
      </div>
    </div>
