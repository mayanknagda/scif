<?php
include ('php/session.php');
include ('php/login_check.php');
include ('php/config.php');
include ('php/head.php');
?>

    <div class="row" style="margin-top:10px;">
      <div class="large-12">
        <p><h3>Book Instrument</h3></p>
        <?php
    
            $total = 0;
            echo '<table>';
            echo '<tr>';
            echo '<th>Instrument Name</th>';
            echo '<th>Instrument Issue Date</th>';
            echo '</tr>';
            $result = $mysqli->query("SELECT id, product_name, price FROM products");
                echo '<tr>';
                  echo '<td colspan="1" align="left"><form action="book_1.php" method="POST">';
                  echo '<select name="instrument">';
                  while($row=$result->fetch_object()){
                   echo' <option value="'.$row->id.'">'.$row->product_name.'</option>';
                  }
                  echo'</td>';
                  echo'</select>';
                 echo '<td colspan="1" align="left"><input type="text" name="date" id="datepicker"></td>';
            echo '</td>';
            echo'</tr>';
            echo'<tr>';
            echo'<td>';
            echo "<td>";
            echo '<button type=submit style="float:right;">Book</button>';
            echo '</form>';
          echo '</tr>';
          echo '</table>';
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
 
</body>
</html>

<!-- Refrence for Humans-->
<!--<p>Date: <input type="text" id="datepicker"></p>-->