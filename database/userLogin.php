<?php  

include("../connection.php");	
if(isset($_POST['loginBtn']))
{
	$email=$_POST['email'];
	$pass=md5($_POST['pass']);
	
	/*Login for users bases of role_id */
	$sql="SELECT * FROM users WHERE email='$email' and password='$pass' and role_id=1";
	$res=mysqli_query($conn,$sql);
	if(mysqli_num_rows($res)==1){
		header("Location:../users/dashboard.php");
			exit();
	}
	else{
		echo "login failed";
	}
}