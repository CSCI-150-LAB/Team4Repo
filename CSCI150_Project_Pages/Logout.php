<?php

   //deletes all sessions and logs user out
   session_start();
   session_unset();
   session_destroy();
   
   header('Location: ./LoginPage.php');
?>