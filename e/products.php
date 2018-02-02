<?php
include ('php/session.php');
include ('php/config.php');
include ('php/head.php');
?>
    <div class="row" style="margin-top:10px;">
      <div class="small-12">
        <?php
          $i=1;
          $product_id = array();
          $product_quantity = array();
          $result = $mysqli->query('SELECT * FROM products');
          if($result === FALSE){
            die(mysql_error());
          }
          if($result){
             echo '<form action="cart.php" method="POST">';
            while($obj = $result->fetch_object()) {
              echo '<div class="large-4 columns" >';
              echo '<p><h3>'.$obj->product_name.'</h3></p>';//product name ye wala he, upar print hoga
              echo '<img src="images/products/'.$obj->product_img_name.'"/>';
              echo '<p><strong>Code</strong>: '.$obj->product_code.'</p>';
              echo '<p><strong>Description</strong>: '.$obj->product_desc.'</p>';
              echo '<p><strong>Person Incharge</strong>: '.$obj->pi.'</p>';
              echo '<p><strong>Booking Price</strong>: '.$currency.$obj->price.'</p>';
              echo '<p><button type="submit" value="'.$i.'" name="inst_id" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;">Book</button></p>';
              echo '</div>';
              $i++;
            }
            echo '</form>';
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