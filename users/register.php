<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- Bootstrap css file -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <!-- Custom style file -->
    <link rel="stylesheet" href="../assets/css/form.css">
</head>
<body>
	
    <!-- including header -->
    <?php include_once("../partials/header.php"); ?>

    <div class="container min-vh-100" id="wrapper">
        <div class="row justify-content-center">
            <div class="col-md-6 p-3">
                <h1 class="text-center text-uppercase">User Registration</h1>
                <form action="../database/userRegistration.php" method="post" name="userLoginForm" id="userLoginForm" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Firstname</label>
                        <input type="text" name="firstname" placeholder="Enter Firstname" class="form-control"> 
                    </div>
                    <div class="form-group">
                        <label for="">Lastname</label>
                        <input type="text" name="lastname" placeholder="Enter Lastname" class="form-control"> 
                    </div>
					<div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" placeholder="Enter email address" class="form-control"> 
                    </div>
					<div class="form-group">
                        <label for="">Phone</label>
                        <input type="tel" name="phone" placeholder="Enter email address" class="form-control"> 
                    </div>
					
					<div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" placeholder="Enter password" class="form-control"> 
                    </div>
					<div class="form-group">
						<label for="">Choose your profile image</label>
						<input type="file" name="profile_pic" id="" class="form-control-file">
					</div>
                    <div class="form-group">
                        <input type="submit" name="registerbtn" value="Register" class="btn btn-primary btn-block">
                    </div>  
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