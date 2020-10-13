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
	<title>Profile</title>
	<!-- Bootstrap css file -->
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
	<!-- Custom style file -->
	<link rel="stylesheet" href="../assets/css/index.css">
	
</head>
<body>
	<!-- including header -->
	<?php include("../partials/header.php"); ?>
	
	<div class="container min-vh-100">
		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae eos deserunt, libero nam quaerat magni suscipit error deleniti quis, odio perferendis mollitia inventore voluptates quidem repellendus dicta, adipisci pariatur distinctio.
	</div>
	
	<!-- Including footer -->
	<?php  include_once("../partials/footer.php"); ?>
	<!-- Bootstrap Jquery, popper.js and javascript -->
	<script src="/PHPBlog/assets/bootstrap/js/jquery-3.4.1.min.js" type="text/javascript"></script>
	<script src="/PHPBlog/assets/bootstrap/js/popper.min.js" type="text/javascript"></script>
	<script src="/PHPBlog/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		//profile dropdown hide 
	$(document).ready(function(){
		$("#profile").remove();
	});
	</script>
</body>

</html>