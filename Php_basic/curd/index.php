  <!-- insert ====  INSERT INTO `notes` (`sno`, `title`, `desception`, `tstam`) VALUES (NULL, 'bio', 'Informatices\r\n', current_timestamp()); -->

  <!-- delete  ===  DELETE FROM `notes` WHERE `notes`.`sno` = 30;  -->
  <?php

         require 'assets/db.php';
         require 'assets/navbar.php';

         
         if($_SERVER['REQUEST_METHOD']=='POST' ){
            $title=$_POST["title"];
            $descreptions=$_POST["descreptions"];

            //sql insrt
            $sql="INSERT INTO `notes` ( `title`, `descreptions`) VALUES (   '$title','$descreptions')" ;

            $result=mysqli_query($conn,$sql);

        }
        if($result){
            $insert=true;

        }
        else
        echo"<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img' aria-label='Warning:'>
    <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
  </svg>
        <strong>Empty  !</strong> You should fill the fields below.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
         
        // Submit these to a database
        // Sql query to be executed 
      



     ?>



  <!DOCTYPE html>
  <html lang="en">


  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">

      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

      <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">





      <title>CURD</title>
  </head>

  <body>

      <!-- Button trigger modal
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editleModal">
        Launch demo modal
        </button> -->

      <!-- Modal -->
      <div class="modal fade" id="editleModal" tabindex="-1" aria-labelledby="editleModal" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="editleModal">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form action="/test/curd/index.php" method="post">
                          <div class="mb-3 ">
                              <label for="titleEdit" class="form-label">Title</label>
                              <input type="text" class="form-control" id="titleEdit" name="title"
                                  aria-describedby="emailHelp">

                          </div>
                          <div class="mb-3">
                              <label for="descriptionsEdit" class="form-label">Descreptions</label>
                              <textarea class="form-control" id="descriptionsEdit" name="descreptions"
                                  rows="3"></textarea>
                          </div>
                          <div class="mb-3 form-check">
                              <input type="checkbox" class="form-check-input" id="exampleCheck1">
                              <label class="form-check-label" for="exampleCheck1">Check me out</label>
                          </div>
                          <button type="submit" class="btn btn-primary">ADD</button>
                      </form>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
              </div>
          </div>
      </div>


      <!-- //// form start  -->

      <div class="container mt-4">
          <h2>Add</h2>
          <form action="/test/curd/index.php" method="post">
              <div class="mb-3 ">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">

              </div>
              <div class="mb-3">
                  <label for="descreptions" class="form-label">Descreptions</label>
                  <textarea class="form-control" id="descreptions" name="descreptions" rows="3"></textarea>
              </div>
            
              <button type="submit" class="btn btn-primary">ADD</button>
          </form>
      </div>



      <?php
        if($insert==true){
            echo" <div class='alert alert-success alert-dismissible fade show' role='alert'>
           
            <strong>Insert Successfully!</strong> You should check in on some of those fields below.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
        } else echo"<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img' aria-label='Warning:'>
            <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
          </svg>
        <strong>Error !</strong> You should check in on some of those fields ☝ .
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";

        ?>

<!-- <i class='fas fa-arrow-up'>aa</i> -->

      <!-- data  -->

      <div class="container">

          <form method="post">


              <table class="table" id="myTable">
                  <thead>
                      <tr>

                          <th scope="col">S.no</th>
                          <th scope="col">Title</th>
                          <th scope="col">Descreptions</th>
                          <th scope="col">Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
            
            $sql= "SELECT * FROM `notes`";
            $result = mysqli_query($conn,$sql);
            //find the number of return 
            $num= mysqli_num_rows($result);
           // echo $num ."<br>";
            if($num>0){
                $no=1;
                for($i=0;$i=$row =mysqli_fetch_assoc($result);$i++){ 
                    // $row =mysqli_fetch_assoc($result);
                
                echo "<tr>
                    <th scope ='row'>".$no."</th>
                    <td>". $row['title']."</td>
                    <td>". $row['descreptions']."</td>
                    <td> <a href='/test/curd/update.php?id=".$row['sno']."'>edit</a></td>

                    <td>
                    
                    <a href='/test/curd/delete.php? id=".$row['sno']."'>Delete</a> 
                
                    </td>
                
                </tr ";
                    echo $row['sno']." ". $row['title']. ' ' . $row['descreptions'].'time'. $row['tstamp']; 
                    echo "<br>";
                    $no=$no+1;
                }
            }
               
                 

            ?>



                  </tbody>
              </table>


      </div>



      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
          integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
      </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
          integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
      </script>
      <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
      <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

  </body>

  </html>