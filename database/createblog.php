<?php  
session_start();
include("../connection.php");	
if(isset($_POST['createpost']))
{
	
	$title=htmlentities($_POST['title']);
	$description=htmlentities($_POST['description']);
	$thumbnail=$_FILES['thumbnail'];
	$file_path="";
	$user_id=$_SESSION['USER-ID'];
	
	//if user select profile  image
	if($thumbnail!=''){
		$file_path.="db_images/".time().$thumbnail['name'];
		move_uploaded_file($thumbnail['tmp_name'],"../".$file_path);
	}
	/* Insert Data into  users table */
	$sql="INSERT INTO blogs(id,user_id,title,description,thumbnail) 
	VALUES (NULL,'$user_id','$title','$description','$file_path')";
	$res=mysqli_query($conn,$sql);
	if($res){
		header("Location:../users/dashboard.php");
		exit();
	}
}