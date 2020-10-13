<?php  
include("../connection.php");	
if(isset($_POST['update']))
{
	$id=$_POST['id'];
	$title=htmlentities($_POST['title']);
	$description=htmlentities($_POST['description']);
	$today=date('Y-m-d H:i:s');
	$thumbnail=$_FILES['thumbnail'];
	$path="";
	
	if($thumbnail!=''){
		$path.="db_images/".time().$thumbnail['name'];
		move_uploaded_file($thumbnail['tmp_name'],"../".$path);
	}
	/* Update blog post */
	$sql="UPDATE blogs set title='$title', description='$description', 
	thumbnail='$path', updated_at='$today' WHERE id=$id";
	
	$res=mysqli_query($conn,$sql);
	if($res){
		header("Location:../users/dashboard.php");
		exit();
	}
}