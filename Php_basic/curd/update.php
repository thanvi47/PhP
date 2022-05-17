<?php

 require_once ('assets/db.php');
if($_SERVER['REQUEST_METHOD']=='GET' ){

    //print_r($_GET);
    $id=$_GET['id'];
    $sql="SELECT * FROM `notes` WHERE `sno` = '$id'" ;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $note=$row;

            break;

        }
    } else {
        echo "0 results";
    }
    $conn->close();


}

?>

<form action="action.php? "method="get">
    <label for=""> Note Title</label>

    <input type="text" name="title" id="title" <?php echo'value="'.$note['title'].'"' ?>>
    <input type="text" name="descreptions"id="descreptions" <?php echo'value="'.$note['descreptions'].'"' ?>>
    <input type="hidden" name="id" id="id" value=" <?php echo  $note['sno'];?>">
    <button type="submit"  class="btn btn-primary">Update</button>
</form>
<?php
echo $id;

?>