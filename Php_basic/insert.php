<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "db";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{ 
  // Submit these to a database
  // Sql query to be executed 
  echo" Connection was successful <br>";


}
$sql= "SELECT * FROM `login`";
$result = mysqli_query($conn,$sql);
//find the number of return 
$num= mysqli_num_rows($result);
echo $num ."<br>";
if($num>0){
   
for($i=0;$i=$row =mysqli_fetch_assoc($result);$i++){ 
     // $row =mysqli_fetch_assoc($result);
    echo $row['UserID']." ". $row['name']. ' ' . $row['email']; 
    echo "<br>";}
  
}

?>