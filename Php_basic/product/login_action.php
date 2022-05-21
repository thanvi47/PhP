<?php

require_once 'db.php';
//$login==false;
if ($_SERVER["REQUEST_METHOD"]=="POST"){

    $email=$_POST['mail'];
    $pass=$_POST['pass'];

    $sql="SELECT * FROM `product` WHERE `email`='$email'";
    $result=$conn->query($sql);
    $data=mysqli_fetch_assoc($result);
    if ($result->num_rows==1 && $data['password']==md5($pass) ){
//        if ()

     session_start();
//     $login==true;
     $_SESSION['login']=true;
     $sql="SELECT  `username` FROM `product` WHERE email='$email' ";
     $result=$conn->query($sql);
     if ($result->num_rows==1) {
         while ($row = $result->fetch_assoc()) {
//             $row['username']=$_SESSION['username'];
             echo' '. $row['username'].'<br>';
         }


     }
echo "login successful";
header('location:input.php');
    }else {echo "password not match";
        session_destroy();
         header('location:login.html');}








}


?>