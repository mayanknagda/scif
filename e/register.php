<?php
include ('php/session.php');
include ('php/config.php');
include ('php/head.php');
?>
<script type="text/javascript">
      function validateForm() {
    var x = document.forms["register"]["pwd"].value;
    var y = document.forms["register"]["rpwd"].value;
    if (x !=y) {
        alert("Password don't match");
        return false;
    }
    else{
      return true;
    }
} 
    </script>


    <form name="register" method="POST" action="insert.php" onsubmit="return validateForm()" style="margin-top:30px;">
      <div class="row">
        <div class="small-8">

          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">First Name</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="Enter First Name" name="fname" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Last Name</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="Enter Last Name" name="lname" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Institute</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="Enter Institute Name" name="institute" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Institute ID</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="Enter Your Institute ID" name="iid" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Full Address</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="Give Your Full Address" name="address" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">E-Mail</label>
            </div>
            <div class="small-8 columns">
              <input type="email" id="right-label" placeholder="Enter your Email" name="email" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Phone No</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="Enter your Phone No" name="phno" required="">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Password</label>
            </div>
            <div class="small-8 columns">
              <input type="password" id="right-label" name="pwd" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Password Again</label>
            </div>
            <div class="small-8 columns">
              <input id="right-label" type="password" name="rpwd" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">

            </div>
            <div class="small-8 columns">
              <input type="submit" id="right-label" value="Register" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
              <input type="reset" id="right-label" value="Reset" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
            </div>
          </div>
        </div>
      </div>
    </form>


    <div class="row" style="margin-top:10px;">
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
