<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techuick Blogging System</title>
    <!-- Bootstrap css file -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <!-- Custom style file -->
	<link rel="stylesheet" href="../assets/css/admindashboard.css">
	<style type="text/css">
		#dashboard{
			background-color: black;
			padding: 10px;
		}
	</style>
</head>
<body>
    <!-- including header -->
    <?php include_once("../partials/adminheader.php"); ?>
	<?php
		function getCount($blogStatus=0){
			
			//status 0 => blog is "inactive"
			//status 1 => blog is "active"
			include("../connection.php");
			$query="SELECT count(*) as total FROM blogs WHERE status=$blogStatus";
			$res=mysqli_query($conn,$query);
			$row=mysqli_fetch_assoc($res);
			$count=$row['total'];
			return $count;
		} 
	?>
    <div class="container min-vh-100 p-5" id="wrapper">
		<div class="row justify-content-center">
			<div class="col-sm-3 mb-3">
				<div class="box active-blogs">
					<a href="blogStatus.php?status=active">Active Blogs</a>
					<h1><?php echo getCount(1);  ?></h1>
				</div>
			</div>
			<div class="col-sm-3 mb-3">
				<div class="box inactive-blogs">
					<a href="blogStatus.php?status=inactive">Inactive Blogs</a>
					<h1><?php echo getCount(0);  ?></h1>
				</div>
			</div>
			<div class="col-sm-3 mb-3">
				<div class="box users-list">
					<a href="/PHPBlog/admin/usersList.php">Users list</a>
				</div>
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