<?php
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])){
  header("location:index.php");
}
include 'php/config.php';
include 'php/head.php';
?>

    <div class="row" style="margin-top:10px;">
      <div class="large-12">
        <h3>My Bookings</h3>
        <input type="button" value="Print this page" onClick="window.print()">
        <hr>
        <?php
          $user = $_SESSION["username"];
          //
          $q1=$mysqli->query("SELECT id from users WHERE email='".$user."'");
          $result_q1=$q1->fetch_object();
          $uid=$result_q1->id;
          $result = $mysqli->query("SELECT * from orders where user_id=$uid");
          if($result->num_rows) {
            while($obj = $result->fetch_object()) {
              echo '<div class="large-6">';
              echo '<p><h4>Order ID ->'.$obj->order_id.'</h4></p>';
              $oi=$obj->order_id;
              echo '<table>';
              echo '<tr>';
              echo '<th>Product Code</th>';
              echo '<th>Product Name</th>';
              echo '<th>Date of the Order</th>';
              echo '<th>Slot Time</th>';
              // Table change as product name changes
              if($obj->product_name=='HRTEM')
              {
                $q1=$mysqli->query("SELECT * FROM hrtem_order_details WHERE order_id=$oi");
                $q1_result=$q1->fetch_object();
                echo '<th>Nature of Sample</th>';
                echo '<th>Magnetic</th>';
                echo '<th>Magnetic Details</th>';
                echo '<th>Measurement</th>';
                echo '<th>Details</th>';
                echo '<th>Status</th>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>';
                echo $obj->product_code;
                echo '</td>';
                echo '<td>';
                echo $obj->product_name;
                echo '</td>';
                echo '<td>';
                echo $obj->date_of_order;
                echo '</td>';
                echo '<td>';
                echo $obj->slot_time;
                echo '</td>';
                echo '<td>';
                echo $q1_result->nature_of_sample;
                echo '</td>';
                echo '<td>';
                echo $q1_result->magnetic;
                echo '</td>';
                echo '<td>';
                echo $q1_result->magnetic_details;
                echo '</td>';
                echo '<td>';
                echo $q1_result->measurement;
                echo '</td>';
                echo '<td>';
                echo $q1_result->details;
                echo '</td>';
                if($obj->status==0)
              {
              echo '<td>'.'Pending Admin Approval'.'</td>';
              }
              else if($obj->status==1)
              {
                 echo '<td>'.'Booking Approved'.'</td>';
              }

              }
              else if($obj->product_name=='MRS')
              {
                $q1=$mysqli->query("SELECT * FROM mrs_order_details WHERE order_id=$oi");
                $q1_result=$q1->fetch_object();
                echo '<th>Nature of Sample</th>';
                echo '<th>Wavelength</th>';
                echo '<th>Wavelength Justification</th>';
                echo '<th>Scan Range From</th>';
                echo '<th>Scan Range To</th>';
                echo '<th>Details</th>';
                echo '<th>Status</th>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>';
                echo $obj->product_code;
                echo '</td>';
                echo '<td>';
                echo $obj->product_name;
                echo '</td>';
                echo '<td>';
                echo $obj->date_of_order;
                echo '</td>';
                echo '<td>';
                echo $obj->slot_time;
                echo '</td>';
                echo '<td>';
                echo $q1_result->nature_of_sample;
                echo '</td>';
                echo '<td>';
                echo $q1_result->wavelength;
                echo '</td>';
                echo '<td>';
                echo $q1_result->wavelength_justi;
                echo '</td>';
                echo '<td>';
                echo $q1_result->scan_range_from;
                echo '</td>';
                echo '<td>';
                echo $q1_result->scan_range_to;
                echo '</td>';
                echo '<td>';
                echo $q1_result->details;
                echo '</td>';
                 if($obj->status==0)
              {
              echo '<td>'.'Pending Admin Approval'.'</td>';
              }
              else if($obj->status==1)
              {
                 echo '<td>'.'Booking Approved'.'</td>';
              }



              }
              else if($obj->product_name='XRD')
              {
                $q1=$mysqli->query("SELECT * FROM xrd_order_details WHERE order_id=$oi");
                $q1_result=$q1->fetch_object();
                echo '<th>Nature of Sample</th>';
                echo '<th>Scan Range From</th>';
                echo '<th>Scan Range To</th>';
                echo '<th>Details</th>';
                echo '<th>Status</th>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>';
                echo $obj->product_code;
                echo '</td>';
                echo '<td>';
                echo $obj->product_name;
                echo '</td>';
                echo '<td>';
                echo $obj->date_of_order;
                echo '</td>';
                echo '<td>';
                echo $obj->slot_time;
                echo '</td>';
                echo '<td>';
                echo $q1_result->nature_of_sample;
                echo '</td>';
                echo '<td>';
                echo $q1_result->scan_range_from;
                echo '</td>';
                echo '<td>';
                echo $q1_result->scan_range_to;
                echo '</td>';
                echo '<td>';
                echo $q1_result->details;
                echo '</td>';
                 if($obj->status==0)
              {
              echo '<td>'.'Pending Admin Approval'.'</td>';
              }
              else if($obj->status==1)
              {
                 echo '<td>'.'Booking Approved'.'</td>';
              }



              }
              echo '</tr>';
              echo '</table>';
              echo '</div>';

            }
          }
          else
          {
            echo '<p><strong>Order Something and it will appear here!</strong></p>';
          }
        ?>
      </div>
    </div>
    <div class="row" style="margin-top:10px;">
      <div class="small-12">
        <footer style="margin-top:10px;">
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
