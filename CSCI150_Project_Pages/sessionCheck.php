<?php
   session_start();
   //if user is logged in send them to homepage
   if (!isset($_SESSION['user_ID'])){
      header('Location: ./pageLogin.php');
   }
?>