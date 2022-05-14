<?php
 echo "hle";

    
    $fptr=fopen("myfile.txt","w ");
 fwrite($fptr, "lorem11");
 // appending 
 $fptr =fopen("myfile.txt","a");
 fwrite($fptr, "\n lorem11");

?>