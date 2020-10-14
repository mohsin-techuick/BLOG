<?php session_start(); ?>
<?php if(!isset($_SESSION['USER-NAME'])){
	header("Location:users/login.php");	
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
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- Custom style file -->
	<link rel="stylesheet" href="assets/css/index.css">
	<!--FontAwesome Css-->
	<link rel="stylesheet" href="assets/fontawesome/css/all.css">
	<!--Style for current active link-->
	<style type="text/css">
	   .active{
		   background-color: green;
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
					$sql="SELECT * FROM blogs";
					$res=mysqli_query($conn,$sql);
					while($row=mysqli_fetch_assoc($res)):
				?>
				<div class="col-md-4 blog-post mb-2">
					<div class="card">
						<img src="<?php echo '/PHPBlog/'.$row['thumbnail']; ?>"  alt="thumbnail" class="card-img-top">
						<div class="card-body">
							<h4 class="text-center text-capitalize"><?php echo $row['title']; ?></h4>
							<hr />
								<!--Display only 100 characters of description-->
								<?php
								$desc=$row['description'];
									if(strlen($desc)>100){
									$desc=substr($desc, 0, 100).'...'; 				
								}
								echo "<p>$desc</p>";
								?>
							<!--Read more only of it contains more than 100 characters-->
								<!-- link trigger modal -->
							<?php if(strlen($desc)>100): ?>				
							
								<a href="javascript:void(0);" role="button" data-toggle="modal" data-target="#readmoreModel<?php echo $row['id']; ?>">
								 Read more
								</a>
							<?php endif; ?>		
						<!-- Modal -->
						<div class="modal fade" id="readmoreModel<?php echo $row['id']; ?>" tabindex="-1" role="dialog">
						  <div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
							  <div class="modal-header">
								<h5 class="modal-title text-dark text-uppercase" id="readmoreModel">
									<?php echo $row['title']; ?>
								 </h5>
								<button type="button" class="close" data-dismiss="modal">
								  <span>&times;</span>
								</button>
							  </div>
							  <div class="modal-body" >
								  <p class="text-dark"><?php echo $row['description']; ?></p>
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							  </div>
							</div>
						  </div>
						</div>		
						</div>
						<div class="card-footer">
							<!-- Like functionality of post using ajax-->
							<form method="post">
								<button type="submit" class="btn" data-="btn">
									<i class="fa fa-heart text-danger"></i>
								</button>
								<strong id="likecount">5</strong>
							</form>
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
			$("#blogs").addClass("active");
		});
	</script>
</body>
</html>