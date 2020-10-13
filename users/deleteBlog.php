<?php 
include("../connection.php");
$sql="DELETE FROM blogs where id='{$_GET['id']}'";
$res=mysqli_query($conn,$sql);
if($res){
	header("Location:dashboard.php");
	exit();
}
