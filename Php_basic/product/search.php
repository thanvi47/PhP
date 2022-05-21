    <?php
require_once 'db.php';
session_start();
    if ( $_SESSION['login']==true) {
        $sql = "SELECT * FROM `data` ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {

            echo "<table>
        <tr>
            <th>Sno</th>
            <th>Name</th>
            <th>Images</th>
            <th>Details</th>
            
            <th>Actions</th>";
            $i = 1;
            while ($row = $result->fetch_assoc()) {

                echo "
        </tr>
        <tr>
            <td>" . $i . "</td>
            <td>" . $row['title'] . "</td>
            <td><img src=".$row['img']." alt=''height='100px'width='150px'></td>
            <td>" . $row['desc'] . "</td>
            <td> <a href='update.php?id=" . $row['sno'] . "'>Update</a></td>
            <td> <a href='delete.php?id=" . $row['sno'] . "'>Delete</a></td>
        </tr>

  ";
                $i = $i + 1;
                echo '<br>';
// echo $row['title'].$row['desc'];


            }

        }







        echo '
<form action="logout.php"method="post">
    <button name="">Log Out</button>
</form>';








    }
    else {
        header('location:login.html');
    }




    ?>
