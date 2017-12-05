<?php
   include('config.php');
   session_start();
   $user = $_SESSION['uid'];
   $user_check = $_SESSION['login_user'];
   $user_check2 = $_SESSION['fromCity'];
   $user_check3 = $_SESSION['toCity'];
   $user_check4 =$_SESSION['travel'];
   $user_check5=$_SESSION['busID'];
   $user_check6 =$_SESSION['noseats'];
   $user_check7 =$_SESSION['costaf'];
   $user_check8 =$_SESSION['currseats'];
     echo $user."<br>";
     echo $user_check."<br>";
     echo $user_check2."<br>";
     echo $user_check3."<br>";
     echo $user_check4."<br>";
     echo $user_check5."<br>";
     echo $user_check6."<br>";
     echo $user_check7."<br>";
     echo $user_check8."<br>";



   //$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   //$login_session = $row['username'];

   //if(!isset($_SESSION['login_user'])){
  //    header("location:login.php");
   //}
?>
