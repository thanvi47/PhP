<?php
$hostname='localhost';
$servername='root';
$pass='';
$dbname='pratce';
$conn=mysqli_connect($hostname,$servername,$pass,$dbname);
if ($conn==true){
   // echo "connect";
}else  echo 'not connect';





?>