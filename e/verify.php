<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'php/config.php';

$username = $_POST["username"];
$password = $_POST["pwd"];
$flag = 'true';
$no=1;
//$query = $mysqli->query("SELECT email, password from users");

$result = $mysqli->query('SELECT id,email,pwd,fname,type,active,ustatus from users order by id asc');

if($result === FALSE){
  die(mysql_error());
}

if($result){
  while($obj = $result->fetch_object()){

    if($obj->email === $username && $obj->pwd === $password && $obj->ustatus==$no && $obj->active==$no) {

      $_SESSION['username'] = $username;
      $_SESSION['type'] = $obj->type;
      $_SESSION['id'] = $obj->id;
      $_SESSION['fname'] = $obj->fname;
      $_SESSION['ustatus'] = $obj->ustatus;
      header("location:index.php");
    }
    else {

        if($flag === 'true'){
          redirect();
          $flag = 'false';
        }
    }
  }
}

function redirect() {
  echo '<h1>Wrong Credentials or Account Verification still pending by the admin.<br>Kindly activate your account.</h1>';
  header("Refresh: 5; url=index.php");
}
?>
