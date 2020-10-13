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
    <title>Update BlogPost</title>
    <!-- Bootstrap css file -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <!-- Custom style file -->
    <link rel="stylesheet" href="../assets/css/customstyle.css">
</head>
<body>
    <!-- including header -->
    <?php include_once("../partials/header.php"); ?>
	<!--Connection for databse-->
	<?php include_once("../connection.php")?>
	<!--Select Specific Data for update-->
	
	<?php
	$id=$_GET['id'] ?? -1;
	$sql="SELECT * FROM blogs WHERE id=$id";
	$res=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($res);
	?>
    <div class="container" id="createpost">
     <h3 class="text-center p-2 pt-4 text-black-50">UPDATE POST</h3>
         <div class="row justify-content-center">   
            <div class="col-md-8">
                <form action="../database/update.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                    <div class="form-group">
                        <label for=""></label>
                        <input type="text" name="title" placeholder="Blog Title" class="form-control" value="<?php echo $row['title']; ?>">
                    </div> 
                    <div class="form-group">
                        <label for=""></label>
                        <textarea name="description" class="form-control" rows="6" placeholder="Blog Description"><?php echo $row['description']; ?></textarea>
                    </div> 
                    <div class="form-group">
                        <label for="">Choose Image</label>
                        <input type="file" name="thumbnail" class="form-control-file">
                    </div> 
                    <div class="form-group text-center">
                        <input type="submit" value="update" class="btn btn-primary" name="update">
                    </div>
                </form>
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