<?php
require_once 'db.php';
session_start();
if ( $_SESSION['login']==true) {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        $id = $_GET['id'];
        $sql = " SELECT  `title`, `desc` FROM `data` WHERE sno='$id'";
        $result = $conn->query($sql);
        // print_r($result);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                $title = $row['title'];
                $desc = $row['desc'];

                echo "<form method='post' action='update_action.php'>
      <input type='text' name='title' value=" . $title . ">
            <input type='text' name='desc' value=" . $desc . ">
            <input type='hidden' name='id' value=" . $id . " >
                   <input type='submit' name='submit' >
         <form>   ";
            }


        }

    }echo '
<form action="logout.php"method="post">
    <button name="">Log Out</button>
</form>';

//           <a href='update_action.php?id=".$id."'>Update</a>
}else {
    header('location:login.html');
}

?>
