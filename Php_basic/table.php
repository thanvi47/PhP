<?php
require 'inddex.php';

$sql="SELECT * FROM `pratices`";
$result=$conn->query($sql);
if($result-> num_rows>0){
$i=1;
    while ($row=$result->fetch_assoc()){
      $a=  $row['username'];
        $b=$row['mail'];
        $c=$row['password'];
//        $row['username'];



        echo
           $i." . "." . <b>name</b>  . ". $a." . <b>mail</b>  .".$b." .  <b>pass</b> . " .$c."<br>"


        ;

    }






}





?>