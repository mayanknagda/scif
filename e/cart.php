<?php
include ('php/session.php');
include ('php/login_check.php');
include ('php/config.php');
include ('php/head.php');
if(!isset($_SESSION["username"])) {header("location:index.php");}
?>
    <div class="row" style="margin-top:10px;">
      <div class="large-12">
        <p><h3>Book Instrument</h3></p>
        <?php
        $inst_id=$_POST['inst_id'];


            echo '<table>';
            echo '<tr>';
            echo '<th>Instrument Name</th>';
            echo '<th>Instrument Issue Date</th>';
            echo '</tr>';
            $q = $mysqli->query("SELECT product_name, price FROM products WHERE id=$inst_id");
            $q_result=$q->fetch_object();
            echo '<tr>';
            echo '<td colspan="1" align="left">';
            echo $q_result->product_name;
            echo'</td>';
            echo '<form action="book_1.php" method="POST">';
            if($inst_id==1)
            {
              echo '<script>
                $( function() {
                $( "#datepicker" ).datepicker({minDate: 0, maxDate: 14});
                   });
                </script>';
            }
            else if($inst_id==2 || $inst_id==3)
            {
              echo '<script>
                $( function() {
                $( "#datepicker" ).datepicker({minDate: 0, maxDate: 60});
                   });
                </script>';
            }
            echo '<td colspan="1" align="left"><input type="text" name="date" id="datepicker"></td>';
            echo'</tr>';
            echo'<tr>';
            echo'<td>';
            echo "<td>";
            echo '<button type=submit value='.$inst_id.' name="instrument" style="float:right;">Book</button>';
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
