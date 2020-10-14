<?php  
include("../connection.php");	
if(isset($_POST['profileupdate']))
{
	
	$id=$_POST['id'];
	$firstname=htmlentities($_POST['firstname']);
	$lastname=htmlentities($_POST['lastname']);
	$email=htmlentities($_POST['email']);
	$phone=htmlentities($_POST['phone']);
	$password=md5($_POST['password']);
	$profile_pic=$_FILES['profile_pic'];
	$file_path=$_POST['oldfile'];
	
	//if user select profile  image
	if($profile_pic['name']!=''){
		$file_path="db_images/".time().$profile_pic['name'];
		move_uploaded_file($profile_pic['tmp_name'],"../".$file_path);
	}
	
	/* Insert Data into  users table */
	$sql="UPDATE users SET firstname='$firstname',lastname='$lastname',email='$email',phone='$phone',profile_pic='$file_path',
	password='$password' WHERE id=$id"; 

	$res=mysqli_query($conn,$sql);
	if($res){
		echo "<script>alert('updated successfully')</script>";
		echo "<script>window.location.href='../users/profile.php'</script>";
		exit();
	}
}