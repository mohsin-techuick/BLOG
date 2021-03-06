<?php
session_start();
if(isset($_SESSION['ADMIN-NAME'])){
	header("Location:dashboard.php");
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap css file -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <!-- Custom style file -->
    <link rel="stylesheet" href="../assets/css/form.css">
</head>
<body>
    <!-- including header -->
    <?php include_once("../partials/adminheader.php"); ?>
	
    <div class="container min-vh-100" id="wrapper">
        <div class="row justify-content-center">
            <div class="col-md-6 p-3">
                <form action="../database/adminLogin.php" method="post" name="userLoginForm" id="userLoginForm">
                    <h1 class="text-center text-uppercase">Admin Login</h1>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" placeholder="Enter Email" class="form-control"> 
                    </div>
                    <div class="form-group">
                        <label for="" class="text-black">Password</label>
                        <input type="password" name="pass" placeholder="Enter Password" class="form-control"> 
                    </div>
                    <div class="form-group">
                        <input type="submit" name="adminloginbtn" value="Login" class="btn btn-primary">
                    </div>  
					<?php
					if(isset($_GET['fail'])){
						echo "<h4 class='text-center text-danger'>Login Failed</h4>";
					}
					?>
                </form>
            </div>
        </div>
    </div>

    <!-- Including footer -->
    <?php  include_once("../partials/footer.php"); ?>

    <!-- Bootstrap Jquery, popper.js and javascript -->
    <script src="../assets/bootstrap/js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="../assets/bootstrap/js/popper.min.js" type="text/javascript"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>