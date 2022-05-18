<?php

    require 'db.php';  
     $login=false;
     if($_SERVER["REQUEST_METHOD"]=="POST"){
     
        $username=$_POST["username"];
        $password=$_POST["password"];
        
        $exists=false;

        // echo md5($password);
        

             $sql="Select * from user where username='$username'";
             $result = mysqli_query($conn, $sql);
            //  $num=mysqli_num_rows($result);
             $data = mysqli_fetch_assoc($result);
             if($data['password']==md5($password)){
                 
                $login=true;
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['username']=$username;
                $_SESSION['password']=$password;
                header("location:/test/login/welcome.php");


             }

            
            
        

     } 



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Log in</title>
</head>
<body>
    
    <div class="container mt-5 col-md-6">


    <form action = "" method="post">
            <div class="mb-3 sm">
                <label for="username" class="form-label">Username</label>
                <input type="username" class="form-control" id="username" name= "username"aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll share your data with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name ="password"class="form-control" id="password">
            </div>
            
           
            
            <button type="submit" class="btn btn-primary">Login</button>
            </form>

        <?php
        if($login)
            echo' <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>You are Loged in !</strong> You should check in on some of those fields below.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> ';
            else
            echo' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Invalied !</strong> You should check in on some of those fields below.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> ';

            ?>

    </div>


</body>
</html>