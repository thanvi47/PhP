<?php

$x= $_GET['id'];

echo $x ."   ";


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notes";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



  
  $sql="DELETE FROM `notes` WHERE `sno` = '$x'";
  
  // Prepare statement
  $stmt = $conn->prepare($sql);

  // execute the query
  $stmt->execute();

  // echo a message to say the UPDATE succeeded
  echo $stmt->rowCount() . " records DELETED successfully";
header("location:index.php");
require 'assets/navbar.php';
}

catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>


