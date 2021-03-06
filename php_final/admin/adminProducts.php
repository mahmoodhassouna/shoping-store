﻿<?php

   $host = "localhost";
   $dbUsername = "root";
   $dbPassword = "";
   $dbname = "project_php";
   //create connection
   $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
   
   if (mysqli_connect_error()) {
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
   }

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Page Title</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://bootswatch.com/4/materia/bootstrap.min.css">
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Online Shopping System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#"><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item"><a class="nav-link"></a></li>
                <li class="nav-item"><a class="nav-link"></a></li>
            </ul>
            <div class="form-inline my-2 my-lg-0">
            <a href="http://localhost/m/php_final/admin/home2.php" class="btn btn-secondary my-2 my-sm-0 ml-4">go back</a>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top:100px">
       
        <h1 style="display: inline-block;">Products</h1>
        
        <hr />
        <?php
      $success_alert='
        <div class="col-12">
             <div class="alert alert-success">Success</div>
        </div>
      ';

      $fauli_alert='
        <div class="col-12">
             <div class="alert alert-danger">Fault</div>
        </div>
      ';
    if($_SERVER['REQUEST_METHOD'] == "POST"){
         if(isset($_POST['id'])){
            $delete_query="DELETE FROM products WHERE id = " .$_POST['id'];
            $delete_query= mysqli_query($conn,$delete_query);

               if($delete_query != false)
               {echo $success_alert;}
               else
               {echo $fault_alert;}
    }
}
?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    
                    <th scope="col">Price</th>
                    <th scope="col">categoryId</th>
                    <th scope="col" >Decount</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php

$query="SELECT * FROM products";
$result = mysqli_query($conn,$query);
if(!is_null($result)){
    if($result->num_rows >0){
        while($row = $result->fetch_assoc()){
            $id=$row['id'];
            echo'<tr>
   
               <td>'.$row['name'].' </td>
               <td>'.$row['type'].' </td>
               <td>'.$row['price'].' </td>
               <td>'.$row['categoryId'].' </td>
               <td>'.$row['discount'].' </td>
               <td>  
              
               <a href="http://localhost/m/php_final/admin/editproduct.php ?id= '.$id.'" class="btn btn-xs btn"> edit</a>
               <form style="display: inline" action="" method="POST" >
               <input type="hidden" id="custId" name="id" value="'.$id.'">
             <button type="submit" class="btn btn-xs btn-danger">Delete</button>
               </form>
               </td> 
                                                      
               </tr>';
       
        }
    }
}
?>
               
            </tbody>
        </table>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">© 2017-2019 Maba</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>
</body>

</html>