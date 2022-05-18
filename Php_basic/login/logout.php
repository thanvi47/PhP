<?php
    require'db.php';
    session_start();
    // if (!isset($_SESSION['loggedin']))
  
    // 
    SESSION_UNSET();
     session_destroy();
  header("location:/test/login/login.php");
  exit;
?>