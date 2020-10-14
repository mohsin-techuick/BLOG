<?php  
session_start();
include("../connection.php");	
if(isset($_POST['loginBtn']))
{
	$email=$_POST['email'];
	$pass=md5($_POST['pass']);
	
	/*Login for users bases of role_id */
	$sql="SELECT * FROM users WHERE email='$email' and password='$pass' and role_id=1";
	
	$res=mysqli_query($conn,$sql);
	if(mysqli_num_rows($res)==1){
		$row=mysqli_fetch_assoc($res);
		session_regenerate_id();
		$_SESSION['USER-ID']=$row['id'];
		$_SESSION['USER-NAME']=$row['email'];
		header("Location:../users/dashboard.php");
		exit();
	}
	else{
		header("Location:../users/login.php?fail");
	}
}