<?php
session_start();
if(!isset($_SESSION['ADMIN-NAME'])){
	header("Location:login.php");
	exit();
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
		function getCount($table,$blogStatus=0){	
			//status 0 => blog is "inactive"
			//status 1 => blog is "active"
			include("../connection.php");
			$query="";
			if($table=="blogs"){
				$query="SELECT count(*) as total FROM blogs WHERE status=$blogStatus";
			}
			else if($table=="users"){
				$query="SELECT count(*) as total FROM users";
			}
			$res=mysqli_query($conn,$query);
			$row=mysqli_fetch_assoc($res);
			$count=$row['total'];
			return $count;
		} 
	?>
    <div class="container min-vh-100 p-5" id="wrapper">
		<h4 class="text-center text-danger p-2 mb-3">COUNTER</h4>
		<div class="row justify-content-center">
			<div class="col-sm-3 mb-3">
				<div class="box active-blogs">
					<span>Active Blogs</span>
					<h1><?php echo getCount("blogs",1);  ?></h1>
				</div>
			</div>
			<div class="col-sm-3 mb-3">
				<div class="box inactive-blogs">
					<span>Inactive Blogs</span>
					<h1><?php echo getCount("blogs",0);  ?></h1>
				</div>
			</div>
			<div class="col-sm-3 mb-3">
				<div class="box users-list">
					<span>Users</span>
					<h1><?php echo getCount('users',0);  ?></h1>
				</div>
			</div>
		</div>
			<ul class="nav justify-content-center mt-5">
			  <li class="nav-item mr-3">
				<a class="nav-link btn btn-primary" href="/PHPBlog/admin/usersList.php">Check Users List</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link btn btn-primary" href="blogStatus.php">Change Blog Status</a>
			  </li>
			</ul>
	</div>
    <!-- Including footer -->
    <?php  include_once("../partials/footer.php"); ?>

    <!-- Bootstrap Jquery, popper.js and javascript -->
    <script src="../assets/bootstrap/js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="../assets/bootstrap/js/popper.min.js" type="text/javascript"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>