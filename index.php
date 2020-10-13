<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Techuick Blogging System</title>
	<!-- Bootstrap css file -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- Custom style file -->
	<link rel="stylesheet" href="assets/css/index.css">
	
	<!--Style for current active link-->
	<style type="text/css">
	   .active{
		background-color: black;
		   color: white;
	   }
	</style>
</head>
<body>
	
	<!-- including header -->
	<?php include_once("partials/header.php"); ?>
	<div class="container">
		<div id="blog-list">
			<h1>List All BLOGS</h1>
			<div class="row">
				
				<!--Fecth all active Blogs => having 'status' "1" from blog table  -->
				<?php
					include("connection.php");
					$sql="SELECT * FROM blogs WHERE status=1";
					$res=mysqli_query($conn,$sql);
					while($row=mysqli_fetch_assoc($res)):
				?>
				
				<div class="col-md-4 blog-post mb-2">
					<div class="card">
						<img src="assets/images/demo.png" alt="blog post thumbnail" class="card-img-top">
						<div class="card-body">
							<h1><?php echo $row['title']; ?></h1>
							<p>
								<!--Display only 100 characters of description-->
								<?php echo substr($row['description'], 0, 100).'...'; ?>
								<a href="">Read more</a>
							</p>
						</div>
						<div class="card-footer text-center">
							<a href="" class="card-link">Update</a>
							<a href="" class="card-link">Delete</a>
						</div>
						<div>
						</div>
					</div>
				</div>
				
				<?php endwhile; ?>
				
			</div>
		</div>
	</div>

			<!-- Including footer -->
			<?php  include_once("partials/footer.php"); ?>

	<!-- Bootstrap Jquery, popper.js and javascript -->
	<script src="assets/bootstrap/js/jquery-3.4.1.min.js" type="text/javascript"></script>
	<script src="assets/bootstrap/js/popper.min.js" type="text/javascript"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			
		});
	</script>
</body>

</html>