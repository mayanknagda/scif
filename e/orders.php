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
        <hr>
        <?php
          $user = $_SESSION["username"];
          $q1=$mysqli->query("SELECT id from users WHERE email='".$user."'");
          $result_q1=$q1->fetch_object();
          $uid=$result_q1->id;
          $result = $mysqli->query("SELECT * from orders where user_id=$uid");
          if($result->num_rows) {
            while($obj = $result->fetch_object()) {
              echo '<div class="large-6">';
              echo '<p><h4>Order ID ->'.$obj->order_id.'</h4></p>';
              echo '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
              echo '<p><strong>Product Name</strong>: '.$obj->product_name.'</p>';
              echo '<p><strong>Date of Purchase</strong>: '.$obj->date_of_order.'</p>';
              echo '<p><strong>Slot Time</strong>: '.$obj->slot_time.'</p>';
              if($obj->status==0)
              {
              echo '<p><strong>Status</strong>: '.'Pending Admin Approval'.'</p>';
              }
              else if($obj->status==1)
              {
                 echo '<p><strong>Date of Purchase</strong>: '.'Booking Approved'.'</p>';
              }
              echo '</div>';
              echo '<div class="large-6">';
              //echo '<img src="images/products/sports_band.jpg">';
              echo '</div>';
              echo '<p><hr></p>';
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
