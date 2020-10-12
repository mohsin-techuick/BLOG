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
</head>

<body>
	<!-- including header -->
	<?php include_once("partials/header.php"); ?>
	<div class="container">
		<div id="blog-list">
			<h1>List All BLOGS</h1>
			<div class="row">
				<div class="col-md-4 blog-post mb-2">
					<div class="card">
						<img src="assets/images/demo.png" alt="blog post thumbnail" class="card-img-top">
						<div class="card-body">
							<h1>post title</h1>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, eveniet non illum nihil minima quos nam ipsum, quasi minus amet impedit, accusantium commodi! Omnis reprehenderit autem sunt? Et, corporis velit!</p>
						</div>
						<div class="card-footer text-center">
							<a href="" class="card-link">View</a>
							<a href="" class="card-link">Update</a>
							<a href="" class="card-link">Delete</a>
						</div>
						<div>
						</div>
					</div>
				</div>
				
				<div class="col-md-4 blog-post mb-2">
					<div class="card">
						<img src="assets/images/demo.png" alt="blog post thumbnail" class="card-img-top">
						<div class="card-body">
							<h1>post title</h1>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, eveniet non illum nihil minima quos nam ipsum, quasi minus amet impedit, accusantium commodi! Omnis reprehenderit autem sunt? Et, corporis velit!</p>
						</div>
						<div class="card-footer text-center">
							<a href="" class="card-link">View</a>
							<a href="" class="card-link">Update</a>
							<a href="" class="card-link">Delete</a>
						</div>
						<div>
						</div>
					</div>
				</div>
				
				<div class="col-md-4 blog-post mb-2">
					<div class="card">
						<img src="assets/images/demo.png" alt="blog post thumbnail" class="card-img-top">
						<div class="card-body">
							<h1>post title</h1>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, eveniet non illum nihil minima quos nam ipsum, quasi minus amet impedit, accusantium commodi! Omnis reprehenderit autem sunt? Et, corporis velit!</p>
						</div>
						<div class="card-footer text-center">
							<a href="" class="card-link">View</a>
							<a href="" class="card-link">Update</a>
							<a href="" class="card-link">Delete</a>
						</div>
						<div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

			<!-- Including footer -->
			<?php  include_once("partials/footer.php"); ?>

			<!-- Bootstrap Jquery, popper.js and javascript -->
			<script src="assets/bootstrap/js/jquery-3.4.1.min.js" type="text/javascript"></script>
			<script src="assets/bootstrap/js/popper.min.js" type="text/javascript"></script>
			<script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>

</html>