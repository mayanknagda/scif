<?php
include ('php/session.php');
include ('php/config.php');

if($_SESSION["type"]!="superuser") {
  header("location:index.php");
}

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SCIF</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
    <style type="text/css">
     table {
       margin-bottom: 0px;
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
          <h1><a>SCIF Administrator</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section -->
      <ul class="right">
        <li><a href="registration.php">Registration Requests</a></li>
        <li><a href="hrtemrequests.php">HRTEM Requests</a></li>
        <li><a href="ramanrequests.php">MRS Requests</a></li>
        <li><a href="xrdrequests.php">XRD Requests</a></li>
        <li><a href="bookingdata.php">View Booking Data</a></li>
        <li><a href="logout.php">Log Out</a></li>
        </ul>
      </section>
    </nav>
    <div class="row" style="margin-top:10px;">

        <?php
          $result = $mysqli->query("SELECT * from orders,users WHERE user_id=id");
          if($result) {
            while($obj = $result->fetch_object()) {

              if($obj->product_name=='HRTEM')
              {
                $oi=$obj->order_id;
                $q1=$mysqli->query("SELECT * FROM hrtem_order_details WHERE order_id=$oi");
                $q1_result=$q1->fetch_object();
              
            echo '<br>Order Details';
            echo '<table class="absorbing-column">';
            echo '<tr>';
            echo '<th>Booking ID</th>';
            echo '<th>Name</th>';
            echo '<th>Institute</th>';
            echo '<th>Institute ID</th>';
            echo '<th>Address</th>';
            echo '<th>Phone No</th>';
            echo '<th>Email</th>';
            echo '<th>Date of Usage</th>';
            echo '<th>Slot</th>';
            echo '<th>Instrument Name</th>';
            echo '</tr>';

            echo '<tr>';
            echo '<td>'.$obj->order_id.'</td>';
            echo '<td>'.$obj->fname.' '.$obj->lname.'</td>';
            echo '<td>'.$obj->institute.'</td>';
            echo '<td>'.$obj->iid.'</td>';
            echo '<td>'.$obj->address.'</td>';
            echo '<td>'.$obj->phno.'</td>';
            echo '<td>'.$obj->email.'</td>';
            echo '<td>'.$obj->date_of_order.'</td>';
            echo '<td>'.$obj->slot_time.'</td>';
            echo '<td>'.$obj->product_name.'</td>';
            echo '</tr>';
            echo '</table>';

            echo '<table>';
            echo '<tr>';
            echo '<th>Nature of Sample</th>';
            echo '<th>Magnetic</th>';
            echo '<th>Magnetic Details</th>';
            echo '<th>Measurement</th>';
            echo '<th>Details</th>';
            echo '</tr>';

            echo '<tr>';
            echo '<td>'.$q1_result->nature_of_sample.'</td>';
            echo '<td>'.$q1_result->magnetic.'</td>';
            echo '<td>'.$q1_result->magnetic_details.'</td>';
            echo '<td>'.$q1_result->measurement.'</td>';
            echo '<td>'.$q1_result->details.'</td>';
            echo '</tr>';
            echo '</table>';
            } // IF END FOR HRTEM

            else if($obj->product_name=='MRS')
            {
              $oi=$obj->order_id;
              $q1=$mysqli->query("SELECT * FROM mrs_order_details WHERE order_id=$oi");
              $q1_result=$q1->fetch_object();

            echo '<br>Order Details';
            echo '<table class="absorbing-column">';
            echo '<tr>';
            echo '<th>Booking ID</th>';
            echo '<th>Name</th>';
            echo '<th>Institute</th>';
            echo '<th>Institute ID</th>';
            echo '<th>Address</th>';
            echo '<th>Phone No</th>';
            echo '<th>Email</th>';
            echo '<th>Date of Usage</th>';
            echo '<th>Slot</th>';
            echo '<th>Instrument Name</th>';
            echo '</tr>';

            echo '<tr>';
            echo '<td>'.$obj->order_id.'</td>';
            echo '<td>'.$obj->fname.' '.$obj->lname.'</td>';
            echo '<td>'.$obj->institute.'</td>';
            echo '<td>'.$obj->iid.'</td>';
            echo '<td>'.$obj->address.'</td>';
            echo '<td>'.$obj->phno.'</td>';
            echo '<td>'.$obj->email.'</td>';
            echo '<td>'.$obj->date_of_order.'</td>';
            echo '<td>'.$obj->slot_time.'</td>';
            echo '<td>'.$obj->product_name.'</td>';
            echo '</tr>';
            echo '</table>';

            echo '<table>';
            echo '<tr>';
            echo '<th>Nature of Sample</th>';
            echo '<th>Wavelength</th>';
            echo '<th>Wavelength Justification</th>';
            echo '<th>Scan Range From</th>';
            echo '<th>Scan Range To</th>';
            echo '<th>Details</th>';
            echo '</tr>';

            echo '<tr>';
            echo '<td>'.$q1_result->nature_of_sample.'</td>';
            echo '<td>'.$q1_result->wavelength.'</td>';
            echo '<td>'.$q1_result->wavelength_justi.'</td>';
            echo '<td>'.$q1_result->scan_range_from.'</td>';
            echo '<td>'.$q1_result->scan_range_to.'</td>';
            echo '<td>'.$q1_result->details.'</td>';
            echo '</tr>';
            echo '</table>';
            }// IF END FOR MRS

            else if($obj->product_name=='XRD')
            {
              $oi=$obj->order_id;
              $q1=$mysqli->query("SELECT * FROM xrd_order_details WHERE order_id=$oi");
              $q1_result=$q1->fetch_object();

            echo '<br>Order Details';
            echo '<table class="absorbing-column">';
            echo '<tr>';
            echo '<th>Booking ID</th>';
            echo '<th>Name</th>';
            echo '<th>Institute</th>';
            echo '<th>Institute ID</th>';
            echo '<th>Address</th>';
            echo '<th>Phone No</th>';
            echo '<th>Email</th>';
            echo '<th>Date of Usage</th>';
            echo '<th>Slot</th>';
            echo '<th>Instrument Name</th>';
            echo '</tr>';

            echo '<tr>';
            echo '<td>'.$obj->order_id.'</td>';
            echo '<td>'.$obj->fname.' '.$obj->lname.'</td>';
            echo '<td>'.$obj->institute.'</td>';
            echo '<td>'.$obj->iid.'</td>';
            echo '<td>'.$obj->address.'</td>';
            echo '<td>'.$obj->phno.'</td>';
            echo '<td>'.$obj->email.'</td>';
            echo '<td>'.$obj->date_of_order.'</td>';
            echo '<td>'.$obj->slot_time.'</td>';
            echo '<td>'.$obj->product_name.'</td>';
            echo '</tr>';
            echo '</table>';

            echo '<table>';
            echo '<tr>';
            echo '<th>Nature of Sample</th>';
            echo '<th>Scan Range From</th>';
            echo '<th>Scan Range To</th>';
            echo '<th>Details</th>';
            echo '</tr>';

            echo '<tr>';
            echo '<td>'.$q1_result->nature_of_sample.'</td>';
            echo '<td>'.$q1_result->scan_range_from.'</td>';
            echo '<td>'.$q1_result->scan_range_to.'</td>';
            echo '<td>'.$q1_result->details.'</td>';
            echo '</tr>';
            echo '</table>';
            }

            }
            echo '</div>';
            
          }
        ?>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
