<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techuick Blogging System</title>
    <!-- Bootstrap css file -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <!-- Custom style file -->
</head>
<body>
    
	<!-- including header -->
    <?php include_once("../partials/adminheader.php"); ?>
	<?php
	
	?>
    <div class="container min-vh-100" id="wrapper">
        <div class="row p-3">
		<?php include("../connection.php") ?>
		<?php
			// all users fetxh
			$id=$_GET['uid'] ?? -1;
			$sql="SELECT * FROM blogs WHERE user_id=$id";
			$res=mysqli_query($conn,$sql);
			if(mysqli_num_rows($res)>0){
			while($row=mysqli_fetch_assoc($res)):
		?>
            <div class="col-md-4">
				<div class="card">
					<img src="<?php echo '../'.$row['thumbnail'];  ?>" class="card-img-top" style="max-height: 150px" alt="">
					<div class="card-header bg-dark text-white text-capitalize"><h6><?php echo $row['title'] ?></h6></div>
					<div class="card-body" style="max-height: 200px;overflow-y: auto">
						<p class="text-center"><strong>Created Date: </strong> <?php echo $row['created_at'] ?></p>
						<?php echo $row['description'] ?>
					</div>
					<div class="card-footer text-center text-white bg-dark">
						<form action="deleteUserBlog.php" method="post">
							<input type="hidden" name="userid" value="<?php echo $row['user_id'] ?>">
							<input type="hidden" name="blogid" value="<?php echo $row['id'] ?>">
							<input type="submit" value="Delete" name="<?php echo $row['id'] ?>" class="btn btn-primary">
						</form>
					</div>
				</div>
            </div>
		<?php endwhile;  }  ?>
        </div>
		<?php 
			if(mysqli_num_rows($res)==0){
				echo "<h4 style='text-align:center;border:2px solid red; padding:2rem;text-transform:uppercase'>No Blog for this user</h4>";
			}
		?>
    </div>

    <!-- Including footer -->
    <?php  include_once("../partials/footer.php"); ?>

    <!-- Bootstrap Jquery, popper.js and javascript -->
    <script src="../assets/bootstrap/js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="../assets/bootstrap/js/popper.min.js" type="text/javascript"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>