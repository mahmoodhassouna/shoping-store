<?php
session_start();
if(!empty($_POST["login"])) {
	$conn = mysqli_connect("localhost", "root", "", "project_php");
	$sql = "Select * from user where username = '" . $_POST["member_name"] . "'";
        if(!isset($_COOKIE["member_login"])) {
            $sql .= " AND password = '" . $_POST["member_password"] . "'";
	}
        $result = mysqli_query($conn,$sql);
        
	$user = mysqli_fetch_array($result);
	if($user) {
			$_SESSION["member_id"] = $user["member_id"];
			header("Location:signUp.php");
			if(!empty($_POST["remember"])) {
                setcookie ("member_login",$_POST["member_name"],time()+ (10 * 365 * 24 * 60 * 60));
               
			} else {
				if(isset($_COOKIE["member_login"])) {
                    setcookie ("member_login","");
                    header("Location:signUp.php");
                    
                }
          
            }
           
	} else {
		$message = "Invalid Login";
	}
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
        
            <div class="form-inline my-2 my-lg-0">
                
                <button class="btn btn-secondary my-2 my-sm-0 ml-4 ">Sign up</button>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top:100px">

        <form action="" method="post" id="frmLogin">
	<div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>	
	<div class="form-group">
		<div><label for="login">Username</label></div>
		<div><input name="member_name" type="text" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter username" />
	</div>
	<div class="form-group">
		<div><label for="password">Password</label></div>
		<div><input name="member_password" type="password" value="" class="form-control" id="exampleInputPassword1" placeholder="Password"/> 
    </div>
    <br>
	<div class="form-group">
		<div><input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />
		<label for="remember-me">Remember me</label>
    </div>
    <br>
	<div class="form-group">
		<div><input type="submit" name="login" value="Login" class="btn btn-primary"></span></div>
	</div>       
</form>
        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">© 2017-2020 shoping</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>
</body>

</html>