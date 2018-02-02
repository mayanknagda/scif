<?php
include ('php/session.php');
include ('php/login_check.php');
include ('php/config.php');
include ('php/head.php');
?>
<!--DO NOT EDIT THE CODE BELOW IF YOU DON'T KNOW WHAT YOU ARE DOING!-->
    <?php
    // GLOBAL FLAGS
    $order_limit_reached=0; // Limit at max of 1 order per day per user.



    // Get the details of the user from the database.
    $un=$_SESSION["username"]; // $un has the user's email address
    $q1=$mysqli->query("SELECT id, fname, lname FROM users WHERE email='$un'");
    $q1_result=$q1->fetch_object();

    $id=$q1_result->id; // store id from query.
    $first_name=$q1_result->fname; //store first name from query.
    $last_name=$q1_result->lname; // store ladt name from query.
    $order_date=$_SESSION["date"]; // store the order_date from SESSIONS

    // RUN QUERY ON DATABASE TO SEE IF USER HAS PLACED AN ORDER.
    $result=$mysqli->query("SELECT * FROM orders WHERE (user_id=$id) AND (date_of_order='$order_date')");

    if($result->num_rows) // IF YES HE STOP HIM From making another order
    {
      echo "<br><br>";
      echo "<h3 align='center'>Sorry!</h3>";
      echo "<br>";
      echo "<p align='center'>You have already placed an order. Order Limit is reached as only 1 order per person per day is allowed.";
      echo "<div class='mybutton'>";
      echo '<p><a href="index.php"><input type="submit" value="Home" style="float:middle; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
      echo '</div>';
      $order_limit_reached=1;
    }

    $go_for_print=0;
    
    if($order_limit_reached==0) // Print the Order Details only if user has not made more than 1 order.
    {

        echo ' <div class="myown" style="margin-top:10px;" width: 400px> ';
        echo  ' <div class="myown" width: 400px> ';
        echo ' <p><h3>Booking Details</h3></p> ';


        //Code to display the slot section of the table.
        $slot=$_POST["slot"];
        $postfix; 
        $prefix;
        $instrument_id=$_SESSION['instrument'];
        if($instrument_id==1)
        {
            if($slot==1)
            {
                $slot_start_time=''.($slot+8).':30';
                $slot_end_time=''.($slot+9).':15';
                $postfix=$prefix="AM";
            }
            else if ($slot==2) 
            {
                $slot_start_time=''.($slot+8).':15';
                $slot_end_time=''.($slot+9).':00';
                $postfix=$prefix="AM";
            }
            else if ($slot==3) 
            {
                $slot_start_time=''.($slot+8).':00';
                $slot_end_time=''.($slot+8).':45';
                $postfix=$prefix="AM";
            }

            else if($slot==4)
            {
                $slot_start_time=''.($slot+7).':45';
                $slot_end_time=''.($slot+8).':30';
                $prefix="AM";
                $postfix="PM";
            }

            else if ($slot==5) 
            {
                $slot_start_time=''.($slot-4).':30';
                $slot_end_time=''.($slot-3).':15';
                $postfix=$prefix="PM";
            }
            else if($slot==6)
            {
                $slot_start_time=''.($slot-4).':15';
                $slot_end_time=''.($slot-3).':00';
                $postfix=$prefix="PM";
            }
            else if($slot==7)
            {
                $slot_start_time=''.($slot-4).':00';
                $slot_end_time=''.($slot-3).':45';
                $postfix=$prefix="PM";
            }
            else if($slot==8)
            {
                $slot_start_time=''.($slot-4).':45';
                $slot_end_time=''.($slot-3).':30';
                $postfix=$prefix="PM";
            }
            else if($slot==9)
            {
                $slot_start_time=''.($slot-4).':30';
                $slot_end_time=''.($slot-3).':15';
                $postfix=$prefix="PM";
            }
            else 
            {
                $postfix=$prefix="Invalid slot selection please try again!";
            }

            $slot_time="{$slot_start_time}{$prefix} - {$slot_end_time}{$postfix}";
        }

        else if($instrument_id!=1)
        {
            if($slot==1)
            {
                $slot_start_time=''.($slot+8).':30';
                $slot_end_time=''.($slot+9).':30';
                $postfix=$prefix="AM";
            }
            else if ($slot==2) 
            {
                $slot_start_time=''.($slot+8).':30';
                $slot_end_time=''.($slot+9).':30';
                $postfix=$prefix="AM";
            }
            else if ($slot==3) 
            {
                $slot_start_time=''.($slot+8).':30';
                $slot_end_time=''.($slot+9).':30';
                $prefix="AM";
                $postfix="PM";
            }

            else if($slot==4)
            {
                $slot_start_time=''.($slot-3).':30';
                $slot_end_time=''.($slot-2).':30';
                $prefix="AM";
                $postfix="PM";
            }

            else if ($slot==5) 
            {
                $slot_start_time=''.($slot-3).':30';
                $slot_end_time=''.($slot-2).':15';
                $postfix=$prefix="PM";
            }
            else if($slot==6)
            {
                $slot_start_time=''.($slot-3).':15';
                $slot_end_time=''.($slot-2).':00';
                $postfix=$prefix="PM";
            }
            else if($slot==7)
            {
                $slot_start_time=''.($slot-3).':00';
                $slot_end_time=''.($slot-2).':45';
                $postfix=$prefix="PM";
            }
            else 
            {
                $postfix=$prefix="Invalid slot selection please try again!";
            }

            $slot_time="{$slot_start_time}{$prefix} - {$slot_end_time}{$postfix}";

        }

        // End of code to display the slot section of the table.


        //Code to display the instrument name and price section in the table
        $pid=$_SESSION['instrument'];
        $q=$mysqli->query("SELECT product_code, product_name, price FROM products WHERE id=$pid");
        $result=$q->fetch_object();
        $price=$result->price;
        $product_name=$result->product_name; // Product Name
        $product_code=$result->product_code; // Product Code
        // End of code to display the instrument name and price section in the table
        

        // Order id manual creation.
        $oi;// Order_id
        $q3=$mysqli->query("SELECT * FROM orders");
        if(!$q3->fetch_object())
        {
            $oi=1001;
        }
        else 
        {
            $q4=$mysqli->query("SELECT MAX(order_id) AS prev_order_id FROM orders");
            $result_q4=$q4->fetch_object();
            $oi=$result_q4->prev_order_id+1;
        }

        $in_id=(int)$id;
        
        $push=$mysqli->query("INSERT INTO orders (user_id, date_of_order, slot_time, product_code, product_name, order_id) VALUES ($in_id,'$order_date','$slot_time','$product_code','$product_name',$oi)");

        // End of Push

        // Blocking the Slot
        //Getting the order_id which is pushed into the slot
        $booya5=(string)$oi; // Converted the order id that is generated above into string.

        // Getting the table name form the link table using the pid.
        $q5=$mysqli->query("SELECT table_name from link WHERE pid=$pid");
        $result_q5=$q5->fetch_object();
        $table_name=$result_q5->table_name;

        // Converting the slot id to a valid string 
        $slot_string=(string)($slot+8);
        $slot_c="slot_".$slot_string;



        $slot_blocked=0; // By Default te slot is not booked.
        $slot_block=$mysqli->query("UPDATE $table_name SET $slot_c='$booya5' WHERE slot_date='$order_date'");
        if($slot_block)
        {
          $slot_blocked=1;
        }
        else 
        {
          $slot_blocked=0;
        }
        $go_for_print=1;
    }
    if($go_for_print==1)
    {

       // End of Slot Blocking

        // Drawing the order confirmation table.
        echo "<br>";
        echo "<br>";
        echo '<table cellpadding="2" cellspacing="2" width: 400px>';
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Email</th>";
        echo "<th>Instrument Name</th>";
        echo "<th>Price</th>";
        echo "<th>Date</th>";
        echo "<th>Slot</th>";
        echo "<th>Booking Status</th>";
        echo "<tr>";
        echo '<td colspan="1" align="left">';
        echo $first_name.' '.$last_name;
        echo '<td colspan="1" align="left">';
        echo $un;
        echo '<td colspan="1" align="left">';
        echo $product_name;
        echo '<td colspan="1" align="left">';
        echo $price;
        echo '<td colspan="1" align="left">';
        echo $order_date;
        echo "<td colspan='1' align='left'>";
        echo $slot_time;
        echo '<td colspan="1" align="left">';
        if($slot_blocked==1)
        {
        echo 'Pending Admin Approval';
        }
        else
        {
          echo 'Denied';
        }
        echo '</tr>';
    }
    else
    {
      echo "<br><br>";
      echo "<br>";
      echo '<img src="images/uhno.png" alt="Eror 404!">';
      echo "<div class='mybutton'>";
      echo '<p><a href="index.php"><input type="submit" value="Home" style="float:middle; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
      echo '</div>';
    }
        ?>
      </div>
    </div>
