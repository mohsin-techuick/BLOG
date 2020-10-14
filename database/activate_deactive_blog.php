<?php
include("../connection.php");
$status=$_GET['status'];
$blogId=$_GET['bid'];
$sql="UPDATE blogs SET status=$status WHERE id=$blogId";	
$res=mysqli_query($conn,$sql);
if($res){
//	header("Location:../admin/dashboard.php");
	header("Location:../admin/blogStatus.php");
	exit();
}