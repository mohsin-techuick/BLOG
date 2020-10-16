<?php
session_start();
if(!isset($_SESSION['ADMIN-NAME'])){
	header("Location:login.php");
	exit();
}
include("../connection.php");
$userid=$_POST['userid'];
$blogid=$_POST['blogid'];
$sql="DELETE FROM blogs WHERE id=$blogid and user_id=$userid";
$res=mysqli_query($conn,$sql);
if($res){
header('Location:userblogs.php');
exit();
}