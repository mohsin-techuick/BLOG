<?php session_start(); ?>
<?php if(!isset($_SESSION['USER-NAME'])){
	header("Location:login.php");	
}  
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profile</title>
	<!-- Bootstrap css file -->
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
	<!-- Custom style file -->
	<link rel="stylesheet" href="../assets/css/index.css">
	<link rel="stylesheet" href="../assets/css/userProfile.css">
	
</head>
<body>
	<!-- including header -->
	<?php include("../partials/header.php"); ?>
	
	<!--display profile data for specific user-->
	<?php include("../connection.php"); ?>
	<?php 
		$sql="SELECT * FROM users WHERE id={$_SESSION['USER-ID']}";
		$res=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($res);
		
	?>
	<div class="container min-vh-100">
		<div class="row justify-content-center">
			<div class="col-6">
				<div id="profile">
				<div id="header">
					<img src="<?php echo "../".$row['profile_pic']; ?>" alt="">
					<strong class="text-muted"><?php echo $row['email']; ?></strong>
				</div>
				<div id="body">
				<form action="../database/updateProfile.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?php echo $row['id']  ?>">
					<input type="hidden" name="oldfile" value="<?php echo $row['profile_pic']  ?>">
					
                    <div class="form-group">
                        <input type="text" name="firstname" placeholder="Firstname" class="form-control" value="<?php echo $row['firstname']; ?>"> 
                    </div>
                    <div class="form-group">
                        <input type="text" name="lastname" placeholder="Lastname" class="form-control" value="<?php echo $row['lastname']; ?>"> 
                    </div>
					<div class="form-group">
                        <input type="text" name="email" placeholder="Email Address" class="form-control"
							   value="<?php echo $row['email']; ?>"> 
                    </div>
						  
					<div class="form-group">
                        <input type="text" name="phone" placeholder="Phone" class="form-control"
							   value="<?php echo $row['phone']; ?>"> 
                    </div> 
					<div class="form-group">
                        <input type="password" name="password" placeholder="Password" class="form-control"> 
                    </div>
					<div class="form-group">
						<input type="file" name="profile_pic" id="" class="form-control-file">
					</div>
                    <div class="form-group text-center">
                        <button type="submit" name="profileupdate" class="btn btn-primary">
							Save Profile
						</button>
                    </div>  
                </form>
				</div>
				</div>
		  </div>
	  </div>
</div>
	
	<!-- Including footer -->
	<?php  include_once("../partials/footer.php"); ?>
	<!-- Bootstrap Jquery, popper.js and javascript -->
	<script src="/PHPBlog/assets/bootstrap/js/jquery-3.4.1.min.js" type="text/javascript"></script>
	<script src="/PHPBlog/assets/bootstrap/js/popper.min.js" type="text/javascript"></script>
	<script src="/PHPBlog/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		//profile dropdown hide 
	$(document).ready(function(){
		$("#profile").remove();
	});
	</script>
</body>

</html>