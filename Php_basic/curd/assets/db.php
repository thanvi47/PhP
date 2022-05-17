<?php
        $insert=false;
        $delete=false;
         // conect to database 
         
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "notes";

        // Create a connection
        $conn = mysqli_connect($servername, $username, $password, $database);
        // Die if connection was not successful
        if (!$conn){
            die("Sorry we failed to connect: ". mysqli_connect_error());}
            else{

            }

            

//    if(isset($_GET['delete'])){
//     $sno=$_GET['delete'];
// $delete=true ;
//     $sql="DELETE FROM `notes` WHERE `notes`.`sno` = $sno;" ;

//     $result=mysqli_query($conn,$sql);
//   }




        ?>