<?php
require_once 'db.php';
session_start();
if ( $_SESSION['login']==true){
if ($_SERVER["REQUEST_METHOD"]=="POST")
{
   $title=$_POST['title'];
   $desc=$_POST['desc'];
   $id=$_POST['id'];
//   echo $desc.$title.$id;
 $sql=" UPDATE `data` SET `title`='$title',`desc`='$desc' WHERE `sno`='$id'";

   $result=$conn->query($sql);
   if (!$result){
      echo " Data Not Update ";
   }
   echo "Data Update successfully";

}


}
else{
//echo "session not start ";
    header('location:login.html');
}
?>
