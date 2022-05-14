<?php
$fptr=fopen("txtfile.txt" ,"r");
//  $c=fread($fptr,filesize("txtfile.txt"));
 echo $c;
//  fclose($fptr);

   
    while ($a=fgetc($fptr)){
         echo $a;
         if($a=="."){ break ;}
    }

?>