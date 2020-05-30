<?php 
	include('functions.php');
	include('connection.php');
	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
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
                <!-- <input type="text"name="keywords" autocomplete="off" placeholder="Search" class="form-control mr-sm-2 ml-15"> -->
              
				<a href="admin/viewcategory.php" class="btn btn-secondary my-2 my-sm-0 ml-2">category</a>
				<a href="index.php?logout='1'" class="btn btn-secondary my-2 my-sm-0 ml-2">logout</a>
                
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top:100px">
	<?php if (isset($_SESSION['success'])) : ?>
        
        <div class="col-12">
           <div class="alert alert-success"><h4>

           <?php 
      
      echo $_SESSION['success']; 
      unset($_SESSION['success']);
                  ?>
           </h4></div>
       </div>
						<?php endif ?>
						<div class="row">
<?php
			$query="SELECT * FROM products";
$result = mysqli_query($conn,$query);
if(!is_null($result)){
    if($result->num_rows >0){
        while($row = $result->fetch_assoc()){
            $id=$row['id'];
               echo'          
                                                      
               </tr>
			   <div class="col-3">
			   <div class="card mb-3">
				   <h3 class="card-header">'. "Name:" .$row['name'] .'</h3>
				   
			   
				   <div class="card-body">
					   <h5 class="card-title">'."Type:".$row['type'] .'</h5>
					   <h6 class="card-subtitle text-muted">'."Price:".$row['price'] .'</h6><hr>
					   <h6 class="card-subtitle text-muted">'."discount:".$row['discount'] .'</h6>
				   </div>
				   <img style="height: 200px; width: 100%; display: block;"
                   src = "'.$row['image'].'"
					   alt="Card image" />
				   <ul class="list-group list-group-flush">
					   <li class="list-group-item">'."Categorys"."<br>".$row['categoryId'] .'</li>
				   </ul>
				  
			   </div>
		   </div>
           ';         
        }
    }
}
?>  
       
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