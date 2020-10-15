
<?php 	
//Here will be blogs like functionality
include("../connection.php");
$userid=$_POST['userid'];
$blogid=$_POST['blogid'];

/*Insert new like ito likes table*/
$sql="INSERT INTO likes(user_id,blog_id) VALUES ($userid,$blogid)";
$res=mysqli_query($conn,$sql);

//if likes successfully 
if($res){
	echo "liked";	
}
//if user like already query will fail 
else{
	//here we will remove that like 
	$delQuery="DELETE FROM likes WHERE user_id=$userid and blog_id=$blogid";
	$result=mysqli_query($conn,$delQuery);
	if($result){
		echo "disliked";
	}
}