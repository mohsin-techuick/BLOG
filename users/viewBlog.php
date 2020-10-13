<?php session_start(); ?>
<?php if(!isset($_SESSION['USER-NAME'])){
	header("Location:../index.php");	
}  
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Techuick Blogging System</title>
	<!-- Bootstrap css file -->
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
	<!-- Custom style file -->
	<link rel="stylesheet" href="../assets/css/index.css">
</head>
<body>
	
	<!-- including header -->
	<?php include("../partials/header.php"); ?>
	<?php include("../connection.php"); ?>
	
	<!--View Specif  Blog baseed on ID-->
	 <div class="container min-vh-100 p-5" id="wrapper">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<a href="dashboard.php" class="btn btn-dark mb-2"> <strong>&lt;</strong> Back</a>
				<div class="card">
					<?php 
						$sql="SELECT * FROM blogs where id='{$_GET['id']}'";
						$res=mysqli_query($conn,$sql);
						$row=mysqli_fetch_assoc($res);
					?>
					<img src="<?php echo '/PHPBlog/'.$row['thumbnail']; ?>" style="max-height: 300px;" class="card-img-top" alt="">
					<div class="card-header"><h4 class="text-center
						text-uppercase"><?php echo $row['title'];  ?></h4></div>
					<div class="card-body"><?php echo $row['description'];  ?></div>
					<div class="card-footer text-center"><?php echo $row['created_at'] ?></div>
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
</body>
</html>