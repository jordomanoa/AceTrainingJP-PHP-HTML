<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usertype']) or $_SESSION['usertype'] != 'student')
   {
   header('Location: notAuthorised.php'); 
   }

?>
