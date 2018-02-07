<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
include ('php/session.php');
include ('php/config.php');

if($_SESSION["type"]!="superuser") {
  header("location:index.php");
}
<<<<<<< HEAD

if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['announcement']))
{$booya=$_POST['announcement'];
  
$result = $mysqli->query("UPDATE announcement SET announce = '.$booya.'");
//"INSERT INTO announcement (announce) VALUES ('.$booya.')"
if($result)
{
  echo'Announcement Updated';
}
else
{
  echo 'SQL Error!';
}
}
=======
>>>>>>> 4ce82d73039e4591901f3ba6c39a7470ee7ab727
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SCIF</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
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
      <li><a href="registration.php">Registration Requests</a></li>

        <?php
        if($_SESSION['type']=="superuser"){
            echo '
            <li><a href="analysis.php">Analysis</a></li>
            <li><a href="hrtemrequests.php">HRTEM Requests</a></li>
            <li><a href="ramanrequests.php">MRS Requests</a></li>
        <li><a href="xrdrequests.php">XRD Requests</a></li>
        <li><a href="bookingdata.php">View Booking Data</a></li>';
          }
          ?>
        <li><a href="logout.php">Log Out</a></li>
        </ul>
      </section>
    </nav>
    <div class="row" style="margin-top:10px;">
      <div id="myDiv"><!-- Plotly chart will be drawn inside this DIV --></div>
  <?php
  // SQL Queries for Plot generation
      $q1=$mysqli->query("SELECT DISTINCT(date_of_order) FROM orders");
      $q2=$mysqli->query("SELECT * FROM orders WHERE product_name='HRTEM'");
      $q3=$mysqli->query("SELECT * FROM orders WHERE product_name='XRD'");
      $q4=$mysqli->query("SELECT * FROM orders WHERE product_name='MRS'");
<<<<<<< HEAD

// Code for the Total Bar in Plotly

  $date1=array(); // X-Axis Array for total
=======
      
// Code for the Total Bar in Plotly

  $date1=array(); // X-Axis Array for total 
>>>>>>> 4ce82d73039e4591901f3ba6c39a7470ee7ab727
  $count1=array(); // Y-Axis Array for total
  $i;
  $i1=0;
  while($result1=$q1->fetch_object())
  {
  $date1[$i1]=$result1->date_of_order;
  $i1++;
  }

  for($i=0;$i<count($date1);$i++)
  {
    $q=$mysqli->query("SELECT COUNT(*) AS total FROM orders WHERE date_of_order='$date1[$i]'");
    $q_result=$q->fetch_object();
    $count1[$i]=$q_result->total;
  }

  // echo 'Total Info:<br>';
<<<<<<< HEAD
  // for($i=0;$i<count($date1);$i++)
=======
  // for($i=0;$i<count($date1);$i++) 
>>>>>>> 4ce82d73039e4591901f3ba6c39a7470ee7ab727
  // {
  //   echo $date1[$i], '<br>';
  //   echo $count1[$i], '<br>';
  // }
// END OF CODE FOR Total
<<<<<<< HEAD

=======
  
>>>>>>> 4ce82d73039e4591901f3ba6c39a7470ee7ab727
// Code for the HRTEM Bar in Plotly

  $date2=array();
  $count2=array();

$i2=0;
while($result2=$q2->fetch_object())
{
  $date2[$i2]=$result2->date_of_order;
  $i2++;
}

for($i=0;$i<count($date2);$i++)
{
  $q=$mysqli->query("SELECT COUNT(*) AS total FROM orders WHERE product_name='HRTEM' AND date_of_order='$date2[$i]'");
  $q_result=$q->fetch_object();
  $count2[$i]=$q_result->total;
}

// END OF CODE FOR HRTEM

// Code for the XRD Bar in Plotly

$date3=array();
$count3=array();
$i3=0;
while($result3=$q3->fetch_object())
{
$date3[$i3]=$result3->date_of_order;
$i3++;
}

for($i=0;$i<count($date3);$i++)
{
  $q=$mysqli->query("SELECT COUNT(*) AS total FROM orders WHERE product_name='XRD' AND date_of_order='$date3[$i]'");
  $q_result=$q->fetch_object();
  $count3[$i]=$q_result->total;
}

  // END OF CODE FOR XRD



// Code for the MRS Bar in Plotly

$date4=array();
$count4=array();
$i4=0;
while($result4=$q4->fetch_object()){
$date4[$i4]=$result4->date_of_order;
$count4[$i4]=1;
$i4++;}

for($i=0;$i<count($date4);$i++)
{
  $q=$mysqli->query("SELECT COUNT(*) AS total FROM orders WHERE product_name='MRS' AND date_of_order='$date4[$i]'");
  $q_result=$q->fetch_object();
  $count4[$i]=$q_result->total;
}

// END OF CODE FOR MRS

?>


<script type="text/javascript" language="javascript">
    var x1 = <?php echo json_encode($date1); ?>;
    var y1 = <?php echo json_encode($count1); ?>;

    var x2 = <?php echo json_encode($date2); ?>;
    var y2 = <?php echo json_encode($count2); ?>;

    var x3 = <?php echo json_encode($date3); ?>;
    var y3 = <?php echo json_encode($count3); ?>;

    var x4 = <?php echo json_encode($date4); ?>;
    var y4 = <?php echo json_encode($count4); ?>;
</script>

<script>
  var trace1 = {
  x: x3,
  y: y3,
  mode: 'lines',
  type: 'bar',
  name: 'XRD',
  line: {
    dash: 'XRD',
    width: 4
  }
};

var trace2 = {
  x: x4,
  y: y4,
  mode: 'lines',
  type: 'bar',
  name: 'MRS',
  line: {
    dash: 'MRS',
    width: 4
  }
};

var trace3 = {
  x: x2,
  y: y2,
  mode: 'lines',
  type: 'bar',
  name: 'HRTEM',
  line: {
    dash: 'HRTEM',
    width: 4
  }
};

var trace4 = {
  x: x1,
  y: y1,
  mode: 'lines',
  type: 'bar',
  name: 'Total',
  line: {
    dash: 'Total',
    width: 4
  }
};

var data = [trace1, trace2, trace3, trace4];

var layout = {
  title: 'Analysis',
   xaxis: {
    title: 'Dates',
    titlefont: {
      family: 'Courier New, monospace',
      size: 18,
      color: '#7f7f7f'
    }
    },
    yaxis: {
    title: 'No of Bookings',
    titlefont: {
      family: 'Courier New, monospace',
      size: 18,
      color: '#7f7f7f'
    }
    },
  legend: {
    y: 1,
    traceorder: 'reversed',
    font: {
      size: 16
    },
    yref: 'paper'
  }
};

Plotly.newPlot('myDiv', data, layout);
  </script>
    </div>
<<<<<<< HEAD
    <div class="row">
      <form action="analysis.php" id="form1" method=POST>
      <input type="text" name="announcement"><br>
      <form>

<button type="submit" form="form1" value="Submit">Make Announcement</button>
    </div>
=======
>>>>>>> 4ce82d73039e4591901f3ba6c39a7470ee7ab727
  </body>
</html>
