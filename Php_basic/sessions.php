<?php
     
session_start();
if(isset($_SESSION['username'])){
$_SESSION["favCat"] ="Books";
echo "start<br>" ;
}
else echo "plz login ";
SESSION_UNSET();
?>