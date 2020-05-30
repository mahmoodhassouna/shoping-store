<?php 
	include('../functions.php');

	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1.	Control Panel  </title>
    <!-- Bootstrap and Bootstrap Rtl -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-rtl.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="css/custom.css">
    <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://bootswatch.com/4/materia/bootstrap.min.css">
</head>
<body>

  <div class="d-flex" id="wrapper" style="color:#3e3ef8">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper"  >
      <div class="sidebar-heading">	Control Panel  </div>
      <div class="list-group list-group-flush">
        <a href="overview.php" class="list-group-item list-group-item-action bg-light"> Overview</a>
       
        <a href="#" class="list-group-item list-group-item-action bg-light" data-toggle="collapse" data-target="#menu">Category</a>
        <!-- Collapse menu -->
        <ul class="collapse sub-menu" id="menu">
          <a href="addcategory.php" class="list-group-item list-group-item-action bg-light">Add Category </a>
          <a href="categorys.php" class="list-group-item list-group-item-action bg-light">Update Category </a>
          <a href="categorys.php" class="list-group-item list-group-item-action bg-light">Delete Category </a>
          <a href="viewcategoryadmin.php" class="list-group-item list-group-item-action bg-light">View Categories  </a>
        </ul>

        <a href="#" class="list-group-item list-group-item-action bg-light" data-toggle="collapse" data-target="#menu1">product</a>
        <!-- Collapse menu -->
        <ul class="collapse sub-menu" id="menu1">    
          <a href="addproduct.php" class="list-group-item list-group-item-action bg-light">Add product </a>
          <a href="adminProducts.php" class="list-group-item list-group-item-action bg-light">Update product </a>
          <a href="adminProducts.php" class="list-group-item list-group-item-action bg-light">Delete product </a>
          <a href="viewproducts.php" class="list-group-item list-group-item-action bg-light">View products</a>
        </ul>

      </div>
     
    </div>

    <div id="page-content-wrapper">

<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
  <button class="btn btn-primary" id="menu-toggle"><span class="navbar-toggler-icon"></span></button>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <!-- <li class="nav-item active">
        <a class="nav-link" href="../layout/index.php" target="_blank">عرض الموقع <span class="sr-only">(current)</span></a>
      </li> -->
      <li class="nav-item dropdown" >
      <a href="create_user.php" style="color:#3e3ef8" class="btn btn-secondary my-2 my-sm-0 ml-2">add user</a>
				<a href="home2.php?logout='1'" style="color:#3e3ef8" class="btn btn-secondary-primary my-2 my-sm-0 ml-2">logout</a>
        
      </li>
    </ul>
  </div>
</nav>
<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
      <div class="col-12">
           <div class="alert alert-success"><h4>

           <?php 
      
      echo $_SESSION['success']; 
      unset($_SESSION['success']);
                  ?>
           </h4></div>
       </div>
          
			
			</div>
		<?php endif ?>
    
				
		
<!--jQuery-->
<script src="js/jquery-3.4.1.min.js"></script>
<!--Font Awesome-->
<script src="https://kit.fontawesome.com/03757ac844.js"></script>
<!--Bootstrap-->
<script src="js/bootstrap.min.js"></script>
<script src="tiny/tinymce.min.js"></script>
<!-- Menu Toggle Script -->
<script>
$("#menu-toggle").click(function(e) {
e.preventDefault();
$("#wrapper").toggleClass("toggled");
});
</script>
</body>
</html>
