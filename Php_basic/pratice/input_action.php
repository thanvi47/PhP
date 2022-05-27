<?php
require 'inddex.php';
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $name = $_POST['username'];
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    echo $name . $pass . $cpass . $mail;


    if ($pass == $cpass && $name != null && $mail != null) {


        $sql = "INSERT INTO `pratices`( `username`, `mail`, `password`) VALUES ('$name','$mail',md5('$pass'))  ";
        $result=$conn->query($sql);

        if ($result==true){
            header('location:table.php');
        }

    }

}


?>
