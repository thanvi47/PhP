<?php

require_once ("assets/db.php");

$id=$_GET[ 'id'];
$title=$_GET[ 'title'];
$descreptions=$_GET[ 'descreptions'];

if($_SERVER['REQUEST_METHOD']=='get' ) {
    $title = $_GET["title"];
    $descreptions = $_GET["descreptions"];
    $id=$_GET[ 'id'];

//    echo $title . $descreptions .$id;
}
//
 $sql = "UPDATE notes SET title='$title', descreptions ='$descreptions'WHERE `notes`.`sno`='$id'";
////  echo "quaryr pore".$x ."  ";
//
$stmt = $conn->prepare($sql);
//
//
$stmt->execute();
header('location:index.php');
?>
