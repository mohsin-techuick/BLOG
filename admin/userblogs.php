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
				<h1><?php echo $_GET['id'] ?? "Default" ?></h1>
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