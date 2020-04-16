<?php
   include('DBconnection.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"SELECT * FROM users WHERE username = '$user_check' ");

   if (!$ses_sql) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
   }
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $_SESSION['login_user'] = $row['username'];
   
   /*if(!isset($_SESSION['login_user'])){
      header("location:home.php");
      die();
   }*/
?>