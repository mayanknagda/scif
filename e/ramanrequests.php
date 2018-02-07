<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
include ('php/session.php');
include ('php/config.php');

if(($_SESSION["type"]!="superuser") && ($_SESSION["type"]!="ramanadmin") ) {
  header("location:index.php");
}

if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['approve']))
{$booya=$_POST['approve'];
$result = $mysqli->query("UPDATE orders SET status=1 WHERE order_id=$booya");
if($result)
{
  echo'Request Accepted';
}
else
{
  echo 'SQL Error!';
}
}

if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['reject']))
{$booya=$_POST['reject'];
$result = $mysqli->query("DELETE FROM orders WHERE order_id=$booya");
$del=$mysqli->query("DELETE FROM mrs_order_details WHERE order_id=$booya");
if($result && $del)
{
 echo 'Request Rejected';
}
else
{
  echo 'SQL Error!';
}
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
      <?php
        if($_SESSION['type']=="superuser"){
            echo '<li><a href="registration.php">Registration Requests</a></li>
            <li><a href="analysis.php">Analysis</a></li>
            <li><a href="hrtemrequests.php">HRTEM Requests</a></li>';
          }
          ?>
        <li><a href="ramanrequests.php">MRS Requests</a></li>
        <?php
        if($_SESSION['type']=="superuser"){
            echo '<li><a href="xrdrequests.php">XRD Requests</a></li>
        <li><a href="bookingdata.php">View Booking Data</a></li>';
          }
          ?>
        <li><a href="logout.php">Log Out</a></li>
        </ul>
      </section>
    </nav>
    <div class="row" style="margin-top:10px;">
      <div>
        <?php
        $name="MRS";
          $result = $mysqli->query("SELECT * FROM users cross join orders WHERE user_id=id AND status=0 AND product_name='$name'");
          if($result) {

            while($obj = $result->fetch_object()) {
              $uid=$obj->order_id;
              $lq=$mysqli->query("SELECT * FROM mrs_order_details WHERE order_id=$uid");
              $lq_result=$lq->fetch_object();

            echo 'Order Details:';
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
            echo '<form action ="ramanrequests.php" method=POST>
            <button type=submit name="approve" value='.$uid.' style="float:right;">Approve</button>
            </form>';
            echo '<form action="ramanrequests.php" method=POST>
            <button type=submit  name="reject" value='.$uid.' style="float:right;">Reject</button>
            </form>';
            echo '</td>';

            echo '</tr>';
            echo '</table>';

            echo '<table>';
            echo '<tr>';
            echo '<th>Nature of Sample</th>';
            echo '<th>Wavelength</th>';
            echo '<th>Wavelength Justification</th>';
            echo '<th>Scan range From</th>';
            echo '<th>Scan Range To</th>';
            echo '<th>Details</th>';
            echo '</tr>';
            echo '<td>'.$lq_result->nature_of_sample.'</td>';
            echo '<td>'.$lq_result->wavelength.'</td>';
            echo '<td>'.$lq_result->wavelength_justi.'</td>';
            echo '<td>'.$lq_result->scan_range_from.'</td>';
            echo '<td>'.$lq_result->scan_range_to.'</td>';
            echo '<td>'.$lq_result->details.'</td>';
            echo '</tr>';
            echo '</table>';


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
