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
	<title>Techuick Blogging System</title>
	<!-- Bootstrap css file -->
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
	<!-- Custom style file -->
	<link rel="stylesheet" href="../assets/css/index.css">
	<style>
		.active{
		   background-color: black;
		   color: white;
		   text-align: center;
	   }
		
	</style>
</head>
<body>
	<!-- including header -->
	<?php include("../partials/header.php"); ?>
	
	 <div class="container min-vh-100 p-5" id="wrapper">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="operations mb-3">
					<a href="createblog.php" class="btn btn-primary">Create Blog</a>
						<!--Check how many posts are not approved yet-->
					<?php
						include("../connection.php");
						$csql="SELECT count(*) as total FROM blogs WHERE status=0 
						and user_id={$_SESSION['USER-ID']}";
						$res=mysqli_query($conn,$csql);
						$countRow=mysqli_fetch_assoc($res);
						if($countRow['total']>0){
						echo "<p class='text-center'> <strong>{$countRow['total']}</strong> post send for approval...</p>"; 
						}
					?>
				</div>
				<table class="table table-hover table-responsive">
					<thead>
						<tr>
							<th>ID</th>
							<th>Title</th>
							<th>Description</th>
							<th>Thumbnail</th>
							<th>Created</th>
							<th colspan="3">Actions</th>
						</tr>
					</thead>
					<tbody>
						<!--Fecth all logged in user blogs that are active  -->
					<?php
						$sql="SELECT * FROM blogs WHERE status=1 and user_id={$_SESSION['USER-ID']}";
						$res=mysqli_query($conn,$sql);
						while($row=mysqli_fetch_assoc($res)):
					?>
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['title']; ?></td>
							<td><?php echo substr($row['description'],0,100)."..."; ?></td>
							<td><a href="<?php echo '/PHPBlog/'.$row['thumbnail']; ?>" target="_blank"><img src="<?php echo '/PHPBlog/'.$row['thumbnail']; ?>" width="100" height="100" alt="thumbnail" class="rounded-circle"></a></td>
							<td><?php echo $row['created_at']; ?></td>
							<td><a href="viewBlog.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">View</a></td>
							<td><a href="updateBlog.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Edit</a></td>
							<td>
								<a href="deleteBlog.php?id=<?php echo $row['id'] ?>" class="btn btn-primary" onClick="return confirm('press ok to delete this post?')">Delete</a>
							</td>
						</tr>
					<?php endwhile; ?>
					</tbody>
				</table>
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
	$(document).ready(function(){
		$("#dashboard").addClass("active");
	});
	</script>
</body>

</html>