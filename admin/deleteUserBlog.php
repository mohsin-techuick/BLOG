<?php
include("../connection.php");
$userid=$_POST['userid'];
$blogid=$_POST['blogid'];
$sql="DELETE FROM blogs WHERE id=$blogid and user_id=$userid";
$res=mysqli_query($conn,$sql);
if($res){
header('Location:'.$_SERVER['HTTP_REFERER']);
exit();
}