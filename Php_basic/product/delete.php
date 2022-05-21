<?php
require_once 'db.php';
session_start();
if ( $_SESSION['login']==true) {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {


        $id = $_GET['id'];
        $sql = " DELETE FROM `data` WHERE `data`.`sno` = '$id' ";
        $result = $conn->query($sql);
        if ($result == true) {
            echo "Delete successfully";
            header('location:search.php');
        } else {
            echo "Some thing wrong";
        }


    }echo '
<form action="logout.php"method="post">
    <button name="">Log Out</button>
</form>';

}else {
    header('location:login.html');
}


?>