<?php
include ('php/session.php');
include ('php/config.php');
include ('php/head.php');
?>
    <div class="row" style="margin-top:10px;">
      <div class="small-12">
        <?php
          $i=0;
          $product_id = array();
          $product_quantity = array();
          $result = $mysqli->query('SELECT * FROM products');
          if($result === FALSE){
            die(mysql_error());
          }
          if($result){
            while($obj = $result->fetch_object()) {
              echo '<div class="large-4 columns" >';
              echo '<div class="boxed">';
              echo '<p><h3>'.$obj->product_name.'</h3></p>';//product name ye wala he, upar print hoga
              echo '<img src="images/products/'.$obj->product_img_name.'"/>';
              echo '<p><strong>Code</strong>: '.$obj->product_code.'</p>';
              echo '<p><strong>Description</strong>: '.$obj->product_desc.'</p>';
              echo '<p><strong>Person Incharge</strong>: '.$obj->pi.'</p>';
              echo '<p><strong>Booking Price</strong>: '.$currency.$obj->price.'</p>';
              echo '<p><a href="cart.php"><input type="submit" value="Book" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
              echo '</div>';
              echo '</div>';
              $i++;
            }
          }
          $_SESSION['product_id'] = $product_id;
          echo '</div>';
          echo '</div>';
          ?>
        <div class="row" style="margin-top:10px;">
          <div class="small-12">
        <footer style="margin-top:10px;">
           <p style="text-align:center; font-size:0.8em;clear:both;">&copy; SCIF</p>
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