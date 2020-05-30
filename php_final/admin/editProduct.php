<?php
   
   $host = "localhost";
   $dbUsername = "root";
   $dbPassword = "";
   $dbname = "project_php";
   //create connection
   $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
   
   if (mysqli_connect_error()) {
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
   }
 $id=$_GET['id'];
  
$query="SELECT * FROM products WHERE id=$id";
$result = mysqli_query($conn,$query);   
 $row= $result->fetch_assoc();
  $name=$row["name"];
 $type=$row["type"];
 $price=$row["price"];
 $discount=$row["discount"];

 $success_alert='
 <div class="col-12">
      <div class="alert alert-success"><h4>Success</h4></div>
 </div>
';

$fault_alert='
 <div class="col-12">
      <div class="alert alert-danger"><h5>Fault-Check the entered values</h5></div>
 </div>
';



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
                <a class="p-cart">
                   
                </a>
                <a href="http://localhost/m/php_final/admin/adminProducts.php" class="btn btn-secondary my-2 my-sm-0 ml-4">go back</a>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top:100px">
        <br />
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Edit Product</h4>
                        <hr />
                        <?php
                        if($_SERVER['REQUEST_METHOD'] == "POST"){
                            if(isset($_POST['name']) && isset($_POST['type']) && isset($_POST['price'])&& isset($_POST['category'])&& isset($_POST['discount']) ){
                              $name=$_POST['name'];
                              $type=$_POST['type'];
                              $price=$_POST['price'];
                              $category_id= $_POST['category'] ; 
                              $discount=$_POST['discount'];
                             
                               
                            if(!empty($name) && !empty($type) && !empty($price)&& !empty($category_id)&& !empty($discount)){
                            
                                       $updatequery="UPDATE products SET name='$name',type='$type',price=$price,categoryId='$category_id',discount='$discount'          
                                       WHERE id=$id";
                                       $result = mysqli_query($conn,$updatequery); 
                                       if($result != false){
                                        echo $success_alert;
                                       }else{
                                        echo $fault_alert;
                                       }
                            } else {
                                  
                                  echo $fault_alert;
                                }
                               }
                            
                            
                            
                            
                            }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="">
                            <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">Name</label>
                                <div class="col-8">
                                    <input id="name" name="name" placeholder="name" class="form-control here"
                                        type="text" value="<?php echo $name; ?>"/>
                                    <div class="valid-feedback">Looks good!</div>

                                    <div class="invalid-feedback">Please name is required.</div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title" class="col-4 col-form-label">Type</label>
                                <div class="col-8">
                                    <input id="type" name="type" placeholder="type" class="form-control here"
                                        type="text" value="<?php echo $type ; ?>"/>
                                    <div class="valid-feedback">Looks good!</div>

                                    <div class="invalid-feedback">
                                        Please title is required.
                                    </div>
                                </div>
                            </div>
                          
                            <div class="form-group row">
                                <label for="time" class="col-4 col-form-label">Price</label>
                                <div class="col-8">
                                    <input id="price" name="price" placeholder="price" class="form-control here"
                                        type="number" value="<?php echo $price; ?>" />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">
                                        Please Price is required.
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="time" class="col-4 col-form-label">Category's</label>
                                <div class="col-8">
                                <select
                        class="form-control here"
                        required="required"
                        id="category_id"
                        name="category">
                        <?php

                           $query="SELECT * FROM category";
                           $result = mysqli_query($conn,$query);
                          if(!is_null($result)){
                          if($result->num_rows >0){
                            while($row = $result->fetch_assoc()){
                              $id=$row['id'];
                               $name=$row['name'];
                                    echo'
                                <option value="'.$id.'">'.$name.'</option>
                                      ';
        }
    }
}
?>  
                     </select
                      >
                                    </div>
                                </div>
                               

                            <div class="form-group row">
                                <label for="discount" class="col-4 col-form-label">Discount</label>
                                <div class="col-8">
                                    <input id="discount" name="discount" placeholder="discount" class="form-control here"
                                        type="number" value="<?php echo $discount; ?>"/>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">
                                        Please Price is required.
                                    </div>
                                </div>
                            </div>

                     
                            <div class="form-group row">
                                <div class="offset-4 col-8">
                                    <button name="submit" type="submit" class="btn btn-primary">
                                       Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

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