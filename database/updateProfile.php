<?php  
/*Update user profile*/
include("../connection.php");	
if(isset($_POST['profileupdate']))
{
	
	$id=$_POST['id'];
	$firstname=htmlentities($_POST['firstname']);
	$lastname=htmlentities($_POST['lastname']);
	$email=htmlentities($_POST['email']);
	$phone=htmlentities($_POST['phone']);
	$password=$_POST['password'];
	$encrypt_pass=md5($_POST['password']);
	$profile_pic=$_FILES['profile_pic'];
	$file_path=$_POST['oldfile'];
	
	//if user select profile  image
	if($profile_pic['name']!=''){
		$file_path="db_images/".time().$profile_pic['name'];
		move_uploaded_file($profile_pic['tmp_name'],"../".$file_path);
	}
	
	$sql="";
	//if user not type in password fiels not to update password  
	if(empty($password)){
		$sql="UPDATE users SET firstname='$firstname',lastname='$lastname',email='$email',phone='$phone',profile_pic='$file_path' WHERE id=$id"; 
	}
	//if user type in password fiels update the password 
	else{
		$sql="UPDATE users SET firstname='$firstname',lastname='$lastname',email='$email',
		phone='$phone',profile_pic='$file_path',password='$encrypt_pass' WHERE id=$id"; 
	}
	/* Insert Data into  users table */
	$res=mysqli_query($conn,$sql);
	if($res){
			//if user changed the password then redirect it to login page for login again 
		if(!empty($password)){
//			//Destroy session data
			session_start();
			session_destroy();
			echo "<script>window.location.href='../users/login.php'</script>";
			exit();
		}
//			// if  user doesnot changed the password
		else{
			echo "<script>window.location.href='../users/profile.php'</script>";
			exit();
		}
	}
	
	
}