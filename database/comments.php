<?php

include("../connection.php");
$comment=$_POST['comment'];
$userId=$_POST['userid'];
$blogId=$_POST['blogid'];

$sql="INSERT INTO comments(id,comment,blog_id,user_id) VALUES(NULL,'$comment','$blogId','$userId')";
$res=mysqli_query($conn,$sql);
if($res){
	echo json_encode([
		"success"=>true,
		'message'=>"Comment posted"
	]);
}
?>