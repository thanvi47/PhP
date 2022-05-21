<?php
require_once 'db.php';
if ($_SERVER["REQUEST_METHOD"]=="POST"){

    $name=$_POST['name'];
    $email=$_POST['mail'];
    $pass=$_POST['pass'];
    $cpass=$_POST['cpass'];
//    echo $name.$email.$pass.$cpass;


 $sql="SELECT * FROM `product` WHERE `email`='$email'";
    $result=$conn->query($sql);
    if ($result->num_rows==1)
    {
        echo "email all ready taken";
    }
    else
    {

        if ($pass==$cpass){
            $sql="INSERT INTO `product`( `username`, `email`, `password`) 
                VALUES ( '$name','$email',md5('$pass'))";
            $result=$conn->query($sql);
            echo " Successful ";

        }else
        {
            echo "Password not match";
        }
    }









}








?>