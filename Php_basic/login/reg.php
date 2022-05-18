<?php
 
    require 'db.php';  
    $a=false;
     $showAlart=false;
     if($_SERVER["REQUEST_METHOD"]=="POST"){
     
        $username=$_POST["username"];
        $password=$_POST["password"];
        $cpassword=$_POST["cpassword"];
         
        echo md5('$password');
       // $exists=false;
         $existSql="select * from user where username= '$username' ";
         $result = mysqli_query($conn, $existSql);
         $numExistRows = mysqli_num_rows($result);
         
        if( $numExistRows>0){
            // $exists=true
           $a= "User name already exists  ";
         
        }
        else{

            if(($password==$cpassword) ){
                $password=md5($password);

                $sql="INSERT INTO `user` ( `username`, `password`, `dt`) VALUES ( '$username', '$password', current_timestamp())";
                $result = mysqli_query($conn, $sql);
                if($result){
                    $showAlart=true;
                }
            }
                else $a= "Password do not maatch  ";
            
           
            
        }

     } 



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div class="container mt-5 col-md-6">


    <form action= "/test/login/reg.php" method="post">
            <div class="mb-3 sm">
                <label for="username" class="form-label">Username</label>
                <input type="username" class="form-control" id="username" name= "username"aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll share your data with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name ="password"class="form-control" id="password">
            </div>
            
            <div class="mb-3">
                <label for="cpassword" name= "cpassword" class="form-label">Conform Password</label>
                <input type="cpassword"  name= "cpassword" class="form-control" id="password">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        <?php
        if($showAlart)
            echo' <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sign up Successfull!</strong> You should check in on some of those fields below.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> ';
            else
            echo' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Invalied !</strong> You should check in on some of those fields below.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> ';

            ?>

    </div>
    <?php if($a) echo' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Invalied !</strong> .'.$a.'.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> '; ?>

</body>
</html>