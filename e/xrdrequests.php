<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
include ('php/session.php');
include ('php/config.php');
/*if(!isset($_SESSION["username"])) {
  header("location:index.php");
}

if($_SESSION["type"]!="superuser") {
  header("location:index.php");
}*/

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
      <?php
        if($_SESSION['type']=="superuser"){
            echo '<li><a href="registration.php">Registration Requests</a></li>
            <li><a href="hrtemrequests.php">HRTEM Requests</a></li>
            <li><a href="ramanrequests.php">MRS Requests</a></li>';
          }
          ?>
        <li><a href="xrdrequests.php">XRD Requests</a></li>
         <?php
        if($_SESSION['type']=="superuser"){
            echo '<li><a href="bookingdata.php">View Booking Data</a></li>';
          }
          ?>
        <li><a href="logout.php">Log Out</a></li>
        </ul>
      </section>
    </nav>
    <div class="row" style="margin-top:10px;">
      <div>
        <?php
        $name="XRD";
          $result = $mysqli->query("SELECT * FROM users cross join orders WHERE user_id=id AND status=0 AND product_name='$name'");
          if($result) {
            echo '<table class="absorbing-column">';
            echo '<tr>';
            echo '<th>Booking ID</th>';
            echo '<th>Name</th>';
            echo '<th>Institute</th>';
            echo '<th>Institute ID</th>';
            echo '<th>Phone No</th>';
            echo '<th>Email</th>';
            echo '<th>Date of Usage</th>';
            echo '<th>Slot</th>';
            echo '<th>Approval</th>';

            echo '</tr>';
            while($obj = $result->fetch_object()) {
            echo '<tr>';
            echo '<td>'.$obj->order_id.'</td>';
           echo '<td>'.$obj->fname.' '.$obj->lname.'</td>';
           echo '<td>'.$obj->institute.'</td>';
           echo '<td>'.$obj->iid.'</td>';
           echo '<td>'.$obj->phno.'</td>';
           echo '<td>'.$obj->email.'</td>';
            echo '<td>'.$obj->date_of_order.'</td>';
            echo '<td>'.$obj->slot_time.'</td>';
            echo '<td>';
            echo '<form action "approve.php">
            <button type=submit style="float:right;">Approve</button>
            </form>';
            echo '<form action "reject.php">
            <button type=submit style="float:right;">Reject</button>
            </form>';
            echo '</td>';

            echo '</tr>';
            
            }
            echo '</div>';
            echo '</div>';
          }
        ?>
      </div>
    </div>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
