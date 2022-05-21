<?php
require_once 'db.php';
session_start();
if ( $_SESSION['login']==true) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $pic = $_FILES['pic']['name'];
        $pic_1 = $_FILES['pic']['tmp_name'];
        $folder = "pic/".$pic;
        $result = move_uploaded_file($pic_1, $folder);
        $sql = "INSERT INTO `data` ( `title`,`img`, `desc` ) VALUES ('$title','$folder', '$desc')";
        $result = $conn->query($sql);
//print_r($result);
        if ($result == true) {
            echo "successful"; header('location:search.php');
        } else echo "not insert";

    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {


//            echo var_dump($result);

        if (!$result ) {
            print 'Not uploaded ';
        }


    }






}else{
    header('location:login.html');
}
?>