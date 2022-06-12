<?php
session_start();
require_once "nav.php";
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"]=="GET")
{
    $id=$_GET['id'];
    $sql="SELECT * FROM `ar`,`user` WHERE `sno`=$id";
    $result=$conn->query($sql);
    if ($result->num_rows>0) {
        while ($row = $result->fetch_assoc()) {
            $post_id=$row['sno'];
            $user_id=$row['user_id'];

            if($user_id==$row['UserID']){
    echo '

    <div class="container   ">
    
    <div class="card mb-3 ">
    <img src='.$row['img'].' class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">'.$row['title'].'</h5>
        <p class="card-text">'.$row['desc'].'</p>
        <p class="card-text"><small class="text-muted">Last updated '.$row['dt'].' mins</small></p>';
        
      echo'   <p class="card-text"><small class="text-muted">posed by <b>'.$row['username'].'</b></small></p>';
            echo'  <a href="/blog/assets/delete.php?id='.$id.'">Delete</a> 
             <a href="/blog/assets/update.php?id='.$id.'">Update</a> 
   </div>
</div>
    
    
    </div>
    
    ';
          echo ' 




                <div class="container ">
                <!--    <h2 class="d-flex justify-content-center" >Start Blogging</h2>-->

                    <form action="/blog/assets/comment.php"method="post" >
                        <div class="mb-3 ">
                            <label for="exampleFormControlInput1" class="form-label">Comment</label>

                            <input type="text" name="comment" class="form-control" id="exampleFormControlInput1">
                            <input type="hidden" name="id" class="form-control" id="exampleFormControlInput1" value= "'.$row['sno'].'">
                            <input type="hidden" name="post_id" class="form-control" id="exampleFormControlInput1" value= "'.$id.'">
                        </div>

<!--                        <button type="submit" class="btn btn-success">Comment</button>-->


                </div>';
            ?>

                <div class="container">

                    <?php
                    //                    require_once "assets/login_action.php";
                    if (!isset($_SESSION['login']))
                    {
                        //                        echo $_SESSION['username'];
                        //                       header('location:/blog/assets/login.php');
                        echo '
                                    
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Log in first!</strong> You should Log in to publish artical.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                                    
                                    ';
                    }
                    else{
                        //                        echo '
                        //<div class="alert alert-primary alert-dismissible fade show" role="alert">
                        //  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                        //  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        //</div>
                        //                        ';
                        //                        session_start();
                        echo'
                            <button type="submit" class="btn btn-success">Publish</button>
            
                            </form>
            </div>
            ';
//                        echo var_dump($_SESSION);
                    }

                    ?>
                </div>

 <?php echo '

            <div class="container card-text"> ';?>
 <?php  $i=1;
            $sql3="SELECT * FROM `ar` WHERE `sno`=$id ";
            $result3=$conn->query($sql3);
            if ($result->num_rows>0){
                while ($row3=$result3->fetch_assoc()){
                    $product_id=$row3['sno'];
//                    $post_id=$row3['sno'];

                    $sql4="SELECT * FROM `comments` WHERE `product_id`='$product_id' ";
                    $result4=$conn->query($sql4);
                    if ($result4->num_rows>0) {
                        while ($row4 = $result4->fetch_assoc()) {
                            $name = $row4['user_id'];
                            $_commnet = $row4['comment'];
                            $_commnet_dt = $row4['dt'];
                            $cmnt_id=$row4['id'];
//                        echo 'commnet id  == '. $cmnt_id;
//                        echo 'commnet time =='.$_commnet_dt;


                            $sql5="SELECT * FROM `user` WHERE `UserID`='$name' ";
                            $result5=$conn->query($sql5);

                            if ($result5->num_rows>0) {
                                while ($row5 = $result5->fetch_assoc()) {

                                   $username= $row5['username'];

//                                  echo $i.' . '.'<b>'.$username.'</b>'.'<br>'.' '.$_commnet.'<br>'.'
//                    <p class="card-text"><small class="text-muted">Last updated '.$_commnet_dt.' mins</small></p>';
//                                        $i++;
//                                    echo'<a href="/blog/assets/comment_update.php?id='.$cmnt_id .'">Update</a> ';
//                                    echo'<a href="/blog/assets/comment_delete.php?id='.$cmnt_id.'">Delete</a>';
//                                        echo '<br>';

                                  echo' 
                                        <div class="container m-2">
                                        <div class="card">
                                      <div class="card-body">
                                      
                                      
                                      '.$i.'. <b>'.$username.'</b><br> '.$_commnet.'<br>
                                      
                                      
                                      
                                    <p class="card-text"><small class="text-muted">Last updated '.$_commnet_dt.' mins</small></p>    
                                     
                                    <a href="/blog/assets/comment_update.php?id='.$cmnt_id .'">Update</a>
                                    <a href="/blog/assets/comment_delete.php?id='.$cmnt_id.'">Delete</a>
                                    ';

                    $sql6=" SELECT * FROM `replays`WHERE `commnet_id`='$cmnt_id'";
                        $j=1;
                    $result6=$conn->query($sql6);
                        if ($result6->num_rows>0) {
                        while ($row6 = $result6->fetch_assoc()) {
                            $rep_id=$row6['user_id'];
                            $rep_dt=$row6['dt'];
                            $rep_sno=$row6['sno'];

                            $sql7="SELECT * FROM `user` WHERE `UserID`='$rep_id' ";
                            $result7=$conn->query($sql7);

                            if ($result7->num_rows>0) {
                                while ($row7 = $result7->fetch_assoc()) {

                                    $rep_user_name = $row7['username'];


                                    $rep = $row6['reply'];
                                    echo ' <br><br>  ' . $j . '. <b>' . $rep_user_name . '</b><br> ' . $rep . '<br>
                                      
                                      
                                     
                                    <p class="card-text"><small class="text-muted">Last updated ' . $rep_dt . ' mins</small></p>    
                                     
                                    <a href="/blog/assets/reply_update.php?id=' . $rep_sno . 'id2=' . $id . '">Update</a>
                                    <a href="/blog/assets/reply_delete.php?id=' . $rep_sno . '">Delete</a>';
                                    $j++;
                                }
                            }
                }
            }


       ?>


<!--               --><?php //   echo $cmnt_id.$post_id;
                                    echo'     <div class="container ">
                                        <!--    <h2 class="d-flex justify-content-center" >Start Blogging</h2>-->

                                        <form action="/blog/assets/reply.php"method="post" >
                                            <div class="mb-3 ">
                                                <label for="exampleFormControlInput1" class="form-label">Reply</label>

                           <input type="text" name="reply" class="form-control" id="exampleFormControlInput1">
                    <input type="hidden" name="post_id"  value= "'.$id.'">
                           <input type="hidden" name="cmnt_id" class="form-control" id="exampleFormControlInput1" value= "'.$cmnt_id.'">
                                  </div>';


                                        if (!isset($_SESSION['login']))
                                            {
                                            //                        echo $_SESSION['username'];
                                            //                       header('location:/blog/assets/login.php');
                                            echo '

                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <strong>Log in first!</strong> You should Log in to publish artical.
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>

                                            ';
                                            }
                                            else{
                                            //                        echo '
                                            //<div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                //  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                                                //  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                //</div>
                                            //                        ';
                                            //                        session_start();
                                            echo'
                                            <button type="submit" class="btn btn-outline-success">Reply</button>

                                        </form>
                                    </div>
                                    ';
                                    //                        echo var_dump($_SESSION);
                                    }
                                            ?>

                          </div>






                         <?php     echo'      
                                    </div>
                                    </div>
                                    </div>' ;

                                    $i++;

                                    }
                                }

                        }

                    }
                }

            }





        echo '</div>'   ;




            }

}

}

}

?>



