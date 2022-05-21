<?php
$hostname="localhost";
$username="root";
$password="";
$dbname="product";


$conn=mysqli_connect($hostname,$username,$password,$dbname);
if (!$conn){
    die('Not connect'.mysqli_connect_error()) ;
}
//else echo "connect";
?>