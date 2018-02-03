<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
if(!isset($_SESSION["username"])) {
  header("location:index.php");
}
if($_SESSION["type"]=="superuser") {
  header("location:bookingdata.php");
}
if($_SESSION["type"]=="hrtemadmin") {
  header("location:hrtemrequests.php");
}
if($_SESSION["type"]=="ramanadmin") {
  header("location:ramanrequests.php");
}
if($_SESSION["type"]=="xrdadmin") {
  header("location:xrdrequests.php");
}
include 'php/config.php';
include 'php/head.php';
?>
    <div class="row" style="margin-top:30px;">
      <div class="small-12">
        <p><?php echo '<h3>Hi ' .$_SESSION['fname'] .'</h3>'; ?></p>
        <p><h4>Account Details</h4></p>
        <p>Below are your details in the database.</p>
      </div>
    </div>
      <div class="row">
        <div class="small-12">

              <?php
                $result = $mysqli->query('SELECT * FROM users WHERE id='.$_SESSION['id']);
                if($result === FALSE){
                  die(mysql_error());
                }
                if($result) {
                  $obj = $result->fetch_object();
                  echo'<div class="row"> <div class="small-3 columns">
              <label for="right-label" class="right inline">First Name</label>
            </div>
            <div class="small-8 columns end">';
                  echo '<p>'.$obj->fname.'</p>';
                  echo '</div>';
                  echo '</div>';

                  echo'<div class="row"> <div class="small-3 columns">
              <label for="right-label" class="right inline">Last Name</label>
            </div>
            <div class="small-8 columns end">';
                  echo '<p>'.$obj->lname.'</p>';
                  echo '</div>';
                  echo '</div>';

                  echo'<div class="row"> <div class="small-3 columns">
              <label for="right-label" class="right inline">Institute</label>
            </div>
            <div class="small-8 columns end">';
                  echo '<p>'.$obj->institute.'</p>';
                  echo '</div>';
                  echo '</div>';

                  echo'<div class="row"> <div class="small-3 columns">
              <label for="right-label" class="right inline">Institute ID</label>
            </div>
            <div class="small-8 columns end">';
                  echo '<p>'.$obj->iid.'</p>';
                  echo '</div>';
                  echo '</div>';

                  echo'<div class="row"> <div class="small-3 columns">
              <label for="right-label" class="right inline">Address</label>
            </div>
            <div class="small-8 columns end">';
                  echo '<p>'.$obj->address.'</p>';
                  echo '</div>';
                  echo '</div>';

                  echo'<div class="row"> <div class="small-3 columns">
              <label for="right-label" class="right inline">E-mail</label>
            </div>
            <div class="small-8 columns end">';
                  echo '<p>'.$obj->email.'</p>';
                  echo '</div>';
                  echo '</div>';

                  echo'<div class="row"> <div class="small-3 columns">
              <label for="right-label" class="right inline">Phone No</label>
            </div>
            <div class="small-8 columns end">';
                  echo '<p>'.$obj->phno.'</p>';
                  echo '</div>';
                  echo '</div>';

              }
          ?>
        </div>
      </div>
    </form>
    <div class="row" style="margin-top:30px;">
      <div class="small-12">
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
