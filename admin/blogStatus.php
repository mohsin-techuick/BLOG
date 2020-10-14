<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techuick Blogging System</title>
    <!-- Bootstrap css file -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <!-- Custom style file -->
	<link rel="stylesheet" href="../assets/css/adminIndex.css">
</head>
<body>
    <!-- including header -->
    <?php include_once("../partials/adminheader.php"); ?>
	
    <div class="container min-vh-100" id="wrapper">
        <div class="row">
            <div class="col-12" id="table">
				
				<table class="table table-hover table-responsive-sm">
					<thead>
						<tr>
							<td>Title</td>
							<td>Description</td>
							<td>Thumbnial</td>
							<td>Created Date</td>
							<td>Status</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
					<?php include("../connection.php"); ?>
						
					<!--Fetch Blogs based on active and inactive status-->
					<?php
					
						//relace active to 1 and inacgive to 0 to match in database
					$status="";
					if(isset($_GET['status'])){	
						if($_GET['status']=="active"){
							$status=1;
						}
						else if($_GET['status']=="inactive"){
							$status=0;
						}
					}
					$sql="SELECT * FROM blogs WHERE status=$status";
					$res=mysqli_query($conn,$sql);
					while($row=mysqli_fetch_assoc($res)):
					?>
						<tr>
							<td><?php echo $row['title']; ?></td>
							<td><?php echo $row['description']; ?></td>
							<td>
								<a href="<?php echo "../".$row['thumbnail'];?>" target="_blank">
								<img height="50" width="50" src="<?php echo "../".$row['thumbnail']; ?>" alt="">
								</a>
							</td>
							<td><?php echo $row['created_at']; ?></td>
							<td><?php echo $row['status']=="1" ? "active" : "Inactive" ?></td>
							<td>
								<?php 
									/*If Blog is active admin can deactivate it*/
								 if($row['status']=="1"){
										?>
								<a href="../database/activate_deactive_blog.php?status=0&bid=<?php echo $row['id'];  ?>">De Activate</a>
								<?php
									}
								
									/*If Blog is  not active admin can activate it*/
									else if($row['status']=="0"){
										?>
								<a href="../database/activate_deactive_blog.php?status=1&bid=<?php echo $row['id'];  ?>">Activate</a>
								<?php
									}
								?>
							</td>
						</tr>
					<?php endwhile;  ?>
					</tbody>
				</table>
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