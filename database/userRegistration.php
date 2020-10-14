<?php  
include("../connection.php");	
if(isset($_POST['registerbtn']))
{
	
	$firstname=htmlentities($_POST['firstname']);
	$lastname=htmlentities($_POST['lastname']);
	$email=htmlentities($_POST['email']);
	$phone=htmlentities($_POST['phone']);
	$password=md5($_POST['password']);
	$profile_pic=$_FILES['profile_pic'];
	$file_path="";
	
	//if user select profile  image
	if($profile_pic['name']!=''){
		$file_path.="db_images/".time().$profile_pic['name'];
		move_uploaded_file($profile_pic['tmp_name'],"../".$file_path);
	}
	
	/* Insert Data into  users table */
	$sql="INSERT INTO users(id,firstname,lastname,email,phone,profile_pic,password,role_id) 
	VALUES (NULL,'$firstname','$lastname','$email','$phone','$file_path','$password',1)";
	$res=mysqli_query($conn,$sql);
	if($res){
		header("Location:../users/login.php");
		exit();
	}
}