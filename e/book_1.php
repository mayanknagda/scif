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

    <div class="row" style="margin-top:10px;">
      <div class="large-12">
        <p><h3>Book Slot</h3></p>
        <?php
          $pid =$_POST["instrument"];
          $wdate= $_POST["date"];
          $date = date('Y-m-d', strtotime($wdate)); //date format do not change! This will break SQL if chnaged. Took me hours to get this right. please i beg you.

         
          $result = $mysqli->query("SELECT * FROM products WHERE id=$pid");
          $row=$result->fetch_object();
            $total = 0;
            echo '<form action="book_2.php" method="POST">';
            echo '<table>';
            echo '<tr>';
            echo '<th>Instrument Selected</th>';
            echo '<th>Cost</th>';
            echo '<th>Slots Available on '.$date.'</th>';
            echo '</tr>';
            echo '<tr>';
                  echo '<td colspan="1" align="left">';
                  echo $row->product_name;
                  echo'</td>';
                  echo '<td colspan="1" align="left">';
                  echo $currency.$row->price;
                  echo'</td>';

                  echo '<td colspan="1" align="left">';
                  // Finding which table to use by reading the instrument id.
                 if($pid==1){$table_name="slot_scale";}
                 elseif ($pid==2){$table_name="slot_vernier_caliper";}
                 else {$table_name="slot_screw_gauge";}

                 // Query to store all the slot data.
                 $q=$mysqli->query("SELECT slot_7,slot_8,slot_9,slot_10,slot_11,slot_12,slot_13,slot_14,slot_15,slot_16,slot_17,slot_18,slot_19,slot_20,slot_21,slot_22 FROM $table_name WHERE slot_date='$date'");

                 // Loop to print only thoese slots that are available on that day.
                 if($q)
                 {
                  $i=1;
                  $slots=$q->fetch_object();
                  echo '<select name="slot">';
                  if($slots->slot_7!=0) {echo' <option value="'.'1'.'">'."7AM - 8AM".'</option>';$i++;}
                  if ($slots->slot_8!=0) {echo' <option value="'.'2'.'">'."8AM - 9AM".'</option>';$i++;}
                  if ($slots->slot_9!=0) {echo' <option value="'.'3'.'">'."9AM - 10AM".'</option>';$i++;}
                  if ($slots->slot_10!=0) {echo' <option value="'.'4'.'">'."10AM - 11AM".'</option>';$i++;}
                  if ($slots->slot_11!=0) {echo' <option value="'.'5'.'">'."11AM - 12Noon".'</option>';$i++;}
                  if ($slots->slot_12!=0) {echo' <option value="'.'6'.'">'."12Noon - 1PM".'</option>';$i++;}
                  if ($slots->slot_13!=0) {echo' <option value="'.'7'.'">'."1PM - 2PM".'</option>';$i++;}
                  if ($slots->slot_14!=0) {echo' <option value="'.'8'.'">'."2PM - 3PM".'</option>';$i++;}
                  if ($slots->slot_15!=0) {echo' <option value="'.'9'.'">'."3PM - 4PM".'</option>';$i++;}
                  if ($slots->slot_16!=0) {echo' <option value="'.'10'.'">'."4PM - 5PM".'</option>';$i++;}
                  if ($slots->slot_17!=0) {echo' <option value="'.'11'.'">'."5PM - 6PM".'</option>';$i++;}
                  if ($slots->slot_18!=0) {echo' <option value="'.'12'.'">'."6PM - 7PM".'</option>';$i++;}
                  if ($slots->slot_19!=0) {echo' <option value="'.'13'.'">'."7PM - 8PM".'</option>';$i++;}
                  if ($slots->slot_20!=0) {echo' <option value="'.'14'.'">'."8PM - 9PM".'</option>';$i++;}
                  if ($slots->slot_21!=0) {echo' <option value="'.'15'.'">'."9PM - 10PM".'</option>';$i++;}
                  if ($slots->slot_22!=0) {echo' <option value="'.'16'.'">'."10PM - 11PM".'</option>';$i++;}
                  echo '</select>';
                 }
                 else
                 {
                  echo "Error in SQL";
                 }
                  echo'</td>';
                  echo "</tr>";
                  echo "<tr>";
                  echo "<td>";
                  echo "<td>";
                  echo "<td>";
                  echo '<button type=submit style="float:right;">Book</button>';
                  echo "</td>";
                  echo "</td>";
                  echo "</td>";
                  echo "</tr>";
                  echo "</table>";
                  echo "</form>";
                  // Passing varibales needed in the next page explitly
                   $_SESSION['date']=$date; // Passing the order_date.
                   $_SESSION['instrument']=$pid; // Passing the instrument id. 
          ?>
         
          
   </div>
    </div>
  
      
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