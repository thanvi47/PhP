<?php
require_once 'db.php';
session_start();




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Input</title>
</head>
<body>

<?php
if ( $_SESSION['login']==true) {

    echo '
<form action="input_action.php" method="post"enctype="multipart/form-data">

    <input type="text" name="title" placeholder="input title"> <br><br>
      Select image to upload:
    <input type="file" name="pic" id="fileToUpload"><br><br>
    <textarea name="desc" id="" cols="30" rows="10" placeholder="Input Details"></textarea><br><br>
        <input type="submit" name="submit" placeholder="input "><br><br>

</form>';

    echo '
<form action="search.php"method="post">
    <button name="">See Products</button>
</form> <br>';
    echo '
<form action="logout.php"method="post">
    <button name="">Log Out</button>
</form>';
//print_r($_SESSION) ;
}

else{
    header('location:login.html');
}
?>

</body>
</html>
