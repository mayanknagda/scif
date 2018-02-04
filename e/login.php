<?php
include ('php/session.php');
include ('php/config.php');
include ('php/head.php');
?>
<?php
if(isset($_POST['submit']))
{
  // $secretkey="6LcQwEIUAAAAAABDGoeFpbjSoXGFWW8zXQLchZaW";
  // $responsekey=$_POST['g-recaptcha-response'];
  // $user_ip=$_SERVER['REMOTE_ADDR'];
  // $url="https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$responsekey&remoteip=$user_ip";
  // $response=file_get_contents($url);
  // $response=json_decode($response);
}
?>
<?php
// echo '<script type="text/javascript">
//   function enableBtn(){
//     document.getElementById("button1").disabled = false;
//    }
// </script>
// <script src="https://www.google.com/recaptcha/api.js"></script>';

?>

    <form method="POST" action="verify.php" style="margin-top:30px;">
      <div class="row">
        <div class="small-8">
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Email</label>
            </div>
            <div class="small-8 columns">
              <input type="email" required="true" id="right-label" placeholder="Your Email" name="username">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Password</label>
            </div>
            <div class="small-8 columns">
              <input type="password" required="true" id="right-label" name="pwd" placeholder="Your Password">
            </div>
          </div>
           </div>
          <div class="row">
            <div class="small-4 columns">
            <!--<div class="g-recaptcha" data-sitekey="6LcQwEIUAAAAAJUA7Kv08cOmHM4asACzngfi8mhB" data-callback="enableBtn"></div>-->
          </div>
            <div class="small-8 columns">
              <input type="submit" id="button1" value="Login" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
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
