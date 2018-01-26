<?php
include ('php/session.php');
include ('php/login_check.php');
include ('php/config.php');
include ('php/head.php');
?>
    <div class="row" style="margin-top:10px;">
      <div class="large-12">
        <p><h3>Book Slot</h3></p>
        <?php
          $pid =$_POST["instrument"];
          $wdate= $_POST["date"];
          $date = date('Y-m-d', strtotime($wdate)); //date format do not change! This will break SQL if chnaged. Took me hours to get this right. please i beg you.
       
          $result = $mysqli->query("SELECT * FROM products WHERE id=$pid");
          $row=$result->fetch_object();
            $total = 0;
            echo '<form action="book_2.php" method="POST">';
            echo '<table>';
            echo '<tr>';
            echo '<th>Instrument Selected</th>';
            echo '<th>Cost</th>';
            echo '<th>Slots Available on '.$date.'</th>';
            echo '</tr>';
            echo '<tr>';
                  echo '<td colspan="1" align="left">';
                  echo $row->product_name;
                  echo'</td>';
                  echo '<td colspan="1" align="left">';
                  echo $currency.$row->price;
                  echo'</td>';

                  echo '<td colspan="1" align="left">';

                  //REFRENCE FOR HUMANS
                  // q1: Query to find the table_name to use based on the pid of the product selected on the last page.
                  // q2: Query to find if the slected date has a valid entry in the slot table of the selected product.
                  // q3: If the above query fails then make a vaild enrty for that date explicitly in the slot table of the slected product.



                  // Finding table_name using pid from the link table.
                 $q1=$mysqli->query("SELECT table_name from link WHERE pid=$pid");
                 $result_q1=$q1->fetch_object();
                 $table_name=$result_q1->table_name;
                 echo $table_name;


                 // If a slot date is not present in the database we will create an entry for that slot_date explicitly.
                 $q2=$mysqli->query("SELECT slot_date FROM $table_name WHERE slot_date='$date'");
                 if(!$q2->fetch_object())
                 {
                 $q3=$mysqli->query("INSERT INTO $table_name (slot_date) VALUES ('$date')");
                 }


                 // Query for slot availability on that given date.
                 $q4=$mysqli->query("SELECT slot_7,slot_8,slot_9,slot_10,slot_11,slot_12,slot_13,slot_14,slot_15,slot_16,slot_17,slot_18,slot_19,slot_20,slot_21,slot_22 FROM $table_name WHERE slot_date='$date'");

                 // Loop to print only thoese slots that are available on that day.
                 if($q4)
                 {
                  $i=1;
                  $slots=$q4->fetch_object();
                  echo '<select name="slot">';
                  if($slots->slot_7!=0 && $slots->slot_7<1001) {echo' <option value="'.'1'.'">'."7AM - 8AM".'</option>';$i++;}
                  if ($slots->slot_8!=0 && $slots->slot_8<1001) {echo' <option value="'.'2'.'">'."8AM - 9AM".'</option>';$i++;}
                  if ($slots->slot_9!=0 && $slots->slot_9<1001) {echo' <option value="'.'3'.'">'."9AM - 10AM".'</option>';$i++;}
                  if ($slots->slot_10!=0 && $slots->slot_10<1001) {echo' <option value="'.'4'.'">'."10AM - 11AM".'</option>';$i++;}
                  if ($slots->slot_11!=0 && $slots->slot_11<1001) {echo' <option value="'.'5'.'">'."11AM - 12Noon".'</option>';$i++;}
                  if ($slots->slot_12!=0 && $slots->slot_12<1001) {echo' <option value="'.'6'.'">'."12Noon - 1PM".'</option>';$i++;}
                  if ($slots->slot_13!=0 && $slots->slot_13<1001) {echo' <option value="'.'7'.'">'."1PM - 2PM".'</option>';$i++;}
                  if ($slots->slot_14!=0 && $slots->slot_14<1001) {echo' <option value="'.'8'.'">'."2PM - 3PM".'</option>';$i++;}
                  if ($slots->slot_15!=0 && $slots->slot_15<1001) {echo' <option value="'.'9'.'">'."3PM - 4PM".'</option>';$i++;}
                  if ($slots->slot_16!=0 && $slots->slot_16<1001) {echo' <option value="'.'10'.'">'."4PM - 5PM".'</option>';$i++;}
                  if ($slots->slot_17!=0 && $slots->slot_17<1001) {echo' <option value="'.'11'.'">'."5PM - 6PM".'</option>';$i++;}
                  if ($slots->slot_18!=0 && $slots->slot_18<1001) {echo' <option value="'.'12'.'">'."6PM - 7PM".'</option>';$i++;}
                  if ($slots->slot_19!=0 && $slots->slot_19<1001) {echo' <option value="'.'13'.'">'."7PM - 8PM".'</option>';$i++;}
                  if ($slots->slot_20!=0 && $slots->slot_20<1001) {echo' <option value="'.'14'.'">'."8PM - 9PM".'</option>';$i++;}
                  if ($slots->slot_21!=0 && $slots->slot_21<1001) {echo' <option value="'.'15'.'">'."9PM - 10PM".'</option>';$i++;}
                  if ($slots->slot_22!=0 && $slots->slot_22<1001) {echo' <option value="'.'16'.'">'."10PM - 11PM".'</option>';$i++;}
                  echo '</select>';
                 }
                 else
                 {
                  echo "Error in SQL";
                 }
                  echo'</td>';
                  echo "</tr>";
                  echo "<tr>";
                  echo "<td>";
                  echo "<td>";
                  echo "<td>";
                  echo '<button type=submit style="float:right;">Book</button>';
                  echo "</td>";
                  echo "</td>";
                  echo "</td>";
                  echo "</tr>";
                  echo "</table>";
                  echo "</form>";
                  // Passing varibales needed in the next page explitly
                   $_SESSION['date']=$date; // Passing the order_date.
                   $_SESSION['instrument']=$pid; // Passing the instrument id. 
          ?>
         
          
   </div>
    </div>
  
      
<div class="row" style="margin-top:10px;">
      <div class="small-12">
        <footer style="margin-top:10px;">
           <p style="text-align:center; font-size:0.8em;clear:both;">&copy; SCIF</p>
        </footer>

      </div>
    </div>

      
  
<!--<p>Date: <input type="text" id="datepicker"></p>-->
 
 
</body>
</html>