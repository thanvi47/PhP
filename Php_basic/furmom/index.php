


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>Document</title>



    </head>
    <body>
             <!-- //navbar  -->
        <div>
            <?php
            require 'assets/header.php'; 
             require 'assets/footer.php';
             require 'assets/db.php';
             require 'assets/slider.php';
            ?>
        
        </div>


        
        </div>





      </div>

            <!-- /////// -->


        <div class="container  ">
                <h2 class="mt-4 text-center">Welcome to Categories </h2>
            
                





            <div class=" container col ">
                
                <!-- forloop -->


                <?php
                    $sql="SELECT * FROM `categorise`";
                    $result=mysqli_query($conn,$sql);
                    while($row= mysqli_fetch_assoc($result)){

                        // echo $row['category_id'];
                        // echo $row['category_name'];
                        $cat=$row['category_name'];
                        $desc=$row['category_description'];
                        echo'
                                
                    <div class="container row m-4 d-flex justify-content-center">

                    <div class="card m-4 p-0" style="width: 18rem;">
                            <img src="https://picsum.photos/seed/picsum/180/130 " class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">'.$cat.'</h5>
                                <p class="card-text"> 
                                '.substr($desc,0,50).'...
                                </p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                    </div>
                                ';
                            }
                        ?>

                    
                    





            </div>

                
                

         </div>









 <!-- pic https://picsum.photos/seed/picsum/80/60  -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    </body>
    </html>